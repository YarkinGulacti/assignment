<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Follow;
use App\Models\Advertisement;
use App\Models\Review;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'cellphone',
        'city',
        'provience'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFollowers(){
        return $this->hasMany(Follow::class, 'following_id', 'id');
    }

    public function getFollowing(){
        return $this->hasMany(Follow::class, 'follower_id', 'id');
    }

    public function getPostedJobs(){
        return $this->hasMany(Advertisement::class, 'provider_id', 'id');
    }

    public function getReviews(){
        return $this->hasMany(Review::class, 'user_id', 'id');
    }
}
