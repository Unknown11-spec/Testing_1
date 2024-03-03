<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LikePhotoController;
use App\Http\Controllers\AlbumController;

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

// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::get('/', [PhotoController::class, 'home'])->name('home');


// Route::get('/home',function()
// {
//     return view ('layouts.app');
// })->name('home');

// Route::get('/login', function()
// {
//     return view ('pages.login');
// })->name('login');



Route::get('/register', function()
{
    return view ('pages.register');
})->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'processRegister'])->name('register.process');

Route::get('/logout', function(){
    Auth::logout();
    Alert::success('berhasil logout');
    return redirect()->route('login.index');
});


Route::get('/profile', function()
{
    return view ('pages.profile');
});

Route::get('/home', function()
{
    return view ('pages.home');
});

Route::get('/post_photo', function()
{
    return view ('pages.post_photo');
});


Route::controller(PhotoController::class)->middleware('auth')->name('photo.')->group(function() {
    Route::get('/photo/{photo_id}', 'index')->name('index');
    Route::get('/post', 'postPhoto')->name('post');
    Route::post('/post', 'postPhotoProcess')->name('postProcess');
    Route::put('/photo/{photo_id}', 'updatePhoto')->name('update');
    Route::delete('/photo/{photo_id}', 'deletePhoto')->name('delete');

});


Route::controller(LikePhotoController::class)->middleware('auth')->name('like_photo.')->group(function() {
    Route::post('/like', 'like')->name('like');
    Route::post('/unlike', 'unlike')->name('unlike');
});

Route::controller(CommentController::class)->middleware('auth')->name('comment.')->group(function() {
    Route::post('/comment', 'post')->name('post');
    Route::put('/comment/{comment_id}', 'updateComment')->name('update');
    Route::delete('/comment/{comment_id}', 'deleteComment')->name('delete');
});

Route::controller(ProfileController::class)->name('profile.')->group(function() {
    Route::get('/profile', 'index')->name('index');
    Route::get('/profile/{user_id}', 'people')->name('people');
    Route::put('/profile', 'updateProfile')->name('update');
});

Route::controller(AlbumController::class)->name('album.')->group(function() {
    Route::get('/album/{user_id}', 'index')->name('index');
    Route::get('/data-album/{album_id}', 'data_album')->name('data_album');
});
 
Route::controller(AlbumController::class)->middleware('auth')->name('album.')->group(function() {
    Route::get('/create_album', 'create_album')->name('create_album');
    Route::post('/create_album', 'postAlbumProcess')->name('create_album_post');
    Route::delete('/album/{album_id}', 'deleteAlbum')->name('delete');
});