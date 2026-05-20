<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // SEARCH
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('category', 'like', '%' . $request->search . '%');
        }

        // FILTER KATEGORI
        if ($request->category) {
            $query->where('category', $request->category);
        }

        $products = $query->latest()->paginate(8);

        // PERBAIKAN: Ganti orderBy('sold_count') dengan yang ada kolomnya
        // Opsi 1 - Berdasarkan stok terbanyak
        $bestSellers = Product::orderBy('stock', 'desc')->take(4)->get();

        // Opsi 2 - Berdasarkan produk terbaru (uncomment jika mau)
        // $bestSellers = Product::latest()->take(4)->get();

        // Opsi 3 - Random (uncomment jika mau)
        // $bestSellers = Product::inRandomOrder()->take(4)->get();

        $categories = Product::select('category')
            ->distinct()
            ->pluck('category');

        return view('welcome', compact(
            'products',
            'categories',
            'bestSellers'
        ));
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('detail', compact('product'));
    }
}
