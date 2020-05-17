<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        $data = request()->validate([
            'another' => '',
            'caption' => 'required',
            'image' => 'required|image|mimes:jpeg,bmp,png',
        ]);

        $imagepath = request('image')->store('uploads', 'public');

        // manipulate image
        $image = Image::make(\public_path("storage/{$imagepath}"))->fit(700, 700);
        $image->save();


        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagepath,

        ]);

        return redirect('/profile/' . Auth::user()->id);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
