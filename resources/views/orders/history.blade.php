<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Toko Buku Cirebon</title>

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

        /* STATS CARDS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            border-color: rgba(0, 229, 160, 0.3);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .stat-icon.all {
            background: rgba(0, 229, 160, 0.1);
            color: #00e5a0;
        }

        .stat-icon.success {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }

        .stat-icon.pending {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .stat-icon.cancelled {
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
        }

        .stat-title {
            font-size: 13px;
            color: #8a99b9;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #ffffff;
        }

        /* CARD */
        .card-history {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 28px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        /* TABLE STYLES */
        .history-table {
            color: #e8edf5;
        }

        .history-table thead th {
            border-bottom: 2px solid rgba(0, 229, 160, 0.2);
            color: #00e5a0;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 16px 12px;
        }

        .history-table td {
            border-color: rgba(255, 255, 255, 0.08);
            vertical-align: middle;
            padding: 16px 12px;
        }

        .order-id {
            font-weight: 700;
            color: #00e5a0;
            font-family: monospace;
            font-size: 14px;
        }

        .price {
            font-weight: 600;
            color: #00e5a0;
        }

        /* BADGES */
        .badge-status {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .badge-success {
            background: rgba(16, 185, 129, 0.15);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.3);
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

        .badge-cancelled {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        /* BUTTONS */
        .btn-invoice {
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            border: none;
            color: #0a0f1a;
            font-weight: 600;
            font-size: 12px;
            padding: 8px 16px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .btn-invoice:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 229, 160, 0.3);
            color: #0a0f1a;
        }

        /* EMPTY STATE */
        .empty-history {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 80px;
            color: #374151;
            margin-bottom: 20px;
        }

        .empty-history h4 {
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

        /* FILTER TABS */
        .filter-tabs {
            display: flex;
            gap: 12px;
            margin-bottom: 28px;
            flex-wrap: wrap;
        }

        .filter-tab {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #8a99b9;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .filter-tab:hover,
        .filter-tab.active {
            background: rgba(0, 229, 160, 0.15);
            border-color: #00e5a0;
            color: #00e5a0;
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

            .card-history {
                padding: 24px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .filter-tabs {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 8px;
            }

            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>

</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="avatar-wrapper">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
            </div>
            <h4>{{ auth()->user()->name ?? 'User' }}</h4>
            <div class="sidebar-badge">
                <i class="fas fa-crown"></i> Pelanggan Premium
            </div>
        </div>

        <div class="nav-menu">
            <a href="{{ url('/') }}">
                <i class="fas fa-home"></i> Beranda
            </a>
            <a href="{{ route('cart.index') }}">
                <i class="fas fa-shopping-cart"></i> Keranjang
            </a>
            <a href="{{ route('orders') }}">
                <i class="fas fa-box"></i> Pesanan
            </a>
            <a href="{{ route('history') }}" class="active">
                <i class="fas fa-history"></i> Riwayat Transaksi
            </a>
            <a href="{{ route('my.profile') }}">
                <i class="fas fa-user-circle"></i> Profile Saya
            </a>
        </div>

        <hr class="sidebar-divider">

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    <!-- MAIN CONTENT -->
    <div class="content">
        <div class="page-header">
            <h2><i class="fas fa-history"></i> Riwayat Transaksi</h2>
            <p><i class="fas fa-receipt"></i> Lihat semua riwayat pembelian Anda</p>
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

        @php
        $statusMap = [
        'Selesai' => ['class' => 'badge-success', 'icon' => 'fa-check-circle', 'text' => 'Selesai'],
        'Pending' => ['class' => 'badge-pending', 'icon' => 'fa-clock', 'text' => 'Pending'],
        'Diproses' => ['class' => 'badge-processing', 'icon' => 'fa-cogs', 'text' => 'Diproses'],
        'Dikirim' => ['class' => 'badge-shipped', 'icon' => 'fa-truck', 'text' => 'Dikirim'],
        'Dibatalkan' => ['class' => 'badge-cancelled', 'icon' => 'fa-times-circle', 'text' => 'Dibatalkan'],
        ];

        $stats = [
        'all' => isset($orders) ? $orders->count() : 0,
        'success' => isset($orders) ? $orders->where('status', 'Selesai')->count() : 0,
        'pending' => isset($orders) ? $orders->where('status', 'Pending')->count() : 0,
        'cancelled' => isset($orders) ? $orders->where('status', 'Dibatalkan')->count() : 0,
        ];
        @endphp

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon all">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="stat-title">Total Transaksi</div>
                <div class="stat-value">{{ $stats['all'] }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-title">Selesai</div>
                <div class="stat-value">{{ $stats['success'] }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon cancelled">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-title">Dibatalkan</div>
                <div class="stat-value">{{ $stats['cancelled'] }}</div>
            </div>
        </div>

        <div class="card-history">
            <!-- Filter Tabs -->
            <div class="filter-tabs">
                <button class="filter-tab active" data-filter="all">Semua</button>
                <button class="filter-tab" data-filter="Selesai">Selesai</button>
                <button class="filter-tab" data-filter="Dibatalkan">Dibatalkan</button>
            </div>

            @if(isset($orders) && count($orders) > 0)
            <div class="table-responsive">
                <table class="table history-table" id="historyTable">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr data-status="{{ $order->status }}">
                            <td>
                                <span class="order-id">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td>
                                <i class="far fa-calendar-alt" style="color: #8a99b9; margin-right: 6px;"></i>
                                {{ $order->created_at instanceof \DateTime ? $order->created_at->format('d M Y, H:i') : date('d M Y, H:i', strtotime($order->created_at)) }}
                            </td>
                            <td class="price">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </td>
                            <td>
                                @php
                                $statusInfo = $statusMap[$order->status] ?? ['class' => 'badge-pending', 'icon' => 'fa-clock', 'text' => $order->status];
                                @endphp
                                <span class="badge-status {{ $statusInfo['class'] }}">
                                    <i class="fas {{ $statusInfo['icon'] }}"></i>
                                    {{ $statusInfo['text'] }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('invoice', $order->id) }}" class="btn-invoice">
                                    <i class="fas fa-file-invoice"></i> Invoice
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-history">
                <div class="empty-icon">
                    <i class="fas fa-receipt"></i>
                </div>
                <h4>Belum Ada Riwayat Transaksi</h4>
                <p style="color: #8a99b9; margin-bottom: 24px;">Yuk, mulai belanja buku favoritmu sekarang!</p>
                <a href="{{ url('/') }}" class="btn-shop">
                    <i class="fas fa-store"></i> Belanja Sekarang
                </a>
            </div>
            @endif
        </div>
    </div>

    <script>
        // Filter functionality
        const filterTabs = document.querySelectorAll('.filter-tab');
        const tableRows = document.querySelectorAll('#historyTable tbody tr');

        if (tableRows.length > 0) {
            filterTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Update active tab
                    filterTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    const filterValue = this.getAttribute('data-filter');

                    tableRows.forEach(row => {
                        if (filterValue === 'all') {
                            row.style.display = '';
                        } else {
                            const status = row.getAttribute('data-status');
                            if (status === filterValue) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                        }
                    });
                });
            });
        }
    </script>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>