<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Conversation;
use App\Models\User;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conversation_id',
        'sender_id',
        'message'
    ];

    public function getConversation(){
        return $this->belongsTo(Conversation::class, 'id', 'conversation_id');
    }

    public function getSender(){
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }
}
