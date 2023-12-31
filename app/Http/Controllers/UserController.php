<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function create()
    {
        return view('users.create');
    }

//    store new user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        //  hash password
        $formFields['password'] = bcrypt($formFields['password']);

//        create user
        $user = User::create($formFields);

//        login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and login successfully.');
    }

//    logout user
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'User logout successfully.');
    }

//    login form
    public function loginForm()
    {
        return view('users.login');
    }

//    login user(authenticate)
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'User login successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // dashboard profile
    public function profile()
    {
        $user = auth()->user();
        return view('users.userProfileDescription', compact('user'));
    }

    // user followed event
    public function followedEvent()
    {
        $user = auth()->user();
        $events = $user->transaksis()->with('event')->get();
        return view('users.userFollowedEvent', compact('events', 'user'));
    }

    public function article(){
        $user = auth()->user();
        return view('users.userArticle', compact('user'));
    }

    // show edit profile
    public function edit()
    {
        $user = auth()->user();
        return view('users.editProfile', compact('user'));
    }

    // update profile
    public function update(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('avatar')) {
            $formFields['avatar'] = $request->file('avatar')->store('images', 'public');
        }

        $user = auth()->user();
        $user->update($formFields);

        return redirect('/profile/' . $user->id)->with('message', 'User updated successfully.');
    }
}

