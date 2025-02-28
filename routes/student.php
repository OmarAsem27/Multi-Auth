<?php

use App\Http\Controllers\Student\StudentAuthentication;
use Illuminate\Support\Facades\Route;




Route::prefix('student')->middleware('guest:student')->group(function () {

    Route::get('login', [StudentAuthentication::class, 'create']);
    Route::post('login', [StudentAuthentication::class, 'authenticate'])->name('student.login');

});


Route::prefix('student')->middleware(['auth:student'])->group(function () {


    Route::post('logout', [StudentAuthentication::class, 'destroy'])->name('student.logout');

    Route::get('/dashboard', function () {
        return view('student.dashboard-student');
    })->name('student.dashboard');


});
