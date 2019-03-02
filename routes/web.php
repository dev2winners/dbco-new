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

Route::get('/', 'RootController@index')->name('root');
Route::get('/test', 'TestController@index')->name('test');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
/**---------------------------------------------------**/
Route::get('/dbcosolution/{isolutioncategory?}', 'DbcoSolutionController@index')->name('dbcosolution.index');
Route::get('/solution/{id}', 'DbcoSolutionController@single')->name('dbcosolution.single');
Route::post('/dbcosolution/{id}', 'DbcoSolutionController@toggle')->name('dbcosolution.toggle')->middleware('verified');
/**---------------------------------------------------**/
Route::get('/customer', 'DbcoCustomerController@main')->name('customer.main')->middleware('verified');
Route::put('/customer', 'DbcoCustomerController@update')->name('customer.update')->middleware('verified');
/**---------------------------------------------------**/
Route::get('/tickets', 'Tickets\TicketController@main')->name('tickets.main')->middleware('verified');
Route::post('/tickets', 'Tickets\TicketController@store')->name('tickets.store')->middleware('verified');
