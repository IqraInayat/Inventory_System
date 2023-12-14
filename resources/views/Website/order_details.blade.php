<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>My Orders</title> 
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h2 class="fw-bold mt-2 mb-3 text-center">View Order</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="fw-bold">Shipping Details</h3>
                                <label for="" class="fw-bold mt-3">First Name</label>
                                <div class="border p-2">{{$orders->fname}}</div>
                                <label for="" class="fw-bold mt-3">Last Name</label>
                                <div class="border p-2">{{$orders->lname}}</div>
                                <label for="" class="fw-bold mt-3">Email</label>
                                <div class="border p-2">{{$orders->email}}</div>
                                <label for="" class="fw-bold mt-3">Contact No</label>
                                <div class="border p-2">{{$orders->phone}}</div>
                                <label for="" class="fw-bold mt-3">Shipping Address</label>
                                <div class="border p-2">
                                    {{$orders->address1}},
                                    {{$orders->address2}},
                                    {{$orders->city}},
                                    {{$orders->state}},
                                    {{$orders->country}},
                                </div>
                                <label for="" class="fw-bold mt-3">Zip Code</label>
                                <div class="border p-2">{{$orders->pincode}}</div>
                                <label for="" class="fw-bold mt-3">Order By:</label>
                                <div class="border p-2">{{$orders->order_by}}</div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="fw-bold">Order Details</h3>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset('./admin/productimages/' . $item->products->image) }}" width="70px" height="60px" alt="Product Image">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <th>Grand Total: Rs. {{ $orders->total_price}}</th>
                                    </tfoot>
                                </table>
                                    <a href="{{ url('my-orders')}}" class="btn btn-danger mt-3 float-right">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End of Content Section --}}

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