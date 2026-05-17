<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/properties',[HomeController::class, 'properties'])->name('properties');
Route::get('/add_property',[HomeController::class, 'add_property'])->name('add_property');
Route::get('/booking',[HomeController::class, 'booking'])->name('booking');
Route::get('/channels',[HomeController::class, 'channels'])->name('channels');
Route::get('/connect_channel',[HomeController::class, 'connect_channel'])->name('connect_channel');
Route::get('/rates',[HomeController::class, 'rates'])->name('rates');
Route::get('/reservations',[HomeController::class, 'reservations'])->name('reservations');
Route::get('/rooms',[HomeController::class, 'rooms'])->name('rooms');
Route::get('/add_room',[HomeController::class, 'add_room'])->name('add_room');
Route::get('/settings',[HomeController::class, 'settings'])->name('settings');
Route::get('/reports',[HomeController::class, 'reports'])->name('reports');
Route::get('/reservations',[HomeController::class, 'reservations'])->name('reservations');