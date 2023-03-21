@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')

<style>
    body {
        overflow-x: hidden;
    }

    .signup-area {
        overflow: hidden;
        background: #E1E1E1;
    }

    .signup-area .signup-form {
        max-width: 980px !important;
        margin: 0 auto;
        box-shadow: -1px 0px 16px 0px #70707040 !important;
        border-radius: 30px;
        margin-top: 60px;
        margin-bottom: 60px;
        font-family: "Roboto", sans-serif;
        background: #fff !important;
        color: #c2baba !important;
    }

    .signup-area .signin-form p {
        font-size: 16px;
    }

    .signup-area .signup-form a {
        text-decoration: none;
        font-size: 18px;
        font-weight: 500;
        color: #2699fb;
    }

    .signup-area .signup-form form {
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 60px;
    }

    .signup-area .signup-form form .form-control {
        outline: 0;
        border-color: #a1a1a6;
        opacity: 100%;
    }

    .signup-area .signup-form form .form-control:focus {
        border-color: green;
    }

    .signup-area .signup-form form .signup-button {
        margin-top: 25px;
        margin-bottom: 30px;
        padding: 5px 30px;
        border-radius: 30px;
        font-size: 20px;
        font-weight: 300;
        background-color: #4ba1ec;
    }

    .signup-area .signup-form form .signup-button:hover {
        font-weight: 400;
        background-color: #2692f0;
    }

    .signup-area .signup-form form .forget-password {
        cursor: pointer;
    }

    .signup-area .signup-social-button {
        margin: 0 auto;
        margin-bottom: 60px;
        width: 600px;
    }

    .signup-area .signup-social-button .signup-google-button {
        padding: 15px 20px;
        border-radius: 50px;
        background-color: #2699fb;
        color: #fff;
        font-size: 18px;
        text-align: center;
        width: 260px;
    }

    .signup-area .signup-social-button .signup-google-button img {
        padding-right: 10px;
    }

    .signup-area .signup-social-button .signup-facebook-button {
        padding: 15px 20px;
        border-radius: 50px;
        background-color: #3b5998;
        color: #fff;
        font-size: 18px;
        text-align: center;
        width: 275px;
    }

    .signup-area .signup-social-button .signup-facebook-button img {
        padding-right: 10px;
    }

    .signup-area .signup-form form .signup-button {
        margin-top: 25px;
        margin-bottom: 30px;
        padding: 5px 30px;
        border-radius: 30px;
        font-size: 18px;
        font-weight: 300;
        background-color: #4ba1ec;
        color: #fff;
    }

    .signup-area .signup-form form .signup-button:hover {
        font-weight: 400;
        background-color: #2692f0;
    }

    .signup-area .signup-form form .signup_cancel_submit_area .cancel_button_area .cancel-button {
        margin: 25px 0;
        padding: 5px 30px;
        border-radius: 30px;
        font-size: 18px;
        font-weight: 300;
        background-color: #e1e1e1;
        color: #000;
    }

    .signup-area .signup-form form .signup_cancel_submit_area .cancel_button_area .cancel-button:hover {
        font-weight: 400;
        color: #fff;
        background-color: #2692f0;
    }

    .signup-area .signup-form .signup-heading {
        padding-top: 55px !important;
        font-size: 22px;
        font-family: Roboto;
        font-weight: 500;
        line-height: 29px;
        color: #707070;
        text-align: center;
        margin-bottom: 40px;
    }

    .signup-area .signup-form .signup-form-area {
        margin-top: 10px;
        max-width: 700px;
    }

    .signup-inputArea {
        margin-bottom: 25px;
    }

    .signup-inputField {
        background-color: #E1E1E1;
        outline: none;
        border-radius: 8px;
        height: 55px;
        max-width: 470px;
    }

    .signup-inputField:focus {
        background: #e3e3e7 !important;
        color: rgb(4, 4, 4) !important;
        font-weight: 300;
    }

    .rpass-show-hide {
        position: absolute;
        font-size: 15px;
        color: grey;
        margin-left: 465px;
        margin-top: -35px;
        cursor: pointer;
    }

    .pass-show-hide {
        position: absolute;
        font-size: 15px;
        color: grey;
        margin-left: 465px;
        margin-top: -35px;
        cursor: pointer;
    }

    #reg_name_err_field {
        display: none;
    }

    #reg_email_err_field {
        display: none;
    }

    #reg_pass_err_field {
        display: none;
    }

    #reg_rpass_err_field {
        display: none;
    }

    .reg_name_err_field {
        margin-left: 290px;
        margin-top: -15px;
        margin-bottom: 6px;
    }

    .reg_email_err_field {
        margin-left: 290px;
        margin-top: -15px;
        margin-bottom: 10px;
    }

    .reg_pass_err_field {
        margin-left: 290px;
        margin-top: -15px;
        margin-bottom: 6px;
    }

    .reg_rpass_err_field {
        margin-left: 290px;
        margin-top: -15px;
        margin-bottom: 15px;
    }

    .signup-cancel-btn {
        margin-top: 42px;
        width: 175px !important;
        height: 55px !important;
        padding: 0.5vw 2vw;
        border-radius: 30px !important;
        color: #3C3C3C;
        background-color: #E1E1E1;
        outline: none;
        border: none;
    }

    .signup-cancel-btn:hover {
        background-color: #0071e3 !important;
        color: #ffffff !important;
    }

    .signup-btn {
        margin-top: 42px !important;
    }

    .signup_cancel_submit_area {
        margin-top: -12px;
    }

    .cancel_button_area {
        margin-left: 50px;
        margin-right: 20px;
    }

    #verification_success_field {
        display: none;
    }

    /*----------------*/
    .signup-verify-modal-area {
        max-width: 654px;
        margin: 0 auto;
    }

    .signup-verification-modal-content {
        height: auto;
        background-color: #272727;
        border-radius: 20px;
        padding-bottom: 45px;

    }

    .close-signup-verification-modal {
        outline: none;
        border: none;
        background: #272727;
        margin-left: 455px;
        margin-top: 15px;
        font-size: 28px;
        color: #91919d;

    }

    .signup-verification-modal-title {
        font-size: 18px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #F5F5F7;
        line-height: 24px;
        text-align: center;
        margin-bottom: 5px;
    }

    .signup-verification-modal-heading {
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        line-height: 21px;
        text-align: center;
        color: #F5F5F7;
        margin-bottom: 30px;
    }

    .signup-verification-modal-input-label {
        font-size: 18px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #F5F5F7;
        line-height: 24px;
        text-align: center;
        margin-bottom: 20px;
    }

    .signup-verification-modal-input {
        max-width: 380px;
        height: 55px;
        border-radius: 10px;
    }

    .signup-verification-continue-btn {
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

    .signup-verification-continue-btn:hover {
        background-color: #0071e3 !important;
        color: #ffffff !important;
    }

    /*----------------*/

    #signup_code_err_msg_area {
        display: none;
    }

    input[type="checkbox"i] {
        width: 1rem;
        height: 1rem;
    }

    .create-account:hover {
        text-decoration: underline !important;
    }

    .input_agree_terms_area {
        margin: 10px 0;
        width: 664px;
        margin-left: 125px;
    }

    .already_account_area {
        padding-bottom: 60px;
        margin-top: -5px;
    }

    .already_account_text {
        color: #A0A0A5;
        margin-left: 50px;
        font-size: 16px;
        font-family: Roboto;
        font-weight: 400;
    }

    .signup_code_err_msg_area {
        font-size: 16px;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {

        .signup-area {
            max-width: 100% !important;
        }

        .signup-area .signup-form {
            max-width: 330px !important;
        }

        .signup-area .signup-form .signup-form-area {
            max-width: 280px !important;
        }

        .signup-inputArea {
            flex-direction: column !important;
            margin-bottom: 0px !important;
        }

        .signup-area .signup-form .signup-heading {
            padding-top: 25px !important;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 auto;
        }

        .signup-inputField {
            height: 40px !important;
            max-width: 300px !important;
            margin: 0 auto !important;
        }

        .pass-show-hide {
            font-size: 15px;
            color: grey;
            margin-left: 245px !important;
            margin-top: -26px !important;
            cursor: pointer;
        }

        .rpass-show-hide {
            font-size: 15px;
            color: grey;
            margin-left: 245px !important;
            margin-top: -26px !important;
            cursor: pointer;
        }

        /* input[type="checkbox" i] {
            height: 3.5rem;
        } */

        .input_agree_terms_area {
            margin: 10px auto;
            margin-top: 15px;
            width: 310px;
            margin-left: 3px;
        }

        .reg_name_err_field {
            margin-left: 4px;
            margin-top: 10px;
            font-size: 14px;
            margin-bottom: -5px;
        }

        .reg_email_err_field {
            margin-left: 4px;
            margin-top: 10px;
            font-size: 14px;
            margin-bottom: -5px !important;
        }

        .reg_pass_err_field {
            margin-left: 4px;
            margin-top: 10px;
            font-size: 14px;
            margin-bottom: -5px !important;
        }

        .reg_rpass_err_field {
            margin-left: 4px;
            margin-top: 10px;
            font-size: 14px;
            margin-bottom: -5px !important;
        }

        .signup-cancel-btn {
            width: 285px !important;
            margin-top: 0px;
        }

        .signup-btn {
            margin-top: 30px !important;
        }

        .modal-continue-btn {
            width: 285px !important;
        }

        .signup_cancel_submit_area {
            flex-direction: column-reverse;
        }

        .cancel_button_area {
            margin-left: auto;
            margin-right: auto;
        }

        .signup-area .signup-form form .signup_cancel_submit_area .cancel_button_area .cancel-button {
            margin: 25px auto 5px;
            width: 285px !important;
            height: 60px !important;
        }

        .already_account_area {
            text-align: center;
            padding-bottom: 30px;
        }

        .already_account_text {
            margin-left: 0px;
        }

        /*--------------------*/
        .signup-verification-modal-area {
            max-width: 310px;
            margin: 0 auto;
            margin-top: -30px;
        }

        .signup-verification-modal-content {
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 30px;

        }

        .close-signup-verification-modal {
            margin-left: 270px;
            font-size: 28px;
            margin-top: 10px;
        }

        .signup-verification-modal-title {
            font-size: 16px;
        }

        .signup-verification-modal-heading {
            font-size: 13px;
        }

        .signup-verification-modal-input-label {
            font-size: 16px;
        }

        .signup-verification-modal-input {
            max-width: 270px;
        }

        .signup_code_err_msg_area {
            font-size: 15px;
        }

        /*--------------------*/
    }


    /* Tab responsive css */
    @media (min-width: 481px) and (max-width: 820px) {
        .signup-area {
            max-width: 100% !important;
        }

        .signup-area .signup-form .signup-form-area {
            max-width: 560px !important;
        }

        .signup-area .signup-form .signup-heading {
            padding-top: 40px !important;
            margin-bottom: 30px;
        }

        .signup-inputArea {
            flex-direction: row !important;
        }

        .signup-inputField {
            height: 55px !important;
            max-width: 420px !important;
            margin: 0 auto !important;
        }

        .pass-show-hide {
            margin-left: 325px;
        }

        .rpass-show-hide {
            margin-left: 325px;
        }

        .input_agree_terms_area {
            width: 462px;
            margin-left: 81px;
        }

        .reg_name_err_field {
            margin-left: 198px;
            font-size: 16px;
        }

        .reg_email_err_field {
            margin-left: 198px;
            font-size: 16px;
        }

        .reg_pass_err_field {
            margin-left: 198px;
            font-size: 16px;
        }

        .reg_rpass_err_field {
            margin-left: 198px;
            font-size: 16px;
        }

        .cancel_button_area {
            margin-left: 2px;
            margin-right: 43px;
        }

        .already_account_area {
            padding-bottom: 40px;
        }

        .already_account_text {
            margin-left: 4px;
        }

        .signup-verification-modal-area {
            max-width: 580px;
            margin-top: auto;
            margin-bottom: auto;
        }

        .close-signup-verification-modal {
            margin-left: 530px;
            font-size: 28px;
        }
    }

    @media (min-width: 821px) and (max-width: 1280px) {
        .signup-area {
            max-width: 100% !important;
        }

        .signup-area .signup-form .signup-form-area {
            max-width: 735px !important;
        }

        .signup-inputField {
            height: 55px !important;
            max-width: 420px !important;
            margin: 0 auto !important;
        }

        .pass-show-hide {
            margin-left: 405px;
        }

        .rpass-show-hide {
            margin-left: 405px;
        }

        .input_agree_terms_area {
            margin-left: 120px;
        }

        .cancel_button_area {
            margin-left: 30px;
        }

        .already_account_text {
            margin-left: 30px;
        }

        .signup-verification-modal-area {
            margin-top: auto;
            margin-bottom: auto;
        }

        .close-signup-verification-modal {
            font-size: 28px;
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



<section class="signup-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="signup-form">

                    <p class="signup-heading"><span>Are you new to Qbits? </span><span>Create your Account.</span></p>
                    <!-- <form method="POST" action="{{ route('register') }}" style="width: 50vw;"> -->
                    <form class="signup-form-area" id="frmSignup">
                        @csrf
                        <div class="row signup-inputArea">
                            <label for="inputName"
                                class="col-md-4 col-lg-4 col-sm-12 col-form-label mt-2 signup_input_label_name">Name :
                                <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-8 col-sm-12">
                                <input class="form-control ms-5 border-0 signup-inputField" name="name" id="name"
                                    type="text" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-sm-8 text-danger reg_name_err_field" id="reg_name_err_field">
                            <i class="fa fa-exclamation-triangle me-2"></i><span id="reg_name_err_msg"></span>
                        </div>

                        <!-- <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> -->

                        <div class="row signup-inputArea">
                            <label for="inputEmail"
                                class="col-md-4 col-lg-4 col-sm-12 col-form-label pt-3 signup_input_label_email">Email :
                                <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-8 col-sm-12">
                                <input class="form-control ms-5 border-0 signup-inputField" name="email" id="email"
                                    type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-8 text-danger reg_email_err_field" id="reg_email_err_field">
                            <i class="fa fa-exclamation-triangle me-2"></i><span id="reg_email_err_msg"></span>
                        </div>

                        <div class="row signup-inputArea">
                            <label for="inputPhone"
                                class="col-md-4 col-lg-4 col-sm-12 col-form-label pt-3 signup_input_label_phone">Phone :
                            </label>
                            <div class="col-md-8 col-lg-8 col-sm-12">
                                <input class="form-control ms-5 border-0 signup-inputField" name="phone" id="phone"
                                    type="text" placeholder="Phone">
                            </div>
                        </div>

                        <!-- <div class="row">
                        <label for="inputAddress" class="col-sm-3 col-form-label">Address :</label>
                        <div class="col-sm-8">
                            <textarea class="form-control ms-5 border-0" name="address" id="address" cols="4" rows="1" style="background-color: #E1E1E1; outline:none; border-radius: 8px;" placeholder="Address"></textarea>
                        </div>
                    </div> -->


                        <div class="row signup-inputArea" style="position: relative;">
                            <label for="inputPassword"
                                class="col-md-4 col-lg-4 col-sm-12 col-form-label pt-3 signup_input_label_password">Password
                                : <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-8 col-sm-12">
                                <input class="form-control ms-5 border-0 signup-inputField" name="password"
                                    id="password" type="password" placeholder="Password">
                                <i class="fa fa-light fa-eye-slash pass-show-hide" id="pass-show-hide"
                                    onclick="passShow()"></i>
                            </div>

                        </div>
                        <div class="col-sm-8 text-danger reg_pass_err_field" id="reg_pass_err_field">
                            <i class="fa fa-exclamation-triangle me-2"></i><span id="reg_pass_err_msg"></span>
                        </div>

                        <div class="row signup-inputArea" style="position: relative;">
                            <label for="inputPassword2"
                                class="col-md-4 col-lg-4 col-sm-12 col-form-label pt-3 signup_input_label_repassword">Repeat
                                Password : <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-8 col-sm-12">
                                <input class="form-control ms-5 border-0 signup-inputField" name="rpassword"
                                    id="rpassword" type="password" placeholder="Repeat Password">
                                <i class="fa fa-light fa-eye-slash rpass-show-hide" id="rpass-show-hide"
                                    onclick="passShowRepeat()"></i>
                            </div>

                        </div>
                        <div class="col-sm-8 text-danger reg_rpass_err_field" id="reg_rpass_err_field">
                            <i class="fa fa-exclamation-triangle me-2"></i><span id="reg_rpass_err_msg"></span>
                        </div>

                        <div class="row input_agree_terms_area">
                            <label for="inputAgreeTerms" class="col-md-3 col-lg-3 col-sm-12 col-form-label"></label>
                            <div class="col-md-9 col-lg-9 col-sm-12">
                                <input style="font-size: 35px;margin-left: -12px;" type="checkbox" id="agree-terms"
                                    onclick="btnEnabled()"><span
                                    style="padding-left: 10px; font-size:16px;font-family: Roboto;font-weight:400;color: #272727">I
                                    agree with the <a href="{{ route('privacy')}}"
                                        style="font-size: 16px;cursor: pointer;text-decoration: underline;">Privacy
                                        Policy</a> and <a href="{{ route('term')}}"
                                        style="font-size: 16px;cursor: pointer;text-decoration: underline;">Term &
                                        Condition</a></span>
                            </div>
                        </div>



                        <div class="row signup_cancel_submit_area">
                            <label for="inputAgreeTerms" class="col-sm-12 col-lg-4 col-md-4 col-form-label"></label>
                            <div class="col-sm-12 col-lg-3 col-md-3 cancel_button_area">
                                <button type="button" class="signup-cancel-btn" onclick="signupCancel()">
                                    {{ __('Cancel') }}
                                </button>
                            </div>
                            <div class="col-sm-12 col-lg-3 col-md-3 submit_button_area">
                                <button type="button" class="modal-continue-btn signup-btn" id="signup-btn"
                                    disabled="true" style="cursor: not-allowed;" onclick="signupFormSubmit()">
                                    {{ __('Sign up') }}
                                </button>
                            </div>
                        </div>

                        <div class="row already_account_area">
                            <label for="inputPassword" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-7">
                                <span class="already_account_text">Already have account?&nbsp;&nbsp;</span><span><a
                                        href="{{ route('signin')}}" class="create-account">Sign in</a></span>
                            </div>
                        </div>



                        <!-- <div class="row">
                        <label for="inputConfirmPassword" class="col-sm-3 col-form-label">Confirm Password : <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control ms-5 border-0"
                                style="background-color: #E1E1E1; outline:none; border-radius: 8px;"
                                name="c_password" id="c_password" type="password" placeholder="Confirm Password" required>
                        </div>
                    </div> -->

                        <!-- <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> -->

                        <!-- <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div> -->

                        <!-- <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn signup-button">
                                {{ __('Sign up') }}
                            </button>
                        </div>
                    </div> -->
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="signup-social-button">
			<div class="row">
				<div class="col-6">
					<div class="signup-google-button">
					<img src="{{ asset('frontend/sigma/icons/google.png') }}" alt=""><span>Continue with google</span>
					</div>
				</div>

				<div class="col-6">
					<div class="signup-facebook-button">
						<img src="{{ asset('frontend/sigma/icons/facebook.png') }}" alt=""><span>Continue with facebook</span>
					</div>
				</div>
			</div>
		</div>
    </div> -->
</section>
<input type="hidden" id="send_code" value="">
<input type="hidden" id="isAdmin" value="0">
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    function passShow() {
        var pswrd = document.getElementById('password');
        var icon = document.getElementById('pass-show-hide');
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

    function passShowRepeat() {
        var pswrd = document.getElementById('rpassword');
        var icon = document.getElementById('rpass-show-hide');
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


    function btnEnabled() {
        var check = document.getElementById("agree-terms");
        var btn = document.getElementById("signup-btn");
        if (check.checked) {
            btn.removeAttribute("disabled");
            btn.style.cursor = "pointer";
        } else {
            btn.disabled = "true";
            btn.style.cursor = "not-allowed";
        }
    }

    document.body.onkeydown = function(e) {
        if (e.keyCode == 13){
            if (!$("#agree-terms").is(":checked")) {
                return false;
            } else {
                signupFormSubmit();
            }
        }
    };


    function signupFormSubmit() {
        document.getElementById('reg_name_err_field').style.display = "none";
        document.getElementById('reg_email_err_field').style.display = "none";
        document.getElementById('reg_pass_err_field').style.display = "none";
        document.getElementById('reg_rpass_err_field').style.display = "none";
        $("#reg_name_err_msg").html('');
        $("#reg_email_err_msg").html('');
        $("#reg_pass_err_msg").html('');
        $("#reg_rpass_err_msg").html('');
        var isSendCode = jQuery("#send_code").val();
        // document.getElementById('code_err_msg').style.display = "none";
        if (isSendCode) {
            $('#signupVerificationModal').modal('show');
            $('#modal-second-header').html('We already send you a verification code.');
            $('#modal_email').hide();
        } else {
            var reg_name = $('#name').val();
            var reg_email = $("#email").val();
            var reg_pass = $("#password").val();
            var reg_rpass = $("#rpassword").val();
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (reg_name == '' && reg_email == '' && reg_pass == '' && reg_rpass == '') {
                document.getElementById('reg_name_err_field').style.display = "block";
                document.getElementById('reg_email_err_field').style.display = "block";
                document.getElementById('reg_pass_err_field').style.display = "block";
                document.getElementById('reg_rpass_err_field').style.display = "block";
                $("#reg_name_err_msg").html('This name field is required.');
                $("#reg_email_err_msg").html('This email field is required.');
                $("#reg_pass_err_msg").html('This password field is required.');
                $("#reg_rpass_err_msg").html('This repeat password field is required.');
                return;
            } else if (reg_name != '' && reg_email == '' && reg_pass == '' && reg_rpass == '') {
                document.getElementById('reg_name_err_field').style.display = "none";
                document.getElementById('reg_email_err_field').style.display = "block";
                document.getElementById('reg_pass_err_field').style.display = "block";
                document.getElementById('reg_rpass_err_field').style.display = "block";
                $("#reg_email_err_msg").html('This email field is required.');
                $("#reg_pass_err_msg").html('This password field is required.');
                $("#reg_rpass_err_msg").html('This repeat password field is required.');
                return;
            } else if (reg_name == '' && reg_email != '' && reg_pass == '' && reg_rpass == '') {
                document.getElementById('reg_name_err_field').style.display = "block";
                document.getElementById('reg_pass_err_field').style.display = "block";
                document.getElementById('reg_rpass_err_field').style.display = "block";
                $("#reg_name_err_msg").html('This name field is required.');
                $("#reg_email_err_msg").html('This email field is required.');
                $("#reg_pass_err_msg").html('This password field is required.');
                $("#reg_rpass_err_msg").html('This repeat password field is required.');
                if (!regex.test(reg_email)) {
                    document.getElementById('reg_email_err_field').style.display = "block";
                    $("#reg_email_err_msg").html('Please enter a valid email.');
                } else {
                    document.getElementById('reg_email_err_field').style.display = "none";
                    $("#reg_email_err_msg").html('');
                }
                return;
            } else if (reg_name == '' && reg_email == '' && reg_pass != '' && reg_rpass == '') {
                document.getElementById('reg_name_err_field').style.display = "block";
                document.getElementById('reg_email_err_field').style.display = "block";
                document.getElementById('reg_rpass_err_field').style.display = "block";
                $("#reg_name_err_msg").html('This name field is required.');
                $("#reg_email_err_msg").html('This email field is required.');
                $("#reg_rpass_err_msg").html('This repeat password field is required.');
                if (reg_pass.length < 6) {
                    document.getElementById('reg_pass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('Password should be equal or more than 6 character.');
                } else {
                    document.getElementById('reg_pass_err_field').style.display = "none";
                    $("#reg_pass_err_msg").html('');
                }
                return;
            } else if (reg_name == '' && reg_email == '' && reg_pass == '' && reg_rpass != '') {
                document.getElementById('reg_name_err_field').style.display = "block";
                document.getElementById('reg_email_err_field').style.display = "block";
                document.getElementById('reg_pass_err_field').style.display = "block";
                $("#reg_name_err_msg").html('This name field is required.');
                $("#reg_email_err_msg").html('This email field is required.');
                $("#reg_pass_err_msg").html('This password field is required.');
                if (reg_rpass.length < 6) {
                    document.getElementById('reg_rpass_err_field').style.display = "block";
                    $("#reg_rpass_err_msg").html('Password should be equal or more than 6 character.');
                } else {
                    document.getElementById('reg_rpass_err_field').style.display = "none";
                    $("#reg_rpass_err_msg").html('');
                }
                return;
            } else if (reg_name == '' && reg_email != '' && reg_pass != '' && reg_rpass == '') {
                document.getElementById('reg_name_err_field').style.display = "block";
                document.getElementById('reg_rpass_err_field').style.display = "block";
                $("#reg_name_err_msg").html('This name field is required.');
                $("#reg_rpass_err_msg").html('This repeat password field is required.');
                if (!regex.test(reg_email)) {
                    document.getElementById('reg_email_err_field').style.display = "block";
                    $("#reg_email_err_msg").html('Please enter a valid email.');
                } else {
                    document.getElementById('reg_email_err_field').style.display = "none";
                    $("#reg_email_err_msg").html('');
                }
                if (reg_pass.length < 6) {
                    document.getElementById('reg_pass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('Password should be equal or more than 6 character.');
                } else {
                    document.getElementById('reg_pass_err_field').style.display = "none";
                    $("#reg_pass_err_msg").html('');
                }
                return;
            } else if (reg_name == '' && reg_email != '' && reg_pass == '' && reg_rpass != '') {
                document.getElementById('reg_name_err_field').style.display = "block";
                document.getElementById('reg_pass_err_field').style.display = "block";
                $("#reg_name_err_msg").html('This name field is required.');
                $("#reg_pass_err_msg").html('This repeat password field is required.');
                if (!regex.test(reg_email)) {
                    document.getElementById('reg_email_err_field').style.display = "block";
                    $("#reg_email_err_msg").html('Please enter a valid email.');
                } else {
                    document.getElementById('reg_email_err_field').style.display = "none";
                    $("#reg_email_err_msg").html('');
                }
                if (reg_rpass.length < 6) {
                    document.getElementById('reg_rpass_err_field').style.display = "block";
                    $("#reg_rpass_err_msg").html('Password should be equal or more than 6 character.');
                } else {
                    document.getElementById('reg_rpass_err_field').style.display = "none";
                    $("#reg_rpass_err_msg").html('');
                }
                return;
            } else if (reg_name != '' && reg_email != '' && reg_pass == '' && reg_rpass == '') {
                document.getElementById('reg_name_err_field').style.display = "none";
                document.getElementById('reg_pass_err_field').style.display = "block";
                document.getElementById('reg_rpass_err_field').style.display = "block";
                $("#reg_email_err_msg").html('');
                $("#reg_pass_err_msg").html('This password field is required.');
                $("#reg_rpass_err_msg").html('This repeat password field is required.');
                if (!regex.test(reg_email)) {
                    document.getElementById('reg_email_err_field').style.display = "block";
                    $("#reg_email_err_msg").html('Please enter a valid email.');
                } else {
                    document.getElementById('reg_email_err_field').style.display = "none";
                    $("#reg_email_err_msg").html('');
                }
                return;
            } else if (reg_name == '' && reg_email == '' && reg_pass != '' && reg_rpass != '') {
                document.getElementById('reg_name_err_field').style.display = "block";
                document.getElementById('reg_email_err_field').style.display = "block";
                $("#reg_name_err_msg").html('This name field is required.');
                $("#reg_email_err_msg").html('This email field is required.');

                if (reg_pass.length < 6 && reg_rpass.length < 6) {
                    document.getElementById('reg_pass_err_field').style.display = "block";
                    document.getElementById('reg_rpass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('Password should be equal or more than 6 character.');
                    $("#reg_rpass_err_msg").html('Password should be equal or more than 6 character.');
                } else if (reg_pass.length >= 6 && reg_rpass.length < 6) {
                    document.getElementById('reg_pass_err_field').style.display = "none";
                    document.getElementById('reg_rpass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('');
                    $("#reg_rpass_err_msg").html('Password should be equal or more than 6 character.');
                } else if (reg_pass.length < 6 && reg_rpass.length >= 6) {
                    document.getElementById('reg_rpass_err_field').style.display = "none";
                    document.getElementById('reg_pass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('Password should be equal or more than 6 character.');
                    $("#reg_rpass_err_msg").html('');
                } else if (reg_pass.length >= 6 && reg_rpass.length >= 6) {
                    if (reg_pass == reg_rpass) {
                        document.getElementById('reg_pass_err_field').style.display = "none";
                        document.getElementById('reg_rpass_err_field').style.display = "none";
                        $("#reg_pass_err_msg").html('');
                        $("#reg_rpass_err_msg").html('');
                    } else {
                        document.getElementById('reg_pass_err_field').style.display = "none";
                        document.getElementById('reg_rpass_err_field').style.display = "block";
                        $("#reg_pass_err_msg").html('');
                        $("#reg_rpass_err_msg").html('Password not matched.');
                    }

                }
                return;
            } else if (reg_name != '' && reg_email != '' && reg_pass != '' && reg_rpass == '') {
                document.getElementById('reg_name_err_field').style.display = "none";
                document.getElementById('reg_rpass_err_field').style.display = "block";
                $("#reg_rpass_err_msg").html('This repeat password field is required.');
                $("#reg_name_err_msg").html('');

                if (!regex.test(reg_email)) {
                    document.getElementById('reg_email_err_field').style.display = "block";
                    $("#reg_email_err_msg").html('Please enter a valid email.');
                } else {
                    document.getElementById('reg_email_err_field').style.display = "none";
                    $("#reg_email_err_msg").html('');
                }

                if (reg_pass.length < 6) {
                    document.getElementById('reg_pass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('Password should be equal or more than 6 character.');
                } else {
                    document.getElementById('reg_pass_err_field').style.display = "none";
                    $("#reg_pass_err_msg").html('');
                }
                return;
            } else if (reg_name != '' && reg_email != '' && reg_pass == '' && reg_rpass != '') {
                document.getElementById('reg_name_err_field').style.display = "none";
                document.getElementById('reg_pass_err_field').style.display = "block";
                $("#reg_pass_err_msg").html('This password field is required.');
                $("#reg_name_err_msg").html('');

                if (!regex.test(reg_email)) {
                    document.getElementById('reg_email_err_field').style.display = "block";
                    $("#reg_email_err_msg").html('Please enter a valid email.');
                } else {
                    document.getElementById('reg_email_err_field').style.display = "none";
                    $("#reg_email_err_msg").html('');
                }

                if (reg_rpass.length < 6) {
                    document.getElementById('reg_rpass_err_field').style.display = "block";
                    $("#reg_rpass_err_msg").html('Password should be equal or more than 6 character.');
                } else {
                    document.getElementById('reg_rpass_err_field').style.display = "none";
                    $("#reg_rpass_err_msg").html('');
                }
                return;
            } else if (reg_name != '' && reg_email == '' && reg_pass != '' && reg_rpass != '') {
                document.getElementById('reg_name_err_field').style.display = "none";
                document.getElementById('reg_email_err_field').style.display = "block";
                $("#reg_email_err_msg").html('This email field is required.');
                $("#reg_name_err_msg").html('');

                if (reg_pass.length < 6 && reg_rpass.length < 6) {
                    document.getElementById('reg_pass_err_field').style.display = "block";
                    document.getElementById('reg_rpass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('Password should be equal or more than 6 character.');
                    $("#reg_rpass_err_msg").html('Password should be equal or more than 6 character.');
                } else if (reg_pass.length >= 6 && reg_rpass.length < 6) {
                    document.getElementById('reg_pass_err_field').style.display = "none";
                    document.getElementById('reg_rpass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('');
                    $("#reg_rpass_err_msg").html('Password should be equal or more than 6 character.');
                } else if (reg_pass.length < 6 && reg_rpass.length >= 6) {
                    document.getElementById('reg_rpass_err_field').style.display = "none";
                    document.getElementById('reg_pass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('Password should be equal or more than 6 character.');
                    $("#reg_rpass_err_msg").html('');
                } else if (reg_pass.length >= 6 && reg_rpass.length >= 6) {
                    if (reg_pass == reg_rpass) {
                        document.getElementById('reg_pass_err_field').style.display = "none";
                        document.getElementById('reg_rpass_err_field').style.display = "none";
                        $("#reg_pass_err_msg").html('');
                        $("#reg_rpass_err_msg").html('');
                    } else {
                        document.getElementById('reg_pass_err_field').style.display = "none";
                        document.getElementById('reg_rpass_err_field').style.display = "block";
                        $("#reg_pass_err_msg").html('');
                        $("#reg_rpass_err_msg").html('Password not matched.');
                    }

                }
                return;
            } else if (reg_name == '' && reg_email != '' && reg_pass != '' && reg_rpass != '') {
                document.getElementById('reg_name_err_field').style.display = "block";
                $("#reg_name_err_msg").html('This email field is required.');

                if (!regex.test(reg_email)) {
                    document.getElementById('reg_email_err_field').style.display = "block";
                    $("#reg_email_err_msg").html('Please enter a valid email.');
                } else {
                    document.getElementById('reg_email_err_field').style.display = "none";
                    $("#reg_email_err_msg").html('');
                }

                if (reg_pass.length < 6 && reg_rpass.length < 6) {
                    document.getElementById('reg_pass_err_field').style.display = "block";
                    document.getElementById('reg_rpass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('Password should be equal or more than 6 character.');
                    $("#reg_rpass_err_msg").html('Password should be equal or more than 6 character.');
                } else if (reg_pass.length >= 6 && reg_rpass.length < 6) {
                    document.getElementById('reg_pass_err_field').style.display = "none";
                    document.getElementById('reg_rpass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('');
                    $("#reg_rpass_err_msg").html('Password should be equal or more than 6 character.');
                } else if (reg_pass.length < 6 && reg_rpass.length >= 6) {
                    document.getElementById('reg_rpass_err_field').style.display = "none";
                    document.getElementById('reg_pass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('Password should be equal or more than 6 character.');
                    $("#reg_rpass_err_msg").html('');
                } else if (reg_pass.length >= 6 && reg_rpass.length >= 6) {
                    if (reg_pass == reg_rpass) {
                        document.getElementById('reg_pass_err_field').style.display = "none";
                        document.getElementById('reg_rpass_err_field').style.display = "none";
                        $("#reg_pass_err_msg").html('');
                        $("#reg_rpass_err_msg").html('');
                    } else {
                        document.getElementById('reg_pass_err_field').style.display = "none";
                        document.getElementById('reg_rpass_err_field').style.display = "block";
                        $("#reg_pass_err_msg").html('');
                        $("#reg_rpass_err_msg").html('Password not matched.');
                    }

                }
                return;
            } else if (reg_name != '' && reg_email != '' && reg_pass != '' && reg_rpass != '') {
                document.getElementById('reg_name_err_field').style.display = "none";
                $("#reg_name_err_msg").html('');

                if (!regex.test(reg_email)) {
                    document.getElementById('reg_email_err_field').style.display = "block";
                    $("#reg_email_err_msg").html('Please enter a valid email.');
                } else {
                    document.getElementById('reg_email_err_field').style.display = "none";
                    $("#reg_email_err_msg").html('');
                }

                if (reg_pass.length < 6 && reg_rpass.length < 6) {
                    document.getElementById('reg_pass_err_field').style.display = "block";
                    document.getElementById('reg_rpass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('Password should be equal or more than 6 character.');
                    $("#reg_rpass_err_msg").html('Password should be equal or more than 6 character.');
                } else if (reg_pass.length >= 6 && reg_rpass.length < 6) {
                    document.getElementById('reg_pass_err_field').style.display = "none";
                    document.getElementById('reg_rpass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('');
                    $("#reg_rpass_err_msg").html('Password should be equal or more than 6 character.');
                } else if (reg_pass.length < 6 && reg_rpass.length >= 6) {
                    document.getElementById('reg_rpass_err_field').style.display = "none";
                    document.getElementById('reg_pass_err_field').style.display = "block";
                    $("#reg_pass_err_msg").html('Password should be equal or more than 6 character.');
                    $("#reg_rpass_err_msg").html('');
                } else if (reg_pass.length >= 6 && reg_rpass.length >= 6) {
                    if (reg_pass != reg_rpass) {
                        document.getElementById('reg_pass_err_field').style.display = "none";
                        document.getElementById('reg_rpass_err_field').style.display = "block";
                        $("#reg_pass_err_msg").html('');
                        $("#reg_rpass_err_msg").html('Password not matched.');
                    }
                }

                if (regex.test(reg_email) && reg_pass.length >= 6 && reg_rpass.length >= 6 && (reg_pass == reg_rpass)) {
                    var data = jQuery('#frmSignup').serialize();
                    var spinner =
                        '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> Wait...';
                    $('#signup-btn').html(spinner);
                    jQuery.ajax({
                        url: '/signup_submit',
                        data: data,
                        type: 'post',
                        success: function (result) {
                            $('#signup-btn').html('Sign up');
                            if (result.status == 'success') {
                                jQuery("#send_code").val(1);
                                $('#signupVerificationModal').modal('show');
                                $('#modal_email').html(result.u_email);
                            } else if (result.status == 'error') {
                                $('#reg_exist_email_error_modal').modal('show');
                                // document.getElementById("err_reg_email").style.display = "block";
                                // jQuery("#err_reg_email").html(result.msg);
                            }
                        }
                    });
                }

            }
        }
    }


    function codeSubmit() {
        var data = jQuery('#codeSubmit').serialize();
        var verify_code = jQuery('#verification_code').val();
        document.getElementById('signup_code_err_msg_area').style.display = "none";
        jQuery('#signup_code_err_msg').html("");
        if (verify_code == '') {
            document.getElementById("signup_code_err_msg_area").style.display = "block";
            $('#signup_code_err_msg').html('This field should not be empty.');
            document.getElementById('signup_code_err_msg_area').style.marginBottom = "-1.2vw";
            return;
        } else {
            jQuery.ajax({
                url: '/code_submit',
                data: 'verify_code=' + verify_code + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {

                    if (result.status == 'success') {
                        if (result.user_type == 'admin') {
                            // jQuery("#isAdmin").val("1");
                            // document.getElementById("verification_code_field").style.display = "none";
                            // document.getElementById("verification_success_field").style.display = "block";
                            // toastr.success('Registration successfully completed.');
                            // setTimeout(function(){
                            //     window.location.href="{{route('admin.dashboard')}}";
                            // }, 1800);
                            window.location.href = "{{route('admin.dashboard')}}";
                        } else if (result.user_type == 'customer') {
                            // jQuery("#isAdmin").val("0");
                            // document.getElementById("verification_code_field").style.display = "none";
                            // document.getElementById("verification_success_field").style.display = "block";
                            // toastr.success('Registration successfully completed.');
                            // setTimeout(function(){
                            //     window.location.href="{{route('dashboard')}}";
                            // }, 1800);
                            window.location.href = "{{route('dashboard')}}";
                        }
                        jQuery("#send_code").val("");
                        jQuery("#verification_code").val("");
                        document.getElementById('signup_code_err_msg_area').style.display = "none";
                        jQuery('#signup_code_err_msg').html("");
                        document.getElementById('signup_code_err_msg_area').style.marginBottom = "0";
                    } else if (result.status == 'error') {
                        document.getElementById('signup_code_err_msg_area').style.display = "block";
                        jQuery('#signup_code_err_msg').html(result.msg);
                        document.getElementById('signup_code_err_msg_area').style.marginBottom = "-1.2vw";
                    }
                }
            });
        }
    }

    function closeSignupVerificationModal() {
        $('#signupVerificationModal').modal('hide');
    }

    // function verificationSubmit() {
    //     var isAdmin = $("#isAdmin").val();
    //     if(isAdmin == 1){
    //         $("#isAdmin").val("0");
    //         window.location.href="{{route('admin.dashboard')}}";
    //     } else {
    //         $("#isAdmin").val("0");
    //         window.location.href="{{route('dashboard')}}";
    //     }
    // }

    function signupCancel() {
        window.location.href = "{{route('signin')}}";
    }

</script>

<!-- Modal -->
<div class="modal fade" id="signupVerificationModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered signup-verification-modal-area" role="document">
        <div class="modal-content signup-verification-modal-content">
            <span><button type="button" class="close-signup-verification-modal" data-dismiss="modal"
                    onclick="closeSignupVerificationModal()">
                    <span>&times;</span>
                </button></span>
            <div class="modal-body pt-md-0 px-4 px-md-5 text-center" id="verification_code_field">
                <p class="signup-verification-modal-title" id="modal-header">You are almost Done !</p>
                <p class="signup-verification-modal-heading" id="modal-second-header">We have send you a verification
                    code
                    to<br><span style="text-decoration: underline;cursor: pointer;" id="modal_email"></span></p>
                <p class="signup-verification-modal-input-label">Enter the code here</p>
                <form id="codeSubmit">
                    @csrf
                    <div class="form-group text-centers">
                        <input type="text" class="form-control mx-auto signup-verification-modal-input"
                            name="verification_code" id="verification_code" />
                        <div id="signup_code_err_msg_area" class="text-center mt-2 signup_code_err_msg_area"
                            style="color: #f25b5b;"><i class="fa fa-exclamation-triangle me-2"></i><span
                                id="signup_code_err_msg"></span></div>
                        <button type="button" class="signup-verification-continue-btn" id="code-submit-btn"
                            onclick="codeSubmit()">Continue</button>
                    </div>
                </form>
            </div>

            <!-- <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center" id="verification_success_field">
                <h3 style="color: #DBDBDD; margin-top: 25px;" id="modal-header">Great!</h3>
                <p style="color: #DBDBDD; font-size: 12px;" class="mt-2 mb-0" id="modal-second-header">Your account has been created successfully</p>
                <div class="form-group text-centers">
                    <button type="button" class="btn btn-primary continue-button"
                        style="margin-top: 40px; margin-bottom: 5px; width: 40%;"
                        onclick="verificationSubmit()">Explore Now</button>
                </div>
            </div> -->
        </div>
    </div>
</div>

@endsection
