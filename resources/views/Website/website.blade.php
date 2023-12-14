<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="generator" content="Mobirise v5.6.10, mobirise.com">
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image:src" content="">
    <meta property="og:image" content="">
    <meta name="twitter:title" content="Home">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1"> -->
    <link rel="shortcut icon" href="{{ asset("website/assets/images/logo1.png") }}" type="image/x-icon">
    <meta name="description" content="">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset("website/assets/web/assets/mobirise-icons2/mobirise2.css") }}">
    <link rel="stylesheet" href="{{ asset("website/assets/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("website/assets/bootstrap/css/bootstrap-grid.min.css") }}">
    <link rel="stylesheet" href="{{ asset("website/assets/bootstrap/css/bootstrap-reboot.min.css") }}">
    <link rel="stylesheet" href="{{ asset("website/assets/dropdown/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("website/assets/theme/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("website/assets/recaptcha.css") }}">
    <link rel="stylesheet" href="{{asset('website/fontawesome-free-6.4.2-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/owl.carousel.min.css')}}">
    <link href="{{ asset('website/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap&display=swap"></noscript>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Schibsted+Grotesk:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Schibsted+Grotesk:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap&display=swap"></noscript>
    <link rel="preload" as="style" href="{{asset('website/assets/mobirise/css/mbr-additional.css')}}"><link rel="stylesheet" href="{{asset('website/assets/mobirise/css/mbr-additional.css')}}" type="text/css">
  
</head>
<body>
    <section data-bs-version="5.1" class="menu menu1 shopm5 cid-tDSzbWjUPA" once="menu" id="amenu1-0">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="https://mobiri.se">
                        <img src="{{ asset("website/assets/images/logo1.png") }}" alt="Mobirise Website Builder" style="height: 2rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-5" href="https://mobiri.se">ShopM5</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-black display-7" href="#">
                            About us</a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-7" href="#">
                            Services</a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-7" href="{{ route('category')}}">
                        Cotegories</a></li>
                    

                        {{-- Here is conditions for login/register and dashboard options --}}
                    @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            {{-- Show user name  --}}
                            <a id="navbarDropdown" class="nav-link link text-black display-7 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>&nbsp; {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {{-- if the usertype is admin --}}
                                @if(auth()->user()->usertype === 'admin')
                                <a class="dropdown-item" href="{{ route('logged_user_table') }}">
                                    <i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard
                                </a>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user"></i> &nbsp; Profile
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i>&nbsp; Logout
                                    </button>
                                </form>
                                {{-- if the usertype is staff --}}
                                @elseif(auth()->user()->usertype === 'staff')
                                <a class="dropdown-item" href="{{ route('staff') }}">
                                    <i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard
                                </a>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user"></i> &nbsp; Profile
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i>&nbsp; Logout
                                    </button>
                                </form>
                                {{-- if the usertype is user --}}
                                @elseif(auth()->user()->usertype === 'user')
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user"></i> &nbsp; Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('user_order') }}">
                                    <i class="fas fa-user"></i> &nbsp; My Orders
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i>&nbsp; Logout
                                    </button>
                                </form>
                                @endif
                            </div>
                        </li>
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link link text-black display-7">Log in</a></li>

                            @if (Route::has('register'))
                                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link link text-black display-7">Register</a></li>
                            @endif
                        @endauth
                        @endif   
                </ul>
                <div class="text-right d-flex">
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
                    <a class="btn btn-black display-7" href="{{ route('category')}}">
                        Buy Now</a>
                </div>
            </div>
        </div>
    </nav>
</section>

<section data-bs-version="5.1" class="header1 shopm5 cid-tDSzcKy6aT" id="aheader1-1">

    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(51, 54, 59);"></div>

    <div class="container">
        <div class="row justify-content-start">
            <div class="col-12 col-lg-4 col-content">
                <div class="label-container">
                    <p class="label-text mbr-fonts-style mb-0 display-4">
                        <strong>December-2023&nbsp;&nbsp;&nbsp;&nbsp;#Fabric</strong>
                    </p>
                    <p class="label-text-2 mbr-fonts-style mb-0 display-7">Always gentle on the Skin</p>
                </div>
                <h1 class="mbr-section-title mbr-fonts-style mb-0 display-1"><strong>Fabric Store</strong></h1>
                <div class="text-container">
                    <h2 class="mbr-section-subtitle mbr-fonts-style mb-0 display-4">
                        <strong>Make your choice now</strong>
                    </h2>
                    <p class="mbr-text mbr-fonts-style mb-0 display-4">
                        <strong>from $99.00</strong>
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features4 shopm5 cid-tDSzzuMiNe" id="afeatures4-2">

    <div class="container">
        <div class="row">
            
        </div>
        <div class="row cars-row justify-content-center">
            <div class="card col-12 col-md-8 col-lg-4">
                <div class="card-wrapper align-center">
                    <div class="iconfont-wrapper">
                        <span class="mbr-iconfont  mobi-mbri"><i class="fa-solid fa-truck-fast"></i></span>
                    </div>
                    <div class="text-wrap">
                        <h5 class="card-title mbr-fonts-style mb-0 display-7"><strong>Free shipping</strong></h5>
                        <p class="card-text mbr-fonts-style mb-0 display-7">
                            Free shipping any orders
                        </p>
                        <div class="mbr-section-btn"><a href="" class="btn btn-danger display-7" target="_blank">
                                <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fa-solid fa-chevron-right"></i></span>
                                Read More
                            </a></div>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-8 col-lg-4">
                <div class="card-wrapper align-center">
                    <div class="iconfont-wrapper">
                        <span class="mbr-iconfont mobi-mbri"><i class="fa-solid fa-arrow-rotate-left"></i></span>
                    </div>
                    <div class="text-wrap">
                        <h5 class="card-title mbr-fonts-style mb-0 display-7"><strong>Free returns</strong></h5>
                        <p class="card-text mbr-fonts-style mb-0 display-7">
                            30-days free return
                        </p>
                        <div class="mbr-section-btn"><a href="" class="btn btn-danger display-7" target="_blank">
                                <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fa-solid fa-chevron-right"></i></span>
                                Read More
                            </a></div>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-8 col-lg-4">
                <div class="card-wrapper align-center">
                    <div class="iconfont-wrapper">
                        <span class="mbr-iconfont mobi-mbri"><i class="fa-solid fa-lock"></i></span>
                    </div>
                    <div class="text-wrap">
                        <h5 class="card-title mbr-fonts-style mb-0 display-7"><strong>Secured payments</strong></h5>
                        <p class="card-text mbr-fonts-style mb-0 display-7">
                            We accept all cards
                        </p>
                        <div class="mbr-section-btn"><a href="" class="btn btn-danger display-7" target="_blank">
                                <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fa-solid fa-chevron-right"></i></span>
                                Read More
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features8 shopm5 cid-tDSzIIcSpW" id="afeatures8-3">

    <div class="container">
        
        <div class="row cards-row justify-content-center">
            <div class="card card-1 col-12 col-lg-6">
                <div class="card-wrap">
                    <div class="item-content">
                        <h5 class="card-title-1 mbr-fonts-style mb-0 display-2">
                            <strong>
                                Create Your Own Unique Style
                            </strong>
                        </h5>
                        <h6 class="card-subtitle-1 mb-0 mbr-fonts-style display-7"><strong>With our fabric, you can create amazing suits, which would emphasize your style.</strong></h6>
                        <p class="card-text-1 mbr-fonts-style mb-0 display-7">
                            <strong>from $29.00</strong>
                        </p>
                        <div class="mbr-section-btn mbr-section-btn-1"><a href="{{ route('category') }}" class="btn btn-danger display-7" target="_blank">
                                <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fa-solid fa-chevron-right"></i></span>
                                Shop the Category
                            </a></div>
                    </div>
                </div>
            </div>
            <div class="card card-2 col-12 col-lg-6">
                <div class="card-wrap">
                    <div class="item-content">
                        <h5 class="card-title-2 mbr-fonts-style mb-0 display-2">
                           <strong>Wide Range Of Products</strong>
                        </h5>
                        <h6 class="card-subtitle-2 mb-0 mbr-fonts-style display-7"><strong>In our store, you would find all the kinds of textile and fabric in the best quality.</strong></h6>
                        <p class="card-text-2 mbr-fonts-style mb-0 display-7">
                            <strong>from $29.00</strong>
                        </p>
                        <div class="mbr-section-btn mbr-section-btn-2"><a href="{{ route('category') }}" class="btn btn-danger display-7" target="_blank">
                                <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fa-solid fa-chevron-right"></i></span>
                                Shop the Category
                            </a></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section data-bs-version="5.1" class="pricing5 shopm5 cid-tDSA79Z3bX" id="apricing5-4">
    <h1 class="align-center align-center mbr-fonts-style mb-0 display-2 mb-3 fw-bold">Featured Products</h1>
    <div class="container-fluid">
        <div class="featured-carousel owl-theme">
            <div class="row align-items-stretch items-row justify-content-center">
                @foreach ($featured_products as $product)
                <div class="item features-image col-12 col-md-6 col-lg-3">
                    <div class="item-wrapper">
                        <div class="item-img">
                            <img src="{{ asset('./admin/productimages/' . $product->image) }}" alt="{{ $product->name }}">
                            <div class="mbr-section-btn align-center align-center">
                                {{-- <a href="" class="btn btn-danger item-btn display-7" target="_blank">
                                    View Details
                                </a> --}}
                            </div>
                        </div>
                        <div class="item-content align-center">
                            <h5 class="item-title mbr-fonts-style mb-0 display-7">{{ $product->name }}</h5>
                            <p class="item-subtitle mbr-fonts-style mb-0 display-7">
                                <strong>{{ optional(App\Models\Category::find($product->category))->name }}</strong>
                            </p>
                            <p class="mbr-text mbr-fonts-style mb-0 display-7">
                                <strong>Rs. {{ $product->original_price }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features5 shopm5 cid-tDSAJ0Tlem" id="afeatures5-5">

    <div class="container">
        
        <div class="row cards-row justify-content-center">

            <div class="card card-1 col-12 col-lg-6">
                <div class="card-wrap">
                    <div class="item-content">
                        <h5 class="card-title-1 mbr-fonts-style display-7">
                           <strong>01. THE BEST CHOICE</strong>
                        </h5>
                        <p class="card-text-1 mbr-fonts-style mb-0 display-2">
                            <strong>Wide Range Of Products</strong>
                        </p>
                        <div class="mbr-section-btn mbr-section-btn-1">
                            <a href="" class="btn btn-black-outline display-7" target="_blank">
                                <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fa-solid fa-chevron-right"></i></span>
                                Shop the Category
                            </a>
                        </div>
                    </div>
                    <div class="item-img">
                        <img src="{{asset('website/assets/images/mbr-618x412.jpg')}}" alt="Mobirise Website Builder">
                    </div>
                </div>
            </div>

            <div class="card card-2 col-12 col-lg-6">
                <div class="card-wrap">
                    <div class="item-content">
                        <p class="card-label-2 mbr-fonts-style display-7">
                            <strong>EARN 10% BACK IN REWARDS</strong>
                        </p>
                        <h5 class="card-title-2 mb-0 mbr-fonts-style display-2">
                            <strong>Join our free loyalty program</strong>
                        </h5>
                    </div>
                    <div class="item-text">
                        <h6 class="card-subtitle-2 mb-0 mbr-fonts-style display-7"><strong>Do you have questions about our store? Ask us!</strong></h6>
                        <p class="card-text-2 mbr-fonts-style mb-0 display-7">If you have any questions, ask them now! Our support works twenty-four-hour.</p>
                        <div class="mbr-section-btn mbr-section-btn-2">
                            <a href="" class="btn btn-black display-7" target="_blank">
                                <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fa-solid fa-chevron-right"></i></span>
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features10 shopm5 cid-tDSAXFiImL" id="afeatures10-6">

    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style mb-0 display-2">
                <strong>Our Features</strong>
            </h3>
            
        </div>
        <div class="row align-items-start">

            <div class="col-12 col-lg-6 col-lines col-lines-1">
                <div class="line-items-wrap">
                    <div class="line-item line-item-1">
                        <div class="line-text-wrap">
                            <p class="line-text mbr-fonts-style mb-0 display-7">
                                <strong>Free shipping</strong>
                            </p>
                            <p class="line-number line-number mb-0 display-7">%</p>
                        </div>
                        <div class="line">
                            <div class="line-active"></div>
                        </div>
                    </div>

                    <div class="line-item line-item-2">
                        <div class="line-text-wrap">
                            <p class="line-text mbr-fonts-style mb-0 display-7">
                                <strong>Free returns</strong>
                            </p>
                            <p class="line-number mb-0 display-7">%</p>
                        </div>
                        <div class="line">
                            <div class="line-active"></div>
                        </div>
                    </div>

                    <div class="line-item line-item-3">
                        <div class="line-text-wrap">
                            <p class="line-text mbr-fonts-style mb-0 display-7">
                                <strong>Customer service</strong>
                            </p>
                            <p class="line-number mb-0 display-7">%</p>
                        </div>
                        <div class="line">
                            <div class="line-active"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-lines col-lines-4">
                <div class="line-items-wrap">
                    <div class="line-item line-item-1">
                        <div class="line-text-wrap">
                            <p class="line-text mbr-fonts-style mb-0 display-7">
                                <strong>Secured payments</strong>
                            </p>
                            <p class="line-number line-number mb-0 display-7">%</p>
                        </div>
                        <div class="line">
                            <div class="line-active"></div>
                        </div>
                    </div>

                    <div class="line-item line-item-5">
                        <div class="line-text-wrap">
                            <p class="line-text mbr-fonts-style mb-0 display-7">
                                <strong>Variety of assortment</strong>
                            </p>
                            <p class="line-number mb-0 display-7">%</p>
                        </div>
                        <div class="line">
                            <div class="line-active"></div>
                        </div>
                    </div>

                    <div class="line-item line-item-6">
                        <div class="line-text-wrap">
                            <p class="line-text mbr-fonts-style mb-0 display-7">
                                <strong>Product quality</strong>
                            </p>
                            <p class="line-number mb-0 display-7">%</p>
                        </div>
                        <div class="line">
                            <div class="line-active"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features6 shopm5 cid-tDSB03fKCx" id="afeatures6-7">

    <div class="container">
        <div class="row">
            
        </div>
        <div class="row cards-row justify-content-start">

            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="text-wrap">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-solid fa-check"></i></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style mb-0 display-1"><strong>382</strong></h5>
                    </div>
                    <p class="card-text mbr-fonts-style mb-0 display-7">
                        <strong>Happy Customers</strong>
                    </p>
                </div>
            </div>

            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="text-wrap">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-solid fa-check"></i></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style mb-0 display-1"><strong>2343</strong></h5>
                    </div>
                    <p class="card-text mbr-fonts-style mb-0 display-7">
                        <strong>Sales Per Month</strong>
                    </p>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="text-wrap">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-solid fa-check"></i></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style mb-0 display-1"><strong>564</strong></h5>
                    </div>
                    <p class="card-text mbr-fonts-style mb-0 display-7">
                        <strong>Regular Customers</strong>
                    </p>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="text-wrap">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-solid fa-check"></i></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style mb-0 display-1"><strong>134</strong></h5>
                    </div>
                    <p class="card-text mbr-fonts-style mb-0 display-7">
                        <strong>Delivery Points</strong>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<section data-bs-version="5.1" class="people4 shopm5 cid-tDSB3Rg7OV" id="apeople4-8">
 
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style mb-0 align-center display-2">
                <strong>Customer reviews</strong>
            </h3>
            <h5 class="mbr-section-subtitle mbr-fonts-style mb-0 align-center display-4">
                Look through the reviews of our customers.
            </h5>
        </div>
        <div class="row cards-row align-items-stretch justify-content-center">

            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="icons-wrap">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                    </div>
                    <h5 class="card-title mbr-fonts-style display-4">
                        <strong>Great Quality!</strong>
                    </h5>
                    <h5 class="card-subtitle mbr-fonts-style mb-0 display-7">I couldn't find the threads for a certain material. It was only one place, where they were.</h5>
                    <div class="card-bottom-wrap">
                        <p class="card-name mbr-fonts-style mb-0 display-7">
                            <strong>Adam Cross</strong>
                        </p>
                        <p class="card-text mbr-fonts-style mb-0 display-7">
                            France
                        </p>
                    </div>
                </div>
            </div>

            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="icons-wrap">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont  mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont  mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont  mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont  mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont  mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                    </div>
                    <h5 class="card-title mbr-fonts-style display-4">
                        <strong>Free shipping!</strong>
                    </h5>
                    <h5 class="card-subtitle mbr-fonts-style mb-0 display-7">Ordered a textile for my kitchen table. It was delivered on time.</h5>
                    <div class="card-bottom-wrap">
                        <p class="card-name mbr-fonts-style mb-0 display-7">
                            <strong>Susan Crossman</strong>
                        </p>
                        <p class="card-text mbr-fonts-style mb-0 display-7">
                            Staten Island
                        </p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="icons-wrap">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                    </div>
                    <h5 class="card-title mbr-fonts-style display-4">
                        <strong>Secured payments!</strong>
                    </h5>
                    <h5 class="card-subtitle mbr-fonts-style mb-0 display-7">The shop has a simple and secure system. I had no troubles with it.</h5>
                    <div class="card-bottom-wrap">
                        <p class="card-name mbr-fonts-style mb-0 display-7">
                            <strong>Adam Cross</strong>
                        </p>
                        <p class="card-text mbr-fonts-style mb-0 display-7">
                            United States
                        </p>
                    </div>
                </div>
            </div>

            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="icons-wrap">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri"><i class="fa-regular fa-star"></i></span>
                        </div>
                    </div>
                    <h5 class="card-title mbr-fonts-style display-4">
                        <strong>Customer service!</strong>
                    </h5>
                    <h5 class="card-subtitle mbr-fonts-style mb-0 display-7">The workers are very polite and attentive. One guy spent 20 minutes to help me.</h5>
                    <div class="card-bottom-wrap">
                        <p class="card-name mbr-fonts-style mb-0 display-7">
                            <strong>Jennifer Bawerman</strong>
                        </p>
                        <p class="card-text mbr-fonts-style mb-0 display-7">
                            Finland
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section data-bs-version="5.1" class="gallery3 mbr-gallery shopm5 cid-tDSBjZ77hx" id="agallery3-9">

    <div class="container">
        
        <div class="row mbr-gallery items-row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#tDSC7aMZT1-modal" data-bs-target="#tDSC7aMZT1-modal">
                    <img class="w-100" src="{{ asset("website/assets/images/mbr-4-872x581.jpg") }}" alt="Mobirise Website Builder" data-slide-to="0" data-bs-slide-to="0" data-target="#lb-tDSC7aMZT1" data-bs-target="#lb-tDSC7aMZT1">
                    <div class="img-overlay"></div>
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fas fa-search"></i></span>
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-md-6 col-lg-4 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#tDSC7aMZT1-modal" data-bs-target="#tDSC7aMZT1-modal">
                    <img class="w-100" src="{{ asset("website/assets/images/mbr-1920x1184.jpg") }}" alt="Mobirise Website Builder" data-slide-to="1" data-bs-slide-to="1" data-target="#lb-tDSC7aMZT1" data-bs-target="#lb-tDSC7aMZT1">
                    <div class="img-overlay"></div>
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fas fa-search"></i></span>
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-md-6 col-lg-4 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#tDSC7aMZT1-modal" data-bs-target="#tDSC7aMZT1-modal">
                    <img class="w-100" src="{{ asset("website/assets/images/mbr-1920x1445.jpg") }}" alt="Mobirise Website Builder" data-slide-to="2" data-bs-slide-to="2" data-target="#lb-tDSC7aMZT1" data-bs-target="#lb-tDSC7aMZT1">
                    <div class="img-overlay"></div>
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fas fa-search"></i></span>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="modal mbr-slider" tabindex="-1" role="dialog" aria-hidden="true" id="tDSC7aMZT1-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="carousel slide" id="lb-tDSC7aMZT1" data-interval="5000" data-bs-interval="5000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset("website/assets/images/mbr-4-872x581.jpg") }}" alt="Mobirise Website Builder">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset("website/assets/images/mbr-1920x1184.jpg") }}" alt="Mobirise Website Builder">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset("website/assets/images/mbr-1920x1445.jpg") }}" alt="Mobirise Website Builder">
                                </div>
                            </div>
                            <ol class="carousel-indicators">
                                <li data-slide-to="0" data-bs-slide-to="0" class="active" data-target="#lb-tDSC7aMZT1" data-bs-target="#lb-tDSC7aMZT1"></li>
                                <li data-slide-to="1" data-bs-slide-to="1" data-target="#lb-tDSC7aMZT1" data-bs-target="#lb-tDSC7aMZT1"></li>
                                <li data-slide-to="2" data-bs-slide-to="2" data-target="#lb-tDSC7aMZT1" data-bs-target="#lb-tDSC7aMZT1"></li> 
                            </ol>
                            <a role="button" href="" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                            </a>
                            <a class="carousel-control-prev carousel-control" role="button" data-slide="prev" data-bs-slide="prev" href="#lb-tDSC7aMZT1">
                                <span class="mobi-mbri mobi-mbri-arrow-prev" aria-hidden="true"></span>
                                <span class="sr-only visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next carousel-control" role="button" data-slide="next" data-bs-slide="next" href="#lb-tDSC7aMZT1">
                                <span class="mobi-mbri mobi-mbri-arrow-next" aria-hidden="true"></span>
                                <span class="sr-only visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="gallery4 mbr-gallery shopm5 cid-tDSBxBBmuX" id="agallery4-a">

    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center m-0 display-2">
                <strong>Share with #depotamp</strong>
            </h3>
            <h4 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 display-7">
                Follow <strong>@mobirise</strong> for inspiration
            </h4>
        </div>

    </div>
    <div class="row mbr-gallery items-row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 col-xl-2 item gallery-image active">
            <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#tDSC7clRUa-modal" data-bs-target="#tDSC7clRUa-modal">
                <img class="w-100" src="{{ asset("website/assets/images/01.jpg ") }}" alt="Mobirise Website Builder" data-slide-to="0" data-bs-slide-to="0" data-target="#lb-tDSC7clRUa" data-bs-target="#lb-tDSC7clRUa">
                <div class="img-overlay"></div>
                <div class="icon-wrapper">
                    <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div><div class="col-12 col-md-6 col-lg-4 col-xl-2 item gallery-image">
            <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#tDSC7clRUa-modal" data-bs-target="#tDSC7clRUa-modal">
                <img class="w-100" src="{{ asset("website/assets/images/02.jpg ") }}" alt="Mobirise Website Builder" data-slide-to="1" data-bs-slide-to="1" data-target="#lb-tDSC7clRUa" data-bs-target="#lb-tDSC7clRUa">
                <div class="img-overlay"></div>
                <div class="icon-wrapper">
                    <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div><div class="col-12 col-md-6 col-lg-4 col-xl-2 item gallery-image">
            <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#tDSC7clRUa-modal" data-bs-target="#tDSC7clRUa-modal">
                <img class="w-100" src="{{ asset("website/assets/images/03.jpg ") }}" alt="Mobirise Website Builder" data-slide-to="2" data-bs-slide-to="2" data-target="#lb-tDSC7clRUa" data-bs-target="#lb-tDSC7clRUa">
                <div class="img-overlay"></div>
                <div class="icon-wrapper">
                    <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div><div class="col-12 col-md-6 col-lg-4 col-xl-2 item gallery-image">
            <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#tDSC7clRUa-modal" data-bs-target="#tDSC7clRUa-modal">
                <img class="w-100" src="{{ asset("website/assets/images/mbr-618x412.jpg") }}" alt="Mobirise Website Builder" data-slide-to="3" data-bs-slide-to="3" data-target="#lb-tDSC7clRUa" data-bs-target="#lb-tDSC7clRUa">
                <div class="img-overlay"></div>
                <div class="icon-wrapper">
                    <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-2 item gallery-image">
            <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#tDSC7clRUa-modal" data-bs-target="#tDSC7clRUa-modal">
                <img class="w-100" src="{{ asset("website/assets/images/mbr-2-1920x1280.jpg") }}" alt="Mobirise Website Builder" data-slide-to="4" data-bs-slide-to="4" data-target="#lb-tDSC7clRUa" data-bs-target="#lb-tDSC7clRUa">
                <div class="img-overlay"></div>
                <div class="icon-wrapper">
                    <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-2 item gallery-image">
            <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#tDSC7clRUa-modal" data-bs-target="#tDSC7clRUa-modal">
                <img class="w-100" src="{{ asset("website/assets/images/mbr-872x569.jpg") }}" alt="Mobirise Website Builder" data-slide-to="5" data-bs-slide-to="5" data-target="#lb-tDSC7clRUa" data-bs-target="#lb-tDSC7clRUa">
                <div class="img-overlay"></div>
                <div class="icon-wrapper">
                    <span class="mobi-mbri mbr-iconfont mbr-iconfont-btn"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal mbr-slider" tabindex="-1" role="dialog" aria-hidden="true" id="tDSC7clRUa-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="carousel slide" id="lb-tDSC7clRUa" data-interval="5000" data-bs-interval="5000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset("assets/images/01.jpg") }}" alt="Mobirise Website Builder">
                            </div><div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset("assets/images/02.jpg") }}" alt="Mobirise Website Builder">
                            </div><div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset("assets/images/03.jpg") }}" alt="Mobirise Website Builder">
                            </div><div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset("assets/images/mbr-618x412.jpg") }}" alt="Mobirise Website Builder">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset("assets/images/mbr-2-1920x1280.jpg") }}" alt="Mobirise Website Builder">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset("assets/images/mbr-872x569.jpg") }}" alt="Mobirise Website Builder">
                            </div>
                            
                            
                            
                        </div>
                        <ol class="carousel-indicators">
                            <li data-slide-to="0" data-bs-slide-to="0" class="active" data-target="#lb-tDSC7clRUa" data-bs-target="#lb-tDSC7clRUa"></li>
                            <li data-slide-to="1" data-bs-slide-to="1" data-target="#lb-tDSC7clRUa" data-bs-target="#lb-tDSC7clRUa"></li>
                            <li data-slide-to="2" data-bs-slide-to="2" data-target="#lb-tDSC7clRUa" data-bs-target="#lb-tDSC7clRUa"></li>
                            <li data-slide-to="3" data-bs-slide-to="3" data-target="#lb-tDSC7clRUa" data-bs-target="#lb-tDSC7clRUa"></li>
                            <li data-slide-to="4" data-bs-slide-to="4" data-target="#lb-tDSC7clRUa" data-bs-target="#lb-tDSC7clRUa"></li>
                            <li data-slide-to="5" data-bs-slide-to="5" data-target="#lb-tDSC7clRUa" data-bs-target="#lb-tDSC7clRUa"></li>
                        </ol>
                        <a role="button" href="" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                        </a>
                        <a class="carousel-control-prev carousel-control" role="button" data-slide="prev" data-bs-slide="prev" href="#lb-tDSC7clRUa">
                            <span class="mobi-mbri mobi-mbri-arrow-prev" aria-hidden="true"></span>
                            <span class="sr-only visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next carousel-control" role="button" data-slide="next" data-bs-slide="next" href="#lb-tDSC7clRUa">
                            <span class="mobi-mbri mobi-mbri-arrow-next" aria-hidden="true"></span>
                            <span class="sr-only visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="form3 shopm5 cid-tDSBTV1U1B" id="aform3-b">
    <div class="container">
        <div class="row align-items-stretch main-row">
            <div class="col-12 col-lg">
                <div class="content-wrap">
                    <div class="mbr-section-head">
                        <h2 class="mbr-section-title mbr-fonts-style mb-0 display-7">
                            <strong>INTERIOR DESIGN COLLECTION</strong>
                        </h2>
                        <p class="mbr-section-subtitle mbr-fonts-style mb-0 display-2">
                            <strong>Create Your Own Unique Style</strong>
                        </p>
                        <p class="comment-text mbr-fonts-style mb-0 display-4">
                            Know about our discounts and sales first.
                        </p>
                    </div>
                    <div class="form-wrap">
                        <div class="mbr-form" data-form-type="formoid">
                            <form action="https://mobirise.eu/" method="POST" class="mbr-form form-with-styler mx-auto" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="eD6VqujqDRwGfpudg5iQ6XdriLfF8QSoFaRS/9d2nNofLClJc+I+BtybkdLgPwwm1G3EHTbCagtOzbyL36AARNQaOaFYPKYhL9XA2NNR4T6qitSbDmsuvqkNuZ3rFATX.ubUi4EXHI+aaXYFdnqemAl0QbQlArYinybkr+FlkJObDGA5cecY2xZEBR2DNWF27jR2i96NUH9xMIgExlNjCAT9MCxjTtZC9cxS1xDqi5pOgykPonV8eHCuRxy6M/D0K">
                                <div class="row">
                                    <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
                                    <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                                        Oops...! some problem!
                                    </div>
                                </div>
                                <div class="dragArea row">
                                    <div class="col-12 col-md form-group" data-for="email">
                                        <input type="email" name="email" placeholder="E-mail" data-form-field="email" class="form-control display-7" required="required" value="" id="email-aform3-b">
                                    </div>
                                    <div class="col-auto col-md-auto mbr-section-btn align-center">
                                        <button type="submit" class="btn btn-danger display-7">
                                            Subscribe
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="img-wrap">
                    <img src="{{ asset('website/assets/images/mbr-1920x1200.jpeg')}}" alt="Mobirise Website Builder">
                </div>
            </div>
        </div>
    </div>
</section>

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

{{-- Javascript code  --}}
{{-- <script>
    $(document).ready(function () {
        $(".featured-carousel").owlCarousel({
            items: 4,
            loop: true,
            margin: 15,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                992: {
                    items: 4,
                },
            },
        });
    });
</script> --}}
{{-- Javascript code  --}}
<script src="{{ asset("website/assets/bootstrap/js/bootstrap.bundle.min.js" )}}"></script>
  <script src="{{ asset("website/assets/smoothscroll/smooth-scroll.js" )}}"></script>
  <script src="{{ asset("website/assets/ytplayer/index.js" )}}"></script>
  <script src="{{ asset("website/assets/dropdown/js/navbar-dropdown.js" )}}"></script>
  <script src="{{ asset("website/assets/theme/js/script.js" )}}"></script>
  <script src="{{ asset("website/assets/formoid.min.js")}}"></script>
  <script src="{{ asset('website/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
</body>
</html>