<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku Cirebon</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #0a0f1a 0%, #0d1422 100%);
            color: #e8edf5;
            font-family: 'Inter', sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(7, 12, 23, 0.95);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding: 16px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 24px;
            background: linear-gradient(135deg, #ffffff, #00e5a0);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-link {
            color: #8a99b9 !important;
            font-size: 14px;
            font-weight: 500;
            transition: color .2s;
        }

        .nav-link:hover {
            color: #00e5a0 !important;
        }

        .btn-success {
            background: linear-gradient(135deg, #00e5a0, #00b87a) !important;
            border: none !important;
            color: #0a0f1a !important;
            font-weight: 600;
            border-radius: 10px;
            padding: 8px 20px;
        }

        .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.15) !important;
            color: #e8edf5 !important;
            border-radius: 10px;
        }

        .btn-outline-light:hover {
            background: rgba(0, 229, 160, 0.1) !important;
            border-color: #00e5a0 !important;
            color: #00e5a0 !important;
        }

        .btn-danger {
            background: transparent !important;
            border: 1px solid rgba(239, 68, 68, 0.4) !important;
            color: #f87171 !important;
            font-size: 13px;
            border-radius: 10px;
        }

        .btn-danger:hover {
            background: rgba(239, 68, 68, 0.1) !important;
        }

        /* HERO SECTION */
        .hero {
            background: linear-gradient(135deg, #0d2a1e 0%, #0a1f2e 100%);
            border: 1px solid rgba(0, 229, 160, 0.15);
            border-radius: 32px;
            margin: 30px 0 40px;
            overflow: hidden;
        }

        .hero-content {
            padding: 60px 50px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: #00e5a0;
        }

        .hero p {
            color: #8a99b9;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .hero-image {
            padding: 40px;
            text-align: center;
        }

        .hero-image img {
            max-width: 80%;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        .btn-hero {
            background: #00e5a0;
            border: none;
            color: #0a0f1a;
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 12px;
            transition: all 0.3s;
        }

        .btn-hero:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 229, 160, 0.3);
            color: #0a0f1a;
        }

        /* SECTION TITLE */
        .section-title {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 32px;
            margin-bottom: 32px;
            position: relative;
            display: inline-block;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #00e5a0, transparent);
            border-radius: 3px;
        }

        /* INFO CARD */
        .info-card {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 20px;
            padding: 24px;
            text-align: center;
            transition: all 0.3s;
        }

        .info-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 229, 160, 0.3);
        }

        .info-icon {
            width: 60px;
            height: 60px;
            background: rgba(0, 229, 160, 0.1);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 28px;
            color: #00e5a0;
        }

        /* ABOUT CARD */
        .about-card {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 28px;
            padding: 40px;
            margin-bottom: 40px;
        }

        /* SEARCH */
        .search-box {
            margin-bottom: 40px;
        }

        .search-box .form-control {
            background: #0f1724 !important;
            border: 1.5px solid rgba(255, 255, 255, 0.06) !important;
            color: #e8edf5 !important;
            border-radius: 14px !important;
            padding: 14px 18px;
        }

        .search-box .form-control:focus {
            border-color: #00e5a0 !important;
            box-shadow: 0 0 0 3px rgba(0, 229, 160, 0.1) !important;
        }

        /* CATEGORY TABS */
        .category-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 40px;
        }

        .category-tab {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #8a99b9;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
        }

        .category-tab:hover,
        .category-tab.active {
            background: rgba(0, 229, 160, 0.15);
            border-color: #00e5a0;
            color: #00e5a0;
        }

        /* BEST SELLER SECTION */
        .best-seller-section {
            margin-bottom: 60px;
        }

        .best-seller-card {
            background: linear-gradient(135deg, #131c2e, #0f1724);
            border: 1px solid rgba(0, 229, 160, 0.2);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
        }

        .best-seller-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .best-seller-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .best-seller-body {
            padding: 16px;
            text-align: center;
        }

        .best-seller-title {
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .best-seller-price {
            color: #00e5a0;
            font-weight: 700;
            font-size: 16px;
        }

        /* PRODUCT CARDS */
        .product-card {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 229, 160, 0.3);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .product-img {
            width: 100%;
            height: auto;
            aspect-ratio: 3 / 4;
            object-fit: contain;
            background: #0f1724;
            padding: 8px;
        }

        .product-body {
            padding: 12px;
        }

        .product-title {
            font-family: 'Playfair Display', serif;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 6px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-price {
            font-size: 15px;
            font-weight: 700;
            color: #00e5a0;
            margin-bottom: 6px;
        }

        .product-stock {
            font-size: 11px;
            color: #8a99b9;
            margin-bottom: 10px;
        }

        .btn-detail {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #e8edf5;
            border-radius: 8px;
            padding: 8px;
            width: 100%;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-detail:hover {
            background: #00e5a0;
            border-color: #00e5a0;
            color: #0a0f1a;
        }

        /* BEST SELLER CARDS */
        .best-seller-card {
            background: linear-gradient(135deg, #131c2e, #0f1724);
            border: 1px solid rgba(0, 229, 160, 0.2);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
        }

        .best-seller-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .best-seller-img {
            width: 100%;
            height: auto;
            aspect-ratio: 3 / 4;
            object-fit: contain;
            background: #0f1724;
            padding: 8px;
        }

        .best-seller-body {
            padding: 10px;
            text-align: center;
        }

        .best-seller-title {
            font-weight: 700;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .best-seller-price {
            color: #00e5a0;
            font-weight: 700;
            font-size: 14px;
        }

        /* BEST SELLER BADGE */
        .best-seller-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            z-index: 10;
        }

        /* PAGINATION */
        .pagination {
            margin-top: 40px;
            justify-content: center;
        }

        .pagination .page-link {
            background: #0f1724;
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #e8edf5;
            padding: 10px 16px;
            margin: 0 4px;
            border-radius: 10px;
        }

        .pagination .page-link:hover {
            background: rgba(0, 229, 160, 0.1);
            border-color: #00e5a0;
            color: #00e5a0;
        }

        .pagination .active .page-link {
            background: #00e5a0;
            border-color: #00e5a0;
            color: #0a0f1a;
        }

        /* FOOTER */
        footer {
            background: #070c17;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            margin-top: 60px;
            padding: 48px 0 24px;
        }

        .footer-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 22px;
            background: linear-gradient(135deg, #ffffff, #00e5a0);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 16px;
        }

        .footer-link {
            color: #8a99b9;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.2s;
            display: inline-block;
            margin-bottom: 8px;
        }

        .footer-link:hover {
            color: #00e5a0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content {
                padding: 40px 24px;
                text-align: center;
            }

            .hero h1 {
                font-size: 32px;
            }

            .section-title {
                font-size: 24px;
            }

            .info-card {
                padding: 16px;
            }

            .info-icon {
                width: 48px;
                height: 48px;
                font-size: 22px;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 28px;
            }

            .btn-hero {
                width: 100%;
            }

            .category-tabs {
                flex-wrap: nowrap;
                overflow-x: auto;
                padding-bottom: 8px;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .hero-content {
                    padding: 40px 24px;
                    text-align: center;
                }

                .hero h1 {
                    font-size: 32px;
                }

                .section-title {
                    font-size: 24px;
                }

                .info-card {
                    padding: 16px;
                }

                .info-icon {
                    width: 48px;
                    height: 48px;
                    font-size: 22px;
                }
            }

            @media (max-width: 576px) {
                .hero h1 {
                    font-size: 28px;
                }

                .btn-hero {
                    width: 100%;
                }

                .category-tabs {
                    flex-wrap: nowrap;
                    overflow-x: auto;
                    padding-bottom: 8px;
                }
            }
        }
    </style>

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-book"></i> Toko Buku Cirebon
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">Keranjang</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('orders') }}">Pesanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('history') }}">Riwayat</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('my.profile') }}">Profile</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger ms-2">Logout</button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="btn btn-success me-2">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="btn btn-outline-light">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <div class="container">
        <div class="hero">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="hero-content">
                        <h1>Temukan <span>Buku Favoritmu</span> ❤️</h1>
                        <p>Belanja buku online dengan mudah, cepat, dan modern. Ribuan koleksi buku siap mengisi harimu.</p>
                        <a href="#produk" class="btn-hero">
                            <i class="fas fa-shopping-cart"></i> Belanja Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image">
                        <div style="background: linear-gradient(135deg, #00e5a0, #00b87a); 
                                border-radius: 24px; 
                                padding: 30px 20px; 
                                text-align: center;
                                box-shadow: 0 20px 40px rgba(0,229,160,0.2);">
                            <i class="fas fa-gift" style="font-size: 48px; color: #0a0f1a; margin-bottom: 16px;"></i>
                            <h3 style="color: #0a0f1a; font-weight: 900; margin-bottom: 8px;">GRATIS ONGKIR</h3>
                            <p style="color: #0a0f1a; margin-bottom: 8px;">Minimal Belanja</p>
                            <h2 style="color: #0a0f1a; font-weight: 900; font-size: 36px;">Rp 250.000</h2>
                            <hr style="border-color: rgba(10,15,26,0.2); margin: 16px 0;">
                            <p style="color: #0a0f1a; font-size: 12px; margin: 0;">
                                <i class="fas fa-truck"></i> Seluruh Indonesia
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- INFO CARD -->
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-book"></i></div>
                    <h5 style="color: #ffffff;">Ribuan Buku</h5>
                    <p class="small text-muted" style="color: #8a99b9 !important;">Koleksi lengkap & update setiap minggu</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-truck"></i></div>
                    <h5 style="color: #ffffff;">Pengiriman Cepat</h5>
                    <p class="small text-muted" style="color: #8a99b9 !important;">Seluruh Indonesia dengan kurir terpercaya</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-shield-alt"></i></div>
                    <h5 style="color: #ffffff;">Transaksi Aman</h5>
                    <p class="small text-muted" style="color: #8a99b9 !important;">Diproses oleh sistem yang terjamin keamanannya</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ABOUT SECTION -->
    <div class="container">
        <div class="about-card">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="section-title" style="margin-bottom: 20px;">Tentang Toko Buku Cirebon</h2>
                    <p style="color: #cbd5e6; font-size: 16px; line-height: 1.8;">
                        Toko Buku Cirebon adalah platform penjualan buku online yang menyediakan berbagai macam buku
                        mulai dari novel, komik, buku pelajaran, hingga buku teknologi.
                    </p>
                    <p style="color: #cbd5e6; font-size: 16px; line-height: 1.8;">
                        Kami hadir untuk memudahkan pelanggan mendapatkan buku berkualitas dengan harga terjangkau
                        dan pengiriman cepat ke seluruh Indonesia.
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/1584/1584948.png" width="150" alt="About">
                </div>
            </div>
        </div>
    </div>

    <!-- SEARCH -->
    <div class="container">
        <div class="search-box">
            <form method="GET" action="{{ url('/') }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari judul buku atau kategori..." value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- CATEGORY FILTER -->
    <div class="container">
        <div class="category-tabs">
            <a href="{{ url('/') }}" class="category-tab {{ !request('category') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Semua
            </a>
            @foreach($categories as $category)
            <a href="{{ url('/?category='.$category) }}" class="category-tab {{ request('category') == $category ? 'active' : '' }}">
                <i class="fas fa-tag"></i> {{ $category }}
            </a>
            @endforeach
        </div>
    </div>

    <!-- BEST SELLER SECTION -->
    @if($bestSellers->count() > 0)
    <div class="container best-seller-section">
        <h2 class="section-title">Best Seller 🔥</h2>
        <div class="row g-4">
            @foreach($bestSellers as $best)
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('detail', $best->id) }}" style="text-decoration: none;">
                    <div class="best-seller-card">
                        <img src="{{ asset('storage/'.$best->image) }}" class="best-seller-img" alt="{{ $best->title }}">
                        <div class="best-seller-body">
                            <div class="best-seller-title">{{ Str::limit($best->title, 30) }}</div>
                            <div class="best-seller-price">Rp {{ number_format($best->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- PRODUCT SECTION -->
    <div class="container" id="produk">
        <h2 class="section-title">Buku Terbaru</h2>

        <div class="row g-4">
            @forelse($products as $product)
            <div class="col-md-3 col-sm-6">
                <div class="product-card">
                    <div style="position: relative;">
                        <img src="{{ asset('storage/'.$product->image) }}" class="product-img" alt="{{ $product->title }}">
                    </div>
                    <div class="product-body">
                        <h5 class="product-title">{{ Str::limit($product->title, 40) }}</h5>
                        <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        <div class="product-stock">
                            <i class="fas fa-cubes"></i> Stok: {{ $product->stock }}
                        </div>
                        <a href="{{ route('detail', $product->id) }}" class="btn-detail">
                            <i class="fas fa-eye"></i> Detail Buku
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-book-open fa-4x text-muted mb-3"></i>
                <h4>Belum ada buku</h4>
                <p class="text-muted">Silakan cek kembali nanti</p>
            </div>
            @endforelse
        </div>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="footer-brand">
                        <i class="fas fa-book"></i> Toko Buku Cirebon
                    </div>
                    <p style="color: #8a99b9; font-size: 13px;">
                        Toko buku online modern yang menyediakan berbagai macam buku dengan harga terjangkau dan pengiriman cepat.
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 style="color: #00e5a0; font-size: 14px; margin-bottom: 16px;">Menu</h5>
                    <div><a href="{{ url('/') }}" class="footer-link">Home</a></div>
                    <div><a href="#produk" class="footer-link">Produk</a></div>
                    <div><a href="#" class="footer-link">Tentang Kami</a></div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 style="color: #00e5a0; font-size: 14px; margin-bottom: 16px;">Social Media</h5>
                    <div><a href="https://i.pinimg.com/736x/79/c1/b3/79c1b307ee026cefab38c26ba4acd690.jpg" class="footer-link"><i class="fab fa-facebook"></i> Facebook</a></div>
                    <div><a href="https://png.pngtree.com/background/20250130/original/pngtree-kissy-nipple-facial-expression-monkey-photo-picture-image_3246763.jpg" class="footer-link"><i class="fab fa-instagram"></i> Instagram</a></div>
                    <div><a href="https://media.istockphoto.com/id/824860820/id/foto/kera-barbary.jpg?s=1024x1024&w=is&k=20&c=fljqHlJ9ZJKsGTFWQ_Z6JX6uSCuK3btHw9LDJNvasdk=" class="footer-link"><i class="fab fa-twitter"></i> Twitter</a></div>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.05);">
            <div class="text-center">
                <p style="color: #5a6d8c; font-size: 12px; margin: 0;">
                    © {{ date('Y') }} Toko Buku Cirebon — Dibuat dengan ❤️ oleh <a href="http://www.instagram.com/bar_cxn?igsh=MWx0YjQ4OWI0bg==" class="footer-link">Akbar</a>. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>