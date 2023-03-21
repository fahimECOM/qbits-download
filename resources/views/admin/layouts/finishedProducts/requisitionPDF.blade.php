<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisition Slip</title>
</head>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .table {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    td,
    th {
        border: 0px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    hr {

        border-left: 0px dotted black;
        border-right: 0px dotted black;
        border-bottom: 1px dotted black;
        border-top: 0px dotted black;
    }

    /* tr:nth-child(even) {
        background-color: #dddddd;
    } */

</style>

<body>
    <table>
        <tr>
            <td width="150">
                <span style=" position: absolute; top: 10px !important;">{!!
                    DNS1D::getBarcodeHTML($rq_info[0]->rq_serial_no,'C128',1,20,'black') !!}</span>
                <span
                    style=" position: relative;margin-left: 50px !important; top: 0px !important; font-size: 8px;">{{$rq_info[0]->rq_serial_no}}</span>
            </td>
            <td width="100">
                <img src="{{public_path('frontend/assets/logo/qbits_logo_black.svg')}}" alt="Qbits Logo"
                    style=" width: 100px;" />
            </td>
            @php
            $today_date = date("d M Y");
            @endphp
            <td width="100">
                <span><i>Date: {{$today_date}}</i></span>
            </td>
        </tr>
    </table>
    <div style="border-bottom: 2px solid #ddd; margin-top: 20px;"></div>
    <section>
        <table>
            <tr>
                <th width="5"></th>
                <th width="100"></th>
                <th width="100"></th>
            </tr>

            <tr>
                <td>Request By</td>

                <td>{{$rq_info[0]['userDetails']['name']}}
                    <hr>
                </td>


            </tr>
            <tr>
                <td>Product</td>
                <td>{{$rq_info[0]->product_type}}
                    <hr>
                </td>
            </tr>
            <tr>
                <td>Product Quantity</td>
                <td>{{$rq_info[0]->quantity}}
                    <hr>
                </td>
            </tr>
            <tr>
                <td>Purpose</td>
                <td>{{$rq_info[0]->comment}}
                    <hr>
                </td>
            </tr>
            <tr>
                <td>Date</td>
                <td>{{date('d M Y' ,strtotime($rq_info[0]->created_at))}}
                    <hr>
                </td>
            </tr>
        </table>
    </section>
    <table>
        <tr>
            <th class="table">SKD Type</th>
            <th class="table">Description</th>
            <th class="table">Quantity</th>
        </tr>
        <tr>
            <td class="table"> RAM </td>
            <td class="table">{{$rq_info[0]->ram_size}} {{$rq_info[0]->ram_type}} {{$rq_info[0]->bus_speed}}</td>
            <td class="table">{{$rq_info[0]->quantity}}</td>
        </tr>
        <tr>
            <td class="table">SSD</td>
            <td class="table">{{$rq_info[0]->ssd_size}} {{$rq_info[0]->ssd_type}} {{$rq_info[0]->m2_type}}</td>
            <td class="table">{{$rq_info[0]->quantity}}</td>
        </tr>
        <tr>
            <td class="table">Barebone</td>
            <td class="table">Core {{$rq_info[0]->bb_processor}} {{$rq_info[0]->bb_type}} {{$rq_info[0]->bb_model}}</td>
            <td class="table">{{$rq_info[0]->quantity}}</td>
        </tr>
    </table>

    <section>
        <table>
            <tr>
                <th width="10">Approved By</th>
                <th width="100">Signature</th>
                <th width="200">Date</th>
            </tr>
            <tr>
                <td>{{$rq_info[0]['userDetails']['name']}} </td>
                <td>
                    <hr>
                </td>

            </tr>
            <tr>
                <td>{{$rq_info[0]['userDetails']['name']}} </td>
                <td>
                    <hr>
                </td>

            </tr>
            <tr>
                <td>{{$rq_info[0]['userDetails']['name']}} </td>
                <td>
                    <hr>
                </td>

            </tr>
        </table>
    </section>

</body>

</html>
