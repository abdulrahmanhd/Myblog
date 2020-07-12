<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
class RegisterController extends Controller
{
    //
    public function create()
    {
        $stop_register = DB::table('settings')->where('name', 'stop_register')->value('value');
    	return view('auth.register' , compact('stop_register'));
    } 
// Add New User Regisre
    public function store(Request $request){

//  create New User 
    	$user = new User;
    	$user->name = $request->fname;
    	$user->email =$request->femail;
    	$user->password = bcrypt($request->fpassword);
    	$user->save();

        // added Roles

        $user->roles()->attach(Role::where('name', 'User')->first());

    	// Login
    	auth()->login($user);


    	// redirect  to page home

    	return redirect('/posts');
    }

}
