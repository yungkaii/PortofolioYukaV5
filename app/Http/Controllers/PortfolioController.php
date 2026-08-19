<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // Menampilkan Halaman Utama
    public function index()
    {
        return view('pages.home');
    }

    // Menangani Form Kontak
    public function kirimPesan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        // Tambahkan logika kirim email atau simpan ke database di sini
        
        return back()->with('success', 'Pesan Anda berhasil terkirim ke lautan!');
    }

    // Menangani Download CV
    public function downloadCv()
    {
        $filePath = public_path('files/cv-anda.pdf');
        
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return back()->with('error', 'File CV belum tersedia.');
    }
}