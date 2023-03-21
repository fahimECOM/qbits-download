@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')

<style>
    .sigma-title {
        text-align: center;
        font-size: 18px;
        text-decoration: none;
    }

    .sigma-category-contant-section {
        padding-left: 0px;
    }

    .sigma-category-contant-section .checked {
        color: #2699fb;
    }

    .sigma-category-contant-section .buy-button {
        background-color: #1486f9;
        border-radius: 2.6vw;
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        padding: 1.04vw 4.16vw;
        color: #fff;
    }

    .sigma-category-contant-section .sigma-buy-button {
        background-color: #1486f9;
        border-radius: 50px;
        font-size: 20px;
        /* font-family: "Roboto", sans-serif; */
        padding: 13.44px 44.16px;
        color: #fff;
        border: 1px solid;
    }

    .sigma-category-contant-section .sigma-buy-button:hover {
        background-color: #0071E3F7;
    }

    .sigma-category-contant-section .list {
        font-size: 16px;
        margin-top: 40px;
    }

    .card-customize {
        min-height: 750px;
        /* padding: 0px 20px; */
        padding-bottom: 44px;
        box-shadow: 0px 2px 4px 2px #00000014;
        border-radius: 20px;
        border: 0.5px solid #f7f7f7;
    }

    img.img-fluid {
        width: 100%;
        /* max-height: 201px; */
        object-fit: cover;
    }

    .search-product {
        max-width: 980px;
        background-color: #ffffff;
        margin: 0 auto;
        border-radius: 10px;
        margin-top: 40px;
        margin-bottom: 60px;
    }

</style>
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
                        <a href="{{ route('warranty')}}">Warranty</a>
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
<div class="driver-area-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-sidebar py-1">
                <h3 class="text-center">Searched Products for - <span class=""
                        style="color: black;">{{ $search }}</span>
                </h3>
                @if( count($search_products) > 0 )
                <div class="row search-product">


                    @foreach($search_products as $product)
                    {{-- <div class="col-sm-1"></div> --}}
                    <div class="col-sm-6" style="margin-bottom:40px">
                        <div class="sigma-category-contant-section">
                            <div class="card card-customize">
                                <div class="sigma-category-image-section">
                                    <div class="item" style="padding: 30px;"><img
                                            src="{{ asset($product->galary_photo) }}" alt="The Last of us"
                                            class="img-fluid"></div>
                                </div>
                                <div class="container">
                                    <p class="sigma-title">
                                        {{ $product->name}}</p>
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
                                            <span style="float: right">{{  $product->sku}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="container list">
                                    <ul>
                                        @foreach (json_decode($product->attributes) as $key => $text)

                                        <?php
                                            if($key == '4'){
                                                break;
                                            }
                                        ?>
                                        <li>{{$text->attribute_value}}</li>


                                        @endforeach
                                        </ui>
                                </div>
                                <div class="container" style="text-align:start;margin-bottom:20px;">
                                    <a href="{{ route('product_details',$product->slug)}}"
                                        style="text-decoration: none;">More details</a>
                                </div>
                                <div class="container" style="text-align:center;margin-bottom:20px;">
                                    <a href="#" style="text-decoration: none;font-size:24px;">Starting at
                                        ৳{{ number_format($product->unit_price)}}</a>
                                </div>
                                <div class="container" style="text-align:center;">
                                    @php
                                    $category =
                                    App\Models\Product::select('category')->where('slug',$product->slug)->first()->category;
                                    @endphp
                                    @if($category == 'Laptop' )
                                    <a href="{{ route('product_details',$product->slug)}}"
                                        style="text-decoration: none">
                                        <button type="button" class="sigma-buy-button">Buy Now</button>
                                    </a>

                                    @elseif($category == 'Mini PC' )
                                    <a href="{{ route('product_details_minipc',$product->slug)}}"
                                        style="text-decoration: none">
                                        <button type="button" class="sigma-buy-button">Buy Now</button>
                                    </a>

                                    @elseif($category == 'Accessory' )
                                    <a href="{{ route('product_details1',$product->slug)}}"
                                        style="text-decoration: none">
                                        <button type="button" class="sigma-buy-button">Buy Now</button>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach


                </div>
                @else
                <div class="row">
                    <h2 class="alert alert-warning">
                        There is no item available according to your search
                    </h2>
                </div>
                @endif
                {{-- <div class="row">
                  <div class="col-sm-6" style="margin-bottom:40px">
                    <div class="sigma-category-contant-section">
                      <div class="card" style="padding-bottom: 20px;box-shadow: 0px 1.2px 1px 0px #70707040;">
                        <div class="sigma-category-image-section">
                          <div class="item" style="padding: 30px;"><img src="{{ asset('frontend/assets/images/sigma-model.png') }}"
                alt="The Last of us " class="img-fluid">
            </div>
        </div>
        <div class="container">
            <p style="text-align: center;margin-top:20px;font-size: 22px;">Qbits Sigma 15 - 10th Generation i7<br>
                Intel® Core™
                Processor, 15.6 Inches FHD<br> Non Touch IPS Display</p>
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
                style="background-color: #2699FB;border-radius: 20px;color:#FFFFFF;padding:10px 60px;">Buy Now</button>
        </div>
    </div>
</div>
</div>
</div> --}}

</div>
</div>
</div>


</div>


<script>
    $(document).ready(function () {

        $("#owl-demo").owlCarousel({

            navigation: true, // Show next and prev buttons
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            items: 1,
            nav: true,
            //   "singleItem:true" is a shortcut for:
            //   items : 1, 
            //   itemsDesktop : false,
            //   itemsDesktopSmall : false,
            //   itemsTablet: false,
            //   itemsMobile : false

        });

        $("#owl-demo1").owlCarousel({

            navigation: true, // Show next and prev buttons
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            items: 1,
            nav: true,
            //   "singleItem:true" is a shortcut for:
            //   items : 1, 
            //   itemsDesktop : false,
            //   itemsDesktopSmall : false,
            //   itemsTablet: false,
            //   itemsMobile : false

        });

    });

    const slideValue = document.querySelector("span");
    const inputSlider = document.querySelector("input");
    inputSlider.oninput = (() => {
        let value = inputSlider.value;
        slideValue.textContent = value;
        slideValue.style.left = (value / 2) + "%";
        slideValue.classList.add("show");
    });
    inputSlider.onblur = (() => {
        slideValue.classList.remove("show");
    });

</script>

@endsection
