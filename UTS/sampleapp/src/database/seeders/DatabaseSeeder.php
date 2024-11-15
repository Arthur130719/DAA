<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed users
        $this->seedUsers();

        // Seed packages and customers
        $this->seedPackages();
        $this->seedCustomers();

        // Call additional seeders
        $this->callSeeders();
    }

    private function seedUsers(): void
    {
        if (! User::where('email', 'admin@admin.com')->exists()) {
            $users = User::factory()->createmany([
                [
                    'name' => 'Admin',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('password'),
                ],
                [
                    'name' => 'Keuangan',
                    'email' => 'kua@admin.com',
                    'password' => bcrypt('password'),
                ],
                [
                    'name' => 'Teknisi',
                    'email' => 'tks@admin.com',
                    'password' => bcrypt('password'),
                ],
            ]);

            foreach ($users as $user) {
                if ($user->email == 'admin@admin.com') {
                    $user->assignRole('super_admin');
                }
            }
        }
    }

    private function seedPackages(): void
    {
        // Seed data for packages
        Package::insert([
            ['nama_paket' => 'Paket 10MB', 'harga' => 165000],
            ['nama_paket' => 'Paket 15MB', 'harga' => 200000],
            ['nama_paket' => 'Paket 20MB', 'harga' => 315000],
        ]);
    }

    private function seedCustomers(): void
    {
        // Seed data for customers
        Customer::insert([
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

    private function callSeeders(): void
    {
        $this->call([
            PackageSeeder::class,
            RoleSeeder::class,
            ClassroomSeeder::class,
        ]);
    }
}
