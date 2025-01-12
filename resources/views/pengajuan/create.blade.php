{{-- @extends('main')
@section('container')
<div class="container mt-5">
    <h2>Buat Pengajuan Kredit</h2>
    <form action="{{ route('pengajuan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="nasabah_id" value="{{ $nasabah->id }}">
        
        <div class="mb-3">
            <label for="nama_nasabah" class="form-label">Nama Nasabah</label>
            <input type="text" class="form-control" id="nama_nasabah" value="{{ $nasabah->nama }}" disabled>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Pilih Produk</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
            <input type="date" name="tanggal_pengajuan" class="form-control" id="tanggal_pengajuan" required>
        </div>

        <div class="mb-3">
            <label for="jaminan" class="form-label">Jaminan</label>
            <input type="text" name="jaminan" class="form-control" id="jaminan" placeholder="Masukkan Jaminan" required>
        </div>

        <div class="mb-3">
            <label for="jumlah_pengajuan" class="form-label">Jumlah Pengajuan</label>
            <input type="number" name="jumlah_pengajuan" class="form-control" id="jumlah_pengajuan" placeholder="Masukkan Jumlah Pengajuan" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajukan Kredit</button>
    </form>
</div>
@endsection --}}


@extends('main')

@section('container')

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card w-100 position-relative overflow-hidden">
            <div class="px-4 py-3 border-bottom">
                <h4 class="card-title mb-0">Form Pengajuan Kredit Baru</h4>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate action="{{ route('pengajuan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nasabah_id" value="{{ $nasabah->id }}">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="no_registrasi">No. Registrasi</label>
                            <input type="text" class="form-control" id="no_registrasi" value="{{ $nasabah->no_registrasi }}" disabled>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="no_ktp">No. KTP</label>
                            <input type="text" class="form-control" id="no_ktp" value="{{ $nasabah->no_ktp }}" disabled>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="nama">Nama Nasabah</label>
                            <input type="text" class="form-control" id="nama" value="{{ $nasabah->nama }}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="3" disabled>{{ $nasabah->alamat }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="no_telepon">No. Telepon</label>
                            <input type="text" class="form-control" id="no_telepon" value="{{ $nasabah->no_telepon }}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="tanggal_pengajuan">Tanggal Pengajuan</label>
                            <input type="date" class="form-control" name="tanggal_pengajuan" id="tanggal_pengajuan" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="product_id">Pilih Produk</label>
                            <select name="product_id" id="product_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Produk</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="jaminan">Jaminan</label>
                            <input type="text" class="form-control" name="jaminan" id="jaminan" placeholder="Masukkan Jaminan" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="jumlah_pengajuan">Jumlah Pengajuan</label>
                            <input type="text" class="form-control currency-input" name="jumlah_pengajuan" id="jumlah_pengajuan" placeholder="Masukkan Jumlah Pengajuan" required oninput="calculateJumlahDisetujui()">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="jumlah_acc">Jumlah Disetujui</label>
                            <input type="text" class="form-control currency-input" id="jumlah_acc" placeholder="Jumlah Disetujui" readonly>
                        </div>
                    </div>

                    <button class="btn btn-primary mt-3" type="submit">Ajukan Kredit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function calculateJumlahDisetujui() {
        const jumlahPengajuanInput = document.getElementById('jumlah_pengajuan');
        const jumlahAccInput = document.getElementById('jumlah_acc');

        // Parse value (remove dots for calculation)
        const jumlahPengajuan = parseInt(jumlahPengajuanInput.value.replace(/\./g, '') || 0);
        const materai = 10000; // Biaya materai tetap
        const asuransi = jumlahPengajuan * 0.01; // 1% dari jumlah pengajuan
        const totalPotongan = materai + asuransi;

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

@endsection
