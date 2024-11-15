1. Migration (Database Schema)
Migration berfungsi untuk mendefinisikan struktur tabel di dalam database. Berikut adalah penjelasan untuk masing-masing bagian dari migration yang telah Anda buat:

customers Table Migration
php
Copy code
Schema::create('customers', function (Blueprint $table) {
    $table->id();
    $table->string('nama_pelanggan');
    $table->string('alamat_pelanggan');
    $table->unsignedBigInteger('package_id');
    $table->timestamps();

    $table->foreign('package_id')->references('id')->on('packages');
});
$table->id(): Membuat kolom id yang akan menjadi primary key dengan auto-increment untuk setiap pelanggan.
$table->string('nama_pelanggan'): Menyimpan nama pelanggan yang akan terhubung dengan layanan WiFi.
$table->string('alamat_pelanggan'): Menyimpan alamat lengkap pelanggan.
$table->unsignedBigInteger('package_id'): Kolom ini akan menyimpan ID paket yang dipilih oleh pelanggan. Ini adalah foreign key yang merujuk ke kolom id pada tabel packages.
$table->timestamps(): Menyimpan informasi waktu kapan data pelanggan dibuat dan diperbarui.
$table->foreign('package_id')->references('id')->on('packages'): Menambahkan relasi antara kolom package_id di customers dan kolom id di packages, yang memastikan integritas data antara paket dan pelanggan.
packages Table Migration
php
Copy code
Schema::create('packages', function (Blueprint $table) {
    $table->id();
    $table->string('nama_paket');
    $table->integer('harga');
    $table->timestamps();
});
$table->id(): Membuat kolom id untuk menjadi primary key untuk tabel packages yang diisi otomatis oleh database.
$table->string('nama_paket'): Menyimpan nama paket WiFi (misalnya "Paket 10MB").
$table->integer('harga'): Menyimpan harga dari masing-masing paket dalam bentuk angka.
$table->timestamps(): Menyimpan informasi waktu kapan paket ditambahkan atau diperbarui.

2. Model Customer
php
Copy code
class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'alamat_pelanggan',
        'package_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
protected $fillable: Menentukan kolom mana yang dapat diisi secara massal. Kolom-kolom ini adalah nama_pelanggan, alamat_pelanggan, dan package_id. Hal ini digunakan untuk menghindari masalah mass assignment vulnerability.
public function package(): Fungsi ini mendefinisikan relasi antara Customer dan Package. Setiap pelanggan memiliki satu paket yang dapat diambil dengan memanggil package() pada objek Customer. Relasi ini adalah belongsTo yang berarti pelanggan "memiliki" paket, yang merujuk pada paket yang dipilih.

3. Model Package
php
Copy code
class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'harga',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
protected $fillable: Menentukan kolom yang dapat diisi secara massal dalam tabel packages. Kolom ini adalah nama_paket dan harga.
public function customers(): Fungsi ini mendefinisikan relasi hasMany antara Package dan Customer, yang berarti satu paket bisa memiliki banyak pelanggan. Fungsi ini memungkinkan Anda untuk mengambil semua pelanggan yang memilih paket tertentu.

4. Seeder PackageSeeder
php
Copy code
class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            ['nama_paket' => 'Paket 10MB', 'harga' => 165000],
            ['nama_paket' => 'Paket 15MB', 'harga' => 200000],
            ['nama_paket' => 'Paket 20MB', 'harga' => 315000],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
$packages: Array ini berisi data paket yang akan disisipkan ke dalam tabel packages. Setiap elemen dalam array mewakili satu paket dengan nama dan harga.
Package::create($package): Menyisipkan data setiap paket ke dalam tabel packages menggunakan metode create. Ini akan menambahkan paket baru ke database.

5. Seeder CustomerSeeder
php
Copy code
class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        // Menambahkan data pelanggan secara manual
        Customer::create([
            'nama_pelanggan' => 'Satria Adi Wijaya',
            'alamat_pelanggan' => 'Perum Permata Balaraja No 13',
            'package_id' => 1,  // Menggunakan id paket 1 (Paket 10MB)
        ]);
    }
}
Customer::create(): Menyisipkan data pelanggan ke dalam tabel customers. Data yang disisipkan mencakup nama pelanggan, alamat, dan ID paket yang mereka pilih. Dalam contoh ini, pelanggan menggunakan Paket 10MB yang memiliki ID 1.

6. Database Seeder
php
Copy code
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PackageSeeder::class,
            CustomerSeeder::class,
        ]);
    }
}
$this->call(): Fungsi ini digunakan untuk memanggil seeder lain yang telah dibuat, yaitu PackageSeeder dan CustomerSeeder. Ini memungkinkan Anda untuk menjalankan seeder untuk menambahkan data ke dalam database. Saat Anda menjalankan php artisan db:seed, ini akan mengisi tabel packages dan customers dengan data yang sudah Anda tentukan.

7. Relasi Data dan Penggunaan
Relasi antara tabel customers dan packages sangat berguna dalam skenario bisnis untuk melacak pelanggan yang berlangganan paket tertentu. Dengan relasi belongsTo dan hasMany, Anda dapat dengan mudah:

Melihat paket apa yang dipilih oleh pelanggan.
Melihat semua pelanggan yang memilih paket tertentu.
Fungsi Utama dari Setiap Kode di BRD:
Migrasi Database: Mengatur struktur tabel untuk menyimpan data pelanggan dan paket WiFi dengan relasi yang tepat.
Model Customer: Mendefinisikan entitas pelanggan dan relasinya dengan paket.
Model Package: Mendefinisikan entitas paket WiFi dan relasinya dengan pelanggan.
Seeder: Memasukkan data awal ke dalam tabel untuk pengujian dan penggunaan awal aplikasi.
Relasi Antar Tabel: Menjaga integritas data dan memberikan cara yang mudah untuk mengambil data terkait antara pelanggan dan paket WiFi.