<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flashsale extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'category', 'description', 'image', 'diskon' // Hapus 'product_id' dari sini
    ];

    // Mendapatkan harga setelah diskon
    public function getDiscountedPrice()
    {
        // Menghitung harga setelah diskon jika diskon ada
        if ($this->diskon) {
            return $this->price - ($this->price * ($this->diskon / 100));
        }

        return $this->price; // Jika tidak ada diskon, kembalikan harga asli
    }
}
