<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    /////////////// start category //////////////////
    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
    	//////// end category /////////////

}
