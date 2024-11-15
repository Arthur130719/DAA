<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed data untuk tabel 'packages'
        DB::table('packages')->insert([
            ['nama_paket' => 'Paket 10MB', 'harga' => 165000],
            ['nama_paket' => 'Paket 15MB', 'harga' => 200000],
            ['nama_paket' => 'Paket 20MB', 'harga' => 315000],
        ]);

        // Seed data untuk tabel 'customers'
        DB::table('customers')->insert([
            [
                'nama_pelanggan' => 'Satria Adi Wijaya',
                'alamat_pelanggan' => 'Perumahan Permata Balaraja No 13',
                'package_id' => 1, // Merujuk ke paket 'Paket 10MB'
            ],
            [
                'nama_pelanggan' => 'Arthur Morgan',
                'alamat_pelanggan' => 'Desa Saga RT 03 RW 01',
                'package_id' => 2, // Merujuk ke paket 'Paket 15MB'
            ],
            [
                'nama_pelanggan' => 'Kepin Ginanjar',
                'alamat_pelanggan' => 'Perumahan Villa Balaraja No 07',
                'package_id' => 3, // Merujuk ke paket 'Paket 20MB'
            ],
        ]);
    }
}
