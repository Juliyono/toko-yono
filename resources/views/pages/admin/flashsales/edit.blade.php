@extends('layouts.admin.main')
@section('title', 'Admin Edit Flash Sale')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('flashsales.index') }}">Flash Sale</a>
                </div>
                <div class="breadcrumb-item">Edit Flash Sale</div>
            </div>
        </div>

        <a href="{{ route('flashsales.index') }}" class="btn btn-icon icon-left btn-warning">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card mt-4">
            <form action="{{ route('flashsales.update', $flashsale->id) }}" class="needs-validation" novalidate="" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT') <!-- Tambahkan ini -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_name">Nama Produk</label>
                                <input id="product_name" type="text" class="form-control" name="name" required="" value="{{ $flashsale->name }}">
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="original_price">Harga Asli (Point)</label>
                                <input id="original_price" type="number" class="form-control" name="price" required="" value="{{ $flashsale->price }}">
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="discounted_price">Harga Diskon (Point)</label>
                                <input id="discounted_price" type="number" class="form-control" name="diskon" required="" value="{{ $flashsale->diskon }}">
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="category">Kategori</label>
                                <input id="category" type="text" class="form-control" name="category" required="" value="{{ $flashsale->category }}">
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="4" required="">{{ $flashsale->description }}</textarea>
                                <div class="invalid-feedback">
                                    Kolom deskripsi harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" name="image" id="customFile" type="file">
                                    <label class="custom-file-label" for="customFile">Pilih Gambar (opsional)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
