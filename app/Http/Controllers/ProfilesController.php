<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    //

    public function index(User $user)
    {

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        // dd($user->id);
        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            }
        );

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            }
        );
        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            }
        );
        // dd($follows);
        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        // authorise update
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);


        // if has an image, replace it. but if not use old image
        if (request('image')) {
            $imagePath = request('image')->store('storage', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        // dd(array_merge(
        //     $data,
        //     ['image' => $imagePath]
        // ));

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
