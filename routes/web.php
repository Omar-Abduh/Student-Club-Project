<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' =>'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        // login
        Route::get('login', [AdminController::class, 'index'])->name('admin.login');
        // register
        Route::get('register', [AdminController::class, 'register'])->name('admin.register');
        // login authenticate
        Route::post('login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        // logout
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        // dashboard
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        // forms
        Route::get('form', [AdminController::class, 'form'])->name('admin.form');
        // table
        Route::get('table', [AdminController::class, 'table'])->name('admin.table');

        // Academic year Managment
        // academic year -> create
        Route::get('academic-year/create', [AcademicYearController::class, 'create'])->name('academic-year.create');
        // academic year -> store
        Route::post('academic-year/store', [AcademicYearController::class, 'store'])->name('academic-year.store');
        // academic year -> view
        Route::get('academic-year/view', [AcademicYearController::class, 'index'])->name('academic-year.index');
        // academic year -> delete
        Route::get('academic-year/delete/{id}', [AcademicYearController::class, 'destroy'])->name('academic-year.delete');
        // academic year -> edit
        Route::get('academic-year/edit/{id}', [AcademicYearController::class, 'edit'])->name('academic-year.edit');
        // academic year -> update
        Route::post('academic-year/update', [AcademicYearController::class, 'update'])->name('academic-year.update');

        // Student Managment
         // Student -> create
         Route::get('student/create', [StudentDataController::class, 'create'])->name('student.create');
         // Student -> store
         Route::post('student/store', [StudentDataController::class, 'store'])->name('student.store');
         // Student -> view
         Route::get('student/view', [StudentDataController::class, 'index'])->name('student.index');
         // Student -> delete
         Route::get('student/delete/{id}', [StudentDataController::class, 'destroy'])->name('student.delete');
         // Student -> edit
         Route::get('student/edit/{id}', [StudentDataController::class, 'edit'])->name('student.edit');
         // Student -> update
         Route::post('student/update', [StudentDataController::class, 'update'])->name('student.update');
    });
});
