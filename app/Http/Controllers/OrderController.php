<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // RIWAYAT PELANGGAN

    public function history()
    {
        $orders = Order::where('user_id', Auth::id())
            ->where('status', 'Selesai')
            ->latest()
            ->get();

        return view(
            'orders.history',
            compact('orders')
        );
    }

    // ADMIN

    public function admin()
    {
        $orders = Order::with('user')
            ->latest()
            ->get();

        return view('admin.orders', compact('orders'));
    }

    public function invoice($id)
    {
        $order = Order::with('items.product', 'user')
            ->findOrFail($id);

        return view('orders.invoice', compact('order'));
    }

    public function customers()
    {
        $customers = User::where('role', 'pelanggan')
            ->latest()
            ->get();

        return view(
            'admin.customers',
            compact('customers')
        );
    }
    public function show($id)
    {
        $order = Order::with('items.product', 'user')
            ->findOrFail($id);

        return view(
            'admin.order-detail',
            compact('order')
        );
    }
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status;

        $order->save();

        return redirect()->back();
    }
    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->where('status', '!=', 'Selesai')
            ->latest()
            ->get();

        return view(
            'orders.orders',
            compact('orders')
        );
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);

        // Reset password ke default
        $user->password = bcrypt('password123');
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil direset menjadi: password123');
    }
}
