<!-- Sidebar Start -->
<aside class="left-sidebar with-vertical">
    <div><!-- ---------------------------------- -->
      <!-- Start Vertical Layout Sidebar -->
      <!-- ---------------------------------- -->
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="../main/index.html" class="text-nowrap logo-img">
          <img src="../assets/images/logos/dark-logo.svg" class="dark-logo" alt="Logo-Dark" />
          <img src="../assets/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
        </a>
        <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
          <i class="ti ti-x"></i>
        </a>
      </div>

      <nav class="sidebar-nav scroll-sidebar" data-simplebar>
        <ul id="sidebarnav">
          <!-- ---------------------------------- -->
          <!-- Dashboard -->
          <!-- ---------------------------------- -->
          @if (Auth::check())
              <li class="sidebar-item">
                  <a class="sidebar-link" href="/" id="get-url" aria-expanded="false">
                      <span>
                          <i class="ti ti-aperture"></i>
                      </span>
                      <span class="hide-menu">Product</span>
                  </a>
              </li>
          @endif
          <li class="sidebar-item">
            <a class="sidebar-link" href="../main/app-contact2.html" aria-expanded="false">
              <span>
                <i class="ti ti-list-details"></i>
              </span>
              <span class="hide-menu">Nasabah</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="../main/index3.html" aria-expanded="false">
              <span>
                <i class="ti ti-currency-dollar"></i>
              </span>
              <span class="hide-menu">Pengajuan Kredit </span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- ---------------------------------- -->
      <!-- Start Vertical Layout Sidebar -->
      <!-- ---------------------------------- -->
    </div>
  </aside>