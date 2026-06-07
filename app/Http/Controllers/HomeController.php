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
        $bestSellers = Product::orderBy('sold_count', 'desc')->take(4)->get();

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
