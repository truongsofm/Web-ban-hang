@extends('master')
@section('content')
	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">

						<div class="col-sm-4" id="product">
							<img src="source/image/product/{{$product->image}}" height="270px" alt="">
						</div>
	
						<form action="{{route('AddMultiToCart',$product->id)}}" method="post" class="beta-form-checkout">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						@csrf
						<div class="col-sm-12">
							<div class="single-item-body">
								<p class="single-item-title" style="font-size: 30px; font-weight: 500;">{{$product->name}}</p>
								<p class="single-item-price" style="margin-top: 20px;">
									@if($product->promotion_price==0) <!--Neu gia khuyen mai = 0-->
									<span class="flash-sale">{{$product->unit_price}}đ</span>
									@else
									<span class="flash-del">{{$product->unit_price}}đ</span>
									<span class="flash-sale">{{$product->promotion_price}}đ</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$product->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng:</p>
								<select class="custom-select" name="quantity" style="width: 150px; height: 40px; line-height: normal; margin-top:-7px;">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<button type="submit" class="add-to-cart" style="border: 1px solid black; height: 40px; width: 40px; margin-left: 5px;"><i class="fa fa-shopping-cart"></i></button>
								<div class="clearfix"></div>
						</div>
					</form>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="">Chi tiết</a></li>
							<li><a href="">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>Mua cho con chiếc còng tay</p>
							<p>Nâng con dâu vào phòng bay</p>
							<p>Ta sẽ thay thế chồng con</p>
							<p>Tương lai con thêm vàng son</p>
							<p>Nhịp tim tăng, chim cun cút bắt đầu đi săn</p>
							<p>Lil Pump góp sức mình threesome</p>
							<p>Rủ cả big bang</p>
							<p>Quần lót con nhiều hoa văn</p>
							<p>Khi con nằm đây tình nguyện phục vụ</p>
							<p>Bộ môn thể thao thể dục dụng cụ</p>
							<p>Vì cha là dân chuyên nghiệp thực thụ</p>
							<p>Làm bao người đi vào trong xanh pôn mang theo bụng bự</p>
							<p>1 2 3 4 từ vai qua rốn</p>
							<p>2 2 3 4 hư đốn</p>
							<p>Không gian như đang tối lại vì đồng hồ điểm giờ 12</p>
							<p>Nghe đâu xung quanh có tiếng thở dài mà chẳng hiểu là của một ai</p>
							<p>Và rồi cả 2 lao vào rên hét lên, rên hét lên, rên hét lên 2 thân thể đầy mồ hôi</p>
							<p>Mặc cho cô ta kêu la gào thét lên, gào thét lên, chắc không một ai sẽ phát hiện được ,đời giả dối mà</p>
							<p>Mỗi khi bố trông thấy gái xinh</p>
							<p>Ở phía dưới nhô lên cái đinh</p>
							<p>À hình như là bố thích con ngày đêm mong muốn 1 lần chích con</p>
							<p>Con vẫn hơi e thẹn, con lấy tay che bẹn, đưa tay con che miệng, sợ người ta phát hiện và lăm le nhăm nhe hay nghe lén</p>
							<p>Bỗng từ đâu 2 viên lục lạc</p>
							<p>Nó hình như đang hơi trục trặc</p>
							<p>Bố bảo con hãy đưa tay vào sửa xong tiện luôn thì con sục cac</p>
							<p>Mồ hôi thì tuôn mắt bố ngày cạn đỏ hoen</p>
							<p>Bố làm cầu thủ nên rất thích chơi sân nhỏ cỏ đen</p>
							<p>2 chân nhấc lên trên vai chơi style hiphop</p>
							<p>Rồi nâng mâm bóp xôi xong thôi chơi sang deepthroat</p>
							<p>Tuổi năm mơi, nhưng mà sao hung hăng như thanh niên trai tráng</p>
							<p>Bố chẳng sợ đếch gì đưa tay gảy nhẹ quả chuông vàng</p>
							<p>Bố tụt cooc xê, xong rồi mút mê, mơ màng doggy loay hoay như ăn búp phê</p>
							<p>Bất chấp con đang đúng lúc ngày hành kinh</p>
							<p>Giường là chiến trường bố đưa xe tăng đâm tổng hành dinh</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm khác</h4>

						<div class="row">
							@foreach($other_product as $other)
							<div class="col-sm-4" style="margin-top:20px;">
									<div class="single-item">
										@if($other->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('ProductDetail',$params = ['type' => $other->id_type,'name' => $other->name])}}"><img src="source/image/product/{{$other->image}}" height ="270px" alt=""></a>
										</div>
										<div class="single-item-body" style="padding-bottom: 5px;">
											<p class="single-item-title">{{$other->name}}</p>
											<p class="single-item-price">
												@if($other->promotion_price==0) <!--Neu gia khuyen mai = 0-->
												<span class="flash-sale">{{$other->unit_price}}đ</span>
												@else
												<span class="flash-del">{{$other->unit_price}}đ</span>
												<span class="flash-sale">{{$other->promotion_price}}đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside" style="padding: 0px;">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm nổi bật</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($top_product as $top)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('ProductDetail',$params = ['type' => $top->id_type,'name' => $top->name])}}"><img src="source/image/product/{{$top->image}}" alt=""></a>
									<div class="media-body">
										{{$top->name}}<br>
										@if($top->promotion_price==0) <!--Neu gia khuyen mai = 0-->
										<span class="flash-sale">{{$top->unit_price}}đ</span>
										@else
										<span class="flash-del">{{$top->unit_price}}đ</span>
										<span class="flash-sale">{{$top->promotion_price}}đ</span>
										@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
									@foreach($new_product as $new)
									<div class="media beta-sales-item">
										<a class="pull-left" href="{{route('ProductDetail',$params = ['type' => $new->id_type,'name' => $new->name])}}"><img src="source/image/product/{{$new->image}}" alt=""></a>
										<div class="media-body">
											{{$new->name}}<br>
											@if($new->promotion_price==0) <!--Neu gia khuyen mai = 0-->
											<span class="flash-sale">{{$new->unit_price}}đ</span>
											@else
											<span class="flash-del">{{$new->unit_price}}đ</span>
											<span class="flash-sale">{{$new->promotion_price}}đ</span>
											@endif
										</div>
									</div>
									@endforeach	
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
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