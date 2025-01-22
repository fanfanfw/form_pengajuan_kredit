<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <!-- Core Css -->
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
 
  <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/dist/sweetalert2.min.css') }}">

  <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">


  <title>Dashboard | Pengajuan Kredit</title>
  <style>
 .dataTables_wrapper .top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px; /* Tambahkan jarak bawah */
}

.dataTables_wrapper .dataTables_length {
    margin-right: 15px; /* Tambahkan jarak kanan */
}

.dataTables_wrapper .dataTables_filter {
    margin-left: 15px; /* Tambahkan jarak kiri */
}

.sidebar-item.active > a {
    background-color: #e0f7fa; /* Warna latar aktif */
    color: #00796b; /* Warna teks aktif */
}
.sidebar-item.active > a i {
    color: #00796b; /* Warna ikon aktif */
}

.bi-checking-container {
  margin-right: 100px; /* Sesuaikan jarak antar elemen */
  margin-left: 150px;
}

.bi-checking-wrapper {
  display: flex;
  align-items: center;
}

.bi-logo {
  height: 24px; /* Tinggi logo */
  width: 24px; /* Lebar logo */
  object-fit: contain;
}

.bi-checking-wrapper span {
  font-size: 17px; /* Ukuran teks */
  vertical-align: middle;
}

.form-check-inline {
  margin-left: 5px; /* Jarak antara radio button dan teks */
  margin-right: 5px;
}


.logo-top {
    margin-bottom: 20px; /* Atur jarak antara logo dan menu */
}

.logo-top img {
    width: 80%; /* Atur ukuran logo */
    max-width: 200px; /* Maksimal ukuran logo */
    object-fit: contain; /* Pastikan logo proporsional */
}


.sidebar-hidden .logo-bottom {
    display: none;
}


.marquee-container {
    overflow: hidden; /* Menyembunyikan teks di luar batas */
    width: 100%; /* Atur sesuai kebutuhan */
    white-space: nowrap;
    position: relative;
}

.marquee {
    display: inline-block;
    white-space: nowrap; /* Pastikan teks tidak break */
    animation: marquee 20s linear infinite; /* Loop animasi terus menerus */
}

.marquee span {
    display: inline-block;
    padding-right: 50px; /* Jarak antar teks */
    font-size: 16px;
    color: #333;
}

/* Keyframes untuk animasi */
@keyframes marquee {
    0% {
        transform: translateX(100%); /* Mulai dari kanan */
    }
    100% {
        transform: translateX(-100%); /* Bergerak ke kiri */
    }
}

  </style>
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{ asset('assets/images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper">

    @include('partials.sidebar')
    
    <div class="page-wrapper">

      @include('partials.header')

        @yield('container')


      <script>
        function handleColorTheme(e) {
            document.documentElement.setAttribute("data-color-theme", e);
        }
      </script>

      <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="icon ti ti-settings fs-7"></i>
      </button>

      <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
          <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
            Settings
          </h4>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body h-n80" data-simplebar>
          <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

          <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <input type="radio" class="btn-check light-layout" name="theme-layout" id="light-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary rounded-2" for="light-layout">
              <i class="icon ti ti-brightness-up fs-7 me-2"></i>Light
            </label>

            <input type="radio" class="btn-check dark-layout" name="theme-layout" id="dark-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary rounded-2" for="dark-layout">
              <i class="icon ti ti-moon fs-7 me-2"></i>Dark
            </label>
          </div>

          <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
          <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="ltr-layout">
              <i class="icon ti ti-text-direction-ltr fs-7 me-2"></i>LTR
            </label>

            <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="rtl-layout">
              <i class="icon ti ti-text-direction-rtl fs-7 me-2"></i>RTL
            </label>
          </div>

          <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

          <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
            <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
                <i class="ti ti-check text-white d-flex icon fs-5"></i>
              </div>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
                <i class="ti ti-check text-white d-flex icon fs-5"></i>
              </div>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
                <i class="ti ti-check text-white d-flex icon fs-5"></i>
              </div>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="green-theme-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Green_Theme')" for="green-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
                <i class="ti ti-check text-white d-flex icon fs-5"></i>
              </div>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
                <i class="ti ti-check text-white d-flex icon fs-5"></i>
              </div>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="orange-theme-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Orange_Theme')" for="orange-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
                <i class="ti ti-check text-white d-flex icon fs-5"></i>
              </div>
            </label>
          </div>

          <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
          <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <div>
              <input type="radio" class="btn-check" name="page-layout" id="vertical-layout" autocomplete="off" />
              <label class="btn p-9 btn-outline-primary" for="vertical-layout">
                <i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Vertical
              </label>
            </div>
            <div>
              <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout" autocomplete="off" />
              <label class="btn p-9 btn-outline-primary" for="horizontal-layout">
                <i class="icon ti ti-layout-navbar fs-7 me-2"></i>Horizontal
              </label>
            </div>
          </div>

          <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

          <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="boxed-layout">
              <i class="icon ti ti-layout-distribute-vertical fs-7 me-2"></i>Boxed
            </label>

            <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="full-layout">
              <i class="icon ti ti-layout-distribute-horizontal fs-7 me-2"></i>Full
            </label>
          </div>

          <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
          <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <a href="javascript:void(0)" class="fullsidebar">
              <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar" autocomplete="off" />
              <label class="btn p-9 btn-outline-primary" for="full-sidebar">
                <i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Full
              </label>
            </a>
            <div>
              <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar" autocomplete="off" />
              <label class="btn p-9 btn-outline-primary" for="mini-sidebar">
                <i class="icon ti ti-layout-sidebar fs-7 me-2"></i>Collapse
              </label>
            </div>
          </div>

          <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

          <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <input type="radio" class="btn-check" name="card-layout" id="card-with-border" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="card-with-border">
              <i class="icon ti ti-border-outer fs-7 me-2"></i>Border
            </label>

            <input type="radio" class="btn-check" name="card-layout" id="card-without-border" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="card-without-border">
              <i class="icon ti ti-border-none fs-7 me-2"></i>Shadow
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
  <!-- Import Js Files -->
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
  <script src="{{ asset('assets/js/theme/theme.js') }}"></script>
  <script src="{{ asset('assets/js/theme/app.min.js') }}"></script>
  <script src="{{ asset('assets/js/theme/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/js/theme/app.minisidebar.init.js') }}"></script>

  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/js/dashboards/dashboard.js') }}"></script>
  <script src="{{ asset('assets/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/js/forms/sweet-alert.init.js') }}"></script>
  <script src="{{ asset('assets/js/forms/custom-validation-init.js') }}"></script>
  <script src="{{ asset('assets/js/extra-libs/jqbootstrapvalidation/validation.js') }}"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        @if(session('success'))
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        @endif
    });
</script>
<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>


<script src="{{ asset('assets/js/datatable/datatable-api.init.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-basic.init.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable.init.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-advanced.init.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-validation-init.js') }}"></script>
<script src="{{ asset('assets/js/dashboards/dashboard5.js') }}"></script>
<script src="{{ asset('assets/llibs/owl.carousel/distowl.carousel.min.js') }}"></script>


<script>
  $(document).ready(function() {
      $('#myTable').DataTable({
      responsive: true,
      dom: '<"top"lBf>rt<"bottom"ip><"clear">', // Posisi dropdown dan tombol di atas
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      lengthMenu: [10, 25, 50, 100],
      language: {
          search: "Cari:",
          lengthMenu: "Tampilkan _MENU_ data per halaman",
          zeroRecords: "Tidak ada data ditemukan",
          info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
          infoEmpty: "Tidak ada data tersedia",
          infoFiltered: "(disaring dari _MAX_ total data)",
          paginate: {
              first: "Pertama",
              last: "Terakhir",
              next: "Berikutnya",
              previous: "Sebelumnya"
          }
      }
  });
});
</script>
<script>
  document.querySelectorAll('.jumlah_pengajuan').forEach((input) => {
      input.addEventListener('input', function () {
          const formattedValue = this.value.replace(/\./g, '').replace(/\D/g, '');
          const parsedValue = parseInt(formattedValue || 0);
          const asuransi = parsedValue * 0.18;
          const jumlahDisetujui = Math.max(parsedValue - asuransi, 0);

          // Format input kembali dengan titik
          this.value = new Intl.NumberFormat('id-ID').format(parsedValue);

          // Update jumlah_acc yang sesuai
          const jumlahAccInput = this.closest('.modal-body').querySelector('.jumlah_acc');
          jumlahAccInput.value = new Intl.NumberFormat('id-ID').format(jumlahDisetujui);
      });
  });
</script>

<script>
  function calculateJumlahDisetujui() {
      const jumlahPengajuanInput = document.getElementById('jumlah_pengajuan');
      const jumlahAccInput = document.getElementById('jumlah_acc');

      const jumlahPengajuan = parseInt(jumlahPengajuanInput.value.replace(/\./g, '') || 0);
      const asuransi = jumlahPengajuan * 0.18;
      const totalPotongan = asuransi;

      const jumlahAcc = jumlahPengajuan - totalPotongan;

      // Update input values with formatted numbers
      jumlahAccInput.value = formatCurrency(jumlahAcc > 0 ? jumlahAcc : 0);
  }

  function formatCurrency(value) {
      // Convert number to string with thousand separators
      return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  }

  document.querySelectorAll('.currency-input').forEach(input => {
      input.addEventListener('input', (e) => {
          // Remove non-digit characters
          let value = e.target.value.replace(/\D/g, '');

          // Format as currency with thousand separators
          e.target.value = formatCurrency(value);
      });
  });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        @isset($pengajuanKredit)
        const pengajuanKredit = @json($pengajuanKredit);
        const registrasiNasabah = @json($registrasiNasabah);

        // Labels (tanggal)
        const labels = Object.keys(pengajuanKredit);

        // Data pengajuan kredit
        const dataPengajuan = Object.values(pengajuanKredit);

        // Data registrasi nasabah
        const dataRegistrasi = labels.map(label => registrasiNasabah[label] || 0);

        // Konfigurasi ApexCharts
        const options = {
            chart: {
                type: 'line',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            series: [
                {
                    name: 'Pengajuan Kredit',
                    data: dataPengajuan
                },
                {
                    name: 'Registrasi Nasabah',
                    data: dataRegistrasi
                }
            ],
            xaxis: {
                categories: labels,
                title: {
                    text: 'Periode (YYYY-MM)'
                }
            },
            yaxis: {
                title: {
                    text: 'Jumlah'
                },
                min: 0
            },
            stroke: {
                curve: 'smooth'
            },
            tooltip: {
                shared: true,
                intersect: false
            },
            colors: ['#FF4560', '#008FFB']
        };

        const chart = new ApexCharts(document.querySelector("#grafikPengajuanNasabah"), options);
        chart.render();
        @endisset
    });
</script>

<script>
function handleBICheckingSelection(selectedOption) {
  const yesCheckbox = document.getElementById('biCheckingYes');
  const noCheckbox = document.getElementById('biCheckingNo');

  // Pastikan hanya satu opsi yang dapat dipilih
  if (selectedOption.value === 'yes') {
    noCheckbox.checked = false;
  } else if (selectedOption.value === 'no') {
    yesCheckbox.checked = false;
  }
}
</script>

<script>
  $(document).ready(function () {
      $(".owl-carousel").owlCarousel({
          loop: true, // Mengaktifkan looping
          margin: 10, // Margin antar item
          nav: true, // Tombol navigasi
          dots: true, // Tampilkan indikator dot
          responsive: {
              0: { items: 1 }, // Layar kecil: 1 item
              600: { items: 3 }, // Layar sedang: 3 item
              1000: { items: 5 } // Layar besar: 5 item
          }
      });
  });

  function toggleSidebar() {
    const sidebar = document.querySelector('.left-sidebar');
    sidebar.classList.toggle('sidebar-hidden');
}


</script>

</body>

</html>