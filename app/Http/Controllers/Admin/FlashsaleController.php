<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flashsale; 
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FlashsaleController extends Controller
{
    public function index()
    {
        $flashsales = Flashsale::all(); // Mengambil semua flash sale
        return view('pages.admin.flashsales.index', compact('flashsales'));
    }

    public function create()
    {
        return view('pages.admin.flashsales.create'); // Halaman untuk membuat flash sale baru
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'diskon' => 'nullable|numeric|min:0|max:10000',
        ]);

        try {
            // Menyimpan data flash sale
            $flashsale = new Flashsale();
            $flashsale->name = $request->name;
            $flashsale->price = $request->price;
            $flashsale->category = $request->category;
            $flashsale->description = $request->description;

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $flashsale->image = $imageName; // Menyimpan nama gambar ke database
            }

            $flashsale->diskon = $request->diskon;
            $flashsale->save(); // Simpan data ke database

            Alert::success('Sukses', 'Flash Sale berhasil ditambahkan!');
            return redirect()->route('flashsales.index');

        } catch (\Exception $e) {
            // Menangkap kesalahan dan menampilkan pesan gagal
            Alert::error('Gagal', 'Flash Sale gagal ditambahkan: ' . $e->getMessage());
            return redirect()->back()->withInput(); // Kembali ke form dengan input yang ada
        }
    }

    public function detail($id)
    {
        $flashSale = Flashsale::findOrFail($id); // Menampilkan detail flash sale
        return view('pages.admin.flashsales.detail', compact('flashSale'));
    }   

    public function edit($id)
    {
        $flashsale = Flashsale::findOrFail($id); // Mengambil data flash sale untuk diedit
        return view('pages.admin.flashsales.edit', compact('flashsale'));
    }   

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'diskon' => 'nullable|numeric|min:0|max:10000',
        ]);

        $flashsale = Flashsale::findOrFail($id);
        $flashsale->name = $request->name;
        $flashsale->price = $request->price;
        $flashsale->category = $request->category;
        $flashsale->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $flashsale->image = $imageName;
        }

        $flashsale->diskon = $request->diskon;
        $flashsale->save();

        Alert::success('Sukses', 'Flash Sale berhasil diperbarui!');
        return redirect()->route('flashsales.index');
    }

    public function delete($id)
    {
        $flashsale = Flashsale::findOrFail($id);
        $flashsale->delete();

        Alert::success('Sukses', 'Flash Sale berhasil dihapus!');
        return redirect()->route('flashsales.index');
    }

    public function purchase($flashsaleId)
    {
        $user = auth()->user(); // Ambil pengguna yang sedang login
        $flashsale = Flashsale::find($flashsaleId); // Temukan produk flash sale

        if ($flashsale) {
            // Dapatkan harga setelah diskon
            $discountedPrice = $flashsale->getDiscountedPrice();

            // Hitung poin yang dibutuhkan
            $pointsNeeded = $discountedPrice; // Misalnya 1 poin per 1 unit harga

            // Cek apakah pengguna memiliki cukup poin
            if ($user->points >= $pointsNeeded) {
                // Kurangi poin dari pengguna
                $user->points -= $pointsNeeded;
                $user->save();

                // Logika untuk menyimpan pembelian
                // Misalnya, simpan data pembelian ke tabel transaksi (jika ada)

                Alert::success('Sukses', 'Pembelian berhasil!');
                return redirect()->route('flashsales.index'); // Atau halaman lain sesuai kebutuhan
            } else {
                Alert::error('Gagal', 'Poin Anda tidak cukup.');
                return redirect()->back();
            }
        }

        Alert::error('Gagal', 'Flash sale tidak ditemukan.');
        return redirect()->back();
    }
}
