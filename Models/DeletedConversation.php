<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedConversation extends Model
{
    use HasFactory;

    protected $table = 'deleted_conversations';
}
