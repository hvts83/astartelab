<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Astarté - <?php echo $__env->yieldContent('title'); ?> </title>
  <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
  <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
</head>
<body class="gray-bg">

  <?php echo $__env->yieldContent('content'); ?>

  <script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>

  <?php $__env->startSection('scripts'); ?>
  <?php echo $__env->yieldSection(); ?>

  </body>
  </html>
