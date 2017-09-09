<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>无限级分类管理</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <style type="text/css">
        html,body{
            margin:10px 50px 10px 50px;
        }
    </style>
</head>
<body>
<table class="table table-bordered">
    <h3>无限级分类管理</h3>

    <caption>
        <a href="/admin/type" type="button" class="btn btn-default">分类列表</a>
        <a href="/admin/type-create" type="button" class="btn btn-success">添加分类</a>
    </caption>

    <thead>
    <tr>
        <th>ID</th>
        <th>分类名称</th>
        <th>标题</th>
        <th>关键字</th>
        <th>描述</th>
        <th>添加子类</th>
        <th>楼层</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $list)
        <tr>
            <td>{{ $list->id }}</td>
            <td>{{ $list->name }}</td>
            <td>{{ $list->title }}</td>
            <td>{{ $list->keywords }}</td>
            <td>{{ $list->description }}</td>
            <td><a href="/admin/type-create?pid={{ $list->id }}&path={{ $list->path }}{{ $list->id }}">添加子类</a></td>
            <td>
                @if($list->is_lou)
                    <button type="button" class="btn btn-success">是</button>
                @else
                    <button type="button" class="btn btn-danger">否</button>
                @endif
            </td>
            <td>修改 | <a href="javascript:void(0);" onclick="del({{ $list->id }})">删除</a></td>
        </tr>
        @foreach($list->parent as $line)
            <tr bgcolor="#ffc0cb">
                <td>{{ $line->id }}</td>
                <td>{{ $line->name }}</td>
                <td>{{ $line->title }}</td>
                <td>{{ $line->keywords }}</td>
                <td>{{ $line->description }}</td>
                <td><a href="/admin/type-create?pid={{ $line->id }}&path={{ $line->path }}{{ $line->id }}">添加子类</a></td>
                <td>
                    @if($line->is_lou)
                        <button type="button" class="btn btn-success">是</button>
                    @else
                        <button type="button" class="btn btn-danger">否</button>
                    @endif
                </td>
                <td>修改 | <a href="javascript:void(0);" onclick="del({{ $line->id }})">删除</a></td>
            </tr>
            @foreach($line->parent as $san)
                <tr bgcolor="#d3d3d3">
                    <td>{{ $san->id }}</td>
                    <td>{{ $san->name }}</td>
                    <td>{{ $san->title }}</td>
                    <td>{{ $san->keywords }}</td>
                    <td>{{ $san->description }}</td>
                    <td></td>
                    <td>
                        @if($san->is_lou)
                            <button type="button" class="btn btn-success">是</button>
                        @else
                            <button type="button" class="btn btn-danger">否</button>
                        @endif
                    </td>
                    <td>修改 | <a href="javascript:void(0);" onclick="del({{ $san->id }})">删除</a></td>
                </tr>
            @endforeach
        @endforeach
    @endforeach
    </tbody>
</table>
</body>

<script type="text/javascript">

    function del(id) {
        if (confirm("您确定要删除吗？")){
            $.post('/admin/type-delete/'+id,{'_token':'{{ csrf_token() }}','_method':'get'},function (data) {
                if (data==1){
                    window.location.reload();
                }
            });
        }
    }

</script>

</html>