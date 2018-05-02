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


Route::get('/', ['as' => 'site.home', 'uses' => 'Site\homeController@index']);

Route::get('/login', ['as' => 'site.login', 'uses' => 'Site\loginController@index']);
Route::get('/login/exit', ['as' => 'site.login.exit', 'uses' => 'Site\loginController@exit']);
Route::post('/login/pass', ['as' => 'site.login.pass', 'uses' => 'Site\loginController@pass']);


Route::get('/contato/{id?}', ['uses' => 'contatoController@index']);

Route::post('/contato', ['uses' => 'contatoController@criar']);

Route::put('/contato', ['uses' => 'contatoController@editar']);


Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin/cursos', ['as' => 'admin.cursos', 'uses' => 'Admin\cursoController@index']);
    Route::get('/admin/cursos/add', ['as' => 'admin.cursos.add', 'uses' => 'Admin\cursoController@add']);
    Route::post('/admin/cursos/save', ['as' => 'admin.cursos.save', 'uses' => 'Admin\cursoController@save']);
    Route::get('/admin/cursos/edit/{id}', ['as' => 'admin.cursos.edit', 'uses' => 'Admin\cursoController@edit']);
    Route::put('/admin/cursos/update/{id}', ['as' => 'admin.cursos.update', 'uses' => 'Admin\cursoController@update']);
    Route::get('/admin/cursos/delete/{id}', ['as' => 'admin.cursos.delete', 'uses' => 'Admin\cursoController@delete']);

});
