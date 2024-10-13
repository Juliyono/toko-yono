@extends('layouts.admin.main')

@section('title', 'Detail Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Distributor</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <h5>Nama Distributor: {{ $distributor->nama_distributor }}</h5>
                <p><strong>Lokasi:</strong> {{ $distributor->lokasi }}</p>
                <p><strong>Kontak:</strong> {{ $distributor->kontak }}</p>
                <p><strong>Email:</strong> {{ $distributor->email }}</p>
                <p><strong>Dibuat:</strong> {{ $distributor->created_at->format('d-m-Y H:i') }}</p>
                <p><strong>Diperbarui:</strong> {{ $distributor->updated_at->format('d-m-Y H:i') }}</p>

                <!-- Tombol Edit dihapus -->
                <a href="{{ route('admin.Distributor') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </section>
</div>
@endsection
