<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品管理列表</title>
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
<table class="table table-bordered">
    <h3>商品管理列表</h3>

    <caption>
        <a href="/admin/goods" type="button" class="btn btn-default">商品列表</a>
        <a href="/admin/goods-create" type="button" class="btn btn-success">添加商品</a>
    </caption>

    <thead>
    <tr>
        <th>ID</th>
        <th>分类名称</th>
        <th>所属上级</th>
        <th>标题</th>
        <th>关键字</th>
        <th>描述</th>
        <th>添加子类</th>
        <th>楼层</th>
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