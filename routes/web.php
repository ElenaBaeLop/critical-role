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

//Ruta para mostrar todas las campañas
Route::get('join-campaign', [CampaignController::class, 'index']);
//Ruta para mostrar una campaña
Route::get('campaigns/{campaign:slug}', [CampaignController::class, 'show']);
//Ruta para mostrar formulario de creacion y ruta para almacenar una campaña
Route::get('create-campaign', [CampaignController::class, 'create']);
Route::post('create-campaign', [CampaignController::class, 'store']);
//Ruta para eliminar una campaña
Route::delete('campaigns/{campaign:slug}', [CampaignController::class, 'destroy']);
//Ruta para mostrar formulario de edición y ruta para actualizar
Route::get('edit-campaign/{campaign:slug}', [CampaignController::class, 'edit']);
Route::patch('edit-campaign/{campaign:slug}', [CampaignController::class, 'update']);

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
Route::patch('profile/{user:username}/edit-likes', [UserController::class, 'updateLikes']);

//Sessions
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
