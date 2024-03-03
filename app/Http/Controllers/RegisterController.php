<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.register');
    }

    public function processRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:225'],
            'nis' => ['required', 'integer', 'min:9'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:3']
        ]);

        $user = User::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if ($user) {
            Alert::success("Registrasi berhasil");
            return redirect()->route('login.index');
        }
        else
        {
            Alert::error("Registrasi gagal");
            return redirect()->back();
        }
    }
}
