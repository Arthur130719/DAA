<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data paket yang akan disisipkan ke tabel packages
        $packages = [
            ['nama_paket' => 'Paket 10MB', 'harga' => 165000],
            ['nama_paket' => 'Paket 15MB', 'harga' => 200000],
            ['nama_paket' => 'Paket 20MB', 'harga' => 315000],
        ];

        // Menyisipkan data ke tabel packages
        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
