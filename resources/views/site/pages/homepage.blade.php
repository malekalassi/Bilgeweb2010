@extends('site.app')
@section('title', 'Homepage')

@section('content')
    <section class="section-main bg padding-top-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <!-- ================= main slide ================= -->
                   @include('site.includes.slider')
                    <!-- ============== main slidesow .end // ============= -->
                </div>
                <!-- col.// -->
                <div class="col-md-3">

{{--                    @include('site.includes.item-side')--}}

                </div>
                <!-- col.// -->
            </div>
        </div>
        <!-- container .//  -->
    </section>
    <!-- ========================= SECTION MAIN END// ========================= -->
    <!-- ========================= Blog ========================= -->
    @include('site.includes.featured-categories')
    <section class="section-request bg padding-y-sm">
        <div class="container">
            <header class="section-heading heading-line">
                <h4 class="title-section bg text-uppercase">Recently Added</h4>
            </header>
            <div class="row">

                @foreach($products as $product )

                    <div class="col-md-3">
                        <figure class="card card-product">
                            <a href="{{route('product.show' ,$product->slug)}}">
                                <div class="img-wrap"><img src="{{asset('storage/products/2.jpg')}}"></div>
                            </a>
                            <figcaption class="info-wrap">
                                <h4 class="title">{{$product->name}}</h4>
                                <p class="desc">{{$product->description}}</p>
                                <div class="rating-wrap">
                                    <ul class="rating-stars">
                                        <li style="width:80%" class="stars-active">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <div class="label-rating">132 reviews</div>
                                    <div class="label-rating">154 orders </div>
                                </div>
                                <!-- rating-wrap.// -->
                            </figcaption>
                            <div class="bottom-wrap">
                                <form action="{{route('product.add.cart')}}" method="post">
                                    @csrf
                                    <input  type="hidden"  value="1" name="qty" style="width:70px;">
                                    <input type="hidden" name="productId" value="{{ $product->id }}">
                                    <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">
                                    <button type="submit" class="btn btn-sm btn-primary float-right">Add To Cart</button>
                                </form>

                                <div class="price-wrap h5">
                                    <span class="price-new">{{$product->price}}</span> <del class="price-old">$1980</del>
                                </div>
                                <!-- price-wrap.// -->
                            </div>
                            <!-- bottom-wrap.// -->
                        </figure>
                    </div>

                @endforeach



                <!-- col // -->


            </div>
        </div>
        <!-- container // -->
    </section>
    @include('site.includes.subscribe')
@stop
