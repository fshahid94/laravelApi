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

// Route::get('/','PostsController@index');
// Route::get('/employee','PostsController@employee');
// Route::get('employees/index','EmployeesController@index');
// Route::get('employees/store','EmployeesController@store');
// Route::get('employees/update','EmployeesController@update');
// Route::get('employees/show/{id}','EmployeesController@show');
Route::resource('/employee','EmployeesController');
// Route::get('/layout', function () {
//     return view('layout');
// });
//Route::get('/test', ['middleware'=> 'cors','EmployeesController@test']);


//Route::get('/test', 'EmployeesController@test');

// Route::get('/test', ['middleware'=> 'cors',function () {
//     'EmployeesController@test';
// }]);   

//Route::get('/test', ['middleware'=> 'cors','uses'=> 'EmployeesController@test']);  
Route::middleware('cors')->get('/test', 'EmployeesController@test');

Route::get('/index','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');