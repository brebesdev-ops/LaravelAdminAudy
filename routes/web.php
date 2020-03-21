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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('about.index');
// });


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/usergroup', 'accessgroups@index')->name('accessgroups');
Route::get('/Menu', 'menuscontroller@index')->name('Menu');
Route::get('/roles', 'rolescontroller@index')->name('roles');
Route::get('/roles/{id}', 'rolescontroller@edit')->name('edit.roles');
Route::get('/accessmenu', 'accessmenucontroller@index')->name('accessmenu');
Route::get('/accessmenu/del/{id}', 'accessmenucontroller@destroy')->name('accessmenu.destroy');
Route::post('/accessmenu/edit/', 'accessmenucontroller@edit')->name('accessmenu.getedit');
Route::post('/Menu/create/', 'menuscontroller@store')->name('menu.store');
Route::post('/accessmenu', 'accessmenucontroller@create')->name('create.accessmenu');

