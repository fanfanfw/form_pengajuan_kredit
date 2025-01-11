{{-- modal edit --}}
@foreach ($products as $product)
<div class="modal fade" id="edit-modal-{{ $product->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="editModalLabel{{ $product->id }}">Edit Product</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Penting untuk mendefinisikan metode PUT -->
                    <div class="mb-3">
                        <label for="name-{{ $product->id }}" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name-{{ $product->id }}" value="{{ $product->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description-{{ $product->id }}" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description-{{ $product->id }}" rows="3" required>{{ $product->description }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach



