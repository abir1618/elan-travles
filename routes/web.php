<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\JournalController;
Route::view('/', 'site');
Route::get('/admin/login',[AuthController::class,'loginForm'])->name('login');
Route::post('/admin/login',[AuthController::class,'login'])->name('admin.login');
Route::post('/admin/logout',[AuthController::class,'logout'])->middleware('auth')->name('admin.logout');
Route::middleware(['auth','admin'])->group(function(){
    Route::view('/admin','admin')->name('admin');
    Route::prefix('admin-api')->group(function(){
        Route::get('/dashboard',[BookingController::class,'dashboard']);
        Route::get('/journeys',[JourneyController::class,'index']);
        Route::post('/journeys',[JourneyController::class,'store']);
        Route::put('/journeys/{journey}',[JourneyController::class,'update']);
        Route::delete('/journeys/{journey}',[JourneyController::class,'destroy']);
        Route::get('/bookings',[BookingController::class,'index']);
        Route::patch('/bookings/{booking}',[BookingController::class,'update']);
        Route::delete('/bookings/{booking}',[BookingController::class,'destroy']);
        Route::get('/journals',[JournalController::class,'index']);
        Route::post('/journals',[JournalController::class,'store']);
        Route::put('/journals/{journal}',[JournalController::class,'update']);
        Route::delete('/journals/{journal}',[JournalController::class,'destroy']);
    });
});
