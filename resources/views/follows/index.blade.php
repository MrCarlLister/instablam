@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($follows as $follower)
        {{-- NOTE: Need to get follower user profile --}}
        {{-- {{dd($follower->user->profile)}} --}}
        <div class="col-6 col-md-4">
            <img src="{{$follower->user->profile->profileImage()}}" class="img-fluid">
            <a href="/profile/{{$follower->id}}">{{$follower->user->username}}</a>
        </div>
    @endforeach

    </div>
</div>
@endsection
