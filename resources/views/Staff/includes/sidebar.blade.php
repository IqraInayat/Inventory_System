<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('./staff/staff_dash')}}">
            <span class="align-middle">Fabric Store</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                content
            </li>

            <li class="sidebar-item {{ Request::is ('staff/staff_dash') ? 'active' :''}}">
                <a class="sidebar-link" href="{{ route('staff') }}">
                    <i class="align-middle" data-feather="gifts"></i> <span class="align-middle">Products</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is ('staff/orders') ? 'active' :''}}">
                <a class="sidebar-link" href="{{ route('staff_orders') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Orders</span>
                </a>
            </li>
        </ul>
    </div>
</nav>