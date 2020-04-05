@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRkdAJUFpEFaX8p4z4jFB49VL8w7g7GvIdro94o6oHWeFedZLVy" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-lg-baseline">
                <h1>{{ $user -> username }}</h1>
                <a href="#">Add new post</a>
            </div>
            
            <div class="d-flex">
                <div class="pr-5"><strong>153</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> followers</div>
                <div class="pr-5"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user -> profile -> title }}</div>
            <div>{{ $user -> profile -> description }}</div>
            <div><a href="{{ $user -> profile -> url }}">{{ $user -> profile -> url ?? 'N/A' }}</a></div>
        </div>
    </div>
    <div class="row pt-4">
    <div class="col-4">
        <img src="https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="w-100">
    </div>
    <div class="col-4">
        <img src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="w-100">
    </div>
    <div class="col-4">
        <img src="https://images.pexels.com/photos/574077/pexels-photo-574077.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="w-100">
    </div>
</div>
</div>

@endsection
