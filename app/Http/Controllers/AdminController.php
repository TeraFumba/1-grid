<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\postRequest;
use App\Posts;
use Auth;
use App\PostRating;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('admin');
    }

    public function CreateNewPost()
    {
        return view('create_new_post');
    }

    public function edit($id)
    {
        $post = Posts::find($id);
        return view('edit')
                ->with(compact('post'));
    }
    public function getAllPosts()
    {
        $user = Auth::user();
        $posts = Posts::all() ;
        
        return ['post' => $posts , 'auth' => $user->id];
    }

    public function savePost(postRequest $request)
    {
        $user = Auth::user();
        Posts::create([
            'user_id'   =>  $user->id,
            'post'      =>  $request->post
        ]);

        return 'success';
    }

    public function editSave(postRequest $request)
    {
        Posts::where('id', $request->post['id'])->update([
            'post'  => $request->post['post']
        ]);
        return 'success';
    }

    public function ratePost(Request $request)
    {
        $user = Auth::user();
        PostRating::updateOrCreate(
            ['post_id' => $request->post_id],
            ['user_id' => $user->id, 'rating' => $request->rate]
        );
    }

    public function delete($postId)
    {
        PostRating::where('post_id', $postId)->delete();
        Posts::where('id', $postId)->delete();
        return 'success';
    }
}
