<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static create()
 * @method static truncate()
 * @method static find()
 * @method static where(string $string, $id)
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;


    const ADMIN_USER = 'true';
    const TYPE_USER = 'registered';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','about','mobilenum','phonenum','status','verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isVerified(){
        return $this->utype == User::TYPE_USER;
    }



    public function isAdmin(){
        return $this->status == "admin";
    }

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
