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

Route::get('/', function () {
    return view('welcome');
});

// ----------------------------------前台--------------------------------------------

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function (){

    Route::get('/','GoodsController@index');

    // 无限级分类列表
    Route::get('/type','TypesController@index');

    // 无限级分类创建
    Route::get('/type-create','TypesController@create');
    Route::post('/type-create','TypesController@store');

    // 无限级分类删除
    Route::get('/type-delete/{id}','TypesController@delete');


    // 商品列表
    Route::get('/goods','GoodsController@index');

    // 商品添加
    Route::get('/goods-create','GoodsController@create');
    Route::post('/goods-create','GoodsController@store');

    // 文件上传
    Route::any("/upload-file","CommonController@upload");

    // 订单管理
    Route::get('/order','OrderController@index');

    // 查看订单详情
    Route::get('/order-details','OrderController@OrderDetails');

    // 查看订单收货地址
    Route::get('/order-add','OrderController@OrderAdd');

    // 修改订单状态
    Route::any('/order-edit','OrderController@OrderEdit');

    // 订单状态管理列表
    Route::any('/order-status-list','OrderController@OrderStatusList');

    // 订单状态管理编辑
    Route::any('/order-status-edit','OrderController@OrderStatusEdit');

    // 清除缓存
    Route::get('/cache','CacheController@index');

});




// ----------------------------------后台--------------------------------------------