<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Post;

class PostController extends Controller
{

    public function index(){

        //$posts = Post::all();
        $posts = auth()->user()->posts()->paginate(1);

        return view('admin.posts.index', ['posts' => $posts]);

    }



    public function show(Post $post){

        return view('blog-post', ['post' => $post]);

    }


    public function create(){

        $this->authorize('create', Post::class);
        return view('admin.posts.create');

    }

    public function store(Request $request){

        $this->authorize('create', Post::class);

       $inputs =  request()->validate([
            'title' => 'required|min: 8| max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);


        if(request('post_image')){

            $inputs['post_image'] = request('post_image')->store('images');

        }
        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'Post "'. $inputs['title'] .'" was created');

        return redirect()->route('post.index');

    }





    public function destroy(Post $post ,Request $request){
        $post->delete();
        $request->session()->flash('message', 'Post was deleted');
        $this->authorize('delete', $post);
        return back();
    }



    public function edit(Post $post){

       // $this->authorize('view', $post);

       if(auth()->user()->can('view', $post)){



       }

        return view('admin.posts.edit', ['post' => $post]);

    }










    public function update(Post $post){

        //Inputs validateion
       $inputs =  request()->validate([
            'title' => 'required|min: 8| max:255',
            'post_image' => 'file',
            'body' => 'required'
         ]);

         

        //Image input validation
         if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_iamge = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $this->authorize('update', $post);

        $post->save();

        session()->flash('post-updated-message', 'Post "'. $post['title'] .'" was updated');

        return redirect()->route('post.index');
    }










}
