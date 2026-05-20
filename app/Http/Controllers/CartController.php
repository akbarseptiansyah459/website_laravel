<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $qty = $request->quantity ?? 1; // default quantity 1 jika tidak ada

        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($cart) {
            $cart->quantity += $qty;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => $qty
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();

        return view('cart.index', compact('carts'));
    }

    // ✅ TAMBAHKAN METHOD UPDATE INI
    public function update(Request $request, $id)
    {
        $cart = Cart::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->route('cart.index')->with('success', 'Jumlah produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $cart = Cart::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $cart->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function checkout(Request $request)
    {
        $carts = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Keranjang kosong');
        }

        // Validasi input checkout
        $request->validate([
            'address' => 'required|string|min:5',
            'payment_method' => 'required|string',
            'shipping_courier' => 'required|string',
        ]);

        $subtotal = 0;

        foreach ($carts as $cart) {
            // Cek stok produk
            if ($cart->product->stock < $cart->quantity) {
                return back()->with('error', "Stok produk {$cart->product->title} tidak mencukupi!");
            }
            $subtotal += $cart->product->price * $cart->quantity;
        }

        $shipping = $request->shipping_cost ?? 10000;

        $totalFinal = $subtotal + $shipping;

        $order = Order::create([
            'user_id' => Auth::id(),
            'address' => $request->address,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
            'shipping_courier' => $request->shipping_courier,
            'shipping_cost' => $shipping,
            'total_price' => $totalFinal,
            'status' => 'Pending',
        ]);

        foreach ($carts as $cart) {

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'price' => $cart->product->price,
                'quantity' => $cart->quantity,
            ]);

            // kurangi stok
            $cart->product->decrement('stock', $cart->quantity);

            $cart->product->increment('sold_count', $cart->quantity);
        }

        // kosongkan keranjang
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('invoice', $order->id)->with('success', 'Pesanan berhasil dibuat!');
    }
}
