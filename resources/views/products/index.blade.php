<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - Admin Toko Buku Cirebon</title>

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
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
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

        .btn-add {
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            border: none;
            color: #0a0f1a;
            font-weight: 700;
            font-size: 14px;
            padding: 12px 24px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 229, 160, 0.3);
            color: #0a0f1a;
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

        .filter-input,
        .filter-select {
            background: #0f1724 !important;
            border: 1.5px solid rgba(255, 255, 255, 0.06) !important;
            color: #e8edf5 !important;
            border-radius: 12px !important;
            padding: 10px 14px;
            width: 100%;
            font-size: 13px;
        }

        .filter-input:focus,
        .filter-select:focus {
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
            padding: 16px;
        }

        .table-custom tbody tr:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .book-img {
            width: 60px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
            background: #0f1724;
        }

        /* PERBAIKAN WARNA JUDUL BUKU - TIDAK NABRAK */
        .book-title {
            font-weight: 600;
            color: #cbd5e6;
            margin-bottom: 4px;
        }

        .book-id {
            font-size: 11px;
            color: #5a6d8c;
        }

        .book-category {
            display: inline-block;
            padding: 4px 12px;
            background: rgba(0, 229, 160, 0.1);
            color: #00e5a0;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .price {
            font-weight: 700;
            color: #00e5a0;
        }

        .stock-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .stock-high {
            background: rgba(16, 185, 129, 0.15);
            color: #10b981;
        }

        .stock-medium {
            background: rgba(245, 158, 11, 0.15);
            color: #f59e0b;
        }

        .stock-low {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
        }

        .btn-edit {
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

        .btn-edit:hover {
            background: rgba(59, 130, 246, 0.25);
            color: #60a5fa;
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #f87171;
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

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.25);
            color: #ff8a8a;
        }

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

            .page-header {
                flex-direction: column;
                align-items: flex-start;
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
            <a href="{{ route('products.index') }}" class="active">
                <i class="fas fa-box"></i> Produk
            </a>
            <a href="{{ route('admin.orders') }}">
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
            <div>
                <h1><i class="fas fa-book"></i> Data Buku</h1>
                <p><i class="fas fa-database"></i> Kelola semua koleksi buku toko Anda</p>
            </div>
            <a href="{{ route('products.create') }}" class="btn-add">
                <i class="fas fa-plus"></i> Tambah Buku Baru
            </a>
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
                <label><i class="fas fa-search"></i> Cari Judul Buku</label>
                <input type="text" id="searchTitle" class="filter-input" placeholder="Cari berdasarkan judul...">
            </div>

            <div class="filter-group">
                <label><i class="fas fa-tag"></i> Filter Kategori</label>
                <select id="filterCategory" class="filter-select">
                    <option value="all">Semua Kategori</option>
                    @php
                    $categories = $products->pluck('category')->unique();
                    @endphp
                    @foreach($categories as $category)
                    <option value="{{ strtolower($category) }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="filter-group">
                <label><i class="fas fa-cubes"></i> Filter Stok</label>
                <select id="filterStock" class="filter-select">
                    <option value="all">Semua Stok</option>
                    <option value="high">Stok Banyak (≥20)</option>
                    <option value="medium">Stok Sedang (5-19)</option>
                    <option value="low">Stok Sedikit (≤4)</option>
                    <option value="out">Stok Habis (0)</option>
                </select>
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
                <table class="table table-custom" id="productsTable">
                    <thead>
                        <tr>
                            <th style="width: 80px;">Gambar</th>
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="productsTableBody">
                        @forelse($products as $product)
                        <tr data-title="{{ strtolower($product->title) }}" data-category="{{ strtolower($product->category) }}" data-stock="{{ $product->stock }}">
                            <td>
                                @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="book-img" alt="{{ $product->title }}">
                                @else
                                <div class="book-img d-flex align-items-center justify-content-center bg-dark">
                                    <i class="fas fa-book fa-2x text-muted"></i>
                                </div>
                                @endif
                            </td>
                            <td>
                                <!-- PERBAIKAN: Judul pakai warna cbd5e6 (abu terang) -->
                                <div class="book-title">{{ $product->title }}</div>
                                <div class="book-id">ID: #{{ str_pad($product->id, 4, '0', STR_PAD_LEFT) }}</div>
                            </td>
                            <td>
                                <span class="book-category">
                                    <i class="fas fa-tag"></i> {{ $product->category }}
                                </span>
                            </td>
                            <td class="price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td>
                                @php
                                if ($product->stock == 0) {
                                $stockClass = 'stock-low';
                                $stockIcon = 'fa-times-circle';
                                } elseif ($product->stock >= 20) {
                                $stockClass = 'stock-high';
                                $stockIcon = 'fa-check-circle';
                                } elseif ($product->stock >= 5) {
                                $stockClass = 'stock-medium';
                                $stockIcon = 'fa-exclamation-triangle';
                                } else {
                                $stockClass = 'stock-low';
                                $stockIcon = 'fa-exclamation-circle';
                                }
                                @endphp
                                <span class="stock-badge {{ $stockClass }}">
                                    <i class="fas {{ $stockIcon }}"></i> {{ $product->stock }} item
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku {{ $product->title }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr id="emptyRow">
                            <td colspan="6" class="empty-state">
                                <div class="empty-icon">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <h4>Belum Ada Data Buku</h4>
                                <p style="color: #8a99b9;">Silakan tambah buku baru dengan klik tombol "Tambah Buku Baru"</p>
                            <td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Filter elements
        const searchTitle = document.getElementById('searchTitle');
        const filterCategory = document.getElementById('filterCategory');
        const filterStock = document.getElementById('filterStock');
        const btnReset = document.getElementById('btnReset');
        const btnFilter = document.getElementById('btnFilter');
        const tableRows = document.querySelectorAll('#productsTableBody tr');
        const emptyRow = document.getElementById('emptyRow');

        function filterTable() {
            const titleValue = searchTitle.value.toLowerCase().trim();
            const categoryValue = filterCategory.value;
            const stockValue = filterStock.value;

            let hasVisibleRow = false;

            tableRows.forEach(row => {
                // Skip empty row
                if (row.id === 'emptyRow') return;

                const rowTitle = row.getAttribute('data-title');
                const rowCategory = row.getAttribute('data-category');
                const rowStock = parseInt(row.getAttribute('data-stock'));

                let showRow = true;

                // Filter by title
                if (titleValue !== '' && !rowTitle.includes(titleValue)) {
                    showRow = false;
                }

                // Filter by category
                if (showRow && categoryValue !== 'all' && rowCategory !== categoryValue) {
                    showRow = false;
                }

                // Filter by stock
                if (showRow && stockValue !== 'all') {
                    switch (stockValue) {
                        case 'high':
                            if (rowStock < 20) showRow = false;
                            break;
                        case 'medium':
                            if (rowStock < 5 || rowStock >= 20) showRow = false;
                            break;
                        case 'low':
                            if (rowStock > 4 || rowStock === 0) showRow = false;
                            break;
                        case 'out':
                            if (rowStock !== 0) showRow = false;
                            break;
                    }
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
                    const tbody = document.getElementById('productsTableBody');
                    const newNoResultRow = document.createElement('tr');
                    newNoResultRow.id = 'noResultRow';
                    newNoResultRow.innerHTML = `
                        <td colspan="6" class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h4>Tidak Ada Buku</h4>
                            <p style="color: #8a99b9;">Tidak ada buku yang sesuai dengan filter</p>
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
            searchTitle.value = '';
            filterCategory.value = 'all';
            filterStock.value = 'all';
            filterTable();
        }

        // Event listeners
        if (btnFilter) btnFilter.addEventListener('click', filterTable);
        if (btnReset) btnReset.addEventListener('click', resetFilter);

        // Enter key on search input
        if (searchTitle) {
            searchTitle.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') filterTable();
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>