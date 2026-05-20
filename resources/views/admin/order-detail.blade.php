<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi - Admin Toko Buku Cirebon</title>

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

        .logo {
            text-align: center;
            margin-bottom: 32px;
        }

        .logo h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 24px;
            background: linear-gradient(135deg, #ffffff, #00e5a0);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 4px;
        }

        .logo p {
            font-size: 11px;
            color: #8a99b9;
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
            margin-bottom: 8px;
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.15);
            border-color: rgba(239, 68, 68, 0.5);
            color: #ff8a8a;
        }

        /* MAIN CONTENT */
        .content {
            margin-left: 280px;
            padding: 32px 40px;
            min-height: 100vh;
        }

        /* PAGE HEADER */
        .page-header {
            margin-bottom: 32px;
        }

        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 32px;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .page-header p {
            font-size: 14px;
            color: #8a99b9;
        }

        /* CARD */
        .card-custom {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 32px;
        }

        /* SECTION TITLE */
        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #00e5a0;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid rgba(0, 229, 160, 0.2);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* STATUS BADGE */
        .badge-status {
            padding: 8px 18px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .badge-pending {
            background: rgba(245, 158, 11, 0.15);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .badge-processing {
            background: rgba(59, 130, 246, 0.15);
            color: #3b82f6;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .badge-shipped {
            background: rgba(139, 92, 246, 0.15);
            color: #8b5cf6;
            border: 1px solid rgba(139, 92, 246, 0.3);
        }

        .badge-delivered {
            background: rgba(16, 185, 129, 0.15);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .badge-cancelled {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        /* INFO BOX */
        .info-box {
            background: #0f1724;
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 32px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .info-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            background: rgba(0, 229, 160, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: #00e5a0;
        }

        .info-label {
            font-size: 12px;
            color: #8a99b9;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
        }

        /* FORM */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #cbd5e6;
            margin-bottom: 8px;
            display: block;
        }

        .form-select {
            background: #0f1724 !important;
            border: 1.5px solid rgba(255, 255, 255, 0.06) !important;
            color: #e8edf5 !important;
            border-radius: 12px !important;
            padding: 12px 16px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
        }

        .form-select:focus {
            border-color: #00e5a0 !important;
            box-shadow: 0 0 0 4px rgba(0, 229, 160, 0.1) !important;
        }

        /* TABLE */
        .items-table {
            color: #e8edf5;
            margin-top: 20px;
        }

        .items-table thead th {
            border-bottom: 2px solid rgba(0, 229, 160, 0.2);
            color: #00e5a0;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 12px 12px;
        }

        .items-table td {
            border-color: rgba(255, 255, 255, 0.06);
            vertical-align: middle;
            padding: 12px;
        }

        .product-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-icon {
            width: 40px;
            height: 40px;
            background: rgba(0, 229, 160, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #00e5a0;
        }

        .price {
            font-weight: 600;
            color: #00e5a0;
        }

        /* TOTAL BOX */
        .total-box {
            background: #0f1724;
            border-radius: 20px;
            padding: 20px 24px;
            text-align: right;
            margin-top: 24px;
            border: 1px solid rgba(0, 229, 160, 0.1);
        }

        .total-label {
            font-size: 14px;
            color: #8a99b9;
            margin-bottom: 8px;
        }

        .total-amount {
            font-size: 32px;
            font-weight: 800;
            color: #00e5a0;
            font-family: 'Playfair Display', serif;
        }

        /* BUTTONS */
        .btn-update {
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            border: none;
            color: #0a0f1a;
            font-weight: 700;
            font-size: 14px;
            padding: 12px 28px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.25s ease;
            margin-top: 16px;
        }

        .btn-update:hover {
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
            padding: 10px 24px;
            border-radius: 12px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        .button-group {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-top: 24px;
        }

        /* ALERT */
        .alert {
            border-radius: 16px;
            padding: 16px 20px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 24px;
            border: none;
        }

        .alert-success {
            background: rgba(0, 229, 160, 0.1);
            border-left: 4px solid #00e5a0;
            color: #00e5a0;
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

            .card-custom {
                padding: 24px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .button-group {
                justify-content: stretch;
            }

            .btn-back {
                justify-content: center;
                width: 100%;
            }
        }
    </style>

</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">
            <h3><i class="fas fa-book"></i> Admin Panel</h3>
            <p>Toko Buku Cirebon</p>
        </div>

        <div class="nav-menu">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="{{ route('products.index') }}">
                <i class="fas fa-box"></i> Produk
            </a>
            <a href="{{ route('admin.orders') }}" class="active">
                <i class="fas fa-shopping-cart"></i> Transaksi
            </a>
            <a href="{{ route('admin.customers') }}">
                <i class="fas fa-users"></i> Pelanggan
            </a>
        </div>

        <hr class="sidebar-divider">

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    <!-- MAIN CONTENT -->
    <div class="content">
        <div class="page-header">
            <h1><i class="fas fa-receipt"></i> Detail Transaksi</h1>
            <p><i class="fas fa-info-circle"></i> Informasi lengkap transaksi #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        @php
        $subtotal = $order->total_price - ($order->shipping_cost ?? 0);
        $isFreeShipping = $subtotal >= 250000;
        @endphp

        <div class="card-custom">
            <!-- Status Update Section -->
            <div class="section-title">
                <i class="fas fa-cogs"></i>
                Update Status Transaksi
            </div>

            <div class="info-box">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-hashtag"></i>
                        </div>
                        <div>
                            <div class="info-label">ID Transaksi</div>
                            <div class="info-value">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div>
                            <div class="info-label">Tanggal Transaksi</div>
                            <div class="info-value">{{ $order->created_at instanceof \DateTime ? $order->created_at->format('d M Y, H:i') : date('d M Y, H:i', strtotime($order->created_at)) }}</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-tag"></i>
                        </div>
                        <div>
                            <div class="info-label">Status Saat Ini</div>
                            <div class="info-value">
                                @php
                                $statusMap = [
                                'Pending' => ['class' => 'badge-pending', 'icon' => 'fa-clock', 'text' => 'Pending'],
                                'Diproses' => ['class' => 'badge-processing', 'icon' => 'fa-cogs', 'text' => 'Diproses'],
                                'Dikirim' => ['class' => 'badge-shipped', 'icon' => 'fa-truck', 'text' => 'Dikirim'],
                                'Selesai' => ['class' => 'badge-delivered', 'icon' => 'fa-check-circle', 'text' => 'Selesai'],
                                'Dibatalkan' => ['class' => 'badge-cancelled', 'icon' => 'fa-times-circle', 'text' => 'Dibatalkan'],
                                ];
                                $status = $statusMap[$order->status] ?? ['class' => 'badge-pending', 'icon' => 'fa-clock', 'text' => $order->status];
                                @endphp
                                <span class="badge-status {{ $status['class'] }}">
                                    <i class="fas {{ $status['icon'] }}"></i>
                                    {{ $status['text'] }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label><i class="fas fa-exchange-alt"></i> Ubah Status Transaksi</label>
                    <select name="status" class="form-select" style="width: 100%; max-width: 300px;">
                        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>⏳ Pending</option>
                        <option value="Diproses" {{ $order->status == 'Diproses' ? 'selected' : '' }}>⚙️ Diproses</option>
                        <option value="Dikirim" {{ $order->status == 'Dikirim' ? 'selected' : '' }}>🚚 Dikirim</option>
                        <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>✅ Selesai</option>
                        <option value="Dibatalkan" {{ $order->status == 'Dibatalkan' ? 'selected' : '' }}>❌ Dibatalkan</option>
                    </select>
                </div>
                <button type="submit" class="btn-update">
                    <i class="fas fa-sync-alt"></i> Update Status
                </button>
            </form>

            <!-- Customer Info -->
            <div class="section-title mt-4">
                <i class="fas fa-user"></i>
                Data Customer
            </div>

            <div class="info-box">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div>
                            <div class="info-label">Nama Pelanggan</div>
                            <div class="info-value">{{ $order->user->name ?? 'User Tidak Ditemukan' }}</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <div class="info-label">Email</div>
                            <div class="info-value">{{ $order->user->email ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <div class="info-label">Nomor HP</div>
                            <div class="info-value">{{ $order->phone ?? $order->user->phone ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <div class="info-label">Alamat Pengiriman</div>
                            <div class="info-value">{{ $order->address ?? 'Tidak ada alamat' }}</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div>
                            <div class="info-label">Metode Pembayaran</div>
                            <div class="info-value">{{ $order->payment_method ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div>
                            <div class="info-label">Kurir Pengiriman</div>
                            <div class="info-value">{{ $order->shipping_courier ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div>
                            <div class="info-label">Ongkos Kirim</div>
                            <div class="info-value">
                                @if($isFreeShipping)
                                <span style="color: #10b981;"><i class="fas fa-gift"></i> GRATIS!</span>
                                <small class="d-block text-muted" style="font-size: 11px;">(Minimal belanja Rp 250.000)</small>
                                @else
                                Rp {{ number_format($order->shipping_cost ?? 0, 0, ',', '.') }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Items Table -->
            <div class="section-title">
                <i class="fas fa-boxes"></i>
                Detail Produk
            </div>

            <div class="table-responsive">
                <table class="table items-table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Kuantitas</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>
                                <div class="product-title">
                                    <div class="product-icon">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    {{ $item->product->title ?? 'Produk tidak ditemukan' }}
                                </div>
                            </td>
                            <td class="price">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </td>
                            <td>
                                {{ $item->quantity }}
                            </td>
                            <td class="price">
                                Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Total -->
            <div class="total-box">
                <div class="total-label">Total Keseluruhan</div>
                <div class="total-amount">Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
                @if($isFreeShipping)
                <small class="text-success" style="font-size: 12px;">
                    <i class="fas fa-gift"></i> Pelanggan mendapatkan GRATIS ONGKIR
                </small>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="button-group">
                <a href="{{ route('admin.orders') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Transaksi
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>