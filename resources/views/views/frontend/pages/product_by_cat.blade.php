<?php 
use App\Models\Product;
?>
@extends('frontend.master')

@section('content')
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="{{url('/index')}}">Home</a></li>
                    @if(isset($selectedCat))
                    <li><a href="#">{{ $selectedCat->name }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Sub Categories</h3>
                    <div class="checkbox-filter">
                        @foreach ($subcategories as $subcategory)
                        @php
                            $subcatProductCount=\App\Models\Product::subcatProductCount($subcategory->id);
                        @endphp
                        <div class="input-checkbox">
                            <input type="checkbox" id="category-1" >
                            <label for="category-1">
                                <span></span>
                                <a href="{{url('/product_by_subcat/'.$subcategory->id)}}">
                                    {{$subcategory->name}}</a>
                                <small>({{$subcatProductCount}})</small>
                            </label>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        @foreach ($brands as $brand )
                        @php
                            $brandProductCount=\App\Models\Product::brandProductCount($brand->id);
                        @endphp
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-1">
                            <label for="brand-1">
                                <span></span>
                                <a href="{{url('/product_by_brand/'.$brand->id)}}">
                                {{$brand->name}}
                                <small>({{$brandProductCount}})</small>
                                </a>
                            </label>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="./img/product01.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sort By:
                            <select class="input-select">
                                <option value="0">Popular</option>
                                <option value="1">Position</option>
                            </select>
                        </label>

                        <label>
                            Show:
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    @foreach ($products as $product )
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <a href="{{url('/view-details'. $product->id)}}">
                                <img src="/product/{{$product->image}}" style="width: 256px; height:256px"  alt="">
                                <div class="product-label">
                                    <span class="sale">-30%</span>
                                    <span class="new">NEW</span>
                                </div>
                                </a>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{$product->category->name}}</p>
                                <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                                <h4 class="product-price">&#2547;{{$product->price}}<del class="product-old-price">&#2547;{{$product->price}}</del></h4>
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
                                    <button class="quick-view"><a href="{{url('/view-details'.$product->id)}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                    
                    <!-- /product -->

                  

                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection