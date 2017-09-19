<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    /**
     * 订单列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        // 查询相关数据
        $data= DB::table("orders")
            ->select("orders.*","user.name","orderstatu.name as ssname")
            ->join("user","user.id","=","orders.uid")
            ->join("orderstatu","orders.sid",'=',"orderstatu.id")
            ->get();

        // 过滤相同名称，处理重复数据方法
        $newArr=array();
        foreach ($data as $key => $value) {

            $newArr[$value->code]=$value;

        }

        return view('admin.order',['data'=>$newArr]);

    }

    /**
     * 查看订单详情
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function OrderDetails(Request $request){

        // 获取订单号
        $code=$request->input("code");

        // 查询订单号下所有的商品
        $data= DB::table("orders")->select("orders.*","goods.title","goods.img")->join("goods","goods.id","=","orders.gid")->where("code",$code)->get();

        return view('admin.order-details',['data'=>$data]);

    }

    /**
     * 查看订单收货地址
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function OrderAdd(Request $request){

        // 获取数据
        $id=$request->get('id');

        // 查询订单收货地址信息
        $data= DB::table("addr")->find($id);

        return view('admin.order-add',['data'=>$data]);

    }

    /**
     * 修改订单状态
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function OrderEdit(Request $request){

        if ($_POST) {
            # code...

            $sid=$request->input("sid");
            $code=$request->input("code");

            $sql="update orders set sid=$sid where code='$code'";

            // 执行sql语句

            if (DB::update($sql)) {
                return redirect("admin/order");
            }else{
                return back();
            }
        }else{

            // 查询所有的订单状态

            $data= DB::table("orderstatu")->get();

            return view("admin.order-edit",['data'=>$data]);
        }

    }

    /**
     * 订单状态管理列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function OrderStatusList(){

        // 查询数据
        $data= DB::table('orderstatu')->get();

        return view('admin.order-status-list',['data'=>$data]);

    }

    /**
     * 订单状态管理编辑
     * @param Request $request
     * @return int
     */
    public function OrderStatusEdit(Request $request){
        $name=$request->input('name');
        $id=$request->input('id');

        // 直接sql语句
        $sql="update orderstatu set name='$name' where id=$id";

        // 修改数据
        if (DB::update($sql)) {
            return 1;
        }else{
            return 0;
        }
    }

}
