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

/**
 * Index
 */
Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest');

/**
 * Login form
 */
 Route::post("/login", "Auth\LoginController@login")->name('login');

 /**
  * Dashboard
  */
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

  /**
   * Logout
   */
  Route::post('/logout','Auth\LoginController@logout')->name('logout');

  /**
   * Workspaces
   */
  Route::resource('/workspaces','WorkspacesController');

  /**
   * Storage
   */
  Route::resource('/almacen','AlmacenController');

/**
 * Usuarios
 */
 Route::resource('/usuarios','UsuarioController');

 /**
  * Marcas
  */

  Route::resource('/marcas', 'TrademarksController');
