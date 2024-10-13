@extends('layouts.admin.main')

@section('title', 'Tambah Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Distributor</h1>
        </div>

        <form action="{{ route('distributors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Distributor</label>
                <input type="text" name="nama_distributor" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kontak</label>
                <input type="text" name="kontak" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.Distributor') }}" class="btn btn-warning">Kembali</a> <!-- Tombol Kembali dengan warna kuning -->
        </form>
    </section>
</div>
@endsection
