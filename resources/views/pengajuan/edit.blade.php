<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengajuan Kredit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Pengajuan Kredit</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending" {{ $pengajuan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $pengajuan->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $pengajuan->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="persetujuan" class="form-label">Catatan Persetujuan</label>
                <textarea name="persetujuan" id="persetujuan" class="form-control" rows="3">{{ $pengajuan->persetujuan }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
