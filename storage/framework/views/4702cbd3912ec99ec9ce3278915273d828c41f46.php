<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'veriPort')); ?></title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/sweetalert.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pace.green.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/ladda.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom.css')); ?>">

    <!-- Scripts -->
    <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
</head>
<body class="ash">

    <div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:45%;padding:2px;font-weight:bold;color:black;"><img src="<?php echo e(asset('img/demo_wait.gif')); ?>" width="64" height="64"><br></div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <strong><i class="fa fa-warning"></i> Whoops!</strong> You need to fix the following errors:<br><br>
                  <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <form class="login" method="POST" action="<?php echo e(url('/login')); ?>">

                <h3>veriPort Login</h3>

                <?php echo e(csrf_field()); ?>

                <label class="control-label" for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" autocomplete="off" value="">

                <label class="control-label" for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="">

                <label>
                    <input type="checkbox" name="remember" id="remember"> Remember me
                </label>

                <button class="btn btn-success" type="submit" id="signin" name="submit">  Log In  </button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo e(asset('js/jquery-1.11.0.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
<script type="text/javascript" data-pace-options='{ "ajax": true }' src="<?php echo e(asset('js/pace.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/spin.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/ladda.min.js')); ?>"></script>
<script type="text/javascript">
    $(function() {
        $("#submit").click(function() {
            $(".btn").css("display", "block");     
        });
    });
</script>
</body>
</html>