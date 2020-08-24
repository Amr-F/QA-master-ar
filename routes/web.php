<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| suppliers Routes
|--------------------------------------------------------------------------
 */
Route::get('/suppliers/create' , 'SupplierController@create');
Route::post('/suppliers' , 'SupplierController@store');
Route::get('/suppliers/index' , 'SupplierController@index');
Route::get('/suppliers/{supplier}' , 'SupplierController@show');
Route::get('/suppliers/{supplier}/edit','SupplierController@edit');
Route::put ('/suppliers/{supplier}','SupplierController@update');
Route::post('/suppliers/{supplier}/destroy','SupplierController@destroy');

/*
|--------------------------------------------------------------------------
| customers Routes
|--------------------------------------------------------------------------
 */

Route::get('/customers/create' , 'CustomerController@create');
Route::post('/customers' , 'CustomerController@store');
Route::get('/customers/index' , 'CustomerController@index');
Route::get('/customers/{customer}' , 'CustomerController@show');
Route::get('/customers/{customer}/edit','CustomerController@edit');
Route::put ('/customers/{customer}','CustomerController@update');
Route::post('/customers/{customer}/destroy','CustomerController@destroy');

/*
|--------------------------------------------------------------------------
| items Routes
|--------------------------------------------------------------------------
 */
Route::get('/getItem/{id}','ItemController@getItem');
Route::get('/items/create' , 'ItemController@create');
Route::post('/items' , 'ItemController@store');
Route::get('/items/index/{sort}' , 'ItemController@index');
Route::get('sortitem', function () {
    return view('/items/sortitem');
});
Route::get('/items/{item}' , 'ItemController@show');
Route::get('/items/{item}/edit','ItemController@edit');
Route::put ('/items/{item}','ItemController@update');
Route::post('/items/{item}/destroy','ItemController@destroy');
Route::post('/autocomplete/fetch', 'ItemController@fetch')->name('autocomplete.fetch');
Route::get('search/autocomplete', 'SaleController@autocomplete');
/*
|--------------------------------------------------------------------------
| purchases Routes
|--------------------------------------------------------------------------
 */
Route::get('/purchases/create' , 'PurchaseController@create');
Route::post('/purchases' , 'PurchaseController@store');
Route::get('/purchases/index' , 'PurchaseController@index');
Route::get('/purchases/{bill}/edit','PurchaseController@edit');
Route::get('/purchases/{id}','PurchaseController@show');
/*
|--------------------------------------------------------------------------
| sales Routes
|--------------------------------------------------------------------------
 */
Route::get('/sales/create' , 'SaleController@create');
Route::post('/sales' , 'SaleController@store');
Route::get('/sales/index' , 'SaleController@index');
Route::get('/sales/{invoice}/edit','SaleController@edit');
Route::get('/sales/{id}','SaleController@show');


/*
|--------------------------------------------------------------------------
| accountPayables Routes
|--------------------------------------------------------------------------
 */
Route::get('/accountPayables/create' , 'AccountPayableController@create');
Route::post('/accountPayables' , 'AccountPayableController@store');
Route::get('/accountPayables/index' , 'AccountPayableController@index');
Route::get('/accountPayables/{accountPayables}' , 'AccountPayableController@show');
Route::get('/accountPayables/{accountPayables}/edit','AccountPayableController@edit');
Route::put ('/accountPayables/{accountPayables}','AccountPayableController@update');
Route::post('/accountPayables/{accountPayable}/destroy','AccountPayableController@destroy');
Route::post('/accountPayables/{accountPayable}','AccountPayableController@store');

/*
|--------------------------------------------------------------------------
| accountReceivables Routes
|--------------------------------------------------------------------------
 */
Route::get('/accountReceivables/create' , 'AccountReceivableController@create');
Route::post('/accountReceivables' , 'AccountReceivableController@store');
Route::get('/accountReceivables/index' , 'AccountReceivableController@index');
Route::get('/accountReceivables/{accountReceivables}' , 'AccountReceivableController@show');
Route::get('/accountReceivables/{accountReceivables}/edit','AccountReceivableController@edit');
Route::put ('/accountReceivables/{accountReceivables}','AccountReceivableController@update');
Route::post('/accountReceivables/{accountReceivable}/destroy','AccountReceivableController@destroy');
Route::post('/accountReceivables/{accountReceivable}','AccountReceivableController@store');

/*
|--------------------------------------------------------------------------
| services Routes
|--------------------------------------------------------------------------
 */
Route::get('/services/create' , 'ServiceController@create');
Route::post('/services' , 'ServiceController@store');
Route::get('/services/index' , 'ServiceController@index');
Route::get('/services/{service}' , 'ServiceController@show');
Route::get('/services/{service}/edit','ServiceController@edit');
Route::put ('/services/{id}','ServiceController@update');
Route::post('/services/{service}/destroy','ServiceController@destroy');

/*
|--------------------------------------------------------------------------
| expensesCategories Routes
|--------------------------------------------------------------------------
 */
Route::get('/expensesCategories/create' , 'ExpcategoryController@create');
Route::post('/expensesCategories' , 'ExpcategoryController@store');
Route::get('/expensesCategories/index' , 'ExpcategoryController@index');
Route::get('/expensesCategories/{expcategory}' , 'ExpcategoryController@show');
Route::get('/expensesCategories/{expcategory}/edit','ExpcategoryController@edit');
Route::put ('/expensesCategories/{id}','ExpcategoryController@update');
Route::post('/expensesCategories/{expcategory}/destroy','ExpcategoryController@destroy');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */
Route::get('/expenses/create' , 'ExpensesController@create');
Route::post('/expenses' , 'ExpensesController@store');
Route::get('/expenses/index' , 'ExpensesController@index');
Route::get('/expenses/{expense}' , 'ExpensesController@show');
Route::get('/expenses/{expense}/edit','ExpensesController@edit');
Route::put ('/expenses/{id}','ExpensesController@update');
Route::post('/expenses/{expense}/destroy','ExpensesController@destroy');
/*
|--------------------------------------------------------------------------
| cash Routes
|--------------------------------------------------------------------------
 */
Route::get('/cash/create' , 'CashController@create');
Route::post('/cash' , 'CashController@store');
Route::get('/cash/index' , 'CashController@index');
Route::get('/cash/{cash}' , 'CashController@show');



/*
|--------------------------------------------------------------------------
| ya ba4a Routes
|--------------------------------------------------------------------------
 */
Route::get('yabasha', function () {
    return view('/layouts/yabash');
});

/*
|--------------------------------------------------------------------------
| quick repo Routes
|--------------------------------------------------------------------------
 */
Route::get('/quickReports/choose','ReportController@index');
Route::post('/quickReports','ReportController@show');

Route::get('/quickReports/dayclosse' , 'DaycloseController@show');
Route::post('/quickReports/dayclosse' , 'DaycloseController@store');
