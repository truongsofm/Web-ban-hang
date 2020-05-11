@extends('master')
@section('content')
<div class="rev-slider">
<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									@foreach($slide as $sl)
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
								@endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm thấy {{count($product)}} sản phẩm " {{$namep}} ":</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>

							<div class="row">

								@foreach($product as $p)
								<div class="col-sm-3" style="margin-top:20px;">
									<div class="single-item">
										@if($p->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('ProductDetail',$params = ['type' => $p->id_type,'name' => $p->name])}}"><img src="source/image/product/{{$p->image}}" height ="270px" alt=""></a>
										</div>
										<div class="single-item-body" style="padding-bottom: 5px;">
											<p class="single-item-title">{{$p->name}}</p>
											<p class="single-item-price">
												@if($p->promotion_price==0) <!--Neu gia khuyen mai = 0-->
												<span class="flash-sale">{{$p->unit_price}}đ</span>
												@else
												<span class="flash-del">{{$p->unit_price}}đ</span>
												<span class="flash-sale">{{$p->promotion_price}}đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('AddToCart',$params = ['id' => $p->id,'qty' => '1'])}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('ProductDetail',$params = ['type' => $p->id_type,'name' => $p->name])}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach

							</div>
							<div class="row" style="text-align:center;">{{$product->links()}}</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
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
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="source/assets/dest/js/waypoints.min.js"></script>
	<script src="source/assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="source/assets/dest/js/custom2.js"></script>
	@if (session('thong bao'))
	<script type="text/javascript">
		var x = document.getElementById("body1");
		var y = document.getElementById("popup_noti");
		y.style.opacity = "1";
		y.style.zIndex = "1000";
		x.style.filter = "blur(5px)";
		y.style.filter = "blur(0px)";
		function stop_noti(){
			x.style.filter = "blur(0px)";
			y.style.opacity = "0";
		}
		setTimeout(stop_noti, 3000);
	</script>
	@endif
@endsection