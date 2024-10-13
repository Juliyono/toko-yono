<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Teknik Informatika | KSI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">KSI</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('product*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.product') }}">
                    <i class="fas fa-box"></i>
                    <span>Produk</span>
                     </a>
            </li>

            <li class="{{ route::is('admin.Distributor') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.Distributor') }}">
                    <i class="fas fa-truck"></i>
                    <span>Distributor</span></a></li>
            
           <!-- Tambahkan menu Flash Sale -->
        <li class="{{ Route::is('flashsales.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('flashsales.index') }}">
                <i class="fas fa-tags"></i>
                <span>Flash Sale</span>
            </a>
        </li>


        </ul>
    </aside>
</div>