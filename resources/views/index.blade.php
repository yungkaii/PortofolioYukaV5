<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio | Tema Laut</title>
    <!-- Gunakan CDN untuk testing cepat. Untuk produksi, gunakan @vite('resources/css/app.css') -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* Animasi Mengapung (Floating) seperti di air */
        .floating { 
            animation: float 6s ease-in-out infinite; 
        }
        .floating-delay { 
            animation: float 6s ease-in-out 3s infinite; 
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        /* Efek Kaca (Glassmorphism) ala air laut */
        .glass-ocean {
            background: rgba(8, 145, 178, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(34, 211, 238, 0.2);
        }

        /* Kustomisasi Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #0891b2; border-radius: 4px; }
    </style>
</head>
<body class="bg-slate-900 text-slate-200 font-sans antialiased overflow-x-hidden selection:bg-cyan-500 selection:text-white">

    <!-- Background Animasi Ombak Abstrak (Blob) -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-cyan-600 rounded-full mix-blend-multiply filter blur-[128px] opacity-30 floating"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[30rem] h-[30rem] bg-blue-600 rounded-full mix-blend-multiply filter blur-[128px] opacity-30 floating-delay"></div>
    </div>

    <!-- Navbar -->
    <nav class="fixed w-full z-50 glass-ocean border-b-0 transition-all duration-300">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">
                LautanKarya.
            </a>
            <div class="hidden md:flex space-x-8 text-sm font-medium">
                <a href="#beranda" class="hover:text-cyan-400 transition-colors">Beranda</a>
                <a href="#proyek" class="hover:text-cyan-400 transition-colors">Proyek</a>
                <a href="#kontak" class="hover:text-cyan-400 transition-colors">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="min-h-screen flex items-center justify-center pt-20 px-6">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <p class="text-cyan-400 font-medium tracking-wide">Halo, Selamat Datang di Dunia Saya</p>
                <h1 class="text-5xl md:text-7xl font-bold leading-tight text-white">
                    Menyelami <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">Kode & Desain</span>
                </h1>
                <p class="text-slate-400 text-lg leading-relaxed max-w-lg">
                    Saya seorang Web Developer yang senang membangun website interaktif, responsif, dan sedalam lautan imajinasi.
                </p>
                <div class="pt-4 flex gap-4">
                    <a href="#proyek" class="px-8 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold rounded-full hover:shadow-[0_0_20px_rgba(8,145,178,0.5)] transition-all transform hover:-translate-y-1">
                        Lihat Proyek
                    </a>
                    <a href="#kontak" class="px-8 py-3 glass-ocean text-cyan-300 font-semibold rounded-full hover:bg-cyan-900/30 transition-all transform hover:-translate-y-1">
                        Hubungi Saya
                    </a>
                </div>
            </div>
            
            <!-- Avatar/Gambar Interaktif -->
            <div class="relative flex justify-center floating">
                <div class="w-72 h-72 md:w-96 md:h-96 rounded-full p-2 bg-gradient-to-tr from-cyan-500 to-blue-600">
                    <div class="w-full h-full rounded-full bg-slate-800 overflow-hidden border-4 border-slate-900 flex items-center justify-center">
                        <!-- Ganti URL ini dengan foto Anda di folder public/images/ -->
                        <img src="https://ui-avatars.com/api/?name=Web+Dev&background=0D8ABC&color=fff&size=512" alt="Foto Profil" class="w-full h-full object-cover hover:scale-110 transition-transform duration-700">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Proyek Section -->
    <section id="proyek" class="py-24 px-6 relative">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-white">
                Karya <span class="text-cyan-400">Terbaru</span>
            </h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Kartu Proyek 1 -->
                <div class="glass-ocean rounded-2xl overflow-hidden group hover:-translate-y-2 transition-all duration-300 hover:shadow-[0_10px_30px_rgba(8,145,178,0.2)]">
                    <div class="h-48 bg-slate-800 overflow-hidden relative">
                        <div class="absolute inset-0 bg-blue-900/50 group-hover:bg-transparent transition-all z-10"></div>
                        <img src="https://images.unsplash.com/photo-1510915228340-29c85a43dcfe?auto=format&fit=crop&w=800&q=80" alt="Proyek 1" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">Sistem Informasi Akademik</h3>
                        <p class="text-slate-400 text-sm mb-4">Website manajemen sekolah interaktif menggunakan PHP, Laravel, dan Tailwind CSS.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="text-xs font-medium text-cyan-300 bg-cyan-900/50 px-3 py-1 rounded-full">Laravel</span>
                            <span class="text-xs font-medium text-blue-300 bg-blue-900/50 px-3 py-1 rounded-full">Tailwind</span>
                        </div>
                    </div>
                </div>

                <!-- Kartu Proyek 2 -->
                <div class="glass-ocean rounded-2xl overflow-hidden group hover:-translate-y-2 transition-all duration-300 hover:shadow-[0_10px_30px_rgba(8,145,178,0.2)]">
                    <div class="h-48 bg-slate-800 overflow-hidden relative">
                        <div class="absolute inset-0 bg-blue-900/50 group-hover:bg-transparent transition-all z-10"></div>
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" alt="Proyek 2" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">Company Profile Web</h3>
                        <p class="text-slate-400 text-sm mb-4">Desain web responsif dan elegan dengan animasi halus untuk perusahaan startup.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="text-xs font-medium text-cyan-300 bg-cyan-900/50 px-3 py-1 rounded-full">PHP</span>
                            <span class="text-xs font-medium text-blue-300 bg-blue-900/50 px-3 py-1 rounded-full">JavaScript</span>
                        </div>
                    </div>
                </div>
                
                <!-- Kartu Proyek 3 -->
                <div class="glass-ocean rounded-2xl overflow-hidden group hover:-translate-y-2 transition-all duration-300 hover:shadow-[0_10px_30px_rgba(8,145,178,0.2)]">
                    <div class="h-48 bg-slate-800 flex items-center justify-center">
                        <span class="text-slate-500 font-medium">Proyek Mendatang...</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">Sedang Diselami</h3>
                        <pMembuat portofolio bertema laut dengan Laravel adalah ide yang sangat menarik. Untuk mendapatkan kesan **modern, simpel, interaktif, responsif, dan tidak monoton**, kita akan mengombinasikan **Laravel (Blade)** dengan **Tailwind CSS** (untuk styling responsif yang cepat) dan sedikit **Custom CSS** (untuk animasi ombak dan efek mengambang).

Berikut adalah panduan lengkap beserta struktur folder dan kodenya.

### 📁 Struktur Folder & File
Dalam project Laravel kamu, kita tidak perlu mengubah semuanya. Fokus saja pada pembuatan/modifikasi file-file berikut:

```text
laravel-portofolio/
├── app/
│   └── Http/Controllers/
│       └── PortfolioController.php  <-- (File Baru: Mengatur logika halaman)
├── public/
│   ├── css/
│   │   └── style.css                <-- (File Baru: Animasi laut agar tidak monoton)
│   └── images/                      <-- (Folder: Taruh foto profil/proyek di sini)
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php        <-- (File Baru: Template utama / pembungkus web)
│   │   └── pages/
│   │       └── home.blade.php       <-- (File Baru: Konten utama portofolio)
├── routes/
│   └── web.php                      <-- (File Modifikasi: Menghubungkan URL)