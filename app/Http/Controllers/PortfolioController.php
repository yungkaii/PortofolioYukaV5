<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Menampilkan halaman utama portofolio.
     */
    public function index()
    {
        $projects = $this->getProjects();

        $categories = [
            ['key' => 'all', 'label' => 'Semua'],
            ['key' => 'webapp', 'label' => 'Web App & Dashboard'],
            ['key' => 'ai-tools', 'label' => 'AI & Tools'],
            ['key' => 'website', 'label' => 'Website & Editorial'],
            ['key' => 'game', 'label' => 'Browser Games'],
        ];

        $categoryCounts = ['all' => count($projects)];
        foreach ($projects as $project) {
            $key = $project['category'];
            $categoryCounts[$key] = ($categoryCounts[$key] ?? 0) + 1;
        }

        $backendStack = [
            ['name' => 'Laravel', 'role' => 'Framework Utama'],
            ['name' => 'PHP', 'role' => 'Server-Side'],
            ['name' => 'MySQL', 'role' => 'Relational DB'],
            ['name' => 'Node.js', 'role' => 'Runtime & API'],
            ['name' => 'Supabase', 'role' => 'Auth & Postgres'],
            ['name' => 'Firebase', 'role' => 'Cloud Services'],
        ];

        $frontendStack = [
            ['name' => 'TypeScript', 'level' => 'Primary'],
            ['name' => 'React & Next.js', 'level' => 'Primary'],
            ['name' => 'Tailwind CSS', 'level' => 'Primary'],
            ['name' => 'TanStack & Vite', 'level' => 'Tooling'],
        ];

        $journey = [
            [
                'period' => '2023 – 2024',
                'title' => 'Fondasi Web & Logika',
                'detail' => 'Mempelajari struktur HTML semantik, CSS responsif, dan dasar pemrograman JavaScript.',
                'status' => 'completed',
                'status_label' => 'Selesai',
            ],
            [
                'period' => 'Saat Ini',
                'title' => 'Fullstack Modern Web',
                'detail' => 'Membangun aplikasi nyata dengan PHP, Laravel, MySQL, TypeScript, React, dan Supabase.',
                'status' => 'active',
                'status_label' => 'Aktif',
            ],
            [
                'period' => 'Target Berikutnya',
                'title' => 'Arsitektur & Keamanan',
                'detail' => 'Memperdalam arsitektur sistem terukur, performa frontend, dan praktik keamanan aplikasi web.',
                'status' => 'upcoming',
                'status_label' => 'Berikutnya',
            ],
        ];

        return view('pages.home', [
            'projects' => $projects,
            'categories' => $categories,
            'categoryCounts' => $categoryCounts,
            'backendStack' => $backendStack,
            'frontendStack' => $frontendStack,
            'journey' => $journey,
        ]);
    }

    /**
     * Menangani pengiriman form kontak (mendukung AJAX JSON & POST standar).
     */
    public function kirimPesan(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|min:2|max:120',
            'email' => 'required|email|max:180',
            'pesan' => 'required|string|min:10|max:2000',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama minimal 2 karakter.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'pesan.required' => 'Pesan tidak boleh kosong.',
            'pesan.min' => 'Tulis pesan minimal 10 karakter agar konteksnya jelas.',
        ]);

        // TODO: Sambungkan ke Mail/Notification atau simpan ke tabel pesan bila diperlukan.
        $senderName = e($validated['nama']);
        $successMessage = "Terima kasih, {$senderName}. Pesan Anda sudah diterima dan akan saya balas secepatnya.";

        if ($request->expectsJson()) {
            return response()->json([
                'ok' => true,
                'message' => $successMessage,
            ]);
        }

        return back()->with('success', $successMessage);
    }

    /**
     * Menangani download CV.
     */
    public function downloadCv()
    {
        $filePath = public_path('files/cv-anda.pdf');

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return back()->with('error', 'File CV belum tersedia.');
    }

    /**
     * Daftar lengkap seluruh proyek portofolio Yukafii.
     */
    private function getProjects(): array
    {
        return [
            [
                'number' => '01',
                'slug' => 'smp-bina-karya-kreatif',
                'title' => 'SMP Bina Karya Kreatif',
                'type' => 'Website Sekolah',
                'category' => 'website',
                'featured' => true,
                'summary' => 'Website resmi SMP Bina Karya Kreatif yang dirancang modern, informatif, dan mudah diakses.',
                'image' => 'images/smp-bina-karya.jpg',
                'alt' => 'Tampilan halaman utama website resmi SMP Bina Karya Kreatif',
                'url' => 'https://smpbinakaryakreatif.my.id',
                'cta' => 'Buka Website',
                'is_github' => false,
                'stack' => ['PHP', 'MySQL', 'JavaScript'],
            ],
            [
                'number' => '02',
                'slug' => 'temanruang-ai',
                'title' => 'TemanRuang AI',
                'type' => 'AI Web Application',
                'category' => 'ai-tools',
                'featured' => true,
                'summary' => 'Ruang curhat berbasis AI yang bisa mendengarkan tanpa menghakimi, memberi saran praktis, atau membantu mengurai masalah. Pilih gaya respons yang kamu butuhkan dan lanjutkan percakapan dengan nyaman.',
                'image' => 'images/TemanRuangAI.png',
                'alt' => 'Antarmuka percakapan TemanRuang AI',
                'url' => 'https://temanruang-ai.vercel.app',
                'cta' => 'Coba Aplikasi',
                'is_github' => false,
                'stack' => ['TypeScript', 'Tailwind CSS', 'API'],
            ],
            [
                'number' => '03',
                'slug' => 'story-of-human',
                'title' => 'Story of Human',
                'type' => 'Museum Website',
                'category' => 'website',
                'featured' => true,
                'summary' => 'The Story of Humanity — museum digital interaktif yang membawa pengunjung menjelajahi perjalanan peradaban manusia, dari zaman prasejarah hingga era modern, melalui animasi sinematik dan pengalaman imersif.',
                'image' => 'images/storyofhuman.jpg',
                'alt' => 'Halaman museum digital interaktif Story of Human',
                'url' => 'https://story-of-human.vercel.app',
                'cta' => 'Jelajahi Museum',
                'is_github' => false,
                'stack' => ['HTML', 'CSS', 'JavaScript'],
            ],
            [
                'number' => '04',
                'slug' => 'gymtrack',
                'title' => 'GymTrack',
                'type' => 'Fitness Dashboard',
                'category' => 'webapp',
                'featured' => true,
                'summary' => 'Dashboard fitness untuk melacak workout, kalori, streak, volume latihan, dan personal records.',
                'image' => 'images/gymtrack-dashboard.jpg',
                'alt' => 'Dashboard pelacakan latihan GymTrack',
                'url' => 'https://gymtrack-yuka.vercel.app',
                'cta' => 'Buka Dashboard',
                'is_github' => false,
                'stack' => ['TypeScript', 'Supabase', 'Tailwind CSS'],
            ],
            [
                'number' => '05',
                'slug' => 'bantu-jelasin',
                'title' => 'Bantu Jelasin',
                'type' => 'Text Simplifier',
                'category' => 'ai-tools',
                'featured' => false,
                'summary' => 'Bantu memahami surat, tagihan, atau hasil pemeriksaan yang sulit dibaca. Tempelkan teks untuk mendapatkan penjelasan dalam bahasa sehari-hari, lalu pilih gaya penjelasan yang sesuai—dari sangat sederhana hingga lebih terperinci.',
                'image' => 'images/bantujelasin.png',
                'alt' => 'Bantu Jelasin — alat untuk menyederhanakan teks rumit',
                'url' => 'https://bantu-jelasin.vercel.app/',
                'cta' => 'Buka Aplikasi',
                'is_github' => false,
                'stack' => ['TypeScript', 'Tailwind CSS', 'TanStack'],
            ],
            [
                'number' => '06',
                'slug' => 'aerolog-a320',
                'title' => 'AeroLog A320 (Airbus)',
                'type' => 'Aviation Project',
                'category' => 'webapp',
                'featured' => false,
                'summary' => 'Aplikasi log perawatan dan troubleshooting Airbus A320 untuk penggunaan personal. Catat riwayat maintenance, defect dan telemetry, serta dokumentasikan bukti foto; seluruh data disimpan terenkripsi di browser lokal.',
                'image' => 'images/airbus.jpg',
                'alt' => 'Dashboard log perawatan pesawat Airbus A320',
                'url' => 'https://aerolog-a320.vercel.app/',
                'cta' => 'Buka Aplikasi',
                'is_github' => false,
                'stack' => ['TypeScript', 'Tailwind CSS', 'Next.js'],
            ],
            [
                'number' => '07',
                'slug' => 'library-flow',
                'title' => 'Library Flow',
                'type' => 'Sistem Informasi',
                'category' => 'webapp',
                'featured' => false,
                'summary' => 'Sistem informasi perpustakaan untuk mengelola katalog, anggota, peminjaman, reservasi, denda, laporan, dan notifikasi.',
                'image' => 'images/library-flow.jpg',
                'alt' => 'Sistem informasi perpustakaan Library Flow',
                'url' => 'https://library-flow.vercel.app',
                'cta' => 'Buka Sistem',
                'is_github' => false,
                'stack' => ['TypeScript', 'Supabase', 'Tailwind CSS'],
            ],
            [
                'number' => '08',
                'slug' => 'pocketwise',
                'title' => 'PocketWise',
                'type' => 'Personal Finance',
                'category' => 'webapp',
                'featured' => false,
                'summary' => 'Aplikasi manajemen keuangan untuk memantau pengeluaran, mengatur anggaran, dan mencapai tujuan finansial dengan lebih bijak.',
                'image' => 'images/pocketwise.jpg',
                'alt' => 'Aplikasi manajemen keuangan pribadi PocketWise',
                'url' => 'https://pocket-wise-six.vercel.app/',
                'cta' => 'Buka Aplikasi',
                'is_github' => false,
                'stack' => ['TypeScript', 'Supabase', 'Node.js'],
            ],
            [
                'number' => '09',
                'slug' => 'routineup',
                'title' => 'RoutineUp',
                'type' => 'Productivity App',
                'category' => 'webapp',
                'featured' => false,
                'summary' => 'Aplikasi untuk membantu membangun rutinitas, memantau kebiasaan, dan menjaga konsistensi aktivitas harian.',
                'image' => 'images/routineup.jpg',
                'alt' => 'Aplikasi pelacak kebiasaan harian RoutineUp',
                'url' => 'https://routine-up-yuka.vercel.app/',
                'cta' => 'Buka Aplikasi',
                'is_github' => false,
                'stack' => ['TypeScript', 'Node.js', 'TanStack'],
            ],
            [
                'number' => '10',
                'slug' => 'kasirkita',
                'title' => 'KasirKita',
                'type' => 'Point of Sale',
                'category' => 'webapp',
                'featured' => false,
                'summary' => 'Website kasir untuk membantu pemilik toko mengelola produk, stok, transaksi, dan penjualan harian dalam satu dashboard.',
                'image' => 'images/kasirkita.jpg',
                'alt' => 'Dashboard Point of Sale KasirKita',
                'url' => 'https://github.com/yungkaii/KasirKita/tree/main',
                'cta' => 'Lihat di GitHub',
                'is_github' => true,
                'stack' => ['TypeScript', 'React', 'Tailwind CSS'],
            ],
            [
                'number' => '11',
                'slug' => 'sleeptrack',
                'title' => 'SleepTrack',
                'type' => 'Sleep Tracker',
                'category' => 'webapp',
                'featured' => false,
                'summary' => 'Aplikasi untuk mencatat durasi tidur, energi harian, streak, dan ringkasan kesehatan tidur dalam dashboard yang sederhana.',
                'image' => 'images/sleeptrack.jpg',
                'alt' => 'Dashboard pencatatan tidur SleepTrack',
                'url' => 'https://sleeptracker-yuka.vercel.app',
                'cta' => 'Buka Aplikasi',
                'is_github' => false,
                'stack' => ['JavaScript', 'Dashboard', 'Vercel'],
            ],
            [
                'number' => '12',
                'slug' => '0713-game',
                'title' => '0713 Game',
                'type' => 'Browser Game',
                'category' => 'game',
                'featured' => false,
                'summary' => 'Game browser bernuansa gelap dengan tampilan retro dan misi yang dibangun di sekitar satu batas waktu: jangan sampai jam menunjukkan 07:14. Dilengkapi menu permainan serta pengaturan kontrol.',
                'image' => 'images/0713-game.png',
                'alt' => 'Tampilan game browser retro 0713 Game',
                'url' => 'https://0713-game.vercel.app',
                'cta' => 'Mainkan',
                'is_github' => false,
                'stack' => ['HTML', 'CSS', 'JavaScript'],
            ],
            [
                'number' => '13',
                'slug' => 'hanggame',
                'title' => 'HangGame',
                'type' => 'Word Game',
                'category' => 'game',
                'featured' => false,
                'summary' => 'Game tebak kata interaktif dengan sistem kesempatan, hint, streak, skor, dan kategori untuk membuat permainan semakin menantang.',
                'image' => 'images/HangGame.jpg',
                'alt' => 'Game tebak kata interaktif HangGame',
                'url' => 'https://hang-game-yuka.vercel.app/',
                'cta' => 'Mainkan',
                'is_github' => false,
                'stack' => ['JavaScript', 'HTML/CSS', 'Vercel'],
            ],
            [
                'number' => '14',
                'slug' => 'ular-jawa',
                'title' => 'Ular Jawa',
                'type' => 'Browser Game',
                'category' => 'game',
                'featured' => false,
                'summary' => 'Game ular klasik dengan sentuhan lokal yang ringan, seru, dan dapat dimainkan langsung melalui browser.',
                'image' => 'images/ularjawa.jpg',
                'alt' => 'Game browser Ular Jawa',
                'url' => 'https://yungkaii.github.io/ular-khas-jawav2/',
                'cta' => 'Mainkan',
                'is_github' => false,
                'stack' => ['JavaScript', 'HTML/CSS', 'GitHub Pages'],
            ],
            [
                'number' => '15',
                'slug' => 'adoptme-pet-manager',
                'title' => 'AdoptMe Pet Manager',
                'type' => 'Personal Tool',
                'category' => 'ai-tools',
                'featured' => false,
                'summary' => 'Pet Profit Tracker yang dibuat untuk personal use. Project ini tidak dipublikasikan sebagai aplikasi publik, tetapi source code-nya tersedia di GitHub sebagai dokumentasi dan referensi pengembangan.',
                'image' => 'images/adoptme.jpg',
                'alt' => 'Aplikasi catatan profit AdoptMe Pet Manager',
                'url' => 'https://github.com/yungkaii/pet-profit-tracker',
                'cta' => 'Lihat di GitHub',
                'is_github' => true,
                'stack' => ['TypeScript', 'Supabase', 'Node.js'],
            ],
            [
                'number' => '16',
                'slug' => 'oldportofolio',
                'title' => 'OldPortofolio',
                'type' => 'Portfolio Website',
                'category' => 'website',
                'featured' => false,
                'summary' => 'Portofolio versi sebelumnya yang menampilkan perjalanan, karya, dan eksplorasi awal dalam membangun pengalaman web personal.',
                'image' => 'images/oldportofolio.jpg',
                'alt' => 'Arsip tampilan portofolio versi sebelumnya',
                'url' => 'https://yungkaii.github.io/portofolio-yukav3/',
                'cta' => 'Buka Arsip',
                'is_github' => false,
                'stack' => ['HTML', 'CSS', 'JavaScript'],
            ],
        ];
    }
}
