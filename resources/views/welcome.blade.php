<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Amikom Event Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen">

    {{-- ===== NAVBAR ===== --}}
    <nav class="bg-white border-b border-slate-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-black text-sm">AH</div>
                    <span class="text-lg font-black text-slate-800">AmikomEventHub</span>
                </div>
                <div class="flex flex-wrap gap-2">
                    <a href="/" class="px-4 py-2 bg-indigo-600 text-white text-sm font-bold rounded-lg">Home</a>
                    <a href="/tentang" class="px-4 py-2 bg-white text-slate-600 text-sm font-semibold rounded-lg border border-slate-200 hover:bg-slate-50 transition">Tentang</a>
                    <a href="/profil" class="px-4 py-2 bg-white text-slate-600 text-sm font-semibold rounded-lg border border-slate-200 hover:bg-slate-50 transition">Profil</a>
                    <a href="/katalog" class="px-4 py-2 bg-white text-slate-600 text-sm font-semibold rounded-lg border border-slate-200 hover:bg-slate-50 transition">Katalog</a>
                    <a href="/bantuan" class="px-4 py-2 bg-white text-slate-600 text-sm font-semibold rounded-lg border border-slate-200 hover:bg-slate-50 transition">Bantuan</a>
                    <a href="/kontak" class="px-4 py-2 bg-white text-slate-600 text-sm font-semibold rounded-lg border border-slate-200 hover:bg-slate-50 transition">Kontak</a>
                    <a href="/admin" class="px-4 py-2 bg-slate-800 text-white text-sm font-bold rounded-lg hover:bg-slate-700 transition">Admin</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- ===== HERO SECTION ===== --}}
    <section class="bg-gradient-to-br from-indigo-600 via-indigo-700 to-indigo-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block bg-white/20 backdrop-blur-sm text-white text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-6">
                🎓 Platform Event Terpercaya AMIKOM
            </span>
            <h1 class="text-4xl md:text-6xl font-black leading-tight mb-6">
                Selamat Datang di <br>
                <span class="text-indigo-200">Amikom Event Hub</span>
            </h1>
            <p class="text-indigo-100 text-lg max-w-xl mx-auto mb-3">
                Platform informasi dan pendaftaran event mahasiswa terpadu.
            </p>
            <p class="text-indigo-200 text-sm mb-10">
                Dikembangkan oleh: <strong class="text-white">{{ $nama }}</strong> &nbsp;|&nbsp; NIM: <strong class="text-white">{{ $nim }}</strong>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}" class="bg-white text-indigo-700 font-bold px-8 py-4 rounded-xl hover:bg-indigo-50 transition shadow-lg">
                    🎟️ Lihat Semua Event
                </a>
                <a href="/admin" class="border-2 border-white/40 text-white font-bold px-8 py-4 rounded-xl hover:bg-white/10 transition">
                    ⚙️ Panel Admin
                </a>
            </div>
        </div>
    </section>

    {{-- ===== SECTION: KATEGORI (Soal 4) ===== --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-black text-slate-900">Kategori Event</h2>
            <p class="text-slate-500 mt-2">Temukan event sesuai minat dan kebutuhanmu.</p>
        </div>

        @if($categories->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($categories as $category)
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5 text-center hover:shadow-md hover:-translate-y-0.5 transition duration-300">
                        <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                            <span class="text-2xl">📁</span>
                        </div>
                        <p class="font-black text-slate-800 text-sm leading-tight">{{ $category->name }}</p>
                        <p class="text-xs text-indigo-500 font-bold mt-1">{{ $category->events_count }} Event</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 text-slate-400">
                <p class="text-lg font-medium">Belum ada kategori yang tersedia.</p>
            </div>
        @endif
    </section>

    {{-- ===== SECTION: PARTNER (Soal 4) ===== --}}
    <section class="bg-white border-t border-b border-slate-100 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-slate-900">Partner Kami</h2>
                <p class="text-slate-500 mt-2">Didukung oleh mitra-mitra terpercaya yang mendukung ekosistem event mahasiswa.</p>
            </div>

            @if($partners->count() > 0)
                {{-- Grid Partner (Soal 4 - @foreach blade) --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    @foreach($partners as $partner)
                        <div class="group bg-white rounded-2xl border border-slate-100 shadow-sm p-5 flex flex-col items-center justify-center text-center hover:shadow-lg hover:border-indigo-100 hover:-translate-y-1 transition duration-300">
                            {{-- Logo Partner --}}
                            <div class="w-20 h-16 flex items-center justify-center mb-3">
                                @if($partner->logo_url)
                                    <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}"
                                         class="max-w-full max-h-full object-contain"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="hidden w-16 h-16 bg-indigo-50 rounded-xl items-center justify-center">
                                        <span class="text-2xl font-black text-indigo-300">{{ strtoupper(substr($partner->name, 0, 1)) }}</span>
                                    </div>
                                @else
                                    <div class="w-16 h-16 bg-indigo-50 rounded-xl flex items-center justify-center">
                                        <span class="text-2xl font-black text-indigo-400">{{ strtoupper(substr($partner->name, 0, 1)) }}</span>
                                    </div>
                                @endif
                            </div>
                            {{-- Nama Partner --}}
                            <p class="font-black text-slate-800 text-sm group-hover:text-indigo-600 transition">{{ $partner->name }}</p>
                            {{-- Website link --}}
                            @if($partner->website)
                                <a href="{{ $partner->website }}" target="_blank"
                                   class="text-xs text-indigo-400 hover:text-indigo-600 mt-1 transition font-medium">
                                    Kunjungi ↗
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <p class="text-slate-500 font-medium">Belum ada partner yang terdaftar.</p>
                    <p class="text-slate-400 text-sm mt-1">Tambahkan partner melalui <a href="/admin/partners" class="text-indigo-500 hover:underline font-semibold">Panel Admin</a>.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- ===== FOOTER ===== --}}
    <footer class="bg-slate-900 text-slate-400 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-black text-xs">AH</div>
                <span class="text-white font-black text-lg">AmikomEventHub</span>
            </div>
            <p class="text-sm">Dikembangkan oleh <strong class="text-white">{{ $nama }}</strong> &nbsp;|&nbsp; NIM: <strong class="text-white">{{ $nim }}</strong></p>
            <p class="text-xs mt-2">© {{ date('Y') }} Universitas AMIKOM Yogyakarta. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>