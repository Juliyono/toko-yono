@extends('layouts.admin.main')

@section('title', 'Edit Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Distributor</h1>
        </div>

        <form action="{{ route('distributors.update', $distributor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Distributor</label>
                <input type="text" name="nama_distributor" class="form-control" value="{{ $distributor->nama_distributor }}" required>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ $distributor->lokasi }}" required>
            </div>
            <div class="form-group">
                <label>Kontak</label>
                <input type="text" name="kontak" class="form-control" value="{{ $distributor->kontak }}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $distributor->email }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Perbarui</button>
        </form>
    </section>
</div>
@endsection
