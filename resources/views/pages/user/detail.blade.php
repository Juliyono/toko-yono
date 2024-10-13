@extends('layouts.user.main')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Halaman Detail Produk</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('user.dashboard') }}">Home<span class="lnr lnr-arrow-right"> </span></a>
                    <a href="single-product.html">Detail Produk</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<section class="section_gap">
    <!--================Flash Sale Area =================-->
    <div class="flash_sale_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Flash Sale</h1>
                        <p>Dapatkan produk terbaik dengan harga diskon!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single flash sale -->
                @forelse ($flashsales as $flashsale)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('images/' . $flashsale->image) }}" alt="">
                            <div class="product-details">
                                <h6>{{ $flashsale->name }}</h6>
                                <div class="price">
                                    <!-- Harga asli dicoret -->
                                    <h6><del>{{ number_format($flashsale->price) }} Points</del></h6>
                                    
                                    <!-- Harga setelah diskon -->
                                    @php
                                        $discountedPrice = $flashsale->price - $flashsale->diskon;
                                    @endphp
                                    <h6>{{ number_format($discountedPrice) }} Points</h6>

                                    <!-- Informasi Diskon -->
                                    <span class="discount">Diskon: {{ number_format($flashsale->diskon) }} Points</span>
                                </div>
                                <div class="prd-bottom">
                                    <a class="social-info" href="javascript:void(0);" onclick="confirmPurchase('{{ $flashsale->id }}', '{{ Auth::user()->id }}')">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">Beli</p>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 col-md-12">
                        <div class="single-product">
                            <h3 class="text-center">Tidak ada flash sale</h3>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!--================End Flash Sale Area =================-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ asset('images/' . $product->image) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $product->name }}</h3>

                        <!-- Harga asli dicoret -->
                        <h4><del>{{ number_format($product->price) }} Points</del></h4>

                        <!-- Harga setelah diskon -->
                        @php
                            $discountedPrice = $product->price - ($product->price * $product->diskon / 100);
                        @endphp
                        <h2>{{ number_format($discountedPrice) }} Points</h2>

                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Kategori</span> : {{ $product->category }}
                                </a>
                            </li>
                        </ul>
                        <p>{{ $product->description }}</p>
                        <div class="card_area d-flex align-items-center">
                            <a class="primary-btn" href="javascript:void(0);" onclick="confirmPurchase('{{ $product->id }}', '{{ Auth::user()->id }}')">Beli Produk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmPurchase(productId, userId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan membeli produk ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Beli!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/product/purchase/' + productId + '/' + userId;
            }
        });
    }
</script>
@endsection
