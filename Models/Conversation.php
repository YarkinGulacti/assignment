<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Message;

class Conversation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'status',
    ];


    public function getMessages(){
        return $this->belongsTo(Message::class, 'id', 'conversation_id');
    }

    public function getSender(){
        return $this->hasOne(User::class, 'id', 'sender_id');
    }

    public function getReceiver(){
        return $this->hasOne(User::class, 'id', 'receiver_id');
    }

    public function getDeletionRecords(){
        return $this->hasMany(DeletedConversation::class, 'conversation_id', 'id');
    }
}
