@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center">
            <div class="col-md-8"><img src="/storage/{{$post->image}}" class="img-fluid"></div>
            <div class="col-md-4">
                <div class="d-flex align-items-center">
                    <div>
                        <img src="{{$post->user->profile->profileImage()}}" alt="" class="w-100 rounded-circle " style="max-width:60px;">
                    </div>
                    <div class="pl-3"><span class="sall font-weight-bold"><a href="/profile/{{$post->user->id}}" class="text-dark">{{$post->user->username}}</a></span></div>
                    <div> | <a href="">Follow</a></div>
                </div>
                <hr>
                <div>
                    <p><strong><a href="/profile/{{$post->user->id}}" class="text-dark">{{$post->user->username}}</a></strong> {{$post->caption}}</p>
                </div>
            </div>

    </div>

    <div class="row">

    </div>


</div>
@endsection
