<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('./user/home_page')}}">
            <span class="align-middle">Fabric Store</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                content
            </li>

            <li class="sidebar-item {{ Request::is ('user/home_page') ? 'active' :''}}">
                <a class="sidebar-link" href="{{ route('logged_user_table') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">User's Data</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is ('categories/category_form') ? 'active' :''}}">
                <a class="sidebar-link" href="{{ route('add_category') }}">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Add Category</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is ('categories/show_categories') ? 'active' :''}}">
                <a class="sidebar-link" href="{{ route('category_table') }}">
                    <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Categories Data</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is ('products/product_form') ? 'active' :''}}">
                <a class="sidebar-link" href="{{ route('add_product') }}">
                    <i class="align-middle" data-feather="codesandbox"></i> <span class="align-middle">Add Product</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is ('products/show_products') ? 'active' :''}}">
                <a class="sidebar-link" href="{{ route('product_table') }}">
                    <i class="align-middle" data-feather="gift"></i> <span class="align-middle">Product's Data</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is ('orders') ? 'active' :''}}">
                <a class="sidebar-link" href="{{ route('orders') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Orders</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is ('sales') ? 'active' :''}}">
                <a class="sidebar-link" href="{{ route('sales') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Record Sales</span>
                </a>
            </li>
        </ul>
    </div>
</nav>