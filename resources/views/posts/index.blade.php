@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
    <div class="row align-items-center justify-content-center mb-5">
        <div class="col-md-6">
            <a href="/profile/{{ $post->user->id}}"><img src="/storage/{{$post->image}}" class="img-fluid"></a>
            <div class="d-flex align-items-center">

                <img src="{{$post->user->profile->profileImage()}}" alt="" class="w-100 rounded-circle " style="max-width:60px;">

                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column">
                        <span class="small font-weight-bold"><a href="/profile/{{$post->user->id}}" class="text-dark">{{$post->user->username}}</a></span>
                    </div>
                </div>


            </div>
            <hr>

            <div class="align-items-center d-flex pl-4">
                <p>{{$post->caption}}</p>
            </div>
        </div>
    </div>
    @endforeach

    <div class="row align-items-center justify-content-center mb-5 ">
        <div class="col-md-6 d-flex justify-content-center">
            {{-- Used with paginate() in @PostsController --}}
            {{ $posts->links() }}
        </div>
    </div>



</div>
@endsection
