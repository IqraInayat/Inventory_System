<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Checkout</title> 
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link href="{{ asset('website/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('website/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    {{-- swal define --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10"> --}}

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset("website/assets/recaptcha.css") }}">
    <link rel="stylesheet" href="{{asset('website/fontawesome-free-6.4.2-web/css/all.min.css')}}">
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
            <div class="col-lg-2 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="font-weight-bold border px-3 mr-1">M5</span>Shopp</h1>
                </a>
            </div>
            <div class="col-lg-10">
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
                        <div class=" text-right">
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

    {{-- Content Section --}}
     <div class="container-fluid bg-dark mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 150px">
            <h1 class="font-weight-semi-bold text-light text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <a href="{{ route('website')}}" class="text-light">Home / </a> 
                <a href="{{ url('cart')}}" class="text-light"> Cart / </a> 
                <a href="{{ url('checkout')}}" class="text-light"> Checkout</a> 
            </div>
        </div>
    </div>


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <form action="{{ url('place-order')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row px-xl-5">
            <div class="col-lg-8 shadow">
                <div class="mb-4">
                    <h3 class="font-weight-semi-bold mb-4 mt-3">Billing Address</h3>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" name="fname" type="text" placeholder="First Name" value="{{ old('fname') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" name="lname" type="text" placeholder="Last Name" value="{{ old('lname') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="email" type="text" placeholder="example@email.com" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" name="phone" type="text" placeholder="+123 456 789" value="{{ old('phone') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" name="address1" type="text" placeholder="123 Street" value="{{ old('address1') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" name="address2" type="text" placeholder="123 Street" value="{{ old('address2') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" name="country">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                                <option>Pakistan</option>
                                <option>Korea</option>
                                <option>Canada</option>

                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" name="city" type="text" placeholder="City" value="{{ old('city') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" name="state" type="text" placeholder="State" value="{{ old('state') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" name="pincode" type="text" placeholder="123" value="{{ old('pincode') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 shadow-sm">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-dark border-0">
                        <h4 class="font-weight-semi-bold m-0 text-light">Order Total</h4>
                    </div>
                    @if($cart_items->count() > 0)
                    @php
                        $total_price = 0;
                    @endphp
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <div class="d-flex justify-content-between fw-bold">
                            <p>Name</p>
                            <p>Qty.</p>
                            <p>Rs.</p>
                        </div>
                        @foreach ($cart_items as $item)
                        <div class="d-flex justify-content-between">
                            <p>{{ $item->products->name }}</p>
                            <p>{{ $item->product_qty }}</p>
                            <p>{{ $item->products->selling_price }}</p>
                        </div>
                        @php
                        $total_price += $item->products->selling_price * $item->product_qty;
                        @endphp
                        @endforeach
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{ $total_price }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rs. 500</h6>
                        </div>

                        @php
                            $grand_total = $total_price + 500;
                        @endphp
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{ $grand_total }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-dark border-0">
                        <h4 class="font-weight-semi-bold m-0 text-light">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" name="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
                @else
                    <div class="card-body text-center min-vh-100">
                        <h2>Your Cart is Empty</h2>
                    </div>
                @endif
            </div>
        </div>
        </form>
    </div>
    <!-- Checkout End -->

    <br>
    {{-- End of Content Section --}}

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
    <script src="{{asset('website/js/custom.js')}}"></script>

    {{-- swal --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
</body>

</html>