<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $idNumber = $request->input('id_number');

        // Check if the user with the given id_number exists
        $user = User::where('id_number', $idNumber)->first();

        if ($user) {
            // User found, log in the user
            Auth::login($user);

            return redirect()->intended('/');
        }

        // User not found
        return back()->withErrors(['id_number' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
    //
}
