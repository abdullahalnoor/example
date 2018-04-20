@extends('front.master')
@section('content')
<div class="men">
    <div class="container">
        <div class="single_top">
            <div class="col-md-9 single_right">
                <div class="grid images_3_of_2">
                    <ul id="etalage">
                        @foreach($subImages as $subImage)
                        <li>
                            <a href="optionallink.html">
                                <img class="etalage_thumb_image" src="{{ asset($subImage->sub_image) }}" class="img-responsive" />
                                <img class="etalage_source_image" src="{{ asset($subImage->sub_image) }}" class="img-responsive" title="" />
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>		
                </div> 
                <div class="desc1 span_3_of_2">
                    <h1>{{ $product->product_name }}</h1>
                    <p class="m_2">Product Price: TK. {{ $product->product_price }}</p>
                    <p class="m_2">Product Category:  {{ $product->category_name }}</p>
                    <p class="m_2">Product Brand:  {{ $product->brand_name }}</p>
                    <p class="m_2">Product Stock:
                        @if($product->product_quantity > 0)
                            {{ 'Avaliable' }}
                        @else
                            {{ 'Not Avaliable' }}
                        @endif
                    </p>
                    <div class="btn_form">
                        <form action="{{ url('/add-to-cart') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="number" name="qty" value="1" min="1"/>
                            <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                            <input type="submit" value="Add To Cart" title=""/>
                        </form>
                    </div>
                    <span class="m_link"><a href="#">login to save in wishlist</a> </span>
                    <p class="m_text2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit </p>
                </div>
                <div class="clearfix"></div>	
            </div>
            <div class="col-md-3">
                <!-- FlexSlider -->
                <section class="slider_flex">
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach($latestProducts as $latestProduct)
                            <li><img src="{{ asset($latestProduct->product_image) }}" class="img-responsive" alt=""/></li>
                            @endforeach
                        </ul>
                    </div>
                </section>
                <!-- FlexSlider -->
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="toogle">
            <h2>Product Short Description</h2>
            <p class="m_text2">
                {{ $product->short_description }}
            </p>
        </div>
        <div class="toogle">
            <h2>Product Lonbg Description</h2>
            <p class="m_text2">{{ $product->long_description }}</p>
        </div>
        <h4 class="head_single">Related Products</h4>
        <div class="span_3">
            @foreach($categoryProducts as $categoryProduct)
            <div class="col-sm-3 grid_1">
                <a href="single.html">
                    <img src="{{ asset($categoryProduct->product_image) }}" class="img-responsive" alt=""/>
                    <h3>{{ $categoryProduct->product_name }}</h3>
                    <p>Duis autem vel eum iriure</p>
                    <h4>TK. {{ $categoryProduct->product_price }}</h4>
                </a>  
            </div> 
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<link href="{{ asset('/front') }}/css/flexslider.css" rel='stylesheet' type='text/css' />
<script defer src="{{ asset('/front') }}/js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(function () {
    SyntaxHighlighter.all();
});
$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        start: function (slider) {
            $('body').removeClass('loading');
        }
    });
});
</script>
@endsection
