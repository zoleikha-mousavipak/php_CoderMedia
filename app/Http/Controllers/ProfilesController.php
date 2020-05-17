<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{

    //    public function index($user)
    // {
    //        $user = \App\User::findOrFail($user);
    //        return view('profiles.index', [
    //            'user' => $user,
    //        ]);
    // }
    // same above
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
        ]);


        if (request('image')) {
            $imagepath = request('image')->store('profile', 'public');

            // manipulate image
            $image = Image::make(\public_path("storage/{$imagepath}"))->fit(1000, 1000);
            $image->save();


        }
   
        auth()->user()->profile()->update(array_merge(
            $data,
            ['image' => $imagepath]
        ));


        return redirect("/profile/{$user->id}");
    }
}
