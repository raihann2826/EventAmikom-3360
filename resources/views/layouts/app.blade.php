<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventSpace 3360 - Temukan Event Seru!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Navigation -->
    <nav
        class="bg-white sticky top-0 z-50 w-full border-b border-gray-200 shadow-sm flex justify-between items-center px-6 py-4">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-purple-600 rounded-md flex items-center justify-center text-white font-bold text-xl">
                ES</div>
            <span class="text-2xl font-bold tracking-tight text-purple-900">EventSpace 3360</span>
        </div>
        <div class="hidden md:flex gap-8 font-medium">
            <a href="/" class="text-purple-700 font-semibold border-b-2 border-purple-600 pb-1">Beranda</a>
            <a href="/katalog" class="hover:text-purple-600 transition">Katalog Event</a>
            <a href="/bantuan" class="hover:text-purple-600 transition">Bantuan</a>
        </div>
    </nav>

    <!-- Hero Section -->
    @yield('content')
    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-16 px-6 mt-16 border-t-4 border-purple-600">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="space-y-4 col-span-2">
                <div class="flex items-center gap-2">
                    <div
                        class="w-10 h-10 bg-purple-500 rounded-md flex items-center justify-center text-white font-bold text-xl">
                        ES</div>
                    <span class="text-2xl font-bold text-white">EventSpace 3360</span>
                </div>
                <p class="max-w-sm text-gray-400">Platform manajemen dan reservasi tiket event modern. Cepat, aman, dan mudah digunakan.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4 uppercase tracking-wider text-sm text-purple-400">Tautan Penting</h4>
                <ul class="space-y-3">
                    <li><a href="/" class="hover:text-purple-400 transition">Halaman Utama</a></li>
                    <li><a href="/katalog" class="hover:text-purple-400 transition">Jelajahi Event</a></li>
                    <li><a href="/bantuan" class="hover:text-purple-400 transition">Panduan Pengguna</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4 uppercase tracking-wider text-sm text-purple-400">Dukungan</h4>
                <ul class="space-y-3 text-sm">
                    <li>support@eventspace3360.com</li>
                    <li>+62 800 1234 5678</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-8 mt-12 border-t border-gray-800 text-center text-gray-500 text-sm">
            &copy; 2026 EventSpace 3360. Built by muh.raihan (24.12.3360).
        </div>
    </footer>

</body>

</html>
