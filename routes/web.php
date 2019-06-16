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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::resource('fixtures', 'FixtureController');
Route::resource('leagues', 'LeagueController');
Route::get('leagues/generateFixtures/{id}', 'LeagueController@generateFixtures')->name('generateFixtures');
Route::resource('players', 'PlayerController');
Route::resource('teams', 'TeamController');
