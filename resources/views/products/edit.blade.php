<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku - Admin Toko Buku Cirebon</title>

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

        /* FORM CARD */
        .form-card {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 32px;
            max-width: 800px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #cbd5e6;
            margin-bottom: 8px;
            display: block;
        }

        label i {
            margin-right: 8px;
            color: #00e5a0;
        }

        .form-control {
            background: #0f1724 !important;
            border: 1.5px solid rgba(255, 255, 255, 0.06) !important;
            color: #e8edf5 !important;
            border-radius: 12px !important;
            padding: 12px 16px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            transition: all 0.2s ease;
            width: 100%;
        }

        .form-control:focus {
            border-color: #00e5a0 !important;
            box-shadow: 0 0 0 4px rgba(0, 229, 160, 0.1) !important;
            outline: none;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        input[type="file"].form-control {
            padding: 8px 12px;
        }

        input[type="file"].form-control::file-selector-button {
            background: #00e5a0;
            border: none;
            border-radius: 8px;
            padding: 6px 16px;
            margin-right: 12px;
            color: #0a0f1a;
            font-weight: 600;
            cursor: pointer;
        }

        /* CURRENT IMAGE */
        .current-image {
            background: #0f1724;
            border-radius: 16px;
            padding: 16px;
            margin-bottom: 20px;
            text-align: center;
        }

        .current-image-label {
            font-size: 12px;
            color: #8a99b9;
            margin-bottom: 12px;
            display: block;
        }

        .current-image img {
            width: 150px;
            height: auto;
            border-radius: 12px;
            border: 2px solid rgba(0, 229, 160, 0.3);
        }

        /* BUTTONS */
        .btn-update {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border: none;
            color: #ffffff;
            font-weight: 700;
            font-size: 14px;
            padding: 12px 28px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.25s ease;
        }

        .btn-update:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
            color: #ffffff;
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
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        .button-group {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 24px;
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

            .form-card {
                padding: 24px;
            }

            .button-group {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-back,
            .btn-update {
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
            <h1><i class="fas fa-edit"></i> Edit Buku</h1>
            <p><i class="fas fa-book"></i> Perbarui informasi buku yang dipilih</p>
        </div>

        @if($errors->any())
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i>
            @foreach($errors->all() as $error)
            {{ $error }}<br>
            @endforeach
        </div>
        @endif

        <div class="form-card">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label><i class="fas fa-heading"></i> Judul Buku</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $product->title) }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><i class="fas fa-tag"></i> Kategori</label>
                            <input type="text" name="category" class="form-control" value="{{ old('category', $product->category) }}" required>
                        </div>
                    </div>
                </div>

                <!-- PENULIS / PENCIPTA -->
                <div class="form-group">
                    <label><i class="fas fa-user-pen"></i> Penulis / Pengarang</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', $product->author) }}" placeholder="Masukkan nama penulis">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fas fa-money-bill-wave"></i> Harga</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fas fa-cubes"></i> Stok</label>
                            <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-align-left"></i> Deskripsi</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-image"></i> Gambar Baru</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <small class="text-muted" style="font-size: 11px;">
                        <i class="fas fa-info-circle"></i> Biarkan kosong jika tidak ingin mengubah gambar
                    </small>
                </div>

                <div class="current-image">
                    <div class="current-image-label">
                        <i class="fas fa-eye"></i> Gambar Saat Ini
                    </div>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                </div>

                <div class="button-group">
                    <a href="{{ route('products.index') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn-update">
                        <i class="fas fa-save"></i> Update Buku
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>