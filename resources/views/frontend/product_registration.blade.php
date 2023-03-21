@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')

<style>
    body {
        overflow-x: hidden;
    }

    .form-select {
        /* background-color: #ededed !important; */
        border-radius: 10px !important;
        margin-left: -1vw;
    }

    /* .select2-container--bootstrap5 .select2-dropdown {
        background-color: #f3f3f3;
        width: 26vw !IMPORTANT;
        margin-left: -1vw;
    } */

    .swal-overlay {
        background-color: rgba(132, 132, 132, 0.581);
    }

    .swal-text {
        padding: 17px;
        text-align: center;
        color: #ff0000;
    }

    .swal-title {
        color: #ff0000;
    }

    .swal-icon--warning__dot {
        background-color: #ff0000 !important;
        color: #ff0000 !important;
    }

    .swal-icon--warning__body {
        background: #ff0000 !important;
    }

    .swal-icon--warning {
        border-color: #ff0000 !important;
    }

    button.swal-button.swal-button--confirm {
        color: rgb(255, 255, 255);
        background: red;
    }

    button.swal-button.swal-button--confirm:hover {
        color: rgb(255, 255, 255);
        background: red;
    }

    .swal-button-container {
        width: 20%;
    }

    .modal-dialog {
        /* width: 482px; */
    }

    .modal-content {
        /* min-height: 16.6vw; */
        /* max-height: 20.6vw; */
    }

    /*----------------*/
    .product-registration-verification-modal-area {
        max-width: 480px;
        margin: 0 auto;
    }

    .product-registration-verification-modal-content {
        height: auto;
        background-color: #272727;
        border-radius: 20px;
        padding-bottom: 45px;

    }

    .close-product-registration-verification-modal {
        outline: none;
        border: none;
        background: #272727;
        margin-left: 440px;
        margin-top: 15px;
        font-size: 28px;
        color: #91919d;

    }

    .product-registration-verification-modal-title {
        font-size: 18px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #F5F5F7;
        line-height: 24px;
        text-align: center;
        margin-bottom: 5px;
    }

    .product-registration-verification-modal-heading {
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        line-height: 21px;
        text-align: center;
        color: #F5F5F7;
        margin-bottom: 30px;
    }

    .product-registration-verification-modal-input-title {
        font-size: 18px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #F5F5F7;
        line-height: 24px;
        text-align: center;
        margin-bottom: 20px;
    }

    .product-registration-verification-modal-success-heading {
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        line-height: 22px;
        text-align: center;
        color: #F5F5F7;
        margin-bottom: 0px;
    }

    .product-registration-verification-modal-success-title {
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #F5F5F7;
        line-height: 22px;
        text-align: center;
        margin-bottom: 30px;
    }

    .product-registration-verification-modal-input {
        max-width: 380px;
        height: 55px;
        border-radius: 10px;
    }

    .product-registration-verification-modal-btn {
        margin-top: 40px;
        width: 175px !important;
        height: 55px !important;
        padding: 7px 27px;
        border-radius: 25px !important;
        color: #fff;
        background-color: #2699fb;
        outline: none;
        border: none;
    }

    .product-registration-verification-continue-btn:hover {
        background-color: #0071e3 !important;
        color: #ffffff !important;
    }

    /*----------------*/


    /*----------------*/
    .prod-reg-email-err-modal-area {
        max-width: 480px;
        margin: 0 auto;
    }

    .prod-reg-email-err-modal-content {
        height: auto;
        background-color: #272727;
        border-radius: 20px;
        padding-bottom: 45px;

    }

    .close-prod-reg-email-err-modal {
        outline: none;
        border: none;
        background: #272727;
        margin-left: 440px;
        margin-top: 15px;
        font-size: 28px;
        color: #91919d;

    }

    .prod-reg-email-err-modal-title {
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #F5F5F7;
        line-height: 24px;
        text-align: center;
        margin-bottom: -5px;
    }

    /*----------------*/

    /*----------------*/
    .prod-reg-serial-err-modal-area {
        max-width: 480px;
        margin: 0 auto;
    }

    .prod-reg-serial-err-modal-content {
        height: auto;
        background-color: #272727;
        border-radius: 20px;
        padding-bottom: 45px;

    }

    .close-prod-reg-serial-err-modal {
        outline: none;
        border: none;
        background: #272727;
        margin-left: 440px;
        margin-top: 15px;
        font-size: 28px;
        color: #91919d;

    }

    .prod-reg-serial-err-modal-title {
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #F5F5F7;
        line-height: 24px;
        text-align: center;
        margin-bottom: -5px;
    }

    /*----------------*/



    #verification_completed_field {
        display: none;
    }

    .prod_reg_success_circle {
        width: 38px;
        height: 38px;
        background: #1486F9;
        border-radius: 50%;
        margin: 0 auto;
        margin-top: 0px;
        margin-bottom: 20px;
    }

    #reg_code_err_msg_area {
        display: none;
    }

    #prod_reg_pass_err_field {
        display: none;
    }

    #prod_reg_rpass_err_field {
        display: none;
    }

    .product-registration-inputArea {
        margin-bottom: 25px;
    }

    .product-registration-inputField {
        background-color: #F5F5F7 !important;
        outline: none;
        border-radius: 8px;
        height: 55px;
        max-width: 455px;
        color: #000000;
        font-size: 16px;
        font-weight: 300;
        font-family: "Roboto", sans-serif;
    }

    .product-registration-inputField:focus {
        background: #F5F5F7 !important;
        color: #000 !important;
        font-weight: 300;
    }

    .show-hide-pass {
        position: absolute;
        font-size: 15px;
        color: grey;
        margin-left: 460px;
        margin-top: -35px;
        cursor: pointer;
    }

    .show-hide-confrim {
        position: absolute;
        font-size: 15px;
        color: grey;
        margin-left: 460px;
        margin-top: -35px;
        cursor: pointer;
    }

    .product-registration-heading {
        padding-top: 50px;
        color: #707070;
        font-size: 22px;
        font-weight: 500;
        font-family: "Roboto", sans-serif;
        line-height: 29px;
        margin-bottom: 40px;
    }

    .prod_reg_pass_err_field {
        margin-left: 330px;
        margin-top: -15px;
        margin-bottom: 6px;
    }

    .prod_reg_rpass_err_field {
        margin-left: 330px;
        margin-top: -15px;
        margin-bottom: 6px;
    }

    .product_registration_input_label_modelName {
        padding-left: 50px;
        margin-top: 10px;
        color: #707070;
        font-size: 16px;
        font-weight: 400;
        line-height: 16px;
        font-family: "Roboto", sans-serif;
    }

    .product_registration_input_label_serial {
        padding-left: 50px;
        margin-top: 10px;
        color: #707070;
        font-size: 16px;
        font-weight: 400;
        line-height: 16px;
        font-family: "Roboto", sans-serif;
    }

    .product_registration_input_label_name {
        padding-left: 50px;
        margin-top: 10px;
        color: #707070;
        font-size: 16px;
        font-weight: 400;
        line-height: 16px;
        font-family: "Roboto", sans-serif;
    }

    .product_registration_input_label_email {
        padding-left: 50px;
        margin-top: 10px;
        color: #707070;
        font-size: 16px;
        font-weight: 400;
        line-height: 16px;
        font-family: "Roboto", sans-serif;
    }

    .product_registration_input_label_password {
        padding-left: 50px;
        margin-top: 10px;
        color: #707070;
        font-size: 16px;
        font-weight: 400;
        line-height: 16px;
        font-family: "Roboto", sans-serif;
    }

    .product_registration_input_label_repassword {
        padding-left: 50px;
        margin-top: 10px;
        color: #707070;
        font-size: 16px;
        font-weight: 400;
        line-height: 16px;
        font-family: "Roboto", sans-serif;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {
        .product-registration {
            max-width: 100% !important;
        }

        .product-registration .product-registration-form {
            max-width: 330px !important;
        }

        .product-registration .product-registration-text {
            max-width: 330px !important;
            font-size: 18px !important;
            margin-top: 50px;
        }

        .product-registration .product-registration-form form {
            max-width: 280px !important;
        }

        .product-registration-inputArea {
            flex-direction: column !important;
            margin-bottom: 0px !important;
        }

        .product-registration-heading {
            padding-top: 35px !important;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 auto;
            font-size: 18px !important;
            margin-bottom: 10px;
        }

        .product-registration-inputField {
            height: 40px !important;
            max-width: 300px !important;
            margin: 0 auto !important;
        }

        .show-hide-pass {
            font-size: 15px;
            color: grey;
            margin-left: 245px !important;
            margin-top: -26px !important;
            cursor: pointer;
        }

        .show-hide-confrim {
            font-size: 15px;
            color: grey;
            margin-left: 245px !important;
            margin-top: -26px !important;
            cursor: pointer;
        }

        .product_registration_input_label_modelName {
            padding-left: 13px;
            margin-bottom: 5px;
        }

        .product_registration_input_label_serial {
            padding-left: 13px;
            margin-bottom: 5px;
        }

        .product_registration_input_label_name {
            padding-left: 13px;
            margin-bottom: 5px;
        }

        .product_registration_input_label_email {
            padding-left: 13px;
            margin-bottom: 5px;
        }

        .product_registration_input_label_password {
            padding-left: 13px;
            margin-bottom: 5px;
        }

        .product_registration_input_label_repassword {
            padding-left: 13px;
            margin-bottom: 5px;
        }

        .product_cancel_register_area {
            flex-direction: column-reverse;
        }

        .product_cancel_register_area {
            margin-left: auto;
            margin-right: auto;
            padding-bottom: 40px;
        }

        .product-continue-button {
            width: 265px !important;
            margin-bottom: 20px;
        }

        .product-cancel-button {
            width: 265px !important;
        }

        .prod_reg_pass_err_field {
            margin-left: 4px;
            margin-top: 10px;
            font-size: 14px;
            margin-bottom: -5px !important;
        }

        .prod_reg_rpass_err_field {
            margin-left: 4px;
            margin-top: 10px;
            font-size: 14px;
            margin-bottom: -5px !important;
        }

        .cancel_register_label {
            display: none;
        }

        .product-registration-verification-modal-area {
            max-width: 310px;
            margin: 0 auto;
            margin-top: -30px;
        }

        .product-registration-verification-modal-content {
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 30px;

        }

        .close-product-registration-verification-modal {
            margin-left: 270px;
            font-size: 28px;
            margin-top: 10px;
        }

        .product-registration-verification-modal-input {
            max-width: 270px;
        }

        .product-registration-verification-modal-title {
            font-size: 16px;
        }

        .product-registration-verification-modal-heading {
            font-size: 14px;
        }

        .product-registration-verification-modal-input-title {
            font-size: 16px;
        }

        .product-registration-verification-modal-success-heading {
            font-size: 14px;
        }

        .product-registration-verification-modal-success-title {
            font-size: 14px;
        }

        .reg_code_err_msg_area {
            font-size: 15px !important;
        }

        .prod_reg_success_circle {
            margin-top: -25px;
        }

        .prod-reg-email-err-modal-area {
            max-width: 310px;
            margin: 0 auto;
            margin-top: -30px;
        }

        .prod-reg-email-err-modal-content {
            padding-left: 5px;
            padding-right: 5px;
            padding-bottom: 30px;

        }

        .close-prod-reg-email-err-modal {
            margin-left: 270px;
            margin-top: 10px;

        }

        .prod-reg-email-err-modal-title {
            font-size: 14px;
        }

        .prod-reg-serial-err-modal-area {
            max-width: 310px;
            margin: 0 auto;
            margin-top: -30px;
        }

        .prod-reg-serial-err-modal-content {
            padding-left: 5px;
            padding-right: 5px;
            padding-bottom: 30px;

        }

        .close-prod-reg-serial-err-modal {
            margin-left: 270px;
            margin-top: 10px;

        }

        .prod-reg-serial-err-modal-title {
            font-size: 14px;
        }
    }

    /* Tab responsive css */
    @media (min-width: 481px) and (max-width: 820px) {
        .product-registration {
            max-width: 100% !important;
        }

        .product-registration .product-registration-form {
            max-width: 670px !important;
        }

        .product-registration .product-registration-text {
            max-width: 670px !important;
        }

        .product-registration-heading {
            padding-top: 50px !important;
            font-size: 22px !important;
            margin-bottom: 30px;
        }

        .product-registration-inputArea {
            flex-direction: row !important;
        }

        .product-registration-inputField {
            height: 55px !important;
            max-width: 390px !important;
            margin: 0 auto !important;
            margin-left: 0px !important;
        }

        .product_registration_input_label_modelName {
            padding-left: 55px;
        }

        .product_registration_input_label_serial {
            padding-left: 55px;
        }

        .product_registration_input_label_name {
            padding-left: 55px;
        }

        .product_registration_input_label_email {
            padding-left: 55px;
        }

        .product_registration_input_label_password {
            padding-left: 55px;
        }

        .product_registration_input_label_repassword {
            padding-left: 55px;
        }

        .show-hide-pass {
            margin-left: 350px;
        }

        .show-hide-confrim {
            margin-left: 350px;
        }

        .product_cancel_register_area {
            margin-left: -8px;
            padding-bottom: 0px;
        }

        .cancel_button_area {
            margin-right: 20px;
        }

        .prod_reg_pass_err_field {
            margin-left: 235px;
        }

        .prod_reg_rpass_err_field {
            margin-left: 235px;
        }
    }

    @media (min-width: 821px) and (max-width: 1280px) {
        .product_cancel_register_area {
            padding-bottom: 0px;
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
                        <a class="active-nav" href="{{ route('product_registration')}}">Registration</a>
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

<!-- <Section class="qbits-top-last">
    <div class="container">
        <div class="middle-qbits-menu">
            <div class="row">
                <div class="col-sm-12">
                    <div class="container d-flex justify-content-start align-items-center"
                        style="width: 980px; margin: 0 auto;">
                        <span style="margin-left: -25px;font-weight: bold;">Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section> -->

<section class="product-registration">
    <div class="product-registration-text">
        <p>Thank you for purchasing the Qbits product! Register your product to elevate your experience with us. Stay
            informed of the latest innovations, and special offers. Get faster updates, warranty service, technical
            support,
            service repair history, product usage tips and so much more.</p>
        <p>Register your Qbits product to get online services, It will take only a few moments. </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="product-registration-form" style="background-color: #fff;">
                    <p class="text-center product-registration-heading"><span>Your product is not registered?
                        </span><span>Register here.</span>
                    </p>
                    <!-- <hr style="color: #C8C8C8"> -->
                    <div id="">
                        <form id="product-registration-submit" method="post">
                            @csrf
                            <div class="row product-registration-inputArea">
                                <label for="model"
                                    class="col-md-4 col-lg-4 col-sm-12 col-form-label product_registration_input_label_modelName">Model
                                    Name:
                                    <span class="text-danger">*</span></label>
                                <div class="col-md-8 col-lg-8 col-sm-12">
                                    <select name="model_name" id="m_name" aria-label="" required style=" outline:none;"
                                        data-control="select2" data-placeholder="Select Model Name ..."
                                        class="form-select  form-select-solid  form-select-md  ms-5 product-registration-inputField">
                                        <option value="">Select Products</option>
                                        @foreach($model_name as $key=>$name)

                                        <option value="{{$name->series_name}}">{{$name->series_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row product-registration-inputArea">
                                <label for="serial"
                                    class="col-md-4 col-lg-4 col-sm-12 col-form-label product_registration_input_label_serial">Serial
                                    No: <span class="text-danger">*</span></label>
                                <div class="col-md-8 col-lg-8 col-sm-12">
                                    <input class="form-control ms-5  border-0 product-registration-inputField"
                                        name="serial_no" id="serial_no" type="text" placeholder="Serial No" required>
                                </div>
                            </div>
                            <div class="row" id="err_serial" style="margin: -30px 0 10px 225px;"></div>
                            <div class="row product-registration-inputArea">
                                <label for="name"
                                    class="col-md-4 col-lg-4 col-sm-12 col-form-label product_registration_input_label_name">Name:
                                    <span class="text-danger">*</span></label>
                                <div class="col-md-8 col-lg-8 col-sm-12">
                                    <input class="form-control ms-5 border-0 product-registration-inputField"
                                        name="customer_name" id="customer_name" type="text" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="row product-registration-inputArea">
                                <label for="email"
                                    class="col-md-4 col-lg-4 col-sm-12 col-form-label product_registration_input_label_email">Email
                                    Address: <span class="text-danger">*</span></label>
                                <div class="col-md-8 col-lg-8 col-sm-12">
                                    <input class="form-control ms-5 border-0 product-registration-inputField"
                                        name="customer_email" id="customer_email" type="email"
                                        placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="row" id="err_prod_reg_email" style="margin: -30px 0 10px 225px;"></div>
                            <div class="row product-registration-inputArea">
                                <label for="password"
                                    class="col-md-4 col-lg-4 col-sm-12 col-form-label product_registration_input_label_password">Password:
                                    <span class="text-danger">*</span></label>
                                <div class="col-md-8 col-lg-8 col-sm-12">
                                    <input class="form-control ms-5 border-0 product-registration-inputField"
                                        name="customer_password" id="customer_password" type="password"
                                        placeholder="Password" required>
                                    <i class="fa fa-light fa-eye-slash show-hide-pass" id="show-hide-pass"
                                        onclick="show()"></i>
                                </div>
                            </div>
                            <div class="col-sm-8 text-danger prod_reg_pass_err_field" id="prod_reg_pass_err_field">
                                <i class="fa fa-exclamation-triangle me-2"></i><span id="prod_reg_pass_err_msg"></span>
                            </div>
                            <!-- <div class="row" id="err_pass" style="margin: -30px 0 10px 225px;"></div> -->
                            <div class="row product-registration-inputArea">
                                <label for="rePassword"
                                    class="col-md-4 col-lg-4 col-sm-12 col-form-label product_registration_input_label_repassword">Confirm
                                    Password: <span class="text-danger">*</span></label>
                                <div class="col-md-8 col-lg-8 col-sm-12">
                                    <input class="form-control ms-5 border-0 product-registration-inputField"
                                        name="customer_repassword" id="customer_repassword" type="password"
                                        placeholder="Confirm Password" required>
                                    <i class="fa fa-light fa-eye-slash show-hide-confrim" id="show-hide-confrim"
                                        onclick="showconfrim()"></i>
                                </div>
                            </div>
                            <div class="col-sm-8 text-danger prod_reg_rpass_err_field" id="prod_reg_rpass_err_field">
                                <i class="fa fa-exclamation-triangle me-2"></i><span id="prod_reg_rpass_err_msg"></span>
                            </div>
                            <!-- <div class="row" id="err_rpass" style="margin: -80px 0 35px 225px;"></div> -->
                            <!-- <div class="row" id="not_match_field mb-3" style="margin: -80px 0 35px 225px;"></div> -->

                            <!-- <input type="checkbox"><span style="padding-left: 20px; font-size:18px;">Remember me</span> -->
                            <!-- <div class="col text-end mb-2" style=" margin-left: -57px !important;">
                                <button type="submit" class="btn btn-primary product-cancel-button">Cancel</button>
                                <button type="submit" class="btn btn-primary product-continue-button" id="product-continue-btn">Register</button>
                            </div> -->


                            <div class="row product_cancel_register_area">
                                <label for="inputAgreeTerms"
                                    class="col-sm-12 col-lg-4 col-md-4 col-form-label cancel_register_label"></label>
                                <div class="col-sm-12 col-lg-3 col-md-3 cancel_button_area">
                                    <button type="button" class="btn product-cancel-button"
                                        onclick="prodregisterCancel()">
                                        {{ __('Cancel') }}
                                    </button>
                                </div>
                                <div class="col-sm-12 col-lg-3 col-md-3 submit_button_area">
                                    <button type="submit" class="product-continue-button" id="product-continue-btn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>





<section class="checkout-content-section">


    <!-- Modal -->
    <div class="modal fade" id="verification_code_modal" tabindex="-1" role="dialog"
        aria-labelledby="verification_code_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered product-registration-verification-modal-area" role="document">
            <div class="modal-content product-registration-verification-modal-content">
                <span><button type="button" class="close-product-registration-verification-modal" data-dismiss="modal"
                        onclick="closeProductRegVerificationModal()">
                        <span>&times;</span>
                    </button></span>
                <div class="modal-body pt-md-0 px-4 px-md-5 text-center" id="verification_code_field">
                    <p class="product-registration-verification-modal-title" id="modal-header">You are almost Done !</p>
                    <p class="product-registration-verification-modal-heading" id="modal-second-header">We have send you
                        a verification code
                        to your email</p>
                    <p class="product-registration-verification-modal-input-title">Enter the code here</p>
                    <form id="codeSubmit">
                        @csrf
                        <div class="form-group text-centers">
                            <input type="text"
                                class="form-control mx-auto product-registration-verification-modal-input"
                                name="verify_code" id="verify_code" />
                            <div id="reg_code_err_msg_area" class="text-center reg_code_err_msg_area mt-2"
                                style="color: #f25b5b;"><i class="fa fa-exclamation-triangle me-2"></i><span
                                    id="reg_code_err_msg"></span></div>
                            <button type="button" class="product-registration-verification-modal-btn"
                                onclick="verifyCodeSubmit()">Continue</button>
                        </div>
                    </form>
                </div>

                <div class="modal-body pt-md-0 px-4 px-md-5 text-center" id="verification_completed_field">
                    <div class="prod_reg_success_circle">
                        <img style="padding-top: 11px;padding-left: 2px;" src="{{ asset('success_icon.png') }}"
                            alt="success" />
                    </div>
                    <p class="product-registration-verification-modal-success-title" id="modal-second-header">Your
                        product has been registered successfully!</p>
                    <p class="product-registration-verification-modal-success-heading">Thank you, we have received your
                        registation request. Our team is reviewing your information and will be in touch soon. Please
                        reach out to us if you have any questions!</p>
                    <!-- <button type="button" class="product-registration-verification-modal-btn" onclick="continueRegistrationList()">Continue</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="product_registration_email_error_modal" tabindex="-1" role="dialog"
        aria-labelledby="verification_code_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered prod-reg-email-err-modal-area" role="document">
            <div class="modal-content prod-reg-email-err-modal-content">
                <span><button type="button" class="close-prod-reg-email-err-modal" data-dismiss="modal"
                        onclick="closeProductRegEmailErrModal()">
                        <span>&times;</span>
                    </button></span>
                <div class="modal-body pt-md-0 px-4 px-md-5 text-center">
                    <div class="prod_reg_success_circle">
                        <img style="padding-top: 7px;padding-left: 1px;" src="{{ asset('error_icon.png') }}"
                            alt="error" />
                    </div>
                    <p class="prod-reg-email-err-modal-title">There is already registered a account with this email
                        address. Please sign in to your existing account.</p>
                    <button type="button" class="product-registration-verification-modal-btn"
                        onclick="continueSignin()">Sign in</button>
                    <!-- <p class="product-registration-success-modal-input-title">Didn't register your product? <a href="javascript:void(0)" style="text-decoration: none;">Let us know.</a></p> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="product_registration_serial_error_modal" tabindex="-1" role="dialog"
        aria-labelledby="verification_code_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered prod-reg-serial-err-modal-area" role="document">
            <div class="modal-content prod-reg-serial-err-modal-content">
                <span><button type="button" class="close-prod-reg-serial-err-modal" data-dismiss="modal"
                        onclick="closeProductRegSerialErrModal()">
                        <span>&times;</span>
                    </button></span>
                <div class="modal-body pt-md-0 px-4 px-md-5 text-center">
                    <div class="prod_reg_success_circle">
                        <img style="padding-top: 7px;padding-left: 1px;" src="{{ asset('error_icon.png') }}"
                            alt="error" />
                    </div>
                    <p class="prod-reg-serial-err-modal-title">There is already a product registered with this serial.
                    </p>
                    <button type="button" class="product-registration-verification-modal-btn"
                        onclick="continueSignin()">Sign in</button>
                    <!-- <p class="product-registration-success-modal-input-title">Didn't register your product? <a href="javascript:void(0)" style="text-decoration: none;">Let us know.</a></p> -->
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="product_registration_invalid_serial_error_modal" tabindex="-1" role="dialog"
        aria-labelledby="verification_code_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered prod-reg-serial-err-modal-area" role="document">
            <div class="modal-content prod-reg-serial-err-modal-content">
                <span><button type="button" class="close-prod-reg-serial-err-modal" data-dismiss="modal"
                        onclick="closeProductRegInvalidSerialErrModal()">
                        <span>&times;</span>
                    </button></span>
                <div class="modal-body pt-md-0 px-4 px-md-5 text-center">
                    <div class="prod_reg_success_circle">
                        <img style="padding-top: 7px;padding-left: 1px;" src="{{ asset('error_icon.png') }}"
                            alt="error" />
                    </div>
                    <p class="prod-reg-serial-err-modal-title">Invalid Serial Number.Please enter a valid serial for
                        registered your product.
                    </p>
                    <button type="button" class="product-registration-verification-modal-btn"
                        onclick="closeProductRegInvalidSerialErrModal()">Ok</button>
                    <!-- <p class="product-registration-success-modal-input-title">Didn't register your product? <a href="javascript:void(0)" style="text-decoration: none;">Let us know.</a></p> -->
                </div>
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

    // document.body.onkeydown = function(e) {
    //     if (e.keyCode == 13) {
    //             e.preventDefault();
    //             var isSendCode = jQuery("#send_code").val();
    //             var email = jQuery("#customer_email").val();
    //             if (isSendCode) {
    //                 $('#verification_code_modal').modal('show');
    //                 $('#modal_email').html(email);
    //             } else {
    //                 document.getElementById("prod_reg_pass_err_field").style.display = "none";
    //                 document.getElementById("prod_reg_rpass_err_field").style.display = "none";
    //                 document.getElementById("err_serial").style.display = "none";
    //                 document.getElementById("err_prod_reg_email").style.display = "none";
    //                 $("#prod_reg_pass_err_msg").html('');
    //                 $("#prod_reg_rpass_err_msg").html('');
    //                 var pass = jQuery("#customer_password").val();
    //                 var rpass = jQuery('#customer_repassword').val();
    //                 if (pass.length < 6) {
    //                     document.getElementById("prod_reg_rpass_err_field").style.display = "none";
    //                     document.getElementById("prod_reg_pass_err_field").style.display = "block";
    //                     $("#prod_reg_pass_err_msg").html("Password should be greater or equal 6");
    //                     if (rpass.length < 6) {
    //                         document.getElementById("prod_reg_rpass_err_field").style.display = "block";
    //                         $("#prod_reg_rpass_err_msg").html("Password should be greater or equal 6");
    //                         return;
    //                     }
    //                     return;
    //                 }
    //                 if (rpass.length < 6) {
    //                     document.getElementById("prod_reg_pass_err_field").style.display = "none";
    //                     document.getElementById("prod_reg_rpass_err_field").style.display = "block";
    //                     $("#prod_reg_rpass_err_msg").html("Password should be greater or equal 6");
    //                     return;
    //                 }

    //                 if (pass != rpass) {

    //                     document.getElementById("prod_reg_rpass_err_field").style.display = "block";
    //                     document.getElementById("prod_reg_pass_err_field").style.display = "none";
    //                     jQuery("#prod_reg_rpass_err_msg").html("Password not matched.");
    //                     return;
    //                 } else {
    //                     document.getElementById("prod_reg_pass_err_field").style.display = "none";
    //                     document.getElementById("prod_reg_rpass_err_field").style.display = "none";
    //                     var data = jQuery('#product-registration-submit').serialize();
    //                     var spinner =
    //                         '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> Wait...';
    //                     $('#product-continue-btn').html(spinner);
    //                     jQuery.ajax({
    //                         url: '/product-registration-submit',
    //                         data: data,
    //                         type: 'post',
    //                         success: function (result) {
    //                             $('#product-continue-btn').html('Continue');
    //                             if (result.status == 'success') {
    //                                 jQuery("#send_code").val(1);
    //                                 $('#verification_code_modal').modal('show');
    //                             } else if (result.status == 'error') {
    //                                 if (result.type == 'serial') {
    //                                     $('#product_registration_serial_error_modal').modal('show');
    //                                 } else if (result.type == 'email') {
    //                                     $('#product_registration_email_error_modal').modal('show');
    //                                 }
    //                             }
    //                         }
    //                     });
    //                 }
    //             }
    //     }
    // };

    $("#product-registration-submit").on('submit', function (e) {
        e.preventDefault();
        var isSendCode = jQuery("#send_code").val();
        var email = jQuery("#customer_email").val();
        if (isSendCode) {
            $('#verification_code_modal').modal('show');
            $('#modal_email').html(email);
        } else {
            document.getElementById("prod_reg_pass_err_field").style.display = "none";
            document.getElementById("prod_reg_rpass_err_field").style.display = "none";
            document.getElementById("err_serial").style.display = "none";
            document.getElementById("err_prod_reg_email").style.display = "none";
            $("#prod_reg_pass_err_msg").html('');
            $("#prod_reg_rpass_err_msg").html('');
            var pass = jQuery("#customer_password").val();
            var rpass = jQuery('#customer_repassword').val();
            if (pass.length < 6) {
                document.getElementById("prod_reg_rpass_err_field").style.display = "none";
                document.getElementById("prod_reg_pass_err_field").style.display = "block";
                $("#prod_reg_pass_err_msg").html("Password should be greater or equal 6");
                if (rpass.length < 6) {
                    document.getElementById("prod_reg_rpass_err_field").style.display = "block";
                    $("#prod_reg_rpass_err_msg").html("Password should be greater or equal 6");
                    return;
                }
                return;
            }
            if (rpass.length < 6) {
                document.getElementById("prod_reg_pass_err_field").style.display = "none";
                document.getElementById("prod_reg_rpass_err_field").style.display = "block";
                $("#prod_reg_rpass_err_msg").html("Password should be greater or equal 6");
                return;
            }

            if (pass != rpass) {

                document.getElementById("prod_reg_rpass_err_field").style.display = "block";
                document.getElementById("prod_reg_pass_err_field").style.display = "none";
                jQuery("#prod_reg_rpass_err_msg").html("Password not matched.");
                return;
            } else {
                document.getElementById("prod_reg_pass_err_field").style.display = "none";
                document.getElementById("prod_reg_rpass_err_field").style.display = "none";
                var data = jQuery('#product-registration-submit').serialize();
                var spinner =
                    '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> Wait...';
                $('#product-continue-btn').html(spinner);
                jQuery.ajax({
                    url: '/product-registration-submit',
                    data: data,
                    type: 'post',
                    success: function (result) {
                        $('#product-continue-btn').html('Continue');
                        if (result.status == 'success') {
                            jQuery("#send_code").val(1);
                            $('#verification_code_modal').modal('show');
                            // $('#modal_email').html(email);
                        } else if (result.status == 'error') {
                            if (result.type == 'serial') {
                                // document.getElementById("err_serial").style.display = "block";
                                // $("#err_serial").html(result.msg);
                                $('#product_registration_serial_error_modal').modal('show');
                                // swal('Opps..', result.msg, 'warning');
                            } else if (result.type == 'invalid-serial') {
                                $('#product_registration_invalid_serial_error_modal').modal('show');
                            } else if (result.type == 'email') {
                                $('#product_registration_email_error_modal').modal('show');
                            }
                        }
                    }
                });
            }
        }

    })


    function verifyCodeSubmit() {
        var data = jQuery('#verifyCodeSubmit').serialize();
        var verify_code = jQuery('#verify_code').val();
        document.getElementById('reg_code_err_msg_area').style.display = 'none';
        jQuery('#reg_code_err_msg').html("");
        if (verify_code == '') {
            document.getElementById("reg_code_err_msg_area").style.display = "block";
            $('#reg_code_err_msg').html('This field should not be empty.');
            return;
        } else {
            jQuery.ajax({
                url: '/product_reg_code_submit',
                data: 'verify_code=' + verify_code + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {

                    if (result.status == 'success') {
                        jQuery("#send_code").val("");
                        document.getElementById('reg_code_err_msg_area').style.display = 'none';
                        jQuery('#reg_code_err_msg').html("");
                        document.getElementById('verification_code_field').style.display = 'none';
                        document.getElementById('verification_completed_field').style.display = 'block';
                    } else if (result.status == 'error') {
                        document.getElementById('reg_code_err_msg_area').style.display = 'block';
                        jQuery('#reg_code_err_msg').html(result.msg);
                    }
                }
            });
        }
    }

    // function continueRegistrationList(){
    //     window.location.href = "{{route('view')}}";
    // }

    // eye
    function show() {
        var pswrd = document.getElementById('customer_password');
        var icon = document.getElementById('show-hide-pass');
        if (pswrd.type === "password") {
            pswrd.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            pswrd.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    }

    function showconfrim() {
        var pswrd = document.getElementById('customer_repassword');
        var icon = document.getElementById('show-hide-confrim');
        if (pswrd.type === "password") {
            pswrd.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            pswrd.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    }

    function prodregisterCancel() {
        window.location.href = "{{route('index')}}";
    }

    function continueSignin() {
        window.location.href = "{{route('signin')}}";
    }

    function closeProductRegVerificationModal() {
        $('#verification_code_modal').modal('hide');
    }

    function closeProductRegEmailErrModal() {
        $('#product_registration_email_error_modal').modal('hide');
    }

    function closeProductRegSerialErrModal() {
        $('#product_registration_serial_error_modal').modal('hide');
    }

    function closeProductRegInvalidSerialErrModal() {
        $('#product_registration_invalid_serial_error_modal').modal('hide');
    }

</script>


<input type="hidden" id="send_code" value="">
<form id="signupForm">
    <input type="hidden" id="name" name="name" />
    <input type="hidden" id="phone" name="phone" />
    <input type="hidden" id="email" name="email" />
    @csrf
</form>
<!-- <script src="{{asset('backend/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/scripts.bundle.js')}}"></script>
<link href="{{asset('backend/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" /> -->
@endsection
