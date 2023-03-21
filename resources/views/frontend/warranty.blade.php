@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
<style>
    body {
        overflow-x: hidden;
    }

    .warranty-container {
        margin-top: 50px !important;
        margin-bottom: 50px !important;
    }

    .warranty-heading {
        color: #666666;
        font-weight: 500;
        font-size: 22px;
        margin-top: 40px;
        margin-bottom: 20px;
        font-family: 'Roboto';
        line-height: 16px;
    }

    .warranty-info {
        color: #707070;
        font-weight: 400;
        font-size: 16px;
        margin-bottom: 15px;
        font-family: 'Roboto';
        line-height: 20px;
    }

    @media (min-width: 821px) and (max-width: 991px) {
        .warrenty-area-section .warrenty-section {
            max-width: 700px;
        }
    }

    @media screen and (min-width: 992px) and (max-width: 1199px) {
        .warrenty-area-section .warrenty-section {
            max-width: 900px;
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
                        <a class="active-nav" href="{{route('warranty')}}">Warranty</a>
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

<section class="warrenty-area-section">
    <div class="container">
        <div class="row warranty-container">
            <div class="col-sm-12">
                <div class="warrenty-section">
                    <h3 class="warranty-heading">Warranty Disclaimer</h3>
                    <p class="warranty-info">Qbits, the manufacturer, provides support and services including repair and
                        replacement based on the warranty policy. The customer who purchased the Qbits laptop is
                        provided with its original limited warranty. As per Qbits warranty policy, the date is issued
                        from the day of purchase from the authorized provider. The customer will get the services for
                        the device or parts/components that are covered by the warranty policy. The service is provided
                        only after being verified by contacting Qbits authorized service provider.</p>
                    <h3 class="warranty-heading">Qbits Terms and Policy</h3>
                    <p class="warranty-info">1. Qbits provides immediate service for any component or hardware product
                        that manifests a defect or imperfection in craftsmanship during the Limited Warranty Period.
                    </p>
                    <p class="warranty-info">2. Qbits service providers offer warranty service for all the products
                        subject to the terms and conditions set forth in this Limited Warranty. The Limited Warranty
                        Period starts on the date of purchase from the Qbits authorized seller/provider. </p>
                    <p class="warranty-info">3. The Limited Warranty for a Qbits Hardware Product is specified,
                        providing only carry-in warranty service. The authorized service provider provides immediate
                        service for any defect in the parts/components that are stated in the warranty policy. </p>
                    <p class="warranty-info">4. The support and services are provided by the Qbits Service provider only
                        after verifying and proving that the product is still under warranty.</p>
                    <p class="warranty-info">5. The device or parts/components shall be repaired only if they are under
                        the coverage mentioned in the warranty card.</p>
                    <p class="warranty-info">6. Qbits Warranty policy only covers any defect in any parts/components
                        that are used to manufacture the product. Qbits service provider repairs any defects under
                        normal use.</p>
                    <p class="warranty-info">7. The customer will get the services at no cost only if the warranty is
                        found valid and the device is purchased from an authorized seller.</p>
                    <p class="warranty-info">8. The customers are expected to back up their data, and for any loss of
                        data during the repair process Qbits Servicing Center will not be responsible.</p>
                    <p class="warranty-info">9. For Qbits Warranty Service, the customer shall be responsible to carry a
                        valid warranty card along with the original invoice or sales slip indicating the date of
                        purchase, dealer's name, model, and serial no. of the product. </p>
                    <p class="warranty-info">10. Qbits reserves the right to refuse a warranty if the original serial
                        number sticker of the device/ parts/ components or authentic information is removed,
                        obliterated, altered, or changed from the original purchase of the product from the dealer.</p>
                    <p class="warranty-info">11. Qbits Warranty is specified for specific parts or components, as Qbits
                        offers a 1-year warranty for battery and charger. For display dead pixels a 2-year warranty is
                        provided by Qbits.</p>
                    <h3 class="warranty-heading">Limitations </h3>
                    <p class="warranty-info">1. Qbits warranty does not cover any defect arising from incorrect
                        installation, or damage due to non-recommended software, in this case, it will be considered as
                        Customer Induced Damage and the defect will be treated as out of warranty coverage.</p>
                    <p class="warranty-info">2. Qbits Warranty will be considered invalid if anyone opens the laptop
                        back
                        part for upgradation purposes or fixing its issue, it can be only open under Qbits authorized
                        service center. In any case, if the customers are required to open the laptop for upgradation
                        purposes or any other issues during the warranty period, the customers are advised to contact
                        with Qbits service center.</p>
                    <p class="warranty-info">3. No claim shall be considered liable for loss directly or indirectly, for
                        third party claims against the customer, for losses or damages, records, information or data, or
                        economic consequential damages, including lost profits.
                    </p>
                    <p class="warranty-info">4. The warranty will be treated as invalid if any information, data, name,
                        or seal of the serial number has been damaged or rendered, altered, or changed.</p>
                    <p class="warranty-info">5. Qbits warranty service provider will not be responsible for any
                        intentional or unintentional defect or damage caused by accidents, drops, spills, floods, fires,
                        or other natural disasters. </p>
                    <p class="warranty-info">6. In this case, the product will be considered excluded from the warranty
                        policy and can be repaired only on a chargeable basis directly through the service center.
                    </p>
                    <p class="warranty-info">7. If the product is repaired by any unauthorized service center, the
                        warranty will be void and Qbits shall not be liable for reimbursements, claims, and damages that
                        may result from the unauthorized repair of the product.</p>
                    <p class="warranty-info">8. Qbits warranty does not cover any defect or damage caused by improper
                        handling/usage or any disassembly by end-user or non-authorized repair centers.</p>
                    <p class="warranty-info">9. The warranty will be invalid for any kind of damage due to inconsistent
                        voltage or improper power supply.</p>
                    <p class="warranty-info">10. Warranty invalid if the damage is caused by accident, misuse, liquid
                        spills, abuse, contamination, improper or inadequate maintenance.</p>
                    <p class="warranty-info">11. For the display, Qbits will not be liable if there are scratches or
                        defects due to external causes.</p>
                    <p class="warranty-info">12. If the Qbits products are kept in conditions that do not conform to
                        recommended operating conditions of the machine.</p>
                    <p class="warranty-info">13. Due to natural disasters like lightning, abnormal voltage, or wrong
                        connection of accessories.</p>
                    <p class="warranty-info">14. If the product is serviced or repaired by anyone or an un-trained
                        technician other than an Authorized Service Provider and modified from the original Qbits
                        manufacturing standard.</p>

                    <h3 class="warranty-heading">Warranty Policy For Qbits Products:</h3>
                    <a href="{{asset('pdf/qb_warranty.pdf')}}" download="QB Warranty.pdf">Click here to download a
                        detailed warranty policy for Qbits Product</a>

                </div>
            </div>
        </div>
    </div>
</section>


<script>


</script>

@endsection
