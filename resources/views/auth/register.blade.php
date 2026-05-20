<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Toko Buku Cirebon</title>

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
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-container {
            max-width: 480px;
            width: 100%;
            margin: 20px;
        }

        .register-card {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 28px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .logo {
            text-align: center;
            margin-bottom: 28px;
        }

        .logo h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 28px;
            background: linear-gradient(135deg, #ffffff, #00e5a0);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .logo p {
            font-size: 13px;
            color: #8a99b9;
            margin-top: 8px;
        }

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
            width: 100%;
        }

        .form-control:focus {
            border-color: #00e5a0 !important;
            box-shadow: 0 0 0 4px rgba(0, 229, 160, 0.1) !important;
            outline: none;
        }

        .btn-register {
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            border: none;
            color: #0a0f1a;
            font-weight: 700;
            font-size: 15px;
            padding: 14px;
            border-radius: 12px;
            width: 100%;
            transition: all 0.25s ease;
            margin-top: 8px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 229, 160, 0.3);
            color: #0a0f1a;
        }

        .login-link {
            text-align: center;
            margin-top: 24px;
            font-size: 13px;
            color: #8a99b9;
        }

        .login-link a {
            color: #00e5a0;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #f87171;
            color: #f87171;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            gap: 16px;
        }

        .row .form-group {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="register-card">
            <div class="logo">
                <i class="fas fa-book" style="font-size: 48px; color: #00e5a0;"></i>
                <h2>Toko Buku Cirebon</h2>
                <p>Daftar akun baru</p>
            </div>

            @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i>
                @foreach($errors->all() as $error)
                {{ $error }}<br>
                @endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row">
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nama lengkap" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-phone"></i> No. HP</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx">
                    </div>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-envelope"></i> Alamat Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="contoh@email.com" required>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label><i class="fas fa-lock"></i> Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-check-circle"></i> Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                    </div>
                </div>

                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus"></i> Daftar
                </button>

                <div class="login-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Login Sekarang</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>