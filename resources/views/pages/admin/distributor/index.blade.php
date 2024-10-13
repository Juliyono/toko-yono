@extends('layouts.admin.main')
@section('title', 'Admin Distributor')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Distributor</div>
            </div>
        </div>

        <!-- Button Tambah Distributor -->
        <a href="{{ route('distributors.create') }}" class="btn btn-icon icon-left btn-primary">
            <i class="fas fa-plus"></i> Tambah Distributor
        </a>

        <div class="card mt-4">
            <div class="card-body">
                <!-- Notifikasi menggunakan SweetAlert -->
                @if(session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: '{{ session('success') }}',
                            confirmButtonText: 'OK',
                        });
                    </script>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Distributor</th>
                                <th>Lokasi</th>
                                <th>Kontak</th>
                                <th>Email</th>
                                <th>Dibuat</th>
                                <th>Diperbarui</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($distributors as $distributor)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $distributor->nama_distributor }}</td>
                                    <td>{{ $distributor->lokasi }}</td>
                                    <td>{{ $distributor->kontak }}</td>
                                    <td>{{ $distributor->email }}</td>
                                    <td>{{ $distributor->created_at->format('d-m-Y H:i') }}</td>
                                    <td>{{ $distributor->updated_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('distributors.detail', $distributor->id) }}" class="btn btn-info btn-icon" title="Detail">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="{{ route('distributors.edit', $distributor->id) }}" class="btn btn-warning btn-icon" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('distributors.delete', $distributor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data Distributor Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
