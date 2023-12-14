<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>My Cart</title> 
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
    <div class="py-3 mb-4 shadow-sm bg-dark border-top">
        <div class="container">
            <h6 class="mb-0 text-light"> 
                <a href="{{ route('website')}}" class="text-light">Home</a> /
                <a href="{{ url('cart')}}" class="text-light">Cart</a>
            </h6>
        </div>
    </div>

    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
              @if($cart_items->count() > 0)
              <div class="card shadow card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body p-0">
                  <div class="row g-0">
                    <div class="col-lg-8">
                      <div class="p-5">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                          <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                        </div>
                        <hr class="my-4">
                        {{-- total price code --}}
                        @php
                            $total_price = 0;
                        @endphp
                        @foreach ($cart_items as $item)
                        <div class="row product_data mb-4 d-flex justify-content-between align-items-center">
                          <div class="col-md-2 col-lg-2 col-xl-2">
                            <img
                              src="{{ asset('./admin/productimages/' . $item->products->image ) }}"
                              class="img-fluid rounded-3" alt="Image Here">
                          </div>
                          <div class="col-md-3 col-lg-3 col-xl-3">
                            <h6 class="text-muted">Product Name</h6>
                            <h6 class="text-black mb-0">{{ $item->products->name }}</h6>
                          </div>
                          <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                            <h6 class="mb-0">Rs. {{ $item->products->selling_price }}</h6>
                          </div>
                          <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                             <input type="hidden" class="prod_id" value="{{ $item->product_id }}">
                             {{-- @if($item->products->quantity > $item->product_qty) --}}
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text changeQuantity decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control qty-input text-center" value="{{$item->product_qty}}">
                                    <button class="input-group-text changeQuantity increment-btn">+</button>
                                </div> 
                              {{-- @else
                                <h6>Out of Stock</h6>
                              @endif --}}
                          </div>
                          <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <a href="" class="text-muted delete-cart-item"><i class="fas fa-times"></i></a>
                          </div>
                        </div>
                        <hr class="my-4">
                        {{-- total price php code --}}
                        @php
                        $total_price += $item->products->selling_price * $item->product_qty;
                        @endphp
                        @endforeach
      
                        <div class="pt-5">
                          <h6 class="mb-0"><a href="{{ route('website') }}" class="text-body"><i
                                class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 bg-grey">
                      <div class="p-5">
                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                        <hr class="my-4">
      
                        <div class="d-flex justify-content-between mb-4">
                          <h5 class="text-uppercase" id="cart-count">Items Total Price : </h5>
                          <h5>Rs. {{ $total_price }}</h5>
                        </div>
      
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="text-uppercase" id="cart-count">Delivery Charges :</h5>
                            <h5>Rs. 500</h5>
                        </div>

                        @php
                            $grand_total = $total_price + 500;
                        @endphp
      
                        <hr class="my-4">
      
                        <div class="d-flex justify-content-between mb-5">
                          <h5 class="text-uppercase">Total price</h5>
                          <h5>Rs. {{ $grand_total }}</h5>
                        </div>
      
                        <a type="button" class="btn btn-dark btn-block btn-lg" href="{{ url('checkout')}}"
                          data-mdb-ripple-color="dark">Proceed to CheckOut</a>
      
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @else
              <div class="card-body text-center min-vh-100">
                <h2>Your <i class="fa fa-shopping-cart"></i> Cart is Empty</h2>
                <a href="{{ url('category')}}">Continue Shopping</a>
              </div>
              @endif
            </div>
          </div>
        </div>
    </section>
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