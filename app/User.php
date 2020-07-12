<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    ///////////// POSTS ///////////
    public function likes(){
        return $this->hasMany(User::class);
    }

    ///////////// POSTS ///////////
    public function posts(){
        return $this->hasMany(Post::class);
    }
    ///////////// comments///////
    public function comments(){
        return $this->hasMany(Comment::class);
    }

        // tables Role and user_roles
    public function roles(){
        return $this->belongsToMany('App\Role' , 'user_role' , 'user_id' , 'role_id');
    }
        // hasAnyRole($roles)
    public function hasAnyRole($roles){
        if(is_array($roles))
        {
            foreach ($roles as $role) {

                if($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else
        {
            if($this->hasRole($roles))
            {
                return true;
            }
        }
    }
    //  asRole($roles)
    public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first())
        {
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
}
