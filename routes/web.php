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

Route::get('/home' , 'App\Http\Controllers\HomeController@home');
Route::get('/' , 'App\Http\Controllers\HomeController@index');
Route::get('/logout' , 'App\Http\Controllers\HomeController@logout')->name('logout');
Route::get('/login' , 'App\Http\Controllers\HomeController@login')->name('login');
Route::get('/register' , 'App\Http\Controllers\HomeController@register')->name('register');

Route::post('/link-short', 'App\Http\Controllers\Admin\LinkController@store')->name('link_short');

Route::any('{code}', 'App\Http\Controllers\Admin\LinkController@visit')->where('all', '.*');

Route::post('/contact/submit', 'App\Http\Controllers\HomeController@contactSubmit')->name('contact_submit');


Route::group(['middleware' => ['auth']] ,function(){
    
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    
Route::get('/admin/contacts', 'App\Http\Controllers\HomeController@contactIndex')->name('contacts');

// For Link route 
Route::get('/admin/all-link', 'App\Http\Controllers\Admin\LinkController@index')->name('all_link');
Route::get('/admin/create-link', 'App\Http\Controllers\Admin\LinkController@create')->name('link_create');
Route::post('/admin/store-link', 'App\Http\Controllers\Admin\LinkController@linkStore')->name('link_store');
Route::get('/admin/view-link/{id}', 'App\Http\Controllers\Admin\LinkController@view')->name('link_view');
Route::post('/admin/delete-link', 'App\Http\Controllers\Admin\LinkController@delete')->name('link_delete');

});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
