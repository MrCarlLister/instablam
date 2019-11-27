<?php

namespace App\Http\Controllers;

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
}
