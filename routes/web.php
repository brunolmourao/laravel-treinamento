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
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/profile', function () {
    return view('profile');
});
Auth::routes();
Route::resource('pessoa','PessoasController');
Route::resource('historico','HistoricoController');
Route::resource('turma','TurmaController');
Route::resource('treinamento','TreinamentoController');
Route::resource('modulo','ModuloController');
Route::resource('professor','ProfessorController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
Route::get('turma/verTurma/{id}',['as'=> 'verTurma' , 'uses' => 'TurmaController@verTurma']);
Route::get('treinamento/verTreinamento/{id}',['as'=> 'verTreinamento' , 'uses' => 'TreinamentoController@verTreinamento']);
Route::get('modulo/verModulo/{id}',['as'=> 'verModulo' , 'uses' => 'ModuloController@verModulo']);
Route::get('professor/verProfessor/{id}',['as'=> 'verProfessor' , 'uses' => 'ProfessorController@verpro']);
