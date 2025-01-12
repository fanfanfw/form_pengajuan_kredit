<!--  Header Start -->
<header class="topbar">
    <div class="with-vertical"><!-- ---------------------------------- -->
      <!-- Start Vertical Layout Header -->
      <!-- ---------------------------------- -->
      <nav class="navbar navbar-expand-lg p-0">
        <ul class="navbar-nav">
          <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
            <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
        </ul>

        <div class="d-block d-lg-none py-4">
          <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
            <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
            <img src="{{ asset('assets/images/logos/light-logo.svg') }}" class="light-logo" alt="Logo-light" />
          </a>
        </div>
        <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="ti ti-dots fs-7"></i>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <div class="d-flex align-items-center justify-content-between">
            <a href="javascript:void(0)" class="nav-link nav-icon-hover-bg rounded-circle mx-0 ms-n1 d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
              <i class="ti ti-align-justified fs-7"></i>
            </a>
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
              <li class="nav-item nav-icon-hover-bg rounded-circle">
                <a class="nav-link moon dark-layout" href="javascript:void(0)">
                  <i class="ti ti-moon moon"></i>
                </a>
                <a class="nav-link sun light-layout" href="javascript:void(0)">
                  <i class="ti ti-sun sun"></i>
                </a>
              </li>
              
              <!-- ------------------------------- -->
              <!-- start profile Dropdown -->
              <!-- ------------------------------- -->
              <li class="nav-item dropdown">
                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
                  <div class="d-flex align-items-center">
                    <div class="user-profile-img">
                      <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="rounded-circle" width="35" height="35" alt="modernize-img" />
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                  <div class="profile-dropdown position-relative" data-simplebar>
                    <div class="py-3 px-7 pb-0">
                      <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                    </div>
                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                      <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="rounded-circle" width="80" height="80" alt="modernize-img" />
                      <div class="ms-3">
                        <h5 class="mb-1 fs-3">{{ $user->name }}</h5>
                        <span class="mb-1 d-block">{{ $user->role }}</span>
                        <p class="mb-0 d-flex align-items-center gap-2">
                            <i class="ti ti-mail fs-4"></i> {{ $user->email }}
                        </p>
                    </div>                        
                    </div>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <div class="d-grid py-4 px-7 pt-8">
                            <button type="submit" class="btn btn-outline-primary">Log Out</button>
                        </div>
                    </form>
                    
                  </div>
                </div>
              </li>
              <!-- ------------------------------- -->
              <!-- end profile Dropdown -->
              <!-- ------------------------------- -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- ---------------------------------- -->
      <!-- End Vertical Layout Header -->
      <!-- ---------------------------------- -->


      {{-- batass --}}
      <!-- ------------------------------- -->
      <!-- apps Dropdown in Small screen -->
      <!-- ------------------------------- -->
      <!--  Mobilenavbar -->
      <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
        <nav class="sidebar-nav scroll-sidebar">
          <div class="offcanvas-header justify-content-between">
            <img src="{{ asset('assets/images/logos/favicon.ico') }}" alt="modernize-img" class="img-fluid" />
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body h-n80" data-simplebar="" data-simplebar>
          </div>
        </nav>
      </div>
    </div>
    <div class="app-header with-horizontal">
      <nav class="navbar navbar-expand-xl container-fluid p-0">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item nav-icon-hover-bg rounded-circle d-flex d-xl-none ms-n2">
            <a class="nav-link sidebartoggler" id="sidebarCollapse" href="javascript:void(0)">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="nav-item d-none d-xl-block">
            <a href="{{ route('dashboard') }}" class="text-nowrap nav-link">
              <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" class="dark-logo" width="180" alt="modernize-img" />
              <img src="{{ asset('assets/images/logos/light-logo.svg') }}" class="light-logo" width="180" alt="modernize-img" />
            </a>
          </li>
        </ul>
        
        <div class="d-block d-xl-none">
          <a href="{{ route('dashboard') }}" class="text-nowrap nav-link">
            <img src="../assets/images/logos/dark-logo.svg" width="180" alt="modernize-img" />
          </a>
        </div>
        <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="p-2">
            <i class="ti ti-dots fs-7"></i>
          </span>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
            <a href="javascript:void(0)" class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
              <i class="ti ti-align-justified fs-7"></i>
            </a>
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
             
              <li class="nav-item nav-icon-hover-bg rounded-circle">
                <a class="nav-link moon dark-layout" href="javascript:void(0)">
                  <i class="ti ti-moon moon"></i>
                </a>
                <a class="nav-link sun light-layout" href="javascript:void(0)">
                  <i class="ti ti-sun sun"></i>
                </a>
              </li>

              <!-- ------------------------------- -->
              <!-- start profile Dropdown -->
              <!-- ------------------------------- -->
              <li class="nav-item dropdown">
                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
                  <div class="d-flex align-items-center">
                    <div class="user-profile-img">
                      <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="rounded-circle" width="35" height="35" alt="modernize-img" />
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                  <div class="profile-dropdown position-relative" data-simplebar>
                    <div class="py-3 px-7 pb-0">
                      <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                    </div>
                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                      <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="rounded-circle" width="80" height="80" alt="modernize-img" />
                      <div class="ms-3">
                        <h5 class="mb-1 fs-3">{{ $user->name }}</h5>
                        <span class="mb-1 d-block">{{ $user->role }}</span>
                        <p class="mb-0 d-flex align-items-center gap-2">
                            <i class="ti ti-mail fs-4"></i> {{ $user->email }}
                        </p>
                    </div>                        
                    </div>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <div class="d-grid py-4 px-7 pt-8">
                            <button type="submit" class="btn btn-outline-primary">Log Out</button>
                        </div>
                    </form>
                    
                  </div>
                </div>
              </li>
              <!-- ------------------------------- -->
              <!-- end profile Dropdown -->
              <!-- ------------------------------- -->
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--  Header End -->

  <aside class="left-sidebar with-horizontal">
    <!-- Sidebar scroll-->
    <div>
      <!-- Sidebar navigation-->
      <nav id="sidebarnavh" class="sidebar-nav scroll-sidebar container-fluid">
        <ul id="sidebarnav">
          
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
              <span>
                <i class="ti ti-aperture"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('products.dashboard') }}" aria-expanded="false">
              <span>
                <i class="ti ti-file-text"></i>
              </span>
              <span class="hide-menu">Product</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('nasabah.dashboard') }}" aria-expanded="false">
              <span>
                <i class="ti ti-list-details"></i>
              </span>
              <span class="hide-menu">Nasabah</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('pengajuan.dashboard') }}" aria-expanded="false">
              <span>
                <i class="ti ti-currency-dollar"></i>
              </span>
              <span class="hide-menu">Pengajuan Kredit </span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>