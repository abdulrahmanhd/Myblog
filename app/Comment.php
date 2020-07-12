<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    //
    protected $fillable=[  'body', 'post_id' ];
        /////////////// start post //////////////////
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
            /////////////// start user //////////////////
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
 /////////////// end Comment //////////////////
}
