<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 🔹 Admin
        User::firstOrCreate(
            ['email' => 'admin@amikom.ac.id'],
            [
                'name' => 'Admin Amikom',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // 🔹 3 Kategori
        $tech = Category::firstOrCreate(
            ['slug' => 'technology'],
            ['name' => 'Technology']
        );

        $sport = Category::firstOrCreate(
            ['slug' => 'sport'],
            ['name' => 'Sport']
        );

        $music = Category::firstOrCreate(
            ['slug' => 'music'],
            ['name' => 'Music']
        );

        // 🔹 6 Event Variatif

        Event::create([
            'category_id' => $tech->id,
            'title' => 'UI/UX Masterclass',
            'description' => 'Belajar desain UI/UX modern dari dasar hingga mahir.',
            'date' => '2026-05-10 10:00:00',
            'location' => 'Amikom Hall',
            'price' => 75000,
            'stock' => 100,
            'poster_path' => 'posters/uiux.png',
        ]);

        Event::create([
            'category_id' => $tech->id,
            'title' => 'AI Bootcamp 2026',
            'description' => 'Pelatihan dasar hingga advanced artificial intelligence.',
            'date' => '2026-05-15 09:00:00',
            'location' => 'Lab Informatika',
            'price' => 100000,
            'stock' => 80,
            'poster_path' => 'posters/ai.png',
        ]);

        Event::create([
            'category_id' => $sport->id,
            'title' => 'E-Sport U-Champ',
            'description' => 'Turnamen Mobile Legends tingkat universitas.',
            'date' => '2026-06-01 13:00:00',
            'location' => 'Gor Amikom',
            'price' => 50000,
            'stock' => 200,
            'poster_path' => 'posters/esport.png',
        ]);

        Event::create([
            'category_id' => $sport->id,
            'title' => 'Futsal Championship',
            'description' => 'Kompetisi futsal antar fakultas.',
            'date' => '2026-06-10 08:00:00',
            'location' => 'Lapangan Amikom',
            'price' => 60000,
            'stock' => 120,
            'poster_path' => 'posters/futsal.png',
        ]);

        Event::create([
            'category_id' => $music->id,
            'title' => 'Jazz Night Live',
            'description' => 'Konser musik jazz malam penuh suasana.',
            'date' => '2026-05-20 19:00:00',
            'location' => 'Amikom Stage',
            'price' => 50000,
            'stock' => 150,
            'poster_path' => 'posters/jazz.png',
        ]);

        Event::create([
            'category_id' => $music->id,
            'title' => 'Band Festival Amikom',
            'description' => 'Festival band mahasiswa se-Amikom.',
            'date' => '2026-05-25 15:00:00',
            'location' => 'Outdoor Stage',
            'price' => 40000,
            'stock' => 300,
            'poster_path' => 'posters/band.png',
        ]);
    }
}