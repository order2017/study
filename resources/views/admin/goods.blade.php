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
        <th>标题</th>
        <th>信息</th>
        <th>图片</th>
        <th>价格</th>
        <th>存库</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data as $key=>$value)

        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->info }}</td>
            <td>
                <img src="/uploads/goods/{{ $value->img }}" width="60" height="50" alt="">
                <br>
                @foreach($value->pic_all as $key=>$val)
                    <img width="50" height="30" src="/uploads/goods/{{$val->img}}" alt="">
                @endforeach
            </td>
            <td>{{ $value->price }} 元</td>
            <td>{{ $value->num }}</td>
            <td>修改 | <a href="javascript:void(0);">删除</a></td>
        </tr>

    @endforeach

    </tbody>
</table>

<!-- 分页效果 -->
<div class="panel-footer">
    <nav style="text-align:center;">
    {{$data->links()}}
    <!-- <ul class="pagination">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul> -->
    </nav>
</div>

</body>

<script type="text/javascript">

</script>

</html>