<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Review extends Model
{
    use HasFactory;

    public function getIssuer(){
        return $this->belongsTo(User::class, 'issuer_id', 'id');
    }
}
