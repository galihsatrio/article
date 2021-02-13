<?php

use Illuminate\Support\Facades\Route;



Route::get('/login', 'AuthController@login');
ROute::post('/login/post', 'AuthController@postLogin');
Route::get('/register', 'AuthController@register');
Route::post('/register/post', 'AuthController@postRegister');
Route::get('/logout', 'AuthController@logout');

Route::get('/', 'ArticleController@index')->name('article');
Route::get('/article/{category:name}', 'ArticleController@category');
Route::get('/article/author/{user:name}', 'ArticleController@author');
Route::get('/{id}/show', 'ArticleController@show');
Route::get('/create', 'ArticleController@create');
Route::post('/create/post', 'ArticleController@store');
Route::get('/article/{id}/edit', 'ArticleController@edit');
Route::post('/article/{article}/update', 'ArticleController@update');

Route::get('/article/{id}/delete', 'ArticleController@destroy');
