<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieManagementController extends Controller
{
    // 1. Menampilkan Daftar Film (Read)
    public function index()
    {
        // Simulasi data (Nanti diganti Movie::all() kalau sudah migrasi Database)
        $movies = [
            ['id' => 1, 'title' => 'Velvet Midnight', 'genre' => 'Romance', 'rating' => '8.5'],
            ['id' => 2, 'title' => 'Shadow of ITG', 'genre' => 'Action', 'rating' => '9.0'],
        ];

        return view('admin.manage-movies', compact('movies'));
    }

    // 2. Menampilkan Form Tambah Film (Create - Page)
    public function create()
    {
        return view('admin.add-movie');
    }

    // 3. Proses Simpan Film Baru (Create - Action)
    public function store(Request $request)
    {
        // Validasi: Memastikan semua field diisi dengan benar
        $request->validate([
            'title'  => 'required|string|max:255',
            'genre'  => 'required|string',
            'rating' => 'required|numeric|between:0,10',
        ]);

        // Logika simpan ke database (Contoh: Movie::create($request->all()))
        
        // Redirect kembali ke daftar film dengan pesan sukses
        return redirect()->route('admin.movies.index')->with('success', 'Film baru berhasil ditambahkan!');
    }

    // 4. Menampilkan Form Edit Film (Update - Page)
    public function edit($id)
    {
        // Nanti di sini kita cari data film berdasarkan ID: $movie = Movie::findOrFail($id);
        return view('admin.edit-movie', compact('id'));
    }

    // 5. Proses Update Data Film (Update - Action)
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'  => 'required',
            'genre'  => 'required',
            'rating' => 'required|numeric',
        ]);

        // Logika update di sini...

        return redirect()->route('admin.movies.index')->with('success', 'Data film berhasil diperbarui!');
    }

    // 6. Proses Hapus Film (Delete)
    public function destroy($id)
    {
        // Logika hapus: $movie = Movie::findOrFail($id); $movie->delete();
        return back()->with('success', 'Film berhasil dihapus dari sistem!');
    }
}