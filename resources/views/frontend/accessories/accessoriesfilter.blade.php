<style>
    .starting {
        text-decoration: none;
        font-size: 22px;
        line-height: 17px;
        font-weight: 500;
    }

    .accordion-flush .accordion-item .accordion-button {
        border-radius: 0;
        margin-left: -1vw;
        font-weight: 600;
        box-shadow: 0 0 0 0.25rem rgb(143 143 143 / 0%);
    }

    .accordion-button {
        z-index: 0 !important;
        box-shadow: transparent !important;
    }

    .accordion-button:not(.collapsed) {
        box-shadow: transparent !important;
    }

    .filter-options-title {
        padding-bottom: 15px;
    }

    .filter-options-item.filter-options-categori {
        padding: 20px 0px 0px 0px;
    }


    .block-title {
        padding-bottom: 15px;
    }

    ol,
    ul {
        padding-left: 1.5rem;
    }

    .accordion-button:not(.collapsed) {
        color: #000000;
        background-color: #ffffff;
        box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
    }

    .accordion-button:focus {
        box-shadow: 0 0 0 0.25rem rgba(143, 143, 143, 0);
    }

    .sigma-category-contant-section .sigma-category-image-section {
        /* background-color: #f1f1f1; */
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

    .sigma-title {
        /* text-align: center; */
        padding-right: 19px;
        font-size: 22px;
        text-decoration: none;
        line-height: 27px;
        color: #000000;
    }

    .sigma-title:hover {

        color: #000000;
    }

    img.img-fluid {
        width: 100%;
        /* max-height: 201px; */
        object-fit: cover;
    }

    .ui-widget.ui-widget-content {
        border: 1px solid #D6D6D6;
    }

    .ui-slider-horizontal {
        top: 10px;
        height: 0.5em;
        z-index: 0;
        background-color: #D6D6D6;
    }

    .ui-widget-header {
        border: 1px solid #dddddd;
        background: #1486F9;
        color: #333333;
        font-weight: bold;
    }

    .ui-state-default,
    .ui-widget-content .ui-state-default,
    .ui-widget-header .ui-state-default,
    .ui-button,
    html .ui-button.ui-state-disabled:hover,
    html .ui-button.ui-state-disabled:active {
        /* border: 1px solid #929292;
        background: #929292; */
        /* font-weight: normal; */
        color: #929292;
        border-radius: 50px;
        width: 16px;
        height: 16px;
        background: #fff;
        border: 2px solid #1486F9;
        box-shadow: 0 0 0 2px #fff inset, 0 0 0 6px #1486f9 inset, 0 0 0 1px #fff;

    }


    .ui-state-focus,
    .ui-state-active {

        border: 2px solid #1486f9 !important;
    }

    .range {
        height: 39px;
        /* background: #fff;
        border-radius: 10px; */
        padding: 0 45px 0 35px;
        /* box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1); */
    }

    .amount {
        display: inline-flex;
        padding: 0px 20px 15px;

    }

    input#amount_start,
    input#amount_end {
        border: 0;
        outline: 0;
    }

    .sliderValue {
        position: relative;
        width: 100%;
    }

    .sliderValue span {
        position: absolute;
        height: 45px;
        width: 45px;
        transform: translateX(-70%) scale(0);
        font-weight: 500;
        top: -40px;
        line-height: 55px;
        z-index: 2;
        color: #fff;
        transform-origin: bottom;
        transition: transform 0.3s ease-in-out;
    }

    .sliderValue span.show {
        transform: translateX(-70%) scale(1);
    }

    .sliderValue span:after {
        position: absolute;
        content: "";
        height: 100%;
        width: 100%;
        background: #2699fb;
        border: 3px solid #fff;
        z-index: -1;
        left: 50%;
        transform: translateX(-50%) rotate(45deg);
        border-bottom-left-radius: 50%;
        box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
    }

    .field {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        position: relative;
    }

    .field .value {
        position: absolute;
        font-size: 18px;
        color: #2699fb;
        font-weight: 600;
    }

    .field .value.left {
        left: -22px;
    }

    .field .value.right {
        right: -43px;
    }

    .range {
        height: 39px;
        /* background: #fff;
        border-radius: 10px; */
        padding: 0 34px 0 31px;
        /* box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1); */
    }

    .amount {
        display: inline-flex;
        padding: 0px 23px 15px;

    }

    .range input {
        -webkit-appearance: none;
        width: 100%;
        height: 3px;
        background: #ddd;
        border-radius: 5px;
        outline: none;
        border: none;
    }

    .range input::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 20px;
        height: 20px;
        background: red;
        border-radius: 50%;
        background: #2699fb;
        border: 1px solid #2699fb;
        cursor: pointer;
    }

    .range input::-moz-range-thumb {
        -webkit-appearance: none;
        width: 20px;
        height: 20px;
        background: red;
        border-radius: 50%;
        background: #2699fb;
        border: 1px solid #2699fb;
        cursor: pointer;
    }

    .range input::-moz-range-progress {
        background: #2699fb;
    }

    .filter-options-price {
        border-bottom: 1px dashed #dfdfdf;
        margin-bottom: 22px;
    }

</style>
<div class="row">

    @foreach($products as $key=>$product)




    <div class="col-sm-6" style="margin-bottom:40px">
        <div class="sigma-category-contant-section">
            <div class="card card-customize">
                <div class="sigma-category-image-section">
                    <a href="{{ route('product_details1',$product->slug)}}">
                        <div class="item" style=""><img src="{{ asset($product->galary_photo) }}" alt="The Last of us"
                                class="img-fluid"></div>
                    </a>
                </div>
                <div class="container">
                    <a class="sigma-title" href="{{ route('product_details1',$product->slug)}}">
                        <?php if(strlen($product->name) > 120) {?>
                        {{ substr($product->name,0,120)}}
                        <?php } else {?>
                        {{$product->name}}
                        <?php } ?></p>
                    </a>
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
                        @if($key < '4' ) <li>{{$text->attribute_value}}</li>
                            @endif
                            @endforeach
                            </ui>
                </div>
                <div class="container" style="text-align:start;margin-bottom:20px;">
                    <a href="{{ route('product_details1',$product->slug)}}" style="text-decoration: none;">More
                        details</a>
                </div>
                <div class="container" style="text-align:center;margin-bottom:20px;">
                    <a href="#" class="starting">Starting at
                        ৳{{number_format($product->unit_price) }}</a>
                </div>
                <div class="container" style="text-align:center;">

                    <a href="{{ route('product_details1',$product->slug)}}" style="text-decoration: none">
                        <button type="button" class="sigma-buy-button">Buy Now</button>
                    </a>

                </div>
            </div>
        </div>
    </div>

    @endforeach
</div>
