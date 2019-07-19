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

Route::get('/', 'HomeController@ShowHomePage')->name('home');

Route::get('/register', 'AuthController@ShowRegisterPage')->name('register');
Route::post('/register', 'AuthController@RegisterUser')->name('register_user');

Route::get('/login', 'AuthController@ShowloginPage')->name('login');
Route::post('/login', 'AuthController@LoginUser')->name('login_user');

Route::get('/logout', 'AuthController@LogoutUser')->name('logout_user');

Route::get('/events', 'OrganisedEventController@ShowOrganisedEvents')->name('events');
Route::get('/events/my', 'OrganisedEventController@ShowMyOrganisedEvents')->name('show_my_events');
Route::get('/events/create', 'OrganisedEventController@ShowCreateEvent')->name('show_create_event');
Route::post('/events/create', 'OrganisedEventController@CreateEvent')->name('create_event');
Route::get('/events/{id}', 'OrganisedEventController@ShowOrganisedEvent')->name('show_event');
