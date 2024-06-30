<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        // Применяем middleware 'auth' ко всем методам этого контроллера
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:255' . Auth::id(),
            'first_name' => 'required|string|max:255' . Auth::id(),
            'phone_number' => 'required|string|max:20' . Auth::id(),
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'age' => 'required|integer' . Auth::id(),
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update($request->all());

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
}
