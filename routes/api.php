<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\JournalController;
Route::get('/journeys',[JourneyController::class,'index']);
Route::get('/journeys/{journey}',[JourneyController::class,'show']);
Route::get('/journals',[JournalController::class,'index']);
Route::post('/bookings',[BookingController::class,'store'])->middleware('throttle:20,1');
