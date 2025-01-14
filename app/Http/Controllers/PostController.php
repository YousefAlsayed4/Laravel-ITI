<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->orderByDesc('created_at')->paginate(4);
        return view('posts.index', ["posts" => $posts]);
    }
    public function users()
    {
        $users = User::with('posts')->paginate(10);
        return view('posts.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->user_id = Auth::id();
        $post->enabled = 1;
        $post->published_at = now();
        $post->save();
        $user = User::find(Auth::id());
        $user->posts_count++;
        $user->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }
    public function showTrash()
    {
        $deletedPosts = Post::onlyTrashed()->get();
        return view('posts.trash', ['deletedPosts' => $deletedPosts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $validatedData = $request->validated();
        Post::where('id', $id)->update([
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
        ]);;
        return redirect()->route('posts.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::find($id)->delete();
        return redirect()->route('posts.index');
    }
    
    public function show_users(){
        $users=User::all();
        $posts=Post::all();
        return view('users',['users'=>$users,'posts'=>$posts]);
    }
}
