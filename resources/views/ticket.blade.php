<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket - EventSpace 3360</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Outfit', sans-serif; }</style>
</head>

<body class="bg-purple-600 text-white min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full">
        <!-- Success Banner -->
        <div class="text-center mb-8">
            <div
                class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-black">Pembayaran Berhasil!</h1>
            <p class="text-purple-100 mt-2">Tiket Anda telah terbit dan siap digunakan.</p>
        </div>

        <!-- Ticket Card -->
        <div class="bg-white text-gray-900 rounded-xl overflow-hidden shadow-2xl relative border border-purple-500">
            <!-- Ticket Header -->
            <div class="p-8 bg-purple-50 border-b-4 border-dashed border-purple-100 text-center relative">
                <p class="text-purple-600 font-bold uppercase tracking-widest text-xs mb-2">E-Ticket Resmi</p>
                <h2 class="text-2xl font-black leading-tight text-gray-800">Jazz Night 2024: A Celebration</h2>

                <!-- Ticket Side Cuts -->
                <div class="absolute -left-4 -bottom-4 w-8 h-8 bg-purple-600 rounded-full"></div>
                <div class="absolute -right-4 -bottom-4 w-8 h-8 bg-purple-600 rounded-full"></div>
            </div>

            <!-- Ticket Body -->
            <div class="p-8 space-y-8">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-400 text-xs font-bold uppercase mb-1">Nama Pembeli</p>
                        <p class="font-bold text-lg text-gray-800">Donni Prabowo</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs font-bold uppercase mb-1">Tanggal & Waktu</p>
                        <p class="font-bold text-lg text-gray-800">16 Nov, 19:30</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs font-bold uppercase mb-1">Order ID</p>
                        <p class="font-bold text-gray-800">TRX-99210</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs font-bold uppercase mb-1">Lokasi</p>
                        <p class="font-bold text-gray-800">Blue Note Lounge</p>
                    </div>
                </div>

                <div class="bg-gray-50 border border-gray-100 p-6 rounded-lg flex flex-col items-center shadow-inner">
                    <p class="text-gray-400 text-xs font-bold uppercase mb-4">Scan QR untuk Check-in</p>
                    <!-- Mock QR Code -->
                    <div class="w-48 h-48 bg-white p-4 rounded-lg shadow-sm border border-gray-200 flex items-center justify-center">
                        <div class="w-full h-full border-4 border-gray-900 flex flex-wrap p-1">
                            <!-- Just some boxes for mock QR -->
                            <div class="w-1/4 h-1/4 bg-gray-900"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-gray-900"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-gray-900"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-gray-900"></div>
                            <div class="w-1/4 h-1/4 bg-gray-900"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-gray-900"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-gray-900"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-gray-900"></div>
                        </div>
                    </div>
                    <p class="mt-4 font-mono font-bold text-gray-800 tracking-wider">TKT-001293848</p>
                </div>
            </div>

            <div class="px-8 pb-8">
                <button onclick="window.print()"
                    class="w-full py-4 bg-purple-600 text-white rounded-lg font-bold shadow-md hover:bg-purple-700 transition active:scale-95">
                    Cetak / Simpan PDF
                </button>
                <a href="/"
                    class="block text-center mt-4 text-gray-500 font-bold hover:text-purple-600 transition">Kembali ke Beranda</a>
            </div>
        </div>
    </div>

</body>

</html>
