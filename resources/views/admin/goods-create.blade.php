<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品管理</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- 引入CSS -->
    <link rel="stylesheet" href="/up/uploadify.css">
    <!-- 引入JQ -->
    <script src="/up/jquery.min.js"></script>
    <!-- 引入文件上传插件 -->
    <script src="/up/jquery.uploadify.min.js"></script>

    <script type="text/javascript" charset="utf-8" src="/baidu/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/baidu/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/baidu/lang/zh-cn/zh-cn.js"></script>

    <style type="text/css">
        html,body{
            margin:10px 50px 10px 50px;
        }
    </style>
</head>
<body>

<table class="table table-bordered">
    <h3>商品管理</h3>

    <caption>
        <a href="/admin/goods" type="button" class="btn btn-default">商品列表</a>
            <a href="/admin/goods-create" type="button" class="btn btn-success">添加商品</a>
    </caption>

    <tr>
        <td>
            <form class="form-horizontal" role="form" action="/admin/goods-create" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstname" name="title" placeholder="请输入商品名称">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">商品简介</label>
                    <div class="col-sm-10">
                        <textarea name="info" id="" class="form-control"  placeholder="请输入商品简介"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">商品所属分类</label>
                    <div class="col-sm-10">
                        <select name="cid" class="form-control" id="">
                            <option value="">请选择商品分类</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">商品价格</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastname" name="price" placeholder="请输入商品价格">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">商品库存</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastname" name="num" placeholder="请输入商品库存">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">商品封面图片</label>
                    <div class="col-sm-10">
                        <input type="file" name="" id="uploads">
                        <div id="main"></div>
                        <input type="hidden" name="img" id="imgs">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">商品多图片</label>
                    <div class="col-sm-10">
                        <input type="file" name="" id="uploads1">
                        <div id="main1"></div>
                        <input type="hidden" name="imgs" id="imgs1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">商品简介</label>
                    <div class="col-sm-10">
                        <script id="editor" type="text/plain" name="text" style="width:100%;height:300px;"></script>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">商品配置</label>
                    <div class="col-sm-10">
                        <script id="editor1" type="text/plain" name="config" style="width:100%;height:300px;"></script>
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

<script type="text/javascript">

    // 当所有HTML代码都加载完毕
    $(function() {
        // 商品详情的百度编辑器调用
        var ue = UE.getEditor('editor');
        var ue1 = UE.getEditor('editor1');

        // 声明字符串
        var imgs='';
        // 使用 uploadify 插件
        $('#uploads').uploadify({
            // 设置文本
            'buttonText' : '图片上传',
            // 设置文件传输数据
            'formData'     : {
                '_token':'{{ csrf_token() }}',
                'files':'goods',

            },
            // 上传的flash动画
            'swf'      : "/up/uploadify.swf",
            // 文件上传的地址
            'uploader' : "/admin/upload-file",
            // 当文件上传成功
            'onUploadSuccess' : function(file, data, response) {

                // 拼接图片
                imgs="<img width='200px'  src='/uploads/goods/"+data+"'>";
                // 展示图片
                $("#main").html(imgs);
                // 隐藏传递数据
                $("#imgs").val(data);

            }
        });

        // 商品的多图片上传
        var imgs1='';

        var arr=[];
        // 使用 uploadify 插件
        $('#uploads1').uploadify({
            // 设置文本
            'buttonText' : '图片多上传',
            // 设置文件传输数据
            'formData'     : {
                '_token':'{{ csrf_token() }}',
                'files':'goods',

            },
            // 上传的flash动画
            'swf'      : "/up/uploadify.swf",
            // 文件上传的地址
            'uploader' : "/admin/upload-file",
            // 当文件上传成功
            'onUploadSuccess' : function(file, data, response) {

                // 拼接图片
                imgs1+="<img width='200px'  src='/uploads/goods/"+data+"'>";

                arr.push(data);
                // 展示图片
                $("#main1").html(imgs1);
                // 隐藏传递数据
                $("#imgs1").val(arr.join(','));

            }
        });
    });

</script>

</body>
</html>