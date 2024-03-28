<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserNotificationController;
use App\Http\Controllers\CampaignApplicationController;
use Illuminate\Support\Facades\Route;

//Home
Route::get('/', function () {
    return view('welcome');
})->name('home');

//CAMPAIGNS
Route::get('join-campaign', [CampaignController::class, 'index']);
//Ruta para mostrar una campaña
Route::get('campaigns/{campaign:slug}', [CampaignController::class, 'show']);
//Ruta para mostrar formulario de creacion y ruta para almacenar una campaña
Route::get('create-campaign', [CampaignController::class, 'create']);
Route::post('create-campaign', [CampaignController::class, 'store'])->middleware('auth');
//Ruta para eliminar una campaña
Route::delete('campaigns/{campaign:slug}', [CampaignController::class, 'destroy'])->middleware('auth');
//Ruta para mostrar formulario de edición y ruta para actualizar
Route::get('edit-campaign/{campaign:slug}', [CampaignController::class, 'edit'])->middleware('auth');
Route::patch('edit-campaign/{campaign:slug}', [CampaignController::class, 'update'])->middleware('auth');

//APPLICATIONS
Route::post('campaigns/{campaign:slug}/applications', [CampaignApplicationController::class, 'store'])->middleware('auth');
Route::delete('campaigns/{campaign:slug}/applications/{application:id}/delete', [CampaignApplicationController::class, 'destroy'])->middleware('auth');
Route::post('campaigns/{campaign:slug}/applications/{application:id}/accept', [CampaignApplicationController::class, 'accept'])->middleware('auth');
Route::post('campaigns/{campaign:slug}/applications/send-info', [CampaignApplicationController::class, 'sendInfo'])->middleware('auth');

//USER
Route::get('profile/{user:username}', [UserController::class, 'show']);
//User settings
Route::get('profile/{user:username}/edit', [UserController::class, 'settings'])->middleware('auth');
Route::patch('profile/{user:username}/edit-bio', [UserController::class, 'updateBio'])->middleware('auth');
Route::patch('profile/{user:username}/edit-discord', [UserController::class, 'updateDiscord'])->middleware('auth');
Route::patch('profile/{user:username}/edit-password', [UserController::class, 'updatePassword'])->middleware('auth');
Route::patch('profile/{user:username}/edit-email', [UserController::class, 'updateEmail'])->middleware('auth');
Route::patch('profile/{user:username}/edit-likes', [UserController::class, 'updateLikes'])->middleware('auth');
//User notifications
Route::get('profile/{user:username}/notifications', [UserNotificationController::class, 'notifications'])->middleware('auth');
Route::delete('profile/{user:username}/notifications', [UserNotificationController::class, 'destroy'])->middleware('auth');

//SESSIONS
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
