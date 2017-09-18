<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CacheController extends Controller
{

    /**
     * 删除文件的方法
     * @param $path
     */
    protected function delDir($path){

        // 读取路径
        $arr=scandir($path);

        // 遍历并且删除
        foreach ($arr as $key => $value) {
            // 过滤.和..
            if ($value !='.' && $value!='..') {
                unlink($path.'/'.$value);
            }
        }

    }

    /**
     * 清除缓存
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index(){

        $this->delDir("../storage/framework/views");
        $this->delDir("../storage/framework/cache");

        return redirect('/admin/goods');

    }

}
