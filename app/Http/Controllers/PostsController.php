<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    /**
     * Only allow authenticated user to see any of this
     * Protects all below routes
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        // orderBy('created_at', 'DESC') = latest()
        // get() gets all paginate(x) gets x posts
        $posts = Posts::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        // dd($posts);

        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
            // 'image' => 'required|image'
        ]);
        // store method('path','driver-to-use-to-store')
        $imagePath = request('image')->store('uploads', 'public');

        //NOTE: `user php artisan storage:link` to create rel between public/storage and storage/app/public

        // to save the post #1
        // $post = new \App\Posts();

        // $post->caption = $data['caption'];
        // $post->save();

        // to save the post #2 -- BETTER
        // \App\Post::create($data);

        // to save the post with authenticated user id
        // auth()->user()->posts()->create($data);
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profile/' . auth()->user()->id);

        // dd(request()->all());
    }

    public function show(\App\Posts $post)
    {
        // dd($post);
        return view('posts.show', compact('post'));
    }
}
