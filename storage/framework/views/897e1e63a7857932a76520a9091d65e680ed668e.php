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

<?php echo $__env->make('include.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<table class="table table-bordered">
    <h3>订单管理列表</h3>

    <caption>
        <a href="/admin/order" type="button" class="btn btn-default">订单列表</a>
        <a href="/admin/order-status-list" type="button" class="btn btn-success">订单状态管理</a>
    </caption>

    <thead>
    <tr>
        <th>订单号</th>
        <th>用户</th>
        <th>收货人信息</th>
        <th>状态</th>
        <th>下单时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>

    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><a href="/admin/order-details?code=<?php echo e($value->code); ?>"><?php echo e($value->code); ?></a></td>
            <td><?php echo e($value->name); ?></td>
            <td>
                <a href="/admin/order-add?id=<?php echo e($value->aid); ?>">收货人信息</a>
            </td>
            <td><?php echo e($value->ssname); ?></td>
            <td><?php echo e(date("Y-m-d H:i:s",$value->time)); ?></td>

            <td>
                <?php if($value->sid==6): ?>
                    <a href="javascript:;">修改状态</a>
                <?php else: ?>
                    <a href="/admin/order-edit?sid=<?php echo e($value->sid); ?>&code=<?php echo e($value->code); ?>">修改状态</a>
                <?php endif; ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>

</body>

<script type="text/javascript">

</script>

</html>