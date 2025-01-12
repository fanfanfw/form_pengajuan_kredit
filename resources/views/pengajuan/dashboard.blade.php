@extends('main')

@section('container')
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card w-100 position-relative overflow-hidden">
            <div class="px-4 py-3 border-bottom">
              <h4 class="card-title mb-0">Pengajuan Kredit Table</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive mb-4 border rounded-1">
                <table id="myTable" class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">#</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Tanggal Pengajuan</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">No. Registrasi</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">No. KTP</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Nama Nasabah</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Produk</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Jaminan</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Jumlah Pengajuan</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Jumlah Disetujui</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Update Status</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Aksi</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pengajuans as $pengajuan)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $pengajuan->tanggal_pengajuan }}</td>
                     <td> {{ $pengajuan->nasabah->no_registrasi }}</td>
                     <td>{{ $pengajuan->nasabah->no_ktp }}</td>
                     <td>{{ $pengajuan->nasabah->nama }}</td>
                     <td>{{ $pengajuan->product->name }}</td>
                     <td>{{ $pengajuan->jaminan }}</td>
                     <td>Rp {{ number_format($pengajuan->jumlah_pengajuan, 0, ',', '.') }}</td>
                     <td>Rp {{ number_format($pengajuan->jumlah_acc, 0, ',', '.') }}</td>
                     <td>
                      @if ($pengajuan->status === 'pending')
                          <span class="mb-1 badge text-bg-warning">{{ $pengajuan->status }}</span>
                      @elseif ($pengajuan->status === 'rejected')
                          <span class="mb-1 badge text-bg-danger">{{ $pengajuan->status }}</span>
                      @elseif ($pengajuan->status === 'approved')
                          <span class="mb-1 badge text-bg-success">{{ $pengajuan->status }}</span>
                      @else
                          <span class="mb-1 badge text-bg-secondary">{{ $pengajuan->status }}</span>
                      @endif
                  </td>
                  <td>
                      @if ($pengajuan->status === 'pending')
                          <form action="{{ route('pengajuan.updateStatus', $pengajuan->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" name="status" value="approved" class="btn btn-success btn-sm">
                                  Approve
                              </button>
                              <button type="submit" name="status" value="rejected" class="btn btn-danger btn-sm">
                                  Reject
                              </button>
                          </form>
                      @else
                          <span class="text-muted">N/A</span>
                      @endif
                  </td>
                  <td>
                      @if ($pengajuan->status === 'pending')
                          <button class="btn bg-warning-subtle text-warning" 
                          data-bs-toggle="modal" 
                          data-bs-target="#edit-modal-{{ $pengajuan->id }}">
                          <i class="fs-4 ti ti-edit"></i>Ubah</button>
                          <form id="delete-form-{{ $pengajuan->id }}" action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST" style="display: inline;">
                              @csrf
                              @method('DELETE')
                              <button class="btn bg-danger-subtle text-danger" onclick="confirmDelete({{ $pengajuan->id }})"><i class="fs-4 ti ti-trash"></i>Hapus</button>
                          </form>
                      @else
                          <span class="text-muted">N/A</span>
                      @endif
                  </td>
                  
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
  @include('pengajuan.edit')

  <script>
    function confirmDelete(pengajuanId) {
        event.preventDefault(); // Mencegah form langsung dikirim
        Swal.fire({
            title: "Yakin ingin menghapus?",
            text: "Data produk akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batalkan"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${pengajuanId}`).submit();
            }
        });
    }
</script>
</div>
@endsection
