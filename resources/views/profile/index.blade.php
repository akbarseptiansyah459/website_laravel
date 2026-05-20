<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Saya - Toko Buku Cirebon</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">

    <style>
        /* Style sama seperti sebelumnya */
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
            margin: 0 auto 16px;
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
        }

        .sidebar a.active {
            background: rgba(0, 229, 160, 0.1);
            color: #00e5a0;
            border-right: 3px solid #00e5a0;
        }

        .logout-btn {
            width: 100%;
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #f87171;
            padding: 12px;
            border-radius: 12px;
        }

        .content {
            margin-left: 280px;
            padding: 40px 48px;
            min-height: 100vh;
        }

        .card-profile {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 28px;
            padding: 40px;
        }

        .section-label {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            color: #00e5a0;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid rgba(0, 229, 160, 0.2);
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

        .form-control {
            background: #0f1724 !important;
            border: 1.5px solid rgba(255, 255, 255, 0.06) !important;
            color: #e8edf5 !important;
            border-radius: 14px !important;
            padding: 12px 16px;
            width: 100%;
        }

        .form-control:focus {
            border-color: #00e5a0 !important;
            box-shadow: 0 0 0 4px rgba(0, 229, 160, 0.1) !important;
        }

        .btn-save {
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            border: none;
            color: #0a0f1a;
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 14px;
        }

        .alert {
            border-radius: 16px;
            padding: 16px 20px;
            margin-bottom: 28px;
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

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 260px;
            }

            .content {
                margin-left: 0;
                padding: 24px 20px;
            }

            .card-profile {
                padding: 24px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="avatar">
            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
        </div>
        <h4 style="text-align: center;">{{ auth()->user()->name ?? 'User' }}</h4>
        <p style="text-align: center; color: #8a99b9; font-size: 12px;">Pelanggan Toko Buku Cirebon</p>

        <div style="margin-top: 20px;">
            <a href="{{ url('/') }}">
                <i class="fas fa-home"></i> Beranda
            </a>
            <a href="{{ route('cart.index') }}">
                <i class="fas fa-shopping-cart"></i> Keranjang
            </a>
            <a href="{{ route('orders') }}">
                <i class="fas fa-box"></i> Pesanan
            </a>
            <a href="{{ route('history') }}">
                <i class="fas fa-history"></i> Riwayat
            </a>
            <a href="{{ route('my.profile') }}" class="active">
                <i class="fas fa-user-circle"></i> Profile Saya
            </a>
        </div>

        <hr style="border-color: rgba(255,255,255,0.1); margin: 20px 0;">

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
            <h2 style="font-family: 'Playfair Display'; font-size: 36px;">Edit Profile</h2>
            <p style="color: #8a99b9;">Perbarui informasi akun kamu di sini</p>
        </div>

        <div class="card-profile">
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

            @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i>
                @foreach($errors->all() as $error)
                {{ $error }}<br>
                @endforeach
            </div>
            @endif

            <!-- ⚠️ PERHATIAN: Method harus POST, JANGAN pakai @method('PUT') ⚠️ -->
            <form action="{{ route('my.profile.update') }}" method="POST">
                @csrf
                <!-- TIDAK ADA @method('PUT') DI SINI! -->

                <div class="section-label">
                    <i class="fas fa-user"></i> INFORMASI PRIBADI
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nomor HP / WhatsApp</label>
                    <input type="tel" name="phone" value="{{ old('phone', auth()->user()->phone) }}" class="form-control" placeholder="08xxxxxxxxxx">
                </div>

                <div class="section-label" style="margin-top: 32px;">
                    <i class="fas fa-lock"></i> KEAMANAN AKUN
                </div>

                <div class="form-group">
                    <label>Password Lama</label>
                    <input type="password" name="old_password" class="form-control" placeholder="Masukkan password lama">
                </div>

                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru">
                </div>

                <button type="submit" class="btn-save">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>