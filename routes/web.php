<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::controller(UserController::class)->as('user.')->group(function() {
  Route::get('/', 'index')->name('index');
  Route::view('/add', 'layouts.addForm')->name('add');
  Route::post('/add-auth', 'addAuth')->name('add.auth');
  Route::get('/edit/{userId}', 'edit')->name('edit');
  Route::post('/edit-auth', 'editAuth')->name('edit.auth');
  Route::get('/delete/{userId}', 'delete')->name('delete');
});