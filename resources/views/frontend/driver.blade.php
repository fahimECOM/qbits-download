@extends('frontend.layouts.master')
@section('title','Driver')
@section('content')
<style>
    tr.border-bottom {
        border-bottom: 1px solid #f8f8f800 !important;
    }

    .driver_heading {
        color: #707070;
        font-size: 22px;
        font-weight: 500;
        line-height: 36px;
        font-family: "Roboto", sans-serif;
        margin-bottom: -10px;
    }

    .driver-laptop img {
        color: #272727 !important;
        opacity: 0.5;
    }

    .desktop-lap-icon-image {
        width: 30px;
        height: 22px;

    }

    .desktop-windows-icon-image {
        width: 22px;
        height: 22px;
    }

    .driver-field {
        max-width: 986px;
        margin: 0 auto;
        padding-bottom: 20px;
    }

    .driver-table {
        max-width: 986px !important;
        margin: 0 auto;
        overflow: auto;
    }

    .driver-area-section .all-driver-section .driver-table tbody tr td:nth-child(1) {
        width: 680px;
    }

    .driver-table-header {
        color: #707070 !important;
        font-size: 16px !important;
        font-weight: 500 !important;
        line-height: 21px;
        font-family: "Roboto", sans-serif;

    }

    .driver-table-data {
        color: #272727 !important;
        font-size: 16px !important;
        font-weight: 400 !important;
        line-height: 21px;
        font-family: "Roboto", sans-serif;
        padding-bottom: 20px !important;

    }

    .driver-severity-data {
        background: #DDF0FF;
        border-radius: 50px;
        text-align: center;
        padding: 10px 15px !important;
        color: #2699FB !important;
    }

    .driver-image-section {
        padding-top: 15px;
    }

    .driver-severity-data-urgent {
        background: #B4DCFC;
        border-radius: 50px;
        text-align: center;
        padding: 10px 15px !important;
        color: #2699FB !important;
    }

    .driver-download {
        background: #0071E3 !important;
        border-radius: 50px;
        text-align: center;
        padding: 10px 15px !important;
        color: #fff !important;
    }

    .form-check-input[type=radio] {
        border-radius: 0;
    }

    .form-check-input:checked[type=radio] {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
    }

    #sigma_driver_table {
        display: none;
    }

    #lania_driver_table {
        display: none;
    }

    .sigma-model-image {
        display: none;
        width: 100%;
        max-height: 391px;
        /* height: 100%; */
    }

    .lania-model-image {
        display: none;
        width: 100%;
        max-height: 391px;
        /* height: 100%; */

    }

</style>
<Section class="qbits-top-middle">
    <div class="container">
        <div class="middle-qbits-menu">
            <div class="row">
                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-start active-nav">
                        <a class="active-nav" href="{{ route('driver')}}">Drivers & Manuals</a>
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
</Section>
@include('frontend.discount')
<div class="driver-area-section">
    <div class="container driver-field">
        <div class="row">


            <div class="driver-seaction">

                <div class="col-md-10 col-sm-12">
                    <p class="driver_heading">Qbits Driver &#38; Manuals</p>
                    <div class="driver-laptop">
                        {{-- <div>
                            <img src="{{ asset('frontend/assets/Icons/icon_lap.png') }}" alt="Sigma Laptop"
                        class="desktop-lap-icon-image">
                        <div class="btn-group">
                            <button type="button" class="btn model-list dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Choose a Product
                            </button>
                            <ul class="dropdown-menu model-list-menu">
                                <li><a class="dropdown-item sigma-model" href="#">Sigma - 15</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item alpha-model" href="#">Alpha - 13</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item caliph-model" href="#">Caliph - 15</a></li>

                            </ul>
                            <select name="model" id="product_model" class="model-list">
                                <div class="model-list-menu">
                                    <option value="0" selected>
                                        <li>Choose a Product</li>
                                    </option>
                                    <option value="1">
                                        <li class="sigma-model">Sigma - 15</li>
                                    </option>
                                    <!-- <option value="2"><li class="alpha-model">Alpha - 13</li></option> -->
                                    <!-- <option value="3"><li class="caliph-model">Caliph - 15</li></option> -->
                                </div>
                            </select>
                        </div>
                    </div>

                    <div>
                        <img src="{{ asset('frontend/assets/Icons/windows_icon.png') }}" alt="Sigma Laptop"
                            class="desktop-windows-icon-image">
                        <div class="btn-group">
                            <button type="button" class="btn os-list dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Choose a Operating System
                            </button>
                            <ul class="dropdown-menu os-list-menu">
                                <li><a class="dropdown-item" href="#">Windows 10(64-bit)</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Windows 10(32-bit)</a></li>
                            </ul>

                            <select name="model" id="model-select" class="os-list">
                                <div class="os-list-menu">
                                    <option value="">
                                        <li>Choose a Operating System</li>
                                    </option>
                                    <option value="Windows 10(64-bit)">
                                        <li>Windows 10(64-bit)</li>
                                    </option>
                                    <option value="Windows 10(32-bit)">
                                        <li>Windows 10(32-bit)</li>
                                    </option>
                                </div>
                            </select>
                        </div>
                    </div> --}}

                    {{-- New --}}
                    <div>
                        <div class="form-check mb-1">
                            <input type="radio" class="form-check-input" id="sigma-driver" name="driver" value="1">
                            <label class="form-check-label" for="category" style="float: left;">Sigma 15</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="lania-driver" name="driver" value="2">
                            <label class="form-check-label" for="category" style="float: left;">Lania</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-12 driver-image-section">
                <div class="sigma-model-image">
                    <img style="" src="{{ asset('frontend/assets/images/mobile/sigma.png') }}"
                        class="driver-laptop-image" alt="sigma model">
                </div>
                <div class="lania-model-image">
                    <img style="" src="{{ asset('frontend/assets/images/mobile/lania.png') }}"
                        class="driver-laptop-image" alt="lania model">
                </div>
                <div class="alpha-model-image">
                    <img src="{{ asset('frontend/assets/images/alpha-model.png') }}" class="driver-laptop-image"
                        alt="alpha-model">
                </div>
                <div class="caliph-model-image">
                    <img src="{{ asset('frontend/assets/images/caliph-model.png') }}" class="driver-laptop-image"
                        alt="caliph-model">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="all-driver-section">
    <div class="container driver-table">

        <table class="table driver-table table-responsive" id="all_driver_table">
            <thead style="border-bottom: 2px solid #70707033 !important;padding-bottom: 10px;">
                <tr>
                    <th width="65%" style="min-width:300px ;" class="driver-table-header" scope="col">NAME</th>
                    <th width="10%" style="min-width: 151px;" class="driver-table-header" scope="col">RELEASE DATE</th>
                    <th width="15%" style="min-width: 136px;" class="driver-table-header" scope="col">SIZE</th>
                    <th width="10%" style="min-width:20px" class="driver-table-header" scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <td><img src="{{ asset('frontend/assets/Icons/play.png') }}" alt="Sigma Laptop " class="playbtn-image"><span class="table-column-value">Qbits Alpha Notebook System BIOS Update (P85,P91)</span></td> -->
                    <td width="65%"><span class="table-column-value driver-table-data">Sigma-15 Realtek Bluetooth Driver
                            for Windows 10 (64-bit)</span></td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">20 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Sigma-15%20Realtek%20Bluetooth%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data"><span class="table-column-value">Sigma-15 Intel(R) Chipset
                            Device Driver for Windows 10 (64-bit)</span></td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">3.35 MB</td>
                    <td width="10%" class="driver-table-data">
                        <a href="https://drivers.myqbits.com/Sigma-15%20Intel(R)%20Chipset%20Device%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a>
                    </td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Sigma-15 Intel Converged Security and Manageability Engine
                        (CSME) Driver for Windows 10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">308 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Sigma-15%20Intel%20Converged%20Security%20and%20Manageability%20Engine%20(CSME)%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Sigma-15 Fingerprint Driver for Windows 10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">0.46 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Sigma-15%20Fingerprint%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Sigma-15 Intel® UHD Graphics Graphics Driver for Windows
                        10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">371 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Sigma-15%20Intel%c2%ae%20UHD%20Graphics%20Graphics%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Sigma-15 Intel Serial IO Driver for Windows 10 (64-bit)
                    </td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">2.68 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Sigma-15%20Intel%20Serial%20IO%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Sigma-15 Realtek 8821CE Wireless LAN 802.11ac PCI-E NIC
                        Driver for Windows 10</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">7.29 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Sigma-15%20Realtek%208821CE%20Wireless%20LAN%20802.11ac%20PCI-E%20NIC%20Driver%20for%20Windows%2010.zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>

                <tr>
                    <!-- <td><img src="{{ asset('frontend/assets/Icons/play.png') }}" alt="Sigma Laptop " class="playbtn-image"><span class="table-column-value">Qbits Alpha Notebook System BIOS Update (P85,P91)</span></td> -->
                    <td width="65%" class="driver-table-data">Lania- Intel® Smart Sound Technology (Intel® SST) Driver
                        for Windows 10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">536 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Intel%c2%ae%20Smart%20Sound%20Technology%20(Intel%c2%ae%20SST)%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- Intel® Chipset Device Driver for Windows 10 (64-bit)
                    </td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">3.43 MB</td>
                    <td width="10%" class="driver-table-data">
                        <a href="https://drivers.myqbits.com/Lania-%20Inte%c2%ae%20Chipset%20Device%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a>
                    </td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- Intel Converged Security and Manageability Engine
                        (CSME) Driver for Windows 10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">659 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Intel%20Converged%20Security%20and%20Manageability%20Engine%20(CSME)%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- ESAPO Driver for Windows 10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">0.589 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Everest%20ESAuDriver%20Device%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- Everest ESAuDriver Device Driver for Windows 10
                        (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">0.096 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Everest%20ESAuDriver%20Device%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- Intel® Iris® Xe Graphics Driver for Windows 10
                        (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">414 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Intel%c2%ae%20Iris%c2%ae%20Xe%20Graphics%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- Intel HID Event Filter Driver for Windows 10
                        (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">1.67 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Intel%20HID%20Event%20Filter%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- Intel Serial IO Driver for Windows 10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">2.63 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Intel%20Serial%20IO%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr class="border-bottom">
                    <td width="65%" class="driver-table-data">Lania- Intel Thunderbolt DCH Driver for Windows 10
                        (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">206 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Intel%20Thunderbolt%20DCH%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
            </tbody>
        </table>

        <table class="table driver-table table-responsive" id="sigma_driver_table">
            <thead style="border-bottom: 2px solid #70707033 !important;padding-bottom: 10px;">
                <tr>
                    <th width="65%" style="min-width:300px ;" class="driver-table-header" scope="col">NAME</th>
                    <th width="10%" style="min-width: 151px;" class="driver-table-header" scope="col">RELEASE DATE</th>
                    <th width="15%" style="min-width: 136px;" class="driver-table-header" scope="col">Size</th>
                    <th width="10%" style="min-width:20px" class="driver-table-header" scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <td><img src="{{ asset('frontend/assets/Icons/play.png') }}" alt="Sigma Laptop " class="playbtn-image"><span class="table-column-value">Qbits Alpha Notebook System BIOS Update (P85,P91)</span></td> -->
                    <td width="65%"><span class="table-column-value driver-table-data">Sigma-15 Realtek Bluetooth Driver
                            for Windows 10 (64-bit)</span></td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">20 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Sigma-15%20Realtek%20Bluetooth%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data"><span class="table-column-value">Sigma-15 Intel(R) Chipset
                            Device Driver for Windows 10 (64-bit)</span></td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">3.35 MB</td>
                    <td width="10%" class="driver-table-data">
                        <a href="https://drivers.myqbits.com/Sigma-15%20Intel(R)%20Chipset%20Device%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a>
                    </td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Sigma-15 Intel Converged Security and Manageability Engine
                        (CSME) Driver for Windows 10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">308 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Sigma-15%20Intel%20Converged%20Security%20and%20Manageability%20Engine%20(CSME)%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Sigma-15 Fingerprint Driver for Windows 10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">0.46 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Sigma-15%20Fingerprint%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Sigma-15 Intel® UHD Graphics Graphics Driver for Windows
                        10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">371 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Sigma-15%20Intel%c2%ae%20UHD%20Graphics%20Graphics%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Sigma-15 Intel Serial IO Driver for Windows 10 (64-bit)
                    </td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">2.68 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Sigma-15%20Intel%20Serial%20IO%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr class="border-bottom">
                    <td width="65%" class="driver-table-data">Sigma-15 Realtek 8821CE Wireless LAN 802.11ac PCI-E NIC
                        Driver for Windows 10</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">7.29 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Sigma-15%20Realtek%208821CE%20Wireless%20LAN%20802.11ac%20PCI-E%20NIC%20Driver%20for%20Windows%2010.zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
            </tbody>
        </table>

        <table class="table driver-table table-responsive" id="lania_driver_table">
            <thead style="border-bottom: 2px solid #70707033 !important;padding-bottom: 10px;">
                <tr>
                    <th width="65%" style="min-width:300px ;" class="driver-table-header" scope="col">NAME</th>
                    <th width="10%" style="min-width: 151px;" class="driver-table-header" scope="col">RELEASE DATE</th>
                    <th width="15%" style="min-width: 136px;" class="driver-table-header" scope="col">Size</th>
                    <th width="10%" style="min-width:20px" class="driver-table-header" scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <td><img src="{{ asset('frontend/assets/Icons/play.png') }}" alt="Sigma Laptop " class="playbtn-image"><span class="table-column-value">Qbits Alpha Notebook System BIOS Update (P85,P91)</span></td> -->
                    <td width="65%" class="driver-table-data">Lania- Intel® Smart Sound Technology (Intel® SST) Driver
                        for Windows 10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">536 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Intel%c2%ae%20Smart%20Sound%20Technology%20(Intel%c2%ae%20SST)%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- Intel® Chipset Device Driver for Windows 10 (64-bit)
                    </td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">3.43 MB</td>
                    <td width="10%" class="driver-table-data">
                        <a href="https://drivers.myqbits.com/Lania-%20Inte%c2%ae%20Chipset%20Device%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a>
                    </td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- Intel Converged Security and Manageability Engine
                        (CSME) Driver for Windows 10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">659 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Intel%20Converged%20Security%20and%20Manageability%20Engine%20(CSME)%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- ESAPO Driver for Windows 10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">0.589 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Everest%20ESAuDriver%20Device%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- Everest ESAuDriver Device Driver for Windows 10
                        (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">0.096 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Everest%20ESAuDriver%20Device%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- Intel® Iris® Xe Graphics Driver for Windows 10
                        (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">414 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Intel%c2%ae%20Iris%c2%ae%20Xe%20Graphics%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- Intel HID Event Filter Driver for Windows 10
                        (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">1.67 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Intel%20HID%20Event%20Filter%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr>
                    <td width="65%" class="driver-table-data">Lania- Intel Serial IO Driver for Windows 10 (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">2.63 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Intel%20Serial%20IO%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
                <tr class="border-bottom">
                    <td width="65%" class="driver-table-data">Lania- Intel Thunderbolt DCH Driver for Windows 10
                        (64-bit)</td>
                    <td width="25%" class="driver-table-data">19 Apr 2022</td>
                    <td width="25%" class="driver-table-data">206 MB</td>
                    <td width="10%" class="driver-table-data"><a
                            href="https://drivers.myqbits.com/Lania-%20Intel%20Thunderbolt%20DCH%20Driver%20for%20Windows%2010%20(64-bit).zip"
                            style="text-decoration: none;"><span class="driver-download">Download</span></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>


<script>
    $(document).ready(function () {
        $(".search-btn").hover(function (e) {
            $("#searchbar").fadeIn("active");
        });
    });
    $("#searchbar").on("mouseleave", function () {
        $(this).fadeToggle(400);
    });

    $(document).ready(function () {
        $('#product_model').on('change', function () {

            if (this.value == '0') {
                $(".sigma-model-image").hide();
                $(".alpha-model-image").hide();
                $(".caliph-model-image").hide();

                $("#sigma_driver_table").show();
                // console.log("Hello Sigma");
            } else if (this.value == '1') {
                $(".sigma-model-image").show();
                $(".alpha-model-image").hide();
                $(".caliph-model-image").hide();

                $("#sigma_driver_table").show();
                // $("#caliph_driver_table").hide();
                // $("#alpha_driver_table").hide();
                // console.log("Hello Sigma");
            } else if (this.value == '2') {
                $(".alpha-model-image").show();
                $(".sigma-model-image").hide();
                $(".caliph-model-image").hide();

                // $("#sigma_driver_table").show();
                // $("#caliph_driver_table").hide();
                // $("#alpha_driver_table").hide();
            } else if (this.value == '3') {
                $(".caliph-model-image").show();
                $(".alpha-model-image").hide();
                $(".sigma-model-image").hide();

                $("#sigma_driver_table").hide();
                $("#caliph_driver_table").show();
                // $("#alpha_driver_table").hide();
            }
        });

        $('input[name=driver]').on('change', function () {
            var value = $('input[name=driver]:checked').val();
            if (value == 1) {
                $('.sigma-model-image').show();
                $('.lania-model-image').hide();
                $("#all_driver_table").hide();
                $("#sigma_driver_table").show();
                $("#lania_driver_table").hide();
            } else if (value == 2) {
                $('.sigma-model-image').hide();
                $('.lania-model-image').show();
                $("#all_driver_table").hide();
                $("#sigma_driver_table").hide();
                $("#lania_driver_table").show();
            } else {
                $('.sigma-model-image').hide();
                $('.lania-model-image').hide();
                $("#all_driver_table").show();
                $("#sigma_driver_table").hide();
                $("#lania_driver_table").hide();
            }
        });
    });




    // $(document).ready(function() {
    //     $("#model-select").click(function() {

    //         $(".sigma-model-image").toggle();
    //     });

    //     $(".alpha-model").click(function() {
    //         $(".alpha-model-image").toggle();
    //     });

    //     $(".caliph-model").click(function() {
    //         $(".caliph-model-image").toggle();
    //     });

    // });




    // $(document).ready(function() {
    //     $(".alpha-model").hover(function() {
    //         $(".alpha-model-image").fadeIn();
    //     });
    // });

    // $(document).ready(function() {
    //     $(".caliph-model").hover(function() {
    //         $(".caliph-model-image").fadeIn();
    //     });
    // });

</script>

@endsection
