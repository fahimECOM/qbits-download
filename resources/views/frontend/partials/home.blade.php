<style>
    .shipping-area-section .shipping-area {
        background: transparent linear-gradient(122deg, #2D3E37 0%, #21293B 48%, #181717 100%) 0% 0% no-repeat padding-box;
        /* background: linear-gradient(90deg, #14212c 0%, #1c1c1c 100%) !important; */
        position: relative;
        border-radius: 35px;
        /* background-size: cover !important; */
        height: 315px;
    }

    h4.shipping-content-h4 {
        /* padding-top: 20px; */
        font-size: 22px;
        line-height: 24px;
        font-weight: 600;
    }

    p.shipping-content-p {
        font-size: 22px;
        line-height: 24px;
        margin-top: -5px;
    }

    .modal-content {
        min-height: 0;
    }

    .accessories-modal-area {
        max-width: 480px !important;
        margin: 0 auto;
    }

    .accessories-modal-content {
        max-height: 330px !important;
        background-color: #272727;
        border-radius: 20px;
    }

    .accessories-modal-input-title {
        margin-bottom: 10px;
        font-size: 18px !important;
        color: #fff;
        line-height: 24px;
    }

    .accessories-modal-input-text {
        margin-bottom: 20px;
        font-size: 16px !important;
        color: #fff;
        line-height: 24px;
    }

    .accessories-back-btn {
        margin-bottom: 10px;
        margin-top: 25px !important;
    }

    .accessories-error-circle {
        margin-top: 40px !important;
        width: 38px;
        height: 38px;
        background: #1486F9;
        border-radius: 50%;
        margin: 0 auto;
        margin-bottom: 20px;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {

        .accessories-modal-area {
            max-width: 310px !important;
            margin: 0 auto;
        }

        .accessories-modal-content {
            max-height: 320px !important;
        }

        .accessories-error-circle {
            margin-top: 20px !important;
        }

        .accessories-login-btn {
            margin-top: 10px;
        }

        .accessories-modal-input-title {
            font-size: 16px !important;
        }

        .accessories-modal-input-text {
            font-size: 14px !important;
        }
    }

    /* Tab responsive css */
    @media (min-width: 481px) and (max-width: 820px) {
        .accessories-error-circle {
            margin-top: 40px !important;
        }

        .accessories-login-btn {
            margin-top: 20px;
        }
    }

    @media screen and (min-width: 1100px) and (max-width: 1400px) {
        .row.footer-area {
            gap: 40px;
        }
    }

</style>
{{-- <section class="laptop-backpack-section">
    <div class="container">
        <div class="row">
            <div class="backpack-section"> 
                <div class="col-sm-9">
                    <div class="backpack-details">
                        <h1>Qbits Smart<br>Backpack</h1>
                        <p>Qbits laptops come with a backpack,<br>professionally tailored only for Qbits to<br>suit your requirements.</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="backpack-characterstick">
                        <div class="row backpack-info">
                            <div class="col-2">
                                <div class="backpack-icon">
                                    <img src="/frontend/assets/Icons/multiple-compatments.png" class="img-responsive" alt="qbits compononets icon">
                                </div>
                            </div>
                            <div class="col-10">
                                <p>Multiple <br>Compartments</p>
                            </div>
                        </div>

                        <div class="row backpack-info">
                            <div class="col-2">
                                <div class="backpack-icon">
                                    <img src="/frontend/assets/Icons/paddle-soulder-striped.png" class="img-responsive" alt="qbits compononets icon">
                                </div>
                            </div>
                            <div class="col-10">
                                <p>Padded<br>Shoulder Strap</p>
                            </div>
                        </div>

                        <div class="row backpack-info">
                            <div class="col-2">
                                <div class="backpack-icon">
                                    <img src="/frontend/assets/Icons/Branded-Zipper.png" class="img-responsive" alt="qbits compononets icon">
                                </div>
                            </div>
                            <div class="col-10">
                                <p>Branded<br>Zipper</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="laptop-backpack-section">
    <div class="container">
        <div class="row">
            <div class="backpack-section">
                <div class="col-sm-4">
                    <div class="backpack-details">
                        <h1>Qbits Smart<br>Backpack</h1>
                        <p>Qbits laptops come with a backpack,<br>professionally tailored only for Qbits to<br>suit your
                            requirements.</p>
                    </div>
                </div>
                <div class="backpack-model-image">
                    <img src="/frontend/assets/images/Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-RAM-M.2-512GB-NVMe-SSD-15.6-Inches-Full-HD-IPS-Display-with-LED-Backlit-Notebook-bag-with-man.png"
                        class="img-responsive"
                        alt="Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-RAM-M.2-512GB-NVMe-SSD-15.6-Inches-Full-HD-IPS-Display-with-LED-Backlit-Notebook-bag-with-man">
                </div>
                <div class="col-sm-4">
                    <div class="backpack-characterstick">
                        <div class="row backpack-info ">
                            <div class="col-2">
                                <div class="backpack-icon">
                                    <img src="/frontend/assets/Icons/multiple-compatments.png" class="img-responsive"
                                        alt="qbits compononets icon">
                                </div>
                            </div>
                            <div class="col-10">
                                <p>Multiple <br>Compartments</p>
                            </div>
                        </div>

                        <div class="row backpack-info ">
                            <div class="col-2">
                                <div class="backpack-icon">
                                    <img src="/frontend/assets/Icons/paddle-soulder-striped.png" class="img-responsive"
                                        alt="qbits compononets icon">
                                </div>
                            </div>
                            <div class="col-10">
                                <p>Padded<br>Shoulder Strap</p>
                            </div>
                        </div>

                        <div class="row backpack-info ">
                            <div class="col-2">
                                <div class="backpack-icon">
                                    <img src="/frontend/assets/Icons/Branded-Zipper.png" class="img-responsive"
                                        alt="qbits compononets icon">
                                </div>
                            </div>
                            <div class="col-10">
                                <p>Branded<br>Zipper</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mobile-backpack-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mobile-backpack">
                <div class="backpack-details">
                    <h1>Qbits Smart Backpack</h1>
                    <p>Qbits laptops come with a backpack,professionally tailored only for Qbits to suit your
                        requirements.</p>
                </div>
                <div class="backpack-characterstick">
                    <div class="row backpack-info backpack">
                        <div class="col-2">
                            <div class="backpack-icon">
                                <img src="/frontend/assets/Icons/multiple-compatments.png" class="img-responsive"
                                    alt="qbits compononets icon">
                            </div>
                        </div>
                        <div class="col-10">
                            <p>Multiple <br>Compartments</p>
                        </div>
                    </div>

                    <div class="row backpack-info backpack">
                        <div class="col-2">
                            <div class="backpack-icon">
                                <img src="/frontend/assets/Icons/paddle-soulder-striped.png" class="img-responsive"
                                    alt="qbits compononets icon">
                            </div>
                        </div>
                        <div class="col-10">
                            <p>Padded<br>Shoulder Strap</p>
                        </div>
                    </div>

                    <div class="row backpack-info">
                        <div class="col-2">
                            <div class="backpack-icon">
                                <img src="/frontend/assets/Icons/Branded-Zipper.png" class="img-responsive"
                                    alt="qbits compononets icon">
                            </div>
                        </div>
                        <div class="col-10">
                            <p>Branded<br>Zipper</p>
                        </div>
                    </div>
                </div>

                <div class="backpack-image">
                    <img src="/frontend/assets/images/Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-RAM-M.2-512GB-NVMe-SSD-15.6-Inches-Full-HD-IPS-Display-with-LED-Backlit-Notebook-bag-with-man.png"
                        class="img-responsive"
                        alt="Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-RAM-M.2-512GB-NVMe-SSD-15.6-Inches-Full-HD-IPS-Display-with-LED-Backlit-Notebook-bag-with-man">
                </div>
            </div>
        </div>
    </div>
</section>



<!-- start Accesories $ register Section -->
<section class="accesories-register-section">
    <div class="container">
        <div class="row">
            <div class="accesories">
                <div class="col-sm-6">
                    <div class="accesories-img">
                        <div class="accesories-text">
                            <h1>Accessories</h1>
                            <p>Explore Qbits more for your dreamiest accessories.
                                A place where you can get everything to satisfy your needs.</p>
                            <!-- <a href="{{route('accessoriesbuy.buy')}}">Shop Now</a> -->
                            <!-- <a href="javascript:void(0)" onclick="accessoriesModalOpen()">Shop Now</a> -->
                        </div>
                    </div>

                    <div class="mobile-accesories-img">
                        <div class="mobile-accesories-text">
                            <h1>Accessories</h1>
                            <p>Explore Qbits more for your dreamiest accessories. <br>
                                A place where you can get everything to satisfy your needs.</p>
                            <img src="/frontend/assets/images/mobile/mousebag.png" class="mousebag img-responsive"
                                alt="">
                            <img src="/frontend/assets/images/mobile/mobile-key.png" class="keyboard img-responsive"
                                alt="">
                            <a href="{{route('accessoriesbuy.buy')}}">Shop Now</a>
                            <!-- <a href="javascript:void(0)" onclick="accessoriesModalOpen()">Shop Now</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="register-img">
                        <div class="register-text">
                            <h1>Register<br>Your Device</h1>
                            <p>Register your Qbits laptop to help us to provide you with premium services. By
                                registering your device become a member of the Qbits community and get more efficient
                                support, faster updates, and warranty services.
                            </p>
                            <a href="{{ route('product_registration')}}">Learn how to register your Qbits product
                                &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end Accesories $ register Section -->


<!-- start portfolio Section -->
<div class="portfolio-section">
    <div class="container">
        <div class="row">
            <div class="portfolio">
                <div class="col-sm-4 pe-3">
                    <div class="portfolio1 ">
                        <div class="portfolio-content">
                            <img src="/frontend/assets/Icons/2-years-warenty.png" class="img-responsive"
                                alt="qbits portfolio Banner">
                            <p style="">The Qbits Warranty offers customers limited warranty rights from Qbits. Qbits
                                laptops carry a 2-year warranty from the date of purchase. The Limited Warranty for a
                                Qbits Hardware Product is specified, providing only carry-in warranty service. The
                                authorized service provider provides immediate service for any defect in the
                                parts/components that are covered by the warranty policy.
                            </p>
                            <a href="{{route('warranty')}}">Learn More &nbsp;<i class="fa fa-angle-right"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 pe-3">
                    <div class="portfolio2 ">
                        <div class="portfolio-content">
                            <img src="/frontend/assets/Icons/store-01.png" class="img-responsive"
                                alt="qbits portfolio Banner">
                            <h3>Level Up Your Business</h3>
                            <p style="">Make business productive with high-powered Qbits laptops. Best quality Laptops
                                with highly reliable and stable performance ensure the seamless productivity you need to
                                grow your business exponentially.
                            </p>
                            <a href="{{route('qbits_business')}}">Shop for your Bussiness &nbsp;<i
                                    class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="portfolio3 ">
                        <div class="portfolio-content">
                            <img src="/frontend/assets/Icons/graduation.png" class="img-responsive"
                                alt="qbits portfolio Banner">
                            <h3>Enrich Your Education with Qbits</h3>
                            <p style="">Make your learning more effective and enjoyable with
                                innovative tools. Qbits creates sustainable technology to help you explore, learn and
                                create seamlessly. Connect globally with this standard technology and enrich your
                                education level one step ahead of the curve.
                            </p>
                            <a href="{{route('qbits_education')}}">Learn More &nbsp;<i class="fa fa-angle-right"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end portfolio section -->

<!-- start shipping-area section -->
<section class="shipping-area-section">
    <div class="container">
        <div class="row shipping-area">
            <div class="col-sm-4">
                <div class="shipping-content" style="margin-top: 72px;">
                    <img src="/frontend/assets/Icons/free-delivery.png" class="img-responsive" alt="">
                    <h4 class="shipping-content-h4">Free delivery </h4>
                    <p class="shipping-content-p">Find more in our shipping policy</p>
                    <a href="{{route('shipping')}}">Learn More &nbsp;<i class="fa fa-angle-right"
                            aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="shipping-content" style="margin-top: 72px;">
                    <img src="/frontend/assets/Icons/safe-payment.png" class="img-responsive" alt="">
                    <h4 class="shipping-content-h4">Safe and secure payment</h4>
                    <p class="shipping-content-p">Your data is encrypted for your protection</p>
                    <a href="{{route('ordering_payment_policy')}}">Learn More &nbsp;<i class="fa fa-angle-right"
                            aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="shipping-content" style="margin-top: 72px;">
                    <img src="/frontend/assets/Icons/massage-01-01.png" class="img-responsive" alt="">
                    <h4 class="shipping-content-h4">Get help buying</h4>
                    <p class="shipping-content-p">Call <a class="phone-number" href="tel: 02-58055541">02-58055541</a>
                        or chat online.</p>
                    <a href="{{route('contact')}} ">Contact Us &nbsp;<i class="fa fa-angle-right"
                            aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end shipping-area section -->


<!-- start about us section -->
<section class="about-us-section">
    <div class="container">
        <div class="row about-us">
            <div class="col-md-5 about-intro-respons">
                <div class="about-intro">
                    <h3>About Qbits</h3>
                    <div class="about-mobile-image">
                        <img src="/frontend/assets/images/mobile/Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-RAM-M.2-512GB-NVMe-SSD-15.6-Inches-Full-HD-IPS-Display-with-LED-Backlit-Notebook.png"
                            class="img-responsive"
                            alt="Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-RAM-M.2-512GB-NVMe-SSD-15.6-Inches-Full-HD-IPS-Display-with-LED-Backlit-Notebook">
                        <!-- <video controls>
                            <source src="{{asset('qbits.mp4')}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video> -->
                    </div>

                    <p style="">Our vision is to create technology that excels in versatility and brilliance. We work
                        together to design, create and recreate innovative tools that make life better and ensure
                        accessibility to the best experience anywhere with superior reliability. We are motivated and
                        inspired to introduce you to the new world with the latest innovation. Our purpose is to bring
                        advanced technologies into a sustainable price range. We are continuously taking on challenges
                        and committed to developing our brands and products that meet global standards.
                    </p>
                    <a href="{{ route('about')}}">Learn More &nbsp;<i class="fa fa-angle-right"
                            aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="about-image">
                    <img src="/frontend/assets/images/mobile/Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-RAM-M.2-512GB-NVMe-SSD-15.6-Inches-Full-HD-IPS-Display-with-LED-Backlit-Notebook.png"
                        class="img-responsive"
                        alt="Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-RAM-M.2-512GB-NVMe-SSD-15.6-Inches-Full-HD-IPS-Display-with-LED-Backlit-Notebook">
                    <!-- <video width="320" height="240" controls>
                        <source src="{{asset('qbits.mp4')}}" class="img-responsive" type="video/mp4">
                        Your browser does not support the video tag.
                      </video> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end about section -->

<!-- Modal for accessories comming soon -->
<div class="modal fade" id="accessoriesModalShow" style="backdrop-filter: none" tabindex="-1" role="dialog"
    aria-labelledby="accessories_modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered accessories-modal-area" role="document">
        <div class="modal-content accessories-modal-content">
            <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center" id="">
                <div class="accessories-error-circle">
                    <img style="padding-top: 7px;padding-left: 1px;" src="{{ asset('error_icon.png') }}" alt="error" />
                </div>
                <p class="accessories-modal-input-title">Comming Soon...</p>
                <p class="accessories-modal-input-text">Thank you for your interest
                    to our accessories.<br>We launching these very soon.</p>
                <button type="button" class="modal-continue-btn accessories-back-btn"
                    onclick="accessoriesModalClose()">Back</button>
            </div>
        </div>
    </div>
</div>
