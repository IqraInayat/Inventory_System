<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Products</title>
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
                            <li class="nav-item"><a class="nav-link link text-black display-7" href="{{ route('category')}}" >
                                Categories</a></li>
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
                    </div>
                </nav>
            </div>                  
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Products Start -->
    <div class="py-3 mb-4 shadow-sm bg-dark border-top">
        <div class="container">
            <h6 class="mb-6 text-light">
                <a href="{{ url('/')}}" class="text-light">Home</a>
                / <a href="{{ url('category')}}" class="text-light">Collections</a>
                / <a href="#" class="text-light">{{ $category->name }}</a> 
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row mt-3 mb-3">
                    <div class="col-lg-6 col-6 text-left">
                        <form action="{{ route('view_category', $category->slug) }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for products by Name" name="query" value="{{ $query ?? '' }}">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> 
                </div> 
            </div>
        </div>
    </div>

    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">{{ $category->name }}</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($product as $prod)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset('./admin/productimages/' . $prod->image) }}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ $prod->name }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs. {{ $prod->selling_price }}</h6><h6 class="text-muted ml-2"><del> Rs. {{ $prod->original_price }}</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center bg-light border">
                        <a href="{{ url('category/'.$category->slug .'/'. $prod->slug) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    </div>
                </div>
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
    <a href="#" type="button" class="btn btn-primary back-to-top" style="width: 40px;"><i class="fa fa-angle-double-up align-center"></i></a>


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