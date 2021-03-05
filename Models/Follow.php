<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Follow extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'follower_id',
        'following_id',
    ];

    public function getFollowers(){
        return $this->hasMany(User::class, 'id', 'following_id');
    }

    public function getFollowing(){
        return $this->hasMany(Follow::class, 'id', 'follower_id');
    }
}
