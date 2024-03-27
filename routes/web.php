<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CampaignApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Campaigns
Route::get('join-campaign', [CampaignController::class, 'index']);
Route::get('create-campaign', [CampaignController::class, 'create']);
Route::post('create-campaign', [CampaignController::class, 'store']);
Route::get('campaigns/{campaign:slug}', [CampaignController::class, 'show']);
//Campaign Applications
Route::post('campaigns/{campaign:slug}/applications', [CampaignApplicationController::class, 'store']);
Route::delete('campaigns/{campaign:slug}/applications/{application:id}', [CampaignApplicationController::class, 'destroy']);
Route::post('campaigns/{campaign:slug}/applications/{application:id}/accept', [CampaignApplicationController::class, 'accept']);
//User profile
Route::get('profile/{user:username}', [UserController::class, 'show']);
Route::get('profile/{user:username}/edit', [UserController::class, 'settings']);
Route::patch('profile/{user:username}/edit-bio', [UserController::class, 'updateBio']);
Route::patch('profile/{user:username}/edit-discord', [UserController::class, 'updateDiscord']);
Route::patch('profile/{user:username}/edit-password', [UserController::class, 'updatePassword']);
Route::patch('profile/{user:username}/edit-email', [UserController::class, 'updateEmail']);

//Sessions
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
