<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
        //
    public function create(){
    	return view('auth.login');
    }
		// Login User
    public function store(Request $request){

        // Login test 1

        if(! auth()->attempt(['email' => $request->input('femail'), 'password' => $request->input('fpassword')]))
        {
            return back()->withErrors([
                 'massage' => 'email or password not correct !!!',
             ]);
        }

    	// Login test 2
        
    	// if(! auth()->attempt(request(['email','password'])) ){
    	// 	return back()->withErrors([
    	// 			'massage' => 'email or password not correct !!!',
    	// 		]);
    	// }

    	// redirect  to page home
    	return redirect('/posts');
    }
    // destroy
	public function destroy()
	{
		auth()->logout();
		return redirect('/posts');
	}


		///////////////// end LoginController ////////////////////////
}
