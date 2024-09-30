<?php

use App\Http\Controllers\TrixAttachmentController;
use App\Livewire\Counter;
use App\Livewire\Post;
use App\Livewire\User\UserIndex;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', UserIndex::class);

Route::get('/post', Post::class);

Route::get('/counter', Counter::class);

Route::post('/attachments', [TrixAttachmentController::class, 'store']);

Route::post('/attachments/delete', [TrixAttachmentController::class, 'remove']);