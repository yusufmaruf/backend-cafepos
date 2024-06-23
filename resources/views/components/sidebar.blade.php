<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">POS CAFE</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PC</a>
        </div>
        <ul class="sidebar-menu">

            <li><a class="nav-link" href=""><i class="fas fa-dashboard"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('user*') ? 'active' : '' }}"><a class="nav-link "2
                    href="{{ route('user.index') }}"><i class="fas fa-users"></i>
                    <span>User</span></a>
            </li>
            <li class="{{ Request::is('product*') ? 'active' : '' }}"><a class="nav-link "2
                    href="{{ route('product.index') }}"><i class="fas fa-cubes"></i>
                    <span>Produk</span></a>
            </li>
            <li class="{{ Request::is('order*') ? 'active' : '' }}"><a class="nav-link "2
                    href="{{ route('order.index') }}"><i class="fas fa-cubes"></i>
                    <span>All Orders</span></a>
            </li>
            <li class="{{ Request::is('site-identity*') ? 'active' : '' }}"><a class="nav-link "2
                    href="{{ route('site-identity.index') }}"><i class="fas fa-gear"></i>
                    <span>Site Identity</span></a>
            </li>


        </ul>

    </aside>
</div>
