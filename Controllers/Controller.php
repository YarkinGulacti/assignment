<?php

use App\Models\Conversation;
use App\Models\DeletedConversation;
use App\Models\Follow;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller
{
    public function get_conversation(Request $request)
    {
        $deletion_records = Conversation::where('conversations.id', $request->conversation_id)
            ->join('deleted_conversations AS dc', function ($join) {
                $join->on('dc.conversation_id', '=', 'conversations.id')
                    ->where('dc.user_id', auth()->id());
            })
            ->distinct()
            ->select('conversations.*')
            ->get();
        $target_user = User::where('id', $request->other_user)
            ->first();
        if ($deletion_records->count() == 0) {
            $messages = Conversation::where('id', $request->conversation_id)
                ->first()
                ->getMessages()
                ->get();
            $response = array(
                'status' => 'success',
                'messages' => $messages,
                'target_user' => $target_user,
                'owner_user' => auth()->user()
            );
            return response()->json($response);
        } else {
            $messages = Conversation::where('conversations.id', $request->conversation_id)
                ->join('deleted_conversations AS dc', function ($join) {
                    $join->on('dc.conversation_id', '=', 'conversations.id')
                        ->where('dc.user_id', auth()->id());
                })
                ->join('messages AS m', function ($join) {
                    $join->on('m.conversation_id', '=', 'conversations.id')
                        ->whereColumn('dc.created_at', '<', 'm.created_at');
                })
                ->orderBy('m.created_at', 'asc')
                ->select('m.*')
                ->get();
            $response = array(
                'status' => 'success',
                'messages' => $messages,
                'target_user' => $target_user,
                'owner_user' => auth()->user()
            );
            return response()->json($response);
        }
    }

    public function delete_conversation($id)
    {
        $conversation = Conversation::where('conversations.id', $id)
            ->join('deleted_conversations AS dc', function ($join) {
                $join->on('dc.conversation_id', '=', 'conversations.id')
                    ->where('dc.user_id', auth()->id());
            })
            ->distinct()
            ->select('dc.*')
            ->get();

        if ($conversation->count() == 0) {
            $d = new DeletedConversation();

            $d->conversation_id = $id;
            $d->user_id = auth()->id();
            $d->created_at = now();
            $d->updated_at = now();

            $d->save();
        } else {
            $conversation->each(function ($item) {
                $d = DeletedConversation::find($item->id);

                $d->created_at = now();

                $d->save();
            });
        }

        return redirect()->route('messages', ['username' => auth()->user()->username]);
    }

    public function follow(Request $request)
    {
        $following = $request->target;
        $target_user = User::where('username', $following)->firstorFail()->id;
        $follower = auth()->user()->id;

        $check = Follow::where('following_id', $target_user)
            ->where('follower_id', $follower)
            ->first();

        if ($check == null) {

            $record = new Follow();

            $record->following_id = $target_user;
            $record->follower_id = $follower;

            $record->save();

            $response = array(
                'status' => 'success',
                'msg' => 'Başarılı bir şekilde takip ettiniz',
            );
            return response()->json($response);
        } else {
            $response = array(
                'status' => 'success',
                'msg' => 'Bu kullanıcıyı takip ediyorsunuz.',
            );
            return response()->json($response);
        }
    }

    public function unfollow(Request $request)
    {

        $following = $request->target;
        $target_user = User::where('username', $following)->firstorFail()->id;
        $follower = auth()->user()->id;

        $check = Follow::where('following_id', $target_user)
            ->where('follower_id', $follower)
            ->first();

        if ($check) {

            $check->delete();

            $response = array(
                'status' => 'success',
                'msg' => 'Başarılı bir şekilde takipten çıktınız',
            );
            return response()->json($response);
        } else {
            $response = array(
                'status' => 'success',
                'msg' => 'Bu kullanıcıyı takip etmiyorsunuz',
            );
            return response()->json($response);
        }
    }

    public function new_message(Request $request)
    {
        $sender_id = auth()->user()->id;
        $receiver = $request->receiver;
        $message = $request->message;
        $receiver_id = User::where('username', $receiver)
            ->firstorFail()
            ->id;

        $conversation = Conversation::where('sender_id', $sender_id)
            ->orWhere('receiver_id', $sender_id)
            ->where('receiver_id', $receiver_id)
            ->orWhere('sender_id', $receiver_id)
            ->first();

        if ($conversation === null) {
            $conversation = new Conversation();

            $conversation->sender_id = $sender_id;
            $conversation->receiver_id = $receiver_id;
            $conversation->status = 'unread';
            $conversation->created_at = now();
            $conversation->updated_at = now();

            $conversation->save();

            $m = new Message();

            $m->conversation_id = $conversation->id;
            $m->sender_id = $sender_id;
            $m->message = $message;
            $m->created_at = now();
            $m->updated_at = now();

            $m->save();

            $response = array(
                'status' => 'success',
                'msg' => 'Mesajınız iletildi.'
            );
            return response()->json($response);
        } else {
            $m = new Message();

            $m->conversation_id = $conversation->id;
            $m->sender_id = $sender_id;
            $m->message = $message;
            $m->created_at = now();
            $m->updated_at = now();

            $m->save();

            $conversation->update_at = now();
            $conversation->save();

            $response = array(
                'status' => 'success',
                'msg' => 'Mesajınız iletildi.'
            );
            return response()->json($response);
        }
    }

    public function direct_message(Request $request)
    {
        $m = new Message();

        $m->conversation_id = $request->conversation_id;
        $m->sender_id = $request->sender;
        $m->message = $request->message;
        $m->created_at = now();
        $m->updated_at = now();

        $m->save();

        $conversation = Conversation::where('id', $request->conversation_id)->first();
        $conversation->updated_at = now();

        SendMessageToUser::dispatch($m, $conversation);

        $user = User::where('id', $m->sender_id)
            ->first()
            ->first_name;

        $response = array(
            'status' => 'success',
            'msg' => 'Mesajınız iletildi.',
            'm' => $m,
            'u' => $user
        );
        return response()->json($response);
    }

    public function messages($username)
    {
        $id = User::where('username', $username)
            ->first()
            ->id;

        $deletion_records = Conversation::where('sender_id', $id)
            ->orWhere('receiver_id', $id)
            ->join('deleted_conversations AS dc', function ($join) use ($id) {
                $join->on('dc.conversation_id', '=', 'conversations.id')
                    ->where('dc.user_id', $id);
            })
            ->distinct()
            ->select('conversations.*')
            ->get();
        if ($deletion_records->count() == 0) {
            $conversations = Conversation::where('sender_id', $id)
                ->orWhere('receiver_id', $id)
                ->get();
            return view('front-end.messages')
                ->with('conversations', $conversations);
        } else {
            $conversations = Conversation::where('conversations.sender_id', $id)
                ->orWhere('conversations.receiver_id', $id)
                ->distinct()
                ->join('deleted_conversations AS dc', function ($join) use ($id) {
                    $join->on('dc.conversation_id', '=', 'conversations.id')
                        ->where('dc.user_id', $id);
                })
                ->join('messages AS m', function ($join) {
                    $join->on('m.conversation_id', '=', 'conversations.id')
                        ->whereColumn('dc.created_at', '<', 'm.created_at');
                })
                ->select('conversations.*')
                ->get();
            return view('front-end.messages')
                ->with('conversations', $conversations);
        }
    }
}
