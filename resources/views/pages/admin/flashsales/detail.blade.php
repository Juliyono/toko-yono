@extends('layouts.admin.main')
@section('title', 'Admin Detail Flash Sale')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('flashsales.index') }}">Flash Sale</a>
                </div>
                <div class="breadcrumb-item">Detail Flash Sale</div>
            </div>
        </div>

        <a href="{{ route('flashsales.index') }}" class="btn btn-icon icon-left btn-warning"> <!-- Sesuaikan rute -->
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="row mt-4">
            <div class="col-12 col-md-4 col-lg-12 m-auto">
                <article class="article article-style-c">
                    <div class="article-header">
                        <div class="article-image" data-background="{{ asset('images/' . $flashSale->image) }}">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-category">
                            <a href="#">{{ $flashSale->name }}</a> <!-- Ganti dengan field yang benar -->
                            <div class="bullet"></div>
                            <a href="#">{{ $flashSale->category }}</a>
                        </div>
                        <div class="article-title">
                            <h2><a href="#">Harga Diskon: {{ $flashSale->diskon }} Points</a></h2> <!-- Ganti dengan field yang benar -->
                            <h5><a href="#">Harga Asli: {{ $flashSale->price }} Points</a></h5> <!-- Ganti dengan field yang benar -->
                        </div>
                        <hr>
                        <p>{{ $flashSale->description }}</p>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
@endsection
