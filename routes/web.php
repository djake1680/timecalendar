<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/management', function () {
    return view('management');
})->middleware('auth');;

Route::get('calendar', 'EventController@index');

Route::post('calendar/resize', 'EventController@resize');

Route::resources([
    'event' => 'EventController',
    'employees' => 'EmployeeController'
]);

//Route::post('calendar', 'EmployeeController@get');