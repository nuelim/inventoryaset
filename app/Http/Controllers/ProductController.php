<?php

// Buat controller ini dengan perintah:
// php artisan make:controller ProductController --resource

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // (Anda perlu buat model ini)

class ProductController extends Controller
{
    /**
     * Menampilkan halaman daftar barang.
     * (Menggunakan product-list.html)
     */
    public function index()
    {
        // 1. Ambil semua data barang dari database
        $products = Product::all(); 

        // 2. Kirim data itu ke view
        return view('products.index', ['products' => $products]);
    }

    /**
     * Menampilkan form untuk menambah barang baru.
     * (Menggunakan add-product.html)
     */
    public function create()
    {
        // Hanya menampilkan view formulir
        return view('products.create');
    }

    /**
     * Menyimpan barang baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi data dari form
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_stock' => 'required|integer',
            // ...validasi lainnya...
        ]);

        // 2. Simpan data ke database
        Product::create([
            'name' => $request->product_name,
            'price' => $request->product_price,
            'stock' => $request->product_stock,
            // ...field lainnya...
        ]);

        // 3. Arahkan kembali ke halaman daftar barang dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }
}