@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/storage/{{ $user->profile->image }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-lg-baseline">
                <h1>{{ $user -> username }}</h1>
                @can('update', $user->profile)
                <a href="/p/create">Add new post</a>
                @endcan

            </div>
            @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> followers</div>
                <div class="pr-5"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user -> profile -> title ?? 'N/A'}}</div>
            <div>{{ $user -> profile -> description ?? 'N/A'}}</div>
            <div><a href="{{ $user -> profile -> url ?? 'N/A'}}">{{ $user -> profile -> url ?? 'N/A' }}</a></div>
        </div>
    </div>
    <div class="row pt-4 ">
        @foreach ($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
