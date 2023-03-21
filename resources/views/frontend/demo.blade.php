@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style rel='stylesheet'>
        @page {
            size: auto !important;
            margin: 0 !important;
        }

        .invoice-content-section {
            background-color: #e1e1e1;
            font-family: "Roboto", sans-serif;
        }

        .invoice-area {
            max-width: 986px;
            background-color: #ffffff;
            margin: 0 auto;
        }

        .print-btn {
            width: 175px;
            height: 55px;
            padding: 15px auto;
            border-radius: 30px;
            color: rgb(255, 255, 255);
            background-color: #2699FB;
            font-size: 16px;
            font-weight: 500;
            margin-right: 20px;
            outline: none;
            border: none;
        }

        .print-btn:hover {
            background-color: #0071E3;
            color: #fff;
        }

        .print-cancel-btn {
            width: 175px;
            height: 55px;
            padding: 15px 65px;
            border-radius: 30px;
            color: #272727;
            background-color: #E1E1E1;
            font-size: 16px;
            font-weight: 500;
            outline: none;
            border: none;
        }

        .print-cancel-btn:hover {
            background-color: #1486F9;
            color: #fff;
        }



        @media (max-width: 480px) {
            .invoice-thankyou {
                max-width: 100% !important;
            }

            .invoice-area {
                max-width: 100% !important;
            }

            .invoice-table {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-header {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-logo-date {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-billing {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-print-area {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-print-btn {
                flex-direction: column;
            }

            .print-btn {
                width: 100% !important;
                margin-bottom: 20px !important;
            }

            .print-cancel-btn {
                width: 100% !important;
                margin-bottom: 20px !important;
            }
        }

        /* Tab responsive css */
        @media (min-width: 481px) and (max-width: 820px) {
            .invoice-thankyou {
                max-width: 100% !important;
            }
        }

        @media (min-width: 821px) and (max-width: 1080px) {
            .invoice-area {
                max-width: 760px !important;
            }

            .invoice-thankyou {
                max-width: 100% !important;
            }

            .invoice-print-section {
                max-width: 760px !important;
            }
        }

    </style>

</head>
<?php 
    if(session()->has('GUEST_ID')){
        $guestId = session()->get('GUEST_ID');
        $guestUser = App\Models\User::where('id',$guestId)->where('user_type_status','non-reg')->get();
    }
?>

<body>
    <div id="print-body">
        <div class="qbits-top-middle">
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
        </div>

        <div class="qbits-top-bottom">
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
        </div>



        <div class="invoice-content-section" id="invoice-content-section">
            <div class="invoice-area" id="invoice-print-area">
                <div class="container d-flex justify-content-center align-items-center invoice-thankyou"
                    style="width: 986px; height: 60px;background: #2699FB !important; color: #F5F5F7 !important; font-weight: bold; font-size: 16px; line-height: 21px;">
                    <span>Thank you for your order</span>
                </div>
                <div style="max-width: 701px;border-bottom: 2px solid #ddd;margin: 40px auto 0;padding-bottom: 20px;"
                    class="invoice-logo-date">
                    <div class="d-flex justify-content-between">
                        <div>
                            <!--begin::Logo-->
                            <a onclick="closePrintInvoice()">
                                <img src="{{ asset('frontend/assets/logo/qbits_logo_black.png')}}"
                                    style="width: 80px;opacity: 0.8" alt="qbits Logo" class="img-responsive">
                            </a>
                            <!--end::Logo-->
                        </div>
                        <div style="color: #272727;font-size: 18px; font-weight: 400;">
                            Date: May 30, 2022
                        </div>
                    </div>
                </div>
                <div style="width: 701px; margin: 20px auto;" class="invoice-header">
                    <p style="color: #272727;font-size: 18px; font-weight: 400;">Hi Showkhin,</p>
                    <p style="color: #272727;font-size: 18px; font-weight: 400;margin-bottom: 40px;">Just to let you
                        know, we've received your order #655556,and it is now being processed:</p>
                    <p style="color: #272727;font-size: 18px; font-weight: 400;margin-bottom: 40px;">Pay with cash upon
                        delivery.</p>
                    <p style="color: #000000;font-size: 16px;font-weight: 500;">[Order #655556]</p>
                </div>
                <div style="width: 701px; margin: 0 auto;margin-bottom: 20px;" class="invoice-table">
                    <!--begin::Table-->
                    <div class="table-responsive border-bottom mb-14">
                        <table
                            style="border: 1px solid #ddd;border-width: 1px 0 0 1px !important;border-collapse: collapse;width: 100%;">
                            <thead>
                                <tr>
                                    <th width="70%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                                        Product:</th>
                                    <th width="12%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                                        Quantity</th>
                                    <th width="18%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                                        Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="70%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;">
                                        Qbits Sigma 15 - 10th Generation Intel® Core™ Processor, 15.6 Inches FHD Non
                                        Touch IPS Display, 512GB NVMe SSD, 8GB DDR4 RAM, Intel® Iris® Plus
                                        Graphics/Intel®</td>
                                    <td width="12%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 400;">
                                        2 Pcs</td>
                                    <td width="18%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 18px;font-weight: 400;">
                                        ৳ {{number_format(72000)}}</td>
                                </tr>
                                <tr>
                                    <td width="82%" colspan="2"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                                        Payment Method : </td>
                                    <td width="18%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 18px;font-weight: 400;">
                                        Cash On Delivery</td>
                                </tr>
                                <tr>
                                    <td width="100%" colspan="3"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                                        <p class="d-flex justify-content-between">
                                            <span style="color: #000000;font-size: 16px;font-weight: 500;">Gross Total :
                                            </span>
                                            <span style="color: #000000;font-size: 16px;font-weight: 500;">৳
                                                {{number_format(1440000)}}</span>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <div style="max-width: 701px; margin: 0 auto;" class="pb-4 invoice-billing">
                    <div style="border: 1px solid #ddd;">
                        <div class="ps-3 pt-2 pb-1">
                            <p style="color: #000000;font-size: 16px;font-weight: 500;">Billing Address</p>
                            <p style="color: #000000;font-size: 18px;font-weight: 400;">271/1, Borobag, Mirpur-2 <br>
                                Dhaka-1216
                            </p>
                            <p style="color: #000000;font-size: 18px;font-weight: 400;">017379745562 <br>
                                showkin@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="max-width: 986px;background-color: #ffffff;margin: 0 auto;" class="invoice-print-section">
                <div style="max-width: 701px; margin: 0 auto; padding-bottom: 30px;" class="invoice-print-area">
                    <div class="d-flex invoice-print-btn">
                        <button type="button" class="btn print-btn" onclick="invoicePrint()">Print</button>
                        <a type="button" class="btn print-cancel-btn" onclick="closePrintInvoice()">Close</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function invoicePrint() {
                var backup = document.body.innerHTML;
                var print_content = document.getElementById('invoice-print-area').innerHTML;
                document.body.innerHTML = print_content;
                window.print();
                document.body.innerHTML = backup;
            }

            function closePrintInvoice() {
                window.location.href = "{{route('close_invoice')}}";
            }

        </script>
</body>

</html>

@endsection
