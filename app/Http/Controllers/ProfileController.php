<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;



class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $photos = Photo::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.profile', compact('photos', 'user'));
    }

    public function people($user_id)
    {
        if (!User::find($user_id)) {
            return redirect()->route('home');
        }
        // $user = User::find($user_id)->select('id', 'name', 'avatar', 'created_at')->first();
        $user = User::where('id', $user_id)->select('id', 'name', 'avatar', 'created_at')->first();
        $photos = Photo::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return view('pages.profile', compact('photos', 'user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        if ($request->hasFile('avatar')) {
            if (
                $user->avatar &&
                file_exists(storage_path('app/public/' . $user->avatar))
            ) {
                Storage::delete('public/' . $user->avatar);
            }
            $avatar = $request->file('avatar');
            $avatar_path = $avatar->store('avatars', ['disk' =>
            'public']);
            $user->avatar = $avatar_path;
        }
        $user->name = $request->name;
        $user->update();
        Alert::success('Profil berhasil diupdate!');
        return redirect()->back();
    }
}
