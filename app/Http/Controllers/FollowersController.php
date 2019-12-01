<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    /**
     * Returns followering user profile details for user by ID
     *
     * @param User $user
     * @return void
     */
    public function index(User $user)
    {
        $followers = ($user->profile->followers->count()) ? $user->profile->followers : false;
        return view('followers.index', compact('followers', 'user'));
    }
}
