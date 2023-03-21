<!-- footer section email subscribe style -->
<style>
    .swal-overlay {
        background-color: rgba(132, 132, 132, 0.581);
    }

    .swal-text {
        padding: 17px;
        text-align: center;
        color: #0a0eee;
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

    .spinner-border {
        height: 20px;
        width: 20px;
    }

    .subscribe_email_btn {
        background-color: #f5f7f5;
        border-radius: 29px;
        height: 55px;
        width: 174px;
        padding: 0 10px;
        color: #78787C !important;
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        margin-left: 1vw;
    }

    .subscribe_email_btn:hover {
        background-color: #0071E3 !important;
        color: #fff !important;
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

    .email-subscribe-modal-title {
        font-size: 16px;
        font-family: 'Roboto';
        font-weight: 500;
        color: #F5F5F7;
        line-height: 28px;
        text-align: center;
        margin-top: 1.8vw;
        margin-bottom: 0.5vw;
    }

    .email-subscribe-modal-heading {
        font-size: 16px;
        font-family: 'Roboto';
        font-weight: 400;
        line-height: 21px;
        text-align: center;
        color: #F5F5F7;
        margin-bottom: 1.5vw;
    }

    .email-subscribe-modal-input-title {
        font-size: 16px;
        font-family: 'Roboto';
        font-weight: 400;
        color: #F5F5F7;
        line-height: 22px;
        text-align: center;
        margin-bottom: 0.9vw;
    }

    .email-subscribe-success-modal-heading {
        font-size: 16px;
        font-family: 'Roboto';
        font-weight: 500;
        color: #F5F5F7;
        line-height: 22px;
        text-align: center;
        margin-bottom: 0.9vw;
    }

    .footer-area {
        justify-content: space-evenly;
    }

    .row.footer-area {
        gap: 68px;
    }

    .modal-content {
        min-height: 0;
    }

    .subscribe-modal-input-title {
        margin-bottom: 10px;
        font-size: 18px !important;
        color: #fff;
        line-height: 24px;
    }

    .subscribe-modal-input-text {
        margin-bottom: 20px;
        font-size: 16px !important;
        color: #fff;
        line-height: 24px;
    }

    .wishlist-modal-area {
        max-width: 480px !important;
        margin: 0 auto;
    }

    .wishlist-modal-content {
        height: auto;
        background-color: #272727;
        border-radius: 20px;
    }

    .wishlist-modal-input-title {
        margin-bottom: 20px;
        font-size: 18px;
    }

    .wishlist-login-btn {
        margin-bottom: 10px;
    }

    .wishlist-error-circle {
        margin-top: 55px !important;
        width: 38px;
        height: 38px;
        background: #1486F9;
        border-radius: 50%;
        margin: 0 auto;
        margin-bottom: 20px;
    }

    .subscribe-modal-continue-btn {
        margin-top: 40px;
        width: 175px !important;
        height: 55px !important;
        padding: 7px 27px;
        border-radius: 25px !important;
        color: #fff;
        background-color: #2699fb;
        outline: none;
        border: none;
        margin-bottom: 40px;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {
        .wishlist-modal-area {
            max-width: 300px !important;
        }


        .wishlist-error-circle {
            margin-top: 30px !important;
        }

        .wishlist-login-btn {
            margin-top: 15px;
        }

        .wishlist-modal-input-title {
            font-size: 16px;
        }

        .subscribe_success_circle {
            margin-top: 40px;
        }
    }

    /* Tab responsive css */
    @media (min-width: 481px) and (max-width: 820px) {
        .wishlist-error-circle {
            margin-top: 40px !important;
        }

        .wishlist-login-btn {
            margin-top: 20px;
        }

        .subscribe_success_circle {
            margin-top: 40px;
        }
    }

    @media screen and (min-width: 1100px) and (max-width: 1400px) {
        .row.footer-area {
            gap: 40px;
        }
    }

</style>

<!-- start footer-area section -->
<section class="footer-area-section">
    <div class="container footer-area-container">
        <div class="row footer-area">
            <div class="col-sm-12 col-lg-2 col-md-3">
                <div class="footer-content">
                    <P style="font-weight: bold;">Contact us</P>
                    <ul style="line-height: 32px;">
                         <li><span style="color:#78787C;">781/1,Monipur,Mirpur-2,</span></li>
                         <li><span style="color:#78787C;">Dhaka</span></li>
                        <li><span style="color:#78787C;">02-58055541</span></li>
                        <li><span style="color:#78787C;">+8801312145675</span></li>
                        <li><span style="color:#78787C;">[ 10 AM - 10 PM ]</span></li>
                        <li><span style="color:#78787C;">info@myqbits.com</span></li>
                        {{-- <li><a href="#">Find a Store</a></li> --}}
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-lg-2 col-md-2">
                <div class="footer-content">
                    <P style="font-weight: bold;">Customer Service</P>
                    <ul>
                        <li><a href="{{route('ordering_payment_policy')}}">Ordering & Payment</a></li>
                        <li><a href="{{ route('shipping')}}">Shipping Policy</a></li>
                        <li><a href="{{ route('return_policy')}}">Return Policy</a></li>
                        <li><a href="{{ route('faq')}}">FAQ</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-lg-2 col-md-2">
                <div class="footer-content">
                    <P style="font-weight: bold;">Information</P>
                    <ul>
                        <li><a href="{{ route('privacy')}}">Privacy Policy</a></li>
                        <li><a href="{{ route('term')}}">Terms & Conditions</a></li>

                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 col-md-4">
                <div class="footer-content">
                    <P style="font-weight: bold;">Subscribe to Qbits via Email</P>
                    <p style="color: #78787C;">Stay connected with us, Qbits keeps you updated about the latest
                        innovations for the change.</p>
                    <div class="d-flex">
                        <input type="email" class="form-control" id="subscribe_email" placeholder="Email Address">

                        <button id="subscribe_email_btn" class="btn subscribe_email_btn" type="button"
                            onclick="addSubscriber()">Subscribe</button>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="footer">
        @php
            $year = date("Y");
        @endphp
        <p style="color: #78787C">Copyright © {{$year}} Qbits Technologies. All rights reserved.</p>
    </div>

    <!-- Modal for wishlist login alert -->
    <div class="modal fade" id="wishlistCartModalShow" tabindex="-1" role="dialog"
        aria-labelledby="wishlistCart_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered wishlist-modal-area" style="place-content: center;"
            role="document">
            <div class="modal-content wishlist-modal-content">
                <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center" id="">
                    <div class="wishlist-error-circle">
                        <img style="padding-top: 7px;padding-left: 1px;" src="{{ asset('error_icon.png') }}"
                            alt="error" />
                    </div>
                    <p class="wishlist-modal-input-title">Need to sign in to see your wishlist</p>
                    <button type="button" class="modal-continue-btn wishlist-login-btn"
                        onclick="signinForSeeWishlist()">Sign In</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for subscribe empty email-->
    <div class="modal fade" id="email_subscribe_empty_email_modal" style="backdrop-filter: none" tabindex="-1"
        role="dialog" aria-labelledby="verification_code_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered wishlist-modal-area" style="place-content: center;"
            role="document">
            <div class="modal-content wishlist-modal-content">
                <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center">
                    <div class="wishlist-error-circle">
                        <img style="padding-top: 7px;padding-left: 1px;" src="{{ asset('error_icon.png') }}"
                            alt="error" />
                    </div>
                    <p class="wishlist-modal-input-title" id="subscribe-error">
                        Please enter a valid email to subscribe Newsletter.</p>
                    <button type="button" class="modal-continue-btn wishlist-login-btn"
                        onclick="closeSubscribeEmptyEmail()">Back</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for subscribe invalid email-->
    <div class="modal fade" id="email_subscribe_error_modal" style="backdrop-filter: none" tabindex="-1" role="dialog"
        aria-labelledby="verification_code_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered wishlist-modal-area" style="place-content: center;"
            role="document">
            <div class="modal-content wishlist-modal-content">
                <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center">
                    <div class="wishlist-error-circle">
                        <img style="padding-top: 7px;padding-left: 1px;" src="{{ asset('error_icon.png') }}"
                            alt="error" />
                    </div>
                    <p class="wishlist-modal-input-title" id="subscribe-error">
                        Please enter an valid email to subscribe</p>
                    <button type="button" class="modal-continue-btn wishlist-login-btn"
                        onclick="closeSubscribeInvalidEmail()">Back</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for subscribe already exist email-->
    <div class="modal fade" id="email_subscribe_exist_error_modal" style="backdrop-filter: none" tabindex="-1"
        role="dialog" aria-labelledby="verification_code_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered wishlist-modal-area" style="place-content: center;"
            role="document">
            <div class="modal-content wishlist-modal-content">
                <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center">
                    <div class="wishlist-error-circle">
                        <img style="padding-top: 7px;padding-left: 1px;" src="{{ asset('error_icon.png') }}"
                            alt="error" />
                    </div>
                    <p class="wishlist-modal-input-title" id="subscribe-error">
                        Your email is already subscribed to our Qbits website, to have more information please follow us
                        on <a href="http://myqbits.com/" target="_blank">www.myqbits.com </a></p>
                    <button type="button" class="modal-continue-btn wishlist-login-btn"
                        onclick="closeSubscribeErrorModal()">Back</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for subscribe success message -->
    <div class="modal fade" id="email_subscribe_success_modal" style="backdrop-filter: none" tabindex="-1" role="dialog"
        aria-labelledby="email_subscribe_success_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered wishlist-modal-area" role="document">
            <div class="modal-content wishlist-modal-content">
                <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center" id="">
                    <div class="subscribe_success_circle">
                        <img style="padding-top: 11px;padding-left: 2px;" src="{{ asset('success_icon.png') }}"
                            alt="success" />
                    </div>
                    <p class="wishlist-modal-input-title">Thanks for subscribing!</p>
                    <p class="wishlist-modal-input-heading"> You have officially subscribed to our Newsletter.</p>
                    <button type="button" class="modal-continue-btn wishlist-login-btn"
                        onclick="closeSubscribeSuccessModal()">Continue</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for error show for already registered user -->
    <div class="modal fade" id="reg_exist_email_error_modal" tabindex="-1" role="dialog"
        aria-labelledby="wishlistCart_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered wishlist-modal-area" style="place-content: center;"
            role="document">
            <div class="modal-content wishlist-modal-content">
                <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center" id="">
                    <div class="wishlist-error-circle">
                        <img style="padding-top: 7px;padding-left: 1px;" src="{{ asset('error_icon.png') }}"
                            alt="error" />
                    </div>
                    <p class="wishlist-modal-input-title">This email already have an account. Try other email or login
                    </p>
                    <button type="button" class="modal-continue-btn wishlist-login-btn"
                        onclick="closeExistEmailErrorModal()">Back</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for forget password success message -->
    <div class="modal fade" id="forget-password-success-modal" style="backdrop-filter: none" tabindex="-1" role="dialog"
        aria-labelledby="email_subscribe_success_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered wishlist-modal-area" role="document">
            <div class="modal-content wishlist-modal-content">
                <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center" id="">
                    <div class="subscribe_success_circle">
                        <img style="padding-top: 11px;padding-left: 2px;" src="{{ asset('success_icon.png') }}"
                            alt="success" />
                    </div>
                    <p class="wishlist-modal-input-heading"> Your password successfully updated.</p>
                    <button type="button" class="modal-continue-btn wishlist-login-btn"
                        onclick="closeForgetPasswordSuccessModal()">Ok</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end footer-area section -->