<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Guest routes
// show home page
Route::get('/', [HomeController::class, 'index']);
// show activity page
Route::get('/moreEvents', [EventController::class, 'index']);
// show articles page
Route::get('/moreArticle', [BlogController::class, 'index']);

// Admin routes
Route::middleware(['auth', 'user-role:admin'])->group(function () {
    // show admin dashboard
    Route::get('/dashboard', [AdminController::class, 'index']);
    //    show dashboard activity
    Route::get('/dashboard/activity', [AdminController::class, 'activity']);
    //    show dashboard article
    Route::get('/dashboard/article', [AdminController::class, 'article']);
    //    shoe dashboard user
    Route::get('/dashboard/user', [AdminController::class, 'user']);
    // show create form
    Route::get('/event/create', [EventController::class, 'create']);
    // store event
    Route::post('/event', [EventController::class, 'store']);
    // show edit form
    Route::get('/event/{event}/edit', [EventController::class, 'edit']);
    // update event
    Route::put('/event/{event}', [EventController::class, 'update']);
    // delete event
    Route::delete('/event/{event}', [EventController::class, 'destroy']);


    // show create blog form
    Route::get('/blog/create', [BlogController::class, 'create']);
    // store blog
    Route::post('/blog', [BlogController::class, 'store']);
    // show edit blog form
    Route::get('/blog/{blog}/edit', [BlogController::class, 'edit']);
    // update blog
    Route::put('/blog/{blog}', [BlogController::class, 'update']);
    // delete blog
    Route::delete('/blog/{blog}', [BlogController::class, 'destroy']);
});


// Dashboard Profile
Route::get('/profile/{user_id}', [UserController::class, 'profile'])->middleware('auth');
// User followed event
Route::get('/profile/{user_id}/followedEvent', [UserController::class, 'followedEvent'])->middleware('auth');
// show article profile
Route::get('/profile/{user_id}/article', [UserController::class, 'article'])->middleware('auth');
// show edit profile
Route::get('/profile/{user_id}/edit', [UserController::class, 'edit'])->middleware('auth');
// update profile
Route::put('/profile/{user_id}', [UserController::class, 'update'])->middleware('auth');


// show blog detail
Route::get('/blog/{blog}', [BlogController::class, 'show']);
// show event detail
Route::get('/event/{event}', [EventController::class, 'show']);

//Join event
Route::post('/joinEvent/{event}', [EventController::class, 'joinEvent'])->middleware('auth')->name('joinEvent');

// show register form
Route::get('/registerForm', [UserController::class, 'create'])->middleware('guest');
// store new user
Route::post('/users', [UserController::class, 'store']);
//logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
//login user form
Route::get('/loginForm', [UserController::class, 'loginForm'])->name('login')->middleware('guest');
//login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

require __DIR__ . '/auth.php';
