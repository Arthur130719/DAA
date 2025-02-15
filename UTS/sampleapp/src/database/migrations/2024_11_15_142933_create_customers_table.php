<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel 'packages' untuk menyimpan informasi paket berlangganan
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket', 50);
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });

        // Tabel 'customers' untuk menyimpan informasi pelanggan
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan', 100);
            $table->string('alamat_pelanggan', 255)->nullable();
            $table->foreignId('package_id')->constrained('packages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
        Schema::dropIfExists('packages');
    }
};
