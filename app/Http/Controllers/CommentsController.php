<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
class CommentsController extends Controller
{
    //

    public function store(Post $post)
    {
    	Comment::create([
    		'body' => request('fbody'),
    		'post_id' => $post->id,
    		]);
    	return back();
    }
}
