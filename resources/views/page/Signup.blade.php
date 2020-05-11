@extends('master')
@section('content')
<div class="container">
		<div id="content">
			
			<form action="{{route('postSignup')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
						@csrf
				<div class="row">
					<div class="col-sm-3">
					</div>
					<div class="col-sm-6">
						@if(count($errors) > 0)
						 	<div class="alert alert-danger">
						 		@foreach($errors->all() as $er)
						 		{{$er}}
						 		@endforeach
						 	</div>
						@endif
						@if (Session::has('dang ky'))
							<div class="alert alert-success">
					      		{{ Session::get('dang ky') }}
							</div>
						@endif	
						<h3 style="color: blue; font-family: sans-serif; font-weight: bold">ĐĂNG KÝ</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label style="margin-top: 10px;font-size: 20px; font-weight: 500" for="email">Email (bắt buộc)</label>
							<input class="form-control" style="margin-top: 5px;" type="email" id="email" name="email" required>
						</div>

						<div class="form-block">
							<label style="margin-top: 10px;font-size: 20px; font-weight: 500" for="your_last_name">Tên người dùng</label>
							<input class="form-control" style="margin-top: 5px;" type="text" id="your_last_name" name="username" required>
						</div>
						
						<div class="form-block">
							<label style="margin-top: 10px;font-size: 20px; font-weight: 500" for="phone">Số điện thoại</label>
							<input class="form-control" style="margin-top: 5px;" type="text" id="phone" name="phone" required>
						</div>
						<div class="form-block">
							<label style="margin-top: 10px;font-size: 20px; font-weight: 500" for="phone">Mật khẩu</label>
							<input class="form-control" style="margin-top: 5px;" type="password" id="phone" name="password" required>
						</div>
						<div class="form-block">
							<label style="margin-top: 10px;font-size: 20px; font-weight: 500" for="phone">Xác nhận mật khẩu</label>
							<input class="form-control" style="margin-top: 5px;" type="password" id="phone" name="password_confirmation" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
@section('script')
<!-- include js files -->
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<!--customjs-->
	<script type="text/javascript">
    $(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;

        // passes on every "a" tag
        $(".main-menu a").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                $(this).closest("li").addClass("active");
				$(this).parents('li').addClass('parent-active');
            }
        });
    });   


</script>
<script>
	 jQuery(document).ready(function($) {
                'use strict';
				
// color box

//color
      jQuery('#style-selector').animate({
      left: '-213px'
    });

    jQuery('#style-selector a.close').click(function(e){
      e.preventDefault();
      var div = jQuery('#style-selector');
      if (div.css('left') === '-213px') {
        jQuery('#style-selector').animate({
          left: '0'
        });
        jQuery(this).removeClass('icon-angle-left');
        jQuery(this).addClass('icon-angle-right');
      } else {
        jQuery('#style-selector').animate({
          left: '-213px'
        });
        jQuery(this).removeClass('icon-angle-right');
        jQuery(this).addClass('icon-angle-left');
      }
    });
				});
	</script>
@endsection