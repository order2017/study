<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单详情列表</title>
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
    </caption>

        <tr>
            <td>
                <div class="col-md-10">

                    <ol class="breadcrumb">
                        <li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
                        <li><a href="#">订单管理</a></li>
                        <li class="active">订单列表</li>

                        <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
                    </ol>

                    <!-- 面版 -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button class="btn btn-danger">订单状态的修改</button>

                        </div>

                        <div class="panel-body">
                            <form action="" method="post">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="">订单号</label>
                                    <input class="form-control" type="text" name="" value="<?php echo e($_GET['code']); ?>" id="">
                                </div>

                                <div class="form-group">
                                    <label for="">订单状态</label>
                                    <select class="form-control"  name="sid" id="">
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($_GET['sid']==$value->id): ?>
                                                <option selected value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="提交">
                                </div>
                            </form>
                        </div>

                        <!-- 分页效果 -->
                        <div class="panel-footer">

                        </div>
                    </div>
                </div>
            </td>
        </tr>


    </tbody>
</table>

</body>

<script type="text/javascript">

</script>

</html>