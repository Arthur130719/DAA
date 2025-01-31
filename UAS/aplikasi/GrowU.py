class GrowU:
    def __init__(self):
        self.courses = {
            1: "Belajar Pemrograman Python",
            2: "Manajemen Waktu Efektif",
            3: "Komunikasi Interpersonal",
            4: "Belajar Dasar Desain Grafis",
        }
        self.goals = []
        self.points = 0

    def display_menu(self):
        print("\n--- Selamat Datang di GrowU ---")
        print("1. Lihat Daftar Kursus")
        print("2. Tambahkan Tujuan Pengembangan Diri")
        print("3. Lihat dan Lacak Tujuan")
        print("4. Lihat Poin dan Penghargaan")
        print("5. Keluar")

    def display_courses(self):
        print("\n--- Daftar Kursus ---")
        for course_id, course_name in self.courses.items():
            print(f"{course_id}. {course_name}")
        print("\nAnda mendapatkan 10 poin setiap kali menyelesaikan kursus!")
        course_id = int(input("Pilih ID kursus untuk memulai (atau 0 untuk kembali): "))
        if course_id in self.courses:
            print(f"\nAnda memulai kursus: {self.courses[course_id]}")
            self.points += 10
            print("Selamat! Anda mendapatkan 10 poin.")
        elif course_id == 0:
            return
        else:
            print("ID kursus tidak valid.")

    def add_goal(self):
        print("\n--- Tambahkan Tujuan Pengembangan Diri ---")
        goal = input("Masukkan tujuan Anda (contoh: Membaca 1 buku/minggu): ")
        self.goals.append({"goal": goal, "status": "Belum Selesai"})
        print("Tujuan berhasil ditambahkan!")

    def view_goals(self):
        print("\n--- Daftar Tujuan Anda ---")
        if not self.goals:
            print("Anda belum memiliki tujuan. Tambahkan sekarang!")
            return
        for idx, goal in enumerate(self.goals, start=1):
            print(f"{idx}. {goal['goal']} - {goal['status']}")
        print("\nPilih tujuan yang telah selesai:")
        goal_id = int(input("Masukkan nomor tujuan (atau 0 untuk kembali): "))
        if 1 <= goal_id <= len(self.goals):
            self.goals[goal_id - 1]["status"] = "Selesai"
            self.points += 5
            print("Selamat! Anda menyelesaikan tujuan dan mendapatkan 5 poin.")
        elif goal_id == 0:
            return
        else:
            print("Nomor tujuan tidak valid.")

    def view_points(self):
        print(f"\n--- Poin Anda ---\nTotal Poin: {self.points}")
        if self.points >= 50:
            print("Penghargaan: Anda mendapatkan Sertifikat Digital GrowU!")
        else:
            print("Kumpulkan lebih banyak poin untuk mendapatkan penghargaan!")

    def run(self):
        while True:
            self.display_menu()
            choice = input("Pilih menu: ")
            if choice == "1":
                self.display_courses()
            elif choice == "2":
                self.add_goal()
            elif choice == "3":
                self.view_goals()
            elif choice == "4":
                self.view_points()
            elif choice == "5":
                print("Terima kasih telah menggunakan GrowU. Tetap semangat belajar dan berkembang!")
                break
            else:
                print("Pilihan tidak valid. Silakan coba lagi.")

# Jalankan aplikasi
if __name__ == "__main__":
    app = GrowU()
    app.run()