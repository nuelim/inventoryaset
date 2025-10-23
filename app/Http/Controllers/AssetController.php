<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset; // (Anda perlu buat model ini)

class AssetController extends Controller
{
    public function index()
    {
        // 1. Ambil semua data barang dari database
        $asset = Asset::all(); 

        // 2. Kirim data itu ke view
        return view('asset.index', ['asset' => $asset]);
    }

    public function create()
    {
        // Hanya menampilkan view formulir
        return view('asset.create');
    }

    /**
     * Menyimpan barang baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi data dari form
        $request->validate([
            'asset_name' => 'required',
            'asset_price' => 'required|numeric',
            'asset_stock' => 'required|integer',
            // ...validasi lainnya...
        ]);

        // 2. Simpan data ke database
        Asset::create([
            'name' => $request->asset_name,
            'price' => $request->asset_price,
            'stock' => $request->asset_stock,
            // ...field lainnya...
        ]);

        // 3. Arahkan kembali ke halaman daftar barang dengan pesan sukses
        return redirect()->route('asset.index')->with('success', 'Aset berhasil ditambahkan!');
    }
}
