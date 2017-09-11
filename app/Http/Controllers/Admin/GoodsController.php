<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{

    // 商品列表
    public function index(){

        return view('admin.goods');

    }

    // 商品添加
    public function create(){

        return view('admin.goods-create');

    }

    // 商品添加---存储
    public function store(Request $request){

        dd($request->all());

    }

}
