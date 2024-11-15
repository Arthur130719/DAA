<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama_pelanggan',
        'alamat_pelanggan',
        'package_id',
    ];

    /**
     * Definisikan relasi dengan model Package.
     * Setiap pelanggan memiliki satu paket.
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Accessor untuk mendapatkan nama paket dari relasi Package.
     */
    public function getNamaPaketAttribute()
    {
        return $this->package ? $this->package->nama_paket : null;
    }

    /**
     * Accessor untuk mendapatkan harga paket dari relasi Package.
     */
    public function getHargaPaketAttribute()
    {
        return $this->package ? $this->package->harga : null;
    }
}
