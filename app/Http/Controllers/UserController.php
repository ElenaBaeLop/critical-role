<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Show the user profile page
     *
     * @param User $user
     * @return [type] view
     */
    public function show(User $user)
    {
        return view('user.show', [
            'user' => $user
        ]);
    }
    /**
     * Show the user settings page
     *
     * @param User $user
     * @return [type] view
     */
    public function settings(User $user)
    {
        return view('user.settings', [
            'user' => $user
        ]);
    }
    /**
     * Update user bio
     *
     * Will obtain the form data, and will change the biography to a new one
     *
     * @param User $user
     * @param Request $request
     *
     * @return [type] Redirect to profile page
     */
    public function updateBio(User $user, Request $request)
    {
        $request->validate([
            'biography' => 'required|string'
        ]);

        $user->update([
            'biography' => trim($request->input('biography'))
        ]);

        return redirect('/profile/'.Auth::user()->username)->with('success', 'Biography updated successfully');
    }
    /**
     * Update user discord tag
     *
     * Will obtain the form data, and will change the discord tag to a new one
     *
     * @param User $user
     * @param Request $request
     *
     * @return [type] Redirect to profile page
     */
    public function updateDiscord(User $user, Request $request)
    {
        // PATRON ^.{3,32}#[0-9]{4}$
        $request->validate([
            'discord_tag' => 'required|string|regex:/^.{3,32}#[0-9]{4}$/'
        ]);

        $user->update([
            'discord_tag' => trim($request->input('discord_tag'))
        ]);

        return redirect('/profile/'.Auth::user()->username)->with('success', 'Discord tag updated successfully');
    }

    /**
     * Update user password
     *
     * Will obtain the form data, and will change the password to a new one
     * in case of the old password being correct.
     * If the oldpassword is not the same as the one in the database or the new one is the same, an error will be shown
     *
     * @param Request $request
     *
     * @return [type] Redirect to profile page
     */
    public function updatePassword(Request $request)
    {
        request()->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8'
        ]);

        $oldPass = $request->input('oldPassword');
        $newPass = $request->input('newPassword');

        if ($user = User::find(auth()->user()->id)) {
            if ($oldPass !== $newPass) {
                if (Hash::check($oldPass, auth()->user()->password)) {
                    $user->password = $newPass;
                    $user->save();
                    session()->flash('success','Password changed');
                    return redirect('/profile/'.Auth::user()->username);
                } else {
                    throw ValidationException::withMessages([
                        'oldPassword' => "Incorrect password."
                    ]);
                }
            } else {
                throw ValidationException::withMessages([
                    'newPassword' => "The password cannot be the same."
                ]);
            }
        }
    }
    /**
     * Update user email
     *
     * Will obtain the form data, and will change the email to a new one
     * in case of the new email being different from the one in the database.
     * If the email is the same, an error will be shown
     *
     * @param Request $request
     *
     * @return [type] Redirect to profile page
     */
    public function updateEmail(Request $request)
    {
        request()->validate([
            'email' => 'required|email'
        ]);

        $email = $request->input('email');

        if ($user = User::find(auth()->user()->id)) {
            if ($email !== $user->email) {
                $user->email = $email;
                $user->save();
                session()->flash('success','Email changed');
                return redirect('/profile/'.Auth::user()->username);
            } else {
                throw ValidationException::withMessages([
                    'email' => "The email cannot be the same."
                ]);
            }
        }
    }
    /**
     * Update user game_likes
     *
     * Will obtain the form data, and will change the game_likes to a new one
     *
     * @param User $user
     * @param Request $request
     *
     * @return [type] Redirect to profile page
     */
    public function updateLikes(User $user, Request $request)
    {
        $request->validate([
            'game_likes' => 'required|string'
        ]);

        $user->update([
            'game_likes' => trim($request->input('game_likes'))
        ]);

        return redirect('/profile/'.Auth::user()->username)->with('success', 'Game likes updated successfully');
    }
}
