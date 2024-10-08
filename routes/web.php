<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TrixAttachmentController;
use App\Livewire\Counter;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\Post;
use App\Livewire\Post\PostCategory;
use App\Livewire\Post\PostDetail;
use App\Livewire\Role;
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

Route::get('/', Login::class);

Route::get('dashboard', Dashboard::class);

Route::get('/role', Role::class);

Route::get('/user', UserIndex::class);

Route::get('/post-category', PostCategory::class);

Route::get('/post', Post::class);

Route::get('/post-detail/{id}', PostDetail::class);

Route::get('/counter', Counter::class);

Route::post('/attachments', [TrixAttachmentController::class, 'store']);

Route::post('/attachments/delete', [TrixAttachmentController::class, 'remove']);

Route::get('/logout', [AuthController::class, 'logout']);