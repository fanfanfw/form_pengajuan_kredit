@foreach($pengajuans as $pengajuan)
<div class="modal fade" id="edit-modal-{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $pengajuan->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="editModalLabel{{ $pengajuan->id }}">Edit Pengajuan Kredit</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                        <input type="date" name="tanggal_pengajuan" class="form-control" id="tanggal_pengajuan-{{ $pengajuan->id }}" value="{{ $pengajuan->tanggal_pengajuan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Produk</label>
                        <select name="product_id" id="product_id-{{ $pengajuan->id }}" class="form-control" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" @if($product->id == $pengajuan->product_id) selected @endif>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jaminan" class="form-label">Jaminan</label>
                        <input type="text" name="jaminan" class="form-control" id="jaminan-{{ $pengajuan->id }}" value="{{ $pengajuan->jaminan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_pengajuan" class="form-label">Jumlah Pengajuan</label>
                        <input type="text" name="jumlah_pengajuan" class="form-control jumlah_pengajuan" id="jumlah_pengajuan-{{ $pengajuan->id }}" value="{{ number_format($pengajuan->jumlah_pengajuan, 0, ',', '.') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_acc" class="form-label">Jumlah Disetujui</label>
                        <input type="text" name="jumlah_acc" class="form-control jumlah_acc" id="jumlah_acc-{{ $pengajuan->id }}" value="{{ number_format($pengajuan->jumlah_acc, 0, ',', '.') }}" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach