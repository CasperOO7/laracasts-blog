<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostCommentController;

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

Route::get('/ping', function () {
    $mailchimp = new \MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
	'apiKey' => config('services.mailchimp'),
	'server' =>'us14'
]);

$res=$mailchimp->ping->get();


dd($res);
});

Route::get('/',[PostController::class,'index'])->name('home');


Route::get('/posts/{post:slug}',[PostController::class,'show']);

Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store'])->middleware('auth');

Route::get('login',[SessionController::class,'create'])->middleware('guest');
Route::post('authenticate',[SessionController::class,'authenticate'])->middleware('guest');

Route::post('logout',[SessionController::class,'destroy'])->middleware('auth');


