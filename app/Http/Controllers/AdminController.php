<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function userList()
    {
        $users = User::where('role','user')->get();
        return view('admin.user-list',compact('users'));
    }
    public function editUser(User $user)
    {
        return view('admin.user-edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'expired_at' => 'required',
            'password' => 'min:6'
        ]);

        $user->expired_at = $request->expired_at;
        if(isset($request->password)) {
            $user->password=bcrypt($request->password);
        }
        $user->update();
        return redirect()->route('admin.userList')->with('toast', 'User updated successfully');

    }

    public function postOneList()
    {
        $posts = Post::where('type',1)->get();
        return view('admin.post-list',compact('posts'));
    }
    public function postTwoList()
    {
        $posts = Post::where('type',2)->get();
        return view('admin.post-list',compact('posts'));
    }
    public function postThreeList()
    {
        $posts = Post::where('type',3)->get();
        return view('admin.post-list',compact('posts'));
    }
    public function createPost(){
        return view('admin.post-create');
    }
    public function storePost(Request $request){

        $request->validate([
            'type' => 'required',
            'label_one' => 'required',
            'label_two' => 'required',
            'label_three' => 'required',
        ]);
        $createdAt = Carbon::now()->toDateString();
        $post = Post::updateOrCreate(
            ['created_at' => $createdAt,
            'type' => $request->type,], // The condition to find an existing post
            [
                'label_one' => $request->label_one,
                'label_two' => $request->label_two,
                'label_three' => $request->label_three,
            ]
        );

        // // Create a new user
        // $post = new Post();
        // $post->type = $request->type;
        // $post->label_one = $request->label_one;
        // $post->label_two = $request->label_two;
        // $post->label_three = $request->label_three;
        // $post->save();
        if ($post->type == 1){
            return redirect()->route('admin.postOneList')->with('toast', 'Post created successfully');
        }
        if ($post->type == 2){
            return redirect()->route('admin.postTwoList')->with('toast', 'Post created successfully');
        }
        if ($post->type == 3){
            return redirect()->route('admin.postThreeList')->with('toast', 'Post created successfully');
        }
    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function editPost(Post $post)
    {
        return view('admin.post-edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, Post $post)
    {
        $request->validate([
            'label_one' => 'required',
            'label_two' => 'required',
            'label_three' => 'required',
        ]);

        $post->label_one = $request->label_one;
        $post->label_two = $request->label_two;
        $post->label_three = $request->label_three;
        $post->update();
        if ($post->type == 1){
        return redirect()->route('admin.postOneList')->with('toast', 'Post updated successfully');
        }
        if ($post->type == 2){
            return redirect()->route('admin.postTwoList')->with('toast', 'Post updated successfully');
        }
        if ($post->type == 3){
            return redirect()->route('admin.postThreeList')->with('toast', 'Post updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destory(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('status', 'Post deleted successfully');
    }
}
