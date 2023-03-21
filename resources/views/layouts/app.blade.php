<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>qBits</title>
        <!-- font-awesome link  -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <!-- bootstrap link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS link -->
        <link rel="stylesheet" href="scss/style.css">
        
        <!-- Custom js link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Custom CSS link -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    </head>
    <body>
    <section class="qbits-top-menu">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg">
                    <div class="col-sm-2">
                        <div class="qbits-logo">
                            <a href="index.php"><img src="assets/logo/qbits_logo.png" alt="qbits Logo" class="img-responsive"></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item top-menu-list d-flex justify-content-center">
                                    <a class="nav-link" href="sigma.php">Sigma</a>
                                </li>

                                <li class="nav-item top-menu-list d-flex justify-content-center">
                                    <a class="nav-link" href="#">Alpha</a>
                                </li>

                                <li class="nav-item top-menu-list d-flex justify-content-center">
                                    <a class="nav-link" href="#">Caliph</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="top-menu-right">
                           <i class="fa fa-search search-btn" aria-hidden="true"></i>
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div id="searchbar" class="clearfix">
            <form id="searchform" method="get" action="searchpage.php">
                <input type="search" class="form-control" name="myvalue" id="search" placeholder="Search here for what you need?" autocomplete="off">
            </form>
        </div>
    </section>

    <section class="qbits-mobile-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="mobile-responsive-menu">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <div class="qbits-logo">
                                <a href="index.php"><img src="assets/images/mobile/mobile-logo.png" alt="qbits Logo" class="img-responsive"></a>
                            </div>
                            <div class="top-menu-right">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="mobile-middle-menu">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <ul class="top-mobile">
                                <li><a href="sigma.php">Sigma</a></li>
                                <li><a href="#">Alpha</a></li>
                                <li><a href="#">Caliph</a></li>
                            </ul>

                            <ul class="mobile-seconed-mobile">
                                <li><a href="{{ route('driver')}}">Drivers & Manuals</a></li>
                                <li><a href="{{ route('product_registration')}}">Registration</a></li>
                                <li><a href="{{route('warranty')}}">Warrenty</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <script>
        $(document).ready(function() {
            $(".fa-bars").click(function() {
                $(".mobile-middle-menu").toggle();
            });
        });   
    </script> 