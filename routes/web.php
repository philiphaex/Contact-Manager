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

/*Route::get('/', function () {
    return view('welcome');
});*/

use App\Task;
use Illuminate\Http\Request;

/**
 * Display All Contacts
 */
Route::get('/', 'ContactController@index');


/**
 * Add A New Contact
 */
Route::post('/contact', 'ContactController@store');


/**
 * Delete An Existing Contact
 */
Route::delete('/contact/{contact}', 'ContactController@destroy');

