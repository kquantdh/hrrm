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

Route::get('test','Admin\TestController@index')->name('api-test');
Auth::routes();



Route::group(['middleware'=>['ckAdmin']],function (){

    Route::get('muahang/{id}', 'Admin\AddpartController@muahang');
    Route::get('edit_muahang/{id}', 'Admin\AddpartController@editMuaHang');
    Route::get('edit_muahang_copy/{id}', 'Admin\AddpartController@editMuaHangCopy');
    Route::get('getcart/{id}', 'Admin\AddpartController@getCart');
    Route::get('getcart-copy/{id}', 'Admin\AddpartController@getCartCopy');
    Route::get('admin/fujiservice/reset_cart','Admin\AddpartController@resetCart');
    Route::get('admin/fujiservice/create/delete/{id}', 'Admin\AddpartController@deleteorder')->name('delete-fuji-service');
    Route::post('admin/fujiservice/create/update-cart/{id}', 'Admin\AddpartController@updateCart');
    Route::get('admin/fujiservice/create/edit/{id}','Admin\AddpartController@edit')->name('edit-fuji-service');
    Route::get('admin/fujiservice/create/edit_more_service/{id}','Admin\AddpartController@editMoreService');

    Route::post('admin/fujiservice/create/edit/update-edit-cart/{id}', 'Admin\AddpartController@updateEditCart');
    Route::post('admin/fujiservice/create/edit/update-edit-cart-copy/{id}', 'Admin\AddpartController@updateEditCartCopy');
    Route::get('admin/fujiservice/create/edit/delete/{id}', 'Admin\AddpartController@deleteorderEdit');
    Route::get('admin/fujiservice/create/edit/delete-copy/{id}', 'Admin\AddpartController@deleteorderEditCopy');
    Route::get('admin/fujiservice/create/edit/delete_all_edit/{id}', 'Admin\AddpartController@deleteAllEdit');
    Route::patch('admin/fujiservice/create/edit/{id}', 'Admin\AddpartController@update');
    Route::patch('admin/fujiservice/create/edit_more_service/{id}', 'Admin\AddpartController@updateMoreService');
    Route::get('admin/fujiservice/create/edit-copy/{id}','Admin\AddpartController@editCopy');
    Route::get('admin/fujiservice/create/edit_copy_more_service/{id}','Admin\AddpartController@editCopyMoreService');
    Route::put('admin/fujiservice/create/edit-copy/{id}', 'Admin\FujiServiceController@storeEditCopy');
    Route::put('admin/fujiservice/create/edit_copy_more_service/{id}', 'Admin\FujiServiceController@storeEditCopyMoreService');


    Route::get('admin/fujiservice','Admin\FujiServiceController@index')->name('fujiservice');
    Route::get('admin/fujiservice/create','Admin\FujiServiceController@create');
    Route::get('admin/fujiservice/create_more_service','Admin\FujiServiceController@createMoreService');
    Route::post('admin/fujiservice/create', 'Admin\FujiServiceController@store');
    Route::post('admin/fujiservice/create_more_service', 'Admin\FujiServiceController@storeMoreService');

    Route::get('admin/fujiservice/delete/{id}','Admin\FujiServiceController@delete');
    Route::get('admin/fujiservice/report/{id}','Admin\FujiServiceController@serviceReportPDF');
    Route::get('admin/fujiservice/service-report/{id}','Admin\FujiServiceController@serviceReport');
    Route::get('admin/fujiservice/view-head-repair-report/{id}','Admin\FujiServiceController@viewHeadRepairReport');
    Route::get('admin/fujiservice/pdf-head-repair-report/{id}','Admin\FujiServiceController@pdfHeadRepairReport');
    Route::get('admin/fujiservice/view-quotation/{id}','Admin\FujiServiceController@viewQuotation');
    Route::get('admin/fujiservice/excel-quotation/{id}','Admin\FujiServiceController@excelQuotation');
    Route::get('admin/fujiservice/pdf-quotation/{id}','Admin\FujiServiceController@pdfQuotation');
    Route::get('admin/fujiservice/pdf-quotation/{id}','Admin\FujiServiceController@pdfQuotation');
    Route::get('admin/fujiservice/head_tag/{id}','Admin\FujiServiceController@pdfHeadTag');
    
    
    Route::resource('admin/headtype','Admin\HeadTypeController');
    Route::resource('admin/customer','Admin\CustomerController');


    Route::get('admin/stock_advance','Admin\StockController@showAdvance');
    Route::post('/stock-list','Admin\StockController@getPartList')->name('datatable.listStock');
    Route::get('admin/stock/detail/{id}','Admin\OutStockController@detail');
    Route::get('admin/stock/detail_all/{id}','Admin\OutStockController@detailAll');
    Route::get('admin/out-and-return-stock-detail/detail/{id}','Admin\OutStockController@outAndReturnStockDetail');

    Route::get('admin/stock/thumbnail/{id}','Admin\StockController@thumbnail');
    Route::patch('admin/stock/thumbnail/{id}', 'Admin\StockController@storeThumbnail');
    Route::get('admin/stock-modal/detail/{id}','Admin\StockController@detail');

    Route::get('admin/instock','Admin\StockController@index');
    Route::post('/instock-list','Admin\StockController@getInStockList')->name('datatable.listInStock');

    Route::get('admin/instock/reset_create','Admin\StockController@resetCart');

    Route::get('admin/instock/create','Admin\StockController@create');
    //Route::post('create-intstock-list','Admin\StockController@getPartListCreate')->name('datatable.listPartInstockCreate');

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

    Route::get('admin/outstock','Admin\OutStockController@index1');
    Route::post('/outstock-list','Admin\OutStockController@getOutStockList')->name('datatable.listOutStock');

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

    Route::post('admin/outstock/change_status', 'Admin\OutStockController@change_status1')->name('outstock.change_status');

    Route::get('admin/outstock/out_stock_pdf/{id}','Admin\OutStockController@outStockPDF');

  

    Route::post('/part-list','Admin\PricePartListController@getPartList')->name('datatable.listPart');
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
