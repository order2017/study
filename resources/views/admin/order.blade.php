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
        <a href="/admin/goods-create" type="button" class="btn btn-success">添加商品</a>
    </caption>

    <thead>
    <tr>
        <th>ID</th>
        <th>标题</th>
        <th>信息</th>
        <th>图片</th>
        <th>价格</th>
        <th>存库</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>修改 | <a href="javascript:void(0);">删除</a></td>
        </tr>

    </tbody>
</table>

</body>

<script type="text/javascript">

</script>

</html>