<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Buku Cirebon</title>

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

        .login-container {
            max-width: 450px;
            width: 100%;
            margin: 20px;
        }

        .login-card {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 28px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .logo {
            text-align: center;
            margin-bottom: 32px;
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
            width: 100%;
        }

        .form-control:focus {
            border-color: #00e5a0 !important;
            box-shadow: 0 0 0 4px rgba(0, 229, 160, 0.1) !important;
            outline: none;
        }

        .btn-login {
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            border: none;
            color: #0a0f1a;
            font-weight: 700;
            font-size: 15px;
            padding: 14px;
            border-radius: 12px;
            width: 100%;
            transition: all 0.25s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 229, 160, 0.3);
            color: #0a0f1a;
        }

        .register-link {
            text-align: center;
            margin-top: 24px;
            font-size: 13px;
            color: #8a99b9;
        }

        .register-link a {
            color: #00e5a0;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
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

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .remember-me input {
            width: 16px;
            height: 16px;
            accent-color: #00e5a0;
        }

        .remember-me label {
            margin: 0;
            font-size: 13px;
            font-weight: 400;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo">
                <i class="fas fa-book" style="font-size: 48px; color: #00e5a0;"></i>
                <h2>Toko Buku Cirebon</h2>
                <p>Silakan login untuk melanjutkan</p>
            </div>

            @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i> Email atau password salah!
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label><i class="fas fa-envelope"></i> Alamat Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="contoh@email.com" required autofocus>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-lock"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>

                <div class="register-link">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>