<!-- Modal Create -->
@foreach($nasabahs as $nasabah)
<div class="modal fade" id="edit-modal-{{ $nasabah->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $nasabah->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="createModalLabel{{ $nasabah->id }}">Edit Data Nasabah</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('nasabah.update', $nasabah->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="no_ktp" class="form-label">No. KTP</label>
                        <input type="text" name="no_ktp" class="form-control" id="no_ktp-{{ $nasabah->id }}" value="{{ $nasabah->no_ktp }}" placeholder="Masukkan Nomor KTP Nasabah" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama-{{ $nasabah->id }}" value="{{ $nasabah->nama }}" rows="3" placeholder="Masukkan Nama Nasabah" required></input>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat-{{ $nasabah->id }}" rows="3" placeholder="Masukkan Alamat Nasabah" required>{{ $nasabah->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No. Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" id="no_telepon-{{ $nasabah->id }}" value="{{ $nasabah->no_telepon }}" rows="3" placeholder="Masukkan Nomor Telepon Nasabah" required></input>
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