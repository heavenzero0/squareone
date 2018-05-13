<?php
use Illuminate\Support\Facades\Route;
//use Illuminate\Http\Request;


//USERS


Route::resource('users', 'Api\User\UserController', ['except' => ['create', 'edit']]);





Route::post('login', 'Api\Auth\LoginController@login')->name('auth.login');
Route::post('register', 'Api\Auth\RegisterController@register')->name('auth.register');