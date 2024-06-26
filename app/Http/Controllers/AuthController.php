<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showSignUpForm()
    {
        return view('signup');
    }

    public function signUp(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|',
        ]);

        // Debugging step
        Log::info('Sign Up Request Data: ', $request->all());

        // Create and save the user
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer'; // Default role for new users
            $user->save();

            Log::info('User saved successfully: ', $user->toArray());

            return redirect()->route('signin')->with('success', 'User registered successfully! Please sign in.');
        } catch (\Exception $e) {
            Log::error('Error saving user: ', ['error' => $e->getMessage()]);
            Log::error($e); // Log the entire exception

            return redirect()->back()->with('error', 'An error occurred while registering the user.');
        }
    }

    public function showSignInForm()
    {
        return view('signin');
    }

    public function signIn(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Retrieve the user's name
            $user = Auth::user();
            $request->session()->put('username', $user->name);
            $request->session()->put('userid', $user->id);
    
            return redirect()->route('home')->with('success', 'You are signed in!');
        }
    
        return redirect()->route('signin')->with('error', 'Invalid email or password.');
    }
    
}
