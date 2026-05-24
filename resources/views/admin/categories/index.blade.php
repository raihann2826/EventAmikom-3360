@extends('layouts.admin')

@section('title', 'Kelola Kategori - Admin')
@section('page_title', 'Kelola Kategori')
@section('page_subtitle', 'Atur kategori untuk mengklasifikasikan event dengan rapi.')

@section('content')

@if ($errors->any())
    <div class="bg-rose-100 border border-rose-200 text-rose-700 p-4 rounded-2xl mb-6 font-bold text-sm shadow-sm flex flex-col gap-1">
        <div class="flex items-center gap-2 text-rose-800 font-extrabold text-base">
            <span>⚠️</span> Terdapat beberapa kesalahan pengisian:
        </div>
        <ul class="list-disc pl-6 mt-1 font-medium">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-4 text-right">
    <button onclick="openAddModal()" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition flex items-center gap-2 inline-flex">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Kategori
    </button>
</div>

{{-- Table --}}
<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">

    {{-- Search Bar --}}
    <form action="{{ route('admin.categories.index') }}" method="GET" class="px-8 py-6 bg-slate-50/50 border-b flex gap-4 w-full">
        <div class="relative flex-1">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama kategori..."
                   class="w-full pl-12 pr-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
            <svg class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 active:scale-95 transition text-sm">Cari</button>
        @if($search)
            <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl font-bold transition text-sm flex items-center justify-center">Reset</a>
        @endif
    </form>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4 w-16">No</th>
                    <th class="px-8 py-4">Nama Kategori</th>
                    <th class="px-8 py-4">Slug</th>
                    <th class="px-8 py-4">Jumlah Event</th>
                    <th class="px-8 py-4">Dibuat Pada</th>
                    <th class="px-8 py-4">Diperbarui Pada</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @forelse($categories as $category)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-6 font-bold text-slate-400">
                        {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center text-lg">📁</span>
                            <p class="font-black text-slate-800">{{ $category->name }}</p>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <span class="font-mono text-sm bg-slate-100 px-3 py-1 rounded-lg text-slate-600">{{ $category->slug }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <span class="font-bold text-slate-700">{{ $category->events_count }} Event</span>
                    </td>
                    <td class="px-8 py-6">
                        <span class="text-slate-500 text-sm font-medium">{{ $category->created_at ? $category->created_at->format('d M Y H:i') : '-' }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <span class="text-slate-500 text-sm font-medium">{{ $category->updated_at ? $category->updated_at->format('d M Y H:i') : '-' }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex gap-2">
                            {{-- Tombol Edit --}}
                            <button onclick="openEditModal('{{ $category->id }}', '{{ addslashes($category->name) }}')" class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Semua event dengan kategori ini juga akan ikut terhapus secara permanen!');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-8 py-10 text-center text-slate-500 font-medium">
                        Tidak ada kategori ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($categories->hasPages())
    <div class="px-8 py-6 bg-slate-50/50 border-t">
        {{ $categories->appends(['search' => $search])->links() }}
    </div>
    @endif
</div>

{{-- Modal Tambah Kategori --}}
<div id="addModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50 backdrop-blur-sm transition-all duration-300">
    <div class="bg-white rounded-[2rem] p-8 max-w-md w-full mx-4 shadow-2xl border border-slate-100 transform transition-all">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-black text-slate-800">Tambah Kategori</h2>
            <button onclick="closeAddModal()" class="text-slate-400 hover:text-slate-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Nama Kategori</label>
                <input type="text" id="name" name="name" required placeholder="Contoh: Seminar IT"
                       class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeAddModal()" class="px-5 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl font-bold transition text-sm">Batal</button>
                <button type="submit" class="px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold transition text-sm shadow-md shadow-indigo-100">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit Kategori --}}
<div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50 backdrop-blur-sm transition-all duration-300">
    <div class="bg-white rounded-[2rem] p-8 max-w-md w-full mx-4 shadow-2xl border border-slate-100 transform transition-all">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-black text-slate-800">Edit Kategori</h2>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="editNameInput" class="block text-sm font-bold text-slate-700 mb-2">Nama Kategori</label>
                <input type="text" id="editNameInput" name="name" required placeholder="Contoh: Seminar IT"
                       class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeEditModal()" class="px-5 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl font-bold transition text-sm">Batal</button>
                <button type="submit" class="px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold transition text-sm shadow-md shadow-indigo-100">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        const modal = document.getElementById('addModal');
        modal.classList.remove('hidden');
    }

    function closeAddModal() {
        const modal = document.getElementById('addModal');
        modal.classList.add('hidden');
    }

    function openEditModal(id, name) {
        const modal = document.getElementById('editModal');
        const form = document.getElementById('editForm');
        const nameInput = document.getElementById('editNameInput');
        
        form.action = "{{ url('admin/categories') }}/" + id;
        nameInput.value = name;
        
        modal.classList.remove('hidden');
    }

    function closeEditModal() {
        const modal = document.getElementById('editModal');
        modal.classList.add('hidden');
    }

    // Close modals when clicking outside
    window.onclick = function(event) {
        const addModal = document.getElementById('addModal');
        const editModal = document.getElementById('editModal');
        if (event.target == addModal) {
            closeAddModal();
        }
        if (event.target == editModal) {
            closeEditModal();
        }
    }
</script>

@endsection