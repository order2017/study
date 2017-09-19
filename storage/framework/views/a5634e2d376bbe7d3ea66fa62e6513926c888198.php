<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>无限级分类管理</title>
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
    <h3>无限级分类管理</h3>

    <caption>
        <a href="/admin/type" type="button" class="btn btn-default">分类列表</a>
        <a href="/admin/type-create" type="button" class="btn btn-success">添加一级分类</a>
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
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($list->id); ?></td>

            <?php $arr=explode(',',$list->path); $tot=count($arr)-2; ?>
            <td><?php echo e(str_repeat("|===",$tot)); ?><?php echo e($list->name); ?></td>

            <td>顶层</td>
            <td><?php echo e($list->title); ?></td>
            <td><?php echo e($list->keywords); ?></td>
            <td><?php echo e($list->description); ?></td>
            <td><a href="/admin/type-create?pid=<?php echo e($list->id); ?>&path=<?php echo e($list->path); ?><?php echo e($list->id); ?>">添加二级子类</a></td>
            <td>
                <?php if($list->is_lou): ?>
                    是
                <?php else: ?>
                    否
                <?php endif; ?>
            </td>
            <td>修改 | <a href="javascript:void(0);" onclick="del(<?php echo e($list->id); ?>)">删除</a></td>
        </tr>
        <?php $__currentLoopData = $list->parent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($line->id); ?></td>

                <?php $arr=explode(',',$line->path); $tot=count($arr)-2; ?>
                <td><?php echo e(str_repeat("|===",$tot)); ?><?php echo e($line->name); ?></td>

                <td><?php echo e($list->name); ?></td>
                <td><?php echo e($line->title); ?></td>
                <td><?php echo e($line->keywords); ?></td>
                <td><?php echo e($line->description); ?></td>
                <td><a href="/admin/type-create?pid=<?php echo e($line->id); ?>&path=<?php echo e($line->path); ?><?php echo e($line->id); ?>">添加三级子类</a></td>
                <td>
                    <?php if($line->is_lou): ?>
                        是
                    <?php else: ?>
                        否
                    <?php endif; ?>
                </td>
                <td>修改 | <a href="javascript:void(0);" onclick="del(<?php echo e($line->id); ?>)">删除</a></td>
            </tr>
            <?php $__currentLoopData = $line->parent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $san): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($san->id); ?></td>

                    <?php $arr=explode(',',$san->path); $tot=count($arr)-2; ?>
                    <td><?php echo e(str_repeat("|===",$tot)); ?><?php echo e($san->name); ?></td>

                    <td><?php echo e($line->name); ?></td>
                    <td><?php echo e($san->title); ?></td>
                    <td><?php echo e($san->keywords); ?></td>
                    <td><?php echo e($san->description); ?></td>
                    <td></td>
                    <td>
                        <?php if($san->is_lou): ?>
                            是
                        <?php else: ?>
                            否
                        <?php endif; ?>
                    </td>
                    <td>修改 | <a href="javascript:void(0);" onclick="del(<?php echo e($san->id); ?>)">删除</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</body>

<script type="text/javascript">

    function del(id) {

        layer.msg('您确定要删除吗？', {
            time: 0 //不自动关闭
            ,btn: ['删除', '取消']
            ,yes: function(index){
                layer.close(index);
                $.post('/admin/type-delete/'+id,{'_token':'<?php echo e(csrf_token()); ?>','_method':'get'},function (data) {
                    if (data==1){
                        window.location.reload();
                    }
                });
            }
        });

    }

</script>

</html>