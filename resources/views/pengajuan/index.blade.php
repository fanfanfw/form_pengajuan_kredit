<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajuan Kredit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Pengajuan Kredit</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No Registrasi</th>
                    <th>Nama Nasabah</th>
                    <th>Jaminan</th>
                    <th>Jumlah Pengajuan</th>
                    <th>Jumlah ACC</th>
                    <th>Status</th>
                    <th>Persetujuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengajuanKredits as $pengajuan)
                <tr>
                    <td>{{ $pengajuan->nasabah->no_registrasi }}</td>
                    <td>{{ $pengajuan->nasabah->nama }}</td>
                    <td>{{ $pengajuan->jaminan }}</td>
                    <td>{{ number_format($pengajuan->jumlah_pengajuan, 2) }}</td>
                    <td>{{ number_format($pengajuan->jumlah_acc, 2) }}</td>
                    <td>{{ ucfirst($pengajuan->status) }}</td>
                    <td>{{ $pengajuan->persetujuan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('pengajuan.edit', $pengajuan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
