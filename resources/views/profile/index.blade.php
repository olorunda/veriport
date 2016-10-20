<?php $url=$_SERVER['PHP_SELF']; 

$url=explode('/',$url);
?>


<body style="background:url('{{asset('img/bg.png')}}')" onload="advert()">

            <!-- *** NAVBAR END *** -->
         @yield('content')

<!-- *** COPYRIGHT ***
_________________________________________________________ -->
	<!-- *** COPYRIGHT ***
_________________________________________________________ -->
	<script src="{{asset('js/jquery.js')}}" ></script>
	@if(Auth::guest())
		@elseif(Auth::user()->type=="1")

	    <script src="{{asset('js/raphael-min.js')}}"></script>
	    <script src="{{asset('js/morris.min.js')}}"></script>

	@else
	
	@endif
	<script src="{{asset('js/jquery-barcode.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script src="{{asset('js/jquery.cookie.js')}}"></script>
    <script src="{{asset('js/waypoints.min.js')}}"></script>
	<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{asset('js/front.js')}}"></script>    

    <!-- owl carousel -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/bootstrap-hover-dropdown.js')}}" ></script>
   <script type="text/javascript" src="{{asset('js/dropzone.min.js')}}"></script>
  
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