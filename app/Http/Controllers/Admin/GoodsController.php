<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsController extends Controller
{

    // 商品列表
    public function index(){

        return view('admin.goods');

    }

    /**
     * 商品添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        // 查询分类
        $data=DB::select("select types.*,concat(path,id) p from types order by p");

        // 数据处理树形结构方法
        foreach ($data as $key => $value) {

            $arr=explode(',', $value->path);

            $size=count($arr);

            $value->size=$size-2;

            $value->html=str_repeat('|----', $size-2).$value->name;
        }

        return view('admin.goods-create',['data'=>$data]);

    }

    // 商品添加---存储
    public function store(Request $request){

        dd($request->all());

    }

}
