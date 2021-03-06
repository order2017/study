<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单管理列表</title>
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
    </style>
</head>
<body>

@include('include.nav')

<table class="table table-bordered">
    <h3>订单管理列表</h3>

    <caption>
        <a href="/admin/order" type="button" class="btn btn-default">订单列表</a>
        <a href="/admin/order-status-list" type="button" class="btn btn-success">订单状态管理</a>
    </caption>

    <thead>
    <tr>
        <th>订单号</th>
        <th>用户</th>
        <th>收货人信息</th>
        <th>状态</th>
        <th>下单时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data as $value)
        <tr>
            <td><a href="/admin/order-details?code={{$value->code}}">{{$value->code}}</a></td>
            <td>{{$value->name}}</td>
            <td>
                <a href="/admin/order-add?id={{$value->aid}}">收货人信息</a>
            </td>
            <td>{{$value->ssname}}</td>
            <td>{{date("Y-m-d H:i:s",$value->time)}}</td>

            <td>
                @if($value->sid==6)
                    <a href="javascript:;">修改状态</a>
                @else
                    <a href="/admin/order-edit?sid={{$value->sid}}&code={{$value->code}}">修改状态</a>
                @endif

            </td>
        </tr>
    @endforeach

    </tbody>
</table>

</body>

<script type="text/javascript">

</script>

</html>