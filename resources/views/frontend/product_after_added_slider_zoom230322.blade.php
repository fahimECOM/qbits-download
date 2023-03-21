@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')




<Section class="qbits-top-middle">
    <div class="container">
        <div class="middle-qbits-menu">
            <div class="row">
                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-start">
                        <a href="{{ route('driver')}}">Drivers & Manuals</a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-center">
                        <a href="{{ route('product_registration')}}">Registration</a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-center" style="margin-left: 60px;">
                        <a href="{{route('warranty')}}">Warranty</a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-end">
                        <?php
                      if(session()->has('USER_LOGIN')) {
                  ?>
                        <a href="{{route('wishlists')}}">Wishlist</a>
                        <?php } else {?>
                        <a href="javascript:void(0)" onclick="wishlistCartModal()">Wishlist</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section>
@include('frontend.discount')

<section class="productpage-area-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="productpage-section">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 mb-4">
                            {{-- <div class="item" style="padding: 30px;margin-left:20px;margin-top:50px"><img src="{{ asset('frontend/assets/images/tbrender_008.png') }}"
                            alt="The Last of us md saiful islam" class="img-fluid"></div> --}}

                        <div id="slider-zoom" class="positive-gallery-slider">
                            <div class="side-img">

                                @php
                                $photos = explode('|', $products->photos);
                                // dd($photos);
                                @endphp
                                @foreach ($photos as $key=>$photo)
                                <img src="{{ asset($photo) }}" class="small-preview" />
                                @endforeach
                            </div>
                            <div class="zoom-image"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4" style="margin-bottom:40px">
                        <div class="sigma-category-contant-section">
                            <div class="product_button">
                                <div class="container">
                                    <p style="text-align: left;margin-top:20px;font-size: 16px;font-weight:500;">
                                        {{ $products->name}}</p>
                                    <p>Series : Sigma</p>
                                    <p>Product Code : {{  $products->sku}}</p>

                                    @if($products->current_stock < 1) <p>Availability : <span class="btn btn-danger">Out
                                            of Stock</span></p>
                                        @else
                                        <p>Availability : In Stock</p>
                                        @endif



                                        <p style="text-align: left;margin-top:20px;">Quick Overview :</p>
                                        <p>{{  $products->variations}}</p>
                                        {{-- <p>Intel® Core™ i7-1005G1 Processor with 1.20 - 3.40 GHz</p>
                                <p>8GB DDR4 3200 MHz Memory</p>
                                <p>M.2 512GB NVMe SSD</p>
                                <p>15.6 Inches Full HD  IPS Display  with LED Backlit </p>
                                <h3>৳72,000</h3>
                                <p>Shipping free all Over the Country </p> --}}

                                </div>
                                {{-- <div class="container" style="text-align:center;margin-bottom:20px;"> --}}
                                <div class="container">
                                    <form class="form-inline" action="{{ route('carts.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                                        <button style="display:flex;justify-content: center" type="submit" name="button"
                                            value="publish" class="btn btn-success">{{ ('Add to Cart ') }}</button>
                                    </form>
                                    {{-- <a type="button" class="btn btn-default btn-lg" style="" href="{{ route('carts',$products->id)}}">Add
                                    to Cart</a> --}}
                                    <img src="{{ asset('frontend/assets/images/product_page/Icon ionic-ios-heart.png') }}"
                                        alt="The Last of us md saiful islam" class="img-fluid">
                                </div>
                                <div class="container">
                                    <p style="font-weight: 500;">Share</p>
                                    <div class="social_icon">
                                        <ul style="margin-left: -25px">
                                            <li><img src="{{ asset('frontend/assets/images/product_page/facebook.png') }}"
                                                    alt="facebook md saiful islam"></li>
                                            <li style="padding-left: 10px;"><img
                                                    src="{{ asset('frontend/assets/images/product_page/twitter-bird.png') }}"
                                                    alt="facebook md saiful islam"></li>
                                            <li style="padding-left: 10px;"><img
                                                    src="{{ asset('frontend/assets/images/product_page/linkedin.png') }}"
                                                    alt="facebook md saiful islam"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td colspan="5" style="padding: 20px;">
                                    <p>Description</p>
                                    <p>{{$products->description}}</p>
                                    <p>Specification</p>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (json_decode($products->attributes) as $key => $choice)
                            <tr>
                                <td style="padding: 20px;">{{$choice->attribute_name}} </td>
                                <td colspan="4" style="padding: 20px;">{{$choice->attribute_value}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-sm-6" style="margin-bottom:40px">
                        <div class="sigma-category-contant-section">
                            <div class="card" style="padding-bottom: 20px;box-shadow: 0px 1.2px 1px 0px #70707040;">
                                <div class="sigma-category-image-section">
                                    <div class="item" style="padding: 30px;"><img
                                            src="{{ asset('frontend/assets/images/sigma-model.png') }}"
                                            alt="The Last of us" class="img-fluid"></div>
                                </div>
                                <div class="container">
                                    <p style="text-align: center;margin-top:20px;font-size: 22px;">Qbits Sigma 15 - 10th
                                        Generation i7<br> Intel® Core™ Processor, 15.6 Inches FHD<br> Non Touch IPS
                                        Display</p>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span style="float: right">L15-29F2S</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="container list">
                                    <ul>
                                        <li>Intel Core i7</li>
                                        <li>8GB DDR4 3200 MHz Memory</li>
                                        <li>M.2 512GB NVMe SSD</li>
                                        <li>15.6 Inches Full HD IPS Display</li>
                                    </ul>
                                </div>
                                <div class="container" style="text-align:center;margin-bottom:20px;">
                                    <a href="#" style="text-decoration: none;">See all offers</a>
                                </div>
                                <div class="container" style="text-align:center;margin-bottom:20px;">
                                    <a href="#" style="text-decoration: none;font-size:24px;">Starting at ৳72,000</a>
                                </div>
                                <div class="container" style="text-align:center;margin-bottom:20px;">
                                    <button type="button" class="btn btn-default btn-lg"
                                        style="background-color: #2699FB;border-radius: 20px;color:#FFFFFF;padding:10px 60px;">Buy
                                        Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" style="margin-bottom:40px">
                        <div class="sigma-category-contant-section">
                            <div class="card" style="padding-bottom: 20px;box-shadow: 0px 1.2px 1px 0px #70707040;">
                                <div class="sigma-category-image-section">
                                    <div class="item" style="padding: 30px;"><img
                                            src="{{ asset('frontend/assets/images/sigma-model.png') }}"
                                            alt="The Last of us " class="img-fluid"></div>
                                </div>
                                <div class="container">
                                    <p style="text-align: center;margin-top:20px;font-size: 22px;">Qbits Sigma 15 - 10th
                                        Generation i7<br> Intel® Core™ Processor, 15.6 Inches FHD<br> Non Touch IPS
                                        Display</p>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span style="float: right">L15-29F2S</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="container list">
                                    <ul>
                                        <li>Intel Core i7</li>
                                        <li>8GB DDR4 3200 MHz Memory</li>
                                        <li>M.2 512GB NVMe SSD</li>
                                        <li>15.6 Inches Full HD IPS Display</li>
                                    </ul>
                                </div>
                                <div class="container" style="text-align:center;margin-bottom:20px;">
                                    <a href="#" style="text-decoration: none;">See all offers</a>
                                </div>
                                <div class="container" style="text-align:center;margin-bottom:20px;">
                                    <a href="#" style="text-decoration: none;font-size:24px;">Starting at ৳72,000</a>
                                </div>
                                <div class="container" style="text-align:center;margin-bottom:20px;">
                                    <button type="button" class="btn btn-default btn-lg"
                                        style="background-color: #2699FB;border-radius: 20px;color:#FFFFFF;padding:10px 60px;">Buy
                                        Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script src="{{asset('frontend/assets/exzoom/positive-zoom.js')}}"></script>
<script>
    positiveZoom.init('#slider-zoom')

</script>
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
            '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>

@endsection
