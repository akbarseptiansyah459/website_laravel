<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - Admin Toko Buku Cirebon</title>

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

        .form-control::placeholder {
            color: #3a4a6e !important;
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

        /* IMAGE PREVIEW */
        .image-preview {
            margin-top: 12px;
            display: none;
        }

        .image-preview img {
            width: 120px;
            height: auto;
            border-radius: 12px;
            border: 2px solid rgba(0, 229, 160, 0.3);
            background: #0f1724;
            padding: 4px;
        }

        /* BUTTONS */
        .btn-save {
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
        }

        .btn-save:hover {
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

        /* ALERT */
        .alert {
            border-radius: 16px;
            padding: 16px 20px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 24px;
            border: none;
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

            .form-card {
                padding: 24px;
            }

            .button-group {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-back,
            .btn-save {
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
            <h1><i class="fas fa-plus-circle"></i> Tambah Buku</h1>
            <p><i class="fas fa-book"></i> Tambahkan koleksi buku baru ke toko</p>
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
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label><i class="fas fa-heading"></i> Judul Buku</label>
                            <input type="text" name="title" class="form-control" placeholder="Masukkan judul buku" value="{{ old('title') }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><i class="fas fa-tag"></i> Kategori</label>
                            <input type="text" name="category" class="form-control" placeholder="Novel / Komik / Teknologi" value="{{ old('category') }}" required>
                        </div>
                    </div>
                </div>

                <!-- PENULIS / PENCIPTA -->
                <div class="form-group">
                    <label><i class="fas fa-user-pen"></i> Penulis / Pengarang</label>
                    <input type="text" name="author" class="form-control" placeholder="Masukkan nama penulis" value="{{ old('author') }}">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fas fa-money-bill-wave"></i> Harga</label>
                            <input type="number" name="price" class="form-control" placeholder="Masukkan harga" value="{{ old('price') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fas fa-cubes"></i> Stok</label>
                            <input type="number" name="stock" class="form-control" placeholder="Masukkan stok" value="{{ old('stock') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-align-left"></i> Deskripsi</label>
                    <textarea name="description" class="form-control" placeholder="Deskripsikan buku ini...">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-image"></i> Upload Gambar Buku</label>
                    <input type="file" name="image" class="form-control" id="imageInput" accept="image/*" required>
                    <small class="text-muted" style="font-size: 11px;">
                        <i class="fas fa-info-circle"></i> Format: JPG, PNG, JPEG. Maksimal 2MB
                    </small>
                    <div class="image-preview" id="imagePreview">
                        <img id="previewImg" src="#" alt="Preview Gambar">
                    </div>
                </div>

                <div class="button-group">
                    <a href="{{ route('products.index') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save"></i> Simpan Buku
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Preview image sebelum upload
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');

        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        previewImg.src = event.target.result;
                        imagePreview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.style.display = 'none';
                    previewImg.src = '#';
                }
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>