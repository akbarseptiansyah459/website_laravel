<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Toko Buku Cirebon</title>

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

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
            padding-top: 20px;
        }

        .page-header h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 42px;
            background: linear-gradient(135deg, #ffffff, #00e5a0);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 12px;
        }

        .card-checkout {
            background: #131c2e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 28px;
            padding: 40px;
            margin-bottom: 40px;
        }

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

        .product-item {
            background: #0f1724;
            border-radius: 16px;
            padding: 16px;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .product-img {
            width: 70px;
            height: 90px;
            object-fit: cover;
            border-radius: 12px;
        }

        .form-control, .form-select {
            background: #0f1724 !important;
            border: 1.5px solid rgba(255, 255, 255, 0.06) !important;
            color: #e8edf5 !important;
            border-radius: 14px !important;
            padding: 12px 16px;
            width: 100%;
        }

        .form-control:focus, .form-select:focus {
            border-color: #00e5a0 !important;
            box-shadow: 0 0 0 4px rgba(0, 229, 160, 0.1) !important;
        }

        .summary-box {
            background: #0f1724;
            padding: 24px;
            border-radius: 20px;
            margin-top: 24px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .summary-total {
            border-top: 2px solid rgba(0, 229, 160, 0.2);
            padding-top: 12px;
            margin-top: 12px;
            font-size: 20px;
            font-weight: 800;
            color: #00e5a0;
        }

        .btn-checkout {
            background: linear-gradient(135deg, #00e5a0, #00b87a);
            border: none;
            color: #0a0f1a;
            font-weight: 700;
            padding: 14px;
            border-radius: 14px;
            width: 100%;
            margin-top: 24px;
        }

        .alert {
            border-radius: 16px;
            padding: 16px 20px;
            margin-bottom: 24px;
        }

        .alert-success {
            background: rgba(0, 229, 160, 0.1);
            border-left: 4px solid #00e5a0;
            color: #00e5a0;
        }

        .alert-info {
            background: rgba(59, 130, 246, 0.1);
            border-left: 4px solid #3b82f6;
            color: #3b82f6;
        }

        @media (max-width: 768px) {
            .card-checkout { padding: 24px; }
            .product-item { flex-direction: column; text-align: center; gap: 10px; }
        }
    </style>
</head>

<body>

    @php
        $subtotal = 0;
        $totalItem = 0;
        foreach($carts as $cart){
            if($cart->product) {
                $subtotal += $cart->product->price * $cart->quantity;
                $totalItem += $cart->quantity;
            }
        }
        $freeShippingThreshold = 250000;
        $isFreeShipping = $subtotal >= $freeShippingThreshold;
    @endphp

    <div class="container mt-4 mb-5">
        <div class="page-header">
            <h2><i class="fas fa-credit-card"></i> Checkout Pesanan</h2>
            <p><i class="fas fa-shopping-bag"></i> Lengkapi data untuk menyelesaikan pesanan</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- NOTIFIKASI GRATIS ONGKIR -->
                @if($isFreeShipping)
                <div class="alert alert-success">
                    <i class="fas fa-gift"></i> <strong>Selamat!</strong> Anda mendapatkan <strong>GRATIS ONGKIR</strong> karena belanja di atas Rp 250.000
                </div>
                @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Tambah belanja <strong>Rp {{ number_format($freeShippingThreshold - $subtotal, 0, ',', '.') }}</strong> lagi untuk mendapatkan <strong>GRATIS ONGKIR</strong>!
                </div>
                @endif

                <div class="card-checkout">
                    <!-- Product List -->
                    <div class="section-title">
                        <i class="fas fa-box"></i> Produk yang Dipesan
                    </div>

                    @foreach($carts as $cart)
                    @if($cart->product)
                    <div class="product-item">
                        <div class="d-flex align-items-center gap-3">
                            @if($cart->product->image)
                            <img src="{{ asset('storage/' . $cart->product->image) }}" class="product-img">
                            @else
                            <div class="product-img d-flex align-items-center justify-content-center bg-dark">
                                <i class="fas fa-book fa-2x text-muted"></i>
                            </div>
                            @endif
                            <div>
                                <div class="fw-bold">{{ $cart->product->title }}</div>
                                <small class="text-muted">Qty: {{ $cart->quantity }}</small>
                            </div>
                        </div>
                        <div class="fw-bold text-success">
                            Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                        </div>
                    </div>
                    @endif
                    @endforeach

                    <form action="{{ route('checkout') }}" method="POST" id="checkoutForm">
                        @csrf

                        <div class="section-title mt-4">
                            <i class="fas fa-map-marker-alt"></i> Alamat Pengiriman
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea name="address" class="form-control" rows="3" required placeholder="Jl. Perjuangan No. 10, Cirebon"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor HP</label>
                            <input type="tel" name="phone" class="form-control" required placeholder="08xxxxxxxxxx" value="{{ auth()->user()->phone ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Catatan (Opsional)</label>
                            <textarea name="note" class="form-control" rows="2" placeholder="Contoh: Rumah pagar hitam"></textarea>
                        </div>

                        <div class="section-title">
                            <i class="fas fa-wallet"></i> Metode Pembayaran
                        </div>

                        <div class="mb-3">
                            <select name="payment_method" class="form-select" required>
                                <option value="">-- Pilih Metode --</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="COD">COD (Bayar di Tempat)</option>
                                <option value="E-Wallet">E-Wallet</option>
                            </select>
                        </div>

                        <div class="section-title">
                            <i class="fas fa-truck"></i> Kurir Pengiriman
                        </div>

                        <div class="mb-3">
                            <select name="shipping_courier" id="courier" class="form-select" required>
                                <option value="">-- Pilih Kurir --</option>
                                <option value="JNE REG" data-cost="15000">JNE REG - Rp 15.000</option>
                                <option value="J&T Express" data-cost="25000">J&T Express - Rp 25.000</option>
                                <option value="SiCepat BEST" data-cost="35000">SiCepat BEST - Rp 35.000</option>
                            </select>
                        </div>

                        <input type="hidden" name="shipping_cost" id="shipping_cost" value="0">

                        <div class="summary-box">
                            <div class="summary-item"><span>Total Item</span><span>{{ $totalItem }} Item</span></div>
                            <div class="summary-item"><span>Subtotal</span><span id="subtotalText">Rp {{ number_format($subtotal, 0, ',', '.') }}</span></div>
                            <div class="summary-item"><span>Ongkos Kirim</span><span id="ongkirText">Rp 0</span></div>
                            <div class="summary-item summary-total"><span>Total</span><span id="totalText">Rp {{ number_format($subtotal, 0, ',', '.') }}</span></div>
                        </div>

                        <button type="submit" class="btn-checkout">
                            <i class="fas fa-check-circle"></i> Konfirmasi & Bayar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const courierSelect = document.getElementById('courier');
        const shippingInput = document.getElementById('shipping_cost');
        const ongkirText = document.getElementById('ongkirText');
        const totalText = document.getElementById('totalText');
        const subtotalText = document.getElementById('subtotalText');
        
        let subtotal = parseInt(subtotalText.innerText.replace('Rp ', '').replace(/\./g, '')) || 0;
        const FREE_SHIPPING_MIN = 250000;

        function formatRupiah(angka) {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);
        }

        function updateShipping() {
            if (courierSelect && courierSelect.selectedIndex > 0) {
                let selected = courierSelect.options[courierSelect.selectedIndex];
                let cost = parseInt(selected.getAttribute('data-cost')) || 0;
                
                // CEK GRATIS ONGKIR
                if (subtotal >= FREE_SHIPPING_MIN) {
                    cost = 0;
                    ongkirText.innerHTML = '<span style="color: #00e5a0;"><i class="fas fa-gift"></i> GRATIS!</span>';
                } else {
                    ongkirText.innerHTML = formatRupiah(cost);
                }
                
                shippingInput.value = cost;
                totalText.innerHTML = formatRupiah(subtotal + cost);
            } else {
                shippingInput.value = 0;
                ongkirText.innerHTML = formatRupiah(0);
                totalText.innerHTML = formatRupiah(subtotal);
            }
        }

        courierSelect.addEventListener('change', updateShipping);
        updateShipping();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>