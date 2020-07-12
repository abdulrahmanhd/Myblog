<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=[ 'title' , 'body' ];


    /////////////// start category //////////////////
    public function user()
    {
        return $this->belongsTo(User::class);
    }
        /////////////// start category //////////////////
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
        /////////////// start likes //////////////////
    public function likes()
    {
        return $this->hasMany(User::class);
    }
    /////////////// start comments //////////////////
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at');
    }

    	//////// end post /////////////
}
