<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }} - Toko Buku Cirebon</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: #e8ecf1;
            font-family: 'Inter', sans-serif;
            padding: 40px 20px;
        }

        .invoice-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .invoice-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .invoice-header {
            background: linear-gradient(135deg, #0a0f1a 0%, #0d1422 100%);
            color: white;
            padding: 20px 24px;
            text-align: center;
        }

        .invoice-title {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .invoice-title span {
            color: #00e5a0;
        }

        .invoice-id {
            font-size: 12px;
            color: #8a99b9;
            margin-top: 4px;
        }

        .store-name {
            font-size: 14px;
            font-weight: 600;
            color: #00e5a0;
        }

        .store-address {
            font-size: 10px;
            color: #8a99b9;
        }

        .invoice-body {
            padding: 20px 24px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 12px;
        }

        .info-label {
            color: #64748b;
            font-weight: 500;
        }

        .info-value {
            color: #1e293b;
            font-weight: 600;
            text-align: right;
        }

        .divider {
            border-top: 1px dashed #e2e8f0;
            margin: 12px 0;
        }

        .badge-status {
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-pending {
            background: #fef3c7;
            color: #d97706;
        }

        .badge-processing {
            background: #dbeafe;
            color: #2563eb;
        }

        .badge-shipped {
            background: #ede9fe;
            color: #7c3aed;
        }

        .badge-delivered {
            background: #d1fae5;
            color: #059669;
        }

        .items-table {
            width: 100%;
            font-size: 11px;
            margin: 12px 0;
        }

        .items-table th {
            text-align: left;
            padding: 8px 0;
            color: #64748b;
            border-bottom: 1px solid #e2e8f0;
        }

        .items-table td {
            padding: 6px 0;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        .total-box {
            background: #f8fafc;
            border-radius: 12px;
            padding: 12px 16px;
            margin-top: 12px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .total-grand {
            border-top: 1px solid #e2e8f0;
            padding-top: 8px;
            margin-top: 8px;
            font-size: 16px;
            font-weight: 800;
            color: #059669;
        }

        .invoice-footer {
            text-align: center;
            padding: 12px 24px;
            background: #f8fafc;
            font-size: 10px;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
        }

        .btn-print {
            background: #1e293b;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            margin-top: 16px;
        }

        .btn-back {
            background: #64748b;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            text-decoration: none;
            margin-left: 8px;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .no-print {
                display: none;
            }

            .invoice-header {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>

    <div class="invoice-container">
        <div class="invoice-card">
            <div class="invoice-header">
                <div class="invoice-title">INVOICE <span>#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span></div>
                <div class="invoice-id">{{ $order->created_at instanceof \DateTime ? $order->created_at->format('d/m/Y H:i') : date('d/m/Y H:i', strtotime($order->created_at)) }}</div>
                <div class="store-name mt-2">📚 Toko Buku Cirebon</div>
                <div class="store-address">Jl. Perjuangan Mjasem, Cirebon</div>
                <div class="store-address">Telp: 0812-3456-7890</div>
            </div>

            <div class="invoice-body">
                @php
                $statusMap = [
                'Pending' => ['class' => 'badge-pending', 'text' => 'Pending'],
                'Diproses' => ['class' => 'badge-processing', 'text' => 'Diproses'],
                'Dikirim' => ['class' => 'badge-shipped', 'text' => 'Dikirim'],
                'Selesai' => ['class' => 'badge-delivered', 'text' => 'Selesai'],
                ];
                $status = $statusMap[$order->status] ?? ['class' => 'badge-pending', 'text' => $order->status];
                $subtotal = $order->total_price - ($order->shipping_cost ?? 0);
                $isFreeShipping = $subtotal >= 250000;
                @endphp

                <div style="text-align: center; margin-bottom: 16px;">
                    <span class="badge-status {{ $status['class'] }}">{{ $status['text'] }}</span>
                </div>

                <div class="divider"></div>

                <!-- PELANGGAN -->
                <div class="info-row"><span class="info-label">Pelanggan</span><span class="info-value">{{ $order->user->name ?? '-' }}</span></div>
                <div class="info-row"><span class="info-label">Email</span><span class="info-value">{{ $order->user->email ?? '-' }}</span></div>
                <div class="info-row"><span class="info-label"><i class="fas fa-phone"></i> No. HP</span><span class="info-value">{{ $order->phone ?? $order->user->phone ?? '-' }}</span></div>

                <div class="divider"></div>

                <!-- PENGIRIMAN -->
                <div class="info-row"><span class="info-label">Alamat</span><span class="info-value">{{ Str::limit($order->address ?? '-', 40) }}</span></div>
                <div class="info-row"><span class="info-label">Kurir</span><span class="info-value">{{ $order->shipping_courier ?? '-' }}</span></div>
                <div class="info-row"><span class="info-label">Pembayaran</span><span class="info-value">{{ $order->payment_method ?? '-' }}</span></div>
                <div class="info-row">
                    <span class="info-label">Ongkos Kirim</span>
                    <span class="info-value">
                        @if($isFreeShipping)
                        <span style="color: #10b981;"><i class="fas fa-gift"></i> GRATIS!</span>
                        @else
                        Rp {{ number_format($order->shipping_cost ?? 0, 0, ',', '.') }}
                        @endif
                    </span>
                </div>

                <div class="divider"></div>

                <!-- PRODUK -->
                <table class="items-table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ Str::limit($item->product->title ?? 'Produk', 25) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="divider"></div>

                <!-- TOTAL -->
                <div class="total-box">
                    <div class="total-row"><span>Subtotal</span><span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span></div>
                    <div class="total-row">
                        <span>Ongkos Kirim</span>
                        <span>
                            @if($isFreeShipping)
                            <span style="color: #10b981;"><i class="fas fa-gift"></i> GRATIS</span>
                            @else
                            Rp {{ number_format($order->shipping_cost ?? 0, 0, ',', '.') }}
                            @endif
                        </span>
                    </div>
                    <div class="total-row total-grand"><span>TOTAL</span><span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span></div>
                </div>

                @if($isFreeShipping)
                <div class="text-center mt-3">
                    <small class="text-success"><i class="fas fa-gift"></i> Gratis ongkir (minimal belanja Rp 250.000)</small>
                </div>
                @endif
            </div>

            <div class="invoice-footer">
                <i class="fas fa-check-circle"></i> Terima kasih telah berbelanja
            </div>

            <div class="text-center no-print" style="padding: 0 24px 20px 24px;">
                <button onclick="window.print()" class="btn-print"><i class="fas fa-print"></i> Cetak</button>
                <a href="{{ url()->previous() }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>

</body>

</html>