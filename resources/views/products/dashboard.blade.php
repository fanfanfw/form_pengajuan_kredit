@extends('main')

@section('container')
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card w-100 position-relative overflow-hidden">
            <div class="px-4 py-3 border-bottom">
              <h4 class="card-title mb-0">Product Table</h4>
              <br>
              <button type="button" class="btn bg-success-subtle text-success" data-bs-toggle="modal" data-bs-target="#create-product-modal">Tambahkan Data</button>
            </div>
            <div class="card-body p-4">
            <div class="table-responsive mb-4 border rounded-1">
                <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">#</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Category</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Name</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Description</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Aksi</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>ss</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->description }}</td>
                      <td>
                        <button class="btn bg-warning-subtle text-warning" 
                        data-bs-toggle="modal" 
                        data-bs-target="#edit-modal-{{ $product->id }}">
                        <i class="fs-4 ti ti-edit"></i>Ubah</button>
                      <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn bg-danger-subtle text-danger" onclick="confirmDelete({{ $product->id }})"><i class="fs-4 ti ti-trash"></i>Hapus</button>
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
  @include('products.create')
  @include('products.edit')
  <script>
    function confirmDelete(productId) {
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
                // Jika pengguna menekan "Ya, hapus!"
                document.getElementById(`delete-form-${productId}`).submit();
            }
        });
    }
</script>
@endsection

