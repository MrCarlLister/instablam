@extends('layouts.app')

@section('content')
{{-- {{dd($followers)}} --}}
<div class="container">
    @if($followers)
            <div class="row justify-content-center text-center my-5">
                <div class="col-12 col-md-8">
                    <h4>{{$user->username}} has {{$user->profile->followers->count()}} followers;</h4>
                </div>
            </div>
            <div class="row">
                @foreach ($followers as $follower)
                {{-- NOTE: Need to get follower user profile --}}
                <div class="col-6 col-md-4">
                    <img src="{{$follower->profile->profileImage()}}" class="img-fluid">
                    <a href="/profile/{{$follower->id}}">{{$follower->username}}</a>
                </div>
            @endforeach

            </div>
            @else
            <div class="row justify-content-center text-center my-5">
                <div class="col-12 col-md-8">
                    <h4>{{$user->username}} is not being followed by anyone</h4>
                </div>
            </div>
        @endif
</div>
@endsection
