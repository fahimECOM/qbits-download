@extends('frontend.layouts.master')
@section('title','Lania')
@section('content')
<style>
    .tech_specs_nav {
        font-size: 14px;
        color: #a1a1a1 !important;
    }

    img.sigma-table {
        width: 100%;
    }

    img.sigma-table-tab {
        width: 100%;
    }

    .ssd-image {
        width: 100%;
    }

    a.down-arrow {
        color: #c6c6c6 !important;
        font-size: 16px !important;
        padding-left: 2px;
    }

    .advance-img1 {
        display: none;
    }

    .minipc-right-processor1 {
        display: none;
    }

    .limit {
        margin-top: 153px !important;
        margin-bottom: 158px !important;
        /* margin-bottom: 83px !important; */
    }

    .incredible {
        margin-top: 105px;
        margin-bottom: 133px;
    }

    .Connect {
        margin-top: 132px;
    }

    .middle-btn {
        padding-top: 82px;
    }

    .middle-btn button {
        background: #0071e300;
        width: 242px;
        height: 60px;
        color: white;
        border: 2px solid #e1e1e1;
        margin: 10px;
        border-radius: 30px;
        font-size: 24px;
        line-height: 28px;
    }

    .middle-btn button:hover {
        background: #0071E3;
        border: 1px solid transparent;
    }

    button.btn-active1,
    button.btn-active2,
    button.btn-active3,
    button.btn-active4 {
        background: #0071E3;
        border: 1px solid transparent;
    }

    .img-group {
        position: relative;
    }

    .mini {
        position: absolute;
        width: 82%;
        bottom: 9px;
        left: 23px;
        padding: 86px 69px 4px 149px;
    }

    img.myImageChange1 {
        /* position: absolute;
        width: 100%;
        padding: 13px 69px 4px 70px;
        -webkit-box-reflect: below 65px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4));
        backdrop-filter: blur(20px); */


        position: absolute;
        width: 90%;
        padding: 86px 69px 4px 149px;


    }


    img.img1mystyle1 {
        /* border: 1px solid; */
        -webkit-box-reflect: below 210px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4));
        max-height: 282px;
        opacity: 0;
        filter: blur(17px);
        animation: img1my-animation1 1.5s linear forwards;
    }

    @keyframes img1my-animation1 {
        0% {
            transform: translate(80%, 0%) scale(0);
        }

        10% {
            transform: translate(50%, 0%) scale(0.5);
            opacity: 0;
        }

        20% {
            transform: translate(0, 0%) scale(1);
            opacity: 1;
        }

        100% {
            opacity: 1;

            transform: translateY(0%);
        }
    }

    img.img1mystyle2 {
        /* border: 1px solid; */
        -webkit-box-reflect: below 210px linear-gradient(to bottom, rgb(8 8 8 / 0%), rgb(0 0 0 / 28%));
        max-height: 282px;
        opacity: 0;
        filter: blur(7px);
        animation: img1my-animation2 1.5s linear forwards;
    }

    @keyframes img1my-animation2 {
        0% {
            transform: translate(80%, 0%) scale(0);
        }

        10% {
            transform: translate(50%, 0%) scale(0.5);
            opacity: 0;
        }

        20% {
            transform: translate(0, 0%) scale(1);
            opacity: 1;
        }

        100% {
            opacity: 1;
            transform: translateY(0%);
        }
    }

    img.img1mystyle3 {
        /* border: 1px solid; */
        -webkit-box-reflect: below 210px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4));
        max-height: 282px;
        opacity: 0;
        filter: blur(17px);
        animation: img1my-animation3 1.5s linear forwards;
    }

    @keyframes img1my-animation3 {
        0% {
            transform: translate(80%, 0%) scale(0);
        }

        10% {
            transform: translate(50%, 0%) scale(0.5);
            opacity: 0;
        }

        20% {
            transform: translate(0, 0%) scale(1);
            opacity: 1;
        }

        100% {
            opacity: 0.7;
            transform: translateY(0%);
        }
    }

    img.img1mystyle4 {
        /* border: 1px solid; */
        -webkit-box-reflect: below 210px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4));
        max-height: 282px;
        opacity: 0;
        filter: blur(12px);
        animation: img1my-animation4 1.5s linear forwards;
    }

    @keyframes img1my-animation4 {
        0% {
            transform: translate(80%, 0%) scale(0);
        }

        10% {
            transform: translate(50%, 0%) scale(0.5);
            opacity: 0;
        }

        20% {
            transform: translate(0, 0%) scale(1);
            opacity: 1;
        }

        100% {
            opacity: 1;
            transform: translateY(0%);
        }
    }

    img.mystyle1 {
        /* border: 1px solid; */

        animation: my-animation1 1.5s linear forwards;
    }

    @keyframes my-animation1 {
        0% {
            transform: translate(80%, 0%) scale(0);
        }

        10% {
            transform: translate(50%, 0%) scale(0.5);
            opacity: 0.5;
        }

        20% {
            transform: translate(0, 0%) scale(1);
            opacity: 1;
        }

        100% {
            opacity: 1;

            transform: translateY(0%);
        }
    }

    img.mystyle2 {
        /* border: 1px solid; */
        animation: my-animation2 1.5s linear forwards;
    }

    @keyframes my-animation2 {
        0% {
            transform: translate(80%, 0%) scale(0);
        }

        10% {
            transform: translate(50%, 0%) scale(0.5);
            opacity: 0.5;
        }

        20% {
            transform: translate(0, 0%) scale(1);
            opacity: 1;
        }

        100% {
            opacity: 1;
            transform: translateY(0%);
        }
    }

    img.mystyle3 {
        /* border: 1px solid; */
        animation: my-animation3 1.5s linear forwards;
    }

    @keyframes my-animation3 {
        0% {
            transform: translate(80%, 0%) scale(0);
        }

        10% {
            transform: translate(50%, 0%) scale(0.5);
            opacity: 0.5;
        }

        20% {
            transform: translate(0, 0%) scale(1);
            opacity: 1;
        }

        100% {
            opacity: 1;
            transform: translateY(0%);
        }
    }

    img.mystyle4 {
        /* border: 1px solid; */
        animation: my-animation4 1.5s linear forwards;
    }

    @keyframes my-animation4 {
        0% {
            transform: translate(80%, 0%) scale(0);
        }

        10% {
            transform: translate(50%, 0%) scale(0.5);
            opacity: 0.5;
        }

        20% {
            transform: translate(0, 0%) scale(1);
            opacity: 1;
        }

        100% {
            opacity: 1;
            transform: translateY(0%);
        }
    }


    img.myImageChange2 {
        position: absolute;
        width: 100%;
        padding: 13px 69px 4px 70px;
        /* -webkit-box-reflect: below 65px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4));
        backdrop-filter: blur(20px); */


    }

    img.myImageChange3 {
        position: absolute;
        width: 100%;
        padding: 13px 69px 4px 70px;
        /* -webkit-box-reflect: below 65px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4));
        backdrop-filter: blur(20px); */


    }


    /* power area */
    .power-row-middle {
        display: flex;
        flex-direction: row;
        gap: 20px;
        width: 100%;
        padding: 20px 0px;
        margin-left: -59px;
    }

    .power-row {
        display: flex;
        width: 100%;
        flex-direction: column;
        padding: 19px 163px;
    }

    .power-row-title h1 {
        font-size: 57px;
        font-weight: 500;
        line-height: 72px;
    }

    .power-row-title p,
    .power-row-end p {
        font-size: 28px;
        line-height: 32px;
        font-weight: 300;
        color: #a1a1a6;
    }

    /* power area end */
    /* wifi section  */
    img.wifi-img-icon,
    img.sturdy-img-icon {
        width: 30%;
    }

    img.wifi-img-icon {
        padding-top: 30px;
    }

    .minipc-row {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 705px;
        column-gap: 48px;

    }

    .sturdy {
        background: linear-gradient(342deg, #22fecd 0%, #3a947f 70%);
        width: 674px;
        border-radius: 35px;
        padding: 46px 57px;
    }

    .wifi {
        background: linear-gradient(342deg, #fc22fe 0%, #836fd6 70%);
        width: 674px;
        border-radius: 35px;
        padding: 46px 57px;
    }

    .sturdy-content h1,
    .wifi-content h1 {
        font-size: 57px;
        line-height: 84px;
        font-weight: 600;
    }

    .sturdy p,
    .wifi-content p {
        font-size: 22px;
        line-height: 29px;
        font-weight: 300;
    }

    .sturdy-img,
    .wifi-img {
        text-align: center;
        position: relative;
        top: 82px;
    }

    .sturdy-img p,
    .wifi-img p {
        font-size: 22px;
        line-height: 29px;
        font-weight: 300;
        padding-top: 18px;
    }


    /* wifi section end */
    .qbits-minipc-section-background {
        background-repeat: no-repeat;
        background-image: url('/frontend/minipc/Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-Lan-with-Usb-3.0-HDMI-2.0-Dp-1.2-USB-c-4.0-USB-2.0-Audio-Super-fast-mini-pc-Limitless.jpg');
        background-size: contain;
        background-position: center;
    }

    .qbits-minipc-section {
        overflow: hidden;
        margin-top: 40px;
        margin-bottom: 40px;
        color: #fff;
    }

    .qbits-minipc-section .minipc-section {
        /* background: linear-gradient(96deg, #22a4fe 0%, #9756a0 100%); */
        background-size: cover;
        overflow: hidden;
        display: flex;
        border-radius: 35px;

    }

    .qbits-minipc-section .minipc-section .alpha-image {
        margin: 0 auto;
        padding-bottom: 30px;
        /* margin-left: -375px; */
        align-self: center;
    }

    .qbits-minipc-section .minipc-section .alpha-text {
        padding-top: 37px;
        overflow: hidden;
        padding-bottom: 30px;
        /* background-image: url('/public/frontend/minipc/icon/nucback.jpg'); */
    }

    .qbits-minipc-section .minipc-section .alpha-text h1 {
        color: #53bcff;
        font-size: 120px;
        font-family: "Roboto", sans-serif;
        padding-top: 34px;
        line-height: 100px;
    }

    .qbits-minipc-section .minipc-section .alpha-text h3 {
        font-size: 57px;
        line-height: 60px;
        font-family: "Roboto", sans-serif;
        padding-bottom: 15px;
        color: #ebf4fc;
        text-align: end;
    }

    .qbits-minipc-section .minipc-section .alpha-text .alpha-mobile-image {
        display: none;
    }

    .qbits-minipc-section .minipc-section .alpha-text p {
        font-size: 28px;
        line-height: 32px;
        font-family: "Roboto", sans-serif;
        padding-bottom: 30px;
        padding-right: -24px;
        text-align: end;
        /* width: 522px; */
        width: 419px;
        margin-left: auto;
    }

    .qbits-minipc-section .minipc-section .alpha-text a {
        padding: 15px 50px;
        color: #a1a1a6;
        text-decoration: none;
        border: 2px solid #a1a1a6;
        border-radius: 40px;
        font-size: 22px;
        opacity: 90%;
    }

    .qbits-minipc-section .minipc-section .alpha-text a:hover {
        border: 2px solid #fff;
        color: #fff;
    }

    .minipc-div {
        display: flex;
        flex-direction: row;
        padding: 0px 131px;
    }

    .minipc-div-1 {
        display: flex;
        flex-direction: row;
        padding: 0px 156px;
        padding-bottom: 0px;
    }

    .left h1 {
        font-size: 57px;
        line-height: 68px;
        font-weight: 500;
        width: 510px;

    }

    .left p {
        font-size: 28px;
        line-height: 32px;
        font-weight: 400;
        color: #a1a1a6;
        /* width: 400px; */
        width: 501px;
    }

    .left2 h1 {
        font-size: 57px;
        line-height: 68px;
        font-weight: 500;
    }

    .left2 p {
        font-size: 28px;
        line-height: 32px;
        font-weight: 400;
        color: #a1a1a6;
        padding: 20px 0px 27px 0px;
    }

    .left {
        align-self: center;
        padding: 0px 29px 0px 23px;
    }

    .left2 {
        align-self: center;
        text-align: end;
        padding: 0px 3px 0px 124px;
    }

    .right {
        align-self: center;
    }

    .advance {
        margin-top: 130px;
    }

    .classy-area .classy-menu-minipc {
        overflow: hidden;
        width: 100%;
        margin: 0 auto;
    }

    .mobile-classy-image-minipc {
        display: none;
    }

    .classy-area .mobile-classy-image-minipc img {
        padding: 20px;
        width: 100%;

    }

    .classy-area .classy-menu-minipc ul {
        display: grid;
        padding: 51px 139px;
        margin: 0px -38px !important;
        grid-template-columns: repeat(8, 1fr);
        align-items: center;
        justify-content: start;
        justify-items: stretch;
    }

    .classy-area .classy-menu-minipc ul li {
        list-style: none;
        padding: 0px;
        margin: 0px;
        place-self: center;
    }

    .innovation-area-minipc {
        color: #fff;
        overflow: hidden;

    }

    .innovation-area-minipc .innovation {
        text-align: center;
        width: 1191px;
        margin: 0 auto;
        /* padding-left: 7px;
        padding-right: 7px; */
    }

    .innovation-area-minipc .innovation h1 {
        font-size: 97px;
        font-family: "Roboto", sans-serif;
        font-weight: 600;
        color: #a1a1a6;
        opacity: 81px;
        line-height: 90px;
        background: radial-gradient(circle farthest-corner at bottom center,
                #eeeeee 0%,
                #333333 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .innovation-area-minipc .innovation p {
        font-size: 32px;
        font-family: "Roboto", sans-serif;
        color: #a1a1a6;
        margin-top: 2%;
        margin-bottom: 142px;
        line-height: 40px;
    }

    img.sigma-table {
        width: 100%;
    }

    .qbits-top-menu {
        color: #fff;
        background-color: #000;
        font-family: "Roboto", sans-serif;
        width: 100%;
        position: -webkit-sticky;
        position: relative;
        display: flex;
        z-index: 1;
        top: 0;
        height: 80px;
        align-items: center;
    }

    .sigma-middle-menu-list {
        display: none;
    }

    .minipc-right1,
    .minipc-right-processor {
        width: 100%;
        padding: 76px 0px 0px 0px;
        margin-left: -10px;
    }

    .minipc-right-processor {
        /* padding-top: 141px; */
        padding-top: 100px;
    }

    @media (max-width: 821px) {

        .right {
            align-self: center;
            padding: 24px 20px px 0px 20px;
            text-align-last: center;
        }

        .right .minipc-right {
            width: 80%;
        }

        .qbits-minipc-section .minipc-section {
            display: block;
            border-radius: 25px;
        }

        .qbits-minipc-section .minipc-section .alpha-image {
            display: none;
        }

        .qbits-minipc-section .minipc-section .alpha-text {
            width: 100%;
            padding-left: 10px;
            padding-top: 38px;
        }

        .qbits-minipc-section .minipc-section .alpha-text h1 {
            font-size: 85px !important;
            padding-top: 0px !important;
            color: #59a4d4;
        }

        .qbits-minipc-section .minipc-section .alpha-text h3 {
            color: #ebf4fc;
        }

        .qbits-minipc-section .minipc-section .alpha-text .alpha-mobile-image {
            display: block;
            margin-bottom: 40px;
            margin-top: 30px;
            text-align-last: center;
        }

        /* .qbits-minipc-section .minipc-section .alpha-text .alpha-mobile-image img {
            width: 80%;
        } */

        .qbits-minipc-section .minipc-section .alpha-text a {
            border: 2px solid #e1e1e1;
            color: #fff;
        }

        .qbits-minipc-section .minipc-section .alpha-text a:hover {
            border: 2px solid #fff;
        }

        .display-area .display-image {
            display: none;
        }

        .display-area .display-details {
            padding-bottom: 34px;
        }

        .innovation-area-minipc {
            margin-top: 40px !important;
        }

        .innovation-area-minipc .innovation {
            width: 100%;
        }

        .innovation-area-minipc .innovation h1 {
            font-size: 36px;
            line-height: 38px;
            font-weight: 900;
        }

        .innovation-area-minipc .innovation p {
            font-size: 22px;
            line-height: 24px;
            margin-bottom: 0px !important;
            margin-top: 20px;
        }

    }

    @media (max-width: 480px) {
        .minipc-right-processor {
            display: none;
        }

        .minipc-right-processor1 {
            display: block;
            width: 100%;
        }

        .advance-img {
            display: none;
        }

        .advance {
            margin-top: -45px !important;
        }

        .advance-img1 {
            display: block !important;
            width: 100% !important;
            padding: 2px;
        }

        .minipc-right1,
        .minipc-right-processor {
            margin-top: -92px;
        }

        .incredible {
            padding-top: 0px;
            margin-bottom: -24px;
        }

        .minipc-right-processor {
            padding-top: 0px;
        }

        .ssd-area-section .ssd-area .mobile-ssd-difference {
            margin-top: 40px;
        }

        .limit {
            margin-top: -48px !important;
            margin-bottom: -20px !important;
        }

        .middle-btn {
            padding-top: 0px;
        }

        img.myImageChange3 {
            position: absolute;
            width: 286px;
            padding: 12px 11px 0px 28px;
            display: none;
        }

        .minipc-right1,
        .minipc-right-processor {
            width: 100%;
        }

        .power-row-title h1 {
            font-size: 34px;
            font-weight: 500;
            line-height: 36px;
        }

        .qbits-minipc-section-background {
            background-image: url('/error/frontend/minipc/icon/nucback.jpg');
        }

        .power-row-title p,
        .power-row-end p {
            font-size: 22px;
            line-height: 27px;
            font-weight: 300;
            color: #a1a1a6;
        }

        .mini {
            display: none;
            position: absolute;
            width: 82%;
            bottom: 1px;
            left: 23px;
            padding: 58px 55px 4px 83px;
        }

        img.img1mystyle1 {
            /* border: 1px solid; */
            -webkit-box-reflect: below 120px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4));

            opacity: 1;
            animation: img1my-animation1 1s linear forwards;
        }

        @keyframes img1my-animation1 {
            0% {
                transform: translate(0%, 0%) scale(1);
            }

            100% {
                opacity: 1;
                filter: blur(17px);
                transform: translateY(0%);
            }
        }

        img.img1mystyle2 {
            /* border: 1px solid; */
            -webkit-box-reflect: below 120px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4));

            opacity: 0;
            animation: img1my-animation2 1s linear forwards;
        }

        @keyframes img1my-animation2 {
            0% {
                transform: translate(0%, 0%) scale(1);
            }


            100% {
                opacity: 1;
                filter: blur(5px);
                transform: translateY(0%);
            }
        }

        img.img1mystyle3 {
            /* border: 1px solid; */
            -webkit-box-reflect: below 120px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4));

            opacity: 0;
            animation: img1my-animation3 1s linear forwards;
        }

        @keyframes img1my-animation3 {
            0% {
                transform: translate(0%, 0%) scale(1);
            }


            100% {
                opacity: 0.7;
                filter: blur(19px);
                transform: translateY(0%);
            }
        }

        img.img1mystyle4 {
            /* border: 1px solid; */
            -webkit-box-reflect: below 120px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4));

            opacity: 0;
            animation: img1my-animation4 1s linear forwards;
        }

        @keyframes img1my-animation4 {
            0% {
                transform: translate(0%, 0%) scale(1);
            }


            100% {
                opacity: 1;
                filter: blur(16px);
                transform: translateY(0%);
            }
        }

        img.mystyle1 {
            /* border: 1px solid; */

            animation: my-animation1 1s linear forwards;
        }

        @keyframes my-animation1 {
            0% {
                transform: translate(0%, 0%) scale(1);
            }



            100% {

                transform: translateY(0%);
            }
        }

        img.mystyle2 {
            /* border: 1px solid; */
            animation: my-animation2 1s linear forwards;
        }

        @keyframes my-animation2 {
            0% {
                transform: translate(0%, 0%) scale(1);
            }


            100% {
                transform: translateY(0%);
            }
        }

        img.mystyle3 {
            /* border: 1px solid; */
            animation: my-animation3 1s linear forwards;
        }

        @keyframes my-animation3 {
            0% {
                transform: translate(0%, 0%) scale(1);
            }



            100% {
                transform: translateY(0%);
            }
        }

        img.mystyle4 {
            /* border: 1px solid; */
            animation: my-animation4 1s linear forwards;
        }

        @keyframes my-animation4 {
            0% {
                transform: translate(0%, 0%) scale(1);
            }


            100% {
                transform: translateY(0%);
            }
        }

        .power-row-middle {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
            padding: 20px 0px;
            text-align: center;
            margin-left: 0px;
        }

        .power-row {
            display: flex;
            width: 100%;
            flex-direction: column;
            padding: 0px;
        }

        .img-group {
            position: relative;
            margin-left: 0px;
        }

        img#myImage {
            max-width: 309px;
        }

        img.myImageChange2 {
            position: absolute;
            width: 350px;
            padding: 5px 67px 4px 26px;
        }

        img.myImageChange1 {
            position: absolute;
            width: 326px;
            padding: 81px 63px 3px 149px;
            -webkit-box-reflect: below 46px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgb(0 0 0 / 0%));
            filter: blur(0px);
        }

        .right {
            align-self: center;
            padding: 24px 20px px 0px 20px;
            text-align-last: center;
        }

        .right .minipc-right {
            width: 80%;
        }

        .minipc-row {
            display: flex;
            width: 100%;
            height: 100%;
            row-gap: 48px;
            flex-direction: column;

        }

        .sturdy {
            background: linear-gradient(342deg, #22fecd 0%, #3a947f 70%);
            width: 100%;
            border-radius: 35px;
            padding: 39px 42px;
        }

        .wifi {
            background: linear-gradient(342deg, #fc22fe 0%, #836fd6 70%);
            width: 100%;
            border-radius: 35px;
            padding: 39px 42px;
        }

        .sturdy-content h1,
        .wifi-content h1 {
            font-size: 42px;
            line-height: 55px;
            font-weight: 600;
        }

        .sturdy p,
        .wifi-content p {
            font-size: 22px;
            line-height: 29px;
            font-weight: 300;
        }

        .sturdy-img,
        .wifi-img {

            top: 18px;
        }

        .sturdy-img p,
        .wifi-img p {
            font-size: 22px;
            line-height: 29px;
            font-weight: 300;
            padding-top: 5px;
        }

        .qbits-minipc-section {
            margin-top: 60px;
        }

        body .qbits-minipc-section .row {
            margin-left: 0px;
            margin-right: 0px;
        }

        body .qbits-minipc-section .minipc-section .alpha-text h1 {
            font-size: 72px !important;
            font-weight: 600;
            line-height: 118px;
            /* padding-top: 27px !important; */
        }

        body .qbits-sigma-section .row .sigma-section .col-sm-5 .sigma-text h3 {
            color: #eedfdd;
            font-size: 42px;
            font-weight: 600;
            line-height: 42px;
        }

        body .qbits-minipc-section .minipc-section .alpha-text h3 {
            color: white;
            font-size: 42px;
            font-weight: 600;
            line-height: 42px;
            text-align: start;
        }

        .qbits-sigma-section .sigma-section .sigma-text p {
            font-size: 22px;
            line-height: 24px;
            padding-right: 21px;
        }

        .qbits-minipc-section .minipc-section .alpha-text p {
            font-size: 22px;
            line-height: 24px;
            padding-right: 106px;
            text-align: start;
        }

        .left {
            align-self: center;
            padding: 0px;
        }

        .left2 {
            align-self: center;
            text-align: start;
            padding: 0px;
        }

        .minipc-div {
            display: flex;
            flex-direction: column-reverse;
            padding: 0px 0px;
        }

        .minipc-div-1 {
            display: flex;
            flex-direction: column;
            padding: 0px 0px;
        }

        .left h1 {
            font-size: 34px;
            line-height: 36px;
            font-weight: 500;
            width: 100%;
        }

        .left p {
            font-size: 22px;
            line-height: 24px;
            font-weight: 400;
            color: #a1a1a6;
            width: 100%;
            padding-right: 10px;
        }

        img.minipc-left2 {
            width: 80%;
            padding-bottom: 20px;
        }

        .left2 h1 {
            font-size: 34px;
            line-height: 36px;
            font-weight: 500;
        }

        .left2 p {
            font-size: 22px;
            line-height: 24px;
            font-weight: 400;
            color: #a1a1a6;
        }

        .classy-area .classy-menu-minipc ul {
            display: grid;
            padding: 42px 45px;
            grid-template-columns: repeat(3, 0.2fr);
            column-gap: 22px;
            row-gap: 43px;
        }

        body .qbits-mobile-menu {
            background-color: #000 !important;
            width: 100%;
            height: 68px;
            position: -webkit-sticky;
            position: unset;
            z-index: 1;
            top: 0;
            display: block;
            padding: 4px 4px 0px;
        }

        .sigma-middle-menu-list {
            display: none;
        }

        .display-image {
            display: none;
        }

        .display-area .display-details {
            padding-bottom: 36px !important;
        }

        .mobile-classy-image-minipc {
            display: block;
        }
    }

    @media (min-width: 481px) and (max-width: 820px) {
        .power-row-title h1 {
            font-size: 34px;
            font-weight: 500;
            line-height: 36px;
        }

        img.myImageChange3 {
            position: absolute;
            width: 100%;
            padding: 8px 98px 0px 44px;
        }

        img.myImageChange1 {
            position: absolute;
            top: -52px;
            width: 90%;
            padding: 169px 72px 17px 68px;
        }

        img.myImageChange2 {
            position: absolute;
            width: 100%;
            /* top: 90px; */
            padding: 9px 98px 0px 44px;
        }

        .minipc-right-processor {
            display: none;
        }

        .minipc-right-processor1 {
            display: block;
            width: 100%;
            padding: 0px 113px;
        }

        .advance-img {
            display: none;
        }

        .advance-img1 {
            display: block;
            width: 100% !important;
            padding: 15px 90px;
        }

        .qbits-minipc-section-background {
            background-image: url('/error/frontend/minipc/icon/nucback.jpg');
        }

        .nuc {
            width: 100%;
        }

        .power-row-title p,
        .power-row-end p {
            font-size: 22px;
            line-height: 27px;
            font-weight: 300;
            color: #a1a1a6;
        }

        .mini {
            position: absolute;
            width: 82%;
            bottom: 0px;
            left: 49px;
            padding: 1px 153px 1px 101px;
        }

        .minipc-div-1 {
            display: flex;
            flex-direction: column;
            padding: 0px 0px;
        }

        .img-group {
            position: relative;
            margin-left: -56px;
            padding-left: 55px;
        }

        #myImage {
            width: 100%;
        }

        .middle-btn {
            padding-top: 0px;
            text-align: center;
        }

        .power-row-middle {
            display: flex;
            flex-direction: column;
            width: 100%;
            padding: 20px 0px;
            margin-left: 0px;
        }

        .power-row {
            display: flex;
            width: 100%;
            flex-direction: column;
            padding: 0px
        }

        .right {
            align-self: center;
            padding: 24px 20px px 0px 20px;
            text-align-last: center;
        }

        .right .minipc-right {
            width: 80%;
        }

        .minipc-row {
            display: flex;
            width: 100%;
            height: 100%;
            row-gap: 48px;
            flex-direction: column;

        }

        .sturdy {
            background: linear-gradient(342deg, #22fecd 0%, #3a947f 70%);
            width: 100%;
            border-radius: 35px;
            padding: 39px 42px;
        }

        .wifi {
            background: linear-gradient(342deg, #fc22fe 0%, #836fd6 70%);
            width: 100%;
            border-radius: 35px;
            padding: 39px 42px;
        }

        .sturdy-content h1,
        .wifi-content h1 {
            font-size: 42px;
            line-height: 55px;
            font-weight: 600;
        }

        .sturdy p,
        .wifi-content p {
            font-size: 22px;
            line-height: 29px;
            font-weight: 300;
        }

        .sturdy-img,
        .wifi-img {

            top: 18px;
        }

        .sturdy-img p,
        .wifi-img p {
            font-size: 22px;
            line-height: 29px;
            font-weight: 300;
            padding-top: 5px;
        }

        .left {
            align-self: auto;
            padding: 0px 16px 0px 0px;
        }

        .left2 {
            align-self: center;
            text-align: start;
            padding: 0px;
        }

        .minipc-div {
            display: flex;
            flex-direction: column-reverse;
            padding: 0px;
        }


        .left h1 {
            font-size: 42px;
            line-height: 55px;
            font-weight: 500;
            width: 100%;
        }

        .left p {
            font-size: 22px;
            line-height: 27px;
            font-weight: 400;
            color: #a1a1a6;
            width: 100%;
        }

        .left2 h1 {
            font-size: 42px;
            line-height: 55px;
            font-weight: 500;
        }

        .left2 p {
            font-size: 22px;
            line-height: 27px;
            font-weight: 400;
            color: #a1a1a6;
        }

        .mobile-classy-image-minipc {
            display: block;
        }

        .classy-area .classy-menu-minipc ul {
            display: grid;
            padding: 42px 42px;
            grid-template-columns: repeat(4, 0.2fr);
            column-gap: 107px;
            row-gap: 43px;
        }

        body .qbits-mobile-menu {
            width: 100%;
            height: 68px;
            position: unset;
            padding: 4px 4px 0px;

        }

        .sigma-middle-menu-list {
            display: none;
        }
    }

    @media (min-width: 822px) and (max-width: 991px) {
        .minipc-row {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: auto;
            row-gap: 48px;
        }

        .sturdy {
            background: linear-gradient(342deg, #22fecd 0%, #3a947f 70%);
            width: 674px;
            border-radius: 35px;
            padding: 46px 57px;
            height: 708px;
        }

        .wifi {
            background: linear-gradient(342deg, #fc22fe 0%, #836fd6 70%);
            width: 674px;
            border-radius: 35px;
            padding: 46px 57px;
            height: 708px;
        }

        .mini {
            position: absolute;
            width: 82%;
            bottom: 9px;
            left: 53px;
            padding: 1px 2px 4px 119px;
        }

        img.myImageChange2 {
            position: absolute;
            width: 100%;
            padding: 12px 3px 9px 18px;
            left: 51px;
        }

        img.myImageChange3 {
            position: absolute;
            width: 100%;
            /* padding: 15px 69px 4px 70px; */
            padding: 12px 3px 9px 18px;
            left: 51px;
        }

        .middle-btn {
            padding-top: 82px;
            text-align: center;
        }

        .power-row {
            display: flex;
            width: 100%;
            flex-direction: column;
            padding: 5px 0px;
        }

        .innovation-area-minipc .innovation p {
            margin-bottom: 10px;
        }

        .right {
            align-self: center;
            padding: 0px;
            margin-left: -67px;
            text-align-last: center;
        }

        .right .minipc-right {
            width: 80%;
        }

        .qbits-minipc-section .minipc-section {
            display: block;
            border-radius: 25px;
        }

        .qbits-minipc-section .minipc-section .alpha-image {
            display: none;
        }

        .qbits-minipc-section .minipc-section .alpha-text {
            width: 100%;
            padding-left: 10px;
        }

        .qbits-minipc-section .minipc-section .alpha-text h1 {
            padding-top: 0px !important;
            color: #59a4d4;
        }

        .qbits-minipc-section .minipc-section .alpha-text h3 {
            color: #ebf4fc;
        }

        .qbits-minipc-section .minipc-section .alpha-text .alpha-mobile-image {
            display: block;
            margin-bottom: 40px;
            margin-top: 15px;
            text-align-last: center;
        }

        .qbits-minipc-section-background {
            background-repeat: no-repeat;
            background-image: url(/public/frontend/minipc/icon/nucback.jpg);
        }

        /* .qbits-minipc-section .minipc-section .alpha-text .alpha-mobile-image img {
            width: 80%;
        } */

        .qbits-minipc-section .minipc-section .alpha-text a {
            border: 2px solid #e1e1e1;
            color: #fff;
        }


        .qbits-minipc-section .minipc-section .alpha-text a:hover {
            border: 2px solid #fff;
        }



        .qbits-minipc-section .minipc-section .alpha-text .alpha-mobile-image {
            display: block;
            margin-bottom: 40px;
            margin-top: 30px;
            text-align-last: center;
        }

        .limit {
            margin-top: 153px !important;
            margin-bottom: 55px !important;
            /* margin-bottom: 83px !important; */
        }
    }


    @media (min-width: 822px) and (max-width: 991px) {
        .innovation-area-minipc .innovation {
            text-align: center;
            width: auto;
            margin: 0 auto;
        }

        .ssd-area-section .ssd-area .ssd-difference {
            margin-top: 90px;
            position: relative;
            width: 904px !important;
        }

        .ssd-area-section .ssd-area .ssd-difference img {
            width: 100%;
        }

        .minipc-right1,
        .minipc-right-processor {
            width: 424px;
            padding: 0px;
        }

        .minipc-div {
            display: flex;
            flex-direction: row;
            padding: 0px 10px;
        }

        .minipc-div-1 {
            display: flex;
            flex-direction: row;
            padding: 0px 43px;
            padding-bottom: 0px;
        }

        .power-row {
            display: flex;
            width: 100%;
            flex-direction: column;
            padding: 19px 6px;
        }

        .power-row-middle {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
            padding: 40px 0px;
            margin-left: -59px;
        }

        .minipc-div-1 {
            display: flex;
            flex-direction: row;
            padding: 0px 13px;
            padding-bottom: 0px;
        }

        .minipc-right1,
        .minipc-right-processor {
            width: 336px;
            padding: 0px;
        }
    }

    @media screen and (min-width: 992px) and (max-width: 1199px) {
        .qbits-minipc-section .minipc-section {
            width: 100%;
            overflow: hidden;
        }

        .qbits-minipc-section .minipc-section .alpha-image {
            width: 50%;
        }

        .qbits-minipc-section .minipc-section .alpha-image img {
            width: 100%;
        }

        .qbits-minipc-section .minipc-section .alpha-text h1 {
            font-size: 100px;
        }

        .qbits-minipc-section .minipc-section .alpha-text h3 {
            font-size: 45px;
        }

        .qbits-minipc-section .minipc-section .alpha-text p {
            padding-right: 15%;
        }

        .innovation-area-minipc .innovation {
            text-align: center;
            width: auto;
            margin: 0 auto;
        }

        .ssd-area-section .ssd-area .ssd-difference {
            margin-top: 90px;
            position: relative;
            width: 904px !important;
        }

        .ssd-area-section .ssd-area .ssd-difference img {
            width: 100%;
        }

        .minipc-right1,
        .minipc-right-processor {
            width: 424px;
            padding: 0px;
        }

        .minipc-div {
            display: flex;
            flex-direction: row;
            padding: 0px 10px;
        }

        .minipc-div-1 {
            display: flex;
            flex-direction: row;
            padding: 0px 43px;
            padding-bottom: 0px;
        }

        .power-row {
            display: flex;
            width: 100%;
            flex-direction: column;
            padding: 19px 63px;
        }

        .power-row-middle {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
            padding: 40px 0px;
            margin-left: -59px;
        }

        .minipc-div-1 {
            display: flex;
            flex-direction: row;
            padding: 0px 13px;
            padding-bottom: 0px;
        }

        .minipc-right1,
        .minipc-right-processor {
            width: 336px;
            padding: 0px;
        }
    }

    @media screen and (min-width: 1200px) and (max-width: 1400px) {
        .innovation-area-minipc .innovation {
            text-align: center;
            width: auto;
            margin: 0 auto;
        }

        .minipc-div {
            padding: 0px 74px;
        }

        .minipc-div-1 {
            padding: 0px 74px;
        }

        .power-row {
            padding: 19px 78px;
        }

        .sturdy-img,
        .wifi-img {
            top: 19px;
        }

        .wifi-img-icon {
            padding-top: 103px;
        }
    }

</style>

@php
$products = App\Models\Product::where('sub_category','Lania')->where('status','1')->get('slug');

@endphp




<section class="sigma-middle-menu">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg">
                <div class="col-sm-2">
                    <div class="sigma-logo">
                        <a href="#">Lania</a>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="sigma-menu-right d-flex justify-content-end">
                        <ul>
                            <li><a style="color: #F5F5F7;" href="{{ route('sigma')}}">Overview</a></li>
                            <li><a href="{{ route('minipc_tech_spec') }}">Tech Specs</a></li>
                            <li><a href="{{ route('driver') }}">Drivers</a></li>
                            <li><a href="{{ route('product_details_minipc',$products[0]->slug)}}"
                                    class="buy-button">Buy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div id="search-section" class="clearfix">
        <form id="searchformsection" action="{{ route('search')}}" method="get">
            @csrf
            <input type="search" class="form-control" name="search" id="search"
                placeholder="Search here for what you need?" autocomplete="off">
        </form>
    </div>
</section>
@include('frontend.discount')
<div class="sigma-mobile-middle-menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="sigma-menu-content">
                        <div class="sigma-logo">
                            <a href="#">Lania</a>
                            <a href="#" class="down-arrow"><i class="fa-solid fa-angle-down"></i></a>
                        </div>
                        <div class="sigma-menu-right">
                            <ul>
                                <!-- <li><a href="#"><i class="fas fa-angle-down"></i></a></li> -->

                                <li><a href="{{ route('minipc_tech_spec') }}" class="tech_specs_nav">Tech Specs</a></li>
                                <li><a href="{{ route('product_details_minipc',$products[0]->slug)}}"
                                        class="buy-button">Buy</a>
                            </ul>
                        </div>
                    </div>

                    <div class="sigma-middle-menu-list">
                        <ul>
                            <li><a href="{{ route('minipc')}}">Overview</a></li>
                            <li><a href="{{ route('minipc_tech_spec') }}">Tech Specs</a></li>
                            <li><a href="{{ route('driver') }}">Drivers</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="spacer s0" id="trigger"></div> -->
<!-- <section class="scrolling-slider-area">
    <div class="intro" id="intro">
        <img id="image" src="frontend/sigma/83/0001.jpg" alt="">
    </div>
</section> -->

<div class="qbits-slider">
    <div class="container">
        <div class="text-center">
            <img class="img-fluid"
                src="{{ asset('frontend/minipc/Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-2.80-GHz-to-4.70-GHz-speed-12MB-Intel®-Smart-Cache-superfast-mini-pc-picture.png') }}"
                alt="Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-2.80-GHz-to-4.70-GHz-speed-12MB-Intel®-Smart-Cache-superfast-mini-pc-picture ">
        </div>
    </div>
</div>

<section class="innovation-area-minipc">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="innovation">
                    <h1>Built for Power & Performance</h1>
                    <p>The newest portable powerhouse packs impressive components into the compact body of Qbits Lania.
                        The powerful Intel® Core™ i7-1165G7 Processor CPU and Intel® Iris® Xe Graphics GPU unleash peak
                        power for smooth operation. A groundbreaking thermal design with an advanced cooling system
                        keeps the temperature under control and prevents thermal throttling. DDR4 RAM 3200 MHz and M.2
                        NVMe SSD to speed through everyday multitasking.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="processor-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="processor">
                    <div class="processor-heading">
                        <img src="frontend/sigma/chip.png" class="img-responsive" alt="Sigma Laptop">
                        <h1>11th Generation Intel® Core™ Processor</h1>
                    </div>
                    <p>Qbits Lania has been built with superfast Intel® Core™ i7-1165G7 Processor with the 2.80 GHz to
                        4.70 GHz speed & 4 Cores 8 Threads, & 12MB Intel® Smart Cache to unleash peak power for
                        breakthrough performance & improved productivity.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ram-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="ram">
                    <div class="ram-heading justify-content-end">
                        <img src="frontend/sigma/Ram1.png" alt="Sigma Laptop" class="mobile-ram-image img-responsive">
                        <h1>DDR4 RAM for Optimized Performance </h1>
                        <img src="frontend/sigma/Ram1.png" alt="Sigma Laptop" class="desktop-ram-image">
                    </div>

                    <p style="text-align: right;">Equipped with DDR4 RAM with 3200 MHz to boost your Qbits Lania. The
                        superfast memory lets you run more apps simultaneously with a higher rate of performance. It can
                        be configured with up to 64GB for multitasking and heavy workloads. </p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- nvm Part --}}


<section class="ssd-area-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="ssd-area">
                    <div class="ssd-speed">
                        <h1>Accelerates Load Times</h1>
                        <p>Superfast M.2 NVMe SSD accelerates load times across all your apps and games. Blazing fast
                            load times make everyday work and multitasking speedier than ever. Lets you load massive
                            files instantly at lighting speed and enter games with zero wait time.</p>
                    </div>
                    <div class="ssd-difference">

                        <h3>Speed Difference: Hard Disk vs SSD vs M.2 NGFF vs M.2 NVMe</h3>
                        <img src="{{asset('frontend/web.png')}}" alt="" class="ssd-image">
                        <!-- <div class="row">
                            <div class="col-sm-2">
                                <div class="ssd-speed-list">
                                    <ul>
                                        <li>
                                            <a href="#" style="color: #1486F9 !important;">M.2 NVMe</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #999999 !important;">M.2 NGFF</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #777777 !important;">SSD</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #5C5C5C !important;">HDD</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="progress-graph">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr class="">
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-10">
                                <div class="progres-value">
                                    <ul>
                                        <li>0</li>
                                        <li>400</li>
                                        <li>800</li>
                                        <li>1200</li>
                                        <li>1600</li>
                                        <li>2000</li>
                                        <li>2400</li>
                                        <li>2800</li>
                                        <li>3200</li>
                                        <li>3600</li>
                                    </ul>
                                </div>
                                <p style="color:#A1A1A6; font-size: 16px; text-align:center; margin-top: 20px;">Speed (
                                    in MBPS)</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="progress-area">
                                    <ul>
                                        <li>
                                            <div class="progress" style="width: 100%;">
                                                <div class="progress-bar bg-progress-color-1" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 20%;">
                                                <div class="progress-bar bg-progress-color-2" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 15%;">
                                                <div class="progress-bar bg-progress-color-3" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 5%;">
                                                <div class="progress-bar bg-progress-color-4" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>



                    <div class="tab-ssd-difference">
                        <h3>Speed Difference: Hard Disk vs SSD vs M.2 NGFF vs M.2 NVMe</h3>

                        <img src="{{asset('frontend/Tab.png')}}" class="sigma-table-tab" alt="">

                        <!-- <div class="row-ssd-difference">
                            <div class="">
                                <div class="mobile-ssd-speed-list">
                                    <ul>
                                        <li>
                                            <a href="#" style="color: #1486F9 !important;">M.2 NVMe</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #999999 !important;">M.2 NGFF</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #777777 !important;">SSD</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #5C5C5C !important;">HDD</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="line">
                                <div class="mobile-progress-graph">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr class="">
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                            </div>
                            <div class="">
                                <div class="mobile-progres-value">
                                    <span>0</span>
                                    <span>900</span>
                                    <span>1800</span>
                                    <span>2700</span>
                                    <span>3600</span>
                                     <ul class="number">
                                        <li>0</li>
                                        <li>900</li>
                                        <li>1800</li>
                                        <li>2700</li>
                                        <li>3600</li>
                                    </ul> 
                                </div>
                                <p style="color:#A1A1A6; font-size: 16px; text-align:center; margin-top: 20px;">Speed (
                                    in MBPS)</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mobile-progress-area">
                                    <ul>
                                        <li>
                                            <div class="progress">
                                                <div class="progress-bar bg-progress-color-1" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 45%;">
                                                <div class="progress-bar bg-progress-color-2" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 35%;">
                                                <div class="progress-bar bg-progress-color-3" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 15%;">
                                                <div class="progress-bar bg-progress-color-4" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="mobile-ssd-difference">
                        <h3>Speed Difference: Hard Disk vs SSD vs M.2 NGFF vs M.2 NVMe</h3>


                        <img src="{{asset('frontend/mobile.png')}}" class="sigma-table" alt="">
                        <!-- <div class="row-ssd-difference">
                            <div class="">
                                <div class="mobile-ssd-speed-list">
                                    <ul>
                                        <li>
                                            <a href="#" style="color: #1486F9 !important;">M.2 NVMe</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #999999 !important;">M.2 NGFF</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #777777 !important;">SSD</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #5C5C5C !important;">HDD</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="line">
                                <div class="mobile-progress-graph">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr class="">
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                            </div>
                            <div class="">
                                <div class="mobile-progres-value">
                                    <span>0</span>
                                    <span>900</span>
                                    <span>1800</span>
                                    <span>2700</span>
                                    <span>3600</span>
                                     <ul class="number">
                                        <li>0</li>
                                        <li>900</li>
                                        <li>1800</li>
                                        <li>2700</li>
                                        <li>3600</li>
                                    </ul> 
                                </div>
                                <p style="color:#A1A1A6; font-size: 16px; text-align:center; margin-top: 20px;">Speed (
                                    in MBPS)</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mobile-progress-area">
                                    <ul>
                                        <li>
                                            <div class="progress">
                                                <div class="progress-bar bg-progress-color-1" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 45%;">
                                                <div class="progress-bar bg-progress-color-2" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 35%;">
                                                <div class="progress-bar bg-progress-color-3" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 15%;">
                                                <div class="progress-bar bg-progress-color-4" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- 
                    <div class="ssd-difference">

                        <h3>Speed Difference: Hard Disk vs SSD vs M.2 NGFF vs M.2 NVMe</h3>
                        <img src="{{asset('/frontend/minipc/Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-fast-load-times-12MB-Intel®-Smart-Cache-superfast-zero-wait-time-mini-pc.png')}}"
                            alt="Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-fast-load-times-12MB-Intel®-Smart-Cache-superfast-zero-wait-time-mini-pc">
                    </div>
                    <div class="mobile-ssd-difference">
                        <h3>Speed Difference: Hard Disk vs SSD vs M.2 NGFF vs M.2 NVMe</h3>

                        <img src="{{asset('sigma-table-mobile.svg')}}" class="sigma-table" alt="">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mobile-progress-area">

                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Supercharged section -->
<section class="classy-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="minipc-div">
                    <div class="left">
                        <h1>
                            Supercharged by Intel® Iris® Xe
                        </h1>

                        <p>
                            The slim and portable Lania packs the Intel® Iris® Xe graphics for transformational GPU.
                            This Mini PC offers richer gaming experiences and optimized levels of performance for
                            designers, creators & players. It elevates creativity and productivity while letting you
                            multitask like a pro.
                        </p>
                        <img src="/frontend/minipc/Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-2.80-GHz-to-4.70-GHz-speed-12MB-Intel®-Smart-Cache-Intel Iris Xe.jpg"
                            class="minipc-right-processor1"
                            alt="Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-2.80-GHz-to-4.70-GHz-speed-12MB-Intel®-Smart-Cache-Intel Iris Xe">
                    </div>
                    <div class="right">
                        <img src="/frontend/minipc/Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-2.80-GHz-to-4.70-GHz-speed-12MB-Intel®-Smart-Cache-Intel Iris Xe.jpg"
                            class="minipc-right-processor"
                            alt="Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-2.80-GHz-to-4.70-GHz-speed-12MB-Intel®-Smart-Cache-Intel Iris Xe">
                        <!-- <img src="/frontend/minipc/icon/Intel-Iris-Graphics-Card.jpg" class="minipc-right-processor"
                            alt=""> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="classy-area advance">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="minipc-div-1">
                    <div class="right">
                        <img src="/frontend/minipc/Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-Advance-cooling-capacity-long-lasting-performance.gif"
                            class="minipc-left2 advance-img"
                            alt="Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-Advance-cooling-capacity-long-lasting-performance">


                    </div>
                    <div class="left2">
                        <h1>
                            Advanced <br> Thermal Design
                        </h1>

                        <p>
                            The thermal architecture of Qbits Lania has been designed to keep the Mini PC temperature
                            always in between the safe range even if it's running at max load, with a large heat sink
                            for optimal airflow and more heat dispersion. The resulting gain in cooling capacity ensures
                            a premium experience with long-lasting performance in the years to come.
                        </p>
                        <img src="/frontend/minipc/Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-Advance-cooling-capacity-long-lasting-performance.gif"
                            class="minipc-left2 advance-img1"
                            alt="Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-Advance-cooling-capacity-long-lasting-performance">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Supercharged End section -->





<section class="classy-area Connect">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="classy-content">
                    <h1>Connect Conveniently <br> and Stay Productive</h1>
                    <p>Your mini Qbits Lania packs every port for seamless connectivity, allowing you to connect
                        versatile devices. Four USB 3.0 and two USB 2.0 for comprehensive connectivity. The HDMI and
                        DisplayPort altogether with Thunderbolt-4 supported Type-C can drive dual external displays and
                        execute multitasking faster than ever.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="col-sm-12">
                    <div class="classy-menu-minipc">
                        <ul>
                            <li>
                                <img src="/frontend/minipc/icon/LAN.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="/frontend/minipc/icon/USB2.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="/frontend/minipc/icon/USB-C-3-1.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="/frontend/minipc/icon/USB3.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="/frontend/minipc/icon/hdmi2.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="/frontend/minipc/icon/display.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="/frontend/minipc/icon/Charging.png" class="img-responsive" alt=""><br>
                            </li>
                            <li>
                                <img src="/frontend/minipc/icon/Sound.png" class="img-responsive" alt=""><br>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="classy-image">
                    <img src="/frontend/minipc/icon/port1.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="mobile-classy-image-minipc">
                <!-- <img src="frontend/sigma/new/classy.png" class="img-responsive" alt=""> -->
                <img src="{{asset('/frontend/minipc/mobile-port.png')}}" class="sigma-table" alt="">
            </div>
        </div>
    </div>

</section>
<!-- Power end Throug -->
<!-- Power Throug -->
<section class="classy-area">
    <div class="container">
        <div class="power-row">
            <div class="power-row-title">
                <h1>Power Through Everyday Work </h1>
                <p>Work hard, and take full advantage of the Qbits Lania's power. Geared with Intel® Core™ i7-1165G7
                    Processor to power through everyday work. DDR4-3200 MHz RAM allows you to switch between different
                    performances and M.2 NVMe SSD keeps you seamless and takes your creativity to another level, with
                    the fastest ever performance that enables super-smooth and responsive multitasking.</p>
            </div>
            <div class="power-row-middle">
                <div class="middle-img">
                    <div class="img-group">
                        <img id="myImageChange3" src="/frontend/minipc/minipc-img/defult.jpg"
                            class="minipc-right myImageChange3" alt="">
                        <img id="myImageChange1" src="/frontend/minipc/minipc-img/defult.jpg"
                            class="minipc-right myImageChange1" alt="">
                        <img id="myImageChange2" src="/frontend/minipc/minipc-img/defult.jpg"
                            class="minipc-right myImageChange2" alt="">

                        <img id="myImage" src="/frontend/minipc/minipc-img/normal.png" class="minipc-right" alt="">
                        <img id="myImage" src="/frontend/minipc/minipc-img/mini.png" class="minipc-right mini" alt="">

                    </div>


                </div>
                <div class="middle-btn">
                    <button id="btn-1" onclick="imagechange1()">Graphics
                        Design</button>
                    <button id="btn-2" onclick="imagechange2()">Video
                        Editing</button>
                    <button id="btn-3" onclick="imagechange3()">Home
                        Office</button>
                    <button id="btn-4" onclick="imagechange4()">Gaming</button>
                </div>
            </div>
            <div class="power-row-end">
                <p>DDR4-3200 MHz RAM allows you to switch between different performances and M.2 NVme SSD
                    keeps you seamless and takes your creativity to another level, with the fastest ever performance
                    that enables super-smooth and responsive multitasking.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Incredible -->
<section class="classy-area incredible ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="minipc-div-1">
                    <div class="left">
                        <h1>
                            Incredible Flexibility
                        </h1>
                        <p>
                            The Mini Lania combines impressive functionality as well as portability, it’s just 5.04" in
                            length, 4.84" in width and 1.77" in height, allowing incredible portability. With the
                            lightweight, compact chassis that’s simple yet elegant, the mini PC speeds through work
                            everywhere. Easily fits your backpack and allows you to travel anywhere, anytime. Qbits
                            Lania lets you boost learning & stay productive anywhere.
                        </p>
                    </div>
                    <div class="right">
                        <img src="/frontend/minipc/Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-2.80-GHz-to-4.70-GHz-speed-12MB-Intel®-Smart-Cache-width-4.84inch-height-1.78inch-superfast-min.png"
                            class="minipc-right1"
                            alt="Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-2.80-GHz-to-4.70-GHz-speed-12MB-Intel®-Smart-Cache-width-4.84inch-height-1.78inch-superfast-min">
                        <div class="right-text">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- wifi  -->
<section class="qbits-minipc-section">
    <div class="container">
        <div class="minipc-row">
            <div class="sturdy">
                <div class="sturdy-content">
                    <h1>Durable and Sturdy</h1>
                    <p>Thanks to the metal chassis allow for extended durability and stability. Can withstand rough and
                        tough use. This slim and stylish mini PC is loaded up with sleek and stunning designs that bring
                        together the best of sophistication.
                        <br>
                        <br>
                        The mobility has never been more fascinating - built with what’s inside of you, easily fits on
                        your desk or workstation.</p>
                </div>
                <div class="sturdy-img">
                    <img src="/frontend/minipc/icon/sturdy.png" class="sturdy-img-icon" alt="">
                    <p>Plastic and Aluminium
                        Metal</p>
                </div>
            </div>
            <div class="wifi">
                <div class="wifi-content">
                    <h1>Dual Band Wi-Fi</h1>
                    <p>Intel Dual Band Wireless-AC 3165 offers faster Wi-Fi speeds per stream 433 Mbps with powerful
                        bandwidth of 2.4 GHz, 5 GHz for optimal online gaming performance, file transferring, video
                        streaming, and internet surfing.
                        <br>
                        <br>It supports Wi-Fi 802.11AC and provides a consistent wireless signal resulting in all-around
                        better coverage and performance.</p>
                </div>
                <div class="wifi-img">
                    <img src="/frontend/minipc/icon/feather-wifi.png" class="wifi-img-icon" alt="">
                    <p> Wi-fi 5 GHz</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end wifi -->

<!-- End Incredible -->
<!-- minipc -->
<section class="qbits-minipc-section qbits-minipc-section-background limit">
    <div class="container">
        <div class="row">
            <div class="minipc-section">
                <div class="col-4 alpha-image">
                    <!-- <img src="/frontend/minipc/icon/nucback.jpg" class="img-responsive" alt=""> -->
                </div>

                <div class="col-6 alpha-text">
                    <div class="alpha-mobile-image">
                        <img src="/frontend/minipc/icon/nucback-mobile.png" class="img-responsive nuc" alt="">
                    </div>
                    <h3>Limitless Possibilities</h3>
                    <p>
                        The Qbits Lania is an absolute powerhouse, packed with all the powerful components in an
                        incredibly compact enclosure. Your do-it-all desktop is sure to take you to the next level.
                        Connect a keyboard, mouse, monitor, projector, or TV monitor, it lets you do what you need to
                        do. This compact mini PC turns any desk into your workstation, keeping you stay productive
                        anytime, anywhere.
                    </p>

                    <!-- <p>The Qbits Lania is an absolute powerhouse, packed with all the powerful components in an
                        incredibly compact enclosure. Combines functionality as well as portability, leaving you with
                        endless possibilities and allowing you to learn, create, and define your own success.
                        Surprisingly versatile with speed and power like never before, your do-it-all desktop is sure to
                        take you to the next level. Connect a keyboard, mouse, monitor, projector, or TV monitor,
                        letting you do what you need to do. With its compact size and lightweight design, this mini NUC
                        turns any desk into your workstation, keeping you stay productive anytime, anywhere.
                    </p> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="qbits-minipc-section">
    <div class="container">
        <div class="row">
            <div class="minipc-section">
                <div class="col-5 alpha-image">
                    <img src="/frontend/minipc/icon/nucback.png" class="img-responsive" alt="">
                </div>

                <div class="col-5 alpha-text">
                    <div class="alpha-mobile-image">
                        <img src="/frontend/minipc/icon/nucback.png" class="img-responsive" alt="">
                    </div>
                    <h3>Limitless Possibilities</h3>

                    <p>The Qbits Lania is an absolute powerhouse, packed with all the powerful components in an
                        incredibly compact enclosure. Combines functionality as well as portability, leaving you with
                        endless possibilities and allowing you to learn, create, and define your own success.
                        Surprisingly versatile with speed and power like never before, your do-it-all desktop is sure to
                        take you to the next level. Connect a keyboard, mouse, monitor, projector, or TV monitor,
                        letting you do what you need to do. With its compact size and lightweight design, this mini NUC
                        turns any desk into your workstation, keeping you stay productive anytime, anywhere.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- end minipc -->



<script>
    $(document).ready(function () {
        $(".search-btn").hover(function (e) {
            $("#search-section").fadeIn("active");
            $(":input[name=search]").focus();
        });

        $(".shopping-cart-icon").hover(function (e) {
            $("#search-section").fadeOut("active");
        });

        $(".fa-user").hover(function (e) {
            $("#search-section").fadeOut("active");
        });
    });
    $("#search-section").on("mouseleave", function () {
        $(this).fadeToggle(400);
    });

    // $(document).ready(function () {
    //     $(".fa-angle-down").click(function () {
    //         $(".sigma-middle-menu-list").toggle();
    //     });
    // });
    $(document).ready(function () {
        $(".fa-angle-down").click(function () {
            $(".sigma-middle-menu-list").toggle();
        });
    });

    $(document).ready(function () {
        //     $("#refresh-btn").click(function () {
        //         $("#refresh").load("sigma.php #refresh");
        // });

        $("#refresh-btn").click(function () {
            location.reload("#refresh");
        });

        $(".refresh-icon").click(function () {
            location.reload("#refresh");
        });
    });

    // $('#refresh-btn').on('click', function(event) {
    //     event.preventDefault();
    // });

    //         $(".refresh-icon").click(function () {
    //             $('#refresh').load(location.href + "refresh");
    //         });
    //    }); 

    //    function refreshDiv(){
    //        $('#refresh').load(location.href + "#refresh");
    //    }

    //   function refreshDiv(){
    //   window.location.reload();
    // } 

    function removePadding() {
        document.querySelector(".scrollmagic-pin-spacer").style.paddingBottom = null;
    }

    function imagechange1() {
        var prevImg = jQuery('#prev-img-src').val();
        // alert(prevImg.toString());
        document.getElementById('myImageChange1').src = '/frontend/minipc/minipc-img/photoshop-banner.png';
        document.getElementById('myImageChange2').src = '/frontend/minipc/minipc-img/photoshop-banner.png';
        // document.getElementById('myImageChange3').src = '/frontend/minipc/minipc-img/gamming.png';
        document.getElementById('myImageChange3').src = prevImg;

        //set prev img
        document.getElementById('prev-img-src').value = '/frontend/minipc/minipc-img/photoshop-banner.png';

        var img1 = document.getElementById('myImageChange1');
        var img2 = document.getElementById('myImageChange2');


        var btn1 = document.getElementById('btn-1');
        var btn2 = document.getElementById('btn-2');
        var btn3 = document.getElementById('btn-3');
        var btn4 = document.getElementById('btn-4');
        btn1.classList.add("btn-active1");
        btn2.classList.remove("btn-active2");
        btn3.classList.remove("btn-active3");
        btn4.classList.remove("btn-active4");

        img1.classList.add("img1mystyle1");
        img2.classList.add("mystyle1");

        img1.classList.remove("img1mystyle2");
        img2.classList.remove("mystyle2");

        img1.classList.remove("img1mystyle3");
        img2.classList.remove("mystyle3");

        img1.classList.remove("img1mystyle4");
        img2.classList.remove("mystyle4");

    }

    function imagechange2() {
        var prevImg = jQuery('#prev-img-src').val();

        document.getElementById('myImageChange1').src = '/frontend/minipc/minipc-img/video-edit.png';
        document.getElementById('myImageChange2').src = '/frontend/minipc/minipc-img/video-edit.png';
        // document.getElementById('myImageChange3').src = '/frontend/minipc/minipc-img/photoshop-banner.png';
        document.getElementById('myImageChange3').src = prevImg;

        //set prev img
        document.getElementById('prev-img-src').value = '/frontend/minipc/minipc-img/video-edit.png';

        var img1 = document.getElementById('myImageChange1');
        var img2 = document.getElementById('myImageChange2');

        var btn1 = document.getElementById('btn-1');
        var btn2 = document.getElementById('btn-2');
        var btn3 = document.getElementById('btn-3');
        var btn4 = document.getElementById('btn-4');
        btn1.classList.remove("btn-active1");
        btn2.classList.add("btn-active2");
        btn3.classList.remove("btn-active3");
        btn4.classList.remove("btn-active4");

        img1.classList.remove("img1mystyle1");
        img2.classList.remove("mystyle1");

        img1.classList.add("img1mystyle2");
        img2.classList.add("mystyle2");

        img1.classList.remove("img1mystyle3");
        img2.classList.remove("mystyle3");

        img1.classList.remove("img1mystyle4");
        img2.classList.remove("mystyle4");
    }

    function imagechange3() {
        var prevImg = jQuery('#prev-img-src').val();

        document.getElementById('myImageChange1').src = '/frontend/minipc/minipc-img/home.png';
        document.getElementById('myImageChange2').src = '/frontend/minipc/minipc-img/home.png';
        // document.getElementById('myImageChange3').src = '/frontend/minipc/minipc-img/video-edit.png';
        document.getElementById('myImageChange3').src = prevImg;

        //set prev img
        document.getElementById('prev-img-src').value = '/frontend/minipc/minipc-img/home.png';


        var img1 = document.getElementById('myImageChange1');
        var img2 = document.getElementById('myImageChange2');

        var btn1 = document.getElementById('btn-1');
        var btn2 = document.getElementById('btn-2');
        var btn3 = document.getElementById('btn-3');
        var btn4 = document.getElementById('btn-4');
        btn1.classList.remove("btn-active1");
        btn2.classList.remove("btn-active2");
        btn3.classList.add("btn-active3");
        btn4.classList.remove("btn-active4");

        img1.classList.remove("img1mystyle1");
        img2.classList.remove("mystyle1");

        img1.classList.remove("img1mystyle2");
        img2.classList.remove("mystyle2");

        img1.classList.add("img1mystyle3");
        img2.classList.add("mystyle3");

        img1.classList.remove("img1mystyle4");
        img2.classList.remove("mystyle4");
    }

    function imagechange4() {
        var prevImg = jQuery('#prev-img-src').val();

        document.getElementById('myImageChange1').src = '/frontend/minipc/minipc-img/gamming.png';
        document.getElementById('myImageChange2').src = '/frontend/minipc/minipc-img/gamming.png';
        // document.getElementById('myImageChange3').src = '/frontend/minipc/minipc-img/home.png';
        document.getElementById('myImageChange3').src = prevImg;

        //set prev img
        document.getElementById('prev-img-src').value = '/frontend/minipc/minipc-img/gamming.png';

        var img1 = document.getElementById('myImageChange1');
        var img2 = document.getElementById('myImageChange2');

        var btn1 = document.getElementById('btn-1');
        var btn2 = document.getElementById('btn-2');
        var btn3 = document.getElementById('btn-3');
        var btn4 = document.getElementById('btn-4');
        btn1.classList.remove("btn-active1");
        btn2.classList.remove("btn-active2");
        btn3.classList.remove("btn-active3");
        btn4.classList.add("btn-active4");

        img1.classList.remove("img1mystyle1");
        img2.classList.remove("mystyle1");

        img1.classList.remove("img1mystyle2");
        img2.classList.remove("mystyle2");

        img1.classList.remove("img1mystyle3");
        img2.classList.remove("mystyle3");

        img1.classList.add("img1mystyle4");
        img2.classList.add("mystyle4");
    }

</script>

<input type="hidden" id="prev-img-src" value="/frontend/minipc/minipc-img/defult.jpg">
<!-- footer section -->
@include('frontend.partials.home')

@endsection
