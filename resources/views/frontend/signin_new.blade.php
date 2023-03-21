@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
<style>
    input:-internal-autofill-selected {
        appearance: menulist-button;

        background-color: red !important;

    }

    .signin-area {
        background-color: #fff;
    }

    .signin-area .signin-form {
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

    .signin-area .signin-form p {
        font-size: 16px;
    }

    .signin-area .signin-form a {
        text-decoration: none;
        font-size: 18px;
        font-weight: 500;
        color: #2699fb;
    }

    .signin-area .signin-form form {
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 60px;
    }

    .signin-area .signin-form form .form-control {
        margin-bottom: 10px;
        outline: 0;
        /* border-width: 0 0 1px; */
        border-color: #a1a1a6;
        opacity: 100%;
    }

    .signin-area .signin-form form .form-control:focus {
        border-color: green;
    }

    .signin-area .signin-form form .form-control:last-child {
        margin-bottom: 25px;
    }

    .signin-area .signin-form form .signin-button {
        margin-top: 25px;
        margin-bottom: 30px;
        padding: 5px 30px;
        border-radius: 30px;
        font-size: 20px;
        font-weight: 300;
        background-color: #4ba1ec;
    }

    .signin-area .signin-form form .signin-button:hover {
        font-weight: 400;
        background-color: #2692f0;
    }

    .signin-area .signin-form form .forget-password {
        cursor: pointer;
    }

    .signin-area .signin-social-button {
        margin: 0 auto;
        margin-bottom: 60px;
        width: 600px;
    }

    .signin-area .signin-social-button .signin-google-button {
        padding: 15px 20px;
        border-radius: 50px;
        background-color: #2699fb;
        color: #fff;
        font-size: 18px;
        text-align: center;
        width: 260px;
    }

    .signin-area .signin-social-button .signin-google-button img {
        padding-right: 10px;
    }

    .signin-area .signin-social-button .signin-facebook-button {
        padding: 15px 20px;
        border-radius: 50px;
        background-color: #3b5998;
        color: #fff;
        font-size: 18px;
        text-align: center;
        width: 275px;
    }

    .signin-area .signin-social-button .signin-facebook-button img {
        padding-right: 10px;
    }

    .signin-area .signin-form form .cancel-button {
        margin-top: 25px;
        margin-bottom: 30px;
        padding: 5px 30px;
        border-radius: 30px;
        font-size: 18px;
        font-weight: 300;
        background-color: #e1e1e1;
        color: #000;
    }

    .signin-area .signin-form form .cancel-button:hover {
        font-weight: 400;
        color: #fff;
        background-color: #2692f0;
    }

    .signin-area .signin-form .signin-heading {
        padding-top: 55px !important;
        font-size: 22px;
        font-family: Roboto;
        font-weight: 500;
        line-height: 29px;
        color: #707070;
        text-align: center;
        margin-bottom: 40px;
    }

    .signin-area .signin-form .signin-form-area {
        margin-top: 10px;
        max-width: 700px;
    }

    .signin-passwordArea {
        position: relative;
    }

    .show-hide {
        position: absolute;
        font-size: 15px;
        color: grey;
        margin-left: 465px;
        margin-top: -45px;
        cursor: pointer;
    }

    .forget_password_area .forget-password:hover {
        color: #3093e9 !important;
    }

    .create-account {
        font-size: 15px !important;
    }

    .create-account:hover {
        text-decoration: underline !important;
    }

    .login_email_err_msg_area {
        margin-left: 230px;
        margin-top: -5px;
        margin-bottom: 6px;
    }

    .login_pass_err_msg_area {
        margin-left: 230px;
        margin-top: 0px;
        margin-bottom: 30px;
    }

    #login_email_err_msg_area {
        display: none;
    }

    #login_pass_err_msg_area {
        display: none;
    }

    .modal_pass_show_hide {
        position: absolute;
        font-size: 15px;
        color: grey;
        margin-left: 148px;
        margin-top: -53px;
        cursor: pointer;
    }

    .modal_rpass_show_hide {
        position: absolute;
        font-size: 15px;
        color: grey;
        margin-left: 148px;
        margin-top: -36px;
        cursor: pointer;
    }

    .f_pass_err_msg_area {
        font-size: 16px;
        margin-top: -12px !important;
        margin-bottom: 5px;
    }

    .f_rpass_err_msg_area {
        font-size: 16px;
        margin-top: 5px;
    }

    #f_email_err_msg {
        margin-top: 0.5vw;
    }

    #forget_password_field {
        display: none;
    }

    #forget_email_field {
        display: none;
    }

    .modal-dialog {
        /* width: 652px; */
    }

    .modal-content {
        /* min-height: 18.6vw; */
    }

    .forget_remember_area {
        margin-top: -10px;
        margin-left: 58px;
    }

    .forget-password-modal-area {
        max-width: 654px;
        margin: 0 auto;
    }

    .forget-password-modal-content {
        max-height: 420px;
        background-color: #272727;
        border-radius: 20px;
        padding-bottom: 45px;

    }

    .close-forget-modal {
        outline: none;
        border: none;
        background: #272727;
        margin-left: 600px;
        margin-top: 15px;
    }

    .forget-modal-title {
        font-size: 18px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #F5F5F7;
        line-height: 24px;
        text-align: center;
        margin-bottom: 5px;
    }

    .forget-modal-heading {
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        line-height: 21px;
        text-align: center;
        color: #F5F5F7;
        margin-bottom: 30px;
    }

    .forget-modal-input {
        max-width: 380px;
        height: 55px;
        border-radius: 10px;
    }

    .forget-continue-btn {
        margin-top: 40px;
    }

    .reset-continue-btn {
        margin-top: 25px;
    }

    /*----------------*/
    .signin-verify-modal-area {
        max-width: 654px;
        margin: 0 auto;
    }

    .signin-verify-modal-content {
        height: auto;
        background-color: #272727;
        border-radius: 20px;
        padding-bottom: 45px;

    }

    .close-signin-verify-modal {
        outline: none;
        border: none;
        background: #272727;
        margin-left: 600px;
        margin-top: 15px;
    }

    .signin-verification-modal-title {
        font-size: 18px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #F5F5F7;
        line-height: 24px;
        text-align: center;
        margin-bottom: 5px;
    }

    .signin-verification-modal-heading {
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        line-height: 21px;
        text-align: center;
        color: #F5F5F7;
        margin-bottom: 30px;
    }

    .signin-verification-modal-input-label {
        font-size: 18px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #F5F5F7;
        line-height: 24px;
        text-align: center;
        margin-bottom: 20px;
    }

    .signin-verification-modal-input {
        max-width: 380px;
        height: 55px;
        border-radius: 10px;
    }

    .signin-verify-continue-btn {
        margin-top: 40px;
    }

    /*----------------*/

    #signin_code_err_msg_area {
        display: none;
    }

    #login_email_err_msg_area {
        display: none;
    }

    #login_pass_err_msg_area {
        display: none;
    }

    input[type="checkbox"i] {
        width: 1rem;
        height: 3rem;
    }

    .siginin-inputArea {
        display: flex !important;
        flex-wrap: wrap !important;
    }

    .signin-inputField {
        background-color: #E1E1E1;
        outline: none;
        border-radius: 8px;
        height: 3vw;
        max-width: 470px;
    }

    .signin-inputField:focus {
        background: #e3e3e7 !important;
        color: rgb(0, 0, 0) !important;
        font-weight: 300;
    }

    .forget_password_area {
        margin-top: 13px;
        margin-left: 180px;
    }

    .forget_password_area a {
        padding-bottom: 40px;
        color: #c2baba !important;
        font-size: 18px;
        font-weight: 400 !important;
    }

    .sign-in-btn {
        margin-top: 25px;
        margin-bottom: 1vw;
        margin-left: -10px;
    }

    .rememberme_text {
        padding-left: 10px;
        font-size: 18px;
        color: rgb(32, 30, 30);
        margin-top: 12px !important;
    }

    .signin-create-account {
        padding-bottom: 55px;
    }

    .create-account-text {
        color: rgb(32, 30, 30);
        margin-left: -10px;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {

        .signin-area {
            max-width: 100% !important;
        }

        .signin-area .signin-form {
            max-width: 330px !important;
        }

        .signin-area .signin-form .signin-form-area {
            max-width: 280px !important;
        }

        .siginin-inputArea {
            flex-direction: column !important;
        }

        .signin-area .signin-form .signin-heading {
            padding-top: 25px !important;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 auto;
        }

        .signin-inputField {
            height: 40px !important;
            max-width: 300px !important;
            margin: 0 auto !important;
        }

        .show-hide {
            font-size: 15px;
            color: grey;
            margin-left: 235px !important;
            margin-top: -26px !important;
            cursor: pointer;
        }

        input[type="checkbox"i] {
            height: 3.5rem;
        }

        .rememberme_text {
            padding-left: 10px;
            font-size: 16px;
            color: rgb(32, 30, 30);
            margin-top: 18px !important;
        }

        .forget_remember_area {
            margin-top: 0px;
            margin-left: -10px;
        }

        .forget_password_area {
            margin-left: 20px;
            margin-top: 19px;
        }

        .forget_password_area a {
            font-size: 16px !important;
        }

        .rememberme_area {
            width: 100%;
        }

        .forget-password-modal-area {
            max-width: 310px;
            margin-top: -30px;
        }

        .forget-password-modal-content {
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 30px;
        }

        .close-forget-modal {
            margin-left: 270px;
            font-size: 28px;
            margin-top: 10px;
        }

        .forget-modal-title {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .forget-modal-heading {
            font-size: 14px;
        }

        .forget-modal-input {
            max-width: 270px;
        }

        .modal_pass_show_hide {
            margin-left: 100px;
        }

        .modal_rpass_show_hide {
            margin-left: 100px;
        }

        .forget-continue-btn {
            margin-top: 40px;
        }

        .reset-continue-btn {
            margin-top: 15px;
        }

        .f_pass_err_msg_area {
            font-size: 15px;
        }

        .f_rpass_err_msg_area {
            font-size: 15px;
        }

        /*--------------------*/
        .signin-verify-modal-area {
            max-width: 310px;
            margin-top: -30px;
        }

        .signin-verify-modal-content {
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 30px;

        }

        .close-signin-verify-modal {
            margin-left: 270px;
            font-size: 28px;
            margin-top: 10px;
        }

        .signin-verification-modal-title {
            font-size: 16px;
        }

        .signin-verification-modal-heading {
            font-size: 13px;
        }

        .signin-verification-modal-input-label {
            font-size: 16px;
        }

        .signin-verification-modal-input {
            max-width: 270px;
        }

        .signin_code_err_msg_area {
            font-size: 15px;
        }

        /* .signin-verify-continue-btn {
            margin-top: 40px;
        } */
        /*--------------------*/

        .sign-in-btn {
            margin: 0 auto !important;
            width: 285px !important;
            height: 60px !important;
            border-radius: 30px !important;
            margin-left: 0px;
        }

        .signin-create-account {
            text-align: center;
        }

        .login_email_err_msg_area {
            margin-left: 4px;
            margin-top: 10px;
            font-size: 14px;
            margin-bottom: -5px;
        }

        .login_pass_err_msg_area {
            margin-left: 4px;
            margin-top: 10px;
            font-size: 14px;
            margin-bottom: -5px !important;
        }
    }

    /* Tab responsive css */
    @media (min-width: 481px) and (max-width: 820px) {
        .signin-area {
            max-width: 100% !important;
        }

        .signin-area .signin-form {
            max-width: 760px !important;
        }

        .signin-area .signin-form .signin-form-area {
            max-width: 630px !important;
        }

        .signin-area .signin-form .signin-heading {
            padding-top: 40px !important;
            margin-bottom: 30px;
        }

        .siginin-inputArea {
            flex-direction: row !important;
            margin-bottom: 35px;
        }

        .signin-inputField {
            height: 40px !important;
            max-width: 420px !important;
            margin: 0 auto !important;
        }

        .show-hide {
            font-size: 15px;
            color: grey;
            margin-left: 400px !important;
            margin-top: -26px !important;
            cursor: pointer;
        }

        .rememberme_text {
            padding-left: 10px;
            font-size: 18px;
            color: rgb(32, 30, 30);
            margin-top: 12px !important;
        }

        .forget_remember_area {
            margin-top: 0px;
            margin-left: 180px;
        }

        .forget_password_area {
            margin-left: 125px;
            margin-top: 12px;
        }

        .rememberme_area {
            width: 100%;
            margin-top: -18px;
        }

        .forget-continue-btn {
            margin-top: 35px;
        }

        .forget-password-modal-area {
            max-width: 580px;
            margin-top: -130px;
        }

        .close-forget-modal {
            margin-left: 530px;
            font-size: 28px;
        }


        .sign-in-btn {
            height: 60px !important;
            border-radius: 30px !important;
            margin-left: -28px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .signin-create-account {
            margin-left: -45px;
        }

        .login_email_err_msg_area {
            margin-left: 188px;
            margin-top: -25px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .login_pass_err_msg_area {
            margin-left: 188px;
            margin-top: -25px;
            font-size: 16px;
            margin-bottom: 25px !important;
        }

        .input_label_email {
            padding-left: 35px;
        }

        .input_label_password {
            padding-left: 35px;
        }

        .signin-verify-modal-area {
            max-width: 580px;
            margin-top: auto;
            margin-bottom: auto;
        }

        .close-signin-verify-modal {
            margin-left: 530px;
            font-size: 28px;
        }

    }

    @media (min-width: 821px) and (max-width: 1280px) {
        .signin-area {
            max-width: 100% !important;
        }

        .signin-area .signin-form {
            max-width: 960px !important;
        }

        .signin-area .signin-form .signin-form-area {
            max-width: 630px !important;
        }

        .signin-area .signin-form .signin-heading {
            padding-top: 40px !important;
            margin-bottom: 30px;
            /* align-items: center; */
            /* margin: 0 auto !important; */
        }

        .siginin-inputArea {
            flex-direction: row !important;
            margin-bottom: 35px;
        }

        .signin-inputField {
            height: 40px !important;
            max-width: 420px !important;
            margin: 0 auto !important;
        }

        .show-hide {
            font-size: 15px;
            color: grey;
            margin-left: 400px !important;
            margin-top: -26px !important;
            cursor: pointer;
        }

        .rememberme_text {
            padding-left: 10px;
            font-size: 18px;
            color: rgb(32, 30, 30);
            margin-top: 12px !important;
        }

        .forget_remember_area {
            margin-top: 0px;
            margin-left: 180px;
        }

        .forget_password_area {
            margin-left: 125px;
            margin-top: 12px;
        }

        .rememberme_area {
            width: 100%;
            margin-top: -18px;
        }

        .forget-password-modal-area {
            margin-top: auto;
            margin-bottom: auto;
        }

        .close-forget-modal {
            font-size: 28px;
        }

        .sign-in-btn {
            height: 60px !important;
            border-radius: 30px !important;
            margin-left: -28px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .signin-create-account {
            margin-left: -45px;
        }

        .login_email_err_msg_area {
            margin-left: 188px;
            margin-top: -25px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .login_pass_err_msg_area {
            margin-left: 188px;
            margin-top: -25px;
            font-size: 16px;
            margin-bottom: 25px !important;
        }

        .input_label_email {
            padding-left: 35px;
        }

        .input_label_password {
            padding-left: 35px;
        }

        .signin-verify-modal-area {
            margin-top: auto;
            margin-bottom: auto;
        }

        .close-signin-verify-modal {
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

@php
if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pwd'])){
$login_email=$_COOKIE['login_email'];
$login_pwd=$_COOKIE['login_pwd'];
$is_remember="checked='checked'";
} else{
$login_email='';
$login_pwd='';
$is_remember="";
}

@endphp

<section class="signin-area" style="background: #E1E1E1;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="signin-form">
                    <!-- <div class="row">
                    <label for="inputPassword" class="col-lg-3 col-md-3 col-sm-12 col-form-label"></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <p class="signin-heading"><span>Already a Member ? </span><span>Sign in Here</span></p>
                    </div>
                </div> -->
                    <p class="signin-heading"><span>Already a Member ? </span><span>Sign in Here</span></p>
                    <!-- action="{{ route('login')}}" -->
                    <form class="signin-form-area" id="frmLogin">
                        @csrf
                        <input type="hidden" value="{{$redirect_dashboard}}" name="dashboard_redirect">
                        <div class="row siginin-inputArea">
                            <label for="inputEmail"
                                class="col-md-3 col-lg-3 col-sm-12 col-form-label mt-1 input_label_email">Email <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9 col-lg-9 col-sm-12">
                                <input class="form-control  ms-5 border-0 signin-inputField" name="email" id="email"
                                    type="email" placeholder="Email" required value="{{$login_email}}">
                            </div>
                        </div>
                        <div class="col-sm-8 text-danger login_email_err_msg_area" id="login_email_err_msg_area">
                            <i class="fa fa-exclamation-triangle me-2"></i><span id="login_email_err_msg"></span>
                        </div>
                        <!-- <div class="row pt-2 pb-2" style="margin-top: -7vh;" id="login_email_err_msg_area">
                            <label for="inputPassword" class="col-sm-4 col-form-label"></label>
                            
                        </div> -->
                        <div class="row siginin-inputArea signin-passwordArea">
                            <label for="inputPassword"
                                class="col-md-3 col-lg-3 col-sm-12 col-form-label mt-1 input_label_password">Password
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9 col-lg-9 col-sm-12">
                                <input class="form-control  ms-5 border-0 signin-inputField" name="password"
                                    id="password" type="password" placeholder="Password" required
                                    value="{{$login_pwd}}">
                                <i class="fa fa-light fa-eye-slash show-hide" id="show-hide" onclick="show()"></i>
                            </div>

                        </div>
                        <div class="col-sm-8 text-danger login_pass_err_msg_area" id="login_pass_err_msg_area">
                            <i class="fa fa-exclamation-triangle me-2"></i><span id="login_pass_err_msg"></span>
                        </div>
                        <div class="row forget_remember_area">
                            <label for="inputPassword" class="col-sm-12 col-lg-3 col-md-3 col-form-label"></label>
                            <div class="col-sm-12 col-lg-9 col-md-9 rememberme_area d-flex">
                                <input style="font-size: 35px;margin-left: -1.5px" type="checkbox" id="rememberme"
                                    name="rememberme" {{$is_remember}}>
                                <span class="rememberme_text">Remember me</span>
                                <span class="text-end forget_password_area"><a class="forget-password"
                                        onclick="forgetPassword()">Forget password?</a></span>
                            </div>
                        </div>

                        <div class="row">
                            <label for="inputPassword" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="modal-continue-btn fw-normal sign-in-btn" id="signin-btn"
                                    onclick="loginFormSubmit()">Sign in</button>
                            </div>
                        </div>

                        <div class="row signin-create-account">
                            <label for="inputPassword" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-7">
                                <span class="create-account-text">New to Qbits? </span><span><a
                                        href="{{ route('signup')}}" class="create-account">Create an Account</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="signin-social-button">
			<div class="row">
				<div class="col-6">
					<div class="signin-google-button">
					   <img src="{{ asset('frontend/sigma/icons/google.png') }}" alt=""><span>Continue with google</span>
					</div>
				</div>

				<div class="col-6">
					<div class="signin-facebook-button">
						<img src="{{ asset('frontend/sigma/icons/facebook.png') }}" alt=""><span>Continue with facebook</span>
					</div>
				</div>
			</div>
		</div> -->
    </div>


    <!-- Modal {Forget Password} -->
    <div class="modal fade" id="passwordResetModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered forget-password-modal-area" role="document">
            <div class="modal-content forget-password-modal-content">
                <span><button type="button" class="close-popover close-forget-modal" data-dismiss="modal"
                        onclick="closeForgetModal()">
                        <span>&times;</span>
                    </button></span>
                <div class="modal-body pt-md-0 text-center" id="forget_email_field" style="padding: 0;">
                    <p id="modal-header" class="forget-modal-title">Password Reset</p>
                    <p class="forget-modal-heading">Enter your email for reset your password</p>
                    <form id="forgetEmailSubmit">
                        @csrf
                        <div class="form-group text-centers">
                            <input type="email" class="form-control mx-auto forget-modal-input" name="f_email"
                                id="f_email" placeholder="Your Email" required />
                            <div id="f_email_err_msg_area" class="text-center mt-2" style="color: #f25b5b;"><i
                                    class="fa fa-exclamation-triangle me-2"></i><span id="f_email_err_msg"></span></div>
                            <button type="button" class="modal-continue-btn forget-continue-btn" id="modal-continue-btn"
                                onclick="forgetEmailSubmit()">Continue</button>
                        </div>
                    </form>
                </div>

                <div class="modal-body pt-md-0 text-center" id="forget_verification_code_field" style="padding: 0;">
                    <p id="modal-header" class="forget-modal-title">Password Reset</p>
                    <p class="forget-modal-heading">We have send you a verification code
                        to your email</p>
                    <!-- <p style="color: #DBDBDD; font-size: 12px;text-decoration: underline;cursor: pointer;" id="login_modal_email">
                    </p> -->
                    <form id="forgetCodeSubmitFrm">
                        @csrf
                        <div class="form-group text-centers">
                            <input type="text" class="form-control mx-auto forget-modal-input"
                                name="f_verification_code" id="f_verification_code" placeholder="Enter code here"
                                required />
                            <div id="f_code_err_msg_area" class="text-center mt-2" style="color: #f25b5b;"><i
                                    class="fa fa-exclamation-triangle me-2"></i><span id="f_code_err_msg"></span></div>
                            <button type="button" class="modal-continue-btn forget-continue-btn"
                                onclick="codeSubmitForgetPassword()">Continue</button>
                        </div>
                    </form>
                </div>

                <div class="modal-body pt-md-0 text-center" id="forget_password_field" style="padding: 0;">
                    <p id="modal-header" class="forget-modal-title">Password Reset</p>
                    <p class="forget-modal-heading">Enter new password and then repeat it</p>
                    <form id="forgetPasswordSubmit">
                        @csrf
                        <div class="form-group text-center">
                            <input type="password" class="form-control mx-auto forget-modal-input"
                                style="margin-bottom: 20px;" name="f_password" id="f_password"
                                placeholder="New Password" />
                            <i class="fa fa-light fa-eye-slash modal_pass_show_hide" id="modal_pass_show_hide"
                                onclick="modalPassShow()"></i>
                            <div id="f_pass_err_msg_area" class="f_pass_err_msg_area text-center mt-2"
                                style="color: #f25b5b;"><i class="fa fa-exclamation-triangle me-2"></i><span
                                    id="f_pass_err_msg"></span></div>
                            <div>
                                <input type="password" class="form-control mx-auto forget-modal-input"
                                    name="f_rpassword" id="f_rpassword" placeholder="Repeat Password" />
                                <i class="fa fa-light fa-eye-slash modal_rpass_show_hide" id="modal_rpass_show_hide"
                                    onclick="modalRepeatPassShow()"></i>
                            </div>
                            <div id="f_rpass_err_msg_area" class="f_rpass_err_msg_area text-center mt-2"
                                style="color: #f25b5b;"><i class="fa fa-exclamation-triangle me-2"></i><span
                                    id="f_rpass_err_msg"></span></div>
                            <button type="button" class="modal-continue-btn reset-continue-btn"
                                onclick="forgetPassSubmit()">Continue</button>
                        </div>
                    </form>
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

    document.body.onkeydown = function (e) {
        if (e.keyCode == 13)
            loginFormSubmit();
    };

    function loginFormSubmit() {
        var isSendCode = jQuery("#send_code").val();
        document.getElementById('signin_code_err_msg_area').style.display = "none";
        jQuery('#signin_code_err_msg').html("");
        if (isSendCode) {
            $('#verifyCodeModal').modal('show');
            $('#modal-second-header').html('We already send you a verification code.');
            $('#login_modal_email').hide();
        } else {
            var log_email = $("#email").val();
            var log_pass = $("#password").val();
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (log_email == '' && log_pass == '') {
                document.getElementById('login_email_err_msg_area').style.display = "block";
                document.getElementById('login_pass_err_msg_area').style.display = "block";
                $("#login_email_err_msg").html('This email field could not empty.');
                $("#login_pass_err_msg").html('This password field could not empty.');
                return;
            } else {
                if (log_email == '' && log_pass != '') {
                    document.getElementById('login_email_err_msg_area').style.display = "block";
                    $("#login_email_err_msg").html('This email field could not empty.');
                    if (log_pass.length < 6) {
                        document.getElementById('login_pass_err_msg_area').style.display = "block";
                        $("#login_pass_err_msg").html('Password should be equal or more than 6 character.');
                    } else {
                        document.getElementById('login_pass_err_msg_area').style.display = "none";
                        $("#login_pass_err_msg").html('');
                    }
                    return;
                } else if (log_email != '' && log_pass == '') {
                    if (!regex.test(log_email)) {
                        document.getElementById('login_email_err_msg_area').style.display = "block";
                        $("#login_email_err_msg").html('Please enter a valid email.');

                    } else {
                        document.getElementById('login_email_err_msg_area').style.display = "none";
                        $("#login_email_err_msg").html('');
                    }
                    document.getElementById('login_pass_err_msg_area').style.display = "block";
                    $("#login_pass_err_msg").html('This password field could not empty.');
                    return;
                } else {
                    if (!regex.test(log_email) && log_pass.length < 6) {
                        document.getElementById('login_email_err_msg_area').style.display = "block";
                        document.getElementById('login_pass_err_msg_area').style.display = "block";
                        $("#login_email_err_msg").html('Please enter a valid email.');
                        $("#login_pass_err_msg").html('Password should be equal or more than 6 character.');
                        return;
                    } else if (!regex.test(log_email) && log_pass.length >= 6) {
                        document.getElementById('login_email_err_msg_area').style.display = "block";
                        document.getElementById('login_pass_err_msg_area').style.display = "none";
                        $("#login_email_err_msg").html('Please enter a valid email.');
                        $("#login_pass_err_msg").html('');
                        return;
                    } else if (regex.test(log_email) && log_pass.length < 6) {
                        document.getElementById('login_email_err_msg_area').style.display = "none";
                        document.getElementById('login_pass_err_msg_area').style.display = "block";
                        $("#login_email_err_msg").html('');
                        $("#login_pass_err_msg").html('Password should be equal or more than 6 character.');
                        return;
                    } else {
                        document.getElementById('login_email_err_msg_area').style.display = "none";
                        document.getElementById('login_pass_err_msg_area').style.display = "none";
                        $("#login_email_err_msg").html('');
                        $("#login_pass_err_msg").html('');
                    }
                }
            }

            var data = jQuery('#frmLogin').serialize();
            var spinner =
                '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> Wait...';
            $('#signin-btn').html(spinner);
            jQuery.ajax({
                url: '/login_process',
                data: data,
                type: 'post',
                success: function (result) {
                    $('#signin-btn').html('Sign in');
                    if (result.status == "success") {
                        if (result.user_type == 'admin') {
                            window.location.href = "{{route('signin_admin_redirect')}}";
                            jQuery('#frmLogin')[0].reset();
                        } else if (result.user_type == 'customer') {
                            window.location.href = "{{route('signin_user_redirect')}}";
                            jQuery('#frmLogin')[0].reset();
                        }
                    }
                    if (result.status == "error") {
                        if (result.type == 'verify_err') {
                            jQuery("#send_code").val(1);
                            document.getElementById("login_email_err_msg_area").style.display = "none";
                            document.getElementById("login_pass_err_msg_area").style.display = "none";
                            $('#verifyCodeModal').modal('show');
                            // jQuery('#login_modal_email').html("User@gmail.com");
                        } else if (result.type == "email_err") {
                            document.getElementById('login_email_err_msg_area').style.display = "block";
                            $("#login_email_err_msg").html(result.msg);

                        } else if (result.type == "pass_err") {
                            document.getElementById('login_pass_err_msg_area').style.display = "block";
                            $("#login_pass_err_msg").html(result.msg);
                        } else if (result.type == "account_diactivate") {
                            document.getElementById('login_pass_err_msg_area').style.display = "block";
                            $("#login_pass_err_msg").html(result.msg);
                        } else if (result.type == "account_remove") {
                            document.getElementById('login_pass_err_msg_area').style.display = "block";
                            $("#login_pass_err_msg").html(result.msg);
                        }

                        // jQuery('#login_msg').html(result.msg);
                    }


                }
            });
        }
    }

    function show() {
        var pswrd = document.getElementById('password');
        var icon = document.getElementById('show-hide');
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

    function codeSubmit() {
        var data = jQuery('#codeSubmit').serialize();
        var verify_code = jQuery('#verification_code').val();
        document.getElementById('signin_code_err_msg_area').style.display = "none";
        jQuery('#signin_code_err_msg').html("");
        if (verify_code == '') {
            document.getElementById("signin_code_err_msg_area").style.display = "block";
            $('#signin_code_err_msg').html('This field should not be empty.');
            return;
        } else {
            jQuery.ajax({
                url: '/code_submit',
                data: 'verify_code=' + verify_code + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {

                    if (result.status == 'success') {
                        if (result.user_type == 'admin') {
                            jQuery("#send_code").val("");
                            document.getElementById('signin_code_err_msg_area').style.display = "none";
                            jQuery('#signin_code_err_msg').html("");
                            window.location.href = "{{route('admin.dashboard')}}";
                        } else if (result.user_type == 'customer') {
                            jQuery("#send_code").val("");
                            document.getElementById('signin_code_err_msg_area').style.display = "none";
                            jQuery('#signin_code_err_msg').html("");
                            window.location.href = "{{route('dashboard')}}";
                        }
                        jQuery("#verification_code").val("");
                    } else if (result.status == 'error') {
                        document.getElementById('signin_code_err_msg_area').style.display = "block";
                        jQuery('#signin_code_err_msg').html(result.msg);
                    }
                }
            });
        }
    }


    function forgetPassword() {
        $('#passwordResetModal').modal('show');
        document.getElementById('forget_email_field').style.display = "block";
        document.getElementById('forget_verification_code_field').style.display = "none";
        document.getElementById('forget_password_field').style.display = "none";
        document.getElementById('f_email_err_msg_area').style.display = "none";
        document.getElementById('f_code_err_msg_area').style.display = "none";
        document.getElementById('f_pass_err_msg_area').style.display = "none";
        document.getElementById('f_rpass_err_msg_area').style.display = "none";
        $('#f_email_err_msg').html('');
        $('#f_code_err_msg').html('');
        $('#f_pass_err_msg').html('');
        $('#f_rpass_err_msg').html('');
        $("#f_email").val("");
        $("#f_verification_code").val("");
        $("#forget_password_field").val("");

    }


    function modalPassShow() {
        var pswrd = document.getElementById('f_password');
        var icon = document.getElementById('modal_pass_show_hide');
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

    function modalRepeatPassShow() {
        var pswrd = document.getElementById('f_rpassword');
        var icon = document.getElementById('modal_rpass_show_hide');
        if (pswrd.type === "password") {
            pswrd.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            pswrd.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    function forgetEmailSubmit() {

        var f_email = $('#f_email').val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (f_email == '') {
            document.getElementById("f_email_err_msg_area").style.display = "block";
            $('#f_email_err_msg').html('Email field should not be empty.');
            return;
        } else {
            if (!regex.test(f_email)) {
                document.getElementById("f_email_err_msg_area").style.display = "block";
                $('#f_email_err_msg').html('Please enter a valid email.');
                return;
            } else {
                document.getElementById("f_email_err_msg_area").style.display = "none";
                $('#f_email_err_msg').html('');
                var data = jQuery('#forgetEmailSubmit').serialize();
                var spinner =
                    '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> Wait...';
                $('#modal-continue-btn').html(spinner);
                jQuery.ajax({
                    url: '/forget_email_submit',
                    data: data,
                    type: 'post',
                    success: function (result) {
                        $('#modal-continue-btn').html('Continue');
                        if (result.status == 'success') {
                            document.getElementById('f_email_err_msg_area').style.display = "none";
                            $('#f_email_err_msg').html('');
                            document.getElementById('forget_email_field').style.display = "none";
                            document.getElementById('forget_verification_code_field').style.display =
                                "block";
                            document.getElementById('forget_password_field').style.display = "none";
                        } else if (result.status == 'error') {
                            document.getElementById("f_email_err_msg_area").style.display = "block";
                            $('#f_email_err_msg').html(result.msg);
                        }
                    }
                });
            }
        }

    }


    function forgetPassSubmit() {
        var n_pass = $("#f_password").val();
        var n_rpass = $("#f_rpassword").val();
        if (n_pass == '' && n_rpass == '') {
            document.getElementById('f_pass_err_msg_area').style.display = "block";
            document.getElementById('f_rpass_err_msg_area').style.display = "block";
            $('#f_pass_err_msg').html('Password field could not be empty.');
            $('#f_rpass_err_msg').html('Repeat Password field could not be empty.');
            return;
        } else if (n_pass != '' && n_rpass == '') {
            document.getElementById('f_rpass_err_msg_area').style.display = "block";
            $('#f_rpass_err_msg').html('Repeat Password field could not be empty.');
            if (n_pass.length < 6) {
                document.getElementById('f_pass_err_msg_area').style.display = "block";
                $('#f_pass_err_msg').html('Password should be 6 or more character.');
            } else {
                document.getElementById('f_pass_err_msg_area').style.display = "none";
                $('#f_pass_err_msg').html('');
            }
            return;
        } else if (n_pass == '' && n_rpass != '') {
            document.getElementById('f_pass_err_msg_area').style.display = "block";
            $('#f_rpass_err_msg').html('Password field could not be empty.');
            if (n_rpass.length < 6) {
                document.getElementById('f_rpass_err_msg_area').style.display = "block";
                $('#f_pass_err_msg').html('Repeat Password should be 6 or more character.');
            } else {
                document.getElementById('f_rpass_err_msg_area').style.display = "none";
                $('#f_rpass_err_msg').html('');
            }
            return;
        } else {
            if (n_pass.length < 6 && n_rpass.length < 6) {
                document.getElementById('f_pass_err_msg_area').style.display = "block";
                document.getElementById('f_rpass_err_msg_area').style.display = "block";
                $('#f_pass_err_msg').html('Password should be 6 or more character.');
                $('#f_rpass_err_msg').html('Repeat Password should be 6 or more character.');
                return;
            } else if (n_pass.length >= 6 && n_rpass.length < 6) {
                document.getElementById('f_pass_err_msg_area').style.display = "none";
                document.getElementById('f_rpass_err_msg_area').style.display = "block";
                $('#f_pass_err_msg').html('');
                $('#f_rpass_err_msg').html('Repeat Password should be 6 or more character.');
                return;
            } else if (n_pass.length < 6 && n_rpass.length >= 6) {
                document.getElementById('f_pass_err_msg_area').style.display = "block";
                document.getElementById('f_rpass_err_msg_area').style.display = "none";
                $('#f_pass_err_msg').html('Password should be 6 or more character.');
                $('#f_rpass_err_msg').html('');
                return;
            } else {
                if (n_pass != n_rpass) {
                    document.getElementById('f_pass_err_msg_area').style.display = "none";
                    document.getElementById('f_rpass_err_msg_area').style.display = "block";
                    $('#f_pass_err_msg').html('');
                    $('#f_rpass_err_msg').html('Password does not matched.');
                    return
                } else {
                    document.getElementById('f_pass_err_msg_area').style.display = "none";
                    document.getElementById('f_rpass_err_msg_area').style.display = "none";
                    $('#f_pass_err_msg').html('');
                    $('#f_rpass_err_msg').html('');

                    var data = jQuery('#forgetPasswordSubmit').serialize();
                    // toastr.options = {
                    // "closeButton": true,
                    // "newestOnTop": true,
                    // "progressBar": true,
                    // "timeOut": "2000",
                    // "positionClass": "toast-top-right"
                    // };
                    jQuery.ajax({
                        url: '/forget_password_submit',
                        data: data,
                        type: 'post',
                        success: function (result) {

                            if (result.status == 'success') {
                                // toastr.success('Password updated successfully.');
                                setTimeout(function () {
                                    window.location.href = "{{route('signin')}}";
                                }, 2000);
                                $('#passwordResetModal').modal('hide');
                                $('#forget-password-success-modal').modal('show');

                            } else if (result.status == 'error') {
                                // document.getElementById("f_email_err_msg").style.display = "block";
                                // $('#f_email_err_msg').html(result.msg);
                            }
                        }
                    });
                }

            }
        }


    }


    function codeSubmitForgetPassword() {
        var data = jQuery('#forgetCodeSubmitFrm').serialize();
        var verify_code = jQuery('#f_verification_code').val();
        document.getElementById('f_code_err_msg_area').style.display = "none";
        jQuery('#f_code_err_msg').html("");
        if (verify_code == '') {
            document.getElementById("f_code_err_msg_area").style.display = "block";
            $('#f_code_err_msg').html('This field should not be empty.');
            return;
        } else {
            jQuery.ajax({
                url: '/forget_pass_code_submit',
                data: 'verify_code=' + verify_code + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {

                    if (result.status == 'success') {
                        document.getElementById('forget_email_field').style.display = "none";
                        document.getElementById('forget_verification_code_field').style.display = "none";
                        document.getElementById('forget_password_field').style.display = "block";
                        document.getElementById('f_email_err_msg_area').style.display = "none";
                        document.getElementById('f_code_err_msg_area').style.display = "none";
                        document.getElementById('f_pass_err_msg_area').style.display = "none";
                        document.getElementById('f_rpass_err_msg_area').style.display = "none";
                        $('#f_email_err_msg').html('');
                        $('#f_code_err_msg').html('');
                        $('#f_pass_err_msg').html('');
                        $('#f_rpass_err_msg').html('');
                    } else if (result.status == 'error') {
                        document.getElementById('f_code_err_msg_area').style.display = "block";
                        $('#f_code_err_msg').html(result.msg);
                    }
                }
            });
        }
    }


    function closeForgetModal() {
        $('#passwordResetModal').modal('hide');
    }

    function closeSigninVerificationModal() {
        $('#verifyCodeModal').modal('hide');
    }

</script>

<input type="hidden" id="send_code" value="">
<!-- Modal {Verify Code} -->
<div class="modal fade" id="verifyCodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered signin-verify-modal-area" role="document">
        <div class="modal-content signin-verify-modal-content">
            <span><button type="button" class="close-popover close-signin-verify-modal" data-dismiss="modal"
                    onclick="closeSigninVerificationModal()">
                    <span>&times;</span>
                </button></span>
            <div class="modal-body pt-md-0 text-center" id="verification_code_field" style="padding: 0;">
                <p class="signin-verification-modal-title" id="modal-header">Your email is not verified</p>
                <p class="signin-verification-modal-heading" id="modal-second-header">We send you a verification code
                    to your email</p>
                <!-- <p style="text-decoration: underline;cursor: pointer;" class="signin-verification-modal-email" id="login_modal_email"></p> -->

                <p class="signin-verification-modal-input-label">Enter the code here</p>
                <form id="codeSubmit">
                    @csrf
                    <div class="form-group text-center">
                        <input type="text" class="form-control mx-auto signin-verification-modal-input"
                            name="verification_code" id="verification_code" />
                        <div id="signin_code_err_msg_area" class="signin_code_err_msg_area text-center mt-2"
                            style="color: #f25b5b;"><i class="fa fa-exclamation-triangle me-2"></i><span
                                id="signin_code_err_msg"></span></div>
                        <button type="button" class="modal-continue-btn signin-verify-continue-btn"
                            onclick="codeSubmit()">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
