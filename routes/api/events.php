<?php
use Illuminate\Support\Facades\Route;

Route::get('/events','EventController@index');
Route::group(['middleware' => 'auth:api'],function(){
    Route::get('/events/{id}','EventController@userEvents');
});
