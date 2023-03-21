@extends('frontend.layouts.master')
@section('title','Accessries')
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
            <div class="col-sm-3 col-sidebar">
                <div id="layered-filter-block" class="block-sidebar block-filter no-hide">
                    <div class="block-title" style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                        <strong>Filters</strong></div>
                    <div class="block-content">
                        <div class="filter-options-item filter-options-categori">
                            <div class="filter-options-title"><strong>Product Availability</strong></div>
                            <div class="filter-options-content"
                                style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                                <ol style="list-style: none;">
                                    <li>
                                        <label style="color: #A0A0A5">
                                            <input type="checkbox" disabled>
                                            <span>Out of Stock</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>In Stock<span class="count"> (128)</span></span> </label>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="filter-options-item filter-options-categori">
                            <div class="filter-options-title"><strong>Product Options</strong></div>
                            <div class="filter-options-content"
                                style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                                <ol style="list-style: none;">
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>Ready to Ship<span class="count"> (105)</span> </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>Customizable<span class="count"> (43)</span> </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label style="color: #A0A0A5">
                                            <input type="checkbox" disabled>
                                            <span>Built to Order</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>Bundles<span class="count"> (1)</span> </span>
                                        </label>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="filter-options-item filter-options-categori">
                            <div class="filter-options-title"><strong>Screen Size</strong></div>
                            <div class="filter-options-content"
                                style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                                <ol style="list-style: none;">
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>15.6"<span class="count"> (43)</span> </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>13.3"<span class="count"> (112)</span> </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label style="color: #A0A0A5">
                                            <input type="checkbox" disabled>
                                            <span>12"</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label style="color: #A0A0A5">
                                            <input type="checkbox" disabled>
                                            <span>10"-11"</span>
                                        </label>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="filter-options-item filter-options-categori">
                            <div class="filter-options-title"><strong>Use</strong></div>
                            <div class="filter-options-content"
                                style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                                <ol style="list-style: none;">
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>Home<span class="count"> (43)</span> </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>Home and home office (112)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label style="color: #A0A0A5">
                                            <input type="checkbox" disabled>
                                            <span>Business</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label style="color: #A0A0A5">
                                            <input type="checkbox" disabled>
                                            <span>Enterprise</span>
                                        </label>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="block-content">
                        <div class="filter-options-item filter-options-categori">
                            <div class="filter-options-title"><strong>Processor</strong></div>
                            <div class="filter-options-content"
                                style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                                <ol style="list-style: none;">
                                    <li>
                                        <label style="color: #A0A0A5">
                                            <input type="checkbox" disabled>
                                            <span>Intel Xeon</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label style="color: #A0A0A5">
                                            <input type="checkbox" disabled>
                                            <span>Intel Core i9</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>Intel Core i5 </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>Intel Core i3 </span>
                                        </label>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="filter-options-item filter-options-categori">
                            <div class="filter-options-title"><strong>Sale</strong></div>
                            <div class="filter-options-content"
                                style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                                <ol style="list-style: none;">
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>Sale</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>In Cart Pricing</span>
                                        </label>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="filter-options-item filter-options-categori">
                            <div class="filter-options-title"><strong>Sale</strong></div>
                            <div class="filter-options-content"
                                style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                                <ol style="list-style: none;">
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>Sale</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>In Cart Pricing</span>
                                        </label>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="filter-options-item filter-options-categori">
                            <div class="filter-options-content"
                                style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                                <div class="range">
                                    <div class="sliderValue">
                                        <span>100</span>
                                    </div>
                                    <div class="field">
                                        <div class="value left">0</div>
                                        <input type="range" min="10" max="200" value="100" steps="1">
                                        <div class="value right">200</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block-content">
                        <div class="filter-options-item filter-options-categori">
                            <div class="filter-options-content"
                                style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                                <div class="accordion accordion-flush">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                Memory
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">Placeholder content for this accordion, which is
                                                intended to demonstrate the <code>.accordion-flush</code> class. This is
                                                the first item's accordion body.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                                Storage
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">Placeholder content for this accordion, which is
                                                intended to demonstrate the <code>.accordion-flush</code> class. This is
                                                the second item's accordion body. Let's imagine this being filled with
                                                some actual content.</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-sidebar">
                <div class="row">
                    <div class="col-sm-6" style="margin-bottom:40px">
                        <div class="sigma-category-contant-section">
                            <div class="card" style="padding-bottom: 20px;box-shadow: 0px 1.2px 1px 0px #70707040;">
                                <div class="sigma-category-image-section">
                                    <div class="item" style="padding: 30px;"><img
                                            src="{{ asset('frontend/assets/images/Component-178 – 25.png') }}"
                                            alt="The Last of us" class="img-fluid"></div>
                                </div>
                                <div class="container">
                                    <a href=""
                                        style="text-align: center;margin-top:20px;font-size: 22px;text-decoration:none;">Qbits
                                        Sigma 15 - 10th Generation i7<br> Intel® Core™ Processor, 15.6 Inches FHD<br>
                                        Non Touch IPS Display</a>
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
                                    <a href="#" style="text-decoration: none;float:left;">See all offers</a>
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
                                            src="{{ asset('frontend/assets/images/Component-178 – 25.png') }}"
                                            alt="The Last of us" class="img-fluid"></div>
                                </div>
                                <div class="container">
                                    <a href=""
                                        style="text-align: center;margin-top:20px;font-size: 22px;text-decoration:none;">Qbits
                                        Sigma 15 - 10th Generation i7<br> Intel® Core™ Processor, 15.6 Inches FHD<br>
                                        Non Touch IPS Display</a>
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
                                    <a href="#" style="text-decoration: none;float:left;">See all offers</a>
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
                <div class="row">
                    <div class="col-sm-6" style="margin-bottom:40px">
                        <div class="sigma-category-contant-section">
                            <div class="card" style="padding-bottom: 20px;box-shadow: 0px 1.2px 1px 0px #70707040;">
                                <div class="sigma-category-image-section">
                                    <div class="item" style="padding: 30px;"><img
                                            src="{{ asset('frontend/assets/images/Component-178 – 25.png') }}"
                                            alt="The Last of us" class="img-fluid"></div>
                                </div>
                                <div class="container">
                                    <a href=""
                                        style="text-align: center;margin-top:20px;font-size: 22px;text-decoration:none;">Qbits
                                        Sigma 15 - 10th Generation i7<br> Intel® Core™ Processor, 15.6 Inches FHD<br>
                                        Non Touch IPS Display</a>
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
                                    <a href="#" style="text-decoration: none;float:left;">See all offers</a>
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
                {{-- <div class="row">
                  <div class="col-sm-6" style="margin-bottom:40px">
                    <div class="sigma-category-contant-section">
                      <div class="card" style="padding-bottom: 20px;box-shadow: 0px 1.2px 1px 0px #70707040;">
                        <div class="sigma-category-image-section">
                          <div class="item" style="padding: 30px;"><img src="{{ asset('frontend/assets/images/sigma-model.png') }}"
                alt="The Last of us" class="img-fluid">
            </div>
        </div>
        <div class="container">
            <p style="text-align: center;margin-top:20px;">Qbits Sigma 15 - 10th Generation i7<br> Intel® Core™
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
        <div class="container">
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
            <a href="#" style="text-decoration: none;">Starting at ৳72,000</a>
        </div>
        <div class="container" style="text-align:center;margin-bottom:20px;">
            <button type="button" class="btn btn-default btn-lg"
                style="background-color: #2699FB;border-radius: 20px;color:#FFFFFF;">Buy Now</button>
        </div>
    </div>
</div>
</div>
<div class="col-sm-6" style="margin-bottom:40px">
    <div class="sigma-category-contant-section">
        <div class="card" style="padding-bottom: 20px;box-shadow: 0px 1.2px 1px 0px #70707040;">
            <div class="sigma-category-image-section">
                <div class="item" style="padding: 30px;"><img
                        src="{{ asset('frontend/assets/images/sigma-model.png') }}" alt="The Last of us"
                        class="img-fluid"></div>
            </div>
            <div class="container">
                <p style="text-align: center;margin-top:20px;">Qbits Sigma 15 - 10th Generation i7<br> Intel® Core™
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
            <div class="container">
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
                <a href="#" style="text-decoration: none;">Starting at ৳72,000</a>
            </div>
            <div class="container" style="text-align:center;margin-bottom:20px;">
                <button type="button" class="btn btn-default btn-lg"
                    style="background-color: #2699FB;border-radius: 20px;color:#FFFFFF;">Buy Now</button>
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
