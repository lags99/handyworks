<?php

use App\Http\Controllers\Auth\Admin\AdminLoginController;
use App\Http\Controllers\Auth\Admin\BackendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SpecializationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//PagesController
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/booking', [PageController::class, 'booking'])->name('booking');
Route::post('/contact', [PageController::class, 'contact'])->name('contact');

Auth::routes(['verify' => true]);
//RegisterController
Route::get('/pre-register', [RegisterController::class, 'registerForm'])->name('pre_register');
//BookingController
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking', [BookingController::class, 'store']);

//Google OAuth
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('google.auth');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);

//Facebook OAuth
Route::get('/login/facebook', [LoginController::class, 'redirectToFacebook'])->name('facebook.auth');

Route::get('/login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);
//PostController
Route::get('/hw-backend/post-create', [PostController::class, 'create'])->name('post_create');
Route::get('/hw-backend/post-edit/{post}', [PostController::class, 'edit'])->name('post_edit');
Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::post('/blog', [PostController::class, 'store']);
Route::get('/blog/{post}', [PostController::class, 'single'])->name('single');
Route::put('/hw-backend/posts/{post}', [PostController::class, 'update'])->name('post_update');
Route::delete('/hw-backend/posts/{post}', [PostController::class, 'destroy'])->name('post_destroy');

//CommentController
Route::post('/blog/{post}', [CommentController::class, 'store'])->name('add_comment');

//HomeController
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/complete-profile', [HomeController::class, 'complete_profile'])->name('complete_profile');
Route::put('/complete-profile', [HomeController::class, 'set_complete']);
Route::put('/upload-profile', [HomeController::class, 'upload_profile'])->name('upload_profile');
Route::put('/add-personal', [HomeController::class, 'add_personal_info'])->name('add_personal');

//CertificateController
Route::post('/add_certificate', [CertificateController::class, 'store'])->name('add_certificate');


// Specialization Controller
Route::post('add-service', [SpecializationController::class, 'store'])->name('service.store');

// Backend Routes
Route::get('/hw-admin', [AdminLoginController::class, 'index'])->name('login_admin');
Route::get('/hw-backend', [BackendController::class, 'index'])->name('backend');
Route::get('/hw-backend/view-user/{user}', [BackendController::class, 'view_user'])->name('view_user');
Route::post('/hw-backend/admin-login', [AdminLoginController::class, 'admin_login'])->name('admin_login');
Route::post('/hw-backend/not-accepted/{user}', [BackendController::class, 'not_accepted'])->name('not_accepted');
Route::put('/hw-backend/set-approved/{specialization}', [BackendController::class, 'set_approved'])->name('set_approved');
Route::get('/hw-backend/posts', [BackendController::class, 'view_posts'])->name('posts');

// Interview Controller
Route::post('/hw-backend/interviews/store/{user}', [InterviewController::class, 'store'])->name('set_interview');
Route::get('/hw-backend/interviews', [InterviewController::class, 'index'])->name('interviews');
Route::put('/hw-backend/interviewed/{user}', [InterviewController::class, 'update'])->name('interviewed');

//CityController
Route::get('/hw-backend/cities', [CityController::class, 'index'])->name('city');
Route::post('/hw-backend/cities', [CityController::class, 'store']);
