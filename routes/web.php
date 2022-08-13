<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('contact/import', function () {
//     dd(234);
// });

Route::get('contact/import','ContactController@import')->name('contact.import');
Route::post('contact/import/store','ContactController@importStore')->name('contact.import.store');
Route::resource('contact', 'ContactController');
