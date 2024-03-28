<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UpdateProfile;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display the registration form.
     *
     * @return [type] Redirect to register.create view
     */
    public function create()
    {
        return view('register.create');
    }
    /**
     * Store a new user in the database.
     *
     * @return [type] Redirect to home view
     */
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:255',
        ]);

        auth()->login(User::create($attributes));
        //Notificarles de que actualicen su perfil
        auth()->user()->notify(new UpdateProfile());

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
