<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单详情列表</title>
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
    <h3>订单详情列表</h3>

    <caption>
        <a href="/admin/order" type="button" class="btn btn-default">订单列表</a>
    </caption>

    <thead>
    <tr>
        <th>商品名</th>
        <th>商品图片</th>
        <th>购买价格</th>
        <th>购买数量</th>
        <th>小计</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $number=0;
    $money=0;
    ?>

    @foreach($data as $value)
        <tr>
            <td>{{$value->title}}</td>
            <td>
                <img width="200px" src="/uploads/goods/{{$value->img}}" alt="">
            </td>
            <td>{{$value->price}}</td>
            <td>{{$value->num}}</td>
            <td>{{$value->price*$value->num}}</td>
            <?php
            $number+=$value->num;
            $money+=$value->price*$value->num;
            ?>
        </tr>
    @endforeach

    <tr>
        <td>合计</td>
        <td>价格：</td>
        <td>{{$money}}</td>
        <td>数量：</td>
        <td>{{$number}}</td>
    </tr>

    </tbody>
</table>

</body>

<script type="text/javascript">

</script>

</html>