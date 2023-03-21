<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        /* body {
            margin: 0;
            padding: 0;
        }

        .invoice-content-section {
            font-family: "Roboto", sans-serif;
        }

        .invoice-area {
            width: 780px;
            background-color: #ffffff;
            margin-left: -35px;
            margin-bottom: 20px !important;
        }

        .invoice-thankyou {
            width: 100%;
            height: 60px;
            background: #2699FB !important;
            color: #F5F5F7 !important;
            font-weight: bold;
            font-size: 16px;
            line-height: 21px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .invoice-logo-date-area {
            max-width: 700px;
            border-bottom: 2px solid #ddd;
            margin: 10px auto;
        }

        

        .invoice-logo {
            width: 80px;
            opacity: 0.8;
            float: left;
        }

        .invoice-date {
            color: #272727;
            font-size: 18px;
            font-weight: 400;
            float: right;
        }

        .invoice-header-area {
            width: 700px;
            margin: 20px auto;
        }

        .invoice-header-title {
            color: #272727;
            font-size: 18px;
            font-weight: 400;
        }

        .invoice-header-desc {
            color: #272727;
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 40px;
        }

        .invoice-header-payment-info {
            color: #272727;
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 40px;
        }

        .invoice-header-orderid {
            color: #000000 !important;
            font-size: 16px !important;
            font-weight: 600 !important;
        }

        .invoice-table {
            width: 700px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .invoice-gross-total {
            display: flex;
            justify-content: space-between;
        }

        .invoice-billing {
            max-width: 700px;
            margin: 0 auto;
        }

        .invoice-billing-content {
            border: 1px solid #ddd;
            padding: 10px 15px;
            margin-bottom: 40px;
        } */

    </style>
</head>

<body>


    <div id="invoice-content-section" style="font-family: Roboto, sans-serif;">
        <div style="width: 700px;margin: 10px auto;">
            <span style="color: #000;font-size: 22px;font-weight: 700;float: left;">Qbits</span>
            <span style="color: #272727;font-size: 18px;font-weight: 400;float: right;">Date: May 30,
                2022</span>
        </div>
        
        <br>
        <div style="width: 700px;margin: 20px auto;">
            <hr>
        </div>
        <!-- <p style="max-width: 700px;margin: 10px auto;border-bottom: 2px solid #ddd !important;text-align: center;">
            <span style="color: #000;font-size: 22px;font-weight: 700;float: left;">Qbits</span>
            <span style="color: #272727;font-size: 18px;font-weight: 400;float: right;">Date: May 30,
                2022</span>
        </p> -->
        <div style="width: 700px;margin: 10px auto;">
            <p class="invoice-header-title" style="color: #272727;font-size: 18px; font-weight: 400;">Hi User,</p>
            <p class="invoice-header-desc"
                style="color: #272727;font-size: 18px; font-weight: 400;margin-bottom: 15px;">Just to let you know,
                we've received your order #655556,and it is now
                being processed:</p>
            <p class="invoice-header-payment-info"
                style="color: #272727;font-size: 18px; font-weight: 400;margin-bottom: 15px;">Pay with cash upon
                delivery.</p>
            <p class="invoice-header-orderid" style="color: #000000;font-size: 16px;font-weight: 600;">[Order
                #655556]</p>
        </div>
        <div style="width: 700px;margin: 0 auto;margin-bottom: 15px;">
            <div class="table-responsive border-bottom">
                <table
                    style="border: 1px solid #ddd;border-width: 1px 0 0 1px !important;border-collapse: collapse;width: 100%;">
                    <thead>
                        <tr>
                            <th width="70%"
                                style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;">
                                Product:</th>
                            <th width="12%"
                                style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;">
                                Quantity</th>
                            <th width="18%"
                                style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;">
                                Price</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                            foreach($orders as $order){
                            $prod_name = App\Models\Product::getProductName($order->product_id);
                            ?>
                        <!-- <tr>
                                <td  width="70%" >{{ $prod_name['name']}}</td>
                                <td  width="12%" >{{ $order->quantity}} Pcs</td>
                                <td  width="18%" >৳ {{number_format($order->price)}}</td>
                            </tr> -->

                        <tr>
                            <td width="70%"
                                style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;">
                                {{$prod_name['name']}}</td>
                            <td width="12%"
                                style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;">
                                {{$order->quantity}} Pcs</td>
                            <td width="18%"
                                style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;">
                                TK {{$order->price}}</td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td width="82%" colspan="2"
                                style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;">
                                Payment Method : </td>
                            <td width="18%"
                                style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;">
                                Cash On Delivery</td>
                        </tr>
                        <tr>
                            <td width="100%" colspan="3"
                                style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                                <p class="invoice-gross-total">

                                    <span style="float: left;">Gross Total : </span>
                                    <span style="float: right;"> Tk {{number_format($amount)}}</span>

                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <?php if(count($orders) > 4){?>
        <div style="height: 170px !important;max-width: 700px;margin: 0 auto;">
            <div style="border: 1px solid #ddd;padding: 10px 15px;margin-bottom: 20px;page-break-before: always;">

                <div>
                    <p>Billing Address</p>
                    <p>271/1, Borobag, Mirpur-2 <br>
                        Dhaka-1216
                    </p>
                    <p>017379745562 <br>
                        showkin@gmail.com
                    </p>
                </div>
            </div>
        </div>
        <?php } else {?>
        <div style="height: 170px !important;max-width: 700px;margin: 0 auto;">
            <div style="border: 1px solid #ddd;padding: 10px 15px;margin-bottom: 20px;">

                <div>
                    <p>Billing Address</p>
                    <p>271/1, Borobag, Mirpur-2 <br>
                        Dhaka-1216
                    </p>
                    <p>017379745562 <br>
                        showkin@gmail.com
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>


    </div>
    </div>

</body>

</html>
