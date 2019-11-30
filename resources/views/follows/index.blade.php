@extends('layouts.app')

@section('content')
{{-- {{dd($follows)}} --}}
<div class="container">
    @if($follows)
            <div class="row justify-content-center text-center my-5">
                <div class="col-12 col-md-8">
                    <h4>{{$user->username}} is following {{$user->following->count()}} users</h4>
                </div>
            </div>
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
            @else
            <div class="row justify-content-center text-center my-5">
                <div class="col-12 col-md-8">
                    <h4>{{$user->username}} is not following anyone</h4>
                </div>
            </div>
        @endif
</div>
@endsection
