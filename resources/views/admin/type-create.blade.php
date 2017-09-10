<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>无限级分类管理</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        @if(count(explode(",",Request::get('path')))=="2")
            <a href="{{ Request::getRequestUri() }}" type="button" class="btn btn-success">添加二级分类</a>
        @elseif(count(explode(",",Request::get('path')))=="3")
            <a href="{{ Request::getRequestUri() }}" type="button" class="btn btn-success">添加三级分类</a>
        @else
            <a href="/admin/type-create" type="button" class="btn btn-success">添加一级分类</a>
        @endif
    </caption>

    <tr>
        <td>
            <form class="form-horizontal" role="form" action="/admin/type-create" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">分类名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstname" name="name" placeholder="请输入分类名称">
                        <input type="hidden" name="pid" value="<?php echo isset($_GET['pid']) ? $_GET['pid'] : '0'; ?>" >
                        <input type="hidden" name="path" value="<?php echo isset($_GET['path']) ? $_GET['path'].',' : '0,'; ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">标题</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastname" name="title" placeholder="请输入标题">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">关键字</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastname" name="keywords" placeholder="请输入关键字">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">描述</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastname" name="description" placeholder="请输入描述">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">排序</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastname" name="sort" placeholder="请输入排序">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <label for="name">是否楼层</label>
                        <div>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="is_lou" value="1"> 是
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" name="is_lou" value="0"> 否
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">确定</button>
                        <button type="reset" class="btn btn-danger">重置</button>
                    </div>
                </div>
            </form>
        </td>
    </tr>

</table>
</body>

</body>
</html>