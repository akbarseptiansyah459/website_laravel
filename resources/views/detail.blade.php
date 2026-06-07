<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->title }} - Toko Buku Cirebon</title>

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
            min-height: 100vh;
        }

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

        .container {
            max-width: 1200px;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 30px;
        }

        .breadcrumb-item a {
            color: #8a99b9;
            text-decoration: none;
            font-size: 14px;
        }

        .breadcrumb-item a:hover {
            color: #00e5a0;
        }

        .breadcrumb-item.active {
            color: #00e5a0;
        }

        .product-image {
            background: #131c2e;
            border-radius: 24px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .product-image img {
            width: 100%;
            border-radius: 16px;
            object-fit: cover;
        }

        .category-badge {
            display: inline-block;
            background: rgba(0, 229, 160, 0.1);
            border: 1px solid rgba(0, 229, 160, 0.2);
            color: #00e5a0;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 6px 16px;
            border-radius: 100px;
            margin-bottom: 16px;
        }

        .stock-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(0, 229, 160, 0.08);
            border: 1px solid rgba(0, 229, 160, 0.2);
            color: #00e5a0;
            border-radius: 8px;
            padding: 5px 12px;
            font-size: 13px;
            font-weight: 600;
        }

        .stock-low {
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.3);
            color: #f87171;
        }

        .product-title {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 36px;
            color: #ffffff;
            margin-bottom: 16px;
        }

        .product-author {
            font-size: 16px;
            color: #8a99b9;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .product-author i {
            color: #00e5a0;
        }

        .product-price {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            font-weight: 900;
            color: #00e5a0;
            margin-bottom: 20px;
        }

        /* DESKRIPSI DENGAN FITUR READ MORE */
        .product-description {
            color: #cbd5e6;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 24px;
        }

        .product-description-text {
            max-height: 120px;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .product-description-text.expanded {
            max-height: none;
        }

        .btn-read-more {
            background: transparent;
            border: none;
            color: #00e5a0;
            font-size: 14px;
            font-weight: 600;
            padding: 8px 0;
            margin-top: 8px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }

        .btn-read-more:hover {
            color: #00b87a;
            gap: 10px;
        }

        .info-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            background: rgba(0, 229, 160, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #00e5a0;
            font-size: 18px;
        }

        .info-label {
            font-size: 12px;
            color: #8a99b9;
            margin-bottom: 2px;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
        }

        .quantity-label {
            font-size: 13px;
            font-weight: 600;
            color: #cbd5e6;
            margin-bottom: 8px;
            display: block;
        }

        .quantity-input {
            background: #0f1724 !important;
            border: 1.5px solid rgba(255, 255, 255, 0.06) !important;
            color: #e8edf5 !important;
            border-radius: 12px !important;
            padding: 12px 16px;
            width: 120px;
            font-size: 14px;
            font-weight: 600;
        }

        .quantity-input:focus {
            border-color: #00e5a0 !important;
            box-shadow: 0 0 0 3px rgba(0, 229, 160, 0.1) !important;
        }

        .btn-cart {
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            border: none;
            color: #0a0f1a;
            font-weight: 700;
            font-size: 16px;
            padding: 14px 32px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.25s ease;
        }

        .btn-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 229, 160, 0.3);
            color: #0a0f1a;
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #8a99b9;
            font-weight: 600;
            font-size: 14px;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
            margin-left: 12px;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        .alert {
            border-radius: 16px;
            padding: 16px 20px;
            margin-bottom: 24px;
            border: none;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #f87171;
            color: #f87171;
        }

        .divider {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            margin: 24px 0;
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

        @media (max-width: 768px) {
            .product-title {
                font-size: 28px;
            }

            .product-price {
                font-size: 32px;
            }

            .btn-cart,
            .btn-back {
                width: 100%;
                justify-content: center;
                margin-left: 0;
                margin-top: 10px;
            }

            .product-description-text {
                max-height: 100px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-book"></i> Toko Buku Cirebon
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            <i class="fas fa-shopping-cart"></i> Keranjang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders') }}">
                            <i class="fas fa-box"></i> Pesanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('my.profile') }}">
                            <i class="fas fa-user"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="nav-link btn btn-link" style="color: #f87171 !important;">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 pb-5">

        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($product->title, 40) }}</li>
            </ol>
        </nav>

        @if(session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
        </div>
        @endif

        <div class="row g-5">
            <!-- KOLOM GAMBAR -->
            <div class="col-md-5">
                <div class="product-image">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                    @else
                    <div class="text-center py-5">
                        <i class="fas fa-book fa-5x text-muted"></i>
                        <p class="mt-2 text-muted">Tidak ada gambar</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- KOLOM INFORMASI -->
            <div class="col-md-7">
                <span class="category-badge">
                    <i class="fas fa-tag"></i> {{ $product->category }}
                </span>

                <h1 class="product-title">{{ $product->title }}</h1>

                <div class="product-author">
                    <i class="fas fa-user-pen"></i> Penulis: <strong>{{ $product->author ?? 'Tidak diketahui' }}</strong>
                </div>

                <div class="product-price">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>

                <!-- DESKRIPSI DENGAN FITUR READ MORE -->
                <div class="product-description">
                    <div class="product-description-text" id="descText">
                        {{ $product->description ?: 'Tidak ada deskripsi untuk buku ini.' }}
                    </div>
                    @if(strlen($product->description) > 300)
                    <button class="btn-read-more" id="readMoreBtn" onclick="toggleDescription()">
                        <i class="fas fa-chevron-down"></i> Selengkapnya
                    </button>
                    @endif
                </div>

                <!-- INFO BOX -->
                <div class="info-box">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-cubes"></i>
                        </div>
                        <div>
                            <div class="info-label">Stok Tersedia</div>
                            <div class="info-value">
                                <span class="stock-badge {{ $product->stock <= 5 ? 'stock-low' : '' }}">
                                    <i class="fas {{ $product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                    {{ $product->stock > 0 ? $product->stock . ' item' : 'Habis' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div>
                            <div class="info-label">Pengiriman</div>
                            <div class="info-value">
                                Gratis ongkir minimal belanja <strong style="color: #00e5a0;">Rp 250.000</strong>
                                <small class="d-block text-muted" style="font-size: 11px;">*Syarat dan ketentuan berlaku</small>
                            </div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div>
                            <div class="info-label">Pembayaran</div>
                            <div class="info-value">Transfer Bank, COD, E-Wallet</div>
                        </div>
                    </div>
                </div>

                <div class="divider"></div>

                @if($product->stock > 0)
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf

                    <label class="quantity-label">
                        <i class="fas fa-shopping-cart"></i> Jumlah Beli
                    </label>
                    <div class="d-flex align-items-center gap-3 flex-wrap">
                        <input type="number"
                            name="quantity"
                            value="1"
                            min="1"
                            max="{{ $product->stock }}"
                            class="quantity-input">

                        <button type="submit" class="btn-cart">
                            <i class="fas fa-cart-plus"></i> Masuk Keranjang
                        </button>
                    </div>
                </form>
                @else
                <div class="alert alert-danger text-center mb-0">
                    <i class="fas fa-times-circle"></i> Maaf, stok buku ini sedang habis!
                </div>
                @endif

                <div class="mt-3">
                    <a href="{{ url('/') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Kembali Belanja
                    </a>
                </div>
            </div>
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

    <script>
        function toggleDescription() {
            const descText = document.getElementById('descText');
            const readMoreBtn = document.getElementById('readMoreBtn');

            if (descText.classList.contains('expanded')) {
                descText.classList.remove('expanded');
                readMoreBtn.innerHTML = '<i class="fas fa-chevron-down"></i> Selengkapnya';
            } else {
                descText.classList.add('expanded');
                readMoreBtn.innerHTML = '<i class="fas fa-chevron-up"></i> Sembunyikan';
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>