<aside class="left-sidebar with-vertical">
    <div class="sidebar-container d-flex flex-column" style="height: 100%;">
        <!-- Brand Logo -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
            </a>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none" onclick="toggleSidebar()">
                <i class="ti ti-x"></i>
            </a>
        </div>

        <!-- Logo di Atas Sidebar -->
        <div class="logo-top text-center my-4">
            <img src="{{ asset('assets/images/logos/bank_kerta.svg') }}" alt="Additional Logo" class="extra-logo" />
        </div>

        <!-- Sidebar Navigation -->
        <nav class="sidebar-nav scroll-sidebar flex-grow-1" data-simplebar>
            <ul id="sidebarnav">
                <li class="sidebar-item {{ Route::is('dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <span><i class="ti ti-aperture"></i></span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('products.dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('products.dashboard') }}" aria-expanded="false">
                        <span><i class="ti ti-file-text"></i></span>
                        <span class="hide-menu">Product</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('nasabah.dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('nasabah.dashboard') }}" aria-expanded="false">
                        <span><i class="ti ti-list-details"></i></span>
                        <span class="hide-menu">Nasabah</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('pengajuan.dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('pengajuan.dashboard') }}" aria-expanded="false">
                        <span><i class="ti ti-currency-dollar"></i></span>
                        <span class="hide-menu">Pengajuan Kredit</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer text-center py-3">
            <p class="mb-0">&copy; design by dhea</p>
        </div>
    </div>
</aside>
