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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/not-localized', function() {
    return view('welcome', [
        'h1' => 'Not localized page',
    ]);
})->name('not-localized');

Route::get(dialect()->interpret('routes.localized'), function() {
    return view('welcome', [
        'h1' => __('Page traduite'),
    ]);
})
    ->name('localized')
    ->middleware('speaks-tongue');
