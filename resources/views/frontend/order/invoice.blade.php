<!DOCTYPE html>
<html>
<head>
  <title>Invoice - {{ $order->id }}</title>
  <link rel="stylesheet" href="{{asset('css/admin_style.css')}}">
  <style type="text/css">
    .content-wrapper{
      background: #FFF;
    }
    .invoice-header {
      background: #f7f7f7;
      padding: 10px 20px 10px 20px;
      border-bottom: 3px solid rgb(154, 71, 181);
    }
    .invoice-right-top h3 {
      padding-right: 20px;
      margin-top: 20px;
      color: #ec5d01;
      font-size: 55px;
      font-family: auto;
    }
    .invoice-left-top {
      border-left: 5px solid #ec5d00;
      padding-left: 20px;
      padding-top: 20px;
    }
    thead{
      background: #ec5d01;
      color: #FFF;
    }
    .authority h5{
      margin-top: -10px;
      color: #ec5d01;
    }
    .thanks h4{
      color: #ec5d01;
      font-size: 25px;
      font-weight: normal;
      font-family: serif;
      margin-top: 20px;
    }
    .site-address p{
      line-height: 6px;
      font-weight: 300;
    }
  </style>
</head>
<body>
    <div class="content-wrapper">
        <div class="invoice-header">
          <div class="col-md-12">
            <div class="float-left site-logo">
            <img src="{{ asset('frontend/images/icon/logo_pdf.png') }}" alt="logo" style="height: 50px;width: 50px;">
          </div>
          <div class="float-right site-address">
            <h4>Qbits Ecommerce</h4>
            <p> Address: 793/1 Middle, S Monipur Rd,Dhaka – 1216, Bangladesh.</p>
            <p>Phone: <a href="">+1-415-800-4984</a></p>
            <p>E-Mail:<a href="mailto:info@ecomclips.com">info@ecomclips.com</a></p>
          </div>
          </div>
        </div>
        <div class="invoice-description">
          <div class="invoice-left-top float-left">
            <h6>Invoice To: </h6>
            <h3>{{ $order->user->name }}</h3>
            <div class="address">
              <strong>Adress: </strong>
              {{ $order->shipping_address }}
            </div>
            <p>Phone: {{ $order->user->phone }}</p>
            <p>Email: <a href="mailto:{{ $order->user->email }}">{{ $order->user->email }}</a></p>
          </div>
          <div class="invoice-right-top float-right">
            <h3>Invoice <strong>2020</strong>{{ $order->id }}</h3>
            <p>{{ $order->created_at }}</p>
          </div>
          <div class="clearfix"></div>
        </div>
            <h4>Products </h4>
        @if ($order->carts->count() > 0)
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Product Title</th>
                <th>Product Quantity</th>
                <th>Unit Price</th>
                <th>Sub Total Price</th>
              </tr>
            </thead>
            <tbody>
              @php
                $total_price = 0;
              @endphp
              @foreach ($order->carts as $cart)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>
                    <a href="#">{{ $cart->product->name }}</a>
                  </td>
                  <td>
                    {{ $cart->product_quantity }}
                  </td>
                  <td>
                    {{ $cart->product->price }} Taka
                  </td>
                  <td>
                    @php
                      $total_price += $cart->product->price * $cart->product_quantity;
                    @endphp
                    {{ $cart->product->price * $cart->product_quantity }} Taka
                  </td>
                </tr>
              @endforeach
              <tr>
                <td colspan="3"></td>
                <td style="float: right; border-left: none;">
                  Discount:
                </td>
                <td>
                  <strong>{{ $order->custom_discount }} Taka</strong>
                </td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td style="float: right; border-left: none;">
                  Shipping Cost:
                </td>
                <td>
                  <strong>{{ $order->shipping_charge }} Taka</strong>
                </td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td style="float: right; border-left: none;">
                  Total Amount:
                </td>
                <td>
                  <strong>{{ $total_price + $order->shipping_charge - $order->custom_discount }} Taka</strong>
                </td>
              </tr>
            </tbody>
          </table>
          @endif
          <div class="thanks mt-3">
            <h4>Thanking You For Your Business !!</h4>
          </div>
          <div class="authority float-right mt-5">
            <p>------------------------------------</p>
            <h5 style="margin-left: 17px">Authority Signature</h5>
          </div>
          <div class="clearfix"></div>
      </div>
    <!-- content-wrapper ends -->
</body>
</html>