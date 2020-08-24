<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('name/items','ItemController@getNames')->middleware('cors');
Route::get('search/items','ItemController@index')->middleware('cors');

Route::get('numb/bills','PurchaseController@getBillNumb')->middleware('cors');
Route::post('purchase','PurchaseController@store')->middleware('cors');
Route::get('purchase/{id}','PurchaseController@getPurchase')->middleware('cors');
Route::get('purchase/{id}/bills','PurchaseController@getBills')->middleware('cors');
Route::post('purchase/{id}','PurchaseController@update')->middleware('cors');
Route::delete('purchase/{id}','PurchaseController@delete')->middleware('cors');
Route::post('bill/{id}','PurchaseController@deleteBill')->middleware('cors');

Route::get('numb/invoices','SaleController@getInvoiceNumb')->middleware('cors');
Route::post('sale','SaleController@store')->middleware('cors');
Route::get('sale/{id}','SaleController@getSale')->middleware('cors');
Route::get('sale/{id}/invoices','SaleController@getInvoices')->middleware('cors');
Route::post('sale/{id}','SaleController@update')->middleware('cors');
Route::delete('sale/{id}','SaleController@delete')->middleware('cors');
Route::post('invoice/{id}','SaleController@deleteInvoice')->middleware('cors');
