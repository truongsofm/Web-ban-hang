@extends('master')
@section('content')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3" id="menutype">
						<ul class="aside-menu">
							@foreach($all_type as $type)
							<li><a href="{{route('ProductType',$type->id)}}">{{$type->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$type_product->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($product)}} sản phẩm tìm thấy</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $sp)
								<div class="col-sm-4" style="margin-top:20px;">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('ProductDetail',$params = ['type' => $sp->id_type,'name' => $sp->name])}}"><img src="source/image/product/{{$sp->image}}" height="270px" width="270px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price">
												@if($sp->promotion_price==0) <!--Neu gia khuyen mai = 0-->
												<span class="flash-sale">{{$sp->unit_price}}đ</span>
												@else
												<span class="flash-del">{{$sp->unit_price}}đ</span>
												<span class="flash-sale">{{$sp->promotion_price}}đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('ProductDetail',$params = ['type' => $sp->id_type,'name' => $sp->name])}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
  						<div class="row">
       							@foreach($other_product as $other)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('ProductDetail',$params = ['type' => $other->id_type,'name' => $other->name])}}"><img src="source/image/product/{{$other->image}}" height="270px"  width="270px" alt=""></a>
										</div>
										<div class="single-item-body">
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
											<a class="beta-btn primary" href="{{route('ProductDetail',$params = ['type' => $other->id_type,'name' => $other->name])}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
						   		@endforeach
						   	</div>
						<div class="space40">&nbsp;</div>						
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
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
@endsection