@extends('main')

{{-- @section('container')
<div class="container">
    <h1>Daftar Produk</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Tambah Produk</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Ubah</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}

{{-- @section('container')
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card w-100 position-relative overflow-hidden">
            <div class="px-4 py-3 border-bottom">
              <h4 class="card-title mb-0">Product Table</h4>
        </div>
            <div class="card-body p-4">
                <div class="table-responsive mb-4 border rounded-1">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="fs-4 fw-semibold mb-0" scope="col">
                                        <h6 class="fs-4 fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="fs-4 fw-semibold mb-0" scope="col">
                                        <h6 class="fs-4 fw-semibold mb-0">Description</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <h6 class="fs-4 fw-semibold mb-0">{{ $product->name }}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <h6 class="fs-4 fw-semibold mb-0">{{ $product->description }}</h6>
                                        </div>
                                    </td>
                                </tr>    
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



{{-- @section('container')
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card w-100 position-relative overflow-hidden">
            <div class="px-4 py-3 border-bottom">
              <h4 class="card-title mb-0">Product Table</h4>
            </div>
        <div class="table-responsive">  
            <table class="table mb-0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>  
        </div>
    </div>
</div>
@endsection --}}

@section('container')
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card w-100 position-relative overflow-hidden">
            <div class="px-4 py-3 border-bottom">
              <h4 class="card-title mb-0">Product Table</h4>
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
                    @foreach ($products as $index => $product)
                        
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">{{ $product->name }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">{{ $product->description }}</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <p class="mb-0 fw-normal fs-4">Aksi</p>
                        </div>
                      </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>
@endsection