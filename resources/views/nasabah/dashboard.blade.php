@extends('main')

@section('container')
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card w-100 position-relative overflow-hidden">
            <div class="px-4 py-3 border-bottom">
              <h4 class="card-title mb-0">Nasabah Table</h4>
              <br>
              <button type="button" class="btn bg-success-subtle text-success" data-bs-toggle="modal" data-bs-target="#registrasi-nasabah">Tambahkan Data</button>
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
                        <h6 class="fs-4 fw-semibold mb-0">No. Registrasi</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">No. KTP</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Nama</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Alamat</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">No. Telepon</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Aksi</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($nasabahs as $nasabah)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $nasabah->no_registrasi }}</td>
                     <td> {{ $nasabah->no_ktp }}</td>
                     <td>{{ $nasabah->nama }}</td>
                     <td>{{ $nasabah->alamat }}</td>
                     <td>{{ $nasabah->no_telepon }}</td>
                      <td>
                        <button class="btn bg-warning-subtle text-warning" 
                        data-bs-toggle="modal" 
                        data-bs-target="#edit-modal-{{ $nasabah->id }}">
                        <i class="fs-4 ti ti-edit"></i>Ubah</button>
                      <form id="delete-form-{{ $nasabah->id }}" action="{{ route('nasabah.destroy', $nasabah->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn bg-danger-subtle text-danger" onclick="confirmDelete({{ $nasabah->id }})"><i class="fs-4 ti ti-trash"></i>Hapus</button>
                      </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
  @include('nasabah.create')
  @include('nasabah.edit')


  <script>
    function confirmDelete(nasabahId) {
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
                document.getElementById(`delete-form-${nasabahId}`).submit();
            }
        });
    }
</script>

@endsection
