<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - EventSpace 3360</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Outfit', sans-serif; }</style>
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-800">

    <div class="max-w-5xl mx-auto p-6">
        <nav class="bg-white p-4 mb-8 rounded-lg shadow-sm border border-gray-200 flex flex-wrap justify-center gap-3">
            <a href="/" class="px-5 py-2 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 transition font-medium">Home</a>
            <a href="/profil" class="px-5 py-2 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 transition font-medium">Profil</a>
            <a href="/katalog" class="px-5 py-2 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 transition font-medium">Katalog</a>
            <a href="/bantuan" class="px-5 py-2 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 transition font-medium">Bantuan</a>
            <a href="/contact" class="px-5 py-2 bg-purple-600 text-white rounded-md shadow-sm font-semibold">Kontak</a>
        </nav>

        <h1 class="text-3xl font-bold text-center text-purple-800 mb-8">Hubungi Kami</h1>

        <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <div>
                    <h2 class="text-2xl font-bold mb-4 text-gray-800 border-b border-gray-100 pb-2">Informasi Kontak</h2>
                    <p class="text-gray-500 mb-6">
                        Jika Anda memiliki pertanyaan seputar event, pendaftaran, atau kerja sama, jangan ragu untuk menghubungi tim EventSpace 3360.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-md flex items-center justify-center text-purple-600 font-bold shrink-0">@</div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Email</h4>
                                <p class="text-gray-500 text-sm">support@eventspace3360.com</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-md flex items-center justify-center text-purple-600 font-bold shrink-0">WA</div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Telepon / WhatsApp</h4>
                                <p class="text-gray-500 text-sm">+62 800-1234-5678</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-md flex items-center justify-center text-purple-600 font-bold shrink-0">Loc</div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Alamat</h4>
                                <p class="text-gray-500 text-sm">Jl. Ring Road Utara, Condongcatur, Yogyakarta</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <form action="#" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition" placeholder="Masukkan nama Anda">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition" placeholder="nama@email.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                            <textarea rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition" placeholder="Tulis pertanyaan atau pesan Anda di sini..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-purple-600 text-white py-2.5 rounded-md hover:bg-purple-700 transition font-semibold shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
