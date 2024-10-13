<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distributor;
use RealRashid\SweetAlert\Facades\Alert; // Pastikan ini ada

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();
        
        // Menampilkan notifikasi jika ada
        if (session('success')) {
            Alert::success('Berhasil!', session('success'));
        }

        return view('pages.admin.Distributor.index', compact('distributors'));
    }

    // Menampilkan formulir untuk membuat distributor baru
    public function create()
    {
        return view('pages.admin.Distributor.create');
    }

    // Menampilkan detail distributor
    public function detail($id)
    {
        $distributor = Distributor::findOrFail($id);
        
        return view('pages.admin.Distributor.detail', compact('distributor'));
    }

    // Menyimpan distributor baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        Distributor::create($request->all());

        // Kembali ke index dengan notifikasi
        return redirect()->route('admin.Distributor')->with('success', 'Distributor berhasil ditambahkan.');
    }

    // Menampilkan formulir untuk mengedit distributor
    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('pages.admin.Distributor.edit', compact('distributor'));
    }

    // Memperbarui distributor yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());

        // Kembali ke index dengan notifikasi
        return redirect()->route('admin.Distributor')->with('success', 'Distributor berhasil diperbarui.');
    }

    // Menghapus distributor dari database
    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();

        // Kembali ke index dengan notifikasi
        return redirect()->route('admin.Distributor')->with('success', 'Distributor berhasil dihapus.');
    }

    // Menampilkan konfirmasi penghapusan
    public function confirmDelete($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('admin.distributor.confirm_delete', compact('distributor'));
    }
}
