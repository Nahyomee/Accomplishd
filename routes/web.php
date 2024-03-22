<?php

use App\Http\Controllers\PushController;
use App\Http\Controllers\SystemController;
use App\Livewire\Category\CreateCategory;
use App\Livewire\Category\EditCategory;
use App\Livewire\Category\ShowCategories;
use App\Livewire\ForgotPassword;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\ResetPassword;
use App\Livewire\Tags\CreateTag;
use App\Livewire\Tags\EditTag;
use App\Livewire\Tags\ShowTags;
use App\Livewire\Tasks\CreateTask;
use App\Livewire\Tasks\EditTask;
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
    return view('index');
})->name('index');


//Auth Routes
Route::middleware('guest')->group(function(){
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
    Route::get('forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('reset-password/{token}', ResetPassword::class)->name('password.reset');
});

//Dashboard
Route::middleware('auth')->group(function(){
    Route::prefix('tags')->name('tags.')->group(function(){
        Route::get('/', ShowTags::class)->name('index');
        Route::get('{tag}/edit', EditTag::class)->name('edit');
        Route::get('create', CreateTag::class)->name('create');
        
    });
    Route::prefix('lists')->name('categories.')->group(function(){
        Route::get('/', ShowCategories::class)->name('index');
        Route::get('{category}/edit', EditCategory::class)->name('edit');
        Route::get('create', CreateCategory::class)->name('create');
        
    });
    Route::prefix('tasks')->name('tasks.')->group(function(){
        Route::get('{task}/edit', EditTask::class)->name('edit');
        Route::get('create', CreateTask::class)->name('create');
    });
    
    Route::controller(SystemController::class)->group(function(){
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::post('profile', 'updateprofile');
        Route::get('/task/{status}', 'tasks')->name('tasks.all');
        Route::get('tag/{tag}/tasks', 'tagTasks')->name('tag.tasks');
        Route::get('category/{category}/tasks', 'categoryTasks')->name('category.tasks');
    });
    Route::post('fcm-token', [PushController::class, 'updatetoken'])->name('fcmToken');

    Route::post('logout', function(){
        auth()->logout();
        return redirect()->route('index');
    })->name('logout');
});