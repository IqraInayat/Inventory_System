<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Category</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('website/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('website/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset("website/assets/recaptcha.css") }}">
    <link rel="stylesheet" href="{{ asset("website/assets/web/assets/mobirise-icons2/mobirise2.css") }}">
    <link rel="stylesheet" href="{{ asset("website/assets/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("website/assets/bootstrap/css/bootstrap-grid.min.css") }}">
    <link rel="stylesheet" href="{{ asset("website/assets/bootstrap/css/bootstrap-reboot.min.css") }}">
    <link rel="stylesheet" href="{{ asset("website/assets/dropdown/css/style.css") }}">
    {{-- <link rel="stylesheet" href="{{ asset("website/assets/theme/css/style.css") }}"> --}}
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">
    <link rel="preload" as="style" href="{{asset('website/assets/mobirise/css/mbr-additional.css')}}"><link rel="stylesheet" href="{{asset('website/assets/mobirise/css/mbr-additional.css')}}" type="text/css">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="font-weight-bold border px-3 mr-1">M5</span>Shopp</h1>
                </a>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-dropdown bg-light navbar-expand-lg">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                            <li class="nav-item"><a class="nav-link link text-black display-7" href="{{ route('website')}}">
                                Home</a></li>
                            <li class="nav-item"><a class="nav-link link text-black display-7" href="#">
                                    About us</a></li>
                            <li class="nav-item"><a class="nav-link link text-black display-7" href="#">
                                    Services</a></li>
                            <li class="nav-item"><a class="nav-link link text-black display-7" href="#">
                                Contacts</a></li>  
                        </ul>
                        <div class="text-right">
                            <a href="" class="btn border">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-dark"></span>
                            </a>
                            <a href="{{ url('cart')}}" class="btn border">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-dark"></span>
                            </a>
                        </div>
                        <div class="navbar-buttons mbr-section-btn">
                            <a class="btn btn-black display-7 mx-4" href="#">
                                Buy Now</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-sm d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="align-center align-center mbr-fonts-style mb-0 display-4 mb-3 fw-bold text-light">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        @foreach ($category as $cat)
                            <a href="{{ url('view_category/'. $cat->slug)}}" class="nav-item nav-link">{{ $cat->name }}</a>
                        @endforeach                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($trending_category as $index => $trending)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="height: 410px;">
                            <img src="{{ asset('./admin/catimages/' . $trending->image) }}" alt="{{ $trending->name }}">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">For Fashionable Fabrics</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">All Categories</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($category as $cat)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <a href="{{ url('view_category/'. $cat->slug)}}" class="text-decoration-none">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset('./admin/catimages/' . $cat->image) }}" height="250px" width="250px" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3 fw-bold">{{ $cat->name }}</h6>
                            <p class="text-truncate mb-3">{{ $cat->description }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('website/img/vendor-1.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('website/img/vendor-2.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('website/img/vendor-3.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('website/img/vendor-4.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('website/img/vendor-5.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('website/img/vendor-6.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('website/img/vendor-7.jpg') }}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('website/img/vendor-8.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <!-- Footer Start -->
    <section data-bs-version="5.1" class="footer3 shopm5 cid-tDSC3dE9Wx" once="footers" id="afooter3-c">
        <div class="container">
            <div class="media-container-row mbr-white">
                <div class="col-12">
                    <div class="border-item"></div>
                    <p class="mbr-text mb-0 mbr-fonts-style display-7">
                        © Copyright 2023 Iqra - All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('website/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('website/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('website/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('website/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('website/js/main.js') }}"></script>
</body>

</html>