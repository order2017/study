<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsController extends Controller
{

    // 商品列表
    public function index(){

        // 操作数据库
        $data = DB::table('goods')->orderBy('id','desc')->paginate(15);

        // 处理小图片,设置子数组赋值，存放小图
        foreach ($data as $key=>$value){
            $value->pic_all = DB::table('goodsimg')->where('gid',$value->id)->get();
        }

        return view('admin.goods',['data'=>$data]);

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

    /**
     * 商品添加---存储
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){

        // 接收数据参数
        $pictureAll = $request->get('imgs');
        $data = $request->except(['_token','imgs']);

        // 插入数据并且判断
        if ($id = DB::table('goods')->insertGetId($data)){

            // 处理商品多图片
            $arr = explode(',',$pictureAll);

            foreach ($arr as $key=>$value){

                $array = [];
                $array['gid'] = $id;
                $array['img'] = $value;

                DB::table('goodsimg')->insert($array);
            }
            return redirect('/admin/goods');
        }else{
            return back();
        }

    }

}
