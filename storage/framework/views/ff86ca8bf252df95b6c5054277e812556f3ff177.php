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

<?php echo $__env->make('include.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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

    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <td><?php echo e($value->id); ?></td>
            <td><?php echo e($value->title); ?></td>
            <td><?php echo e($value->info); ?></td>
            <td>
                <img src="/uploads/goods/<?php echo e($value->img); ?>" width="60" height="50" alt="" data-toggle="modal" data-target="#myModal-<?php echo e($value->id); ?>">

                <div class="modal fade" id="myModal-<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                                <img src="/uploads/goods/<?php echo e($value->img); ?>" width="100">
                            </div>
                            <div class="modal-body">
                                <?php $__currentLoopData = $value->pic_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img width="100" height="80" src="/uploads/goods/<?php echo e($val->img); ?>" alt="">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
            <td><?php echo e($value->price); ?> 元</td>
            <td><?php echo e($value->num); ?></td>
            <td>修改 | <a href="javascript:void(0);">删除</a></td>
        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>

<!-- 分页效果 -->
<?php echo e($data->links()); ?>


</body>

<script type="text/javascript">

</script>

</html>