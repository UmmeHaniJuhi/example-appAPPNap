@extends('frontend.master')

@section('content')

		<div class="section">
			<!-- container -->
			<div class="container">
				<h3 class="title">Categories</h3>
				<!-- row -->
				<div class="row pb-3">
					@foreach ($categories as $category )
					<!-- shop -->
						<div class="col-lg-3">
							<div class="shop" style="width: 100%; height: 150px;" >
								<div class="shop-img">
									<img src="/category/{{$category->image}}" style="width: 100%; height: 150px; object-fit: cover;" alt="">
								</div>
								<div class="shop-body">
									<h3>{{$category->name}}<br>Collection</h3>
									<a href="{{url('/product_by_cat/'.$category->id)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
					<!-- /shop -->
					@endforeach
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

	
        <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
                                    @foreach ($categories as $category )
                                    <li><a  href="{{url('/product_by_cat/'.$category->id)}}">{{$category->name}}</a></li>
                                    @endforeach
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										@foreach ($products as $product) 
											<!-- product -->
										<div class="product">
											<div class="product-img">
												<a href="{{url('/view-details'.$product->id)}}">
												<img src="/product/{{$product->image}}" style="width: 256px; height:256px"  alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
												</a>
											</div>
											<div class="product-body">
												<p class="product-category"><a href="{{url('/view-details'.$product->id)}}">{{$product->category->name}}</p></a>
												<h3 class="product-name"><a href="{{url('/view-details'.$product->id)}}">{{$product->name}}</a></h3>
												<h4 class="product-price">&#2547;{{$product->price}} <del class="product-old-price">&#2547;{{$product->price}}</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											
	


										</div>
										<!-- /product -->
										@endforeach
										

										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	<!-- HOT DEAL SECTION -->
	
	<!-- /HOT DEAL SECTION -->
		
@endsection