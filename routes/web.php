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





Route::resource('/','Guest\FujiServiceController');
Route::get('/home', function () {
    return redirect('/');
});

Auth::routes();

Route::group(['middleware'=>['auth.basic']],function (){
    Route::get('home/stock','Home\StockController@show');
    Route::get('home/stock/detail/{id}','Home\OutStockController@detail');
    Route::get('admin/stock/detail_all/{id}','Admin\OutStockController@detailAll');
    Route::get('home/out-and-return-stock-detail/detail/{id}','Home\OutStockController@outAndReturnStockDetail');
    Route::get('home/stock-modal/detail/{id}','Home\StockController@detail');
    Route::get('home/instock','Home\StockController@index');
    Route::get('home/stock/thumbnail/{id}','Home\StockController@thumbnail');
    Route::patch('home/stock/thumbnail/{id}', 'Home\StockController@storeThumbnail');


    Route::get('home/outstock','Home\OutStockController@index');
    Route::get('home/outstock/reset_create','Home\OutStockController@resetCart');
    Route::get('home/outstock/create','Home\OutStockController@create');
    Route::get('home/outstock/{id}', 'Home\OutStockController@outstock');
    Route::get('home/getoutstock/{id}', 'Home\OutStockController@getOutstock');
    Route::get('home/outstock/create/deleteoutstock/{id}','Home\OutStockController@deleteoutstock');
    Route::get('home/outstock/delete/{id}','Home\OutStockController@delete');
    Route::post('home/outstock/create/updatecart/{id}', 'Home\OutStockController@updateCart');
    Route::post('home/outstock/edit/update-edit-outstock/{id}', 'Home\OutStockController@updateEditOutstock');
    Route::post('home/outstock/create', 'Home\OutStockController@store');
    Route::get('home/outstock/edit/{id}','Home\OutStockController@edit');
    Route::get('home/outstock/edit/deleteoutstock/{id}', 'Home\OutStockController@deleteoutstockEdit');
    Route::patch('home/outstock/edit/{id}', 'Home\OutStockController@update');
    Route::post('home/outstock/change_status/{id}', 'Home\OutStockController@change_status');
    Route::get('home/outstock/out_stock_pdf/{id}','Home\OutStockController@outStockPDF');
    Route::get('home/barcode/{id}','Home\BarcodeController@barcodePrint');
    Route::get('home/one-barcode/{id}','Home\BarcodeController@oneBarcodePrint');


});

Route::group(['middleware'=>['ckAdmin']],function (){

    Route::get('muahang/{id}', 'Admin\AddpartController@muahang');
    Route::get('edit_muahang/{id}', 'Admin\AddpartController@editMuaHang');
    Route::get('getcart/{id}', 'Admin\AddpartController@getCart');
    Route::get('admin/fujiservice/reset_cart','Admin\AddpartController@resetCart');
    Route::get('admin/fujiservice/create/delete/{id}', 'Admin\AddpartController@deleteorder');
    Route::post('admin/fujiservice/create/update-cart/{id}', 'Admin\AddpartController@updateCart');
    Route::get('admin/fujiservice/create/edit/{id}','Admin\AddpartController@edit');
    Route::post('admin/fujiservice/create/edit/update-edit-cart/{id}', 'Admin\AddpartController@updateEditCart');
    Route::get('admin/fujiservice/create/edit/delete/{id}', 'Admin\AddpartController@deleteorderEdit');
    Route::get('admin/fujiservice/create/edit/delete_all_edit/{id}', 'Admin\AddpartController@deleteAllEdit');
    Route::patch('admin/fujiservice/create/edit/{id}', 'Admin\AddpartController@update');


    Route::get('admin/fujiservice','Admin\FujiServiceController@index');
    Route::get('admin/fujiservice/create','Admin\FujiServiceController@create');
    Route::post('admin/fujiservice/create', 'Admin\FujiServiceController@store'); 
    Route::get('admin/fujiservice/delete/{id}','Admin\FujiServiceController@delete');
    Route::get('admin/fujiservice/report/{id}','Admin\FujiServiceController@serviceReportPDF');
    Route::get('admin/fujiservice/service-report/{id}','Admin\FujiServiceController@serviceReport');
    Route::get('admin/fujiservice/head-repair-report/{id}','Admin\FujiServiceController@headRepairReport');
    Route::get('admin/fujiservice/quotation/{id}','Admin\FujiServiceController@quotation');
    Route::get('admin/report','Admin\FujiServiceController@report');
    Route::get('admin/fujiservice/excel/{id}','Admin\FujiServiceController@report');
    
    
    Route::resource('admin/headtype','Admin\HeadTypeController');
    Route::resource('admin/customer','Admin\CustomerController');

    Route::get('admin/stock','Admin\StockController@show');
    Route::get('admin/stock_advance','Admin\StockController@showAdvance');
    Route::get('admin/stock/detail/{id}','Admin\OutStockController@detail');
    Route::get('admin/out-and-return-stock-detail/detail/{id}','Admin\OutStockController@outAndReturnStockDetail');

    Route::get('admin/stock/thumbnail/{id}','Admin\StockController@thumbnail');
    Route::patch('admin/stock/thumbnail/{id}', 'Admin\StockController@storeThumbnail');
    Route::get('admin/stock-modal/detail/{id}','Admin\StockController@detail');
    Route::get('admin/instock','Admin\StockController@index');
    Route::get('admin/instock/reset_create','Admin\StockController@resetCart');
    Route::get('admin/instock/create','Admin\StockController@create');
    Route::post('admin/instock/create/updatebarcode/{id}', 'Admin\StockController@updateBarcode');
    Route::get('instock/{id}', 'Admin\StockController@instock');
    Route::get('edit_instock/{id}', 'Admin\StockController@editInstock');
    Route::get('admin/instock/create/deleteinstock/{id}', 'Admin\StockController@deleteinstock');
    Route::get('admin/instock/delete/{id}','Admin\StockController@delete');
    Route::post('admin/instock/create', 'Admin\StockController@store');
    Route::get('admin/instock/create/edit/{id}','Admin\StockController@edit');
    Route::get('getinstock/{id}', 'Admin\StockController@getInstock');
    Route::get('admin/instock/create/edit/delete/{id}', 'Admin\StockController@deleteinstockEdit');
    Route::post('admin/instock/create/edit/update-edit-instock/{id}', 'Admin\StockController@updateEditInstock');
    Route::patch('admin/instock/create/edit/{id}', 'Admin\StockController@update');

    Route::get('admin/outstock','Admin\OutStockController@index');
    Route::get('admin/outstock/reset_create','Admin\OutStockController@resetCart');
    Route::get('admin/outstock/create','Admin\OutStockController@create');
    Route::get('outstock/{id}', 'Admin\OutStockController@outstock');
    Route::get('edit_outstock/{id}', 'Admin\OutStockController@editOutstock');
    Route::get('getoutstock/{id}', 'Admin\OutStockController@getOutstock');
    Route::get('admin/outstock/create/deleteoutstock/{id}','Admin\OutStockController@deleteoutstock');
    Route::get('admin/outstock/delete/{id}','Admin\OutStockController@delete');
    Route::post('admin/outstock/create/updatecart/{id}', 'Admin\OutStockController@updateCart');
    Route::post('admin/outstock/edit/update-edit-outstock/{id}', 'Admin\OutStockController@updateEditOutstock');
    Route::post('admin/outstock/create', 'Admin\OutStockController@store');
    Route::get('admin/outstock/edit/{id}','Admin\OutStockController@edit');
    Route::get('admin/outstock/edit/deleteoutstock/{id}', 'Admin\OutStockController@deleteoutstockEdit');
    Route::get('admin/outstock/edit/deleteoutstockdetail/{id}', 'Admin\OutStockController@deleteoutstockDetailEdit');
    Route::patch('admin/outstock/edit/{id}', 'Admin\OutStockController@update');
    Route::post('admin/outstock/change_status/{id}', 'Admin\OutStockController@change_status');
    Route::get('admin/outstock/out_stock_pdf/{id}','Admin\OutStockController@outStockPDF');

    Route::get('admin/partpricelist','Admin\PricePartListController@index');
    Route::post('admin/partpricelist/create','Admin\PricePartListController@store');
    Route::get('admin/partpricelist/create','Admin\PricePartListController@create');
    Route::get('admin/partpricelist/edit/{id}','Admin\PricePartListController@edit');
    Route::patch('admin/partpricelist/edit/{id}', 'Admin\PricePartListController@update');
    Route::post('admin/partpricelist-import','Admin\PricePartListController@import');
    Route::get('admin/exportPartPriceList','Admin\PricePartListController@exportPartPriceList');
    Route::get('admin/partpricelist/modal','Admin\PricePartListController@importModal');
    Route::get('admin/partpricelist/delete','Admin\PricePartListController@delete');

    Route::get('admin/user','Admin\UserController@index');
    Route::get('admin/user/edit/{id}','Admin\UserController@edit');
    Route::patch('admin/user/edit/{id}', 'Admin\UserController@update');
    
    
    Route::get('admin/barcode/{id}','Admin\BarcodeController@barcodePrint');
    Route::get('admin/excel/{id}','Admin\BarcodeController@excel');
    Route::get('admin/one-barcode/{id}','Admin\BarcodeController@oneBarcodePrint');
    
   
});
