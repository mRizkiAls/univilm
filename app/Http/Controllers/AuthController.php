<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin() {
        return view('UniVilm.signin');
    }

    public function showRegister() {
        return view('UniVilm.signup');
    }

    public function register(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/home');
    }

    public function login(Request $request)
{
    $login = $request->login;
    $password = $request->password;

  
    $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

    if (Auth::attempt([$field => $login, 'password' => $password])) {
        return redirect('/home');
    }

    return back()->with('error', 'Login gagal');
}

    public function logout() {
        Auth::logout();
        return redirect('/home');
    }

public function updateProfile(Request $request)
{
    $user = Auth::user();

    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('profiles', 'public');
        $user->photo = $path;
    }

    $user->name = $request->name;
    $user->email = $request->email;

    $user->save();

    return back()->with('success', 'Profile berhasil diupdate');
}

public function updatePassword(Request $request)
{
    $user = Auth::user();

    if (!Hash::check($request->old_password, $user->password)) {
        return back()->with('error', 'Password lama salah');
    }

    if ($request->new_password !== $request->new_password_confirmation) {
        return back()->with('error', 'Konfirmasi password tidak sama');
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('success', 'Password berhasil diubah');
}
}