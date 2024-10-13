@extends('layouts.admin.main') 
@section('title', 'Daftar Flash Sale')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Flash Sale</div>
            </div>
        </div>

        <a href="{{ route('flashsales.create') }}" class="btn btn-icon icon-left btn-primary">
            <i class="fas fa-plus"></i> Tambah Flash Sale
        </a>

        <div class="card-body mt-4">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Nama Flash Sale</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Diskon (%)</th>
                        <th>Action</th>
                    </tr>
                    @php $no = 0; @endphp
                    @forelse ($flashsales as $flashsale)
                    <tr>
                        <td>{{ $no += 1 }}</td>
                        <td>{{ $flashsale->name }}</td>
                        <td>{{ $flashsale->price }} Points</td>
                        <td>{{ $flashsale->category }}</td>
                        <td>{{ $flashsale->description }}</td>
                        <td>
                            <img src="{{ asset('images/' . $flashsale->image) }}" alt="{{ $flashsale->name }}" width="100">
                        </td>
                        <td>{{ $flashsale->diskon }}</td>
                        <td>
                            <a href="{{ route('flashsales.detail', $flashsale->id) }}" class="badge badge-info">Detail</a>
                            <a href="{{ route('flashsales.edit', $flashsale->id) }}" class="badge badge-warning">Edit</a>
                            <form action="{{ route('flashsales.delete', $flashsale->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge badge-danger border-0">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Data Flash Sale Kosong</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
</div>

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteButtons = document.querySelectorAll('form[onsubmit]');
        deleteButtons.forEach(form => {
            form.addEventListener('submit', function(event) {
                if (!confirm("Apakah Anda yakin ingin menghapus flash sale ini?")) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
@endsection
@endsection
