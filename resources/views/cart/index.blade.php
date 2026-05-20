<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Saya - Toko Buku Cirebon</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">

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

        /* SIDEBAR STYLES */
        .sidebar {
            width: 280px;
            height: 100vh;
            background: #070c17;
            border-right: 1px solid rgba(255, 255, 255, 0.08);
            position: fixed;
            left: 0;
            top: 0;
            padding: 32px 24px;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(0, 229, 160, 0.3);
            border-radius: 10px;
        }

        .avatar-wrapper {
            text-align: center;
            margin-bottom: 20px;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            font-weight: 800;
            font-family: 'Playfair Display', serif;
            color: #0a0f1a;
            margin: 0 auto 16px;
            box-shadow: 0 8px 20px rgba(0, 229, 160, 0.2);
            transition: transform 0.3s ease;
        }

        .avatar:hover {
            transform: scale(1.05);
        }

        .sidebar h4 {
            text-align: center;
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            font-size: 20px;
            color: #ffffff;
            margin-bottom: 6px;
        }

        .sidebar-badge {
            text-align: center;
            background: rgba(0, 229, 160, 0.1);
            color: #00e5a0;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-block;
            width: auto;
            margin: 0 auto 24px;
            border: 1px solid rgba(0, 229, 160, 0.2);
        }

        .nav-menu {
            margin-top: 16px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #8a99b9;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .sidebar a i {
            width: 22px;
            font-size: 18px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
        }

        .sidebar a.active {
            background: rgba(0, 229, 160, 0.1);
            color: #00e5a0;
            border-right: 3px solid #00e5a0;
        }

        .cart-badge {
            margin-left: auto;
            background: rgba(0, 229, 160, 0.2);
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 11px;
            color: #00e5a0;
        }

        .sidebar-divider {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            margin: 20px 0;
        }

        .logout-btn {
            width: 100%;
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #f87171;
            font-size: 14px;
            font-weight: 600;
            border-radius: 12px;
            padding: 12px;
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.15);
            border-color: rgba(239, 68, 68, 0.5);
            color: #ff8a8a;
        }

        /* MAIN CONTENT */
        .content {
            margin-left: 280px;
            padding: 40px 48px;
            min-height: 100vh;
        }

        /* PAGE HEADER */
        .page-header {
            margin-bottom: 32px;
        }

        .page-header h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 36px;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .page-header p {
            font-size: 15px;
            color: #8a99b9;
        }

        /* CARD - DIPERBAIKI */
        .card-cart {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 28px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        /* TABLE STYLES */
        .cart-table {
            color: #e8edf5;
        }

        .cart-table thead th {
            border-bottom: 2px solid rgba(0, 229, 160, 0.2);
            color: #00e5a0;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 16px 12px;
        }

        .cart-table td {
            border-color: rgba(255, 255, 255, 0.08);
            vertical-align: middle;
            padding: 16px 12px;
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* GAMBAR PRODUK */
        .product-thumb {
            width: 70px;
            height: 70px;
            background: #0f1724;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-thumb i {
            font-size: 28px;
            color: #00e5a0;
        }

        .product-title {
            font-weight: 600;
            margin-bottom: 4px;
            color: #ffffff;
        }

        .product-category {
            font-size: 11px;
            color: #8a99b9;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .quantity-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #0f1724;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #e8edf5;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .quantity-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .quantity-btn:hover:not(:disabled) {
            background: rgba(0, 229, 160, 0.2);
            border-color: #00e5a0;
        }

        .quantity-value {
            min-width: 40px;
            text-align: center;
            font-weight: 600;
        }

        .price {
            font-weight: 600;
            color: #00e5a0;
        }

        .total-price {
            font-weight: 700;
            color: #ffffff;
        }

        .btn-remove {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #f87171;
            border-radius: 10px;
            padding: 8px 14px;
            font-size: 12px;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .btn-remove:hover {
            background: rgba(239, 68, 68, 0.2);
            border-color: #f87171;
        }

        /* EMPTY CART */
        .empty-cart {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-cart-icon {
            font-size: 80px;
            color: #374151;
            margin-bottom: 20px;
        }

        .empty-cart h4 {
            color: #8a99b9;
            margin-bottom: 16px;
        }

        .btn-shop {
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            border: none;
            color: #0a0f1a;
            font-weight: 700;
            padding: 12px 32px;
            border-radius: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.25s ease;
        }

        .btn-shop:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 229, 160, 0.3);
            color: #0a0f1a;
        }

        /* CHECKOUT SECTION */
        .checkout-section {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 2px solid rgba(255, 255, 255, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .total-box {
            background: #0f1724;
            padding: 16px 24px;
            border-radius: 20px;
            border: 1px solid rgba(0, 229, 160, 0.2);
        }

        .total-label {
            font-size: 13px;
            color: #8a99b9;
            margin-bottom: 4px;
        }

        .total-amount {
            font-size: 32px;
            font-weight: 800;
            color: #00e5a0;
            font-family: 'Playfair Display', serif;
        }

        .btn-checkout {
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            border: none;
            color: #0a0f1a;
            font-weight: 700;
            font-size: 16px;
            padding: 14px 32px;
            border-radius: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.25s ease;
        }

        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 229, 160, 0.4);
            color: #0a0f1a;
        }

        /* ALERTS */
        .alert {
            border-radius: 16px;
            padding: 16px 20px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 28px;
            border: none;
        }

        .alert-success {
            background: rgba(0, 229, 160, 0.1);
            border-left: 4px solid #00e5a0;
            color: #00e5a0;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #f87171;
            color: #f87171;
        }

        /* Loading Spinner */
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .loading.active {
            display: flex;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(0, 229, 160, 0.3);
            border-top-color: #00e5a0;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 260px;
            }

            .content {
                margin-left: 0;
                padding: 24px 20px;
            }

            .card-cart {
                padding: 24px;
            }

            .checkout-section {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-checkout {
                justify-content: center;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .product-info {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>

</head>

<body>

    <!-- Loading Spinner -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="avatar-wrapper">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'J', 0, 1)) }}
            </div>
            <h4>{{ auth()->user()->name ?? 'John Doe' }}</h4>
            <div class="sidebar-badge">
                <i class="fas fa-crown"></i> Pelanggan Premium
            </div>
        </div>

        <div class="nav-menu">
            <a href="{{ url('/') }}">
                <i class="fas fa-home"></i> Beranda
            </a>
            <a href="{{ route('cart.index') }}" class="active">
                <i class="fas fa-shopping-cart"></i> Keranjang
                @php
                $cartCount = isset($carts) && $carts ? $carts->count() : 0;
                @endphp
                @if($cartCount > 0)
                <span class="cart-badge">{{ $cartCount }}</span>
                @endif
            </a>
            <a href="{{ route('orders') }}">
                <i class="fas fa-box"></i> Pesanan
            </a>
            <a href="{{ route('history') }}">
                <i class="fas fa-history"></i> Riwayat
            </a>
            <a href="{{ route('my.profile') }}">
                <i class="fas fa-user-circle"></i> Profile
            </a>
        </div>

        <hr class="sidebar-divider">

        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    <!-- MAIN CONTENT -->
    <div class="content">
        <div class="page-header">
            <h2><i class="fas fa-shopping-cart"></i> Keranjang Saya</h2>
            <p><i class="fas fa-store"></i> Review pesanan Anda sebelum checkout</p>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
        </div>
        @endif

        <div class="card-cart">
            @php
            $grandTotal = 0;
            $hasValidItems = false;
            @endphp

            @if(isset($carts) && count($carts) > 0)
            <div class="table-responsive">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Kuantitas</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                        @php
                        $product = $cart->product ?? null;
                        if($product && isset($product->price)) {
                        $total = $product->price * $cart->quantity;
                        $grandTotal += $total;
                        $hasValidItems = true;
                        } else {
                        $total = 0;
                        }
                        @endphp
                        <tr>
                            <td>
                                <div class="product-info">
                                    <div class="product-thumb">
                                        @if($product && $product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                                        @else
                                        <i class="fas fa-book"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="product-title">{{ $product->title ?? 'Produk tidak tersedia' }}</div>
                                        <div class="product-category">
                                            <i class="fas fa-tag"></i> Buku
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="price">
                                Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}
                            </td>
                            <td>
                                @if($product)
                                <div class="quantity-control">
                                    <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="quantity-form" style="display: inline-block;">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="quantity" value="{{ $cart->quantity - 1 }}">
                                        <button type="submit" class="quantity-btn" {{ $cart->quantity <= 1 ? 'disabled' : '' }}>
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </form>
                                    <span class="quantity-value">{{ $cart->quantity }}</span>
                                    <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="quantity-form" style="display: inline-block;">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="quantity" value="{{ $cart->quantity + 1 }}">
                                        <button type="submit" class="quantity-btn">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </form>
                                </div>
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="total-price">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </td>
                            <td>
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-remove" onclick="return confirm('Yakin ingin menghapus item ini?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($hasValidItems)
            <div class="checkout-section">
                <div class="total-box">
                    <div class="total-label">Total Belanja</div>
                    <div class="total-amount">Rp {{ number_format($grandTotal, 0, ',', '.') }}</div>
                </div>
                <a href="{{ route('checkout.form') }}" class="btn-checkout" id="checkoutBtn">
                    <i class="fas fa-credit-card"></i> Lanjut ke Checkout
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            @endif
            @else
            <div class="empty-cart">
                <div class="empty-cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h4>Keranjang Belanja Masih Kosong</h4>
                <p style="color: #8a99b9; margin-bottom: 24px;">Yuk, isi keranjangmu dengan buku-buku menarik!</p>
                <a href="{{ url('/') }}" class="btn-shop">
                    <i class="fas fa-store"></i> Belanja Sekarang
                </a>
            </div>
            @endif
        </div>
    </div>

    <script>
        // Handle quantity form submissions
        document.querySelectorAll('.quantity-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const loading = document.getElementById('loading');
                if (loading) {
                    loading.classList.add('active');
                }
            });
        });

        // Handle checkout button
        const checkoutBtn = document.getElementById('checkoutBtn');
        if (checkoutBtn) {
            checkoutBtn.addEventListener('click', function() {
                const loading = document.getElementById('loading');
                if (loading) {
                    loading.classList.add('active');
                }
            });
        }

        // Auto hide loading spinner after page load
        window.addEventListener('load', function() {
            const loading = document.getElementById('loading');
            if (loading) {
                setTimeout(() => {
                    loading.classList.remove('active');
                }, 500);
            }
        });
    </script>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>