@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
<style>
    label {
        display: inline-block;
        width: 100%;
    }

    .product-info-checkout-processing {
        font-size: 16px;
        /* padding-bottom: 8px; */
        line-height: 21px;
        font-weight: 300;
    }

    .product-info-checkout-details {
        font-size: 16px;
        /* padding-bottom: 8px; */
        line-height: 21px;
        font-weight: 300;
    }

    .order-details1 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        width: 458px;
    }

    .order-details1 p {

        padding-bottom: 0px;
        margin-bottom: 0px;
    }

    .order-details1 h1 {

        font-size: 16px;
        /* padding-bottom: 8px; */
        line-height: 21px;
        font-weight: 300;
    }

    .btn {
        /* padding: 2.2000000000000455px 7px; */
        padding: 0px;
    }

    i.fa-solid.fa-angle-right {
        padding: 0px 4px;
        font-size: 13px;
        color: #505050;
    }

    .continue-button1 {
        width: 180px;
        height: 51px;
        /* margin-top: -10px !important; */
        /* margin-bottom: -234px; */
        /* margin-right: 19px; */
        padding: 14px 6px;
        border-radius: 30px;
        color: #fff;
        background-color: #1486f8;
        outline: none;
        border: none;
        left: 17px;
        margin-top: 11px !important;
        position: relative;
        display: none;
    }

    .hr {
        width: 263px;
        position: relative;
        right: 232px;


    }

    /* Drawer Start */
    menu menu span {
        display: block;
    }

    .text-logo-checkout {
        display: flex;
        /* width: fit-content; */
        flex-direction: column;
        align-content: flex-start;
        /* justify-content: space-between; */
    }

    .text-logo-checkout img {
        margin-top: 0.6vw;
        width: 5vh;
        height: 5vh;
        padding: 0.5vh 0.5vh;
    }

    .text-logo-checkout h1 {
        /* font-size: 20px;
        transform: rotate(270deg);
        width: 159px;
        font-weight: 300;
        height: 10px;
        margin-top: 106px;
        margin-left: -56px;
        line-height: 20px;
        font-family: Roboto; */
        font-size: 20px;
        transform: rotate(270deg);
        width: 159px;
        font-weight: 300;
        height: 0px;
        margin-top: 77px;
        margin-left: -62px;
        line-height: 20px;
        font-family: Roboto;
    }

    .menuTitel-checkout {
        display: flex;
        height: 8vh;
        top: -31px;
        border: #252525 1px solid;
        position: relative;
        width: 14.6vw;
        justify-content: center;
        align-items: center;
        background-color: #2d2d2d;
        border-radius: 12px 12px 0px 0px;
    }

    .menuitem-checkout {
        /* display: flex;
        width: 100%;
        padding: 0px 20px;
        margin-bottom: 20px;
        height: 100%;
        background-color: #f6f6f6;
        flex-direction: row;
        align-items: center;
        border-radius: 10px;
        color: black; */
        display: flex;
        width: 100%;
        margin-bottom: 20px;
        height: 100%;
        background-color: #f6f6f6;
        flex-direction: row;
        align-items: center;
        border-radius: 10px;
        color: black;
    }

    .menuitem-checkout i {
        font-size: 1.7vh;
    }

    /* 
    .menu-checkout {
        max-height: 70vh;
        overflow: auto;
    } */

    .left-menu-checkout-item {
        padding-left: 20px;
        font-weight: bold;
        color: rgb(255, 255, 255);
        font-family: Geometria;
        font-size: 1.7vh;
    }

    .menuTitel-checkout img {
        padding: 5px;
        width: 40px;
        height: 40px;
    }

    h1.heading-checkout {
        text-align: center;
    }

    /* input[type="checkbox"],
    input[type="reset"] {
        display: none !important;
    } */
    input#left-menu-checkout,
    input#left-menu-checkout-reset {
        display: none !important;
    }


    .nav span {
        cursor: default;
    }

    .nav,
    .nav .nav {
        /* height: 658.6px; */
        padding-top: 30px;
        position: absolute;
        top: 168px;
        transition: transform 0.8s ease-in-out;
        width: 328px;
        z-index: 9;
        border-radius: 12px;
    }

    .nav.left-navigation-checkout,
    .nav.left-navigation-checkout nav {
        /* background: #252525; */
        background-color: #f6f6f6;
        color: white;
        left: 0;
        transform: translate(-333px);
        box-shadow: 2px -1px 6px 0px #e4e2e291;
        /* box-shadow: 5px 2px 6px 0px #e2e2e2; */
        /* color: white;
        right: 0;
        transform: translateX(333px);
        box-shadow: -5px 1px 6px 0px #e2e2e2; */
    }

    .nav label {
        cursor: pointer;
        font-weight: normal;
        margin: 0;
    }

    .nav label:focus {
        outline: none;
    }

    .nav label.menu-toggle-checkout {
        display: block;
        height: 5.9vh;
        line-height: 0;
        padding: 0;
        /* top: 33vh; */
        position: absolute;
        /* text-indent: -99vh; */
        width: 67px;
        border-radius: 0 0 0 15px;
    }

    .nav label.menu-text-checkout {
        display: block;
        height: 200px;
        line-height: 0;
        padding: 0;
        top: 1px;
        position: absolute;
        width: 60px;
        border-radius: 0px 15px 15px 0px;
    }

    .nav.left-navigation-checkout label.menu-toggle-checkout {
        background: #25252500;
        left: -65px;
    }

    .nav.left-navigation-checkout label.menu-text-checkout {
        /* height: 246px;
        background: #f6f6f6;
        left: -60px;
        color: black;
        box-shadow: -5px 1px 6px 0px #e2e2e2; */
        height: 204px;
        background: #f6f6f6;
        left: 333px;
        color: black;
        box-shadow: 3px 0px 6px 0px #e4e2e291;
    }

    nav.left-navigation-checkout label.menu-text-checkout>h1 {
        height: 20px;
        color: #f7f7f7;
    }

    .nav label.menu-toggle-checkout>span:after,
    .nav label.menu-toggle-checkout>span:before {
        background: #000000;
        display: block;
        height: 9px;
        /* top: 120px;
        left: 20px; */
        top: 68px;
        left: 351px;
        pointer-events: none;
        transition: transform 0.4s ease-in-out, background-color 0.4s ease-in-out 0s;
        width: 0.9px;
        border-radius: 11.148px;
    }

    .nav label.menu-toggle-checkout>span {
        display: block;
        margin-left: 1vh;
        margin-top: 50%;
        position: relative;
    }

    .nav label.menu-toggle-checkout>span:after,
    .nav label.menu-toggle-checkout>span:before {
        content: "";
        position: absolute;
        transform: rotate(0) translateY(0);
    }

    .nav label.menu-toggle-checkout>span:after {
        /* transform: rotate(135deg) translateY(-10.574px) translateX(4px); */
        transform: rotate(135deg) translateY(-9.573999999999998px) translateX(2px);
    }

    .nav label.menu-toggle-checkout>span:before {
        /* transform: rotate(234deg) translateY(1.4000000000000004px) translateX(-6.14px); */
        transform: rotate(234deg) translateY(-3.6000000000000014px) translateX(-14.14px);
    }

    .nav label.menu-toggle-checkout {
        margin-top: -4px;
    }

    .nav menu {
        margin: 0;
        padding-bottom: 2vh;
    }

    .nav nav label.menu-toggle-checkout,
    .nav nav label.menu-toggle-checkout>span,
    .nav nav label.menu-toggle-checkout>span:after,
    .nav nav label.menu-toggle-checkout>span:before {
        background: none !important;
    }

    input[type="checkbox"]:checked~.nav {
        transform: translateX(0);
    }

    input[type="checkbox"]:checked~.nav label.menu-toggle-checkout>span:after,
    input[type="checkbox"]:checked~.nav label.menu-toggle-checkout>span:before {
        width: 1px;
        margin-left: 5px;
    }

    input[type="checkbox"]:checked~.nav.left-navigation-checkout label.menu-toggle-checkout>span:after {
        /* transform: rotate(-45deg) translateY(-4px) translateX(4px); */
        /* transform: rotate(-45deg) translateY(2px) translateX(-2px); */
        transform: rotate(-45deg) translateY(10px) translateX(-12px);
    }

    input[type="checkbox"]:checked~.nav.left-navigation-checkout label.menu-toggle-checkout>span:before {
        /* transform: rotate(45deg) translateY(4px) translateX(4px); */
        /* transform: rotate(45deg) translateY(6px) translateX(6px); */
        transform: rotate(45deg) translateY(7px) translateX(6px);
    }

    main {
        margin: 0 1.4vw;
    }

    .introduction {
        background: #f7f7f7;
        border-radius: 0.5em;
        box-shadow: 0 0.5em 0.5em 0 rgba(153, 153, 153, 1);
        padding: 2em;
    }

    /* Drawer End */

    .your_product {
        font-weight: 500;
        font-size: 16px !important;
        text-align: center;
        padding: 2.1875vw 0vw 0.46875vw;
    }

    .your_product-img {
        width: 100%;
        text-align: center;
        padding-bottom: 1.302vw;
    }

    .same-as {
        padding-left: 0.208vw;
    }

    input#same_as {
        position: relative;
        width: 25px;
        height: 20px;
        top: 4px;

    }

    .billing-top {
        margin-left: 0.62vw;
        display: flex;
        flex-direction: row;
        /* justify-content: space-between; */
        align-content: center;
        align-items: center;
        gap: 8.22vw;
    }

    img.cash-img {
        width: 139px;
        /* padding-top: 2.5vw; */
    }

    .cash-on-img {
        width: 100%;
        text-align: center;
    }

    p.cash-text {
        padding: 1vw 5vw;
        font-weight: 500;
    }

    /* checkout processing start*/
    .shipping-body,
    .billing-body,
    .payment-body {
        padding: 0px 53px;
        margin-top: 38px;
    }

    ::-webkit-scrollbar {
        width: 0px;
        background: transparent;

    }

    /* checkout processing end*/
    .checkout-title {
        /* width: 100%; */
        display: flex;
        align-items: center;
    }

    .checkout-title-h1 {
        /* width: 65%;
        padding-left: 24vw; */
        font-weight: 600;
        font-size: 22px;
        line-height: 29px;
        color: #272727;
        margin-right: 251px;
        padding-right: 252px;
    }

    .checkout-title-stapper {
        /* width: 35%; */
        padding-top: 10px;
        font-size: 16px;
        /* margin-left: 2.9vw; */
        display: inline-flex;
    }

    /* .checkout-title-stapper .staper-span {
        color: rgb(0, 0, 0);
        border-radius: 50%;
        border: 1px solid rgb(72, 72, 72);
        background-color: #3e3e3e00;
        padding: 5px 8px;
        margin: 0vw 0.26vw 0vw 0.67vw;
        font-size: 0.7rem;
    } */

    .order-details-p {
        display: flex;
    }

    .gross-total h1 {
        font-size: 1.2rem;
    }

    .order-group {
        /* width: 100%;
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        margin-left: -0.2vw;
        padding: 0vw 0vw 0.5vw; */
        /* width: 100%;
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        padding: 0px 0px 10px;
        height: 51px; */
        position: relative;
        display: grid;
        width: 273px;
        grid-template-columns: repeat(2, 1fr);
        padding: 0px 0px 10px;
        margin: 5px 0px;
    }

    .order-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
        width: 100%;
        height: 51px;
        border-radius: 30px;
        /* border-top-left-radius: 30px; */
        /* border-bottom-left-radius: 30px; */
        /* background-color: #0071E3; */
    }

    .order-group .form-control:focus {
        border-color: rgba(100, 100, 100, 1) !important;
        -webkit-box-shadow: none !important;
        -moz-box-shadow: none !important;
        box-shadow: none !important;
    }

    .order-group .btn:focus {
        border-color: rgba(100, 100, 100, 0) !important;
        -webkit-box-shadow: none !important;
        -moz-box-shadow: none !important;
        box-shadow: none !important;
    }

    .order-group-btn {
        /* padding: 0px 10px; */
        /* border-radius: 30px; */
        /* border-top-right-radius: 30px; */
        /* border-bottom-right-radius: 30px; */
        margin-left: 0px !important;
    }

    .checkout-page {

        width: 100%;
        display: flex;
        flex-direction: row;
        place-content: center;
        /* flex-wrap: wrap; */
        margin-left: 77px;
        overflow-x: hidden;
    }

    .product-info-title {
        padding: 0vw 0vw 0.5vw;
    }

    .product-info-title h1 {
        color: #202020;
        font-size: 16px
    }



    /* .product-info {
        background-color: white;
        width: 35%;
        padding: 2.5vw;

    } */
    .product-info {
        /* background-color: white;
        width: 35%;
        padding: 10.3vw 10vw 0vw 2vw; */
        background-color: white;
        /* width: 40%; */
        padding: 34px 0px 0px 27px;
        box-shadow: -9px 0px 13px 0px #bdbbbb40 !important;
    }


    /* .sign-up-checkout {
        width: 65%;
        max-height: 37vw;
        min-height: 37vw;
        padding: 0vw 2vw;
        margin: -2.5vw 0vw -1.5vw;
        overflow: scroll;
    } */

    .sign-up-checkout {
        /* width: 65%;
        max-height: 51vw; */
        /* min-height: 371px; */
        /* padding: 0vw 2vw;
        margin: -7.3vw 0vw 0vw; */
        height: 763px;
        overflow-x: hidden !important;
        overflow: overlay;
        display: flex;
        flex-direction: column;
    }

    .checkout-top-last {
        place-content: center;
        color: #000000;
        /* padding-top: 1.04vw; */
        background-color: #ffffff;
        font-family: "Roboto", sans-serif;
        position: sticky;
        height: 60px;
        z-index: 3;
        top: 56px;
        display: flex;
        align-items: center;
        border-bottom: 0.052083333333333336vw solid #f2f2f2;
    }

    .checkout-processing-area {
        overflow: hidden;
        background-color: #fff;
        margin-top: -143.4px;
        /* padding-top: 35px; */
    }


    .checkout-processing-area .signin-form {
        /* width: 41.5vw;
        min-height: 31vw;
        max-height: 31vw;
        margin: 0 auto;
        box-shadow: -1px 0px 16px 0px #70707040 !important;
        border-radius: 30px;
        margin-top: 4.640000000000001vw;
        margin-bottom: 3.125vw;
        font-family: "Roboto", sans-serif; */
        width: 640px;
        margin: 0 auto;
        box-shadow: -1px 0px 16px 0px #bebaba40 !important;
        /* box-shadow: -1px 0px 16px 0px #70707040 !important; */
        border-radius: 30px;
        margin-top: 24px;
        margin-bottom: 28px;
        margin-right: 26px;
        height: 569px;
        font-family: "Roboto", sans-serif;
    }

    .checkout-processing-area .signin-form p {
        font-size: 16px;

    }

    .checkout-processing-area .signin-form a {
        text-decoration: none;
        font-size: 18px;
        font-weight: 500;
        color: #2699fb;
    }

    .checkout-title-stapper .staper-span {
        color: white;
        border-radius: 1.04vw;
        background-color: #1486F9;
        padding: 0.20vw 1vw;
        /* margin: 0vw 0.26vw 0vw 0.67vw; */
        font-size: 0.7rem;
        border: none;
    }

    .checkout-processing-area .signin-form .form-control,
    .form-select {
        margin-bottom: 38px;
        outline: 0;
        border-width: 0 0 0px;
        /* border-color: #a1a1a6; */
        font-size: 16px;
        opacity: 100%;
        background-color: #E1E1E1;
        outline: none;
        height: 55px;
        border-radius: 8px;
    }


    .form-select:focus {
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline: 0;
    }

    .payment-radio {
        margin-bottom: 20px;
        outline: 0;
        /* border-width: 0 0 1px; */
        border-color: #a1a1a6;
        opacity: 50%;
        background-color: #E1E1E1;
        outline: none;
        height: 2.9vw;
        border-radius: 8px;
    }

    .checkout-processing-area .signin-form form .form-control:focus {
        border-color: green;
    }

    .checkout-processing-area .signin-form form .form-control:last-child {
        margin-bottom: 25px;
    }

    .checkout-processing-area .signin-form form .signin-button {
        margin-top: 25px;
        margin-bottom: 30px;
        padding: 5px 30px;
        border-radius: 30px;
        font-size: 20px;
        font-weight: 300;
        background-color: #4ba1ec;
    }

    .checkout-processing-area .signin-form form .signin-button:hover {
        font-weight: 400;
        background-color: #2692f0;
    }

    .checkout-processing-area .signin-form form .forget-password {
        cursor: pointer;
    }

    .checkout-processing-area .signin-social-button {
        margin: 0 auto;
        margin-bottom: 60px;
        width: 600px;
    }

    .checkout-processing-area .signin-social-button .signin-google-button {
        padding: 15px 20px;
        border-radius: 50px;
        background-color: #2699fb;
        color: #fff;
        font-size: 18px;
        text-align: center;
        width: 260px;
    }

    .checkout-processing-area .signin-social-button .signin-google-button img {
        padding-right: 10px;
    }

    .checkout-processing-area .signin-social-button .signin-facebook-button {
        padding: 15px 20px;
        border-radius: 50px;
        background-color: #3b5998;
        color: #fff;
        font-size: 18px;
        text-align: center;
        width: 275px;
    }

    .checkout-processing-area .signin-social-button .signin-facebook-button img {
        padding-right: 10px;
    }

    .continue-button {
        /* width: 175px;
        margin-top: 2.08vw;
        margin-bottom: 2.08vw;
        margin-left: 0.11vw;
        padding: 0.92vw 0.57vw;
        border-radius: 1.9vw;
        color: #fff;
        background-color: #1486f8;
        outline: none;
        border: none; */
        width: 175px;
        height: 51px;
        margin-top: 6px !important;
        margin-bottom: 20px;
        margin-left: 2px;
        padding: 9px 6px;
        border-radius: 30px;
        color: #fff;
        background-color: #1486f8;
        outline: none;
        border: none;
    }

    .continue-button:hover {
        color: #fff;
        background-color: #0071E3;

    }

    #shipping_flat_err_field {
        display: none;
    }

    #shipping_thana_err_field {
        display: none;
    }

    #shipping_district_err_field {
        display: none;
    }

    #shipping_division_err_field {
        display: none;
    }

    #billing_flat_err_field {
        display: none;
    }

    #billing_thana_err_field {
        display: none;
    }

    #billing_district_err_field {
        display: none;
    }

    #billing_division_err_field {
        display: none;
    }

    #Billing {
        display: none;
    }

    #Payment {
        display: none;
    }

    #toggle-mobile-form {
        display: none;
    }

    #toggle-credit-form {
        display: none;
    }

    #order-placed {
        display: none;
    }

    #process-btn-section {
        display: none;
    }

    #process-btn-section1 {
        display: none;
    }

    .btn.focus,
    .btn:focus {
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline: 0;
    }


    #coupon_code_correct_msg_area {
        display: none;
    }

    #coupon_code_err_msg_area {
        display: none;
    }

    #coupon_code_correct_msg_area1 {
        display: none;
    }

    #coupon_code_err_msg_area1 {
        display: none;
    }

    div#Shipping,
    div#Billing,
    div#Payment,
    div#order-placed {
        padding-top: 140px !important;
        padding-left: 20px;
    }

    .product-area {
        padding-top: 140px !important;
        padding-left: 0px;
    }

    .validation-css {
        margin-top: -35px;
        margin-left: 241px;
        /* margin-left: 95px; */
        position: absolute;
    }

    .validation-checkout {
        position: relative;
    }

    /* span#shipping_division_err_msg_area {
        margin-left: 15.55vw;
        position: absolute;
        margin-top: -3.03vw;
    } */

    .spinner-border {
        height: 20px;
        width: 20px;
    }

    .apply-coupon-btn {
        width: 120px !important;
        height: 51px;
        margin-left: -35px;
        padding: 10px 38px;
        border-radius: 25px !important;
        color: #272727;
        background-color: #fff;
        outline: none;
        border: 1px solid #CCCCCC;
        cursor: pointer;
        font-size: 16px;
        font-weight: 400;
    }

    .apply-coupon-btn:hover {
        background-color: #E1E1E1 !important;
        color: #000000 !important;
        border: none;
    }

    #coupon_code:focus~span #coupon-apply-btn {
        background: #E1E1E1 !important;
        color: #000000;
        border: none;
    }

    #coupon-remove-btn {
        display: none;
    }

    .remove-coupon-btn {
        width: 120px !important;
        height: 51px !important;
        margin-left: -35px;
        padding: 10px 35px;
        border-radius: 25px !important;
        color: #fff;
        background-color: #707070;
        font-size: 16px;
        font-weight: 400;
        outline: none;
        border: none;
        cursor: pointer;
    }

    .remove-coupon-btn:hover {
        color: #fff;
        background-color: #707070;
    }


    #coupon_code1:focus~span #coupon-apply-btn1 {
        background: #E1E1E1 !important;
        color: #000000;
        border: none;
    }

    #coupon-remove-btn1 {
        display: none;
    }

    @media (max-width: 480px) {
        .checkout-processing-area {
            margin-top: -161.4px;
        }

        div#Shipping,
        div#Billing,
        div#Payment,
        div#order-placed {
            padding-top: 148px !important;
            padding-left: 20px;
        }

        .checkout-top-last {
            height: 97px;
            top: 66px;
        }

        .checkout-title {
            display: flex;
            align-items: center;
            flex-direction: column;
            padding-top: 19px;
        }

        .sign-up-checkout {
            height: 803px;
        }

        .continue-button {
            margin-top: 20px !important;
        }

        .mb-4 {
            margin-bottom: 0px !important;
        }

        .checkout-processing-area .signin-form .form-control,
        .form-select {
            margin-left: 0px !important;
        }

        .checkout-page {
            margin-left: 0px;
        }

        .order-details1 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            width: 300px;
        }

        .validation-css {
            /* margin-top: 0px;
            margin-left: 95px;
            position: absolute; */
            margin-top: -8px;
            margin-left: 1px;
            position: absolute;
        }

        span#shipping_division_err_msg_area,
        span#billing_division_err_msg_area {
            margin-top: -17px;
            margin-left: 4px;
        }

        .continue-button1 {
            display: block;
        }

        .apply-coupon-btn {
            width: 104px !important;
            margin-left: -43px;
            padding: 10px 34px;
            border-radius: 25px !important;

        }

        .remove-coupon-btn {
            width: 104px !important;
            margin-left: -43px;
            padding: 10px 25px;
            border-radius: 25px !important;
        }

        .checkout-title-h1 {
            margin-right: -9px;
            padding-right: 5px;
        }

        .checkout-processing-area .signin-form {
            /* max-width: 351px;
            margin-right: 0px;
            height: auto !important; */
            /* max-width: 351px !important; */
            /* margin-right: 0px !important; */
            width: auto;
            min-height: 504px;
            height: auto;
        }

        .shipping-body,
        .billing-body,
        .payment-body {
            padding: 0px 41px;
            margin-top: 14px;
        }

        .checkout-processing-area .signin-form .form-control,
        .form-select {
            margin-left: 0px !important;
            margin-bottom: 6px;
        }

        .nav,
        .nav .nav {
            /* height: 617px;
            padding-top: 30px;
            position: absolute;
            top: 128px;
            transition: transform 0.8s ease-in-out;
            width: 279px;
            z-index: 1;
            border-radius: 12px; */
            height: 617px;
            padding-top: 30px;
            position: absolute;
            /* top: 128px; */
            top: 165px;
            transition: transform 0.8s ease-in-out;
            width: 279px;
            z-index: 1;
            border-radius: 12px;
        }

        .nav.left-navigation-checkout,
        .nav.left-navigation-checkout nav {
            transform: translateX(-279px);

        }

        .nav label.menu-text-checkout {
            /* width: 58px; */
            width: 50px;
        }

        .nav.left-navigation-checkout label.menu-text-checkout {
            /* height: 215px; */
            /* left: -58px;
            box-shadow: -5px 1px 6px 0px #e2e2e2; */
            /* left: 273px; */
            height: 165px;
            left: 273px;
            box-shadow: 3px 1px 6px 0px #e2e2e2;
        }

        .text-logo-checkout h1 {
            height: 0px;
            font-size: 16px;
            width: 285px;
            position: relative;
            /* top: 49px; */
            top: -90px;
            right: 63px;
        }

        .product-area {
            width: 229px;
            padding-top: 0px !important;
            padding-left: 0px !important;
        }

        .order-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
            width: 121px;
            margin-right: 44px;
        }

        .test {
            width: auto !important;
            padding-right: calc(var(--bs-gutter-x) * .5) !important;
            padding-left: 0px !important;
        }

        .hr {
            width: 247px;
            position: relative;
            right: 0px;
        }

        .nav menu {
            padding-left: 11px;
        }

        div#process-btn-section1 {
            margin-top: 20px;
        }

    }

    .order-group {
        display: flex;
        flex-wrap: nowrap;
    }

    .order-group-btn {
        /* padding: 0px 10px; */
        /* border-radius: 30px; */
        /* border-top-right-radius: 30px; */
        /* border-bottom-right-radius: 30px; */
        margin-left: -30px;
    }

    @media (min-width: 481px) and (max-width: 820px) {
        .validation-css {
            margin-top: -13px;
            margin-left: 1px;
        }

        .checkout-processing-area .signin-form .form-control,
        .form-select {
            margin-bottom: 10px;
            margin-left: 0px !important;
            min-width: 247px;
        }


        .col-md-7 {
            width: 100% !important;
        }

        .sign-up-checkout {
            height: 840px;
        }

        .continue-button {
            margin-top: 20px !important;
        }

        .mb-4 {
            margin-bottom: 0px !important;
        }


        .checkout-processing-area .signin-form {
            width: 477px;
            margin-right: 17px;
            padding: 0px;
            height: 643px;
        }

        .order-details1 {
            width: 289px;
        }

        .checkout-page {
            margin-left: 0px;
        }

        .continue-button1 {
            display: block;
            margin-top: 83px !important;
        }

        .checkout-title-h1 {
            margin-right: 41px;
            padding-right: 72px;
        }

        .nav,
        .nav .nav {
            height: 616.6px;
            padding-top: 30px;
            position: absolute;
            /* top: 116px; */
            top: 128px;
            transition: transform 0.8s ease-in-out;
            width: 333px;
            z-index: 2;
            border-radius: 12px;
        }

        .test {
            width: auto !important;
            /* padding-right: calc(var(--bs-gutter-x) * .5) !important;
    padding-left: 0px !important; */
        }

        .product-area {
            padding-top: 0px !important;
            width: 317px
        }

        .hr {
            width: 468px;
            position: relative;
            /* right: 232px; */
        }

        .order-group-btn {
            /* padding: 0px 10px; */
            /* border-radius: 30px; */
            /* border-top-right-radius: 30px; */
            /* border-bottom-right-radius: 30px; */
            margin-left: -30px;
        }

        .nav label.menu-toggle-checkout>span:after,
        .nav label.menu-toggle-checkout>span:before {
            top: 101px;
            left: 411px;
        }

        .nav.left-navigation-checkout label.menu-text-checkout {
            left: 332px;
        }

        div#process-btn-section1 {
            margin-top: 20px;
        }
    }

    @media (min-width: 822px) and (max-width: 991px) {
        .product-area {
            padding-top: 0px !important;
            width: 317px;
        }

        .checkout-page {
            margin-left: 0px;
        }

        .checkout-title-h1 {

            margin-right: 25px;
            padding-right: 258px;
        }
    }

    @media screen and (min-width: 992px) and (max-width: 1199px) {
        .product-info {
            width: 344px;
        }

        .checkout-title-h1 {
            margin-right: 290px;
        }

        .checkout-page {
            width: 100%;
            display: flex;
            flex-direction: row;
            place-content: unset;
            margin-left: 1px;
            padding-left: 4px;
        }
    }

</style>

<!-- <Section class="qbits-top-middle">
    <div class="container">
        <div class="middle-qbits-menu">
            <div class="row">
                <div class="col-md-3">
                    <div class="middle-menu-li d-flex justify-content-start">
                        <a href="{{ route('driver')}}">Drivers & Manuals</a>
                    </div>
                </div>
                <div class="col-md-3">
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
                        <a>Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section>

<Section class="qbits-top-bottom">
    <div class="container">
        <div class="middle-qbits-menu">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-center align-baseliner">
                        <span class="me-2">We will offer 10% off. *</span><a href="#"
                            style="text-decoration: none">Click for code ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section> -->

<!-- <Section class="checkout-top-last">
    <div class="container">
        <div class="middle-qbits-menu">
            <div class="row">
                <div class="col-sm-4">
                    <div class="container d-flex justify-content-start align-baseliner"
                        style="width: 980px; margin: 0 auto;">
                        <span style="margin-left: -25px;font-weight: bold;">Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section> -->
<Section class="checkout-top-last">
    <div class="checkout-title">
        <div class="checkout-title-h1">
            <span>Checkout</span>
        </div>
        <div class="checkout-title-stapper" id="checkout-title-stapper">
            <button class="btn" style="outline: none;" onclick="shippingStaper()">
                <p> <span class="staper-span">1</span> Shipping<i class="fa-solid fa-angle-right"></i></p>
            </button>
            <button class="btn" style="outline: none;" id="billing-staper" disabled="true" onclick="billingStaper()">
                <p> <span class="staper-span" style="background-color: #a1a1a6;" id="billing-staper-span">2</span>
                    Billing<i class="fa-solid fa-angle-right"></i></p>
            </button>
            <button class="btn" style="outline: none;" id="payment-staper" disabled="true" onclick="paymentStaper()">
                <p> <span class="staper-span" style="background-color: #a1a1a6;" id="payment-staper-span">3</span>
                    Payment</p>
            </button>
        </div>
    </div>
</Section>
<!-- Drawer Start -->
<div class="checkout-drawer">
    <input id="left-menu-checkout" value="1" type="checkbox" />
    <input id="left-menu-checkout-reset" type="reset" />
    <div class="left-navigation-checkout nav">
        <!-- <div class="menuTitel-checkout">

        <h1 class="heading-checkout">Ecomclips</h1>
    </div> -->
        <main>
            <label class="menu-text-checkout" for="left-menu-checkout">
                <div class="text-logo-checkout">

                    <h1 id="left-menu-checkout-text menu-toggle-checkout" class="h1">Order Summary</h1>
                    <!-- <span>&nbsp;</span> -->
                </div>
            </label>

            <label class="menu-toggle-checkout" for="left-menu-checkout">
                <span></span>
            </label>
            <menu class="menu-checkout">
                <div class="menuitem-checkout">
                    <!-- <h1 class="left-menu-checkout-item"></h1> -->
                    @php
                    $total = 0;
                    $total_quantity = 0;
                    @endphp
                    @foreach (App\Models\Cart::totalCarts() as $cart)

                    @php

                    $total += $cart['total_price'];
                    $total_quantity += $cart['quantity']
                    @endphp
                    @endforeach
                    @php
                    $gross_total = $total;
                    @endphp
                    <div class="product-info-checkout1">
                        <div class="product-area">
                            <div class="product-info-title">
                                <h1>Order Summary</h1>
                            </div>
                            <div class="product-info-details">
                                <div class="order-details1">
                                    <h1 class=" product-info-checkout-processing">
                                        Subtotal item ( {{$total_quantity}} items )</h1>
                                    <h1 class="product-info-checkout-details">
                                        ৳{{number_format($total)}}</h1>
                                    <!-- <h1 class=" product-info-checkout-processing">
                                        Wireless keybord & mouse</h1>
                                    <h1 class="product-info-checkout-details">
                                        ৳{{number_format($total)}}</h1> -->

                                    <!-- Wireless keybord & mouse <span class="product-info-checkout-details">
                                        ৳{{number_format($total)}}</span> -->

                                </div>
                                <div class="order-group">
                                    <input type="text" class="form-control me-5" placeholder="Coupon Code"
                                        name="coupon_code" id="coupon_code1" style="">
                                    <span class="order-group-btn">
                                        <button class="btn apply-coupon-btn" type="button" onclick="applyCouponCode1()"
                                            id="coupon-apply-btn1" style="cursor: pointer;">Apply</button>
                                        <button class="btn remove-coupon-btn" type="button"
                                            onclick="removeCouponCode1('{{$total}}')" id="coupon-remove-btn1"
                                            style="cursor: pointer;">Remove</button>
                                    </span>
                                </div>
                                <p id="coupon_code_err_msg_area1" class="err_msg_color"><i
                                        class="fa fa-exclamation-triangle me-2"></i><span
                                        id="coupon_code_err_msg1"></span></p>
                                <p id="coupon_code_correct_msg_area1" class="correct_msg_color"><i
                                        class="fa-solid fa-circle-check me-2"></i><span
                                        id="coupon_code_correct_msg1"></span></p>
                                <div class="order-details1 " id="coupon_value_area1">
                                    <div class="">
                                        <p>Coupon Saving: </p>
                                    </div>
                                    <div class=" ">
                                        <p id="coupon_value1">৳0 </p>
                                    </div>
                                    <div class="">
                                        <p>Estimated Shipping: </p>
                                    </div>
                                    <div class=" ">
                                        <p>Free </p>

                                    </div>
                                </div>
                                <!-- <div class="row">
                                <div class="col-md-6">
                                    <p>Estimated Taxes: </p>
                                </div>
                                <div class="col-md-2 text-end">
                                    <p>৳1000</p>
                                </div>
                            </div> -->
                                <div class="row">
                                    <div class="col-md-9">
                                        <hr>
                                    </div>
                                </div>
                                <div class="order-details1">
                                    <div class="">
                                        <h1 style="font-weight: 500;">Gross Total</h1>
                                    </div>
                                    <div class="">
                                        <p style="font-weight: 500;" id="gross_total_amount1">
                                            ৳{{number_format($gross_total)}}</p>
                                    </div>
                                </div>
                                <div class="col text-start mb-2 " id="process-btn-section1">
                                    <button type="button" id="process-pay-btn1" class="btn continue-button"
                                        style="margin-top: 20px; width: 60%; margin-left: 0px;"
                                        onclick="processToPay()">Process
                                        to Pay</button>
                                </div>
                            </div>



                        </div>


                    </div>

                </div>
            </menu>
        </main>
    </div>
</div>
<form id="frmCheckout">
    @csrf
    @foreach (App\Models\Cart::totalCarts() as $cart)
    <input type="hidden" class="product_id" name="product_id[]" value="{{ $cart->product->id }}">
    <input type="hidden" class="quantity" name="quantity[]" value="{{ $cart->quantity }}">
    <input type="hidden" class="unit_price" name="unit_price[]" value="{{ $cart->unit_price }}">
    @endforeach
    <section class="checkout-processing-area">
        <div class="checkout-page">
            <div class=" sign-up-checkout">
                <div id="Shipping" class="row float-end">
                    <div class="col-sm-12">
                        <div class="signin-form" style="background-color: #fff;">
                            <p class="container mt-3 ms-3"
                                style="padding-top: 25px !important; font-weight: 500; font-size: 20px;">Shipping
                                Address
                            </p>
                            <hr style="color: #C8C8C8">
                            <div class="shipping-body" id="">

                                <div class="row  d-flex align-baseliner mb-4">
                                    <label for="shipping_division" class="col-sm-4 col-form-label">Division <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <select class=" ms-5  form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example" id="shipping_division"
                                            name="shipping_division">
                                            <option value="">Select Division</option>
                                            <option value="Barishal">Barishal</option>
                                            <option value="Chattogram">Chattogram</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Sylhet">Sylhet</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row validation-checkout" id="shipping_division_err_field">
                                    <span class="text-danger validation-css " id="shipping_division_err_msg_area"><i
                                            class="fa fa-exclamation-triangle "></i><span
                                            id="shipping_division_err_msg"></span></span>
                                </div>

                                <div class="row  d-flex align-baseliner mb-4">
                                    <label for="shipping_district" class="col-md-4 col-form-label">District <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <select class=" ms-5  form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example" id="shipping_district"
                                            name="shipping_district">
                                            <option value="">Select District </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row validation-checkout" id="shipping_district_err_field">
                                    <span class="text-danger validation-css " id="shipping_district_err_msg_area"><i
                                            class="fa fa-exclamation-triangle "></i><span
                                            id="shipping_district_err_msg"></span></span>
                                </div>

                                <div class="row  d-flex align-baseliner mb-4">
                                    <label for="shipping_thana" class="col-md-4 col-form-label">Thana <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <select class=" ms-5  form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example" id="shipping_thana"
                                            name="shipping_thana">
                                            <option value="">Select Thana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row validation-checkout" id="shipping_thana_err_field">
                                    <span class="text-danger validation-css " id="shipping_thana_err_msg_area"><i
                                            class="fa fa-exclamation-triangle me-2"></i><span
                                            id="shipping_thana_err_msg"></span></span>
                                </div>

                                <!-- <div class="row   align-baseliner">
                                    <label for="shipping_district" class="col-md-4 col-form-label">District <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <input class="form-control ms-5 border-0" name="shipping_district"
                                            id="shipping_district" type="text" placeholder="District">
                                    </div>
                                </div>
                                <div class="row validation-checkout" id="shipping_district_err_field">
                                    <span class="text-danger validation-css " id="shipping_district_err_msg_area"><i
                                            class="fa fa-exclamation-triangle "></i><span
                                            id="shipping_district_err_msg"></span></span>
                                </div> -->

                                <!-- <div class="row   align-baseliner">
                                    <label for="shipping_thana" class="col-md-4 col-form-label">Thana <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <input class="form-control ms-5 border-0" name="shipping_thana"
                                            id="shipping_thana" type="text" placeholder="Thana">
                                    </div>
                                </div>
                                <div class="row validation-checkout" id="shipping_thana_err_field">
                                    <span class="text-danger validation-css " id="shipping_thana_err_msg_area"><i
                                            class="fa fa-exclamation-triangle me-2"></i><span
                                            id="shipping_thana_err_msg"></span></span>
                                </div> -->

                                <div class="row mt-2  align-baseliner">
                                    <label for="shipping_flat" class="col-md-4 col-form-label">Flat/ Road/ Post Office
                                        <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input class="form-control ms-5 border-0" name="shipping_flat"
                                            id="shipping_flat" type="text" placeholder="Flat/Road/Post office">
                                    </div>
                                </div>
                                <div class="row validation-checkout" id="shipping_flat_err_field">
                                    <span class="text-danger validation-css " id="shipping_flat_err_msg_area"><i
                                            class="fa fa-exclamation-triangle me-2"></i><span
                                            id="shipping_flat_err_msg"></span></span>
                                </div>

                                <!-- <input type="checkbox"><span style="padding-left: 20px; font-size:18px;">Remember me</span> -->
                                <div class="col text-end mb-2">
                                    <button type="button" class="btn btn-primary continue-button"
                                        style="margin-top: 0px;" onclick="shippingSubmit()">Continue</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div id="Billing" class="row  float-end">
                    <div class="col-sm-12">
                        <div class="signin-form" style="background-color: #fff;">
                            <p class="container billing-top"
                                style="padding-top: 25px !important; font-weight: 500; font-size: 20px;">Billing Address
                                <span><input type="checkbox" onclick="sameShippingAs()" id="same_as"> <span
                                        class="same-as">Same As Shipping
                                        Address</span> </span>

                            </p>

                            <hr style="color: #C8C8C8">
                            <div class="billing-body" id="">

                                <div class="row  d-flex align-baseliner mb-4">
                                    <label for="billing_division" class="col-md-4 col-form-label">Division <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <select class=" ms-5  form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example" name="billing_division"
                                            id="billing_division">
                                            <option value="">Select Division</option>
                                            <option value="Barishal">Barishal</option>
                                            <option value="Chattogram">Chattogram</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Sylhet">Sylhet</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row validation-checkout" style="" id="billing_division_err_field">
                                    <span class="text-danger validation-css" id="billing_division_err_msg_area"><i
                                            class="fa fa-exclamation-triangle me-2"></i><span
                                            id="billing_division_err_msg"></span></span>
                                </div>

                                <div class="row  d-flex align-baseliner mb-4">
                                    <label for="billing_district" class="col-sm-4 col-form-label">District <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <select class=" ms-5  form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example" name="billing_district"
                                            id="billing_district">
                                            <option value="">Select District</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row validation-checkout" id="billing_district_err_field">
                                    <span class="text-danger validation-css" id="billing_district_err_msg_area"><i
                                            class="fa fa-exclamation-triangle me-2"></i><span
                                            id="billing_district_err_msg"></span></span>
                                </div>

                                <!-- <div class="row  d-flex align-baseliner">
                                    <label for="billing_district" class="col-md-4 col-form-label">District <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <input class="form-control ms-5 border-0" name="billing_district"
                                            id="billing_district" type="text" placeholder="District" required>
                                    </div>
                                </div>
                                <div class="row validation-checkout" id="billing_district_err_field">
                                    <span class="text-danger validation-css" id="billing_district_err_msg_area"><i
                                            class="fa fa-exclamation-triangle me-2"></i><span
                                            id="billing_district_err_msg"></span></span>
                                </div> -->

                                <div class="row  d-flex align-baseliner mb-4">
                                    <label for="billing_thana" class="col-md-4 col-form-label">Thana <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <select class=" ms-5  form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example" name="billing_thana"
                                            id="billing_thana">
                                            <option value="">Select Thana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row validation-checkout" id="billing_thana_err_field">
                                    <span class="text-danger validation-css" id="billing_thana_err_msg_area"><i
                                            class="fa fa-exclamation-triangle me-2"></i><span
                                            id="billing_thana_err_msg"></span></span>
                                </div>

                                <!-- <div class="row  d-flex align-baseliner">
                                    <label for="billing_thana" class="col-md-4 col-form-label">Thana <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <input class="form-control ms-5 border-0" name="billing_thana"
                                            id="billing_thana" type="text" placeholder="Thana" required>
                                    </div>
                                </div>
                                <div class="row validation-checkout" id="billing_thana_err_field">
                                    <span class="text-danger validation-css" id="billing_thana_err_msg_area"><i
                                            class="fa fa-exclamation-triangle me-2"></i><span
                                            id="billing_thana_err_msg"></span></span>
                                </div> -->

                                <div class="row mt-2  d-flex align-baseliner">
                                    <label for="billing_flat" class="col-md-4 col-form-label">Flat/ Road/ Post Office
                                        <span class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <input class="form-control ms-5 border-0" name="billing_flat" id="billing_flat"
                                            type="text" placeholder="Flat/Road/Post office" required>
                                    </div>
                                </div>
                                <div class="row validation-checkout" id="billing_flat_err_field">
                                    <span class="text-danger validation-css" id="billing_flat_err_msg_area"><i
                                            class="fa fa-exclamation-triangle me-2"></i><span
                                            id="billing_flat_err_msg"></span></span>
                                </div>

                                <!-- <input type="checkbox"><span style="padding-left: 20px; font-size:18px;">Remember me</span> -->
                                <div class="col text-end mb-2">
                                    <button type="button" class="btn btn-primary continue-button"
                                        style="margin-top: 0px;" onclick="billingSubmit()">Continue</button>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>
                <div class="row  float-end" id="Payment">
                    <div class="col-md-12">
                        <div class="signin-form" style="background-color: #fff;  ">
                            <p class="container mt-3 ms-3"
                                style="padding-top: 25px !important; font-weight: 500; font-size: 20px;"> Payment
                            </p>
                            <hr style="color: #C8C8C8">
                            <div class="row container ms-1">
                                <div class="col-lg-4 col-md-4 col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="payment_method" onclick="cash()" checked="checked"
                                            value="Cash On Delivery" />
                                        <label class="form-check-label" for="paymentMethod">
                                            Cash on Delivery
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="payment_method" onclick="mobileBanking()" value="mobile" disabled>
                                        <label class="form-check-label" for="paymentMethod">
                                            Mobile Banking
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="payment_method" onclick="credit()" value="credit" disabled>
                                        <label class="form-check-label" for="paymentMethod">
                                            Credit/Debit Card
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="payment-body" id="toggle-cash-form">
                                <p class="text-center cash-text ">You can pay cash to our courier when you receive the
                                    goods at your doorstep

                                </p>
                                <div class="cash-on-img">
                                    <img src="{{asset('cash.svg')}}" class="cash-img" alt="">
                                </div>
                                <div class="col text-end mb-2" for="left-menu-checkout">


                                    <button type="button" class="btn btn-primary continue-button1"
                                        style="margin-top: 0px;"> <label
                                            for="left-menu-checkout">Continue</label></button>

                                </div>


                            </div>

                            <div class="payment-body" id="toggle-mobile-form">


                                <div class="row mt-2  d-flex align-baseliner">
                                    <label for="inputPassword" class="col-md-4 col-form-label">BKash <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 payment-radio ">
                                        <input class="  ms-5 border-0" name="payment" type="radio" placeholder="Name">

                                    </div>
                                </div>
                                <div class="row d-flex align-baseliner">
                                    <label for="inputPassword" class="col-md-4 col-form-label">Rocket<span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 payment-radio">
                                        <input class="  ms-5 border-0" name="payment" type="radio" placeholder="Phone">

                                    </div>
                                </div>
                                <div class="row d-flex align-baseliner">
                                    <label for="inputPassword" class="col-md-4 col-form-label">Nagad<span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 payment-radio ">
                                        <input class="  ms-5 border-0" name="payment" type="radio" placeholder="Phone">

                                    </div>
                                </div>
                                <div class="col text-end">
                                    <button type="button" class="btn continue-button">Continue</button>
                                </div>
                            </div>

                            <div class="payment-body" id="toggle-credit-form">

                                <div class="row  d-flex align-baseliner">
                                    <label for="name" class="col-md-4 col-form-label">Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <input class="form-control ms-5 border-0" name="name" id="c_name" type="text"
                                            placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="row  d-flex align-baseliner">
                                    <label for="phone" class="col-md-4 col-form-label">Phone Number <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <input class="form-control ms-5 border-0" name="phone" id="c_phone" type="text"
                                            placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="row  d-flex align-baseliner">
                                    <label for="email" class="col-md-4 col-form-label">Email Address <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <input class="form-control ms-5 border-0" name="email" id="c_email" type="email"
                                            placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="row " id="err_pass" style="margin: -30px 0 10px 225px;"></div>
                                <div class="row  d-flex align-baseliner  mb-5">
                                    <label for="rePassword" class="col-md-4 col-form-label">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-7 ">
                                        <input class="form-control ms-5 border-0" name="repassword" id="c_repassword"
                                            type="password" placeholder="Confirm Password" required>

                                    </div>
                                </div>
                                <div class="row" id="err_rpass" style="margin: -80px 0 0 225px;"></div>
                                <div class="row" id="not_match_field" style="margin: -80px 0 0 225px;"></div>

                                <!-- <input type="checkbox"><span style="padding-left: 20px; font-size:18px;">Remember me</span> -->
                                <div class="col text-end mb-2">
                                    <button type="submit" class="btn btn-primary continue-button"
                                        style="margin-top: -20px;">Continue</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div id="order-placed" class="row  float-end">
                    <div class="col-md-12">
                        <div class="signin-form" style="background-color: #fff;">
                            <p class="container mt-3 ms-3"
                                style="padding-top: 25px !important; font-weight: 600; font-size: 20px;">Your Product
                            </p>

                            <hr style="color: #C8C8C8">
                            <div class="order-placed-body" id="">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div>
                                        <p class=" your_product">Your Order Successfully Places <br> You will
                                            Get your
                                            Product with 7days. </p>

                                        <div class="your_product-img">
                                            <img src="{{asset('courier.svg')}}" class="cash-img" alt="">
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-primary continue-button"
                                        onclick="printInvoice()">Print</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- <div class="signin-social-button">
                <div class="row">
                    <div class="col-6">
                        <div class="signin-google-button">
                            <img src="{{ asset('frontend/sigma/icons/google.png') }}" alt=""><span>Continue with
                                google</span>
                        </div>
                    </div>
    
                    <div class="col-6">
                        <div class="signin-facebook-button">
                            <img src="{{ asset('frontend/sigma/icons/facebook.png') }}" alt=""><span>Continue with
                                facebook</span>
                        </div>
                    </div>
                </div>
            </div> -->
            </div>
            <!-- $total += ($cart['unit_price'] * $cart['quantity']); -->
            @php
            $total = 0;
            $total_quantity = 0;
            @endphp
            @foreach (App\Models\Cart::totalCarts() as $cart)

            @php
            $total += $cart['total_price'];
            $total_quantity += $cart['quantity']
            @endphp
            @endforeach
            @php
            $gross_total = $total;
            @endphp

            <div class="product-info">
                <div class="product-area">
                    <div class="product-info-title">
                        <h1>Order Summary</h1>
                    </div>
                    <div class="product-info-details">
                        <div class="order-details1">
                            <h1 class=" product-info-checkout-processing">
                                Subtotal item ( {{$total_quantity}} items )</h1>
                            <h1 class="product-info-checkout-details">
                                ৳{{number_format($total)}}</h1>
                            <!-- <h1 class="product-info-checkout-details">
                                ৳{{number_format((float)$total, 2, '.', ',')}}</h1> -->
                            <!-- <h1 class=" product-info-checkout-processing">
                                Wireless keybord & mouse</h1>
                            <h1 class="product-info-checkout-details">
                                ৳{{number_format($total)}}</h1> -->

                            <!-- Wireless keybord & mouse <span class="product-info-checkout-details">
                                ৳{{number_format($total)}}</span> -->

                        </div>
                        <div class="order-group">
                            <input type="text" class="form-control me-5" placeholder="Coupon Code" name="coupon_code"
                                id="coupon_code">
                            <span class="order-group-btn">
                                <button class="btn apply-coupon-btn" type="button" onclick="applyCouponCode()"
                                    id="coupon-apply-btn" style="cursor: pointer;">Apply</button>
                                <button class="btn remove-coupon-btn" type="button"
                                    onclick="removeCouponCode('{{$total}}')" id="coupon-remove-btn"
                                    style="cursor: pointer;">Remove</button>
                            </span>
                        </div>
                        <p id="coupon_code_err_msg_area" class="err_msg_color"><i
                                class="fa fa-exclamation-triangle me-2"></i><span id="coupon_code_err_msg"></span></p>
                        <p id="coupon_code_correct_msg_area" class="correct_msg_color"><i
                                class="fa-solid fa-circle-check me-2"></i><span id="coupon_code_correct_msg"></span></p>
                        <div class="order-details1 " id="coupon_value_area">
                            <div class="">
                                <p>Coupon Saving: </p>
                            </div>
                            <div class=" ">
                                <p id="coupon_value">৳0 </p>
                            </div>
                            <div class="">
                                <p>Estimated Shipping: </p>
                            </div>
                            <div class=" ">
                                <p>Free </p>

                            </div>
                        </div>
                        <!-- <div class="row">
                        <div class="col-md-6">
                            <p>Estimated Taxes: </p>
                        </div>
                        <div class="col-md-2 text-end">
                            <p>৳1000</p>
                        </div>
                    </div> -->
                        <div class="row">
                            <div class="col-md-9">
                                <hr>
                            </div>
                        </div>
                        <div class="order-details1">
                            <div class="">
                                <h1 style="font-weight: 500;">Gross Total</h1>
                            </div>
                            <div class="">
                                <p style="font-weight: 500;" id="gross_total_amount">৳{{number_format($gross_total)}}
                                </p>
                            </div>
                        </div>
                        <div class="col text-start mb-2" id="process-btn-section">
                            <button type="button" id="process-pay-btn" class="btn continue-button"
                                style="margin-top: 20px;  margin-left: 0px;" onclick="processToPay()">Process
                                to Pay</button>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </section>
    <input type="hidden" id="billing_div_name" name="billing_div_name" value="">
    <input type="hidden" id="billing_dist_name" name="billing_dist_name" value="">
    <input type="hidden" id="billing_thana_name" name="billing_thana_name" value="">
    <input type="hidden" id="coupon_code_name" name="coupon_code_name" value="">
    <input type="hidden" id="coupon_code_value" name="coupon_code_value" value="">
    <input type="hidden" id="discount_price" name="discount_price" value="">
    <input type="hidden" id="tax_amount" name="tax_amount" value="0">
</form>

<!-- <section class="shoppingcart-category-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shoppingcart-category">
                    <ul>
                        <li>Sigma > </li>
                        <li>Buy > </li>
                        <li>Product > </li>
                        <li>ShoppingCart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout-content-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shoppingcart-content">
                    <div class="row">
                        <div class="shopping-cart-details">
                            <div class="col-md-4">
                                <div class="checkout-page-left">
                                    <div>
                                        <h3>Already a Member ?</h3>
                                        <a href="{{ route('checkout-login')}}">Log in</a><br>
                                        {{-- <a href="{{ route('checkout-process')}}">Checkout Process</a> --}}
                                        {{-- <input type="radio" id="login" name="drone" value="Log in">
                                          <label for="login" style="font-weight: 600;">Log in</label> --}}
                                    </div>

                                    <div>
                                        <h3>I don't have an Account.</h3>
                                        <a href="{{ route('checkout_registration')}}">Sign up</a>
                                        {{-- <input type="radio" id="login" name="drone" value="sign up">
                                          <label for="Signup" style="font-weight: 600;">Sign up</label> --}}
                                    </div>

                                    <div class="signin-social-button">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="signin-google-button">
                                                    <img src="{{ asset('frontend/sigma/icons/google.png') }}"
                                                        alt=""><span>Continue with google</span>
                                                </div>

                                                <div class="signin-facebook-button">
                                                    <img src="{{ asset('frontend/sigma/icons/facebook.png') }}"
                                                        alt=""><span>Continue with facebook</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <h3>Shopping Cart :</h3>
                                @php
                                $total = 0;
                                @endphp
                                @foreach (App\Models\Cart::totalCarts() as $cart)

                                @php

                                $total += ($cart['unit_price'] * $cart['quantity']);
                                @endphp
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="shoppingcart-des-content">
                                            <div class="shopping-cart-image">
                                                <p>Image</p>
                                                {{-- <img src="{{ asset('frontend/sigma/High quality/desdis.png') }}"
                                                class="img-fluid" alt=""> --}}
                                                <img src="{{ asset($cart->product->galary_photo) }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="shopping-cart-des">
                                                <p>Description</p>
                                                <p>{{ $cart->product->variations}}</p>
                                                {{-- <p>Qbits Sigma 15 - 10th Generation Intel® Core™ Processor, 15.6 Inches FHD Non Touch IPS Display 1920 x 1080, 512GB NVMe SSD, 8GB DDR4 RAM, Intel® Iris® Plus Graphics/Intel® UHD Graphics</p> --}}
                                                <a href="#" class="qty-button">- 2 +</a>
                                                <i class="fa-solid fa-trash"></i>
                                                <p class="model">Model : S15-613G</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="order-summery">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="order-summery-list">
                                                        <ul>
                                                            <li>Quantity: <span class="list-value"> Unit Price</span>
                                                            </li>

                                                            <li><a href="#"
                                                                    class="qty-button">{{ $cart->quantity}}</a><span
                                                                    class="list-value">৳{{ $cart->unit_price}}</span>
                                                            </li>
                                                            <li>Subtotal: <span
                                                                    class="list-value">৳{{ $cart->quantity * $cart->unit_price}}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                                <div class="row">
                                    <div class="col-md-8">

                                    </div>
                                    <div class="col-md-4">
                                        <div class="order-summery">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="order-summery-list"
                                                        style="margin-top: 80px !important;">
                                                        <ul>
                                                            <li>
                                                                <form class="subscribe_form">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                            name="email"
                                                                            placeholder="Enter coupon code">
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default"
                                                                                type="button">Apply</button>
                                                                        </span>
                                                                    </div>
                                                                </form>
                                                            </li>
                                                            <li>My Saving with <br>Coupon Code : <span
                                                                    class="list-value">৳ </span></li>
                                                            <li style="font-weight: 600;">Gross Total: <span
                                                                    class="list-value">৳{{$total}}</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section> -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #272727; border-radius: 20px;">
            <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center" id="verification_code_field">
                <p style="color: #DBDBDD; margin-top: 25px;" id="modal-header">You are almost Done !</p>
                <p style="color: #DBDBDD; font-size: 12px;" class="mt-2 mb-0">We have send you a verification code
                    to</p>
                <p style="color: #DBDBDD; font-size: 12px;text-decoration: underline;cursor: pointer;" id="modal_email">
                </p>
                <h6 style="color: #DBDBDD;" class="mb-3">Enter the code here</h6>
                <form id="codeSubmit">
                    @csrf
                    <div class="form-group text-centers">
                        <input type="text" class="form-control ms-5" style="width: 75%; border-radius: 8px;"
                            name="verification_code" id="verification_code" />
                        <div id="code_err_msg"></div>
                        <button type="button" class="btn btn-primary continue-button"
                            style="margin-top: 40px; margin-bottom: 5px; width: 40%;"
                            onclick="codeSubmit()">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#shipping_division').change(function () {
            var shipping_div = $(this).val();
            if (shipping_div == '') {
                $('#shipping_district').html('<option value="">Select District</option>');
                $('#shipping_thana').html('<option value="">Select Thana</option>');
            } else {
                $('#shipping_district').html('<option value="">Select District</option>');
                $('#shipping_thana').html('<option value="">Select Thana</option>');
                document.getElementById('addressName').value = shipping_div;
                document.getElementById('addressType').value = 'division';
                var data = $("#shippingFrm").serialize();
                jQuery.ajax({
                    type: 'post',
                    url: '/get_address_data',
                    data: data,
                    success: function (result) {
                        $('#shipping_district').append(result);
                    }
                });
            }
        });

        $('#shipping_district').change(function () {
            var shipping_dist = $(this).val();
            if (shipping_dist == '') {
                $('#shipping_thana').html('<option value="">Select Thana</option>');
            } else {
                $('#shipping_thana').html('<option value="">Select Thana</option>');
                document.getElementById('addressName').value = shipping_dist;
                document.getElementById('addressType').value = 'district';
                var data = $("#shippingFrm").serialize();
                jQuery.ajax({
                    type: 'post',
                    url: '/get_address_data',
                    data: data,
                    success: function (result) {
                        $('#shipping_thana').append(result);
                    }
                });
            }
        });

        $('#billing_division').change(function () {
            var billing_div = $(this).val();
            if (billing_div == '') {
                $('#billing_district').html('<option value="">Select District</option>');
                $('#billing_thana').html('<option value="">Select Thana</option>');
            } else {
                $('#billing_district').html('<option value="">Select District</option>');
                $('#billing_thana').html('<option value="">Select Thana</option>');
                document.getElementById('addressName').value = billing_div;
                document.getElementById('addressType').value = 'division';
                var data = $("#shippingFrm").serialize();
                jQuery.ajax({
                    type: 'post',
                    url: '/get_address_data',
                    data: data,
                    success: function (result) {
                        $('#billing_district').append(result);
                    }
                });
            }
        });

        $('#billing_district').change(function () {
            var billing_dist = $(this).val();
            if (billing_dist == '') {
                $('#billing_thana').html('<option value="">Select Thana</option>');
            } else {
                $('#billing_thana').html('<option value="">Select Thana</option>');
                document.getElementById('addressName').value = billing_dist;
                document.getElementById('addressType').value = 'district';
                var data = $("#shippingFrm").serialize();
                jQuery.ajax({
                    type: 'post',
                    url: '/get_address_data',
                    data: data,
                    success: function (result) {
                        $('#billing_thana').append(result);
                    }
                });
            }
        });

    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function cash() {
        document.getElementById("toggle-cash-form").style.display = "block";
        document.getElementById("toggle-mobile-form").style.display = "none";
        document.getElementById("toggle-credit-form").style.display = "none";
    }

    function mobileBanking() {
        document.getElementById("toggle-mobile-form").style.display = "block";
        document.getElementById("toggle-cash-form").style.display = "none";
        document.getElementById("toggle-credit-form").style.display = "none";
    }

    function credit() {
        document.getElementById("toggle-credit-form").style.display = "block";
        document.getElementById("toggle-cash-form").style.display = "none";
        document.getElementById("toggle-mobile-form").style.display = "none";
    }

    $('[data-toggle="popover"]').popover({
        html: true,
        sanitize: false,
    })


    function shippingSubmit() {
        var s_flat = $("#shipping_flat").val();
        var s_thana = $("#shipping_thana").val();
        var s_district = $("#shipping_district").val();
        var s_division = $("#shipping_division").val();

        if (s_flat == '' && s_thana == '' && s_district == '' && s_division == '') {
            document.getElementById('shipping_flat_err_field').style.display = "block";
            document.getElementById('shipping_thana_err_field').style.display = "block";
            document.getElementById('shipping_district_err_field').style.display = "block";
            document.getElementById('shipping_division_err_field').style.display = "block";
            $("#shipping_flat_err_msg").html('This field is required.');
            $("#shipping_thana_err_msg").html('This field is required.');
            $("#shipping_district_err_msg").html('This field is required.');
            $("#shipping_division_err_msg").html('This field is required.');
            return;
        } else if (s_flat == '' && s_thana == '' && s_district == '' && s_division != '') {
            document.getElementById('shipping_flat_err_field').style.display = "block";
            document.getElementById('shipping_thana_err_field').style.display = "block";
            document.getElementById('shipping_district_err_field').style.display = "block";
            document.getElementById('shipping_division_err_field').style.display = "none";
            $("#shipping_flat_err_msg").html('This field is required.');
            $("#shipping_thana_err_msg").html('This field is required.');
            $("#shipping_district_err_msg").html('This field is required.');
            $("#shipping_division_err_msg").html('');
            return;
        } else if (s_flat == '' && s_thana == '' && s_district != '' && s_division == '') {
            document.getElementById('shipping_flat_err_field').style.display = "block";
            document.getElementById('shipping_thana_err_field').style.display = "block";
            document.getElementById('shipping_district_err_field').style.display = "none";
            document.getElementById('shipping_division_err_field').style.display = "block";
            $("#shipping_flat_err_msg").html('This field is required.');
            $("#shipping_thana_err_msg").html('This field is required.');
            $("#shipping_district_err_msg").html('');
            $("#shipping_division_err_msg").html('This field is required.');
            return;
        } else if (s_flat == '' && s_thana != '' && s_district == '' && s_division == '') {
            document.getElementById('shipping_flat_err_field').style.display = "block";
            document.getElementById('shipping_thana_err_field').style.display = "none";
            document.getElementById('shipping_district_err_field').style.display = "block";
            document.getElementById('shipping_division_err_field').style.display = "block";
            $("#shipping_flat_err_msg").html('This field is required.');
            $("#shipping_thana_err_msg").html('');
            $("#shipping_district_err_msg").html('This field is required.');
            $("#shipping_division_err_msg").html('This field is required.');
            return;
        } else if (s_flat != '' && s_thana == '' && s_district == '' && s_division == '') {
            document.getElementById('shipping_flat_err_field').style.display = "none";
            document.getElementById('shipping_thana_err_field').style.display = "block";
            document.getElementById('shipping_district_err_field').style.display = "block";
            document.getElementById('shipping_division_err_field').style.display = "block";
            $("#shipping_flat_err_msg").html('');
            $("#shipping_thana_err_msg").html('This field is required.');
            $("#shipping_district_err_msg").html('This field is required.');
            $("#shipping_division_err_msg").html('This field is required.');
            return;
        } else if (s_flat == '' && s_thana == '' && s_district != '' && s_division != '') {
            document.getElementById('shipping_flat_err_field').style.display = "block";
            document.getElementById('shipping_thana_err_field').style.display = "block";
            document.getElementById('shipping_district_err_field').style.display = "none";
            document.getElementById('shipping_division_err_field').style.display = "none";
            $("#shipping_flat_err_msg").html('This field is required.');
            $("#shipping_thana_err_msg").html('This field is required.');
            $("#shipping_district_err_msg").html('');
            $("#shipping_division_err_msg").html('');
            return;
        } else if (s_flat == '' && s_thana != '' && s_district == '' && s_division != '') {
            document.getElementById('shipping_flat_err_field').style.display = "block";
            document.getElementById('shipping_thana_err_field').style.display = "none";
            document.getElementById('shipping_district_err_field').style.display = "block";
            document.getElementById('shipping_division_err_field').style.display = "none";
            $("#shipping_flat_err_msg").html('This field is required.');
            $("#shipping_thana_err_msg").html('');
            $("#shipping_district_err_msg").html('This field is required.');
            $("#shipping_division_err_msg").html('');
            return;
        } else if (s_flat == '' && s_thana != '' && s_district != '' && s_division == '') {
            document.getElementById('shipping_flat_err_field').style.display = "block";
            document.getElementById('shipping_thana_err_field').style.display = "none";
            document.getElementById('shipping_district_err_field').style.display = "none";
            document.getElementById('shipping_division_err_field').style.display = "block";
            $("#shipping_flat_err_msg").html('This field is required.');
            $("#shipping_thana_err_msg").html('');
            $("#shipping_district_err_msg").html('');
            $("#shipping_division_err_msg").html('This field is required.');
            return;
        } else if (s_flat != '' && s_thana == '' && s_district == '' && s_division != '') {
            document.getElementById('shipping_flat_err_field').style.display = "none";
            document.getElementById('shipping_thana_err_field').style.display = "block";
            document.getElementById('shipping_district_err_field').style.display = "block";
            document.getElementById('shipping_division_err_field').style.display = "none";
            $("#shipping_flat_err_msg").html('');
            $("#shipping_thana_err_msg").html('This field is required.');
            $("#shipping_district_err_msg").html('This field is required.');
            $("#shipping_division_err_msg").html('');
            return;
        } else if (s_flat != '' && s_thana == '' && s_district != '' && s_division == '') {
            document.getElementById('shipping_flat_err_field').style.display = "none";
            document.getElementById('shipping_thana_err_field').style.display = "block";
            document.getElementById('shipping_district_err_field').style.display = "none";
            document.getElementById('shipping_division_err_field').style.display = "block";
            $("#shipping_flat_err_msg").html('');
            $("#shipping_thana_err_msg").html('This field is required.');
            $("#shipping_district_err_msg").html('');
            $("#shipping_division_err_msg").html('This field is required.');
            return;
        } else if (s_flat != '' && s_thana != '' && s_district == '' && s_division == '') {
            document.getElementById('shipping_flat_err_field').style.display = "none";
            document.getElementById('shipping_thana_err_field').style.display = "none";
            document.getElementById('shipping_district_err_field').style.display = "block";
            document.getElementById('shipping_division_err_field').style.display = "block";
            $("#shipping_flat_err_msg").html('');
            $("#shipping_thana_err_msg").html('');
            $("#shipping_district_err_msg").html('This field is required.');
            $("#shipping_division_err_msg").html('This field is required.');
            return;
        } else if (s_flat == '' && s_thana != '' && s_district != '' && s_division != '') {
            document.getElementById('shipping_flat_err_field').style.display = "block";
            document.getElementById('shipping_thana_err_field').style.display = "none";
            document.getElementById('shipping_district_err_field').style.display = "none";
            document.getElementById('shipping_division_err_field').style.display = "none";
            $("#shipping_flat_err_msg").html('This field is required.');
            $("#shipping_thana_err_msg").html('');
            $("#shipping_district_err_msg").html('');
            $("#shipping_division_err_msg").html('');
            return;
        } else if (s_flat != '' && s_thana == '' && s_district != '' && s_division != '') {
            document.getElementById('shipping_flat_err_field').style.display = "none";
            document.getElementById('shipping_thana_err_field').style.display = "block";
            document.getElementById('shipping_district_err_field').style.display = "none";
            document.getElementById('shipping_division_err_field').style.display = "none";
            $("#shipping_flat_err_msg").html('');
            $("#shipping_thana_err_msg").html('This field is required.');
            $("#shipping_district_err_msg").html('');
            $("#shipping_division_err_msg").html('');
            return;
        } else if (s_flat != '' && s_thana != '' && s_district == '' && s_division != '') {
            document.getElementById('shipping_flat_err_field').style.display = "none";
            document.getElementById('shipping_thana_err_field').style.display = "none";
            document.getElementById('shipping_district_err_field').style.display = "block";
            document.getElementById('shipping_division_err_field').style.display = "none";
            $("#shipping_flat_err_msg").html('');
            $("#shipping_thana_err_msg").html('');
            $("#shipping_district_err_msg").html('This field is required.');
            $("#shipping_division_err_msg").html('');
            return;
        } else if (s_flat != '' && s_thana != '' && s_district != '' && s_division == '') {
            document.getElementById('shipping_flat_err_field').style.display = "none";
            document.getElementById('shipping_thana_err_field').style.display = "none";
            document.getElementById('shipping_district_err_field').style.display = "none";
            document.getElementById('shipping_division_err_field').style.display = "block";
            $("#shipping_flat_err_msg").html('');
            $("#shipping_thana_err_msg").html('');
            $("#shipping_district_err_msg").html('');
            $("#shipping_division_err_msg").html('This field is required.');
            return;
        } else if (s_flat != '' && s_thana != '' && s_district != '' && s_division != '') {
            document.getElementById('shipping_flat_err_field').style.display = "none";
            document.getElementById('shipping_thana_err_field').style.display = "none";
            document.getElementById('shipping_district_err_field').style.display = "none";
            document.getElementById('shipping_division_err_field').style.display = "none";
            $("#shipping_flat_err_msg").html('');
            $("#shipping_thana_err_msg").html('');
            $("#shipping_district_err_msg").html('');
            $("#shipping_division_err_msg").html('');
            document.getElementById('Billing').style.display = "block";
            jQuery("#billing-staper").removeAttr('disabled');
            document.getElementById('billing-staper-span').style.backgroundColor = "#1486F9";
            window.location.href = "#Billing";

        }
    }


    function billingSubmit() {
        var b_flat = $("#billing_flat").val();
        var b_thana = $("#billing_thana").val();
        var b_district = $("#billing_district").val();
        var b_division = $("#billing_division").val();

        if (b_flat == '' && b_thana == '' && b_district == '' && b_division == '') {
            document.getElementById('billing_flat_err_field').style.display = "block";
            document.getElementById('billing_thana_err_field').style.display = "block";
            document.getElementById('billing_district_err_field').style.display = "block";
            document.getElementById('billing_division_err_field').style.display = "block";
            $("#billing_flat_err_msg").html('This field is required.');
            $("#billing_thana_err_msg").html('This field is required.');
            $("#billing_district_err_msg").html('This field is required.');
            $("#billing_division_err_msg").html('This field is required.');
            return;
        } else if (b_flat == '' && b_thana == '' && b_district == '' && b_division != '') {
            document.getElementById('billing_flat_err_field').style.display = "block";
            document.getElementById('billing_thana_err_field').style.display = "block";
            document.getElementById('billing_district_err_field').style.display = "block";
            document.getElementById('billing_division_err_field').style.display = "none";
            $("#billing_flat_err_msg").html('This field is required.');
            $("#billing_thana_err_msg").html('This field is required.');
            $("#billing_district_err_msg").html('This field is required.');
            $("#billing_division_err_msg").html('');
            return;
        } else if (b_flat == '' && b_thana == '' && b_district != '' && b_division == '') {
            document.getElementById('billing_flat_err_field').style.display = "block";
            document.getElementById('billing_thana_err_field').style.display = "block";
            document.getElementById('billing_district_err_field').style.display = "none";
            document.getElementById('billing_division_err_field').style.display = "block";
            $("#billing_flat_err_msg").html('This field is required.');
            $("#billing_thana_err_msg").html('This field is required.');
            $("#billing_district_err_msg").html('');
            $("#billing_division_err_msg").html('This field is required.');
            return;
        } else if (b_flat == '' && b_thana != '' && b_district == '' && b_division == '') {
            document.getElementById('billing_flat_err_field').style.display = "block";
            document.getElementById('billing_thana_err_field').style.display = "none";
            document.getElementById('billing_district_err_field').style.display = "block";
            document.getElementById('billing_division_err_field').style.display = "block";
            $("#billing_flat_err_msg").html('This field is required.');
            $("#billing_thana_err_msg").html('');
            $("#billing_district_err_msg").html('This field is required.');
            $("#billing_division_err_msg").html('This field is required.');
            return;
        } else if (b_flat != '' && b_thana == '' && b_district == '' && b_division == '') {
            document.getElementById('billing_flat_err_field').style.display = "none";
            document.getElementById('billing_thana_err_field').style.display = "block";
            document.getElementById('billing_district_err_field').style.display = "block";
            document.getElementById('billing_division_err_field').style.display = "block";
            $("#billing_flat_err_msg").html('');
            $("#billing_thana_err_msg").html('This field is required.');
            $("#billing_district_err_msg").html('This field is required.');
            $("#billing_division_err_msg").html('This field is required.');
            return;
        } else if (b_flat == '' && b_thana == '' && b_district != '' && b_division != '') {
            document.getElementById('billing_flat_err_field').style.display = "block";
            document.getElementById('billing_thana_err_field').style.display = "block";
            document.getElementById('billing_district_err_field').style.display = "none";
            document.getElementById('billing_division_err_field').style.display = "none";
            $("#billing_flat_err_msg").html('This field is required.');
            $("#billing_thana_err_msg").html('This field is required.');
            $("#billing_district_err_msg").html('');
            $("#billing_division_err_msg").html('');
            return;
        } else if (b_flat == '' && b_thana != '' && b_district == '' && b_division != '') {
            document.getElementById('billing_flat_err_field').style.display = "block";
            document.getElementById('billing_thana_err_field').style.display = "none";
            document.getElementById('billing_district_err_field').style.display = "block";
            document.getElementById('billing_division_err_field').style.display = "none";
            $("#billing_flat_err_msg").html('This field is required.');
            $("#billing_thana_err_msg").html('');
            $("#billing_district_err_msg").html('This field is required.');
            $("#billing_division_err_msg").html('');
            return;
        } else if (b_flat == '' && b_thana != '' && b_district != '' && b_division == '') {
            document.getElementById('billing_flat_err_field').style.display = "block";
            document.getElementById('billing_thana_err_field').style.display = "none";
            document.getElementById('billing_district_err_field').style.display = "none";
            document.getElementById('billing_division_err_field').style.display = "block";
            $("#billing_flat_err_msg").html('This field is required.');
            $("#billing_thana_err_msg").html('');
            $("#billing_district_err_msg").html('');
            $("#billing_division_err_msg").html('This field is required.');
            return;
        } else if (b_flat != '' && b_thana == '' && b_district == '' && b_division != '') {
            document.getElementById('billing_flat_err_field').style.display = "none";
            document.getElementById('billing_thana_err_field').style.display = "block";
            document.getElementById('billing_district_err_field').style.display = "block";
            document.getElementById('billing_division_err_field').style.display = "none";
            $("#billing_flat_err_msg").html('');
            $("#billing_thana_err_msg").html('This field is required.');
            $("#billing_district_err_msg").html('This field is required.');
            $("#billing_division_err_msg").html('');
            return;
        } else if (b_flat != '' && b_thana == '' && b_district != '' && b_division == '') {
            document.getElementById('billing_flat_err_field').style.display = "none";
            document.getElementById('billing_thana_err_field').style.display = "block";
            document.getElementById('billing_district_err_field').style.display = "none";
            document.getElementById('billing_division_err_field').style.display = "block";
            $("#billing_flat_err_msg").html('');
            $("#billing_thana_err_msg").html('This field is required.');
            $("#billing_district_err_msg").html('');
            $("#billing_division_err_msg").html('This field is required.');
            return;
        } else if (b_flat != '' && b_thana != '' && b_district == '' && b_division == '') {
            document.getElementById('billing_flat_err_field').style.display = "none";
            document.getElementById('billing_thana_err_field').style.display = "none";
            document.getElementById('billing_district_err_field').style.display = "block";
            document.getElementById('billing_division_err_field').style.display = "block";
            $("#billing_flat_err_msg").html('');
            $("#billing_thana_err_msg").html('');
            $("#billing_district_err_msg").html('This field is required.');
            $("#billing_division_err_msg").html('This field is required.');
            return;
        } else if (b_flat == '' && b_thana != '' && b_district != '' && b_division != '') {
            document.getElementById('billing_flat_err_field').style.display = "block";
            document.getElementById('billing_thana_err_field').style.display = "none";
            document.getElementById('billing_district_err_field').style.display = "none";
            document.getElementById('billing_division_err_field').style.display = "none";
            $("#billing_flat_err_msg").html('This field is required.');
            $("#billing_thana_err_msg").html('');
            $("#billing_district_err_msg").html('');
            $("#billing_division_err_msg").html('');
            return;
        } else if (b_flat != '' && b_thana == '' && b_district != '' && b_division != '') {
            document.getElementById('billing_flat_err_field').style.display = "none";
            document.getElementById('billing_thana_err_field').style.display = "block";
            document.getElementById('billing_district_err_field').style.display = "none";
            document.getElementById('billing_division_err_field').style.display = "none";
            $("#billing_flat_err_msg").html('');
            $("#billing_thana_err_msg").html('This field is required.');
            $("#billing_district_err_msg").html('');
            $("#billing_division_err_msg").html('');
            return;
        } else if (b_flat != '' && b_thana != '' && b_district == '' && b_division != '') {
            document.getElementById('billing_flat_err_field').style.display = "none";
            document.getElementById('billing_thana_err_field').style.display = "none";
            document.getElementById('billing_district_err_field').style.display = "block";
            document.getElementById('billing_division_err_field').style.display = "none";
            $("#billing_flat_err_msg").html('');
            $("#billing_thana_err_msg").html('');
            $("#billing_district_err_msg").html('This field is required.');
            $("#billing_division_err_msg").html('');
            return;
        } else if (b_flat != '' && b_thana != '' && b_district != '' && b_division == '') {
            document.getElementById('billing_flat_err_field').style.display = "none";
            document.getElementById('billing_thana_err_field').style.display = "none";
            document.getElementById('billing_district_err_field').style.display = "none";
            document.getElementById('billing_division_err_field').style.display = "block";
            $("#billing_flat_err_msg").html('');
            $("#billing_thana_err_msg").html('');
            $("#billing_district_err_msg").html('');
            $("#billing_division_err_msg").html('This field is required.');
            return;
        } else if (b_flat != '' && b_thana != '' && b_district != '' && b_division != '') {
            document.getElementById('billing_flat_err_field').style.display = "none";
            document.getElementById('billing_thana_err_field').style.display = "none";
            document.getElementById('billing_district_err_field').style.display = "none";
            document.getElementById('billing_division_err_field').style.display = "none";
            $("#billing_flat_err_msg").html('');
            $("#billing_thana_err_msg").html('');
            $("#billing_district_err_msg").html('');
            $("#billing_division_err_msg").html('');
            document.getElementById('Payment').style.display = "block";
            document.getElementById('process-btn-section').style.display = "block";
            document.getElementById('process-btn-section1').style.display = "block";
            jQuery("#payment-staper").removeAttr('disabled');
            document.getElementById('payment-staper-span').style.backgroundColor = "#1486F9";
            window.location.href = "#Payment";

        }
    }

    function sameShippingAs() {

        if ($("#same_as").is(':checked')) {
            var s_flat = $("#shipping_flat").val();
            var s_thana = $("#shipping_thana").val();
            var s_district = $("#shipping_district").val();
            var s_division = $("#shipping_division").val();

            if (s_flat != '' && s_thana != '' && s_district != '' && s_division != '') {
                var html_dist = '<option value="' + s_district + '" selected>' + s_district + '</option>';
                var html_thana = '<option value="' + s_thana + '" selected>' + s_thana + '</option>';
                document.getElementById('billing_flat').value = s_flat;
                $('#billing_district').append(html_dist);
                $('#billing_thana').append(html_thana);
                document.getElementById('billing_division').value = s_division;
                document.getElementById('billing_div_name').value = s_division;
                document.getElementById('billing_dist_name').value = s_district;
                document.getElementById('billing_thana_name').value = s_thana;

                $('#billing_flat').attr('readonly', true);
                $('#billing_thana').attr('disabled', true);
                $('#billing_district').attr('disabled', true);
                $('#billing_division').attr('disabled', true);
            }
        } else {
            document.getElementById('billing_flat').value = '';
            document.getElementById('billing_thana').value = '';
            document.getElementById('billing_district').value = '';
            document.getElementById('billing_division').value = '';
            document.getElementById('billing_div_name').value = '';
            document.getElementById('billing_dist_name').value = '';
            document.getElementById('billing_thana_name').value = '';

            $('#billing_flat').attr('readonly', false);
            $('#billing_thana').attr('readonly', false);
            $('#billing_district').attr('readonly', false);
            $('#billing_division').attr('disabled', false);
        }
    }


    function processToPay() {
        var data = $("#frmCheckout").serialize();
        var spinner =
            '<div class="spinner-border me-1" role="status"><span class="visually-hidden">Loading...</span></div>Wait...';
        $('#process-pay-btn').html(spinner);
        $('#process-pay-btn1').html(spinner);
        // toastr.options = {
        //     "closeButton": true,
        //     "newestOnTop": true,
        //     "progressBar": true,
        //     "timeOut": "3000",
        //     "positionClass": "toast-top-right"
        // };
        jQuery.ajax({
            url: '/order_placed',
            data: data,
            type: 'post',
            success: function (result) {
                $('#process-pay-btn').html('Order Placed');
                $('#process-pay-btn1').html('Order Placed');
                if (result.status == 'success') {
                    document.getElementById('cart-menu').style.display = "none";
                    document.getElementById('Shipping').style.display = "none";
                    document.getElementById('Billing').style.display = "none";
                    document.getElementById('Payment').style.display = "none";
                    document.getElementById('checkout-title-stapper').style.display = "none";
                    document.getElementById('order-placed').style.display = "block";
                    document.getElementById('process-btn-section').style.display = "none";
                    document.getElementById('process-btn-section1').style.display = "none";
                    // toastr.success('Your order has been successfully placed');


                } else if (result.status == 'error') {

                }
            }
        });

    }


    function printInvoice() {
        window.location.href = "{{route('print_invoice')}}";
    }

    function shippingStaper() {
        window.location.href = "#Shipping";
        // document.getElementById('Shipping').style.marginTop = '200px';
    }

    function billingStaper() {
        window.location.href = "#Billing";

    }

    function paymentStaper() {
        window.location.href = "#Payment";
    }


    function applyCouponCode() {
        document.getElementById('coupon_code_err_msg_area').style.display = 'none';
        document.getElementById('coupon_code_correct_msg_area').style.display = 'none';
        jQuery('#coupon_code_err_msg').html('');
        jQuery('#coupon_code_correct_msg').html('');
        var coupon_code = jQuery('#coupon_code').val();
        if (coupon_code != '') {
            jQuery.ajax({
                type: 'post',
                url: '/apply_coupon_code',
                data: 'coupon_code=' + coupon_code + '&_token=' + jQuery("[name='_token']").val(),
                success: function (result) {
                    if (result.status == 'success') {
                        var btn = document.getElementById("coupon-apply-btn");
                        var total = parseFloat(result.totalPrice).toFixed(2);
                        var coupon_value = parseFloat(result.coupon_code_value).toFixed(2);

                        var totalBeforeDecimal = parseInt(total.toString().split('.')[0]);
                        var totalAfterDecimal = total.toString().split('.')[1];
                        var couponValueBeforeDecimal = parseInt(coupon_value.toString().split('.')[0]);
                        var couponValueAfterDecimal = coupon_value.toString().split('.')[1];

                        totalBeforeDecimal = totalBeforeDecimal.toLocaleString('en-US');
                        totalPriceDecimal = String(totalBeforeDecimal) + '.' + String(totalAfterDecimal);

                        couponValueBeforeDecimal = couponValueBeforeDecimal.toLocaleString('en-US');
                        totalCouponDecimal = String(couponValueBeforeDecimal) + '.' + String(
                            couponValueAfterDecimal);
                        // Create our number formatter.
                        // var formatter = new Intl.NumberFormat('hi-IN', {style: 'currency',currency: 'BDT'});

                        // coupon_value = coupon_value.toLocaleString('en-US');
                        // coupon_value = formatter.format(coupon_value);
                        // total = total.toLocaleString('en-US');
                        // total = formatter.format(total);
                        $('#coupon_code').attr('readonly', 'readonly');
                        // btn.disabled = "true";
                        // btn.style.cursor = "not-allowed";
                        // $('#coupon-apply-btn').attr('disabled', true);
                        document.getElementById('coupon_code_err_msg_area').style.display = 'none';
                        jQuery('#coupon_code_err_msg').html('');
                        document.getElementById('coupon_code_correct_msg_area').style.display = 'block';
                        jQuery('#coupon_code_correct_msg').html(result.msg);
                        jQuery('#coupon_value').html('৳' + totalCouponDecimal);
                        jQuery('#gross_total_amount').html('৳' + totalPriceDecimal);
                        document.getElementById('coupon_code_name').value = result.coupon_name;
                        document.getElementById('coupon_code_value').value = coupon_value;
                        document.getElementById('discount_price').value = total;
                        document.getElementById('coupon-apply-btn').style.display = 'none';
                        document.getElementById('coupon-remove-btn').style.display = 'block';
                    } else if (result.status == 'error') {
                        jQuery("#coupon_code").removeAttr('readonly');
                        jQuery("#coupon-apply-btn").removeAttr('disabled');
                        document.getElementById('coupon_code_correct_msg_area').style.display = 'none';
                        jQuery('#coupon_code_correct_msg').html('');
                        document.getElementById('coupon_code_err_msg_area').style.display = 'block';
                        jQuery('#coupon_code_err_msg').html(result.msg);
                        document.getElementById('coupon_code_name').value = '';
                        document.getElementById('coupon_code_value').value = '';
                    }
                }
            });
        } else {
            document.getElementById('coupon_code_err_msg_area').style.display = 'block';
            jQuery('#coupon_code_err_msg').html('Please enter coupon code');
        }
    }


    function removeCouponCode(price) {
        document.getElementById('coupon_code_correct_msg_area').style.display = 'none';
        jQuery('#coupon_code_correct_msg').html('');
        // var coupon_value = $('#coupon_code_value').val();
        // var discount_price = $('#discount_price').val();
        // var previous_price = parseInt(coupon_value) + parseInt(discount_price);
        var previous_price = parseInt(price).toLocaleString('en-US');
        $('#gross_total_amount').html('৳' + previous_price);
        $('#coupon_value').html('৳' + 0);
        document.getElementById('coupon_code_name').value = '';
        document.getElementById('coupon_code_value').value = '';
        document.getElementById('discount_price').value = '';
        document.getElementById('coupon-remove-btn').style.display = 'none';
        document.getElementById('coupon-apply-btn').style.display = 'block';
        $('#coupon_code').attr('readonly', false);
        document.getElementById('coupon_code').value = "";

    }

    function applyCouponCode1() {
        document.getElementById('coupon_code_err_msg_area1').style.display = 'none';
        document.getElementById('coupon_code_correct_msg_area1').style.display = 'none';
        jQuery('#coupon_code_err_msg1').html('');
        jQuery('#coupon_code_correct_msg1').html('');
        var coupon_code = jQuery('#coupon_code1').val();
        if (coupon_code != '') {
            jQuery.ajax({
                type: 'post',
                url: '/apply_coupon_code',
                data: 'coupon_code=' + coupon_code + '&_token=' + jQuery("[name='_token']").val(),
                success: function (result) {
                    if (result.status == 'success') {
                        var btn = document.getElementById("coupon-apply-btn1");

                        //
                        var total = parseFloat(result.totalPrice).toFixed(2);
                        var coupon_value = parseFloat(result.coupon_code_value).toFixed(2);

                        var totalBeforeDecimal = parseInt(total.toString().split('.')[0]);
                        var totalAfterDecimal = total.toString().split('.')[1];
                        var couponValueBeforeDecimal = parseInt(coupon_value.toString().split('.')[0]);
                        var couponValueAfterDecimal = coupon_value.toString().split('.')[1];

                        totalBeforeDecimal = totalBeforeDecimal.toLocaleString('en-US');
                        totalPriceDecimal = String(totalBeforeDecimal) + '.' + String(totalAfterDecimal);

                        couponValueBeforeDecimal = couponValueBeforeDecimal.toLocaleString('en-US');
                        totalCouponDecimal = String(couponValueBeforeDecimal) + '.' + String(
                            couponValueAfterDecimal);
                        //
                        $('#coupon_code1').attr('readonly', 'readonly');
                        // btn.disabled = "true";
                        // btn.style.cursor = "not-allowed";
                        // $('#coupon-apply-btn').attr('disabled', true);
                        document.getElementById('coupon_code_err_msg_area1').style.display = 'none';
                        jQuery('#coupon_code_err_msg1').html('');
                        document.getElementById('coupon_code_correct_msg_area1').style.display = 'block';
                        jQuery('#coupon_code_correct_msg1').html(result.msg);
                        jQuery('#coupon_value1').html('৳ ' + totalCouponDecimal);
                        jQuery('#gross_total_amount1').html('৳ ' + totalPriceDecimal);
                        document.getElementById('coupon_code_name').value = result.coupon_name;
                        document.getElementById('coupon_code_value').value = coupon_value;
                        document.getElementById('discount_price').value = total;
                        document.getElementById('coupon-apply-btn1').style.display = 'none';
                        document.getElementById('coupon-remove-btn1').style.display = 'block';
                    } else if (result.status == 'error') {
                        jQuery("#coupon_code1").removeAttr('readonly');
                        jQuery("#coupon-apply-btn1").removeAttr('disabled');
                        document.getElementById('coupon_code_correct_msg_area1').style.display = 'none';
                        jQuery('#coupon_code_correct_msg1').html('');
                        document.getElementById('coupon_code_err_msg_area1').style.display = 'block';
                        jQuery('#coupon_code_err_msg1').html(result.msg);
                        document.getElementById('coupon_code_name').value = '';
                        document.getElementById('coupon_code_value').value = '';
                    }
                }
            });
        } else {
            document.getElementById('coupon_code_err_msg_area1').style.display = 'block';
            jQuery('#coupon_code_err_msg1').html('Please enter coupon code');
        }
    }

    function removeCouponCode1(price) {
        document.getElementById('coupon_code_correct_msg_area1').style.display = 'none';
        jQuery('#coupon_code_correct_msg1').html('');
        // var coupon_value = $('#coupon_code_value1').val();
        // var discount_price = $('#discount_price1').val();
        // var previous_price = parseInt(coupon_value) + parseInt(discount_price);
        // previous_price = previous_price.toLocaleString('en-US');
        var previous_price = parseInt(price).toLocaleString('en-US');
        $('#gross_total_amount1').html('৳' + previous_price);
        $('#coupon_value1').html('৳' + 0);
        document.getElementById('coupon_code_name').value = '';
        document.getElementById('coupon_code_value').value = '';
        document.getElementById('discount_price').value = '';
        document.getElementById('coupon-remove-btn1').style.display = 'none';
        document.getElementById('coupon-apply-btn1').style.display = 'block';
        $('#coupon_code1').attr('readonly', false);
        document.getElementById('coupon_code1').value = "";

    }

</script>

<form id="shippingFrm">
    @csrf
    <input type="hidden" id="addressName" name="addressName" value="">
    <input type="hidden" id="addressType" name="addressType" value="">
</form>

@endsection
