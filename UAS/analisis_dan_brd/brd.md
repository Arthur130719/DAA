## Business Requirement Document (BRD) - GrowU

# Latar Belakang
GrowU adalah aplikasi sederhana yang dirancang untuk membantu individu dalam pengembangan diri melalui pembelajaran dan pencapaian tujuan. Aplikasi ini menawarkan berbagai kursus serta fitur untuk menetapkan dan melacak tujuan. Sistem poin diterapkan untuk memberikan insentif kepada pengguna agar tetap termotivasi dalam belajar dan berkembang.

# Tujuan
Tujuan utama dari GrowU adalah memfasilitasi pengguna dalam:
* Mempelajari berbagai keterampilan melalui kursus yang tersedia.
* Menetapkan dan melacak tujuan pengembangan diri secara mandiri.
* Meningkatkan motivasi pengguna melalui sistem penghargaan berbasis poin.

# Ruang Lingkup
GrowU berfokus pada fitur-fitur utama seperti kursus pembelajaran, pencatatan tujuan, pelacakan pencapaian, dan sistem penghargaan berbasis poin. Aplikasi ini hanya berjalan dalam lingkungan berbasis teks tanpa menyimpan data secara permanen.

# Fitur Utama
GrowU memiliki beberapa fitur utama yang mendukung pengembangan diri pengguna:
* Melihat daftar kursus: Pengguna dapat mengakses daftar kursus yang tersedia dan memilih salah satu untuk dipelajari. Setelah menyelesaikan kursus, mereka mendapatkan 10 poin.
* Menambahkan tujuan pengembangan diri: Pengguna dapat mencatat tujuan pribadi mereka, seperti membaca buku atau meningkatkan keterampilan tertentu.
* Melihat dan melacak tujuan: Pengguna dapat meninjau daftar tujuan mereka dan menandai tujuan yang telah selesai. Penyelesaian tujuan akan memberikan tambahan 5 poin.
* Melihat poin dan penghargaan: Sistem menampilkan jumlah total poin pengguna. Jika pengguna mencapai 50 poin, mereka akan mendapatkan penghargaan berupa sertifikat digital.
* Navigasi menu: Sistem berbasis teks memungkinkan pengguna memilih fitur yang diinginkan dengan memasukkan angka yang sesuai.

# Pemangku Kepentingan
Aplikasi GrowU melibatkan beberapa pemangku kepentingan:
* Pengguna akhir, yaitu individu yang ingin mengembangkan keterampilan mereka dengan menggunakan aplikasi ini.
* Pengembang, yang bertanggung jawab untuk membangun dan memelihara aplikasi agar tetap berfungsi dengan baik.
* Manajemen produk, yang menentukan fitur dan roadmap aplikasi untuk memastikan bahwa GrowU memberikan nilai tambah bagi pengguna.

# Persyaratan Fungsional
GrowU memiliki beberapa persyaratan fungsional yang harus dipenuhi agar aplikasi dapat berjalan dengan optimal:
* Sistem harus menampilkan menu utama yang berisi daftar pilihan yang tersedia.
* Sistem harus menampilkan daftar kursus yang tersedia dan memungkinkan pengguna untuk memilih kursus serta mendapatkan poin setelah menyelesaikannya.
* Sistem harus memungkinkan pengguna untuk menambahkan tujuan baru dalam daftar mereka.
* Sistem harus memungkinkan pengguna melihat daftar tujuan mereka dan menandai tujuan yang telah selesai, yang akan memberikan tambahan poin.
* Sistem harus menampilkan jumlah total poin yang telah dikumpulkan oleh pengguna dan memberikan penghargaan jika mencapai jumlah tertentu.

# Persyaratan Non-Fungsional
Beberapa aspek teknis juga perlu diperhatikan agar GrowU dapat memberikan pengalaman pengguna yang baik:
* Aplikasi harus memiliki antarmuka berbasis teks yang sederhana dan mudah digunakan.
* Respons aplikasi harus cepat dan tidak mengalami keterlambatan saat berpindah antar menu.
* Aplikasi harus dapat berjalan pada lingkungan Python tanpa memerlukan database eksternal atau penyimpanan tambahan.

# Risiko dan Mitigasi
Beberapa risiko yang mungkin terjadi dalam pengembangan GrowU beserta solusinya adalah:
* Data pengguna tidak tersimpan setelah aplikasi ditutup, yang dapat diatasi dengan menambahkan fitur penyimpanan menggunakan file atau database.
* Pengguna salah memasukkan input, yang dapat dicegah dengan menerapkan validasi input agar aplikasi tidak mengalami error.
* Kurangnya fitur personalisasi, yang dapat diperbaiki dengan mengimplementasikan sistem login agar pengguna dapat menyimpan dan mengakses progres mereka di lain waktu.