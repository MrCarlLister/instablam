@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-3">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle p-5" style="height:250px;">
        </div>

        <div class="col-md-9 pt-5 ">
            <div class="d-flex justify-content-between align-items-baseline">
                <div ><h1 class="d-flex align-items-center">{{ $user->username }}
                <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>
                </h1></div>
                <div>
                @can('update',$user->profile)
                    <a href="{{$user->id}}/edit">Edit profile</a>
                @endcan

                @can('update',$user->profile)
                    <a href="/p/create">Add new post</a>
                @endcan
                </div>
            </div>
            <div class="d-flex pt-3">
            <div class="pr-4"><strong>{{$postCount}}</strong> posts</div>
                <div class="pr-4">
                    @if($followersCount>0)
                        <a href="/profile/{{$user->id}}/followers"><strong>{{$followersCount}}</strong> followers</a>
                    @else
                    <strong>{{$followersCount}}</strong> followers
                    @endif
                </div>
                <div class="pr-4">
                    @if($followingCount>0)
                        <a href="/profile/{{$user->id}}/follows"><strong>{{$followingCount}}</strong> following</a>
                    @else
                        <strong>{{$followingCount}}</strong> following
                    @endif
                </div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div class="">{{$user->profile->description}}</div>
            <div class="font-weight-bold"><a href="https://mrcarllister.co.uk">{{ $user->profile->url ?? 'n/a'}}</a></div>
        </div>
    </div>

    <div class="row my-4">
        @foreach ($user->posts as $post)
        <div class="col-4 pb-4"><a href="/p/{{$post->id}}"><img src="/storage/{{ $post->image }}" class="img-fluid"></a></div>

        @endforeach

    </div>
</div>
@endsection
