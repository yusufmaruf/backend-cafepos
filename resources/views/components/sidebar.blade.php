<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">POS CAFE</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PC</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-users"></i>
                    <span>Pengguna</span></a>
            </li>
            <li class="{{ Request::is('product*') ? 'active' : '' }}"><a class="nav-link "2
                    href="{{ route('product.index') }}"><i class="fas fa-cubes"></i>
                    <span>Produk</span></a>
            </li>
            <li class="{{ Request::is('order*') ? 'active' : '' }}"><a class="nav-link "2
                    href="{{ route('order.index') }}"><i class="fas fa-cubes"></i>
                    <span>All Orders</span></a>
            </li>


        </ul>

    </aside>
</div>
