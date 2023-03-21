@extends('frontend.layouts.master')
@section('title','Lania')
@section('content')
<style>
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

    body .qbits-mobile-menu {
        position: fixed;
    }

    img {
        object-fit: cover;
    }

    .starting {
        text-decoration: none;
        font-size: 22px;
        line-height: 17px;
        font-weight: 500;
    }

    .thumbnails {
        /* overflow: hidden;
        width: auto;
        height: auto;
        margin: 2em 0;
        padding: 0;
        text-align: center;
        display: flex;
        align-items: center;
        margin-left: -5px !important;
        margin-right: -20px;
        gap: 12px; */
        overflow: hidden;
        width: auto;
        height: auto;
        margin-top: 20px;
        padding: 0;
        text-align: center;
        display: grid;
        align-items: start;
        grid-template-columns: repeat(4, 1fr);
        margin-left: -5px !important;
        margin-right: -29px;
    }

    input#prd-qty {
        font-size: 16px;
        font-weight: 500;
        line-height: 21px;
        width: 30%;
        border: 0;
        outline: 0;
        text-align: center;
    }

    .thumbnails img {
        display: block;
        width: 100%;
        height: 80px;
        object-fit: cover;
    }

    body {
        overflow-x: hidden !important;
    }

    nav.breadcrumb-nav {
        position: relative;
        /* margin: 0px 427px; */
        /* left: 20vw; */
        width: 100%;
    }

    .breadcrumb {
        margin-right: 860px;
    }

    .gray {
        background-color: #F3F3F3;
    }

    .productpage-area-section {
        overflow: hidden;
        width: 100%;
        background: #ffffff;
    }

    .productpage-area-section .productpage-section {
        max-width: 979px;
        margin: 0 auto;
        font-family: "Roboto", sans-serif;
        margin-bottom: 2px;
        margin-top: 40px;
    }

    .productpage-area-section .productpage-section .sigma-category-contant-section .product_button button {
        background-color: #2699fb;
        border-radius: 50px;
        color: #ffffff;
        padding: 10px 50px;
        float: left;
    }

    .productpage-area-section .social_icon ul {
        list-style: none;
        display: inline-flex;
    }

    .product-details-titel {
        font-weight: 500;
        font-size: 28px;
        line-height: 35px;
        height: 120px;
        margin-bottom: 0rem;
        width: 398px;
    }

    .product-details-series {
        margin-bottom: -2px;
    }

    .product-details-series p {
        margin-bottom: 0px;
        font-size: 11px;
        /* font-weight: 400; */
        line-height: 21px;
    }

    .quick-review {
        /* font-size: 14px;
        line-height: 24px !important; */
        margin: 15px 0px 18px 0px;
    }

    .quick-review h1 {
        font-size: 16px;
        line-height: 21px !important;
        font-weight: 500;
        color: #000;
        margin-bottom: 10px;
    }

    .quick-review p {
        margin-bottom: 5px;
        font-size: 14px;
        line-height: 16px;
    }

    .select-ram-text,
    .select-ssd-text {
        font-weight: 400 !important;
        font-size: 14px;
    }



    .product-updated-price {
        font-size: 30px;
        font-weight: 500;
        line-height: 29px;
        padding: 12px 0 15px;
    }

    .product-details-add-cart {
        display: inline-flex;
        align-items: center;
        margin: 6px 30px 20px 40px;
        gap: 5px;
    }

    /* Najmul Ovi - your cart section css */
    .prod-qty {
        border: 2px solid #707070;
        height: 55px;
        width: 114px;
        margin-left: -40px;
        display: inline-flex;
        align-items: center;
        border-radius: 36px;
        font-size: 18px;
    }

    .add-cart-btn {
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        border-radius: 30px;
        margin-left: 5px;
        font-size: 16px;
        width: 174px;
        height: 55px;
        line-height: 21px;
        padding: 12px 25px;
        color: white;
        background-color: #2699FB;
        align-content: center;
        justify-content: center;
    }

    .add-cart-btn:hover {
        color: white;
        background-color: #1486F9;
    }

    .product-details-list {
        border: 1px solid #E1E1E1;
        /* padding: 35px 35px 0px; */
        border-radius: 14px;
        margin-bottom: 148px;
    }

    .product-details-list-title {
        /* margin-bottom: 3vw; */
        margin-bottom: 50px;
        padding: 27px 19px 0px 28px;
    }

    .product-details-list-title h1 {
        font-size: 22px;
        font-weight: 500;
        padding-bottom: 9px;
        line-height: 30px;
    }

    .product-details-list-title strong {
        font-weight: 500;
    }

    .product-details-list-title h2,
    .product-details-list-title h3,
    .product-details-list-title h2 {
        font-size: 16px;
        font-weight: 500;
        padding-bottom: 9px;
        line-height: 30px;
    }

    .product-details-list-title p {
        font-size: 16px;
        font-weight: 400;
    }

    .product-details-list-info h1 {
        /* font-size: 22px;
        font-weight: 500;
        padding-bottom: 9px;
        line-height: 30px; */
        font-size: 22px;
        font-weight: 500;
        line-height: 30px;
        margin-bottom: 22px;
        padding-left: 30px;
    }

    .product-details-list-information p {
        display: flex;
        /* background: red; */
        border-top: 1px solid #E1E1E1;
        flex-direction: row;
        padding: 15px 15px;
        /* margin-left: -1.8vw;
        margin-right: -1.8vw; */
        margin-bottom: -0.1vw;
    }

    /* .product-details-list {
        border: 1px solid #E1E1E1;
        padding: 35px 35px 0px;
        border-radius: 14px;
        margin-bottom: 148px;
    }

    .product-details-list-title {
        margin-bottom: 3vw;
    }

    .product-details-list-title h1 {
        font-size: 22px;
        font-weight: 500;
        padding-bottom: 9px;
        line-height: 30px;
    }

    .product-details-list-title p {
        font-size: 16px;
    }

    .product-details-list-info h1 {
        font-size: 22px;
        font-weight: 500;
        padding-bottom: 9px;
        line-height: 30px;
    }

    .product-details-list-information p {
        display: flex;

    border-top: 1px solid #E1E1E1;
    flex-direction: row;
    padding: 15px 22px;
    margin-left: -1.8vw;
    margin-right: -1.8vw;
    margin-bottom: -0.1vw;
    }

    */
    .also-like-title {
        text-align: center;
        margin-bottom: 2.8vw;
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
        /* padding:20px; */
        padding-bottom: 44px;
        box-shadow: 0px 2px 4px 2px #00000014;
        border-radius: 20px;
        border: 0.5px solid #f7f7f7;
    }

    img.img-fluid {
        width: 100%;
        max-height: 235px;
        object-fit: cover;
    }


    .wish-icon g path {
        fill: transparent;
        stroke: rgb(99, 95, 95);
        stroke: 20;
    }

    .wish-icon g path:hover {
        fill: #1486F9;
        stroke: #1486F9;
        stroke: 20;
    }

    .wish-icon-fill g path {
        fill: #1486F9;
        stroke: #1486F9;
        stroke: 20;
    }

    /* ovi start */
    .ram-btn-group {
        display: flex;
        gap: 15px;
    }

    .ram-change-btn {
        width: 80px !important;
        height: 40px !important;
        padding: 10px 15px !important;
        border-radius: 25px !important;
        color: #272727 !important;
        background-color: #fff !important;
        outline: none;
        border: 1px solid #CCCCCC;
        cursor: pointer;
        font-size: 12px;
        font-weight: 400;
    }

    .ram-btn-group .ram-change-btn:focus {
        outline: none;
        box-shadow: none;
    }

    .active-btn {
        background: #272727 !important;
        color: #FFFFFF !important;
    }


    /*--------------------------------*/
    #slide-wrapper {
        max-width: 495px;
        display: flex;
        min-height: 90px;
        align-items: center;
        margin-left: 15px;
        margin-top: 15px;
    }

    #slider {
        max-width: 485px;
        overflow-x: auto;
        /* margin-top: 10px; */
        /* margin-top: 20px;
        padding: 0;
        text-align: center; */
        display: flex;
        flex-wrap: nowrap;
    }

    #slider::-webkit-scrollbar {
        width: 0px;
    }

    .slider-thumbnails {
        object-fit: cover;
        max-width: 60px;
        max-height: 60px;
        cursor: pointer;
        margin: 4px;
        opacity: 0.5;
        padding: 2px;
        border: 1px solid transparent;


    }

    .slider-thumbnails:hover {
        border: 1px solid grey;
        /* padding: 2px; */
        opacity: 1;
        /* padding: 0px !important; */
        /* width: 60px; */

    }

    .thumbnail {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }

    .myactive {
        border: 1px solid grey;
        opacity: 1 !important;
        padding: 2px;
    }

    .arrow {
        width: 20px;
        height: 20px;
        cursor: pointer;
        /* margin-top: -10px; */
        color: grey;
        /* transition: .3s; */
    }

    .arrow_2 {
        width: 20px;
        height: 20px;
        cursor: pointer;
        margin-top: -10px;
        color: grey;
        /* transition: .3s; */
    }


    .arrow:hover {
        /* opacity: .5; */
        color: #000;
    }

    .left_arrow {
        margin-left: 10px;
        margin-right: -10px;
        padding-right: 25px;
    }

    .right_arrow {
        padding-left: 10px;
    }

    /*--------------------------------*/

    /*-------------------------------*/
    .free-bagpack-modal-area {
        max-width: 875px !important;
        margin: 0 auto;
        margin-top: 100px;
    }

    .free-bagpack-modal-content {
        height: auto;
        background-color: #000;
        border-radius: 20px;
        padding: 70px 0 60px;
    }

    .bagpack-area-content {
        display: flex;
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .free-backpack-modal-title {
        color: #A0A0A5;
        font-size: 35px;
        line-height: 27px;
        font-weight: 500;
        font-family: 'Roboto', sans-serif;
        text-align: center;

    }

    .free-backpack-modal-text {
        color: #A0A0A5;
        font-size: 16px;
        line-height: 22px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        max-width: 565px;
        margin: 0 auto;

    }

    .select-bag-area {
        padding: 13px 26px;
        position: relative;
        cursor: pointer;
    }

    .selected-bag-bg {
        background: #7070708c;
    }

    .unselected-bag-bg {
        background: #70707047;
    }

    .select-bag-area_secondClmn {
        padding: 13px 26px;
        position: relative;
    }

    .bag-checked {
        position: absolute;
        margin-top: -97px;
        margin-left: 35px;
    }

    .bag-unchecked {
        position: absolute;
        margin-top: -97px;
        margin-left: 35px;
    }

    .border-line {
        margin: 30px auto;
        width: 645px;
        border-top: 1px solid #707070;
        opacity: 0.2;
    }

    .border-line-last {
        width: 645px;
        border-top: 1px solid #707070;
        opacity: 0.2;
        margin: 0 auto;
    }

    .bag-select-area-title-top {
        color: #A0A0A5;
        font-size: 16px;
        line-height: 22px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        text-align: left;
        margin-left: 10px;
        margin-top: -3px;
    }

    .bag-select-area-title-bottom {
        color: #A0A0A5;
        font-size: 16px;
        line-height: 22px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        text-align: center;
        display: none;
    }

    .bag-select-title {
        color: #A0A0A5;
        font-size: 16px;
        line-height: 21px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        text-align: left;
        /* margin-top: -15px;
        margin-left: 38px; */
        margin-top: -5px;
        margin-left: 10px;
    }

    .select-bag-row {
        margin-bottom: 25px;
        /* gap: -10px; */
        max-height: 344px;
        overflow-y: auto;
    }

    .select-bag-row::-webkit-scrollbar {
        width: 0.4em;
    }

    .select-bag-row::-webkit-scrollbar-track {
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    .select-bag-row::-webkit-scrollbar-thumb {
        background-color: #70707047;
        /* outline: 1px solid slategrey; */
    }

    .stock-out-img {
        width: 75px;
        height: 90px;
        object-fit: cover;
        cursor: not-allowed;
        opacity: 0.2;
    }

    .zoom-bag-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all .3s ease;
    }

    .zoom-bag-img:hover {
        transform: scale(1.1);
    }

    .disabled-bag-area {
        cursor: not-allowed !important;
    }

    /*-------------------------------*/


    /*-----------------------------*/
    .select-lania-bag-area {
        padding: 10px 14px;
        object-fit: cover;
        width: 100px;
        height: 110px;
        position: relative;
        cursor: pointer;
    }

    #slide-bag-wrapper {
        width: 525px;
        display: flex;
        min-height: 90px;
        align-items: center;
        /* align-content: center;
        justify-content: center; */
        margin-left: 10px;
        margin-top: 12px;
    }

    #slider-bag {
        width: 510px;
        overflow-x: auto;
        display: flex;
        gap: 15px;

    }

    .lania-bag-img {
        width: 75px;
        height: 90px;
        transition: all .3s ease;
    }

    .lania-bag-img:hover {
        transform: scale(1.1);
    }

    #slider-bag::-webkit-scrollbar {
        width: 0px;
    }

    .selected-lania-bagarea {
        margin-left: -20px;
    }

    .galary_bag_div {
        width: 205px;
        height: 205px;
        background: #7070708c;
        padding: 10px 10px;
    }

    .galary_bag_div img {
        width: 80%;
    }

    .arrow-div {
        background: #242423;
        color: #707070;
        width: 18px;
        height: 18px;
        margin-top: -17px;
        cursor: pointer;
    }

    .arrow-div:hover {
        background: #333333;
        color: #FFFFFF;
    }

    .arrow-div-left {
        margin-right: 10px;
    }

    .arrow-div-right {
        margin-left: 10px;
    }

    .modal_arrow {
        cursor: pointer;
        font-size: 11px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 3px;
    }

    /*-----------------------------*/

    /*----------------------------*/
    #keyboard-field {
        display: flex;
        gap: 15px;
        /* margin-left: 36px; */
        margin-left: 10px;
        margin-top: 10px;
        max-width: 450px;
    }

    .keyboard-area-content {
        display: flex;
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .select-keyboard-area {
        padding: 13px 26px;
        position: relative;
        cursor: pointer;
    }

    .selected-keyboard-bg {
        background: #7070708c;
    }

    .unselected-keyboard-bg {
        background: #70707047;
    }

    .keyboard-checked {
        position: absolute;
        margin-top: -60px;
        margin-left: 33px;
    }

    .keyboard-unchecked {
        position: absolute;
        margin-top: -60px;
        margin-left: 33px;
    }

    .keyboard-select-area-title-top {
        color: #A0A0A5;
        font-size: 16px;
        line-height: 22px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        text-align: left;
        margin-left: 10px;
        margin-top: -3px;
    }

    .keyboard-select-area-title-bottom {
        color: #A0A0A5;
        font-size: 16px;
        line-height: 22px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        text-align: center;
        display: none;
    }

    .keyboard-select-title {
        color: #A0A0A5;
        font-size: 16px;
        line-height: 21px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        text-align: left;
        /* margin-top: 40px;
        margin-left: 38px; */
        margin-top: 30px;
        margin-left: 10px;
    }

    .select-keyboard-row {
        display: flex;
        /* gap: -10px; */
        /* max-height: 344px; */
        overflow-y: auto;
    }

    .select-lania-keyboard-area {
        padding: 30px 14px;
        object-fit: cover;
        width: 102px;
        height: 100px;
        position: relative;
        cursor: pointer;
    }

    .keyboard-name-area {
        margin-right: -21px;
        margin-left: 21px;
    }

    .keyboard-mouse-name-1 {
        margin-left: -33px;
        font-size: 16px;
        width: 100px;
        line-height: 16px;
        color: #A1A1A6;
    }

    .keyboard-mouse-name-2 {
        margin-left: -48px;
        font-size: 16px;
        width: 100px;
        line-height: 0px;
        color: #A1A1A6;
    }

    .wireless-keyboard-name-area {
        margin-right: -60px;
        margin-left: 21px;
        padding-top: 24px;
    }

    .wireless-keyboard-mouse-name-1 {
        margin-left: -40px;
        line-height: 2px;
        font-size: 16px;
        font-weight: 400;
        color: #A1A1A6;
    }

    .wireless-keyboard-mouse-name-2 {
        margin-left: -72px;
        line-height: 10px;
        font-size: 16px;
        font-weight: 400;
        color: #A1A1A6;
    }

    .wireless-keyboard-mouse-name-3 {
        margin-left: -42px;
        line-height: 10px;
        font-size: 16px;
        font-weight: 400;
        color: #A1A1A6;
    }

    .lania-keyboard-img {
        width: 78px;
        height: 35px;
        transition: all .3s ease;
    }

    .lania-keyboard-img:hover {
        transform: scale(1.1);
    }

    .lania-keyboard-stock-out-img {
        width: 78px;
        height: 35px;
        object-fit: cover;
        cursor: not-allowed;
        opacity: 0.2;
    }

    .selected-lania-keyboardarea {
        margin-left: -20px;
    }

    .galary_keyboard_div {
        width: 205px;
        height: 205px;
        background: #7070708c;
        padding: 22px 0px;
    }

    .galary_keyboard_div img {
        width: 80%;
    }

    #desktop-addtocart-btn {
        display: block;
    }

    #mobile-addtocart-btn {
        display: none;
    }

    .desktop-modal-area {
        display: block;
    }

    .mobile-modal-area {
        display: none;
    }

    .lania-back-modal-btn {
        margin-top: 28px;
        width: 175px !important;
        height: 55px !important;
        margin-bottom: 20px;
        padding: 7px 27px;
        border-radius: 25px !important;
        color: #3C3C3C !important;
        background-color: #CCCCCC !important;
        outline: none;
        border: none;
    }

    .lania-preorder-modal-area {
        max-width: 480px !important;
        margin: 0 auto;
    }

    .lania-preorder-modal-content {
        height: auto;
        background-color: #272727;
        border-radius: 20px;
    }

    .subscribe_success_circle {
        width: 38px;
        height: 38px;
        background: #1486F9;
        border-radius: 50%;
        margin: 0 auto;
        margin-top: 60px;
        margin-bottom: 20px;
    }

    #pre_order_request_success {
        display: none;
    }

    /*----------------------------*/

    @media (max-width: 340px) {
        .lania-preorder-modal-area {
            max-width: 300px !important;
        }
        .product-details-titel {
            font-weight: 500;
            font-size: 22px;
            line-height: 28px;
            height: auto;
            width: auto;
        }

        .product-details-add-cart {
            display: inline-flex;
            align-items: center;
            margin-left: 31px;
            gap: 5px;
        }

        .prod-qty {
            height: 52px;
            width: 90px;
        }

        .add-cart-btn {
            width: 132px;
            height: 52px;

        }

        .col-xl-7.col-lg-7.mb-4.ps-5.thumbails-padding {
            padding-left: 16px !important;
        }

        .img-thumbnails {
            max-width: 100%;
            height: 100%;
        }

        .thumbnails {
            margin-left: -5px !important;
            margin-right: -5px;
            gap: 3px;
        }

        .thumbnails img {
            height: 53px;
            object-fit: cover;
        }

        #slide-wrapper {
            margin-left: -4px;
            max-width: 380px;
        }

        #slider {
            max-width: 322px;
        }

        .arrow {
            margin-top: -10px;
        }

        .arrow_2 {
            margin-top: -10px;
        }

        .left_arrow {
            margin-right: -13px;
            padding-right: 29px;
        }

        .right_arrow {
            padding-left: 5px;
        }

        #desktop-addtocart-btn {
            display: none;
        }

        #mobile-addtocart-btn {
            display: block;
        }

        /*=================================================*/

        /*=================================================*/
        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
        .desktop-modal-area {
            display: none;
        }

        .mobile-modal-area {
            display: block;
        }

        .free-bagpack-modal-area1 {
            max-width: 360px;
            margin: 0 auto;
            margin-top: 80px;
            margin-bottom: 20px;
        }

        .free-bagpack-modal-content1 {
            height: auto;
            background-color: #000;
            border-radius: 20px;
            padding: 30px 0;
        }

        .bagpack-area-content1 {
            display: flex;
            flex-direction: column;
        }

        .bag-select-area-title-bottom1 {
            display: block;
            margin-top: -15px;
            color: #A0A0A5;
            font-size: 16px;
            line-height: 22px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .select-bag-area_firstClmn1 {
            margin-right: 15px;
        }

        .bag-select-title1 {
            margin-top: 20px;
            margin-bottom: 30px;
            color: #A0A0A5;
            font-size: 16px;
            line-height: 21px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .free-backpack-modal-title1 {
            color: #A0A0A5;
            font-size: 35px;
            line-height: 46px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .galary_bag_div1 {
            width: 205px;
            height: 205px;
            background: #7070708c;
            padding: 10px 10px;
            margin: 0 auto;
        }

        .galary_bag_div1 img {
            width: 80%;
        }

        .select-bag-area1 {
            position: relative;
            cursor: pointer;
            padding: 10px 14px;
            object-fit: cover;
            width: 80px;
            height: 90px;
        }

        .selected-bag-bg1 {
            background: #7070708c;
        }

        .unselected-bag-bg1 {
            background: #70707047;
        }

        .select-bag-area_secondClmn1 {
            padding: 13px 26px;
            position: relative;
        }

        .bag-checked1 {
            position: absolute;
        }

        .bag-unchecked1 {
            position: absolute;
        }

        .selected-bagarea1 {
            padding-top: 25px;
            margin-left: -3px;
        }

        .select-bag-row1 {
            margin-bottom: 25px;
            max-height: 344px;
            overflow: hidden;
        }

        #slide-bag-wrapper1 {
            width: 525px;
            display: flex;
            min-height: 90px;
            align-items: center;
            margin-top: 12px;
        }

        #slider-bag1 {
            width: 510px;
            overflow-x: hidden;
            display: flex;
            gap: 10px;
        }

        .select-lania-bag-area1 {
            padding: 5px 0px;
            object-fit: cover;
            width: 80px;
            height: 90px;
            position: relative;
            cursor: pointer;
        }

        .lania-bag-img1 {
            width: 50px;
            height: 75px;
            transition: all .3s ease;
        }

        .lania-bag-img1:hover {
            transform: scale(1.1);
        }

        .stock-out-img1 {
            width: 50px;
            height: 75px;
            object-fit: cover;
            cursor: not-allowed;
            opacity: 0.2;
        }

        .zoom-bag-img1:hover {
            transform: scale(1.1);
        }

        .disabled-bag-area1 {
            cursor: not-allowed;
        }

        #mobile-lania-bag-modal {
            display: block;
        }

        #mobile-lania-keyboard-modal {
            display: none;
        }

        .galary_keyboard_div1 {
            width: 240px;
            height: 230px;
            background: #7070708c;
            padding: 15px 0px;
            margin: 0 auto;
        }

        .galary_keyboard_div1 img {
            width: 80%;
        }

        .select-keyboard-row1 {
            display: flex;
            overflow-y: hidden;
            overflow-x: hidden;
        }

        #keyboard-field1 {
            display: flex;
            gap: 23px;
            margin-left: 40px;
            margin-top: 10px;
            margin-bottom: 10px;
            max-width: 450px;
        }

        .keyboard-select-area-title-top1 {
            color: #A0A0A5;
            font-size: 16px;
            line-height: 22px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            text-align: center;
            /* margin-left: 10px; */
            margin-top: 5px;
        }

        .lania-keyboard-img-mobile {
            width: 78px;
            height: 35px;
            transition: all .3s ease;
        }

        .lania-keyboard-img-mobile:hover {
            transform: scale(1.1);
        }

        .lania-keyboard-stock-out-img-mobile {
            width: 78px;
            height: 35px;
            object-fit: cover;
            cursor: not-allowed;
            opacity: 0.2;
        }

        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
    }

    @media (min-width: 341px) and (max-width: 360px) {
        .lania-preorder-modal-area {
            max-width: 300px !important;
        }
        .product-details-titel {
            font-weight: 500;
            font-size: 28px;
            line-height: 35px;
            height: auto;
            width: auto;
        }

        .product-details-add-cart {
            display: inline-flex;
            align-items: center;
            margin-left: 31px;
            gap: 5px;
        }

        .prod-qty {
            height: 52px;
            width: 90px;
        }

        .add-cart-btn {
            width: 132px;
            height: 52px;

        }

        .col-xl-7.col-lg-7.mb-4.ps-5.thumbails-padding {
            padding-left: 16px !important;
        }

        .img-thumbnails {
            max-width: 100%;
            height: 100%;
        }

        .thumbnails {
            margin-left: -5px !important;
            margin-right: -5px;
            gap: 3px;
        }

        .thumbnails img {
            height: 53px;
            object-fit: cover;
        }

        #slide-wrapper {
            margin-left: 15px;
            max-width: 355px;
        }

        #slider {
            max-width: 257px;
        }

        .arrow {
            margin-top: -10px;
        }

        .arrow_2 {
            margin-top: -10px;
        }

        .left_arrow {
            margin-right: -13px;
            padding-right: 29px;
        }

        .right_arrow {
            padding-left: 5px;
        }

        #desktop-addtocart-btn {
            display: none;
        }

        #mobile-addtocart-btn {
            display: block;
        }

        /*=================================================*/

        /*=================================================*/
        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
        .desktop-modal-area {
            display: none;
        }

        .mobile-modal-area {
            display: block;
        }

        .free-bagpack-modal-area1 {
            max-width: 360px;
            margin: 0 auto;
            margin-top: 80px;
            margin-bottom: 20px;
        }

        .free-bagpack-modal-content1 {
            height: auto;
            background-color: #000;
            border-radius: 20px;
            padding: 30px 0;
        }

        .bagpack-area-content1 {
            display: flex;
            flex-direction: column;
        }

        .bag-select-area-title-bottom1 {
            display: block;
            margin-top: -15px;
            color: #A0A0A5;
            font-size: 16px;
            line-height: 22px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .select-bag-area_firstClmn1 {
            margin-right: 15px;
        }

        .bag-select-title1 {
            margin-top: 20px;
            margin-bottom: 30px;
            color: #A0A0A5;
            font-size: 16px;
            line-height: 21px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .free-backpack-modal-title1 {
            color: #A0A0A5;
            font-size: 35px;
            line-height: 46px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .galary_bag_div1 {
            width: 205px;
            height: 205px;
            background: #7070708c;
            padding: 10px 10px;
            margin: 0 auto;
        }

        .galary_bag_div1 img {
            width: 80%;
        }

        .select-bag-area1 {
            position: relative;
            cursor: pointer;
            padding: 10px 14px;
            object-fit: cover;
            width: 80px;
            height: 90px;
        }

        .selected-bag-bg1 {
            background: #7070708c;
        }

        .unselected-bag-bg1 {
            background: #70707047;
        }

        .select-bag-area_secondClmn1 {
            padding: 13px 26px;
            position: relative;
        }

        .bag-checked1 {
            position: absolute;
        }

        .bag-unchecked1 {
            position: absolute;
        }

        .selected-bagarea1 {
            padding-top: 25px;
            margin-left: -3px;
        }

        .select-bag-row1 {
            margin-bottom: 25px;
            max-height: 344px;
            overflow: hidden;
        }

        #slide-bag-wrapper1 {
            width: 365px;
            display: flex;
            min-height: 90px;
            align-items: center;
            margin-top: 12px;
        }

        #slider-bag1 {
            width: 360px;
            overflow-x: hidden;
            display: flex;
            gap: 15px;
        }

        .select-lania-bag-area1 {
            padding: 5px 0px;
            object-fit: cover;
            width: 80px;
            height: 90px;
            position: relative;
            cursor: pointer;
        }

        .lania-bag-img1 {
            width: 50px;
            height: 75px;
            transition: all .3s ease;
        }

        .lania-bag-img1:hover {
            transform: scale(1.1);
        }

        .stock-out-img1 {
            width: 50px;
            height: 75px;
            object-fit: cover;
            cursor: not-allowed;
            opacity: 0.2;
        }

        .zoom-bag-img1:hover {
            transform: scale(1.1);
        }

        .disabled-bag-area1 {
            cursor: not-allowed;
        }

        #mobile-lania-bag-modal {
            display: block;
        }

        #mobile-lania-keyboard-modal {
            display: none;
        }

        .galary_keyboard_div1 {
            width: 240px;
            height: 230px;
            background: #7070708c;
            padding: 15px 0px;
            margin: 0 auto;
        }

        .galary_keyboard_div1 img {
            width: 80%;
        }

        .select-keyboard-row1 {
            display: flex;
            overflow-y: hidden;
            overflow-x: hidden;
        }

        #keyboard-field1 {
            display: flex;
            gap: 23px;
            margin-left: 40px;
            margin-top: 10px;
            margin-bottom: 10px;
            max-width: 450px;
        }

        .keyboard-select-area-title-top1 {
            color: #A0A0A5;
            font-size: 16px;
            line-height: 22px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            text-align: center;
            /* margin-left: 10px; */
            margin-top: 5px;
        }

        .lania-keyboard-img-mobile {
            width: 78px;
            height: 35px;
            transition: all .3s ease;
        }

        .lania-keyboard-img-mobile:hover {
            transform: scale(1.1);
        }

        .lania-keyboard-stock-out-img-mobile {
            width: 78px;
            height: 35px;
            object-fit: cover;
            cursor: not-allowed;
            opacity: 0.2;
        }

        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
    }

    @media (min-width: 361px) and (max-width: 380px) {
        .lania-preorder-modal-area {
            max-width: 300px !important;
        }
        .product-details-titel {
            font-weight: 500;
            font-size: 28px;
            line-height: 35px;
            height: auto;
            width: auto;
        }

        .product-details-add-cart {
            display: inline-flex;
            align-items: center;
            margin-left: 31px;
            gap: 5px;
        }

        .prod-qty {
            height: 52px;
            width: 90px;
        }

        .add-cart-btn {
            width: 132px;
            height: 52px;

        }

        .col-xl-7.col-lg-7.mb-4.ps-5.thumbails-padding {
            padding-left: 16px !important;
        }

        .img-thumbnails {
            max-width: 100%;
            height: 100%;
        }

        .thumbnails {
            margin-left: -5px !important;
            margin-right: -5px;
            gap: 3px;
        }

        .thumbnails img {
            height: 53px;
            object-fit: cover;
        }

        #slide-wrapper {
            margin-left: 20px;
            max-width: 375px;
        }

        #slider {
            max-width: 257px;
        }

        .arrow {
            margin-top: -10px;
        }

        .arrow_2 {
            margin-top: -10px;
        }

        .left_arrow {
            margin-right: -13px;
            padding-right: 29px;
        }

        .right_arrow {
            padding-left: 5px;
        }

        #desktop-addtocart-btn {
            display: none;
        }

        #mobile-addtocart-btn {
            display: block;
        }

        /*=================================================*/

        /*=================================================*/
        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
        .desktop-modal-area {
            display: none;
        }

        .mobile-modal-area {
            display: block;
        }

        .free-bagpack-modal-area1 {
            max-width: 360px;
            margin: 0 auto;
            margin-top: 80px;
            margin-bottom: 20px;
        }

        .free-bagpack-modal-content1 {
            height: auto;
            background-color: #000;
            border-radius: 20px;
            padding: 30px 0;
        }

        .bagpack-area-content1 {
            display: flex;
            flex-direction: column;
        }

        .bag-select-area-title-bottom1 {
            display: block;
            margin-top: -15px;
            color: #A0A0A5;
            font-size: 16px;
            line-height: 22px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .select-bag-area_firstClmn1 {
            margin-right: 15px;
        }

        .bag-select-title1 {
            margin-top: 20px;
            margin-bottom: 30px;
            color: #A0A0A5;
            font-size: 16px;
            line-height: 21px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .free-backpack-modal-title1 {
            color: #A0A0A5;
            font-size: 35px;
            line-height: 46px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .galary_bag_div1 {
            width: 205px;
            height: 205px;
            background: #7070708c;
            padding: 10px 10px;
            margin: 0 auto;
        }

        .galary_bag_div1 img {
            width: 80%;
        }

        .select-bag-area1 {
            position: relative;
            cursor: pointer;
            padding: 10px 14px;
            object-fit: cover;
            width: 80px;
            height: 90px;
        }

        .selected-bag-bg1 {
            background: #7070708c;
        }

        .unselected-bag-bg1 {
            background: #70707047;
        }

        .select-bag-area_secondClmn1 {
            padding: 13px 26px;
            position: relative;
        }

        .bag-checked1 {
            position: absolute;
        }

        .bag-unchecked1 {
            position: absolute;
        }

        .selected-bagarea1 {
            padding-top: 25px;
            margin-left: -3px;
        }

        .select-bag-row1 {
            margin-bottom: 25px;
            max-height: 344px;
            overflow: hidden;
        }

        #slide-bag-wrapper1 {
            width: 525px;
            display: flex;
            min-height: 90px;
            align-items: center;
            margin-top: 12px;
        }

        #slider-bag1 {
            width: 510px;
            overflow-x: hidden;
            display: flex;
            gap: 10px;
        }

        .select-lania-bag-area1 {
            padding: 5px 0px;
            object-fit: cover;
            width: 80px;
            height: 90px;
            position: relative;
            cursor: pointer;
        }

        .lania-bag-img1 {
            width: 50px;
            height: 75px;
            transition: all .3s ease;
        }

        .lania-bag-img1:hover {
            transform: scale(1.1);
        }

        .stock-out-img1 {
            width: 50px;
            height: 75px;
            object-fit: cover;
            cursor: not-allowed;
            opacity: 0.2;
        }

        .zoom-bag-img1:hover {
            transform: scale(1.1);
        }

        .disabled-bag-area1 {
            cursor: not-allowed;
        }

        #mobile-lania-bag-modal {
            display: block;
        }

        #mobile-lania-keyboard-modal {
            display: none;
        }

        .galary_keyboard_div1 {
            width: 240px;
            height: 230px;
            background: #7070708c;
            padding: 15px 0px;
            margin: 0 auto;
        }

        .galary_keyboard_div1 img {
            width: 80%;
        }

        .select-keyboard-row1 {
            display: flex;
            overflow-y: hidden;
            overflow-x: hidden;
        }

        #keyboard-field1 {
            display: flex;
            gap: 23px;
            margin-left: 40px;
            margin-top: 10px;
            margin-bottom: 10px;
            max-width: 450px;
        }

        .keyboard-select-area-title-top1 {
            color: #A0A0A5;
            font-size: 16px;
            line-height: 22px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            text-align: center;
            /* margin-left: 10px; */
            margin-top: 5px;
        }

        .lania-keyboard-img-mobile {
            width: 78px;
            height: 35px;
            transition: all .3s ease;
        }

        .lania-keyboard-img-mobile:hover {
            transform: scale(1.1);
        }

        .lania-keyboard-stock-out-img-mobile {
            width: 78px;
            height: 35px;
            object-fit: cover;
            cursor: not-allowed;
            opacity: 0.2;
        }

        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
    }


    @media (min-width: 381px) and (max-width: 480px) {
        .lania-preorder-modal-area {
            max-width: 300px !important;
        }
        .product-details-add-cart {
            display: inline-flex;
            align-items: center;
            margin-left: 31px;
            gap: 5px;
        }

        .prod-qty {
            height: 52px;
            width: 90px;
        }

        .add-cart-btn {
            width: 132px;
            height: 52px;

        }

        .col-xl-7.col-lg-7.mb-4.ps-5.thumbails-padding {
            padding-left: 16px !important;
        }

        .img-thumbnails {
            max-width: 100%;
            height: 100%;
        }

        .thumbnails {
            margin-left: -5px !important;
            margin-right: -5px;
            gap: 3px;
        }

        .thumbnails img {
            height: 53px;
            object-fit: cover;
        }

        #slide-wrapper {
            margin-left: -4px;
            max-width: 380px;
        }

        #slider {
            max-width: 322px;
        }

        .arrow {
            margin-top: -10px;
        }

        .arrow_2 {
            margin-top: -10px;
        }

        .left_arrow {
            margin-right: -13px;
            padding-right: 29px;
        }

        .right_arrow {
            padding-left: 5px;
        }

        #desktop-addtocart-btn {
            display: none;
        }

        #mobile-addtocart-btn {
            display: block;
        }

        /*=================================================*/

        /*=================================================*/
        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
        .desktop-modal-area {
            display: none;
        }

        .mobile-modal-area {
            display: block;
        }

        .free-bagpack-modal-area1 {
            max-width: 360px;
            margin: 0 auto;
            margin-top: 80px;
            margin-bottom: 20px;
        }

        .free-bagpack-modal-content1 {
            height: auto;
            background-color: #000;
            border-radius: 20px;
            padding: 30px 0;
        }

        .bagpack-area-content1 {
            display: flex;
            flex-direction: column;
        }

        .bag-select-area-title-bottom1 {
            display: block;
            margin-top: -15px;
            color: #A0A0A5;
            font-size: 16px;
            line-height: 22px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .select-bag-area_firstClmn1 {
            margin-right: 15px;
        }

        .bag-select-title1 {
            margin-top: 20px;
            margin-bottom: 30px;
            color: #A0A0A5;
            font-size: 16px;
            line-height: 21px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .free-backpack-modal-title1 {
            color: #A0A0A5;
            font-size: 35px;
            line-height: 46px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        .galary_bag_div1 {
            width: 205px;
            height: 205px;
            background: #7070708c;
            padding: 10px 10px;
            margin: 0 auto;
        }

        .galary_bag_div1 img {
            width: 80%;
        }

        .select-bag-area1 {
            position: relative;
            cursor: pointer;
            padding: 10px 14px;
            object-fit: cover;
            width: 80px;
            height: 90px;
        }

        .selected-bag-bg1 {
            background: #7070708c;
        }

        .unselected-bag-bg1 {
            background: #70707047;
        }

        .select-bag-area_secondClmn1 {
            padding: 13px 26px;
            position: relative;
        }

        .bag-checked1 {
            position: absolute;
        }

        .bag-unchecked1 {
            position: absolute;
        }

        .selected-bagarea1 {
            padding-top: 25px;
            margin-left: -3px;
        }

        .select-bag-row1 {
            margin-bottom: 25px;
            max-height: 344px;
            overflow: hidden;
        }

        #slide-bag-wrapper1 {
            width: 525px;
            display: flex;
            min-height: 90px;
            align-items: center;
            margin-top: 12px;
        }

        #slider-bag1 {
            width: 510px;
            overflow-x: hidden;
            display: flex;
            gap: 10px;
        }

        .select-lania-bag-area1 {
            padding: 5px 0px;
            object-fit: cover;
            width: 80px;
            height: 90px;
            position: relative;
            cursor: pointer;
        }

        .lania-bag-img1 {
            width: 50px;
            height: 75px;
            transition: all .3s ease;
        }

        .lania-bag-img1:hover {
            transform: scale(1.1);
        }

        .stock-out-img1 {
            width: 50px;
            height: 75px;
            object-fit: cover;
            cursor: not-allowed;
            opacity: 0.2;
        }

        .zoom-bag-img1:hover {
            transform: scale(1.1);
        }

        .disabled-bag-area1 {
            cursor: not-allowed;
        }

        #mobile-lania-bag-modal {
            display: block;
        }

        #mobile-lania-keyboard-modal {
            display: none;
        }

        .galary_keyboard_div1 {
            width: 240px;
            height: 230px;
            background: #7070708c;
            padding: 15px 0px;
            margin: 0 auto;
        }

        .galary_keyboard_div1 img {
            width: 80%;
        }

        .select-keyboard-row1 {
            display: flex;
            overflow-y: hidden;
            overflow-x: hidden;
        }

        #keyboard-field1 {
            display: flex;
            gap: 23px;
            margin-left: 40px;
            margin-top: 10px;
            margin-bottom: 10px;
            max-width: 450px;
        }

        .keyboard-select-area-title-top1 {
            color: #A0A0A5;
            font-size: 16px;
            line-height: 22px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            text-align: center;
            /* margin-left: 10px; */
            margin-top: 5px;
        }

        .lania-keyboard-img-mobile {
            width: 78px;
            height: 35px;
            transition: all .3s ease;
        }

        .lania-keyboard-img-mobile:hover {
            transform: scale(1.1);
        }

        .lania-keyboard-stock-out-img-mobile {
            width: 78px;
            height: 35px;
            object-fit: cover;
            cursor: not-allowed;
            opacity: 0.2;
        }

        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/

    }

    @media (min-width: 481px) and (max-width: 820px) {

        .img-thumbnails {

            width: 100%;
            height: 100%;
        }

        #slide-wrapper {
            margin-left: 93px;

        }

        .thumbnails {
            margin-right: -11px;
            gap: 36px;
        }

        /* img.img-fluid {
            height: 171px !important;
            object-fit: cover;
            max-width: 283px;
        } */

        .slider-thumbnails {
            object-fit: cover;
            width: 60px !important;
            height: 60px !important;
            cursor: pointer;
            margin: 4px;
            opacity: 0.5;
            padding: 2px;
            border: 1px solid transparent;


        }

        .slider-thumbnails:hover {
            border: 1px solid grey;
            /* padding: 2px; */
            opacity: 1;
            /* padding: 0px !important; */
            /* width: 60px; */

        }

        .thumbnail {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .myactive {
            border: 1px solid grey;
            opacity: 1 !important;
            padding: 2px;
        }

        .modal-body {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        #slide-bag-wrapper {
            width: 445px;
        }

        #slider-bag {
            width: 440px;
            gap: 12px;
        }

        .galary_bag_div {
            width: 165px;
            height: 173px;
        }

        .selected-lania-bagarea {
            margin-left: -12px;
            margin-top: 10px;
        }

        .free-backpack-modal-title {
            line-height: 50px;
        }

        .lania-bagpack-area-content {
            padding-left: 8px;
            padding-right: 8px;
        }

        .keyboard-area-content {
            padding-left: 8px;
        }

        .galary_keyboard_div {
            width: 165px;
            height: 173px;
        }

        #keyboard-field {
            gap: 12px;
        }

    }

</style>


<?php $marginLeftWishlist = "style=margin-left:-33px";?>
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

<?php

$all_backpack = App\Models\Product::where('sub_category','backpack')->where('status','1')->get();
$all_outstock_backpack = App\Models\Product::where('sub_category','backpack')->where('status','1')->where('current_stock','<',1)->get();
$all_bag_colors = [];
$outstock_bag_colors = [];
if(!$all_backpack->isEmpty()){
    for($i = 0; $i < count($all_backpack); $i++) {
        $color_name = json_decode($all_backpack[$i]->attributes)[0]->attribute_value;
        array_push($all_bag_colors,$color_name);
    }  
}

if(!$all_outstock_backpack->isEmpty()){
    for($i = 0; $i < count($all_outstock_backpack); $i++) {
        $color_name = json_decode($all_outstock_backpack[$i]->attributes)[0]->attribute_value;
        array_push($outstock_bag_colors,$color_name);
    }  
}

$bag_id_arr = [];
for($i = 0; $i < count($all_backpack); $i++) {
    array_push($bag_id_arr,$all_backpack[$i]->id);
}


{{-- $all_free_keyboardmouse = App\Models\Product::where('sub_category','keyboard-mouse')->where('status','1')->get(); --}}
$all_keyboardmouse = App\Models\Product::where('sub_category','keyboard-mouse')->where('status','1')->get();

?>


<section class="productpage-area-section" id="productpage-area-section">
    <div class="qbits-top-last gray">
        <nav class="breadcrumb-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-secondary"
                        href="{{route('minipc')}} ">Lania</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="productpage-section">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 mb-4  thumbails-padding">

                            <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails" style="z-index: 0">
                                <a href="{{ asset($products->galary_photo) }}">
                                    <img class="img-thumbnails" src="{{ asset($products->galary_photo) }}" alt="" />
                                </a>

                            </div>

                            @php
                            $photos = explode('|', $products->photos);
                            // dd($photos);
                            @endphp

                            <div id="slide-wrapper">
                                {{-- <img id="slideLeft" onclick="slideLeftImg()" class="arrow" src="{{asset('frontend/assets/images/arrow-left.png')}}">
                                --}}
                                <?php if(count($photos) < 8){?>
                                <i id="sideLeft" onclick="slideLeftImg()"
                                    class="fas fa-chevron-left arrow left_arrow"></i>
                                <?php } else {?>
                                <i id="sideLeft" onclick="slideLeftImg()"
                                    class="fas fa-chevron-left arrow_2 left_arrow"></i>
                                <?php } ?>
                                <div id="slider">
                                    @foreach ($photos as $key=>$photo)
                                    <?php if($key == 0){?>
                                    <div class="slider-thumbnails myactive" id="myactiveImg_{{$key}}">
                                        <a id="thumbnails" name={{$key}} href="{{ asset($photo) }}"
                                            data-standard="{{ asset($photo) }}">
                                            <img class="thumbnail" src="{{ asset($photo) }}" />
                                        </a>
                                    </div>
                                    <?php } else {?>
                                    <div class="slider-thumbnails" id="myactiveImg_{{$key}}">
                                        <a id="thumbnails" name={{$key}} href="{{ asset($photo) }}"
                                            data-standard="{{ asset($photo) }}">
                                            <img class="thumbnail" src="{{ asset($photo) }}" />
                                        </a>
                                    </div>
                                    <?php } ?>
                                    @endforeach
                                </div>
                                <?php if(count($photos) < 8){?>
                                <i id="sideRight" onclick="slideRightImg()"
                                    class="fas fa-chevron-right arrow right_arrow"></i>
                                <?php } else {?>
                                <i id="sideRight" onclick="slideRightImg()"
                                    class="fas fa-chevron-right arrow_2 right_arrow"></i>
                                <?php } ?>
                                {{-- <img id="slideRight" onclick="slideRightImg()" class="arrow" src="{{asset('frontend/assets/images/arrow-right.png')}}">
                                --}}
                            </div>



                        </div>
                        <div class="col-xl-5 col-lg-5" style="margin-bottom:40px">
                            <div class="sigma-category-contant-section">
                                <div class="product_button">
                                    <div class="container">
                                        <p class="product-details-titel">
                                            <?php if(strlen($products->name) > 90) {?>
                                            {{ substr($products->name,0,90)}}
                                            <?php } else {?>
                                            {{$products->name}}
                                            <?php } ?>
                                        </p>
                                        <div class="product-details-series">
                                            <p>Series : {{$products->series_name}}</p>
                                            <p>Product Code : {{  $products->sku}}</p>

                                            @if($products->current_stock < 1) <p>Availability : <span
                                                    class="text-danger">Out
                                                    of Stock</span></p>
                                                @else
                                                <p>Availability : In Stock</p>
                                                @endif
                                        </div>
                                        <?php
                                           $all_ram = App\Models\Product::where('sub_category','ram')->where('status','1')->where('current_stock', '>', 0)->get();
                                           $ram_numb = '';
                                        ?>
                                        <div class="quick-review">
                                            @foreach($all_ram as $key => $single_ram)
                                            <?php
                                                    $ram_numb = explode(' ', $single_ram->name);
                                                ?>


                                            <h1>Select RAM : <span class="select-ram-text" id="select-ram-text"><span
                                                        id="select-ram-number">{{$ram_numb[0]}}</span> GB DDR4 3200
                                                    MHz</span></h1>
                                            <input type="hidden" id="select_ram_name" name="select_ram_name"
                                                value="{{$ram_numb[0]}} GB">
                                            <input type="hidden" id="select_ram_id" name="select_ram_id"
                                                value="{{$single_ram->id}}">
                                            <input type="hidden" id="select_ram_unit_price" name="select_ram_unit_price"
                                                value="{{$single_ram->unit_price}}">
                                            <?php break; ?>
                                            @endforeach
                                            <div class="ram-btn-group">
                                                @foreach($all_ram as $key => $single_ram)
                                                <?php 
                                                        $ram_numb = explode(' ', $single_ram->name);
                                                        $ramChange = 'ramChangeTo'.$ram_numb[0].'GB';
                                                    ?>
                                                @if($key == 0)
                                                <button class="btn ram-change-btn active-btn" type="button"
                                                    onclick="{{$ramChange}}('{{$single_ram->id}}','{{$single_ram->unit_price}}')"
                                                    id="ram-{{$ram_numb[0]}}gb-btn"
                                                    style="cursor: pointer;">{{$ram_numb[0]}} GB</button>
                                                @else
                                                <button class="btn ram-change-btn" type="button"
                                                    onclick="{{$ramChange}}('{{$single_ram->id}}','{{$single_ram->unit_price}}')"
                                                    id="ram-{{$ram_numb[0]}}gb-btn"
                                                    style="cursor: pointer;">{{$ram_numb[0]}} GB</button>
                                                @endif
                                                @endforeach
                                            </div>

                                        </div>

                                        <?php
                                           $all_ssd = App\Models\Product::where('sub_category','ssd')->where('status','1')->where('current_stock', '>', 0)->get();
                                           $ssd_numb = '';
                                        ?>
                                        <div class="quick-review">
                                            @foreach($all_ssd as $key => $single_ssd)
                                            <?php
                                                    if($key == 0 && count($all_ssd) >=3){
                                                        continue;
                                                    } else {
                                                        $ssd_numb = explode(' ', $single_ssd->name);
                                                ?>
                                            <h1>Select SSD : <span class="select-ssd-text" id="select-ssd-text"><span
                                                        id="select-ssd-number">{{$ssd_numb[0]}} {{$ssd_numb[1]}}</span>
                                                    M.2 NVMe</span></h1>
                                            <input type="hidden" id="select_ssd_name" name="select_ssd_name"
                                                value="{{$ssd_numb[0]}} {{$ssd_numb[1]}}">
                                            <input type="hidden" id="select_ssd_id" name="select_ssd_id"
                                                value="{{$single_ssd->id}}">
                                            <input type="hidden" id="select_ssd_unit_price" name="select_ssd_unit_price"
                                                value="{{$single_ssd->unit_price}}">
                                            <?php break; } ?>
                                            @endforeach

                                            <div class="ram-btn-group">
                                                @foreach($all_ssd as $key => $single_ssd)
                                                <?php 
                                                        $ssd_numb = explode(' ', $single_ssd->name);
                                                        $ssdChange = 'ssdChangeTo'.$ssd_numb[0].$ssd_numb[1];
                                                        $ssd_type = strtolower($ssd_numb[1]);
                                                    ?>
                                                @if($key == 0 && count($all_ssd) < 3) <button
                                                    class="btn ram-change-btn active-btn" type="button"
                                                    onclick="{{$ssdChange}}('{{$single_ssd->id}}','{{$single_ssd->unit_price}}')"
                                                    id="ssd-{{$ssd_numb[0]}}{{$ssd_type}}-btn" style="cursor: pointer;">
                                                    {{$ssd_numb[0]}} {{$ssd_numb[1]}}</button>
                                                    @elseif($key == 1 && count($all_ssd) >= 3)
                                                    <button class="btn ram-change-btn active-btn" type="button"
                                                        onclick="{{$ssdChange}}('{{$single_ssd->id}}','{{$single_ssd->unit_price}}')"
                                                        id="ssd-{{$ssd_numb[0]}}{{$ssd_type}}-btn"
                                                        style="cursor: pointer;">{{$ssd_numb[0]}}
                                                        {{$ssd_numb[1]}}</button>
                                                    @else
                                                    <button class="btn ram-change-btn" type="button"
                                                        onclick="{{$ssdChange}}('{{$single_ssd->id}}','{{$single_ssd->unit_price}}')"
                                                        id="ssd-{{$ssd_numb[0]}}{{$ssd_type}}-btn"
                                                        style="cursor: pointer;">{{$ssd_numb[0]}}
                                                        {{$ssd_numb[1]}}</button>
                                                    @endif
                                                    @endforeach
                                            </div>
                                        </div>
                                        <div class="quick-review">
                                            <h1>Quick Overview:</h1>
                                            <p>{{$processor}}</p>
                                            <p>{{$graphics}}</p>
                                            <p>Wifi {{$wifi}}</p>
                                        </div>

                                        <?php 
                                            $prod_price = (int)$products->unit_price;
                                            $ram_p = (int)$all_ram[0]->unit_price;
                                            if(count($all_ssd) < 3){
                                                $ssd_p = (int)$all_ssd[0]->unit_price;
                                            } else {
                                                $ssd_p = (int)$all_ssd[1]->unit_price;
                                            }
                                            
                                            $prod_total_price = $prod_price + $ram_p + $ssd_p;
                                        ?>
                                        <input type="hidden" id="product-total-price" value="{{$prod_total_price}}">
                                        <input type="hidden" id="product-base-price" value="{{$prod_price}}">
                                        <input type="hidden" id="product-ram-price" value="{{$ram_p}}">
                                        <input type="hidden" id="product-ssd-price" value="{{$ssd_p}}">
                                        <h3 class="product-updated-price" id="product-updated-price">
                                            ৳{{number_format($prod_total_price)}}</h3>



                                    </div>
                                    {{-- <div class="container" style="text-align:center;margin-bottom:20px;"> --}}
                                    <div class="container product-details-add-cart">
                                        <?php if($products->current_stock > 1){
                                            $marginLeftWishlist = '';
                                        ?>
                                        <div class="prod-qty ">
                                            <form>
                                                @csrf
                                                <span><input type="button" onclick="change()" value="-"
                                                        style="border: 0; outline: 0; background: none; margin-left: 20px;" /></span>
                                                <input type="text" id="prd-qty" name="prd-qty" value="1" />
                                                <span><input type="button" onclick="change('plus')" value="+"
                                                        style="border: 0; outline: 0; background: none" /></span>
                                            </form>
                                        </div>
                                        <?php
                                    if(session()->has('ADMIN_LOGIN') || $products->current_stock < 1) {
                                    
                                    ?>
                                        <div class="">
                                            <form class="form-inline" action="{{ route('carts.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                                <a type="button" class="add-cart-btn" disabled
                                                    style="cursor: not-allowed">Add to Cart</a>
                                            </form>
                                        </div>
                                        <?php } else { ?>
                                        <div class="">
                                            <form class="form-inline" action="{{ route('carts.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                                <div id="desktop-addtocart-btn">
                                                    <button type="button" class="add-cart-btn" href="javascript:void(0)"
                                                        style="border: none;outline: none;padding: 0px;"
                                                        onclick="add_to_cart()" id="add_to_cart_btn">Add
                                                        to Cart</button>
                                                </div>
                                                <div id="mobile-addtocart-btn">
                                                    <button type="button" class="add-cart-btn" href="javascript:void(0)"
                                                        style="border: none;outline: none;padding: 0px;"
                                                        onclick="add_to_cart_mobile()" id="add_to_cart_btn">Add
                                                        to Cart</button>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Desktop Modal for free bagpack & Keyboard -->
                                        <div class="desktop-modal-area" id="desktop-modal-area">
                                            <div class="modal blur fade" id="laniaFreeBagPackModalShow" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog free-bagpack-modal-area" role="document">
                                                    <div class="modal-content free-bagpack-modal-content">
                                                        <div class="modal-body pt-md-0 px-4 px-md-5 text-center">
                                                            <p class="free-backpack-modal-title"
                                                                id="free-backpack-modal-title">Choose your free backpack
                                                                and
                                                                mouse keyboard</p>
                                                            <form id="backpackSubmit">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="container bagpack-area-content">

                                                                        <div
                                                                            class="col-12 col-sm-12 col-lg-9 col-md-9 bag-select-area-div">
                                                                            <p class="bag-select-area-title-top">Select
                                                                                your
                                                                                free backpack color :</p>

                                                                            <div class="row select-bag-row">

                                                                                <div id="slide-bag-wrapper">

                                                                                    <div class="col-1 col-sm-1 col-lg-1 col-md-1 arrow-div arrow-div-left"
                                                                                        style="display: none;">
                                                                                        <i id="modalSideLeft"
                                                                                            onclick="slideLeftBagImg()"
                                                                                            class="fas fa-chevron-left modal_arrow modal_left_arrow"></i>
                                                                                    </div>

                                                                                    <div id="slider-bag">
                                                                                        <?php $is_checked = '';?>
                                                                                        @foreach($all_backpack as $key
                                                                                        =>
                                                                                        $backpack)

                                                                                        <?php if(in_array( $all_bag_colors[$key], $outstock_bag_colors)){?>
                                                                                        <div class="select-lania-bag-area unselected-bag-bg disabled-bag-area"
                                                                                            id="select_lania-bag_area_{{$key}}"
                                                                                            onclick="changeLaniaBag('{{$backpack->galary_photo}}','{{$backpack->id}}','{{json_decode($all_backpack[$key]->attributes)[0]->attribute_value}}','{{json_encode($bag_id_arr)}}','no')">
                                                                                            <img class="stock-out-img"
                                                                                                src="{{ asset($backpack->galary_photo) }}" />
                                                                                            <img src="{{ asset('frontend/assets/images/bag_unchecked_small.png') }}"
                                                                                                id="bag_mark_{{$key}}"
                                                                                                alt="Unchecked"
                                                                                                class="bag-unchecked">
                                                                                        </div>
                                                                                        <?php
                                                                                            } else {
                                                                                                if($is_checked == ''){
                                                                                        ?>
                                                                                        <div class="select-lania-bag-area selected-bag-bg"
                                                                                            id="select_lania-bag_area_{{$key}}"
                                                                                            onclick="changeLaniaBag('{{$backpack->galary_photo}}','{{$backpack->id}}','{{json_decode($all_backpack[$key]->attributes)[0]->attribute_value}}','{{json_encode($bag_id_arr)}}','yes')">
                                                                                            <img class="lania-bag-img"
                                                                                                src="{{ asset($backpack->galary_photo) }}" />
                                                                                            <img src="{{ asset('frontend/assets/images/bag_checked_small.png') }}"
                                                                                                id="bag_mark_{{$key}}"
                                                                                                alt="Checked"
                                                                                                class="bag-checked">
                                                                                        </div>
                                                                                        <input type="hidden"
                                                                                            name="free_bag_id"
                                                                                            id="free_bag_id"
                                                                                            value="{{ $backpack->id }}">
                                                                                        <?php $is_checked = 'yes'; } else { ?>
                                                                                        <div class="select-lania-bag-area unselected-bag-bg"
                                                                                            id="select_lania-bag_area_{{$key}}"
                                                                                            onclick="changeLaniaBag('{{$backpack->galary_photo}}','{{$backpack->id}}','{{json_decode($all_backpack[$key]->attributes)[0]->attribute_value}}','{{json_encode($bag_id_arr)}}','yes')">
                                                                                            <img class="lania-bag-img"
                                                                                                src="{{ asset($backpack->galary_photo) }}" />
                                                                                            <img src="{{ asset('frontend/assets/images/bag_unchecked_small.png') }}"
                                                                                                id="bag_mark_{{$key}}"
                                                                                                alt="Unchecked"
                                                                                                class="bag-unchecked">
                                                                                        </div>
                                                                                        <?php } }?>
                                                                                        @endforeach
                                                                                    </div>

                                                                                    <div class="col-1 col-sm-1 col-lg-1 col-md-1 arrow-div arrow-div-right"
                                                                                        style="display: none;">
                                                                                        <i id="modalSideRight"
                                                                                            onclick="slideRightBagImg()"
                                                                                            class="fas fa-chevron-right modal_arrow modal_right_arrow"></i>
                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                            <?php 
                                                                            if(!$all_outstock_backpack->isEmpty()){
                                                                                for($i = 0; $i < count($all_bag_colors); $i++){
                                                                                    if(in_array( $all_bag_colors[$i], $outstock_bag_colors)){
                                                                                        continue;
                                                                                    } else {
                                                                        ?>
                                                                            <p class="bag-select-title">You have
                                                                                selected
                                                                                <span
                                                                                    id="bag_color">{{strtolower(json_decode($all_backpack[$i]->attributes)[0]->attribute_value)}}</span>
                                                                                backpack
                                                                            </p>
                                                                        </div>

                                                                        <div
                                                                            class="col-12 col-sm-12 col-lg-3 col-md-3 selected-lania-bagarea">
                                                                            <div class="galary_bag_div">
                                                                                <img src="{{ asset($all_backpack[$i]->galary_photo) }}"
                                                                                    id="bag_galary_photo"
                                                                                    alt="Selected Bag">
                                                                            </div>

                                                                        </div>

                                                                        <?php break; } } } else {?>

                                                                        <p class="bag-select-title">You have selected
                                                                            <span
                                                                                id="bag_color">{{json_decode($all_backpack[0]->attributes)[0]->attribute_value}}</span>
                                                                            backpack
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-12 col-sm-12 col-lg-3 col-md-3 selected-lania-bagarea">
                                                                        <div class="galary_bag_div">
                                                                            <img src="{{ asset($all_backpack[0]->galary_photo) }}"
                                                                                id="bag_galary_photo"
                                                                                alt="Selected Bag">
                                                                        </div>

                                                                    </div>
                                                                    <?php } ?>

                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="container keyboard-area-content">

                                                                <div
                                                                    class="col-12 col-sm-12 col-lg-9 col-md-9 bag-select-area-div">
                                                                    <p class="keyboard-select-area-title-top">Select
                                                                        your
                                                                        free mouse & keyboard :</p>

                                                                    <div class="row select-keyboard-row">
                                                                        <input type="hidden" name="select_keyboard_id"
                                                                            id="select_keyboard_id"
                                                                            value="{{ $all_keyboardmouse[1]->id }}">
                                                                        <input type="hidden" name="select_keyboard_type"
                                                                            id="select_keyboard_type" value="free">
                                                                        <div id="keyboard-field">
                                                                            <div class="select-lania-keyboard-area selected-keyboard-bg"
                                                                                id="select_lania_free_keyboard_area"
                                                                                onclick="changeLaniaFreeKeyboard('{{$all_keyboardmouse[1]->galary_photo}}','{{$all_keyboardmouse[1]->id}}','yes')">
                                                                                <img class="lania-keyboard-img"
                                                                                    src="{{ asset($all_keyboardmouse[1]->galary_photo) }}" />
                                                                                <img src="{{ asset('frontend/assets/images/bag_checked_small.png') }}"
                                                                                    id="free_keyboard_mark"
                                                                                    alt="Checked"
                                                                                    class="keyboard-checked">
                                                                            </div>
                                                                            <div
                                                                                class="select-lania-keyboard-area keyboard-name-area">
                                                                                <p class="keyboard-mouse-name-1">Free
                                                                                    mouse
                                                                                    &</p>
                                                                                <p class="keyboard-mouse-name-2">
                                                                                    keyboard
                                                                                </p>
                                                                            </div>
                                                                            <?php if($all_keyboardmouse[0]->current_stock > 0){?>
                                                                            <div class="select-lania-keyboard-area unselected-keyboard-bg"
                                                                                id="select_lania_wireless_keyboard_area_1"
                                                                                onclick="changeLaniaWirelessKeyboard('{{$all_keyboardmouse[0]->galary_photo}}','{{$all_keyboardmouse[0]->id}}','yes')">
                                                                                <img class="lania-keyboard-img"
                                                                                    src="{{ asset($all_keyboardmouse[0]->galary_photo) }}" />
                                                                                <img src="{{ asset('frontend/assets/images/bag_unchecked_small.png') }}"
                                                                                    id="wireless_keyboard_mark_1"
                                                                                    alt="Unchecked"
                                                                                    class="keyboard-unchecked">
                                                                            </div>
                                                                            <?php } else {?>
                                                                            <div class="select-lania-keyboard-area unselected-keyboard-bg disabled-bag-area"
                                                                                id="select_lania_wireless_keyboard_area_2"
                                                                                onclick="changeLaniaWirelessKeyboard('{{$all_keyboardmouse[0]->galary_photo}}','{{$all_keyboardmouse[0]->id}}','no')">
                                                                                <img class="lania-keyboard-stock-out-img"
                                                                                    src="{{ asset($all_keyboardmouse[0]->galary_photo) }}" />
                                                                                <img src="{{ asset('frontend/assets/images/bag_unchecked_small.png') }}"
                                                                                    id="wireless_keyboard_mark_2"
                                                                                    alt="Unchecked"
                                                                                    class="keyboard-unchecked">
                                                                            </div>
                                                                            <?php } ?>
                                                                            <div class="select-lania-keyboard-area wireless-keyboard-name-area"
                                                                                id="select_lania-keyboard_area4">
                                                                                <p
                                                                                    class="wireless-keyboard-mouse-name-1">
                                                                                    Wireless mouse</p>
                                                                                <p
                                                                                    class="wireless-keyboard-mouse-name-2">
                                                                                    &
                                                                                    keyboard</p>
                                                                                <p
                                                                                    class="wireless-keyboard-mouse-name-3">
                                                                                    (
                                                                                    Extra ৳1000 )</p>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <p class="keyboard-select-title">You have selected
                                                                        <span id="keyboard_name"> free mouse &
                                                                            keyboard</span>
                                                                    </p>
                                                                </div>

                                                                <div
                                                                    class="col-12 col-sm-12 col-lg-3 col-md-3 selected-lania-keyboardarea">
                                                                    <div class="galary_keyboard_div">
                                                                        <img src="{{ asset($all_keyboardmouse[1]->galary_photo) }}"
                                                                            id="keyboard_galary_photo"
                                                                            alt="Selected keyboard mouse">
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        </form>
                                                        <button type="button" class="modal-continue-btn"
                                                            style="margin-bottom: 0px;float: none;"
                                                            onclick="add_to_cart_proceed('{{ $products->id }}')"
                                                            id="add_to_cart_proceed_btn">Proceed</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Desktop Modal for free bagpack & Keyboard -->
                                        </div>
                                    </div>


                                    <!-- Mobile Modal for free bagpack & Keyboard -->
                                    <div id="mobile-modal-area">
                                        <div class="modal blur fade" id="mobileLaniaFreeBagPackModalShow" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog free-bagpack-modal-area1" role="document">
                                                <div class="modal-content free-bagpack-modal-content1">
                                                    <div id="mobile-lania-bag-modal" class="modal-body text-center">
                                                        <p class="free-backpack-modal-title1"
                                                            id="free-backpack-modal-title1">Choose your free backpack
                                                        </p>
                                                        <form id="backpackSubmit">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="container bagpack-area-content1">
                                                                    <?php 
                                                                    if(!$all_outstock_backpack->isEmpty()){
                                                                        for($i = 0; $i < count($all_bag_colors); $i++){
                                                                            if(in_array( $all_bag_colors[$i], $outstock_bag_colors)){
                                                                                continue;
                                                                            } else {
                                                                ?>
                                                                    <div class="col-12 col-sm-12 selected-bagarea1">
                                                                        <div class="galary_bag_div1">
                                                                            <img src="{{ asset($all_backpack[$i]->galary_photo) }}"
                                                                                id="bag_galary_photo1"
                                                                                alt="Selected Bag">
                                                                        </div>
                                                                        <p class="bag-select-title1">You have selected
                                                                            <span
                                                                                id="bag_color1">{{json_decode($all_backpack[$i]->attributes)[0]->attribute_value}}</span>
                                                                            backpack
                                                                        </p>
                                                                    </div>
                                                                    <?php break; } } } else {?>
                                                                    <div class="col-12 col-sm-12 selected-bagarea1">
                                                                        <div class="galary_bag_div1">
                                                                            <img src="{{ asset($all_backpack[0]->galary_photo) }}"
                                                                                id="bag_galary_photo1"
                                                                                alt="Selected Bag">
                                                                        </div>
                                                                        <p class="bag-select-title1">You have selected
                                                                            <span
                                                                                id="bag_color1">{{json_decode($all_backpack[0]->attributes)[0]->attribute_value}}</span>
                                                                            backpack
                                                                        </p>
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="col-12 col-sm-12 bag-select-area-div1">

                                                                        <div class="row select-bag-row1">

                                                                            <div id="slide-bag-wrapper1">

                                                                                <div id="slider-bag1">
                                                                                    <?php $is_checked = '';?>
                                                                                    @foreach($all_backpack as $key =>
                                                                                    $backpack)

                                                                                    <?php if(in_array( $all_bag_colors[$key], $outstock_bag_colors)){?>
                                                                                    <div class="select-lania-bag-area1 unselected-bag-bg disabled-bag-area"
                                                                                        id="select_lania-bag_area_mobile_{{$key}}"
                                                                                        onclick="changeLaniaBag('{{$backpack->galary_photo}}','{{$backpack->id}}','{{json_decode($all_backpack[$key]->attributes)[0]->attribute_value}}','{{json_encode($bag_id_arr)}}','no')">
                                                                                        <img class="stock-out-img1"
                                                                                            src="{{ asset($backpack->galary_photo) }}" />
                                                                                        <img src="{{ asset('frontend/assets/images/bag_unchecked_extra_small.png') }}"
                                                                                            id="bag_mark_mobile_{{$key}}"
                                                                                            alt="Unchecked"
                                                                                            class="bag-unchecked1">
                                                                                    </div>
                                                                                    <?php
                                                                                        } else {
                                                                                            if($is_checked == ''){
                                                                                    ?>
                                                                                    <div class="select-lania-bag-area1 selected-bag-bg"
                                                                                        id="select_lania-bag_area_mobile_{{$key}}"
                                                                                        onclick="changeLaniaBag('{{$backpack->galary_photo}}','{{$backpack->id}}','{{json_decode($all_backpack[$key]->attributes)[0]->attribute_value}}','{{json_encode($bag_id_arr)}}','yes')">
                                                                                        <img class="lania-bag-img1"
                                                                                            src="{{ asset($backpack->galary_photo) }}" />
                                                                                        <img src="{{ asset('frontend/assets/images/bag_checked_extra_small.png') }}"
                                                                                            id="bag_mark_mobile_{{$key}}"
                                                                                            alt="Checked"
                                                                                            class="bag-checked1">
                                                                                    </div>
                                                                                    <input type="hidden"
                                                                                        name="free_bag_id"
                                                                                        id="free_bag_id1"
                                                                                        value="{{ $backpack->id }}">
                                                                                    <?php $is_checked = 'yes'; } else { ?>
                                                                                    <div class="select-lania-bag-area1 unselected-bag-bg"
                                                                                        id="select_lania-bag_area_mobile_{{$key}}"
                                                                                        onclick="changeLaniaBag('{{$backpack->galary_photo}}','{{$backpack->id}}','{{json_decode($all_backpack[$key]->attributes)[0]->attribute_value}}','{{json_encode($bag_id_arr)}}','yes')">
                                                                                        <img class="lania-bag-img1"
                                                                                            src="{{ asset($backpack->galary_photo) }}" />
                                                                                        <img src="{{ asset('frontend/assets/images/bag_unchecked_extra_small.png') }}"
                                                                                            id="bag_mark_mobile_{{$key}}"
                                                                                            alt="Unchecked"
                                                                                            class="bag-unchecked1">
                                                                                    </div>
                                                                                    <?php } }?>
                                                                                    @endforeach
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <p class="bag-select-area-title-bottom1">Select
                                                                            your free backpack color :</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <button type="button" class="modal-continue-btn"
                                                            style="margin-bottom: 0px;float: none;"
                                                            onclick="continueToKeyboardModal()"
                                                            id="add_to_cart_proceed_btn">Continue</button>
                                                    </div>

                                                    <div id="mobile-lania-keyboard-modal"
                                                        class="modal-body text-center">
                                                        <p class="free-backpack-modal-title1"
                                                            id="free-backpack-modal-title1">Choose your free mouse
                                                            keyboard</p>
                                                        <form id="backpackSubmit">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="container bagpack-area-content1">
                                                                    <div class="col-12 col-sm-12 selected-bagarea1">
                                                                        <div class="galary_keyboard_div1">
                                                                            <img src="{{ asset($all_keyboardmouse[1]->galary_photo) }}"
                                                                                id="keyboard_galary_photo1"
                                                                                alt="Selected keyboard mouse">

                                                                        </div>
                                                                        <p class="bag-select-title1">You have selected
                                                                            <span id="keyboard_name1"> free mouse &
                                                                                keyboard</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-12 col-sm-12 bag-select-area-div">
                                                                        <div class="row select-keyboard-row1">
                                                                            <input type="hidden"
                                                                                name="select_keyboard_id"
                                                                                id="select_keyboard_id1"
                                                                                value="{{ $all_keyboardmouse[1]->id }}">
                                                                            <input type="hidden"
                                                                                name="select_keyboard_type"
                                                                                id="select_keyboard_type1" value="free">
                                                                            <div id="keyboard-field1">
                                                                                <div class="select-lania-keyboard-area selected-keyboard-bg"
                                                                                    id="select_lania_free_keyboard_area_mobile"
                                                                                    onclick="changeLaniaFreeKeyboard('{{$all_keyboardmouse[1]->galary_photo}}','{{$all_keyboardmouse[1]->id}}','yes')">
                                                                                    <img class="lania-keyboard-img-mobile"
                                                                                        src="{{ asset($all_keyboardmouse[1]->galary_photo) }}" />
                                                                                    <img src="{{ asset('frontend/assets/images/bag_checked_small.png') }}"
                                                                                        id="free_keyboard_mark_mobile"
                                                                                        alt="Checked"
                                                                                        class="keyboard-checked">
                                                                                </div>
                                                                                <div
                                                                                    class="select-lania-keyboard-area keyboard-name-area">
                                                                                    <p class="keyboard-mouse-name-1">
                                                                                        Free mouse
                                                                                        &</p>
                                                                                    <p class="keyboard-mouse-name-2">
                                                                                        keyboard
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div id="keyboard-field1">
                                                                                <?php if($all_keyboardmouse[0]->current_stock > 0){?>
                                                                                <div class="select-lania-keyboard-area unselected-keyboard-bg"
                                                                                    id="select_lania_wireless_keyboard_area_mobile_1"
                                                                                    onclick="changeLaniaWirelessKeyboard('{{$all_keyboardmouse[0]->galary_photo}}','{{$all_keyboardmouse[0]->id}}','yes')">
                                                                                    <img class="lania-keyboard-img-mobile"
                                                                                        src="{{ asset($all_keyboardmouse[0]->galary_photo) }}" />
                                                                                    <img src="{{ asset('frontend/assets/images/bag_unchecked_small.png') }}"
                                                                                        id="wireless_keyboard_mark_mobile_1"
                                                                                        alt="Unchecked"
                                                                                        class="keyboard-unchecked">
                                                                                </div>
                                                                                <?php } else {?>
                                                                                <div class="select-lania-keyboard-area unselected-keyboard-bg disabled-bag-area"
                                                                                    id="select_lania_wireless_keyboard_area_mobile_2"
                                                                                    onclick="changeLaniaWirelessKeyboard('{{$all_keyboardmouse[0]->galary_photo}}','{{$all_keyboardmouse[0]->id}}','no')">
                                                                                    <img class="lania-keyboard-stock-out-img-mobile"
                                                                                        src="{{ asset($all_keyboardmouse[0]->galary_photo) }}" />
                                                                                    <img src="{{ asset('frontend/assets/images/bag_unchecked_small.png') }}"
                                                                                        id="wireless_keyboard_mark_mobile_2"
                                                                                        alt="Unchecked"
                                                                                        class="keyboard-unchecked">
                                                                                </div>
                                                                                <?php } ?>
                                                                                <div class="select-lania-keyboard-area wireless-keyboard-name-area"
                                                                                    id="select_lania-keyboard_area4">
                                                                                    <p
                                                                                        class="wireless-keyboard-mouse-name-1">
                                                                                        Wireless mouse</p>
                                                                                    <p
                                                                                        class="wireless-keyboard-mouse-name-2">
                                                                                        &
                                                                                        keyboard</p>
                                                                                    <p
                                                                                        class="wireless-keyboard-mouse-name-3">
                                                                                        (
                                                                                        Extra ৳1000 )</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="keyboard-select-area-title-top1">
                                                                            Select your
                                                                            free mouse & keyboard :</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <button type="button" class="modal-continue-btn"
                                                            style="margin-bottom: 0px;float: none;"
                                                            onclick="add_to_cart_proceed_mobile('{{$products->id}}')"
                                                            id="add_to_cart_proceed_btn">Proceed</button>
                                                        <button type="button" class="lania-back-modal-btn"
                                                            style="margin-bottom: 0px;float: none;"
                                                            onclick="backToBag()"
                                                            id="lania-back-modal-btn">Back</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Mobile Modal for free bagpack -->
                                    </div>

                                    <?php } } ?>
                                    <!-- {{-- <a type="button" class="btn btn-default btn-lg" style="" href="{{ route('carts',$products->id)}}">Add
                                        to Cart</a> --}} -->
                                    <?php
                                            if(session()->has('USER_LOGIN')) {
                                        ?>
                                    <form class="form-inline" action="" {{$marginLeftWishlist}}>
                                        @csrf
                                        <input type="hidden" name="prod_id" value="{{ $products->id }}">
                                        @if(App\Models\Wishlist::isWishlisted($products->id))
                                        <a href="javascript:void(0)" onclick="removeWishlist('{{$products->id}}')"
                                            id="wish-fill">
                                            <!-- <img src="{{ asset('frontend/assets/images/product_page/Icon ionic-ios-heart.png') }}"
                                                    alt="wishlist"> -->
                                            <span class="svg-icon svg-icon-primary svg-icon-2x wish-icon-fill">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Heart.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="60px"
                                                    height="60px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path id="wish-fill"
                                                            d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon--></span>
                                            <!-- <i class="fa fa-regular fa-heart"></i> -->
                                        </a>
                                        @else
                                        <a href="javascript:void(0)" onclick="addWishlist('{{$products->id}}')"
                                            id="without-fill">
                                            <!-- <img src="{{ asset('frontend/assets/images/product_page/Icon ionic-ios-heart.png') }}"
                                                    alt="wishlist"> -->
                                            <span class="svg-icon svg-icon-primary svg-icon-2x wish-icon">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Heart.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="60px"
                                                    height="60px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path
                                                            d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon--></span>
                                            <!-- <i class="fa fa-regular fa-heart"></i> -->
                                        </a>
                                        @endif

                                    </form>
                                    <?php } else {?>
                                    <a href="javascript:void(0)" onclick="wishlistCartModal()" {{$marginLeftWishlist}}>
                                        <!-- <img src="{{ asset('frontend/assets/images/product_page/Icon ionic-ios-heart.png') }}"
                                                alt="wishlist"> -->
                                        <span class="svg-icon svg-icon-primary svg-icon-2x wish-icon">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Heart.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="60px" height="60px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon--></span>
                                        <!-- <i class="fa fa-regular fa-heart"></i> -->
                                    </a>
                                    <?php }?>
                                    <button class="btn" href="javascript:void(0)" onclick="laniaPreOrderModal()">PRE ORDER NOW</button> 
                                </div>
                                <div class="container">
                                    <!-- <p style="font-weight: 500;">Share</p> -->
                                    @php
                                    $link = url()->current();

                                    @endphp
                                    <div class="social_icon">
                                        <ul style="margin-left: -30px">
                                            <li> <a href="https://www.facebook.com/sharer/sharer.php?u={{$link}}"
                                                    target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                            </li>
                                            <li> <a href="https://www.linkedin.com/sharing/share-offsite/?url={{$link}}"
                                                    target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                                            </li>
                                            <li> <a href="https://twitter.com/intent/tweet?url={{$link}}"
                                                    target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                            </li>
                                            <!-- <li><img src="{{ asset('frontend/assets/images/product_page/facebook.png') }}"
                                                    alt="facebook"></li>
                                            <li style="padding-left: 10px;"><img
                                                    src="{{ asset('frontend/assets/images/product_page/twitter-bird.png') }}"
                                                    alt="facebook"></li>
                                            <li style="padding-left: 10px;"><img
                                                    src="{{ asset('frontend/assets/images/product_page/linkedin.png') }}"
                                                    alt="facebook"></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="table-responsive">
                        <table class=" table-bordered">
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
                    </div> -->

                <div class="product-details-list">
                    <div class="product-details-list-title">
                        <h1>Description</h1>
                        <p>{!! $products->description !!}</p>
                    </div>
                    <div class="product-details-list-info">
                        <h1>Specification</h1>
                        <div class="product-details-list-information">
                            <!-- <p>
                                <span>Brand :</span>
                                <span>{{$brand}}</span>
                            </p> -->
                            <p>
                                <span>Series :</span>
                                <span>{{$series}}</span>
                            </p>
                            <p>
                                <span>Model :</span>
                                <span>{{$model}}</span>
                            </p>
                            <p>
                                <span>Processor :</span>
                                <span>{{$processor}}</span>
                            </p>
                            <p>
                                <span>Storage :</span>
                                <span>{{$storage}}</span>
                            </p>
                            <p>
                                <span>Memory :</span>
                                <span>{{$ram}}</span>
                            </p>
                            <!-- <p>
                                <span>Graphics :</span>
                                <span>{{$graphics}}</span>
                            </p> -->
                            <p>
                                <span>Operating System :</span>
                                <span>{{$operating}}</span>
                            </p>
                            <p>
                                <span>Ports & Connectors:</span>
                                <span>{{$ports}}</span>
                            </p>
                            <p>
                                <span>Wireless :</span>
                                <span>{{$wireless}}</span>
                            </p>
                            <p>
                                <span>Bluetooth :</span>
                                <span>{{$bluetooth}}</span>
                            </p>
                            <!-- <p>
                                <span>Audio :</span>
                                <span>{{$audio}}</span>
                            </p> -->

                            <p>
                                <span>Color :</span>
                                <span>{{$color}}</span>
                            </p>
                            <!-- <p>
                                <span>Weight :</span>
                                <span>{{$weight}}</span>
                            </p> -->
                            <p>
                                <span>Warranty :</span>
                                <span>{{$warranty}}</span>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="also-like-title">
                    <h1>You may also like</h1>
                </div>
                @php
                $like = $amount =
                App\Models\Product::where('sub_category','Sigma')->where('status','1')->limit(2)->get();
                @endphp
                <div class="row px-1 also-like">
                    @foreach($like as $key=>$product)
                    <div class="col-sm-6" style="margin-bottom:40px">
                        <div class="sigma-category-contant-section">
                            <div class="card card-customize">
                                <div class="sigma-category-image-section">
                                    <a class="sigma-title" href="{{ route('product_details',$product->slug)}}">
                                        <div class="item" style="padding: 30px;"><img
                                                src="{{ asset($product->galary_photo) }}" alt="The Last of us"
                                                class="img-fluid"></div>
                                    </a>

                                </div>
                                <div class="container">
                                    <a class="sigma-title" href="{{ route('product_details',$product->slug)}}">

                                        <?php if(strlen($product->name) > 120) {?>
                                        {{ substr($product->name,0,120)}}
                                        <?php } else {?>
                                        {{$product->name}}
                                        <?php } ?>
                                        </p>
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
                                        @if($text->attribute_name == 'Processor' || $text->attribute_name ==
                                        'Memory' ||
                                        $text->attribute_name == 'Storage' || $text->attribute_name == 'Display')
                                        <li>{{$text->attribute_value}}</li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="container" style="text-align:start;margin-bottom:20px;">
                                    <a href="{{ route('product_details',$product->slug)}}"
                                        style="text-decoration: none;">More details</a>
                                </div>
                                <div class="container" style="text-align:center;margin-bottom:20px;">
                                    <a href="#" class="starting">Starting at
                                        ৳{{ number_format($product->unit_price) }}</a>
                                </div>
                                <div class="container" style="text-align:center;">

                                    <a href="{{ route('product_details',$product->slug)}}"
                                        style="text-decoration: none">
                                        <button type="button" class="sigma-buy-button">Buy Now</button>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- <div class="row">
                        <div class="col-sm-6" style="margin-bottom:40px">
                            <div class="sigma-category-contant-section">
                                <div class="card" style="padding-bottom: 20px;box-shadow: 0px 1.2px 1px 0px #70707040;">
                                    <div class="sigma-category-image-section">
                                        <div class="item" style="padding: 30px;"><img
                                                src="{{ asset('frontend/assets/images/sigma-model.png') }}"
                                                alt="The Last of us" class="img-fluid"></div>
                                    </div>
                                    <div class="container">
                                        <p style="text-align: center;margin-top:20px;font-size: 22px;">Qbits Sigma 15 -
                                            10th
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
                                        <a href="#" style="text-decoration: none;font-size:24px;">Starting at
                                            ৳72,000</a>
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
                                        <p style="text-align: center;margin-top:20px;font-size: 22px;">Qbits Sigma 15 -
                                            10th
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
                                        <a href="#" style="text-decoration: none;font-size:24px;">Starting at
                                            ৳72,000</a>
                                    </div>
                                    <div class="container" style="text-align:center;margin-bottom:20px;">
                                        <button type="button" class="btn btn-default btn-lg"
                                            style="background-color: #2699FB;border-radius: 20px;color:#FFFFFF;padding:10px 60px;">Buy
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
    </div>

    <!-- Lania Pre Order Modal -->
    <div class="modal fade" id="lania_pre_order_modal" style="backdrop-filter: none" tabindex="-1"
        role="dialog" aria-labelledby="lania_pre_order_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered lania-preorder-modal-area" style="place-content: center;"
            role="document">
            <div class="modal-content lania-preorder-modal-content">
                <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center" id="pre_order_request">
                    <p style="color: white;font-size: 20px;" class="pt-5">Please fill up this form to Pre Order Lania</p>
                    <form id="laniaPreOrderFrm">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter name *" required>
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <input type="number" class="form-control" id="customer_phone" name="customer_phone" placeholder="Enter phone *" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Enter email *" required>
                        </div>
                        <button type="submit" class="modal-continue-btn" id="laniaPreOrderBtn">Submit</button>
                    </form>
                    
                </div>
                <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center" id="pre_order_request_success">
                    <div class="subscribe_success_circle">
                        <img style="padding-top: 11px;padding-left: 2px;" src="{{ asset('success_icon.png') }}"
                            alt="success" />
                    </div>
                    <p style="margin-bottom: 20px;font-size: 18px;color: white;">Thanks for pre order request!</p>
                    <p style="margin-bottom: 15px;font-size: 16px;color: white;">Our team will contact with you very soon.</p>
                    <button type="button" class="modal-continue-btn"
                        onclick="closeLaniaPreOrderModal()">Close</button>
                </div>
            </div>
        </div>
    </div>


    <form id="frmAddToCartLania">
        <input type="hidden" id="pqty" name="pqty" />
        <input type="hidden" id="product_id" name="product_id" />
        <input type="hidden" id="prod_updated_price" name="prod_updated_price" />
        <input type="hidden" id="prod_base_price" name="prod_base_price" />
        <input type="hidden" id="bag_id" name="bag_id" />
        <input type="hidden" id="ram_id" name="ram_id" />
        <input type="hidden" id="ram_name" name="ram_name" />
        <input type="hidden" id="ram_unit_price" name="ram_unit_price" />
        <input type="hidden" id="ssd_id" name="ssd_id" />
        <input type="hidden" id="ssd_name" name="ssd_name" />
        <input type="hidden" id="ssd_unit_price" name="ssd_unit_price" />
        <input type="hidden" id="keyboard_id" name="keyboard_id" />
        <input type="hidden" id="keyboard_type" name="keyboard_type" />
        @csrf
    </form>

    <form id="frmAddToWishlist">
        <input type="hidden" id="p_qty" name="p_qty" />
        <input type="hidden" id="prod_id" name="prod_id" />
        <input type="hidden" id="ramId" name="ramId" />
        <input type="hidden" id="ramName" name="ramName" />
        <input type="hidden" id="ram_price" name="ram_price" />
        <input type="hidden" id="ramQty" name="ramQty" />
        <input type="hidden" id="ssdId" name="ssdId" />
        <input type="hidden" id="ssdName" name="ssdName" />
        <input type="hidden" id="ssd_price" name="ssd_price" />
        <input type="hidden" id="ssdQty" name="ssdQty" />
        @csrf
    </form>


</section>

<script src="{{asset('frontend/assets/exzoom/easyzoom.js')}}"></script>
<script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.slider-thumbnails').on('click', 'a', function (e) {
        var $this = $(this);
        var divId = $this.attr('name');
        let activeImages = document.getElementsByClassName('myactive');
        let divElem = document.getElementById('myactiveImg_' + divId);
        // alert(divElem);
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('myactive');
        }
        // $this.addClass('myactive');
        divElem.classList.add('myactive');
        e.preventDefault();

        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });

    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    $('.toggle').on('click', function () {
        var $this = $(this);

        if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
        } else {
            $this.text("Switch off").data("active", true);
            api2._init();
        }
    });


    $("#laniaPreOrderFrm").on('submit', function (e) {
        e.preventDefault();
        var data = jQuery('#laniaPreOrderFrm').serialize();
        var spinner =
            '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> Wait...';
        $('#laniaPreOrderBtn').html(spinner);
        jQuery.ajax({
            url: '/lania-pre-order-process',
            data: data,
            type: 'post',
            success: function (result) {
                $('#laniaPreOrderBtn').html('Submit');
                if (result.status == 'success') {
                    $("#pre_order_request").css("display", "none");
                    $("#pre_order_request_success").css("display", "block");
                } else{
                    window.location.reload();
                }
            }
        });
    });


    function closeLaniaPreOrderModal(){
        $("#laniaPreOrderFrm").trigger('reset');
        $('#lania_pre_order_modal').modal('hide');
    }

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


    function slideLeftImg() {
        var element = document.getElementById("slider");
        element.scrollLeft -= 65;
    }

    function slideRightImg() {
        var element = document.getElementById("slider");
        element.scrollLeft += 65;
    }

    function slideLeftBagImg() {
        var elemt = document.getElementById("slider-bag");
        elemt.scrollLeft -= 115;
    }

    function slideRightBagImg() {

        var elemt = document.getElementById("slider-bag");
        elemt.scrollLeft += 115;
    }

    function changeLaniaBag(bagphoto, bagid, bagcolor, bag_id_arr, is_stock) {
        $allBagsId = JSON.parse(bag_id_arr);
        if (is_stock == 'yes') {
            for (let i = 0; i < $allBagsId.length; i++) {
                let bag_mark_btn = document.getElementById('bag_mark_' + i);
                let bag_mark_mobile_btn = document.getElementById('bag_mark_mobile_' + i);
                if ($allBagsId[i] == bagid) {
                    //Desktop
                    if (bag_mark_btn) {
                        document.getElementById('bag_mark_' + i).src = window.location.origin + "/" +
                            'frontend/assets/images/bag_checked_small.png';
                        document.getElementById('select_lania-bag_area_' + i).style.background = "#7070708c";
                    }
                    //Mobile
                    if (bag_mark_mobile_btn) {
                        document.getElementById('bag_mark_mobile_' + i).src = window.location.origin + "/" +
                            'frontend/assets/images/bag_checked_extra_small.png';
                        document.getElementById('select_lania-bag_area_mobile_' + i).style.background = "#7070708c";
                    }
                } else {
                    //Desktop
                    if (bag_mark_btn) {
                        document.getElementById('bag_mark_' + i).src = window.location.origin + "/" +
                            'frontend/assets/images/bag_unchecked_small.png';
                        document.getElementById('select_lania-bag_area_' + i).style.background = "#70707047";
                    }
                    //Mobile
                    if (bag_mark_mobile_btn) {
                        document.getElementById('bag_mark_mobile_' + i).src = window.location.origin + "/" +
                            'frontend/assets/images/bag_unchecked_extra_small.png';
                        document.getElementById('select_lania-bag_area_mobile_' + i).style.background = "#70707047";
                    }

                }
            }
            let galary_photo_btn = document.getElementById('bag_galary_photo');
            let galary_photo_btn1 = document.getElementById('bag_galary_photo1');
            let bag_color_btn = document.getElementById('bag_color');
            let bag_color_btn1 = document.getElementById('bag_color1');
            let bag_id_btn = document.getElementById('free_bag_id');
            let bag_id_btn1 = document.getElementById('free_bag_id1');
            if (galary_photo_btn) {
                galary_photo_btn.src = window.location.origin + "/" + bagphoto;
            }

            if (galary_photo_btn1) {
                galary_photo_btn1.src = window.location.origin + "/" + bagphoto;
            }

            if (bag_color_btn) {
                document.getElementById('bag_color').innerText = bagcolor;
            }

            if (bag_color_btn1) {
                document.getElementById('bag_color1').innerText = bagcolor;
            }

            if (bag_id_btn) {
                jQuery('#free_bag_id').val(bagid);
            }

            if (bag_id_btn1) {
                jQuery('#free_bag_id1').val(bagid);
            }


        } else {
            return;
        }
    }


    //change wireless keyboard mouse
    function changeLaniaWirelessKeyboard(keyboardphoto, keyboardid, is_stock) {

        if (is_stock == 'yes') {
            let keyboard_galary_photo_btn = document.getElementById('keyboard_galary_photo');
            let keyboard_galary_photo_btn1 = document.getElementById('keyboard_galary_photo1');
            if (keyboard_galary_photo_btn) {
                document.getElementById('wireless_keyboard_mark_1').src = window.location.origin + "/" +
                    'frontend/assets/images/bag_checked_small.png';
                document.getElementById('select_lania_wireless_keyboard_area_1').style.background = "#7070708c";
                document.getElementById('free_keyboard_mark').src = window.location.origin + "/" +
                    'frontend/assets/images/bag_unchecked_small.png';
                document.getElementById('select_lania_free_keyboard_area').style.background = "#70707047";
                document.getElementById('keyboard_galary_photo').src = window.location.origin + "/" + keyboardphoto;
                document.getElementById('keyboard_name').innerText = ' wireless mouse & keyboard ( Extra ৳1000 )';
                jQuery('#select_keyboard_id').val(keyboardid);
                jQuery('#select_keyboard_type').val('wireless');
            }
            if (keyboard_galary_photo_btn1) {
                document.getElementById('wireless_keyboard_mark_mobile_1').src = window.location.origin + "/" +
                    'frontend/assets/images/bag_checked_small.png';
                document.getElementById('select_lania_wireless_keyboard_area_mobile_1').style.background = "#7070708c";
                document.getElementById('free_keyboard_mark_mobile').src = window.location.origin + "/" +
                    'frontend/assets/images/bag_unchecked_small.png';
                document.getElementById('select_lania_free_keyboard_area_mobile').style.background = "#70707047";
                document.getElementById('keyboard_galary_photo1').src = window.location.origin + "/" + keyboardphoto;
                document.getElementById('keyboard_name1').innerText = ' wireless mouse & keyboard ( Extra ৳1000 )';
                jQuery('#select_keyboard_id1').val(keyboardid);
                jQuery('#select_keyboard_type1').val('wireless');
            }

        } else {
            return;
        }
    }


    //change wireless keyboard mouse
    function changeLaniaFreeKeyboard(keyboardphoto, keyboardid, is_stock) {
        if (is_stock == 'yes') {
            let keyboard_galary_photo_btn = document.getElementById('keyboard_galary_photo');
            let keyboard_galary_photo_btn1 = document.getElementById('keyboard_galary_photo1');
            if (keyboard_galary_photo_btn) {
                document.getElementById('free_keyboard_mark').src = window.location.origin + "/" +
                    'frontend/assets/images/bag_checked_small.png';
                document.getElementById('select_lania_free_keyboard_area').style.background = "#7070708c";

                document.getElementById('wireless_keyboard_mark_1').src = window.location.origin + "/" +
                    'frontend/assets/images/bag_unchecked_small.png';
                document.getElementById('select_lania_wireless_keyboard_area_1').style.background = "#70707047";
                document.getElementById('keyboard_galary_photo').src = window.location.origin + "/" + keyboardphoto;
                document.getElementById('keyboard_name').innerText = 'free mouse & keyboard';
                jQuery('#select_keyboard_id').val(keyboardid);
                jQuery('#select_keyboard_type').val('free');
            }
            if (keyboard_galary_photo_btn1) {
                document.getElementById('free_keyboard_mark_mobile').src = window.location.origin + "/" +
                    'frontend/assets/images/bag_checked_small.png';
                document.getElementById('select_lania_free_keyboard_area_mobile').style.background = "#7070708c";

                document.getElementById('wireless_keyboard_mark_mobile_1').src = window.location.origin + "/" +
                    'frontend/assets/images/bag_unchecked_small.png';
                document.getElementById('select_lania_wireless_keyboard_area_mobile_1').style.background = "#70707047";
                document.getElementById('keyboard_galary_photo1').src = window.location.origin + "/" + keyboardphoto;
                document.getElementById('keyboard_name1').innerText = 'free mouse & keyboard';
                jQuery('#select_keyboard_id1').val(keyboardid);
                jQuery('#select_keyboard_type1').val('free');
            }
        } else {
            return;
        }
    }

    // Najmul Ovi
    function change(type) {
        var cur_val = document.getElementById("prd-qty").value;
        if (type == "plus") {
            cur_val++;
        } else if (cur_val > 1) {
            cur_val--;
        }
        document.getElementById("prd-qty").value = cur_val;
    }

    //Desktop
    function add_to_cart_proceed(id) {
        $('#laniaFreeBagPackModalShow').modal('hide');
        jQuery('#add_to_cart_msg').html('');
        jQuery('#product_id').val(id);
        jQuery('#pqty').val(jQuery('#prd-qty').val());
        jQuery('#prod_updated_price').val(jQuery('#product-total-price').val());
        jQuery('#prod_base_price').val(jQuery('#product-base-price').val());
        jQuery('#ram_name').val(jQuery('#select_ram_name').val());
        jQuery('#ram_id').val(jQuery('#select_ram_id').val());
        jQuery('#ram_unit_price').val(jQuery('#select_ram_unit_price').val());
        jQuery('#ssd_name').val(jQuery('#select_ssd_name').val());
        jQuery('#ssd_id').val(jQuery('#select_ssd_id').val());
        jQuery('#ssd_unit_price').val(jQuery('#select_ssd_unit_price').val());
        jQuery('#bag_id').val(jQuery('#free_bag_id').val());
        jQuery('#keyboard_id').val(jQuery('#select_keyboard_id').val());
        jQuery('#keyboard_type').val(jQuery('#select_keyboard_type').val());
        $("#add_to_cart_proceed_btn").attr('disabled', true);
        $("#add_to_cart_btn").attr('disabled', true);
        jQuery.ajax({
            url: '/add_to_cart',
            data: jQuery('#frmAddToCartLania').serialize(),
            type: 'post',
            success: function (result) {
                if (result.totalItem == 0) {
                    jQuery('#cart-menu').hide();
                    jQuery('#mob-cart-menu').hide();
                } else {
                    var cart_val = jQuery('#cart-val').html();
                    var mob_cart_val = jQuery('#mob-cart-val').html();
                    // alert(cart_val);
                    if (cart_val == undefined || mob_cart_val == undefined) {
                        var html =
                            '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                            result.totalItem + '</span></span>';
                        var html1 =
                            '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                            result.totalItem + '</span></span>';
                        jQuery('.shopping-cart-icon').html(html);
                        jQuery('.mob-shopping-cart-icon').html(html1);
                        document.getElementById("productpage-area-section").style.opacity = "0.5";
                        document.getElementById("cart-box").style.display = "block";
                        document.getElementById("mob-cart-box").style.display = "block";
                    } else {
                        jQuery('#cart-val').html(result.totalItem);
                        jQuery('#mob-cart-val').html(result.totalItem);
                        document.getElementById("productpage-area-section").style.opacity = "0.5";
                        document.getElementById("cart-box").style.display = "block";
                        document.getElementById("mob-cart-box").style.display = "block";
                        // location.reload();
                    }
                }
            }
        });
    }

    //Mobile
    function add_to_cart_proceed_mobile(id) {
        $('#mobileLaniaFreeBagPackModalShow').modal('hide');
        jQuery('#add_to_cart_msg').html('');
        jQuery('#product_id').val(id);
        jQuery('#pqty').val(jQuery('#prd-qty').val());
        jQuery('#prod_updated_price').val(jQuery('#product-total-price').val());
        jQuery('#prod_base_price').val(jQuery('#product-base-price').val());
        jQuery('#ram_name').val(jQuery('#select_ram_name').val());
        jQuery('#ram_id').val(jQuery('#select_ram_id').val());
        jQuery('#ram_unit_price').val(jQuery('#select_ram_unit_price').val());
        jQuery('#ssd_name').val(jQuery('#select_ssd_name').val());
        jQuery('#ssd_id').val(jQuery('#select_ssd_id').val());
        jQuery('#ssd_unit_price').val(jQuery('#select_ssd_unit_price').val());
        jQuery('#bag_id').val(jQuery('#free_bag_id1').val());
        jQuery('#keyboard_id').val(jQuery('#select_keyboard_id1').val());
        jQuery('#keyboard_type').val(jQuery('#select_keyboard_type1').val());
        $("#add_to_cart_proceed_btn").attr('disabled', true);
        $("#add_to_cart_btn").attr('disabled', true);
        jQuery.ajax({
            url: '/add_to_cart',
            data: jQuery('#frmAddToCartLania').serialize(),
            type: 'post',
            success: function (result) {
                if (result.totalItem == 0) {
                    jQuery('#cart-menu').hide();
                    jQuery('#mob-cart-menu').hide();
                } else {
                    var cart_val = jQuery('#cart-val').html();
                    var mob_cart_val = jQuery('#mob-cart-val').html();
                    // alert(cart_val);
                    if (cart_val == undefined || mob_cart_val == undefined) {
                        var html =
                            '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                            result.totalItem + '</span></span>';
                        var html1 =
                            '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                            result.totalItem + '</span></span>';
                        jQuery('.shopping-cart-icon').html(html);
                        jQuery('.mob-shopping-cart-icon').html(html1);
                        document.getElementById("productpage-area-section").style.opacity = "0.5";
                        document.getElementById("cart-box").style.display = "block";
                        document.getElementById("mob-cart-box").style.display = "block";
                    } else {
                        jQuery('#cart-val').html(result.totalItem);
                        jQuery('#mob-cart-val').html(result.totalItem);
                        document.getElementById("productpage-area-section").style.opacity = "0.5";
                        document.getElementById("cart-box").style.display = "block";
                        document.getElementById("mob-cart-box").style.display = "block";
                        // location.reload();
                    }
                }
            }
        });
    }

    function backToBag() {
        document.getElementById('mobile-lania-keyboard-modal').style.display = 'none';
        document.getElementById('mobile-lania-bag-modal').style.display = 'block';
    }



    function addWishlist(id) {
        jQuery('#prod_id').val(id);
        jQuery('#p_qty').val(jQuery('#prd-qty').val());
        jQuery('#ramId').val(jQuery('#select_ram_id').val());
        jQuery('#ramName').val(jQuery('#select_ram_name').val());
        jQuery('#ram_price').val(jQuery('#select_ram_unit_price').val());
        jQuery('#ramQty').val(jQuery('#prd-qty').val());
        jQuery('#ssdId').val(jQuery('#select_ssd_id').val());
        jQuery('#ssdName').val(jQuery('#select_ssd_name').val());
        jQuery('#ssd_price').val(jQuery('#select_ssd_unit_price').val());
        jQuery('#ssdQty').val(jQuery('#prd-qty').val());
        var data = jQuery('#frmAddToWishlist').serialize();
        // toastr.options = {
        //     "closeButton": true,
        //     "newestOnTop": true,
        //     "progressBar": true,
        //     "timeOut": "1000",
        //     "positionClass": "toast-top-right"
        // };
        jQuery.ajax({
            url: '/add_to_wishlist',
            data: data,
            type: 'post',
            success: function (result) {
                if (result.type == 'success') {

                    location.reload();
                }
                // toastr.success(result.msg);
            }
        });
    }

    function removeWishlist(pid) {
        // toastr.options = {
        //     "closeButton": true,
        //     "newestOnTop": true,
        //     "progressBar": true,
        //     "timeOut": "1000",
        //     "positionClass": "toast-top-right"
        // };
        jQuery.ajax({
            url: '/remove_from_wishlist',
            data: 'product_id=' + pid + '&_token=' + jQuery("[name='_token']").val(),
            type: 'post',
            success: function (result) {
                if (result.type == 'success') {

                    location.reload();
                }
                // toastr.success(result.msg);
            }
        });
    }

    function wishlistModal() {
        $('#wishlistModalShow').modal('show');
    }

    function wishlistModalSignIn() {
        window.location.href = "{{route('signin')}}";
    }

    //RAM Change function
    function ramChangeTo8GB(ramId, ramPrice) {
        let btn_ram_8 = document.getElementById('ram-8gb-btn');
        let btn_ram_16 = document.getElementById('ram-16gb-btn');
        let btn_ram_32 = document.getElementById('ram-32gb-btn');
        btn_ram_8.classList.add('active-btn');
        if (btn_ram_16) {
            btn_ram_16.classList.remove('active-btn');
        }
        if (btn_ram_32) {
            btn_ram_32.classList.remove('active-btn');
        }

        document.getElementById('select_ram_name').value = "8 GB";
        document.getElementById('select_ram_id').value = ramId;
        document.getElementById('select_ram_unit_price').value = parseInt(ramPrice);
        document.getElementById('select-ram-number').innerHTML = "8";

        //price calculation
        document.getElementById('product-ram-price').value = parseInt(ramPrice);

        let base_price = parseInt(document.getElementById('product-base-price').value);
        let ram_price = parseInt(document.getElementById('product-ram-price').value);
        let ssd_price = parseInt(document.getElementById('product-ssd-price').value);

        let total_price = base_price + ram_price + ssd_price;

        //price update
        document.getElementById('product-total-price').value = total_price;
        let display_price = total_price.toLocaleString('en-US');
        jQuery('#product-updated-price').html('৳' + display_price);
    }
    //    id = product-updated-price
    //    id = product-total-price
    function ramChangeTo16GB(ramId, ramPrice) {
        let btn_ram_8 = document.getElementById('ram-8gb-btn');
        let btn_ram_16 = document.getElementById('ram-16gb-btn');
        let btn_ram_32 = document.getElementById('ram-32gb-btn');
        btn_ram_16.classList.add('active-btn');
        if (btn_ram_8) {
            btn_ram_8.classList.remove('active-btn');
        }
        if (btn_ram_32) {
            btn_ram_32.classList.remove('active-btn');
        }

        document.getElementById('select_ram_name').value = "16 GB";
        document.getElementById('select_ram_id').value = ramId;
        document.getElementById('select_ram_unit_price').value = parseInt(ramPrice);

        document.getElementById('select-ram-number').innerHTML = "16";

        //price calculation
        document.getElementById('product-ram-price').value = parseInt(ramPrice);

        let base_price = parseInt(document.getElementById('product-base-price').value);
        let ram_price = parseInt(document.getElementById('product-ram-price').value);
        let ssd_price = parseInt(document.getElementById('product-ssd-price').value);

        let total_price = base_price + ram_price + ssd_price;

        //price update
        document.getElementById('product-total-price').value = total_price;
        let display_price = total_price.toLocaleString('en-US');
        jQuery('#product-updated-price').html('৳' + display_price);


    }

    function ramChangeTo32GB(ramId, ramPrice) {
        let btn_ram_8 = document.getElementById('ram-8gb-btn');
        let btn_ram_16 = document.getElementById('ram-16gb-btn');
        let btn_ram_32 = document.getElementById('ram-32gb-btn');
        btn_ram_32.classList.add('active-btn');
        if (btn_ram_8) {
            btn_ram_8.classList.remove('active-btn');
        }
        if (btn_ram_16) {
            btn_ram_16.classList.remove('active-btn');
        }

        document.getElementById('select_ram_name').value = "32 GB";
        document.getElementById('select_ram_id').value = ramId;
        document.getElementById('select_ram_unit_price').value = parseInt(ramPrice);

        document.getElementById('select-ram-number').innerHTML = "32";

        //price calculation
        document.getElementById('product-ram-price').value = parseInt(ramPrice);

        let base_price = parseInt(document.getElementById('product-base-price').value);
        let ram_price = parseInt(document.getElementById('product-ram-price').value);
        let ssd_price = parseInt(document.getElementById('product-ssd-price').value);

        let total_price = base_price + ram_price + ssd_price;

        //price update
        document.getElementById('product-total-price').value = total_price;
        let display_price = total_price.toLocaleString('en-US');
        jQuery('#product-updated-price').html('৳' + display_price);
    }
    //RAM Change function end

    //SSD Change function start
    function ssdChangeTo128GB(ssdId, ssdPrice) {
        let btn_ssd_128 = document.getElementById('ssd-128gb-btn');
        let btn_ssd_512 = document.getElementById('ssd-512gb-btn');
        let btn_ssd_1tb = document.getElementById('ssd-1tb-btn');
        btn_ssd_128.classList.add('active-btn');
        if (btn_ssd_512) {
            btn_ssd_512.classList.remove('active-btn');
        }
        if (btn_ssd_1tb) {
            btn_ssd_1tb.classList.remove('active-btn');
        }

        document.getElementById('select_ssd_name').value = "128 GB";
        document.getElementById('select_ssd_id').value = ssdId;
        document.getElementById('select_ssd_unit_price').value = parseInt(ssdPrice);

        document.getElementById('select-ssd-number').innerHTML = "128 GB";

        //price calculation
        document.getElementById('product-ssd-price').value = parseInt(ssdPrice);

        let base_price = parseInt(document.getElementById('product-base-price').value);
        let ram_price = parseInt(document.getElementById('product-ram-price').value);
        let ssd_price = parseInt(document.getElementById('product-ssd-price').value);

        let total_price = base_price + ram_price + ssd_price;

        //price update
        document.getElementById('product-total-price').value = total_price;
        let display_price = total_price.toLocaleString('en-US');
        jQuery('#product-updated-price').html('৳' + display_price);

    }

    function ssdChangeTo512GB(ssdId, ssdPrice) {
        let btn_ssd_128 = document.getElementById('ssd-128gb-btn');
        let btn_ssd_512 = document.getElementById('ssd-512gb-btn');
        let btn_ssd_1tb = document.getElementById('ssd-1tb-btn');
        btn_ssd_512.classList.add('active-btn');
        if (btn_ssd_128) {
            btn_ssd_128.classList.remove('active-btn');
        }
        if (btn_ssd_1tb) {
            btn_ssd_1tb.classList.remove('active-btn');
        }

        document.getElementById('select_ssd_name').value = "512 GB";
        document.getElementById('select_ssd_id').value = ssdId;
        document.getElementById('select_ssd_unit_price').value = parseInt(ssdPrice);

        document.getElementById('select-ssd-number').innerHTML = "512 GB";

        //price calculation
        document.getElementById('product-ssd-price').value = parseInt(ssdPrice);

        let base_price = parseInt(document.getElementById('product-base-price').value);
        let ram_price = parseInt(document.getElementById('product-ram-price').value);
        let ssd_price = parseInt(document.getElementById('product-ssd-price').value);

        let total_price = base_price + ram_price + ssd_price;

        //price update
        document.getElementById('product-total-price').value = total_price;
        let display_price = total_price.toLocaleString('en-US');
        jQuery('#product-updated-price').html('৳' + display_price);
    }

    function ssdChangeTo1TB(ssdId, ssdPrice) {
        let btn_ssd_128 = document.getElementById('ssd-128gb-btn');
        let btn_ssd_512 = document.getElementById('ssd-512gb-btn');
        let btn_ssd_1tb = document.getElementById('ssd-1tb-btn');
        btn_ssd_1tb.classList.add('active-btn');
        if (btn_ssd_512) {
            btn_ssd_512.classList.remove('active-btn');
        }
        if (btn_ssd_128) {
            btn_ssd_128.classList.remove('active-btn');
        }

        document.getElementById('select_ssd_name').value = "1 TB";
        document.getElementById('select_ssd_id').value = ssdId;
        document.getElementById('select_ssd_unit_price').value = parseInt(ssdPrice);

        document.getElementById('select-ssd-number').innerHTML = "1 TB";

        //price calculation
        document.getElementById('product-ssd-price').value = parseInt(ssdPrice);

        let base_price = parseInt(document.getElementById('product-base-price').value);
        let ram_price = parseInt(document.getElementById('product-ram-price').value);
        let ssd_price = parseInt(document.getElementById('product-ssd-price').value);

        let total_price = base_price + ram_price + ssd_price;

        //price update
        document.getElementById('product-total-price').value = total_price;
        let display_price = total_price.toLocaleString('en-US');
        jQuery('#product-updated-price').html('৳' + display_price);
    }
    //SSD Change function end

    function add_to_cart() {
        $('#laniaFreeBagPackModalShow').modal('show');
    }

    function add_to_cart_mobile() {
        $('#mobileLaniaFreeBagPackModalShow').modal('show');
    }

    function continueToKeyboardModal() {
        document.getElementById('mobile-lania-bag-modal').style.display = 'none';
        document.getElementById('mobile-lania-keyboard-modal').style.display = 'block';
    }


    function laniaPreOrderModal() {
        $('#lania_pre_order_modal').modal('show');
        $("#laniaPreOrderFrm").trigger('reset');
        $("#pre_order_request").css("display", "block");
        $("#pre_order_request_success").css("display", "none");
    }

    

</script>

<!-- Modal for signin to add wishlist -->
<div class="modal fade" id="wishlistModalShow" tabindex="-1" role="dialog"
    aria-labelledby="wishlistModalShow_modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="place-content: center;" role="document">
        <div class="modal-content" style="background-color: #272727; border-radius: 20px;width:auto;">
            <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center">
                <div class="success_circle">
                    <img style="padding-top: 30px;padding-left: 0.1vw;padding-bottom: 30px;" src="{{ asset('error_icon.png') }}"
                        alt="error" />
                </div>
                <p class="email-subscribe-success-modal-heading" style="margin-bottom: 0.1vw;" id="subscribe-error">Need
                    to sign in for add wishlist</p>
                <button type="button" class="modal-continue-btn" style="margin-bottom: -0.6vw;"
                    onclick="wishlistModalSignIn()">Sign in</button>
            </div>
        </div>
    </div>
</div>

@endsection
