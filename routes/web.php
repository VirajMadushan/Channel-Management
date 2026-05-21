<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingComController;
// ─────────────────────────────────────────────────────────
// AUTH ROUTES (no login required)
// ─────────────────────────────────────────────────────────
Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

// ─────────────────────────────────────────────────────────
// PROTECTED ROUTES (must be logged in)
// ─────────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    // Properties
    Route::get('/properties',           [HomeController::class, 'properties'])->name('properties');
    Route::get('/properties/add',       [HomeController::class, 'add_property'])->name('add_property');
    Route::post('/properties',          [HomeController::class, 'store_property'])->name('properties.store');
    Route::get('/properties/{id}/edit', [HomeController::class, 'edit_property'])->name('properties.edit');
    Route::put('/properties/{id}',      [HomeController::class, 'update_property'])->name('properties.update');
    Route::delete('/properties/{id}',   [HomeController::class, 'delete_property'])->name('properties.delete');

    // Rooms
    Route::get('/rooms',                [HomeController::class, 'rooms'])->name('rooms');
    Route::get('/rooms/add',            [HomeController::class, 'add_room'])->name('add_room');
    Route::post('/rooms',               [HomeController::class, 'store_room'])->name('rooms.store');
    Route::get('/rooms/{id}/edit',      [HomeController::class, 'edit_room'])->name('rooms.edit');
    Route::put('/rooms/{id}',           [HomeController::class, 'update_room'])->name('rooms.update');
    Route::delete('/rooms/{id}',        [HomeController::class, 'delete_room'])->name('rooms.delete');

    // Channels (OTAs)
    Route::get('/channels',             [HomeController::class, 'channels'])->name('channels');
    Route::get('/channels/connect',     [HomeController::class, 'connect_channel'])->name('connect_channel');
    Route::post('/channels',            [HomeController::class, 'store_channel'])->name('channels.store');
    Route::put('/channels/{id}',        [HomeController::class, 'update_channel'])->name('channels.update');
    Route::delete('/channels/{id}',     [HomeController::class, 'delete_channel'])->name('channels.delete');

    // Rates & Availability
    Route::get('/rates',                [HomeController::class, 'rates'])->name('rates');
    Route::post('/rates',               [HomeController::class, 'store_rate'])->name('rates.store');
    Route::put('/rates/{id}',           [HomeController::class, 'update_rate'])->name('rates.update');

    // Reservations
    Route::get('/reservations',         [HomeController::class, 'reservations'])->name('reservations');
    Route::get('/booking',              [HomeController::class, 'booking'])->name('booking');
    Route::post('/reservations',        [HomeController::class, 'store_reservation'])->name('reservations.store');
    Route::put('/reservations/{id}',    [HomeController::class, 'update_reservation'])->name('reservations.update');
    Route::delete('/reservations/{id}', [HomeController::class, 'delete_reservation'])->name('reservations.delete');

    // Reports
    Route::get('/reports',              [HomeController::class, 'reports'])->name('reports');

    // Settings
    Route::get('/settings',             [HomeController::class, 'settings'])->name('settings');
    Route::post('/settings',            [HomeController::class, 'update_settings'])->name('settings.update');

});
// ─────────────────────────────────────────────────────────
// BOOKING.COM API ROUTES
// These are called by Booking.com — NO auth middleware
// ─────────────────────────────────────────────────────────
use App\Http\Controllers\BookingComController;

Route::prefix('api/booking')->group(function () {

    // Booking.com sends new reservations to this URL
    // Give this URL to Booking.com: http://yourdomain.com/api/booking/webhook
    Route::post('/webhook', [BookingComController::class, 'webhook'])
        ->name('booking.webhook');

    // Below routes require admin login
    Route::middleware('auth')->group(function () {

        // Manually pull reservations from Booking.com
        Route::get('/reservations/pull', [BookingComController::class, 'pullReservations'])
            ->name('booking.pull');

        // Push your rates to Booking.com
        Route::post('/push-rates', [BookingComController::class, 'pushRates'])
            ->name('booking.push.rates');

        // Push room availability to Booking.com
        Route::post('/push-availability', [BookingComController::class, 'pushAvailability'])
            ->name('booking.push.availability');

    });
});