<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{

       /////////////// start user //////////////////
    public function user()
    {
    	return $this->belongsTo(User::class);
    }	
       /////////////// start post //////////////////
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
