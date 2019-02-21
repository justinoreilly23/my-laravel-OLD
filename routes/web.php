<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 *  index
 *  create
 *  store
 *  show
 *  edit
 *  update
 *  destroy
 */

/*
 * * * * * * * * * * * * * * * *
 * * * * * * * * * * * * * * * *
          BASIC ROUTES
 * * * * * * * * * * * * * * * *
 * * * * * * * * * * * * * * * *
*/
Auth::routes();
Route::get('/', 'PageController@home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contact', 'PageController@contact')->name('contact');


/*
 * * * * * * * * * * * * * * * *
 * * * * * * * * * * * * * * * *
          AUTH ROUTES
 * * * * * * * * * * * * * * * *
 * * * * * * * * * * * * * * * *
*/
Route::middleware('auth')->group(function () {

    Route::resource('projects', 'ProjectsController');

    /*
     * * * * * * * * * * * * * * * *
     * * * * * * * * * * * * * * * *
            PROTECTED ROUTES
     * * * * * * * * * * * * * * * *
     * * * * * * * * * * * * * * * *
    */
    Route::middleware('can:interact,project')->group(function () {
        Route::get('/projects/{project}', 'ProjectsController@show');      // VIEW PROJECT
        Route::get('/projects/{project}/edit', 'ProjectsController@edit'); // EDIT PROJECT
        Route::post('/projects/{project}', 'ProjectsController@update');   // UPDATE PROJECT
        Route::post('/projects/{project}', 'ProjectsController@destroy');  // DELETE PROJECT

        Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');     // CREATE TASK
        Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');     // UPDATE TASK
        Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy'); // DELETE TASK
    });
});