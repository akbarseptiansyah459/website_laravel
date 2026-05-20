<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan - Admin Toko Buku Cirebon</title>

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

        /* STATS CARD */
        .stats-card {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 20px 24px;
            margin-bottom: 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .stats-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stats-icon {
            width: 56px;
            height: 56px;
            border-radius: 18px;
            background: rgba(0, 229, 160, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: #00e5a0;
        }

        .stats-number {
            font-size: 32px;
            font-weight: 800;
            color: #ffffff;
            font-family: 'Playfair Display', serif;
        }

        .stats-label {
            font-size: 13px;
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
            min-width: 200px;
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

        .filter-input {
            background: #0f1724 !important;
            border: 1.5px solid rgba(255, 255, 255, 0.06) !important;
            color: #e8edf5 !important;
            border-radius: 12px !important;
            padding: 10px 14px;
            width: 100%;
            font-size: 13px;
        }

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

        .customer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            color: #0a0f1a;
        }

        .customer-name {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .customer-name-text {
            font-weight: 500;
        }

        .customer-email {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .customer-email i {
            color: #8a99b9;
        }

        /* BUTTON RESET */
        .btn-reset-password {
            background: rgba(245, 158, 11, 0.15);
            border: 1px solid rgba(245, 158, 11, 0.3);
            color: #f59e0b;
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.2s;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-reset-password:hover {
            background: rgba(245, 158, 11, 0.25);
            color: #fbbf24;
        }

        /* MODAL */
        .modal-content {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
        }

        .modal-header {
            border-bottom-color: rgba(255, 255, 255, 0.1);
        }

        .modal-footer {
            border-top-color: rgba(255, 255, 255, 0.1);
        }

        .modal-title {
            color: #ffffff;
        }

        .btn-modal-reset {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 12px;
        }

        .btn-modal-cancel {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #8a99b9;
            padding: 10px 24px;
            border-radius: 12px;
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

            .stats-card {
                flex-direction: column;
                text-align: center;
            }

            .stats-info {
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
            <a href="{{ route('admin.orders') }}">
                <i class="fas fa-shopping-cart"></i> Transaksi
            </a>
            <a href="{{ route('admin.customers') }}" class="active">
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
            <h1><i class="fas fa-users"></i> Data Pelanggan</h1>
            <p><i class="fas fa-user-friends"></i> Kelola data pelanggan yang terdaftar di toko</p>
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

        <!-- Stats Card -->
        <div class="stats-card">
            <div class="stats-info">
                <div class="stats-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <div class="stats-number">{{ $customers->count() ?? 0 }}</div>
                    <div class="stats-label">Total Pelanggan Terdaftar</div>
                </div>
            </div>
            <div>
                <i class="fas fa-chart-line" style="color: #00e5a0;"></i> Terakhir update: {{ date('d M Y') }}
            </div>
        </div>

        <!-- FILTER SECTION -->
        <div class="filter-section">
            <div class="filter-group">
                <label><i class="fas fa-user"></i> Cari Nama</label>
                <input type="text" id="searchName" class="filter-input" placeholder="Cari berdasarkan nama...">
            </div>

            <div class="filter-group">
                <label><i class="fas fa-envelope"></i> Cari Email</label>
                <input type="text" id="searchEmail" class="filter-input" placeholder="Cari berdasarkan email...">
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
                <table class="table table-custom" id="customersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pelanggan</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="customersTableBody">
                        @forelse($customers as $customer)
                        <tr data-name="{{ strtolower($customer->name) }}" data-email="{{ strtolower($customer->email) }}">
                            <td>
                                #{{ str_pad($customer->id, 4, '0', STR_PAD_LEFT) }}
                            </td>
                            <td>
                                <div class="customer-name">
                                    <div class="customer-avatar">
                                        {{ strtoupper(substr($customer->name, 0, 1)) }}
                                    </div>
                                    <span class="customer-name-text">{{ $customer->name }}</span>
                                </div>
                            </td>
                            <td class="customer-email">
                                <i class="fas fa-envelope"></i> {{ $customer->email }}
                            </td>
                            <td>
                                <i class="fas fa-phone"></i> {{ $customer->phone ?? '-' }}
                            </td>
                            <td>
                                <i class="far fa-calendar-alt"></i> {{ $customer->created_at instanceof \DateTime ? $customer->created_at->format('d M Y') : date('d M Y', strtotime($customer->created_at)) }}
                            </td>
                            <td>
                                <button type="button" class="btn-reset-password" data-bs-toggle="modal" data-bs-target="#resetModal{{ $customer->id }}">
                                    <i class="fas fa-key"></i> Reset Password
                                </button>

                                <!-- Modal Reset Password -->
                                <div class="modal fade" id="resetModal{{ $customer->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <i class="fas fa-key" style="color: #f59e0b;"></i> Reset Password
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center mb-3">
                                                    <div class="customer-avatar" style="width: 60px; height: 60px; font-size: 28px; margin: 0 auto;">
                                                        {{ strtoupper(substr($customer->name, 0, 1)) }}
                                                    </div>
                                                    <h6 class="mt-3">{{ $customer->name }}</h6>
                                                    <small class="text-muted">{{ $customer->email }}</small>
                                                </div>
                                                <p class="text-center" style="color: #8a99b9;">
                                                    Apakah Anda yakin ingin mereset password pelanggan ini?
                                                </p>
                                                <p class="text-center small text-warning">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    Password akan direset menjadi: <strong>password123</strong>
                                                </p>
                                                <p class="text-center small text-muted">
                                                    Pelanggan dapat mengubah password setelah login.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">
                                                    <i class="fas fa-times"></i> Batal
                                                </button>
                                                <form action="{{ route('admin.customers.reset', $customer->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn-modal-reset">
                                                        <i class="fas fa-key"></i> Reset Password
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr id="emptyRow">
                            <td colspan="6" class="empty-state">
                                <div class="empty-icon">
                                    <i class="fas fa-users-slash"></i>
                                </div>
                                <h4>Belum Ada Pelanggan</h4>
                                <p style="color: #8a99b9;">Belum ada pelanggan yang terdaftar di toko</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Filter elements
        const searchName = document.getElementById('searchName');
        const searchEmail = document.getElementById('searchEmail');
        const btnReset = document.getElementById('btnReset');
        const btnFilter = document.getElementById('btnFilter');
        const tableRows = document.querySelectorAll('#customersTableBody tr');
        const emptyRow = document.getElementById('emptyRow');

        function filterTable() {
            const nameValue = searchName.value.toLowerCase().trim();
            const emailValue = searchEmail.value.toLowerCase().trim();

            let hasVisibleRow = false;

            tableRows.forEach(row => {
                // Skip empty row
                if (row.id === 'emptyRow') return;

                const rowName = row.getAttribute('data-name');
                const rowEmail = row.getAttribute('data-email');

                let showRow = true;

                // Filter by name
                if (nameValue !== '' && !rowName.includes(nameValue)) {
                    showRow = false;
                }

                // Filter by email
                if (showRow && emailValue !== '' && !rowEmail.includes(emailValue)) {
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
            if (!hasVisibleRow && tableRows.length > 0) {
                if (!noResultRow) {
                    const tbody = document.getElementById('customersTableBody');
                    const newNoResultRow = document.createElement('tr');
                    newNoResultRow.id = 'noResultRow';
                    newNoResultRow.innerHTML = `
                        <td colspan="6" class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h4>Tidak Ada Pelanggan</h4>
                            <p style="color: #8a99b9;">Tidak ada pelanggan yang sesuai dengan filter</p>
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
            searchName.value = '';
            searchEmail.value = '';
            filterTable();
        }

        // Event listeners
        if (btnFilter) btnFilter.addEventListener('click', filterTable);
        if (btnReset) btnReset.addEventListener('click', resetFilter);

        // Enter key on search inputs
        if (searchName) {
            searchName.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') filterTable();
            });
        }
        if (searchEmail) {
            searchEmail.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') filterTable();
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>