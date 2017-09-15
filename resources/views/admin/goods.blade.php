<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品管理列表</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../layer/layer.js"></script>
    <style type="text/css">
        html,body{
            margin:10px 50px 10px 50px;
        }
        tr,th{
            text-align: center;
            vertical-align: middle;
        }
        .modal-dialog {
            width: 600px;
            margin: 100px auto 30px auto;
        }
    </style>
</head>
<body>

@include('include.nav')

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
                <img src="/uploads/goods/{{ $value->img }}" width="60" height="50" alt="" data-toggle="modal" data-target="#myModal-{{ $value->id }}">

                <div class="modal fade" id="myModal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                                <img src="/uploads/goods/{{ $value->img }}" width="100">
                            </div>
                            <div class="modal-body">
                                @foreach($value->pic_all as $key=>$val)
                                    <img width="100" height="80" src="/uploads/goods/{{$val->img}}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </td>
            <td>{{ $value->price }} 元</td>
            <td>{{ $value->num }}</td>
            <td>修改 | <a href="javascript:void(0);">删除</a></td>
        </tr>

    @endforeach

    </tbody>
</table>

<!-- 分页效果 -->
{{$data->links()}}

</body>

<script type="text/javascript">

</script>

</html>