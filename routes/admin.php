<?php

use App\Http\Controllers\Admin\AdminAuthentication;
use Illuminate\Support\Facades\Route;




Route::prefix('admin')->middleware('guest:admin,student,web')->group(function () {

    Route::get('login', [AdminAuthentication::class, 'create']);
    Route::post('login', [AdminAuthentication::class, 'authenticate'])->name('admin.login');

});


Route::prefix('admin')->middleware(['auth:admin'])->group(function () {


    Route::post('logout', [AdminAuthentication::class, 'destroy'])->name('admin.logout');

    Route::get('/dashboard', function () {
        return view('admin.dashboard-admin');
    })->name('admin.dashboard');


});
