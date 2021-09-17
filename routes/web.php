<?php

use Illuminate\Support\Facades\Route;


Route::prefix('form')->group(function () {
    Route::get('/',[App\Http\Controllers\FormBuilderController::class, 'index'])->name('home');
    Route::get('/create',[App\Http\Controllers\FormBuilderController::class, 'createPage'])->name('create.page');
    Route::post('/save',[App\Http\Controllers\FormBuilderController::class, 'save'])->name('save.form');
    Route::get('/show/{id}',[App\Http\Controllers\FormBuilderController::class, 'show'])->name('show.form');
    Route::get('/send/{id}',[App\Http\Controllers\FormBuilderController::class, 'send'])->name('send.form');
    Route::get('/delete-form/{id}',[App\Http\Controllers\FormBuilderController::class, 'delete'])->name('delete.form');
});