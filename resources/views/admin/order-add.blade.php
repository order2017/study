<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单收货地址列表</title>
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
    <h3>订单收货地址列表</h3>

    <caption>
        <a href="/admin/order" type="button" class="btn btn-default">订单列表</a>
    </caption>

    <tbody>

    <tr>
        <td>姓名</td>
        <td>{{$data->sname}}</td>
    </tr>
    <tr>
        <td>电话</td>
        <td>{{$data->stel}}</td>
    </tr>
    <tr>
        <td>所在省市</td>
        <td>{{$data->addr}}</td>
    </tr>
    <tr>
        <td>详细信息</td>
        <td>{{$data->addrInfo}}</td>
    </tr>

    <tr>
        <td>邮箱</td>
        <td>{{$data->email}}</td>
    </tr>

    </tbody>
</table>

</body>

</html>