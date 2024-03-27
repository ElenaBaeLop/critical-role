<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    /**
     * Display the login form.
     *
     * @return [type] Redirect to sessions.create view
     */
    public function create()
    {
        return view('sessions.create');
    }
    /**
     * Store a new session in the database.
     *
     * @return [type] Redirect to home view
     */
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    }
    /**
     * Destroy the session in the database.
     *
     * @return [type] Redirect to home view
     */
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
