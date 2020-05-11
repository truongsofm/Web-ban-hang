@extends('master')
@section('content')
	<div class="container">
		<div id="content">
			
			<form action="{{route('CheckOut')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				@csrf
				<div class="row" style="font-size: 15px;">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" placeholder="Họ tên" name="name" required>
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<div class="custom-control custom-radio custom-control-inline" style=" width: 20%;">
						      <input type="radio" class="custom-control-input" id="gender1" name="gender" value="nam">
						      <label class="custom-control-label" for="gender1">Nam</label>
						    </div>
						    <div class="custom-control custom-radio custom-control-inline" style=" width: 20%;">
						      <input type="radio" class="custom-control-input" id="gender2" name="gender" value="nu">
						      <label class="custom-control-label" for="gender2">Nữ</label>
						    </div>
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required placeholder="expample@gmail.com">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress" placeholder="Street Address" name="address" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone_number" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="note" placeholder="Ghi chú" autocomplete="on"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
										@foreach($product_cart as $cart_item)
										<div class="media">
											<img width="25%" src="source/image/product/{{$cart_item['item']['image']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large" style="font-size: 20px; font-weight: 500; margin-bottom: 5px;">{{$cart_item['item']['name']}}</p>
												<span class="cart-item-amount"> Đơn giá: 
													<span>
														@if($cart_item['item']['promotion_price'] == 0)

														{{$cart_item['item']['unit_price']}}
														@else

														{{$cart_item['item']['promotion_price']}}
														@endif

														đồng
													</span>
												</span><br>
												<span style="font-size: 15px;">
													Số lượng:
													{{$cart_item['qty']}} Hộp
												</span>
											</div>
										</div>
										@endforeach
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18" style="font-size: 20px; font-weight: 400;">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{Session('cart')->totalPrice}} đồng</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<div class="custom-control custom-radio custom-control-inline">
										      <input type="radio" class="custom-control-input" id="payment_method_bacs" name="payment_method" value="COD"checked="checked" data-order_button_text="">
										      <label class="custom-control-label" for="payment_method_bacs">Thanh toán khi nhận hàng</label>
									    </div>
						
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<div class="custom-control custom-radio custom-control-inline">
										      <input type="radio" class="custom-control-input" id="payment_method_cheque" name="payment_method" value="ATM" data-order_button_text="">
										      <label class="custom-control-label" for="payment_method_cheque">Chuyển khoản ngân hàng (Free ship)</label>
									    </div>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: CẤN XUÂN TÙNG
											<br>- Ngân hàng vietcombank
										</div>						
									</li>
									
								</ul>
							</div>
							<button type="submit">
							<div class="text-center"><a class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></a></div>
							</button>
						</div> <!-- .your-order -->
					</div>
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