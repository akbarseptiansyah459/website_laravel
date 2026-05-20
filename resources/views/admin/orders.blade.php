<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi - Admin Toko Buku Cirebon</title>

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

        /* FILTER SECTION */
        .filter-section {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 20px 24px;
            margin-bottom: 24px;
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            align-items: flex-end;
        }

        .filter-group {
            flex: 1;
            min-width: 180px;
        }

        .filter-group label {
            font-size: 12px;
            font-weight: 600;
            color: #8a99b9;
            margin-bottom: 6px;
            display: block;
        }

        .filter-group label i {
            margin-right: 6px;
            color: #00e5a0;
        }

        .filter-select,
        .filter-input {
            background: #0f1724 !important;
            border: 1.5px solid rgba(255, 255, 255, 0.06) !important;
            color: #e8edf5 !important;
            border-radius: 12px !important;
            padding: 10px 14px;
            width: 100%;
            font-size: 13px;
        }

        .filter-select:focus,
        .filter-input:focus {
            border-color: #00e5a0 !important;
            box-shadow: 0 0 0 3px rgba(0, 229, 160, 0.1) !important;
        }

        .btn-filter {
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            border: none;
            color: #0a0f1a;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-filter:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 229, 160, 0.3);
        }

        .btn-reset {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #8a99b9;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-reset:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        /* TABLE */
        .table-wrapper {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 0;
            overflow: hidden;
        }

        .table-custom {
            color: #e8edf5;
            margin-bottom: 0;
        }

        .table-custom thead th {
            background: #0f1724;
            border-bottom: 2px solid rgba(0, 229, 160, 0.2);
            color: #00e5a0;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 16px 16px;
        }

        .table-custom td {
            border-color: rgba(255, 255, 255, 0.06);
            vertical-align: middle;
            padding: 14px 16px;
        }

        .table-custom tbody tr:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .order-id {
            font-weight: 700;
            color: #00e5a0;
            font-family: monospace;
            font-size: 14px;
        }

        .customer-name {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .customer-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(0, 229, 160, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
            color: #00e5a0;
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

        /* BUTTON DETAIL */
        .btn-detail {
            background: rgba(59, 130, 246, 0.15);
            border: 1px solid rgba(59, 130, 246, 0.3);
            color: #3b82f6;
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-detail:hover {
            background: rgba(59, 130, 246, 0.25);
            color: #60a5fa;
        }

        /* BUTTON INVOICE */
        .btn-invoice {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #10b981;
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-invoice:hover {
            background: rgba(16, 185, 129, 0.25);
            color: #34d399;
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 80px;
            color: #374151;
            margin-bottom: 20px;
        }

        .empty-state h4 {
            color: #8a99b9;
            margin-bottom: 16px;
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

            .filter-section {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-filter,
            .btn-reset {
                justify-content: center;
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
            <h1><i class="fas fa-shopping-cart"></i> Data Transaksi</h1>
            <p><i class="fas fa-chart-line"></i> Kelola dan filter semua transaksi pelanggan</p>
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

        <!-- FILTER SECTION -->
        <div class="filter-section">
            <div class="filter-group">
                <label><i class="fas fa-filter"></i> Filter Status</label>
                <select id="filterStatus" class="filter-select">
                    <option value="all">Semua Status</option>
                    <option value="Pending">⏳ Pending</option>
                    <option value="Diproses">⚙️ Diproses</option>
                    <option value="Dikirim">🚚 Dikirim</option>
                    <option value="Selesai">✅ Selesai</option>
                    <option value="Dibatalkan">❌ Dibatalkan</option>
                </select>
            </div>

            <div class="filter-group">
                <label><i class="fas fa-user"></i> Cari Pelanggan</label>
                <input type="text" id="searchCustomer" class="filter-input" placeholder="Cari nama pelanggan...">
            </div>

            <div class="filter-group">
                <label><i class="fas fa-hashtag"></i> Cari ID Pesanan</label>
                <input type="text" id="searchId" class="filter-input" placeholder="Cari ID pesanan...">
            </div>

            <div class="filter-group" style="flex: 0 0 auto;">
                <button id="btnReset" class="btn-reset">
                    <i class="fas fa-sync-alt"></i> Reset
                </button>
                <button id="btnFilter" class="btn-filter" style="margin-left: 8px;">
                    <i class="fas fa-search"></i> Filter
                </button>
            </div>
        </div>

        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="table table-custom" id="ordersTable">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody id="ordersTableBody">
                        @forelse($orders as $order)
                        <tr data-status="{{ $order->status }}" data-customer="{{ strtolower($order->user->name ?? '') }}" data-id="{{ $order->id }}">
                            <td>
                                <span class="order-id">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td>
                                <div class="customer-name">
                                    <div class="customer-avatar">
                                        {{ strtoupper(substr($order->user->name ?? 'U', 0, 1)) }}
                                    </div>
                                    <span class="customer-name-text">{{ $order->user->name ?? 'User Tidak Ditemukan' }}</span>
                                </div>
                            </td>
                            <td class="price">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </td>
                            <td>
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
                            </td>
                            <td>
                                <i class="far fa-calendar-alt" style="color: #8a99b9; margin-right: 6px;"></i>
                                {{ $order->created_at instanceof \DateTime ? $order->created_at->format('d M Y, H:i') : date('d M Y, H:i', strtotime($order->created_at)) }}
                            </td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn-detail">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('invoice', $order->id) }}" class="btn-invoice" target="_blank">
                                    <i class="fas fa-file-invoice"></i> Invoice
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr id="emptyRow">
                            <td colspan="7" class="empty-state">
                                <div class="empty-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <h4>Belum Ada Transaksi</h4>
                                <p style="color: #8a99b9;">Belum ada transaksi yang dilakukan pelanggan</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Ambil elemen
        const filterStatus = document.getElementById('filterStatus');
        const searchCustomer = document.getElementById('searchCustomer');
        const searchId = document.getElementById('searchId');
        const btnReset = document.getElementById('btnReset');
        const btnFilter = document.getElementById('btnFilter');
        const tableRows = document.querySelectorAll('#ordersTableBody tr');

        let emptyRowExists = document.getElementById('emptyRow') !== null;

        function filterTable() {
            const statusValue = filterStatus.value;
            const customerValue = searchCustomer.value.toLowerCase().trim();
            const idValue = searchId.value.toLowerCase().trim();

            let hasVisibleRow = false;

            tableRows.forEach(row => {
                // Skip empty row
                if (row.id === 'emptyRow') return;

                const rowStatus = row.getAttribute('data-status');
                const rowCustomer = row.getAttribute('data-customer');
                const rowId = row.getAttribute('data-id');

                let showRow = true;

                // Filter by status
                if (statusValue !== 'all' && rowStatus !== statusValue) {
                    showRow = false;
                }

                // Filter by customer name
                if (showRow && customerValue !== '' && !rowCustomer.includes(customerValue)) {
                    showRow = false;
                }

                // Filter by order ID
                if (showRow && idValue !== '' && !rowId.toString().includes(idValue)) {
                    showRow = false;
                }

                if (showRow) {
                    row.style.display = '';
                    hasVisibleRow = true;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show/hide empty state for no results
            const noResultRow = document.getElementById('noResultRow');
            if (!hasVisibleRow && tableRows.length > 0 && !emptyRowExists) {
                if (!noResultRow) {
                    const tbody = document.getElementById('ordersTableBody');
                    const newNoResultRow = document.createElement('tr');
                    newNoResultRow.id = 'noResultRow';
                    newNoResultRow.innerHTML = `
                        <td colspan="7" class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h4>Tidak Ada Transaksi</h4>
                            <p style="color: #8a99b9;">Tidak ada transaksi yang sesuai dengan filter</p>
                        </td>
                    `;
                    tbody.appendChild(newNoResultRow);
                }
            } else {
                if (noResultRow) {
                    noResultRow.remove();
                }
            }
        }

        function resetFilter() {
            filterStatus.value = 'all';
            searchCustomer.value = '';
            searchId.value = '';
            filterTable();
        }

        // Event listeners
        if (btnFilter) btnFilter.addEventListener('click', filterTable);
        if (btnReset) btnReset.addEventListener('click', resetFilter);

        // Enter key on search inputs
        if (searchCustomer) {
            searchCustomer.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') filterTable();
            });
        }
        if (searchId) {
            searchId.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') filterTable();
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>