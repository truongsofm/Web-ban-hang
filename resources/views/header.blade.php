<div id="header">
		<div class="header-top">
			@if (Session::has('dang xuat'))
							<div class="alert alert-success" align="center" style="text-align: center; position: absolute;">
					      		{{ Session::get('dang xuat') }}
							</div>
			@endif
			
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a><i class="fa fa-home"></i> 90-92 Cửa A, Thiên Cung, Thiên Đường</a></li>
						<li><a><i class="fa fa-phone"></i> 034888999X</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if (Route::has('login'))
						 	@if (Auth::check())
                        		<li style="border: none;"><button style="margin-top: 5px; margin-right: 5px; margin-left: 5px;" type="button" class="btn btn-primary">Tài khoản {{Auth::user()->name}}</button></li>  
                        		<button style="margin-top: 5px; margin-right: 5px;" class="btn btn-secondary" type="button"
                        			onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Đăng xuất
                                </button>
                        		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        	@else
								<li style="border: none;"><a><i class="fa fa-user"></i>
								Tài khoản</a></li>
								<li style="border: none;">
									<button style="margin-top: 5px; margin-left: 5px;" type="button" class="btn btn-info" onclick="event.preventDefault();
                                    document.getElementById('signup-form').submit();">Đăng kí
                                	</button>
								</li>
								<li style="border: none;">
									<button style="margin-top: 5px; margin-left: 5px;" type="button" class="btn btn-primary" onclick="event.preventDefault();
                                    document.getElementById('login-form').submit();">
									Đăng nhập
									</button>	
								</li>
								<form id="login-form" action="{{ route('LoginPage') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                                <form id="signup-form" action="{{ route('Signup') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
							@endif
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('HomePage')}}" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="250px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov" style="font-size: 16px;">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp" style="margin-right: 5px;">
						<form role="search" method="get" id="searchform" action="{{route('Search')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							@csrf
					        <input class="form-control" type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
					@if(Session::has('cart'))
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> 
							Giỏ hàng(
								
								@if(Session::has('cart'))
								{{Session('cart')->totalQty}}
								@else
								Trống
								@endif

							) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@foreach($product_cart as $cart_item)
								<div class="cart-item">
									<a class="cart-item-delete" href="{{route('RemoveItem',$cart_item['item']['id'])}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$cart_item['item']['image']}}" alt=""></a>
										<div class="media-body">

											<span class="cart-item-title">{{$cart_item['item']['name']}}</span>
											<span class="cart-item-options"></span>
											<span class="cart-item-amount">{{$cart_item['qty']}}*
												<span>
													@if($cart_item['item']['promotion_price'] == 0)

													{{$cart_item['item']['unit_price']}}
													@else

													{{$cart_item['item']['promotion_price']}}
													@endif

													đồng
												</span>
											</span>
										</div>
									</div>
								</div>
								@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session('cart')->totalPrice}} đồng</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('Bill')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>								
								</div>							
							</div>
						</div> <!-- .cart -->
					@else
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> 
							Giỏ hàng(trống) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								<div class="cart-item" style="padding: 10px;">
									<div class="media" style="padding: 0px;">
										<div class="media-body" style="padding: 5px;">
											<span style="text-align: center;">Bạn chưa mua cái lồn gì cả</span>
											<span class="cart-item-options"></span>
											<span class="cart-item-amount"></span>
										</div>
									</div>
								</div>
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value"> 0 đồng</span></div>
									<div class="clearfix"></div>						
								</div>							
							</div>
						</div> <!-- .cart -->
					@endif
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('HomePage')}}">Trang chủ</a></li>
						<li><a>Loại sản phẩm</a>
							<ul class="sub-menu">
								@foreach($product_type as $type)
								<li><a href="{{route('ProductType',$type->id)}}">{{$type->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('About')}}">Giới thiệu</a></li>
						<li><a href="{{route('Contact')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
