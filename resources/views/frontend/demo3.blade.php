<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  <div class="container">
    <form>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="country">Division</label>
                    <select class="form-control" id="division">
                        <option value="">Select Division</option>
                        <option value="Barishal">Barishal</option>
                        <option value="Chattogram">Chattogram</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Sylhet">Sylhet</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="state">District</label>
                    <select class="form-control" id="district">
                        <option>Select District</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="city">Thana</label>
                    <select class="form-control" id="thana">
                        <option>Select Thana</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="city">SubOffice</label>
                    <select class="form-control" id="sub_office">
                        <option>Select SubOffice</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
  </div>
    
    <script>
        $(document).ready(function(){
            
            $('#division').change(function(){
                var div=$(this).val();
                alert(div);
            });
        });
    </script>
</body>

</html>
