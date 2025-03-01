<?php

use App\Http\Controllers\User\UserAuthentication;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('user')->middleware('guest:web,admin,student')->group(function () {

    Route::get('login', [UserAuthentication::class, 'create']);
    Route::post('login', [UserAuthentication::class, 'authenticate'])->name('login');

});


Route::prefix('user')->middleware(['auth:web'])->group(function () {

    Route::post('logout', [UserAuthentication::class, 'destroy'])->name('user.logout');

    Route::get('/dashboard', function () {
        return view('user.dashboard-user');
    })->name('user.dashboard');

});


require __DIR__ . '/student.php';

require __DIR__ . '/admin.php';
