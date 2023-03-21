@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
<style>
    .blur {
        background: #ffffff30;
        backdrop-filter: blur(5px);
    }

    .wishlist-amount {
        margin-top: 30px;
    }

    .wishlist-delete {
        margin-top: 28px;
    }

    .addd-to-cart-btn {
        margin-top: 22px;
    }

    .product-name {
        margin-top: 10px;
    }

    .button-increase {
        margin-top: 20px;
    }

    .cart-details {
        background-color: white;
    }

    .remmove span,
    .fa,
    .remove-font {

        color: #A1A1A6;
    }

    .remove span:hover,
    .fa:hover {
        color: #707070;
    }

    .remove-font {
        font-family: "Roboto";
        font-size: 16px;
        font-weight: 100;
    }

    .cart-continue-btn {
        background-color: #1486f9;
        border-radius: 30px;
        font-size: 18px;
        text-decoration: none;
        padding: 0.8vw 2.3vw;
        color: #fff;
        border: 1px solid;
        cursor: pointer;
    }

    .cart-continue-btn:hover {
        color: #fff;
        background-color: #0071E3F7;
    }

    .qty-input {
        border: none;
        outline: none;
        background-color: #fff !important;
        text-align: center;
    }

    .increase-btn,
    .decrease-btn {
        border-radius: 50%;
        width: 25px;
        height: 25px;

    }

    .increase-btn:hover,
    .decrease-btn:hover {
        background-color: #0071e3;
        color: #fff;
    }

    .increase-button {
        display: flex !important;
        align-items: center;
        justify-content: center;

    }

    .wishcart-content-section .wishcart-content {
        max-width: 995px;
        background-color: #ffffff;
        margin: 0 auto;
        border-radius: 10px;
        margin-top: 40px;
        margin-bottom: 60px;
    }

    .wishcart-content-section {
        background-color: #e1e1e1;
        font-family: "Roboto", sans-serif;
    }

    .wish-add-btn {
        background-color: #1486f9;
        border-radius: 50px;
        font-size: 17px;
        font-weight: 100;
        text-decoration: none;
        padding: 10px 25px;
        color: #fff;
        border: 1px solid;
        cursor: pointer;
    }

    .wish-add-btn:hover {
        color: #fff;
        background-color: #0071E3F7;
    }

    .row {
        --bs-gutter-x: 0;
    }

    img,
    svg {
        vertical-align: center !important;
    }

    /*ovi - wishlist empty cart design css*/
    .empty-wishlist-img-area {
        margin: 0 auto !important;
        text-align: center;
    }

    .empty-wishlist-img-area img {
        margin-top: 45px !important;
        margin-bottom: 30px !important;
    }

    .empty-wishlist-title {
        color: #272727;
        font-size: 22px;
        font-weight: 500;
        line-height: 24px;
        font-family: 'Roboto', sans-serif;
        margin-bottom: 5px;
    }

    .empty-wishlist-text {
        color: #272727;
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
        font-family: 'Roboto', sans-serif;
        margin-bottom: 30px;
    }

    .empty-wishlist-btn-area {
        margin-bottom: 30px;
    }

    .empty-wishlist-btn {
        width: 175px !important;
        height: 55px !important;
        margin-bottom: 20px;
        padding: 14px 25px;
        border-radius: 25px !important;
        color: #fff;
        background-color: #2699fb;
        outline: none;
        border: none;
    }

    .empty-wishlist-btn:hover {
        background-color: #0071e3 !important;
        color: #ffffff !important;
    }

    /*--------------------------------------------------------*/
    .free-bagpack-modal-area {
        max-width: 875px !important;
        margin: 0 auto;
        margin-top: 100px;
    }

    .free-bagpack-modal-content {
        height: auto;
        background-color: #000;
        border-radius: 20px;
        padding-top: 50px;
        padding-bottom: 40px;
    }

    .bagpack-area-content {
        display: flex;
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

    .bag-select-area-div {
        width: 340px;
        margin: 5px;
    }

    .select-bag-area {
        padding: 13px 26px;
        position: relative;
        cursor: pointer;
        max-width: 149px;
        max-height: 146px;
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
        margin-top: -5px;
        margin-left: 3px;
    }

    .bag-unchecked {
        position: absolute;
        margin-top: -5px;
        margin-left: 3px;
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
        text-align: center;
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
        text-align: center;
        margin-top: 12px;
    }

    .selected-bagarea {
        padding-top: 25px;
        margin-left: -3px;
    }

    .select-bag-row {
        margin-bottom: 30px;
        max-height: 332px;
        overflow-y: auto;
    }

    .bag-card {
        margin-bottom: 20px;
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
        width: 100%;
        height: 100%;
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
    /*--------------------------------------------------------*/

    #desktop-addtocart-btn {
            display: block;
        }

    #mobile-addtocart-btn {
        display: none;
    }

    #desktop-modal-area {
        display: block;
    }

    #mobile-modal-area {
        display: none;
    }

    /*------------------------------------------------------*/


    /*=====================================================*/
    /*-----------------------------*/
    .select-lania-bag-area {
        padding: 10px 14px;
        object-fit: cover;
        width: 100px;
        height: 110px;
        position: relative;
        cursor: pointer;
    }

    .lania-bagpack-area-content {
        display: flex;
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .lania-bag-select-area-title-top {
        color: #A0A0A5;
        font-size: 16px;
        line-height: 22px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        text-align: left;
        margin-left: 10px;
        margin-top: -3px;
    }

    .lania-bag-select-title {
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

    .lania-stock-out-img {
        width: 75px;
        height: 90px;
        object-fit: cover;
        cursor: not-allowed;
        opacity: 0.2;
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

    .lania-bag-checked {
        position: absolute;
        margin-top: -97px;
        margin-left: 35px;
    }

    .lania-bag-unchecked {
        position: absolute;
        margin-top: -97px;
        margin-left: 35px;
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
        margin-top: -80px;
        margin-left: 33px;
    }

    .keyboard-unchecked {
        position: absolute;
        margin-top: -80px;
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
        padding-top: 7px;
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
        padding-top: 20px;
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
        /* height: 35px; */
        transition: all .3s ease;
    }

    .lania-keyboard-img:hover {
        transform: scale(1.1);
    }

    .lania-keyboard-stock-out-img {
        width: 78px;
        /* height: 35px; */
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
    /*=======================*/
    @media (max-width: 359px) {
        .product-name {
            padding-left: 15px;
            padding-right: 6px;
        }
        .free-bagpack-modal-area {
            max-width: 350px;
            margin: 0 5px;
            margin-top: 80px;
            margin-bottom: 20px;
        }

        .free-bagpack-modal-content {
            padding: 30px 0;
        }

        .bag-select-area-div {
            width: 275px;
            margin: 2px;
        }

        .bag-card {
            margin-bottom: 18px;
        }

        .select-bag-area {
            max-width: 120px;
            max-height: 120px;
        }

        .bagpack-area-content {
            flex-direction: column;
        }

        .bag-select-area-title-top {
            display: none;
        }

        .bag-select-area-title-bottom {
            display: block;
            margin-top: -5px;
        }

        .select-bag-row {
            margin-bottom: 15px;
            display: flex !important;
            flex-direction: row !important;
            max-height: 256px;
        }

        .select-bag-area_firstClmn {
            margin-right: 15px;
        }

        .bag-select-title {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .border-line {
            display: none;
        }

        .border-line-last {
            display: none;
        }

        .free-backpack-modal-title {
            color: #A0A0A5;
            font-size: 35px;
            line-height: 46px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            text-align: center;

        }

        #desktop-addtocart-btn {
            display: none;
        }

        #mobile-addtocart-btn {
            display: block;
        }

        #desktop-modal-area {
            display: none;
        }

        #mobile-modal-area {
            display: block;
        }

        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
        .free-bagpack-modal-area1 {
            max-width: 355px;
            margin: 0 auto;
            margin-top: 80px;
            margin-bottom: 20px;
            padding: 0 10px;
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
            margin-top: -3px;
            margin-left: -6px;
        }

        .bag-unchecked1 {
            position: absolute;
            margin-top: -3px;
            margin-left: -6px;

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
            width: 355px;
            display: flex;
            min-height: 90px;
            align-items: center;
            margin-top: 12px;
        }

        #slider-bag1 {
            width: 350px;
            overflow-x: hidden;
            display: flex;
            gap: 10px;
        }

        .select-lania-bag-area1 {
            padding: 6px 3px;
            object-fit: cover;
            width: 64px;
            height: 72px;
            position: relative;
            cursor: pointer;
        }

        .lania-bag-img1 {
            width: 50px;
            height: 61px;
            transition: all .3s ease;
        }

        .lania-bag-img1:hover {
            transform: scale(1.1);
        }

        .stock-out-img1 {
            width: 50px;
            height: 61px;
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
            width: 210px;
            height: 200px;
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
            gap: 30px;
            margin-left: 24px;
            margin-top: 10px;
            margin-bottom: 10px;
            max-width: 355px;
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

        .mobile-select-lania-keyboard-area {
            padding: 5px 5px;
            object-fit: cover;
            width: 84px;
            height: 77px;
            position: relative;
            cursor: pointer;
            padding-top: 7px;
        }

        .lania-keyboard-img-mobile {
            width: 64px;
            height: 60px;
            transition: all .3s ease;
        }

        .lania-keyboard-img-mobile:hover {
            transform: scale(1.1);
        }

        .lania-keyboard-stock-out-img-mobile {
            width: 64px;
            height: 60px;
            object-fit: cover;
            cursor: not-allowed;
            opacity: 0.2;
        }

        .mobile-keyboard-checked {
            position: absolute;
            margin-top: -2px;
            margin-left: -6px;
        }

        .mobile-keyboard-unchecked {
            position: absolute;
            margin-top: -2px;
            margin-left: -6px;
        }

        .mobile-keyboard-mouse-name-1 {
            margin-left: -42px;
            font-size: 16px;
            width: 100px;
            line-height: 16px;
            color: #A1A1A6;
            padding-top: 20px;
        }

        .mobile-keyboard-mouse-name-2 {
            margin-left: -58px;
            font-size: 16px;
            width: 100px;
            line-height: 0px;
            color: #A1A1A6;
        }

        .lania-back-modal-btn {
            margin-top: 28px;
            width: 175px !important;
            height: 55px !important;
            margin-bottom: 20px;
            padding: 7px 27px;
            border-radius: 25px !important;
            color: #3C3C3C;
            background-color: #CCCCCC;
            outline: none;
            border: none;
        }

        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
    }
    /*------------------------------------------------------*/
    @media (min-width: 360px) and (max-width: 380px) {
        .product-name {
            padding-left: 15px;
            padding-right: 6px;
        }

        .free-bagpack-modal-area {
            max-width: 370px;
            margin: 0 5px;
            margin-top: 80px;
            margin-bottom: 20px;
        }

        .free-bagpack-modal-content {
            padding: 30px 0;
        }

        .bagpack-area-content {
            flex-direction: column;
        }

        .bag-select-area-div {
            width: 320px;
            margin: 3px;
        }

        .select-bag-area {
            max-width: 138px;
            max-height: 138px;
        }

        .bag-card {
            margin-bottom: 20px;
        }

        .bag-select-area-title-top {
            display: none;
        }

        .bag-select-area-title-bottom {
            display: block;
            margin-top: -5px;
        }

        .select-bag-row {
            margin-bottom: 15px;
            display: flex !important;
            flex-direction: row !important;
            max-height: 304px;
        }

        .select-bag-area_firstClmn {
            margin-right: 15px;
        }

        .bag-select-title {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .border-line {
            display: none;
        }

        .border-line-last {
            display: none;
        }

        .free-backpack-modal-title {
            color: #A0A0A5;
            font-size: 35px;
            line-height: 46px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            text-align: center;

        }

        #desktop-addtocart-btn {
            display: none;
        }

        #mobile-addtocart-btn {
            display: block;
        }

        #desktop-modal-area {
            display: none;
        }

        #mobile-modal-area {
            display: block;
        }

        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
        .free-bagpack-modal-area1 {
            max-width: 355px;
            margin: 0 auto;
            margin-top: 80px;
            margin-bottom: 20px;
            padding: 0 10px;
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
            margin-top: -3px;
            margin-left: -6px;
        }

        .bag-unchecked1 {
            position: absolute;
            margin-top: -3px;
            margin-left: -6px;

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
            width: 355px;
            display: flex;
            min-height: 90px;
            align-items: center;
            margin-top: 12px;
        }

        #slider-bag1 {
            width: 350px;
            overflow-x: hidden;
            display: flex;
            gap: 15px;
        }

        .select-lania-bag-area1 {
            padding: 6px 3px;
            object-fit: cover;
            width: 64px;
            height: 72px;
            position: relative;
            cursor: pointer;
        }

        .lania-bag-img1 {
            width: 50px;
            height: 61px;
            transition: all .3s ease;
        }

        .lania-bag-img1:hover {
            transform: scale(1.1);
        }

        .stock-out-img1 {
            width: 50px;
            height: 61px;
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
            gap: 30px;
            margin-left: 24px;
            margin-top: 10px;
            margin-bottom: 10px;
            max-width: 355px;
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

        .mobile-select-lania-keyboard-area {
            padding: 5px 5px;
            object-fit: cover;
            width: 84px;
            height: 77px;
            position: relative;
            cursor: pointer;
            padding-top: 7px;
        }

        .lania-keyboard-img-mobile {
            width: 64px;
            height: 60px;
            transition: all .3s ease;
        }

        .lania-keyboard-img-mobile:hover {
            transform: scale(1.1);
        }

        .lania-keyboard-stock-out-img-mobile {
            width: 64px;
            height: 60px;
            object-fit: cover;
            cursor: not-allowed;
            opacity: 0.2;
        }

        .mobile-keyboard-checked {
            position: absolute;
            margin-top: -2px;
            margin-left: -6px;
        }

        .mobile-keyboard-unchecked {
            position: absolute;
            margin-top: -2px;
            margin-left: -6px;
        }

        .mobile-keyboard-mouse-name-1 {
            margin-left: -42px;
            font-size: 16px;
            width: 100px;
            line-height: 16px;
            color: #A1A1A6;
            padding-top: 20px;
        }

        .mobile-keyboard-mouse-name-2 {
            margin-left: -58px;
            font-size: 16px;
            width: 100px;
            line-height: 0px;
            color: #A1A1A6;
        }

        .lania-back-modal-btn {
            margin-top: 28px;
            width: 175px !important;
            height: 55px !important;
            margin-bottom: 20px;
            padding: 7px 27px;
            border-radius: 25px !important;
            color: #3C3C3C;
            background-color: #CCCCCC;
            outline: none;
            border: none;
        }

        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
    }
    /*------------------------------------------------------*/

    /*------------------------------------------------------*/
    @media (min-width: 381px) and (max-width: 480px) {
        .product-name {
            padding-left: 15px;
            padding-right: 6px;
        }

        .free-bagpack-modal-area {
            max-width: 395px;
            margin: 0 5px;
            margin-top: 80px;
            margin-bottom: 20px;
        }

        .free-bagpack-modal-content {
            padding: 30px 0;
        }

        .select-bag-area {
            max-width: 148px;
            max-height: 148px;
        }

        .bag-select-area-div {
            width: 340px;
            margin: 3px;
        }

        .bagpack-area-content {
            flex-direction: column;
        }

        .bag-select-area-title-top {
            display: none;
        }

        .bag-select-area-title-bottom {
            display: block;
            margin-top: -5px;
        }

        .select-bag-row {
            margin-bottom: 15px;
            display: flex !important;
            flex-direction: row !important;
            max-height: 329px;
        }

        .bag-card {
            margin-bottom: 20px;
        }

        .select-bag-area_firstClmn {
            margin-right: 15px;
        }

        .bag-select-title {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .border-line {
            display: none;
        }

        .border-line-last {
            display: none;
        }

        .free-backpack-modal-title {
            color: #A0A0A5;
            font-size: 35px;
            line-height: 46px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            text-align: center;

        }

        #desktop-addtocart-btn {
            display: none;
        }

        #mobile-addtocart-btn {
            display: block;
        }

        #desktop-modal-area {
            display: none;
        }

        #mobile-modal-area {
            display: block;
        }

        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
        .free-bagpack-modal-area1 {
            max-width: 355px;
            margin: 0 auto;
            margin-top: 80px;
            margin-bottom: 20px;
            padding: 0 10px;
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
            margin-top: -3px;
            margin-left: -6px;
        }

        .bag-unchecked1 {
            position: absolute;
            margin-top: -3px;
            margin-left: -6px;

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
            width: 380px;
            display: flex;
            min-height: 90px;
            align-items: center;
            margin-top: 12px;
        }

        #slider-bag1 {
            width: 375px;
            overflow-x: hidden;
            display: flex;
            gap: 15px;
        }

        .select-lania-bag-area1 {
            padding: 6px 3px;
            object-fit: cover;
            width: 64px;
            height: 72px;
            position: relative;
            cursor: pointer;
        }

        .lania-bag-img1 {
            width: 50px;
            height: 61px;
            transition: all .3s ease;
        }

        .lania-bag-img1:hover {
            transform: scale(1.1);
        }

        .stock-out-img1 {
            width: 50px;
            height: 61px;
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
            gap: 30px;
            margin-left: 24px;
            margin-top: 10px;
            margin-bottom: 10px;
            max-width: 355px;
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

        .mobile-select-lania-keyboard-area {
            padding: 5px 5px;
            object-fit: cover;
            width: 84px;
            height: 77px;
            position: relative;
            cursor: pointer;
            padding-top: 7px;
        }

        .lania-keyboard-img-mobile {
            width: 64px;
            height: 60px;
            transition: all .3s ease;
        }

        .lania-keyboard-img-mobile:hover {
            transform: scale(1.1);
        }

        .lania-keyboard-stock-out-img-mobile {
            width: 64px;
            height: 60px;
            object-fit: cover;
            cursor: not-allowed;
            opacity: 0.2;
        }

        .mobile-keyboard-checked {
            position: absolute;
            margin-top: -2px;
            margin-left: -6px;
        }

        .mobile-keyboard-unchecked {
            position: absolute;
            margin-top: -2px;
            margin-left: -6px;
        }

        .mobile-keyboard-mouse-name-1 {
            margin-left: -42px;
            font-size: 16px;
            width: 100px;
            line-height: 16px;
            color: #A1A1A6;
            padding-top: 20px;
        }

        .mobile-keyboard-mouse-name-2 {
            margin-left: -58px;
            font-size: 16px;
            width: 100px;
            line-height: 0px;
            color: #A1A1A6;
        }

        .lania-back-modal-btn {
            margin-top: 28px;
            width: 175px !important;
            height: 55px !important;
            margin-bottom: 20px;
            padding: 7px 27px;
            border-radius: 25px !important;
            color: #3C3C3C;
            background-color: #CCCCCC;
            outline: none;
            border: none;
        }

        /*============= Lania Bag & Keyboard Modal Mobile Version css ===================*/
    }
    /*------------------------------------------------------*/

    /*----------------------------------------------------*/
    @media (min-width: 481px) and (max-width: 820px){
        .free-bagpack-modal-area {
            max-width: 670px !important;
        }

        .bag-select-area-div {
            width: 325px;
            margin: 3px;
        }

        .select-bag-row {
            max-height: 314px;
        }

        .select-bag-area {
            max-width: 142px;
            max-height: 140px;
        }

        .bag-select-area-title-top {
            margin-top: 15px;
        }

        .wishcart-content-section .wishcart-content {
            max-width: 553px;


        }

        /* img.img-fluid {
            height: auto !important;
            object-fit: cover;
            width: 100% !important;
        } */

        .img-fluid {
            width: 100% !important;
        }

        .product-name {
            padding: 19px 19px 0px;
        }

        .button-increase {
            margin-top: 0px;
        }

        .wishlist-amount {
            margin-top: 20px;
        }

        .wishlist-delete {
            margin-top: 0px;
        }

        .addd-to-cart-btn {
            margin-top: 0px;
            padding-bottom: 20px;
        }

        .padding-btn {
            padding: 0px !important;
        }

        .left {
            text-align: left !important;
            padding-left: 20px;
        }

        .increase-button {
            justify-content: left;
            padding-left: 20px;

        }

        .border-line {
            width: 550px;
        }

        .border-line-last {
            width: 550px;
        }

        .selected-bagarea {
            margin-left: -20px;
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
    /*----------------------------------------------------*/

    @media (min-width: 821px) and (max-width: 980px) {
        .wishcart-content {
            width: 745px;
        }

        img.img-fluid {
            width: 100% !important;
            max-width: 100% !important;
            height: auto !important;
        }

        .product-name {
            padding: 19px 19px 0px;
        }

        .button-increase {
            margin-top: 0px;
        }

        .wishlist-amount {
            margin-top: 20px;
        }

        .wishlist-delete {
            margin-top: 0px;
        }

        .addd-to-cart-btn {
            margin-top: 0px;
            padding-bottom: 20px;
        }

        .left {
            text-align: left !important;
            padding-left: 20px;
        }

        .padding-btn {
            padding: 0px !important;
        }

        .increase-button {
            justify-content: left;
            padding-left: 20px;

        }

        .free-bagpack-modal-area {
            max-width: 670px !important;
        }

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
                        <a href="{{route('warranty')}}">Warranty</a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-end">
                        <?php
                            if(session()->has('USER_LOGIN')) {
                        ?>
                        <a class="active-nav" href="{{route('wishlists')}}">Wishlist</a>
                        <?php } else {?>
                        <a href="javascript:void(0)" onclick="wishlistCartModal()">Wishlist</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section>

<!-- <Section class="qbits-top-bottom">
    <div class="container">
        <div class="middle-qbits-menu">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="me-2">We will offer 10% off. *</span><a href="javascript:void(0)"
                            style="text-decoration: none" onclick="offerCode()">Click for code ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section> -->

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

    $all_keyboardmouse = App\Models\Product::where('sub_category','keyboard-mouse')->where('status','1')->get();
?>

<section class="wishcart-content-section" id="wishcart-content-section">
    <div class="cart-details">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <?php if(App\Models\Wishlist::totalItems() > 0){?>
                <form class="form">
                    @csrf
                    <div class="wishcart-content pt-3">
                        <h5 class="container" style="padding-left: 14px">My Wishlist</h5>
                        @php
                        $total = 0;
                        @endphp
                        <hr style="color: #C8C8C8">


                        @foreach (App\Models\Wishlist::totalWishlists() as $list)
                        @php
                        // $total += ($list['unit_price'] * $list['quantity']);
                        $total += $list['total_price'];
                        @endphp
                        <div class="row container" id="list_box{{$list->id}}">
                            <div class="col-lg-7 col-md-12">
                                <div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12" style="margin: auto 0">
                                            <div class="shopping-cart-image px-3">
                                                <img src="{{ asset($list->product->galary_photo) }}" class="img-fluid"
                                                    style="width: 80%" alt="">
                                            </div>
                                        </div>
                                        <?php if($list->product_category == 'Accessory'){?>
                                            <div class="col-lg-6 col-md-12 product-name" style="margin-top: 32px;">
                                                <p style="font-size: 16px;">{{ $list->product->name }}</p>
                                            </div>
                                        <?php } else {?>
                                            <div class="col-lg-6 col-md-12 product-name" style="margin-top: 5px;">
                                                <p style="font-size: 16px;">{{ $list->product->name }} {{$list->ram_name}} DDR4 RAM {{$list->ssd_name}} M.2 NVMe SSD</p>
                                            </div>
                                        <?php }?>
                                        <div class="col-lg-3 col-md-12 button-increase">
                                            <div class="increase-button">
                                                <button type="button" class="border-0 decrease-btn"
                                                    onclick="decreaseWQty('{{$list->id}}','{{$list->product->unit_price}}','{{$list->product_id}}','{{$list->ram_id}}','{{$list->ram_unit_price}}','{{$list->ssd_id}}','{{$list->ssd_unit_price}}')">-</button>
                                                <input id="qty{{$list->id}}" type="text" class="qty-input form-control"
                                                    value="{{ $list->quantity }}" style="width: 50px;margin-top: 0.2vw;"
                                                    readonly>
                                                <button type="button" class="border-0 increase-btn"
                                                    onclick="increaseWQty('{{$list->id}}','{{$list->product->unit_price}}','{{$list->product_id}}','{{$list->ram_id}}','{{$list->ram_unit_price}}','{{$list->ssd_id}}','{{$list->ssd_unit_price}}')">+</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            @php
                            // $subt = $list->product->unit_price * $list->quantity;
                            $subt = $list->total_price;
                            @endphp
                            <div class="col-lg-5 col-md-12">

                                <div>
                                    <div class="row">

                                        <div class="col-lg-3 col-md-12 wishlist-amount" style="">
                                            <p class="left text-center fw-bold">৳<span
                                                    id="total_price_{{$list->id}}">{{number_format($subt)}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12 wishlist-delete" style="">
                                            <p class="left text-center"><a href="javascript:void(0)"
                                                    class="btn padding-btn btn-icon btn-sm btn-soft-primary btn-circle"
                                                    onclick="deleteWishData('{{$list->id}}','{{$list->product_id}}')">
                                                    <i class="fa remove fa-trash fa-1x"><span
                                                            class="ms-3 remove-font">Remove</span></i>
                                                </a></p>

                                        </div>
                                        <?php 
                                            $category_name = App\Models\Product::select('category')->where('id',$list->product->id)->where('status','1')->first();
                                        ?>
                                        <div class="col-lg-5 col-md-12 addd-to-cart-btn left text-center">
                                            <?php if($category_name->category == 'Laptop'){?>
                                            <button type="button" class="wish-add-btn" onclick="convertToCartLaptop()">Add to Cart</button>
                                            <?php } elseif($category_name->category == 'Desktop') {?>
                                            <div id="desktop-addtocart-btn">
                                                <button type="button" class="wish-add-btn" onclick="convertToCartDesktop()">Add to Cart</button>
                                            </div>
                                            <div id="mobile-addtocart-btn">
                                                <button type="button" class="wish-add-btn" onclick="convertToCartMobile()">Add to Cart</button>
                                            </div>
                                            <?php } elseif($category_name->category == 'Accessory') { ?>
                                            <button type="button" class="wish-add-btn" onclick="add_to_cart_submit_accessories('{{$list->id}}','{{$list->product_id}}')">Add to Cart</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" class="product_id" value="{{ $list->product->id}}">

                            <!-- Modal for free bagpack -->
                            <div class="modal blur fade" id="freeBagPackModalShow" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog free-bagpack-modal-area" role="document">
                                    <div class="modal-content free-bagpack-modal-content">
                                        <div class="modal-body pt-md-0 px-4 px-md-5 text-center">
                                            <p class="free-backpack-modal-title"
                                                id="free-backpack-modal-title">Choose your free backpack</p>
                                            <p class="free-backpack-modal-text">Qbits laptops come with a
                                                complementary backpack, professionally
                                                tailored only for Qbits to suit your requirements.</p>
                                            <div class="border-line"></div>
                                            <form id="backpackSubmitFrm">
                                                @csrf
                                                <div class="row">
                                                    <div class="container bagpack-area-content">

                                                        <?php 
                                                            if(!$all_outstock_backpack->isEmpty()){
                                                                for($i = 0; $i < count($all_bag_colors); $i++){
                                                                    if(in_array( $all_bag_colors[$i], $outstock_bag_colors)){
                                                                        continue;
                                                                    } else {
                                                        ?>
                                                                        <div
                                                                            class="col-12 col-sm-12 col-lg-6 col-md-6 selected-bagarea">
                                                                            <img src="{{ asset($all_backpack[$i]->galary_photo) }}"
                                                                                id="bag_galary_photo" alt="Selected Bag">
                                                                            <p class="bag-select-title">You have selected
                                                                                <span id="bag_color">{{json_decode($all_backpack[$i]->attributes)[0]->attribute_value}}</span> backpack
                                                                            </p>
                                                                        </div>
                                                        <?php break; } } } else {?>
                                                        <div
                                                            class="col-12 col-sm-12 col-lg-6 col-md-6 selected-bagarea">
                                                            <img src="{{ asset($all_backpack[0]->galary_photo) }}"
                                                                id="bag_galary_photo" alt="Selected Bag">
                                                            <p class="bag-select-title">You have selected
                                                                <span id="bag_color">{{json_decode($all_backpack[0]->attributes)[0]->attribute_value}}</span> backpack
                                                            </p>
                                                        </div>
                                                        <?php } ?>

                                                        <div class="col-12 col-sm-12 col-lg-5 col-md-6 bag-select-area-div">
                                                            <p class="bag-select-area-title-top">Select your
                                                                free backpack color :</p>

                                                            <div class="row select-bag-row">

                                                                <?php $is_checked = '';?>
                                                                @foreach($all_backpack as $key => $backpack)

                                                                <?php if(in_array( $all_bag_colors[$key], $outstock_bag_colors)){?>
                                                                    <div class="col-6 col-sm-6 col-lg-6 col-md-6 bag-card">
                                                                        <div class="select-bag-area unselected-bag-bg disabled-bag-area"
                                                                            id="select_bag_area_{{$key}}" onclick="change_free_bag('{{$backpack->galary_photo}}','{{$backpack->id}}','{{json_decode($all_backpack[$key]->attributes)[0]->attribute_value}}','{{json_encode($bag_id_arr)}}','no')">
                                                                            <img src="{{ asset($backpack->galary_photo) }}"
                                                                                class="stock-out-img"
                                                                                alt="Bag">
                                                                            <img src="{{ asset('frontend/assets/images/bag_uncheck.png') }}"
                                                                                id="bag_mark_{{$key}}"
                                                                                alt="Unchecked"
                                                                                class="bag-unchecked">
                                                                        </div>
                                                                    </div> 
                                                                <?php
                                                                        } else {
                                                                        if($is_checked == ''){
                                                                ?>
                                                                            <div class="col-6 col-sm-6 col-lg-6 col-md-6 bag-card">
                                                                                <div class="select-bag-area selected-bag-bg"
                                                                                    id="select_bag_area_{{$key}}"
                                                                                    onclick="change_free_bag('{{$backpack->galary_photo}}','{{$backpack->id}}','{{json_decode($all_backpack[$key]->attributes)[0]->attribute_value}}','{{json_encode($bag_id_arr)}}','yes')">
                                                                                    <img src="{{ asset($backpack->galary_photo) }}"
                                                                                        class="zoom-bag-img"
                                                                                        alt="Bag">
                                                                                    <img src="{{ asset('frontend/assets/images/bag_check.png') }}"
                                                                                        id="bag_mark_{{$key}}"
                                                                                        alt="Checked"
                                                                                        class="bag-checked">
                                                                                </div>
                                                                            </div>
                                                                            <input type="hidden" name="free_bag_id" id="free_bag_id" value="{{ $backpack->id }}">

                                                                <?php $is_checked = 'yes'; } else { ?>
                                                                    <div class="col-6 col-sm-6 col-lg-6 col-md-6 bag-card">
                                                                        <div class="select-bag-area unselected-bag-bg"
                                                                            id="select_bag_area_{{$key}}"
                                                                            onclick="change_free_bag('{{$backpack->galary_photo}}','{{$backpack->id}}','{{json_decode($all_backpack[$key]->attributes)[0]->attribute_value}}','{{json_encode($bag_id_arr)}}','yes')">
                                                                            <img src="{{ asset($backpack->galary_photo) }}"
                                                                                class="zoom-bag-img"
                                                                                alt="Bag">
                                                                            <img src="{{ asset('frontend/assets/images/bag_uncheck.png') }}"
                                                                                id="bag_mark_{{$key}}"
                                                                                alt="Unchecked"
                                                                                class="bag-unchecked">
                                                                        </div>
                                                                    </div>
                                                                <?php } }?>
                                                                @endforeach
                                                            </div>
                                                            <p class="bag-select-area-title-bottom">Select
                                                                your free backpack color :</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="border-line-last"></div>
                                            <button type="button" class="modal-continue-btn"
                                                style="margin-bottom: 0px;float: none;"
                                                onclick="add_to_cart_submit('{{$list->id}}','{{$list->product_id}}')"
                                                id="add_to_cart_submit_btn">Proceed</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row m-0">
                                <div class="col-md-12 col-lg-12">
                                    <hr style="color: #C8C8C8;margin-top: 0px;">
                                </div>
                            </div>

                        <!-- Desktop Modal for free bagpack & Keyboard -->
                         <div id="desktop-modal-area">
                            <div class="modal blur fade" id="laniaFreeBagPackModalShow" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog free-bagpack-modal-area" role="document">
                                    <div class="modal-content free-bagpack-modal-content">
                                        <div class="modal-body pt-md-0 px-4 px-md-5 text-center">
                                            <p class="free-backpack-modal-title"
                                                id="free-backpack-modal-title">Choose your free backpack and
                                                mouse keyboard</p>
                                            <form id="backpackSubmit">
                                                @csrf
                                                <div class="row">
                                                    <div class="container lania-bagpack-area-content">

                                                        <div
                                                            class="col-12 col-sm-12 col-lg-9 col-md-9 lania-bag-select-area-div">
                                                            <p class="lania-bag-select-area-title-top">Select your
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
                                                                        @foreach($all_backpack as $key =>
                                                                        $backpack)

                                                                        <?php if(in_array( $all_bag_colors[$key], $outstock_bag_colors)){?>
                                                                        <div class="select-lania-bag-area unselected-bag-bg disabled-bag-area"
                                                                            id="select_lania-bag_area_{{$key}}"
                                                                            onclick="changeLaniaBag('{{$backpack->galary_photo}}','{{$backpack->id}}','{{json_decode($all_backpack[$key]->attributes)[0]->attribute_value}}','{{json_encode($bag_id_arr)}}','no')">
                                                                            <img class="lania-stock-out-img"
                                                                                src="{{ asset($backpack->galary_photo) }}" />
                                                                            <img src="{{ asset('frontend/assets/images/bag_unchecked_small.png') }}"
                                                                                id="lania_bag_mark_{{$key}}"
                                                                                alt="Unchecked"
                                                                                class="lania-bag-unchecked">
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
                                                                                id="lania_bag_mark_{{$key}}"
                                                                                alt="Checked"
                                                                                class="lania-bag-checked">
                                                                        </div>
                                                                        <input type="hidden"
                                                                            name="lania_free_bag_id"
                                                                            id="lania_free_bag_id"
                                                                            value="{{ $backpack->id }}">
                                                                        <?php $is_checked = 'yes'; } else { ?>
                                                                        <div class="select-lania-bag-area unselected-bag-bg"
                                                                            id="select_lania-bag_area_{{$key}}"
                                                                            onclick="changeLaniaBag('{{$backpack->galary_photo}}','{{$backpack->id}}','{{json_decode($all_backpack[$key]->attributes)[0]->attribute_value}}','{{json_encode($bag_id_arr)}}','yes')">
                                                                            <img class="lania-bag-img"
                                                                                src="{{ asset($backpack->galary_photo) }}" />
                                                                            <img src="{{ asset('frontend/assets/images/bag_unchecked_small.png') }}"
                                                                                id="lania_bag_mark_{{$key}}"
                                                                                alt="Unchecked"
                                                                                class="lania-bag-unchecked">
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
                                                            <p class="lania-bag-select-title">You have selected
                                                                <span
                                                                    id="lania_bag_color">{{strtolower(json_decode($all_backpack[$i]->attributes)[0]->attribute_value)}}</span>
                                                                backpack
                                                            </p>
                                                        </div>

                                                        <div
                                                            class="col-12 col-sm-12 col-lg-3 col-md-3 selected-lania-bagarea">
                                                            <div class="galary_bag_div">
                                                                <img src="{{ asset($all_backpack[$i]->galary_photo) }}"
                                                                    id="lania_bag_galary_photo"
                                                                    alt="Selected Bag">
                                                            </div>

                                                        </div>

                                                        <?php break; } } } else {?>

                                                        <p class="lania-bag-select-title">You have selected
                                                            <span
                                                                id="lania_bag_color">{{json_decode($all_backpack[0]->attributes)[0]->attribute_value}}</span>
                                                            backpack
                                                        </p>
                                                    </div>

                                                    <div
                                                        class="col-12 col-sm-12 col-lg-3 col-md-3 selected-lania-bagarea">
                                                        <div class="galary_bag_div">
                                                            <img src="{{ asset($all_backpack[0]->galary_photo) }}"
                                                                id="bag_galary_photo" alt="Selected Bag">
                                                        </div>

                                                    </div>
                                                    <?php } ?>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="container keyboard-area-content">

                                                    <div
                                                        class="col-12 col-sm-12 col-lg-9 col-md-9 lania-bag-select-area-div">
                                                        <p class="keyboard-select-area-title-top">Select your
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
                                                                        id="free_keyboard_mark" alt="Checked"
                                                                        class="keyboard-checked">
                                                                </div>
                                                                <div
                                                                    class="select-lania-keyboard-area keyboard-name-area">
                                                                    <p class="keyboard-mouse-name-1">Free mouse
                                                                        &</p>
                                                                    <p class="keyboard-mouse-name-2">keyboard
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
                                                                    <p class="wireless-keyboard-mouse-name-1">
                                                                        Wireless mouse</p>
                                                                    <p class="wireless-keyboard-mouse-name-2">&
                                                                        keyboard</p>
                                                                    <p class="wireless-keyboard-mouse-name-3">(
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
                                            onclick="add_to_cart_submit_desktop('{{$list->id}}','{{$list->product_id}}')"
                                            id="add_to_cart_proceed_btn">Proceed</button>
                                        </div>   
                                    </div>
                                </div>
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
                                                id="free-backpack-modal-title1">Choose your free backpack</p>
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
                                                                <img src="{{ asset($all_backpack[$i]->galary_photo) }}" id="bag_galary_photo1" alt="Selected Bag">
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
                                                                <img src="{{ asset($all_backpack[0]->galary_photo) }}" id="bag_galary_photo1" alt="Selected Bag">
                                                            </div>
                                                            <p class="bag-select-title1">You have selected
                                                                <span
                                                                    id="bag_color1">{{json_decode($all_backpack[0]->attributes)[0]->attribute_value}}</span>
                                                                backpack
                                                            </p>
                                                        </div>
                                                        <?php } ?>
                                                        <div class="col-12 col-sm-12 lania-bag-select-area-div1">

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

                                        <div id="mobile-lania-keyboard-modal" class="modal-body text-center">
                                            <p class="free-backpack-modal-title1"
                                                id="free-backpack-modal-title1">Choose your free mouse keyboard</p>
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
                                                        <div class="col-12 col-sm-12 lania-bag-select-area-div">
                                                            <div class="row select-keyboard-row1">
                                                                <input type="hidden" name="select_keyboard_id"
                                                                    id="select_keyboard_id1"
                                                                    value="{{ $all_keyboardmouse[1]->id }}">
                                                                <input type="hidden" name="select_keyboard_type"
                                                                    id="select_keyboard_type1" value="free">
                                                                <div id="keyboard-field1">
                                                                    <div class="mobile-select-lania-keyboard-area selected-keyboard-bg"
                                                                        id="select_lania_free_keyboard_area_mobile"
                                                                        onclick="changeLaniaFreeKeyboard('{{$all_keyboardmouse[1]->galary_photo}}','{{$all_keyboardmouse[1]->id}}','yes')">
                                                                        <img class="lania-keyboard-img-mobile"
                                                                            src="{{ asset($all_keyboardmouse[1]->galary_photo) }}" />
                                                                        <img src="{{ asset('frontend/assets/images/bag_checked_small.png') }}"
                                                                            id="free_keyboard_mark_mobile" alt="Checked"
                                                                            class="mobile-keyboard-checked">
                                                                    </div>
                                                                    <div
                                                                        class="mobile-select-lania-keyboard-area keyboard-name-area">
                                                                        <p class="mobile-keyboard-mouse-name-1">Free mouse
                                                                            &</p>
                                                                        <p class="mobile-keyboard-mouse-name-2">keyboard
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div id="keyboard-field1">
                                                                    <?php if($all_keyboardmouse[0]->current_stock > 0){?>
                                                                    <div class="mobile-select-lania-keyboard-area unselected-keyboard-bg"
                                                                        id="select_lania_wireless_keyboard_area_mobile_1"
                                                                        onclick="changeLaniaWirelessKeyboard('{{$all_keyboardmouse[0]->galary_photo}}','{{$all_keyboardmouse[0]->id}}','yes')">
                                                                        <img class="lania-keyboard-img-mobile"
                                                                            src="{{ asset($all_keyboardmouse[0]->galary_photo) }}" />
                                                                        <img src="{{ asset('frontend/assets/images/bag_unchecked_small.png') }}"
                                                                            id="wireless_keyboard_mark_mobile_1"
                                                                            alt="Unchecked"
                                                                            class="mobile-keyboard-unchecked">
                                                                    </div>
                                                                    <?php } else {?>
                                                                    <div class="mobile-select-lania-keyboard-area unselected-keyboard-bg disabled-bag-area"
                                                                        id="select_lania_wireless_keyboard_area_mobile_2"
                                                                        onclick="changeLaniaWirelessKeyboard('{{$all_keyboardmouse[0]->galary_photo}}','{{$all_keyboardmouse[0]->id}}','no')">
                                                                        <img class="lania-keyboard-stock-out-img-mobile"
                                                                            src="{{ asset($all_keyboardmouse[0]->galary_photo) }}" />
                                                                        <img src="{{ asset('frontend/assets/images/bag_unchecked_small.png') }}"
                                                                            id="wireless_keyboard_mark_mobile_2"
                                                                            alt="Unchecked"
                                                                            class="mobile-keyboard-unchecked">
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="mobile-select-lania-keyboard-area wireless-keyboard-name-area"
                                                                        id="select_lania-keyboard_area4">
                                                                        <p class="wireless-keyboard-mouse-name-1">
                                                                            Wireless mouse</p>
                                                                        <p class="wireless-keyboard-mouse-name-2">&
                                                                            keyboard</p>
                                                                        <p class="wireless-keyboard-mouse-name-3">(
                                                                            Extra ৳1000 )</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="keyboard-select-area-title-top1">Select your
                                                                free mouse & keyboard :</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <button type="button" class="modal-continue-btn"
                                                style="margin-bottom: 0px;float: none;"
                                                onclick="add_to_cart_submit_mobile('{{$list->id}}','{{$list->product_id}}')"
                                                id="add_to_cart_proceed_btn">Proceed</button>

                                                <button type="button" class="lania-back-modal-btn"
                                                style="margin-bottom: 0px;float: none;"
                                                onclick="backToBag()"
                                                id="lania-back-modal-btn">Back</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mobile Modal for free bagpack -->
                        @endforeach

                    </div>
                </form>
                <?php } else {?>
                <div class="wishcart-content pt-3">
                    <h5 class="container" style="margin-left: 14px">My Wishlist</h5>
                    <hr style="color: #C8C8C8">
                    <div class="empty-wishlist-img-area">
                        <img src="{{ asset('frontend/assets/images/wishlist_empty_bag.png') }}"
                            style="width: 80px; height: 100px;" alt="Empty Wishlist">
                    </div>
                    <p class="text-center empty-wishlist-title">Your wishlist is empty!</p>
                    <p class="text-center empty-wishlist-text">Explore more and shortlist some items</p>
                    <div style="text-align: center;" class="empty-wishlist-btn-area">
                        <a type="button" href="{{route('buy')}}" class="empty-wishlist-btn"
                            style="text-decoration: none;">Shop Now</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Najmul Ovi
    function decreaseWQty(list_id, u_price, pid, ram_id = null, ram_unit_price, ssd_id = null, ssd_unit_price) {
        var qty = jQuery('#qty' + list_id).val();
        if (qty > 1) {
            qty--;
            jQuery('#qty' + list_id).val(qty);
            add_to_mywish(pid, -1, ram_id, ssd_id);
            var u_price = parseInt(u_price);
            var total = (u_price * qty) + (ram_unit_price * qty) + (ssd_unit_price * qty);
            total = total.toLocaleString('en-US');
            jQuery('#total_price_' + list_id).html(total);
        }
    }

    function increaseWQty(list_id, u_price, pid, ram_id = null, ram_unit_price, ssd_id = null, ssd_unit_price) {
        var qty = jQuery('#qty' + list_id).val();
        qty++;
        jQuery('#qty' + list_id).val(qty);
        add_to_mywish(pid, 1, ram_id, ssd_id);
        var u_price = parseInt(u_price);
        var total = (u_price * qty) + (ram_unit_price * qty) + (ssd_unit_price * qty);
        total = total.toLocaleString('en-US');
        jQuery('#total_price_' + list_id).html(total);
    }

    function deleteWishData(list_id, pid) {
        jQuery('#w_pqty').val(0);
        add_to_mywish(pid, 0);
        jQuery('#list_box' + list_id).hide();
    }


    function add_to_mywish(id, qty, ram_id, ssd_id) {

        jQuery('#prod_id').val(id);
        jQuery('#p_qty').val(qty);
        if(ram_id){
            jQuery('#ram_id').val(ram_id);
        }
        if(ssd_id){
            jQuery('#ssd_id').val(ssd_id);
        }
        var data = jQuery('#frmAddToWish').serialize();
        // toastr.options = {
        //   "closeButton": true,
        //   "newestOnTop": true,
        //   "progressBar": true,
        //   "timeOut": "2000",
        //   "positionClass": "toast-top-right"
        // };
        jQuery.ajax({
            url: '/quantity_updated_wishlist',
            data: data,
            type: 'post',
            success: function (result) {
                if (result.type == 'updated') {
                    // toastr.info(result.msg);
                }
                if (result.type == 'deleted') {
                    if (result.totalItem == 0) {
                        // toastr.warning('All Item has been removed from Wishlist');
                        location.reload();
                    } else {
                        // toastr.warning(result.msg);
                    }
                }
            }
        });
    }

    function convertToCartLaptop(){
        $('#freeBagPackModalShow').modal('show');
    }

    function convertToCartDesktop(){
        $('#laniaFreeBagPackModalShow').modal('show');
    }

    function convertToCartMobile(){
        $('#mobileLaniaFreeBagPackModalShow').modal('show');
    }

    function add_to_cart_submit(list_id, pid) {
        var qty = jQuery('#qty' + list_id).val();
        jQuery('#product_id').val(pid);
        jQuery('#product_qty').val(qty);
        jQuery('#wishlist_id').val(list_id);
        var bag_id = jQuery('#free_bag_id').val();
        jQuery('#bag_id').val(jQuery('#free_bag_id').val());
        var data = jQuery('#frmConvertToCart').serialize();
        // toastr.options = {
        //   "closeButton": true,
        //   "newestOnTop": true,
        //   "progressBar": true,
        //   "timeOut": "2000",
        //   "positionClass": "toast-top-right"
        // };
        jQuery.ajax({
            url: '/convert_to_cart',
            data: data,
            type: 'post',
            success: function (result) {
                if (result.type == 'success') {
                    if (result.totalItem == 0) {
                        jQuery('#cart-menu').hide();
                        jQuery('#mob-cart-menu').hide();
                        jQuery('#list_box' + list_id).hide();

                        // cart quantity aded without reload
                        var cart_val = jQuery('#cart-val').html();
                        if (cart_val == undefined) {
                            var html =
                                '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                                result.cartItem + '</span></span>';
                            jQuery('.shopping-cart-icon').html(html);
                        } else {
                            jQuery('#cart-val').html(result.cartItem);
                        }

                        // toastr.success(result.msg);
                        location.reload();
                    } else {
                        jQuery('#list_box' + list_id).hide();

                        // cart quantity aded without reload
                        var cart_val = jQuery('#cart-val').html();
                        var mob_cart_val = jQuery('#mob-cart-val').html();
                        if (cart_val == undefined || mob_cart_val == undefined) {
                            var html =
                                '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                                result.cartItem + '</span></span>';
                            jQuery('.shopping-cart-icon').html(html);
                            jQuery('.mob-shopping-cart-icon').html(html1);

                            document.getElementById("productpage-area-section").style.opacity = "0.5";
                            document.getElementById("cart-box").style.display = "block";
                            document.getElementById("mob-cart-box").style.display = "block";
                        } else {
                            jQuery('#cart-val').html(result.cartItem);
                            jQuery('#mob-cart-val').html(result.cartItem);
                            document.getElementById("productpage-area-section").style.opacity = "0.5";
                            document.getElementById("cart-box").style.display = "block";
                            document.getElementById("mob-cart-box").style.display = "block";
                        }

                        // toastr.success(result.msg);
                    }

                }

            }
        });
    }

    function add_to_cart_submit_accessories(list_id, pid){
        var qty = jQuery('#qty' + list_id).val();
        jQuery('#product_id').val(pid);
        jQuery('#product_qty').val(qty);
        jQuery('#wishlist_id').val(list_id);
        var data = jQuery('#frmConvertToCart').serialize();
        // toastr.options = {
        //   "closeButton": true,
        //   "newestOnTop": true,
        //   "progressBar": true,
        //   "timeOut": "2000",
        //   "positionClass": "toast-top-right"
        // };
        jQuery.ajax({
            url: '/convert_to_cart',
            data: data,
            type: 'post',
            success: function (result) {
                if (result.type == 'success') {
                    if (result.totalItem == 0) {
                        jQuery('#cart-menu').hide();
                        jQuery('#mob-cart-menu').hide();
                        jQuery('#list_box' + list_id).hide();

                        // cart quantity aded without reload
                        var cart_val = jQuery('#cart-val').html();
                        if (cart_val == undefined) {
                            var html =
                                '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                                result.cartItem + '</span></span>';
                            jQuery('.shopping-cart-icon').html(html);
                        } else {
                            jQuery('#cart-val').html(result.cartItem);
                        }

                        // toastr.success(result.msg);
                        location.reload();
                    } else {
                        jQuery('#list_box' + list_id).hide();

                        // cart quantity aded without reload
                        var cart_val = jQuery('#cart-val').html();
                        var mob_cart_val = jQuery('#mob-cart-val').html();
                        if (cart_val == undefined || mob_cart_val == undefined) {
                            var html =
                                '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                                result.cartItem + '</span></span>';
                            jQuery('.shopping-cart-icon').html(html);
                            jQuery('.mob-shopping-cart-icon').html(html1);

                            document.getElementById("productpage-area-section").style.opacity = "0.5";
                            document.getElementById("cart-box").style.display = "block";
                            document.getElementById("mob-cart-box").style.display = "block";
                        } else {
                            jQuery('#cart-val').html(result.cartItem);
                            jQuery('#mob-cart-val').html(result.cartItem);
                            document.getElementById("productpage-area-section").style.opacity = "0.5";
                            document.getElementById("cart-box").style.display = "block";
                            document.getElementById("mob-cart-box").style.display = "block";
                        }

                        // toastr.success(result.msg);
                    }

                }

            }
        });
    }

    function change_free_bag(bagphoto, bagid, bagcolor, bag_id_arr, is_stock) {
        $allBagsId = JSON.parse(bag_id_arr);
        if(is_stock == 'yes'){
            for (let i = 0; i < $allBagsId.length; i++) {
                if ($allBagsId[i] == bagid) {
                    document.getElementById('bag_mark_' + i).src = window.location.origin + "/" +
                        'frontend/assets/images/bag_check.png';
                    document.getElementById('select_bag_area_' + i).style.background = "#7070708c";
                } else {
                    document.getElementById('bag_mark_' + i).src = window.location.origin + "/" +
                        'frontend/assets/images/bag_uncheck.png';
                    document.getElementById('select_bag_area_' + i).style.background = "#70707047";
                }
            }
            document.getElementById('bag_galary_photo').src = window.location.origin + "/" + bagphoto;

            document.getElementById('bag_color').innerText = bagcolor;

            jQuery('#free_bag_id').val(bagid);
        } else {
            return;
        }
    }

    function add_to_cart_submit_desktop(list_id, pid){
        var qty = jQuery('#qty' + list_id).val();
        jQuery('#product_id').val(pid);
        jQuery('#product_qty').val(qty);
        jQuery('#wishlist_id').val(list_id);
        var bag_id = jQuery('#lania_free_bag_id').val();
        if(bag_id) {
            jQuery('#bag_id').val(bag_id);
        }
        var key_id = jQuery('#select_keyboard_id').val();
        if(key_id) {
            jQuery('#keyboard_id').val(key_id);
        }
        var key_type = jQuery('#select_keyboard_type').val();
        if(key_type) {
            jQuery('#keyboard_type').val(key_type);
        }
        var data = jQuery('#frmConvertToCart').serialize();
        jQuery.ajax({
            url: '/convert_to_cart',
            data: data,
            type: 'post',
            success: function (result) {
                if (result.type == 'success') {
                    if (result.totalItem == 0) {
                        jQuery('#list_box' + list_id).hide();

                        // cart quantity aded without reload
                        var cart_val = jQuery('#cart-val').html();
                        if (cart_val == undefined) {
                            var html =
                                '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                                result.cartItem + '</span></span>';
                            jQuery('.shopping-cart-icon').html(html);
                        } else {
                            jQuery('#cart-val').html(result.cartItem);
                        }

                        // toastr.success(result.msg);
                        location.reload();
                    } else {
                        jQuery('#list_box' + list_id).hide();

                        // cart quantity aded without reload
                        var cart_val = jQuery('#cart-val').html();
                        if (cart_val == undefined) {
                            var html =
                                '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                                result.cartItem + '</span></span>';
                            jQuery('.shopping-cart-icon').html(html);
                        } else {
                            jQuery('#cart-val').html(result.cartItem);
                        }

                        // toastr.success(result.msg);
                    }

                }

            }
        });
    }

    function add_to_cart_submit_mobile(list_id, pid){
        var qty = jQuery('#qty' + list_id).val();
        jQuery('#product_id').val(pid);
        jQuery('#product_qty').val(qty);
        jQuery('#wishlist_id').val(list_id);
        var bag_id = jQuery('#free_bag_id1').val();
        if(bag_id) {
            jQuery('#bag_id').val(bag_id);
        }
        var key_id = jQuery('#select_keyboard_id1').val();
        if(key_id) {
            jQuery('#keyboard_id').val(key_id);
        }
        var key_type = jQuery('#select_keyboard_type1').val();
        if(key_type) {
            jQuery('#keyboard_type').val(key_type);
        }
        var data = jQuery('#frmConvertToCart').serialize();
        jQuery.ajax({
            url: '/convert_to_cart',
            data: data,
            type: 'post',
            success: function (result) {
                if (result.type == 'success') {
                    if (result.totalItem == 0) {
                        jQuery('#list_box' + list_id).hide();

                        // cart quantity aded without reload
                        var cart_val = jQuery('#cart-val').html();
                        if (cart_val == undefined) {
                            var html =
                                '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                                result.cartItem + '</span></span>';
                            jQuery('.shopping-cart-icon').html(html);
                        } else {
                            jQuery('#cart-val').html(result.cartItem);
                        }

                        // toastr.success(result.msg);
                        location.reload();
                    } else {
                        jQuery('#list_box' + list_id).hide();

                        // cart quantity aded without reload
                        var cart_val = jQuery('#cart-val').html();
                        if (cart_val == undefined) {
                            var html =
                                '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                                result.cartItem + '</span></span>';
                            jQuery('.shopping-cart-icon').html(html);
                        } else {
                            jQuery('#cart-val').html(result.cartItem);
                        }

                        // toastr.success(result.msg);
                    }

                }

            }
        });
    }


    function backToBag() {
        document.getElementById('mobile-lania-keyboard-modal').style.display = 'none';
        document.getElementById('mobile-lania-bag-modal').style.display = 'block';
    }
    
    function changeLaniaBag(bagphoto, bagid, bagcolor, bag_id_arr, is_stock) {
        $allBagsId = JSON.parse(bag_id_arr);
        if (is_stock == 'yes') {
            for (let i = 0; i < $allBagsId.length; i++) {
                let bag_mark_btn = document.getElementById('lania_bag_mark_' + i);
                let bag_mark_mobile_btn = document.getElementById('bag_mark_mobile_' + i);
                if ($allBagsId[i] == bagid) {
                    //Desktop
                    if(bag_mark_btn){
                        document.getElementById('lania_bag_mark_' + i).src = window.location.origin + "/" +
                        'frontend/assets/images/bag_checked_small.png';
                        document.getElementById('select_lania-bag_area_' + i).style.background = "#7070708c";
                    }
                    //Mobile
                    if(bag_mark_mobile_btn){
                        document.getElementById('bag_mark_mobile_' + i).src = window.location.origin + "/" +
                        'frontend/assets/images/bag_checked_extra_small.png';
                        document.getElementById('select_lania-bag_area_mobile_' + i).style.background = "#7070708c";
                    }
                } else {
                    //Desktop
                    if(bag_mark_btn){
                        document.getElementById('lania_bag_mark_' + i).src = window.location.origin + "/" +
                        'frontend/assets/images/bag_unchecked_small.png';
                        document.getElementById('select_lania-bag_area_' + i).style.background = "#70707047";
                    }
                    //Mobile
                    if(bag_mark_mobile_btn){
                        document.getElementById('bag_mark_mobile_' + i).src = window.location.origin + "/" +
                        'frontend/assets/images/bag_unchecked_extra_small.png';
                        document.getElementById('select_lania-bag_area_mobile_' + i).style.background = "#70707047";
                    }
                    
                }
            }
            let galary_photo_btn = document.getElementById('lania_bag_galary_photo');
            let galary_photo_btn1 = document.getElementById('bag_galary_photo1');
            let bag_color_btn = document.getElementById('lania_bag_color');
            let bag_color_btn1 = document.getElementById('bag_color1');
            let bag_id_btn = document.getElementById('lania_free_bag_id');
            let bag_id_btn1 = document.getElementById('free_bag_id1');
            if(galary_photo_btn){
                galary_photo_btn.src = window.location.origin + "/" + bagphoto;
            }

            if(galary_photo_btn1){
                galary_photo_btn1.src = window.location.origin + "/" + bagphoto;
            }
            
            if(bag_color_btn){
                document.getElementById('lania_bag_color').innerText = bagcolor;
            }

            if(bag_color_btn1){
                document.getElementById('bag_color1').innerText = bagcolor;
            }

            if(bag_id_btn) {
                jQuery('#lania_free_bag_id').val(bagid);
            }

            if(bag_id_btn1) {
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
            if(keyboard_galary_photo_btn){
                document.getElementById('wireless_keyboard_mark_1').src = window.location.origin + "/" +
                'frontend/assets/images/bag_checked_small.png';
                document.getElementById('select_lania_wireless_keyboard_area_1').style.background = "#7070708c";
                document.getElementById('free_keyboard_mark').src = window.location.origin + "/" + 'frontend/assets/images/bag_unchecked_small.png';
                document.getElementById('select_lania_free_keyboard_area').style.background = "#70707047";
                document.getElementById('keyboard_galary_photo').src = window.location.origin + "/" + keyboardphoto;
                document.getElementById('keyboard_name').innerText = ' wireless mouse & keyboard ( Extra ৳1000 )';
                jQuery('#select_keyboard_id').val(keyboardid);
                jQuery('#select_keyboard_type').val('wireless');
            }
            if(keyboard_galary_photo_btn1){
                document.getElementById('wireless_keyboard_mark_mobile_1').src = window.location.origin + "/" +
                'frontend/assets/images/bag_checked_small.png';
                document.getElementById('select_lania_wireless_keyboard_area_mobile_1').style.background = "#7070708c";
                document.getElementById('free_keyboard_mark_mobile').src = window.location.origin + "/" + 'frontend/assets/images/bag_unchecked_small.png';
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
            if(keyboard_galary_photo_btn){
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
            if(keyboard_galary_photo_btn1){
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


    function continueToKeyboardModal(){
        document.getElementById('mobile-lania-bag-modal').style.display = 'none';
        document.getElementById('mobile-lania-keyboard-modal').style.display = 'block';
    }

</script>

<input type="hidden" id="w_pqty" value="1" />
<form id="frmAddToWish">
    <input type="hidden" id="prod_id" name="prod_id" />
    <input type="hidden" id="p_qty" name="p_qty" />
    <input type="hidden" id="ram_id" name="ram_id" />
    <input type="hidden" id="ssd_id" name="ssd_id" />
    @csrf
</form>
<form id="frmConvertToCart">
    <input type="hidden" id="product_id" name="product_id" />
    <input type="hidden" id="product_qty" name="product_qty" />
    <input type="hidden" id="bag_id" name="bag_id" />
    <input type="hidden" id="keyboard_id" name="keyboard_id" />
    <input type="hidden" id="keyboard_type" name="keyboard_type" />
    <input type="hidden" id="wishlist_id" name="wishlist_id" />
    @csrf
</form>
@endsection
