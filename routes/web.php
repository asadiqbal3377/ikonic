<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoteController;


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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/home', [HomeController::class, 'home'])->name('home');


/**
 * 
 * 
 * Admin routes
 */
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('dashboard');
Route::get('/admin/feedbacks', [AdminController::class, 'adminFeedback'])->name('admin.feedback');
Route::get('/admin/users', [AdminController::class, 'adminUser'])->name('admin.user');
Route::delete('/admin/users/{user}', [AdminController::class, 'userDestroy'])->name('users.destroy');
Route::delete('/admin/users/{feedback}', [AdminController::class, 'FeedbackDestroy'])->name('feedback.destroy');



/**
 * 
 * 
 * Vote routes
 */
Route::post('/vote', [VoteController::class, 'vote'])->name('vote.store');



/**
 * 
 * 
 * Feedback routes
 */
Route::resource('feedback', FeedbackController::class);
Route::post('feedback/{feedback}', [FeedbackController::class, 'addComment'])->name('feedback.comment');
Route::post('/feedback/like', [FeedbackController::class, 'like'])->name('feedback.like');


/**
 * 
 * 
 * Logout routes
 */
    Route::get('/logout',function(){
        Auth::logout();
        return redirect('/login');
    });

