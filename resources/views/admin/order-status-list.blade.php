<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单状态管理列表</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="../layer/layer.js"></script>
    <style type="text/css">
        html,body{
            margin:10px 50px 10px 50px;
        }
        tr,th{
            text-align: center;
            vertical-align: middle;
        }
        .queren{
            display:none;
        }
        .form-control {
            display: inline;
            width: 150px;
        }
    </style>
</head>
<body>

@include('include.nav')

<table class="table table-bordered">
    <h3>订单状态管理列表</h3>

    <caption>
        <a href="/admin/order" type="button" class="btn btn-default">订单列表</a>
        <a href="/admin/order-status-list" type="button" class="btn btn-success">订单状态管理</a>
    </caption>

    <thead>
    <tr>
        <th>ID</th>
        <th>订单状态名</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td><input type="text" value="{{$val->name}}" class="form-control"> <button onclick="save(this,{{$val->id}})" class="btn btn-success queren">确认</button></td>
        </tr>
    @endforeach

    </tbody>
</table>

</body>

<script type="text/javascript">
    // 鼠标移入确认按钮展示
    $("input[type=text]").focus(function(){
        $(".queren").hide();
        $(this).next("button").show();
    });

    // 数据修改
    function save(obj,id){

        // 获取用户输入的状态信息
        name=$(obj).prev("input").val();

        // 发送ajax请求
        $.post("/admin/order-status-edit",{id:id,name:name,"_token":'{{csrf_token()}}'},function(data){
            // 判断是否成功
            if (data) {
                $(obj).hide();
            }else{
                alert('修改失败');
            }
        });
    }
</script>

</html>