<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astarté - <?php echo $__env->yieldContent('title'); ?> </title>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('img/favicon.ico')); ?>"/>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('img/favicon.ico')); ?>"/>
    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <link href="<?php echo e(asset('css/jasny/jasny-bootstrap.min.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="md-skin">

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        <?php echo $__env->make('layouts.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            <?php echo $__env->make('layouts.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $__env->yieldContent('title'); ?> </h2>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                        <?php echo $__env->yieldContent('breadcrumb'); ?>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <!-- Main view  -->
            <?php echo $__env->yieldContent('content'); ?>

            <!-- Footer -->
            <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/jasny/jasny-bootstrap.min.js')); ?>"></script>
<script type="text/javascript">
    var APP_URL = <?php echo json_encode(url('/')); ?>;
</script>
<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
