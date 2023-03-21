<?php
    $global_coupon_details = App\Models\Coupon::where('types',1)->where('coupon_status',1)->first();
    if($global_coupon_details){
        $today = strtotime(date("Y-m-d"));
        $end = strtotime($global_coupon_details->end_at);
        if(($end - $today) >= 0) {
?>
<div class="qbits-menu-bottom" id="cuppon id">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-center">We will offer 5% off. <a href="javascript:void(0)" style="text-decoration: none"
                        onclick="offerCode()">Click for code ></a></p>
            </div>
        </div>
    </div>
</div>
<?php } } ?>
