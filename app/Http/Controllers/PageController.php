<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use App\Category;
use App\Role;
use App\User;
use App\like;
class PageController extends Controller
{
    /////////// posts ///////////////
    public function posts()
    {
        $posts = Post::all();

        return view('content.posts', compact('posts'));
    }
    /////////// post ////////
    public function post(Post $post)
    {
        // $post = DB::table('posts')->find($post);
        // $post = Post::all()->find($id);
        $stop_comments = DB::table('settings')->where('name' , 'stop_comments')->value('value');
        return view('content.post', compact('post', 'stop_comments'));
    }

        ////////// store //////////////////
        public function store(Request $request)
    {

     $this->validate($request, [
            'ftitle' => 'required',
            'fbody' => 'required',
            'furlimg' =>'image|mimes:jpg,jpeg,gif,png,txt|max:2048'
        ]);
        // $this->validate($request,[
        //     'ftext'=>'required |min:5'
        //     ]);


            //  add new post //////////////
        $post = new Post;
        $post->title = request('ftitle');
        $post->body = request('fbody');
        
        //     //  add images to post ////////////
        if($request->hasFile('furlimg')){
        $image = $request->file('furlimg');
        $img_name = md5(time().rand()).'.'.$image->getClientOriginalExtension(); 
        $image->move(public_path('upload'), $img_name);
        $post->url = $img_name;
        }else{
                   $post->url = null; 
        }
        $post->save();    
        // Post::create([
        // 'title' => request('ftitle'),
        // 'body' => request('fbody'),
        // 'url' => request('furlimg')
        //     ]);

        // Post::create(request()->all());

        return redirect('/posts');
        /////////////// end Store ///////////////////       
    }
    /////////// category ///////////////
    public function category($name)
    {

        // $posts = Post::with('categories')->get();

    //     $post = Post::find($id);
    // $posts = $post->category->name;

    $cat = DB::table('categories')->where('name',$name)->value('id');
    $posts = DB::table('posts')->where('cat_id', $cat)->get();
        return view('content.category', compact('posts'));
    }
        // Admin route

    public function admin()
    {
        $users = User::all();
        $stop_comments = DB::table('settings')->where('name' , 'stop_comments')->value('value');
        $stop_register = DB::table('settings')->where('name' , 'stop_register')->value('value');
        return view('admin.admin' , compact('users' , 'stop_comments' , 'stop_register'));
    }
        // settings route

    public function settings(Request $request)
    {
        if($request->stop_comments)
        {
            DB::table('settings')->where('name', 'stop_comments')->update(['value'=> 1]);
        }
        else
        {
            DB::table('settings')->where('name', 'stop_comments')->update(['value'=> 0]);
        }
            // 
        if($request->stop_register)
        {
            DB::table('settings')->where('name', 'stop_register')->update(['value'=> 1]);
        }
        else
        {
            DB::table('settings')->where('name', 'stop_register')->update(['value'=> 0]);
        }

        return back();
    }
        // addRole route

    public function addRole(Request $request)
    {
            $user = User::where('email', $request['email'])->first();
            $user->roles()->detach();
            if($request['role_user'])
            {
                $user->roles()->attach(Role::where('name' , 'user')->first());
            }
            if($request['role_editor'])
            {
                $user->roles()->attach(Role::where('name' , 'editor')->first());
            }
            if($request['role_manager'])
            {
                $user->roles()->attach(Role::where('name' , 'manager')->first());
            }
            if($request['role_admin'])
            {
                $user->roles()->attach(Role::where('name' , 'admin')->first());
            }
        return back();
    }
        // edotor route

    public function editor()
    {
        return view('admin.editor');
    }
    //////////// accessDenied /////////////////
    public function accessDenied()
    {
        return view('admin.access_denied');
    }
    /////////////////////////////////////////
    public function statistics()
    {       ///////// all table 
        $users      = DB::table('users')->count();
        $posts      = DB::table('posts')->count();
        $comments   = DB::table('comments')->count();
        $categories = DB::table('categories')->count();
        /////////////// Most comments////////////////
        $most_comments = User::withCount('comments')->orderBy('comments_count' , 'desc')->first();
        $posts_count_1 = DB::table('posts')->where('user_id',$most_comments->id )->count();
        $user_1_count = $most_comments->comments_count + $posts_count_1;
            // dd($user_1_count);
        /////////////// Most posts////////////////
        $most_posts = User::withCount('posts')->orderBy('posts_count' , 'desc')->first();
        $comments_count_2 = DB::table('comments')->where('user_id',$most_posts->id )->count();
       $user_2_count =  $comments_count_2 + $most_posts->posts_count;
        // dd($most_posts->posts_count);

       if( $user_1_count > $user_2_count ){
        $active_user = $most_comments->name;
        $active_user_posts = $posts_count_1;
        $active_user_comments = $most_comments->comments_count;
       }else{
        $active_user = $most_posts->name;
        $active_user_posts = $most_posts->posts_count;
        $active_user_comments = $comments_count_2;
       }
       //  array compact all
       $statistics = array(

            'users' => $users,
            'posts' => $posts,
            'comments' => $comments,
            'categories' => $categories,
            'active_user' => $active_user,
            'active_user_posts' => $active_user_posts,
            'active_user_comments' => $active_user_comments ,

        );

        return view('admin.statistics', compact('statistics'));
    }






    /////////////// end class PageController ///////////////////
}
