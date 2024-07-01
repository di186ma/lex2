<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ConfirmPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showConfirmForm()
    {
        return view('auth.passwords.confirm');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => [__('The provided password does not match our records.')],
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended($this->redirectPath());
    }

    protected function redirectPath()
    {
        return '/home';
    }
}
