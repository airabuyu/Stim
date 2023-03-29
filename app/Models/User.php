<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'fullname',
        'password',
        'role',
        'profile_picture',
        'level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function friendsPending(){
        return $this->belongsToMany(User::class, 'add_friends', 'user_add', 'user_acc')
            // ->wherePivot('status', '=', "Pendiaang");
            ->wherePivot('status', '=', "Pending")
            ->withPivot('status', 'user_add', 'user_acc');

            // ->using(AddFriend::class)
            // ->withTimestamps();
    }

    public function friendsIncoming(){
        return $this->belongsToMany(User::class, 'add_friends', 'user_acc', 'user_add')
            // ->wherePivot('status', '=', "Pendiaang");
            ->wherePivot('status', '=', "Pending")
            ->withPivot('status', 'user_add', 'user_acc');

            // ->using(AddFriend::class)
            // ->withTimestamps();
    }

    public function friendsA(){
        return $this->belongsToMany(User::class, 'add_friends', 'user_add', 'user_acc')
            // ->wherePivot('status', '=', "Pendiaang");
            ->wherePivot('status', '=', "Accepted")
            ->withPivot('status', 'user_add', 'user_acc');

            // ->using(AddFriend::class)
            // ->withTimestamps();
    }

    public function friendsB(){
        return $this->belongsToMany(User::class, 'add_friends', 'user_acc', 'user_add')
            // ->wherePivot('status', '=', "Pendiaang");
            ->wherePivot('status', '=', "Accepted")
            ->withPivot('status', 'user_add', 'user_acc');

            // ->using(AddFriend::class)
            // ->withTimestamps();
    }

    // public function status(){
    //     return $this->belongsToMany()
    // }
}
