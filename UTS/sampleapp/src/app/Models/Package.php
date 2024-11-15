<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'harga',
    ];

    /**
     * Definisikan relasi dengan model Customer.
     * Satu paket bisa memiliki banyak pelanggan.
     */
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
