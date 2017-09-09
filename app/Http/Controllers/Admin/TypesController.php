<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TypesController extends Controller
{

    /**
     * 无限级分类列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = DB::table('types')->orderBy('sort','desc')->get();

        return view('admin.type',['data'=>$data]);
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
