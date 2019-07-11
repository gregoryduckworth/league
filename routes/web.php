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
Route::patch('fixtures/updateDate/{id}', 'FixtureController@updateDate')->name('fixtures.updateDate');
Route::patch('leagues/addTeams/{id}', 'LeagueController@addTeams')->name('leagues.addTeams');
Route::resource('leagues', 'LeagueController');
Route::get('leagues/generateFixtures/{id}', 'LeagueController@generateFixtures')->name('generateFixtures');
Route::get('editGoals/{player_id}/{team_id}/{league_id}', 'PlayerController@editGoals')->name('players.editGoals');
Route::patch('editGoals/{player_id}/{team_id}/{league_id}', 'PlayerController@postEditGoals')->name('players.postEditGoals');
Route::resource('players', 'PlayerController');
Route::resource('teams', 'TeamController');
