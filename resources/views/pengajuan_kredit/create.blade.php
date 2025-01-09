<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Kredit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Pengajuan Kredit</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/pengajuan-kredit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nasabah_id" class="form-label">Nasabah</label>
                <select name="nasabah_id" id="nasabah_id" class="form-control" required>
                    <option value="">-- Pilih Nasabah --</option>
                    @foreach ($nasabah as $n)
                        <option value="{{ $n->id }}">{{ $n->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="product_id" class="form-label">Produk</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jaminan" class="form-label">Jaminan</label>
                <input type="text" name="jaminan" id="jaminan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_pengajuan" class="form-label">Jumlah Pengajuan</label>
                <input type="number" name="jumlah_pengajuan" id="jumlah_pengajuan" class="form-control" required>
            </div>
            {{-- <div class="mb-3">
                <label for="jumlah_acc" class="form-label">Jumlah ACC (Opsional)</label>
                <input type="number" name="jumlah_acc" id="jumlah_acc" class="form-control">
            </div> --}}

            <div class="mb-3">
                <label for="jumlah_acc" class="form-label">Jumlah ACC (Setelah Potongan)</label>
                <input type="number" name="jumlah_acc" id="jumlah_acc" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label for="potongan_total" class="form-label">Total Potongan</label>
                <input type="number" id="potongan_total" class="form-control" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Ajukan Kredit</button>
        </form>
    </div>

    
    
    <script>
        document.getElementById('jumlah_pengajuan').addEventListener('input', function () {
            const pengajuan = parseFloat(this.value) || 0;
            
            // Hitung potongan
            const potonganMaterai = 10000; // Contoh biaya materai tetap
            const potonganAsuransi = pengajuan * 0.01; // 1% dari jumlah pengajuan
            const totalPotongan = potonganMaterai + potonganAsuransi;
    
            // Hitung jumlah ACC
            const jumlahACC = pengajuan - totalPotongan;
    
            // Tampilkan hasil di input jumlah_acc
            document.getElementById('potongan_total').value = totalPotongan.toFixed(2);
            document.getElementById('jumlah_acc').value = jumlahACC > 0 ? jumlahACC.toFixed(2) : 0;
        });

        
    </script>
</body>
</html>
