<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TypesController extends Controller
{

    /**
     * 使用递归实现数据格式化
     * @param $data
     * @param int $pid
     * @return array
     */
    protected function data($data,$pid=0){

        $newArr=array();

        // 获取顶级分类
        foreach ($data as $key => $value) {

            if ($value->pid==$pid) {

                $newArr[$value->id]=$value;

                $newArr[$value->id]->parent=$this->data($data,$value->id);
            }
        }
        return $newArr;
    }

    /**
     * 无限级分类列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = DB::table('types')->orderBy('sort','desc')->get();

        $arr=$this->data($data,$pid=0);

        return view('admin.type',['data'=>$arr]);
    }

    /**
     * 无限级分类创建
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.type-create');
    }

    /**
     * 无限级分类创建--存储
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = DB::table('types')->insert($request->except(['_token']));
        if ($data){
            return redirect('/admin/type');
        }else{
            return back();
        }
    }

    /**
     * 无限级分类删除
     * @param $id
     * @return string
     */
    public function delete($id){
        $result = DB::delete("delete from types where id=$id or path like '%,$id,%'");
        if ($result){
            return "1";
        }else{
            return "0";
        }
    }

}
