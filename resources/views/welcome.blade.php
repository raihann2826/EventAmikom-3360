@extends('layouts.app')
@section('content')
<section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">
        <div class="flex-1 space-y-8">
            <span
                class="inline-block px-4 py-1.5 bg-purple-100 text-purple-700 rounded-md text-sm font-bold uppercase tracking-wider">#1
                Event Platform</span>
            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight text-gray-900">
                Jelajahi & Pesan <span class="text-purple-600">Tiket Event</span> Spesialmu.
            </h1>
            <p class="text-lg text-gray-500 max-w-lg leading-relaxed">
                Dari seminar teknologi hingga pameran seni, temukan pengalaman berhargamu di EventSpace. Reservasi tiket dijamin cepat dan aman.
            </p>
            <div class="flex gap-4">
                <a href="#events"
                    class="px-8 py-4 bg-purple-600 text-white rounded-lg font-bold text-lg shadow-lg hover:-translate-y-1 hover:shadow-purple-200 transition-all">
                    Jelajahi Sekarang
                </a>
                <a href="#"
                    class="px-8 py-4 border-2 border-gray-200 rounded-lg font-bold text-lg hover:border-purple-600 hover:text-purple-600 transition">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
        <div class="flex-1 relative">
            <div
                class="absolute -top-10 -left-10 w-64 h-64 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
            </div>
            <div
                class="absolute -bottom-10 -right-10 w-64 h-64 bg-fuchsia-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
            </div>
            <img src="assets/concert.png" alt="Concert"
                class="rounded-xl shadow-2xl relative z-10 w-full object-cover aspect-[4/5] object-center border-4 border-white">

            <div class="absolute -bottom-6 -left-6 bg-white/90 backdrop-blur-md p-6 rounded-lg shadow-xl z-20 border border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-bold uppercase">Terverifikasi</p>
                        <p class="font-bold text-gray-800">Transaksi Aman & Cepat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Grid -->
    <section id="events" class="max-w-7xl mx-auto px-6 py-20">
        <div class="flex justify-between items-end mb-12 border-b border-gray-200 pb-4">
            <div>
                <h2 class="text-3xl font-extrabold mb-2 text-gray-800">Daftar Event</h2>
                <p class="text-gray-500 font-medium">Temukan event menarik yang akan segera berlangsung.</p>
            </div>
            <div class="flex gap-2">
                <button class="px-4 py-2 bg-gray-100 text-gray-700 font-semibold rounded-md hover:bg-gray-200 transition">Semua Kategori</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($events as $event)
            <div
                class="group bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="relative overflow-hidden aspect-[3/4]">
                    <img src="{{ ($event->poster_path && Storage::disk('public')->exists($event->poster_path))
                     ? asset('storage/' . $event->poster_path)
                     : 'https://placehold.co/600x800' }}" alt="{{ $event->title }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div
                        class="absolute top-4 left-4 px-3 py-1 bg-gray-900/80 backdrop-blur-sm rounded text-xs font-bold uppercase text-white shadow">
                        {{ $event->category->name ?? 'Event' }}</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-gray-800 group-hover:text-purple-600 transition">{{ $event->title }}</h3>
                    <div class="flex items-center gap-2 text-gray-500 text-sm mb-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ $event->date->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                        <span class="text-2xl font-black text-purple-600">
                            {{ $event->price == 0 ? 'Gratis' : 'Rp ' . number_format($event->price, 0, ',', '.') }}
                        </span>
                        <a href="{{ route('events.show', $event->id) }}"
                            class="px-5 py-2 bg-purple-50 text-purple-700 rounded-lg font-semibold hover:bg-purple-600 hover:text-white transition">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                <p class="text-gray-500 font-medium">Belum ada event yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>
    </section>
@endsection
