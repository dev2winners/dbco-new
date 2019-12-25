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

Route::get('setlocale/{locale}', function ($locale) {

    if (in_array($locale, ['ru','en'])) {   # Проверяем, что у пользователя выбран доступный язык
        \Session::put('locale', $locale);                    # И устанавливаем его в сессии под именем locale
    }

    return redirect()->back();                              # Редиректим его <s>взад</s> на ту же страницу

});
Route::get('/lk/solutions', 'Customer\CustomerSolutionsController@main')->name('customersolutions.main')->middleware('auth','noverified');
Route::post('/lk/solutions/getupdate', 'Customer\CustomerSolutionsController@getupdate')->name('customersolutions.getupdate')->middleware('auth','noverified');

Route::get('/', 'RootController@index')->name('root');
Route::get('/test', 'TestController@index')->name('test');
Route::get('/resources', 'DbcoResourceController@main')->name('resources.main');

Auth::routes(/*['verify' => true]*/);

Route::get('/home', 'HomeController@index')->name('home');
/**---------------------------------------------------**/
Route::get('/dbcosolution/{isolutioncategory?}', 'DbcoSolutionController@index')->name('dbcosolution.index');
Route::get('/solution/{id}', 'DbcoSingleSolutionController@main')->name('dbcosolution.single');
Route::post('/dbcosolution/{id}', 'DbcoSolutionController@toggle')->name('dbcosolution.toggle')->middleware('auth','noverified');
/**---------------------------------------------------**/
Route::get('/lk/customer', 'Customer\CustomerIndexController@main')->name('customer.main')->middleware('auth','noverified');
Route::put('/lk/customer', 'Customer\CustomerIndexController@update')->name('customer.update')->middleware('auth','noverified');
Route::match(['GET','POST'],'/lk/verify', 'Customer\CustomerIndexController@verify')->name('customer.verify')->middleware('auth','noverified');

/**---------------------------------------------------**/
Route::get('/lk/tickets', 'Customer\CustomerTicketController@main')->name('tickets.main')->middleware('auth','noverified');
Route::post('/lk/tickets', 'Customer\CustomerTicketController@store')->name('tickets.store')->middleware('auth','noverified');
Route::get('/lk/tickets/file/{id}', 'Customer\CustomerTicketController@get_file')->name('tickets.get_file')->middleware('auth','noverified');


Route::get('/lk/finance', 'Customer\CustomerFinanceController@main')->name('customerfinance.main')->middleware('auth','noverified');
Route::get('/lk/db', 'Customer\CustomerDbController@main')->name('customerdb.main')->middleware('auth','noverified');
Route::put('/lk/db', 'Customer\CustomerDbController@update')->name('customerdb.update')->middleware('auth','noverified');
Route::post('/lk/db', 'Customer\CustomerDbController@postupdate')->name('customerdb.postupdate')->middleware('auth','noverified');

/**----- для ajax-свитчей ------**/
Route::post('/togglesolutionajax', 'ToggleSolutionAjaxController@main')->name('togglesolutionajax.main')->middleware('auth','noverified');
Route::post('/getstatussolitions', 'ToggleSolutionAjaxController@getstatussolitions')->name('getstatussolitions')->middleware('auth','noverified');
Route::post('/setsolutionstate', 'ToggleSolutionAjaxController@setsolutionstate')->name('setsolutionstate')->middleware('auth','noverified');