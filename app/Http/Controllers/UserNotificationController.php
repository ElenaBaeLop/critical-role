<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    /**
     * Show the user notifications page and mark all unread notifications as read
     *
     * @param User $user
     * @return [type] Redirect to user.notifications view
     */
    public function notifications(){
        $notifications = auth()->user()->readNotifications;
        $unreadNotifications = auth()->user()->unreadNotifications;
        $unreadNotifications->markAsRead();

        return view('user.notifications', [
            'notifications' => $notifications,
            'unreadNotifications' => $unreadNotifications
        ]);
    }
    /**
     * Delete all notifications from the user
     *
     * @param User $user
     * @return [type] Redirect to user.notifications view
     */
    public function destroy(User $user){
        $user->notifications()->delete();
        return back();
    }

}
