@extends('layouts.admin.main')
@section('title', 'Admin Product')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="breadcrumb-item">
                <h1>Produk</h1> 
            </div>
        </div>
        <a href="#" class="btn btn-icon icon-left btn-primary">
            <i class="fas fa-plus"></i> Produk
        </a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $no = 0;
                    @endphp
                    @forelse ($products as $item)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }} Points</td>
                        <td>{{ $item->stock }}</td>
                        <td>
                            <a href="#" class="badge badge-info">Detail</a>
                            <a href="#" class="badge badge-warning">Edit</a>
                            <a href="#" class="badge badge-danger">Hapus</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Data Produk Kosong</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
