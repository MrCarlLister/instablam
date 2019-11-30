<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    /**
     * Adds a check against auth user (authenticated user) and returns unauthorised instead of 500 error
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Toggles user profile follow status and stores
     *
     * @param User $user
     * @return void
     */
    public function store(User $user)
    {


        return auth()->user()->following()->toggle($user->profile);
    }

    public function index(User $user)
    {
        // NOTE: Might help me get profile of followers
        // $users = auth()->user()->following()->pluck('profiles.user_id');
        // orderBy('created_at', 'DESC') = latest()
        // get() gets all paginate(x) gets x posts
        // $posts = Posts::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        $follows = ($user->following) ? $user->following : false;
        // $follows = $user->following()->pluck('profiles.title');
        // dd($user->following());
        return view('follows.index', compact('follows', 'user'));
    }
}
