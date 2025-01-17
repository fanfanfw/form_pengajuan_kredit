@extends('main')
@section('container')




<div class="body-wrapper">
  <div class="container-fluid">
     {{-- grafik --}}
  <div class="row">
    <div class="d-md-flex align-items-start gap-3">
      <div>
        <h6 class="mb-0">Grafik Pengajuan Kredit & Registrasi Nasabah</h6>
        <div class="d-flex align-items-center gap-3">
          <h2 class="mt-2 fw-bold">Statistik</h2>
        </div>
      </div>
      <div class="ms-auto">
        <select class="form-select" id="filterPeriode">
          <option value="6">6 Bulan Terakhir</option>
          <option value="12">1 Tahun Terakhir</option>
        </select>
      </div>
    </div>
    <div class="mt-4">
      <div id="grafikPengajuanNasabah" class="mx-n8"></div>
    </div>
  </div>
    
    <!-- Row 1 -->
    <div class="row">
      @php
      $categories = ['Kredit', 'Tabungan', 'Deposito'];
      $colors = ['text-bg-primary', 'text-bg-success', 'text-bg-warning'];
      @endphp

      @foreach ($categories as $index => $kategori)
        <div class="col-md-4 d-flex align-items-stretch">
          <div class="card w-100" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $kategori }}" aria-expanded="false" aria-controls="collapse-{{ $kategori }}" style="cursor: pointer;">
            <div class="card-header {{ $colors[$index] }}">
              <h4 class="mb-0 text-white card-title text-capitalize">{{ ucfirst($kategori) }}</h4>
            </div>
            <div class="card-body">
              <div class="collapse mt-3" id="collapse-{{ $kategori }}">
                <ul class="list-group">
                  @foreach ($products->where('kategori', $kategori) as $product)
                    <li class="list-group-item">{{ $product->name }}</li>
                  @endforeach
                  @if ($products->where('kategori', $kategori)->isEmpty())
                    <li class="list-group-item text-muted">Tidak ada produk</li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</div>
@endsection