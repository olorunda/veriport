<?php $url=$_SERVER['PHP_SELF']; 

$url=explode('/',$url);
?>


<body style="background:url('<?php echo e(asset('img/bg.png')); ?>')" onload="advert()">

            <!-- *** NAVBAR END *** -->
         <?php echo $__env->yieldContent('content'); ?>

<!-- *** COPYRIGHT ***
_________________________________________________________ -->
	<!-- *** COPYRIGHT ***
_________________________________________________________ -->
	<script src="<?php echo e(asset('js/jquery.js')); ?>" ></script>
	<?php if(Auth::guest()): ?>
		<?php elseif(Auth::user()->type=="1"): ?>

	    <script src="<?php echo e(asset('js/raphael-min.js')); ?>"></script>
	    <script src="<?php echo e(asset('js/morris.min.js')); ?>"></script>

	<?php else: ?>
	
	<?php endif; ?>
	<script src="<?php echo e(asset('js/jquery-barcode.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/jquery.cookie.js')); ?>"></script>
    <script src="<?php echo e(asset('js/waypoints.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.parallax-1.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('js/front.js')); ?>"></script>    

    <!-- owl carousel -->
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/bootstrap-hover-dropdown.js')); ?>" ></script>
   <script type="text/javascript" src="<?php echo e(asset('js/dropzone.min.js')); ?>"></script>
  
		<div id="copyright" class="<?php if($url[2]=="manageposition"||$url[2]=='login'||$url[2]=='panel'|| $url[2]=='register'||$url[2]==''):  else: ?><?php endif; ?>">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2016. DPR / Department of Petroleum Resources. All Rights Reserved.</p>
                    <p class="pull-right">Designed by <a href="http://www.snapnet.com.ng">Snapnet Limited</a> 
                        <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                    </p>

                </div>
            </div>
        </div>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->
</body>

</html>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->
            <!-- *** NAVBAR END *** -->