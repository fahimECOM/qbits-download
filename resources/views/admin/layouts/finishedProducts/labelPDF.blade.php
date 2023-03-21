<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Box Label</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
    }

    h2 {
        font-size: 12px;
        padding: 4px 0px 4px 0px;
        font-weight: 900;
    }

    span {
        font-size: 9px;
        padding: 0px 60px 0px 0px;
    }

    p {
        font-size: 8px;
        margin-left: 3px;
    }

</style>



<body style="border: 1px solid black; border-radius: 15px; margin: 6px; padding: 5px 0px 0px 7px;">
    <section>
        <table>

            <tr style="padding-top: 5px;">
                <td width="65">
                    <img src="{{public_path('frontend/assets/logo/qbits_logo_black.svg')}}" alt="Qbits Logo"
                        style="display: block; width: 60px;" />
                </td>
                <td width="45">
                    <h2 style="margin-top: -12px; font-size: 11px;">Sigma 15</h2>
                </td>
                <td width="120">
                    <h2 style="margin-top: -12px ; font-size: 11px;">Model: <span style="font-weight:400;">{{$prod_model}}</span></h2>
                </td>
            </tr>
        </table>
    </section>
    <section>
        <table>
            <tr>
                <td width="88">
                    <h2 style="margin-top: -5px; font-size: 11px;">Performance</h2>
                </td>
                <td width="130">
                    <h2 style="margin-top: -5px ; font-size: 10px;">SKU: <span style="font-weight:400;">{{$sku}}</span></h2>
                </td>
            </tr>
        </table>
        @if($processor == 'i3')
        <span>
            <p>Intel® Core™ i3-1005G1 Processor, 1.2 GHz up to 3.4 GHz</p>
            <p>4MB Intel® Smart Cache, 2 Cores, 4 Threads</p>
            <p>8GB DDR4 3200Mhz Memory</p>
            <p>512GB M.2 NVMe Solid State Drive</p>
            <p>Intel® UHD Graphics, 15.6’’ IPS 1920 x 1080 Pixels LCD</p>
        </span>
        @elseif($processor == 'i5')
        <span>
            <p>Intel® Core™ i5-1035G1 Processor, 1.0 GHz up to 3.6 GHz</p>
            <p>6MB Intel® Smart Cache, 4 Cores, 8 Threads</p>
            <p>8GB DDR4 3200Mhz Memory</p>
            <p>512GB M.2 NVMe Solid State Drive</p>
            <p>Intel® UHD Graphics, 15.6’’ IPS 1920 x 1080 Pixels LCD</p>
        </span>
        @elseif($processor == 'i7')
        <span>
            <p>Intel® Core™ i7-1065G7 Processor, 1.3 GHz up to 3.9 GHz</p>
            <p>8MB Intel® Smart Cache, 4 Cores, 8 Threads</p>
            <p>8GB DDR4 3200Mhz Memory</p>
            <p>512GB M.2 NVMe Solid State Drive</p>
            <p>Intel® Iris® Plus Graphics, 15.6’’ IPS 1920 x 1080 Pixels LCD</p>
        @else
        <span>
            <p>Intel® Core™ i5-1035G1 Processor, 1.0 GHz up to 3.6 GHz</p>
            <p>6MB Intel® Smart Cache, 4 Cores, 8 Threads</p>
            <p>8GB DDR4 3200Mhz Memory</p>
            <p>512GB M.2 NVMe Solid State Drive</p>
            <p>Intel® UHD Graphics, 15.6’’ IPS 1920 x 1080 Pixels LCD</p>
        @endif
        <h2 style="margin-left: 3px;">Includes</h2>
        <p>
            M.2 Interface, Dual Band Wireless-Realtek 8821CE +
            Bluetooth 5.0
        <br>
            720p Webcam
        <br>
            Battery, 3800mAH / 43.89WH
        <br>
            1 x HDMI, 2 x USB 3.1 & 1 x USB 2.0
        <br>
            1 x Type -C Port, 1 x Ethernet/RJ-45
        <br>
            1 x 3.5 mm Headphone/Mic Jack
        </p>
    
        <h2 style="margin-left: 3px;">2 Year Limited Hardware Warranty:</h2>
        <p>For warranty information, please visit our website:</p>
        <p>www.myqbits.com/warranty</p>
        <h2 style="margin-top: 5px;">Serial No:</h2> <span style=" position: relative; left:65px; bottom: 20px;">{!!
            DNS1D::getBarcodeHTML($barcodes,'C128',1.4,36,'#000000') !!}</span>
        <span style=" position: relative; left:140px; bottom: 25px ">{{$barcodes}}</span>
        <h2 style="margin:0; padding: 0;">UPC No:</h2>
        <img src="{{public_path('leaser/sigma_'.$processor.'_upc.svg')}}" alt="Sigma 15 UPC"
            style="display: block; width: 140px; position: relative; left:65px; margin-top: -30px;" />
        @if($processor == 'i3')
        <div style="display: flex; flex-direction: row;margin-top: -25px;padding: 0; margin-left: 60px;"> <span
                style="margin: 0;padding: 0;">3</span>
            <span style="margin: 0px 0px 0px 10px;padding: 0;">793634</span> <span
                style="margin: 0px 0px 0px 20px;padding: 0;">
                102512</span></div>
        @elseif($processor == 'i5')
        <div style="display: flex; flex-direction: row;margin-top: -25px;padding: 0; margin-left: 60px;"> <span
                style="margin: 0;padding: 0;">3</span>
            <span style="margin: 0px 0px 0px 10px;padding: 0;">793634</span> <span
                style="margin: 0px 0px 0px 20px;padding: 0;">
                102529</span></div>
        @elseif($processor == 'i7')
        <div style="display: flex; flex-direction: row;margin-top: -25px;padding: 0; margin-left: 60px;"> <span
                style="margin: 0;padding: 0;">3</span>
            <span style="margin: 0px 0px 0px 10px;padding: 0;">793634</span> <span
                style="margin: 0px 0px 0px 20px;padding: 0;">
                102536</span></div>
        @else
        <div style="display: flex; flex-direction: row;margin-top: -25px;padding: 0; margin-left: 60px;"> <span
                style="margin: 0;padding: 0;">3</span>
            <span style="margin: 0px 0px 0px 10px;padding: 0;">793624</span> <span
                style="margin: 0px 0px 0px 20px;padding: 0;">
                182487</span></div>
        @endif
    </section>


</body>

</html>
