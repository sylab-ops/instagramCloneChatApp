@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
         <div class="col-3 p-5">
            <img src="/svg/logo.jpg" class="rounded-circle" style="height:100px; margin-right:20px w-800">
         </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user->username}}</h1>

                {{--Give access to the edit link only to  authorize users--}}
                @can ('update', $user->profile)
                    <!-- Create new Post -->
                        <a href="/p/create">Add New Post</a>
                    @endcan
                </div>

            {{--Give access to the edit link only to  authorize users--}}
                @can ('update', $user->profile)
                    <!-- Edit profile link -->
                    <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan

                    <div class="d-flex">
                        <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                        <div class="pr-5"><strong>23k</strong> followers</div>
                        <div class="pr-5"><strong>212</strong> following</div>
                    </div>
                    <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                    <div>{{$user->profile->description}}</div>

                    <!-- <div>We're a global community of people learning to code together. We are an open source project
                    foundation!</div> -->
                   <div> <a href="https://sylabrahamblueprint.netlify.com/">{{$user->profile->url}}</a>
                   </div>
</div>
    </div>

     <!-- Image posts containers -->
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image }}" class="w-100" >

                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
