@extends('layouts.admin')

@section('title', 'Kelola Partner - Admin')
@section('page_title', 'Kelola Partner')
@section('page_subtitle', 'Atur partner atau sponsor yang mendukung event-event Anda.')

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
    <button onclick="openAddModal()" class="inline-flex px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Partner
    </button>
</div>

{{-- Table --}}
<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">

    {{-- Search Bar (Soal 3) --}}
    <form action="{{ route('admin.partners.index') }}" method="GET" class="px-8 py-6 bg-slate-50/50 border-b flex gap-4 w-full">
        <div class="relative flex-1">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama, email, atau telepon partner..."
                   class="w-full pl-12 pr-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
            <svg class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 active:scale-95 transition text-sm">Cari</button>
        @if($search)
            <a href="{{ route('admin.partners.index') }}" class="px-6 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl font-bold transition text-sm flex items-center justify-center">Reset</a>
        @endif
    </form>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4 w-16">No</th>
                    <th class="px-8 py-4">Logo</th>
                    <th class="px-8 py-4">Nama Partner</th>
                    <th class="px-8 py-4">Email</th>
                    <th class="px-8 py-4">Telepon</th>
                    <th class="px-8 py-4">Website</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @forelse($partners as $partner)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-6 font-bold text-slate-400">
                        {{ ($partners->currentPage() - 1) * $partners->perPage() + $loop->iteration }}
                    </td>
                    <td class="px-8 py-6">
                        <div class="w-14 h-14 rounded-xl bg-slate-100 border flex items-center justify-center overflow-hidden">
                            @if($partner->logo_url)
                                <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" class="object-contain w-full h-full p-1"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <span class="hidden text-[10px] font-bold text-slate-400 text-center leading-tight p-1">NO LOGO</span>
                            @else
                                <span class="text-[10px] font-bold text-slate-400 text-center leading-tight">NO LOGO</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <p class="font-black text-slate-800">{{ $partner->name }}</p>
                    </td>
                    <td class="px-8 py-6">
                        <span class="text-slate-600 font-medium text-sm">{{ $partner->email ?? '-' }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <span class="text-slate-600 font-medium text-sm">{{ $partner->phone ?? '-' }}</span>
                    </td>
                    <td class="px-8 py-6">
                        @if($partner->website)
                            <a href="{{ $partner->website }}" target="_blank" class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-800 font-bold text-sm transition">
                                <span>Kunjungi</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                        @else
                            <span class="text-slate-400 text-sm">-</span>
                        @endif
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex gap-2">
                            {{-- Tombol Edit --}}
                            <button onclick="openEditModal('{{ $partner->id }}', '{{ addslashes($partner->name) }}', '{{ $partner->logo_url }}', '{{ $partner->email }}', '{{ $partner->phone }}', '{{ $partner->website }}')"
                                    class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus partner ini?');" class="inline">
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
                    <td colspan="7" class="px-8 py-16 text-center">
                        <div class="flex flex-col items-center gap-3 text-slate-400">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <p class="font-bold text-base">Belum ada partner yang ditambahkan.</p>
                            <p class="text-sm">Klik tombol "Tambah Partner" untuk menambahkan partner baru.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($partners->hasPages())
    <div class="px-8 py-6 bg-slate-50/50 border-t">
        {{ $partners->appends(['search' => $search])->links() }}
    </div>
    @endif
</div>

{{-- ===== MODAL TAMBAH PARTNER ===== --}}
<div id="addModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50 backdrop-blur-sm">
    <div class="bg-white rounded-[2rem] p-8 max-w-lg w-full mx-4 shadow-2xl border border-slate-100 overflow-y-auto max-h-[90vh]">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-black text-slate-800">Tambah Partner Baru</h2>
            <button onclick="closeAddModal()" class="text-slate-400 hover:text-slate-600 transition p-1 rounded-lg hover:bg-slate-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form action="{{ route('admin.partners.store') }}" method="POST">
            @csrf
            <div class="space-y-4 mb-6">
                <div>
                    <label for="add_name" class="block text-sm font-bold text-slate-700 mb-1.5">Nama Partner <span class="text-rose-500">*</span></label>
                    <input type="text" id="add_name" name="name" required placeholder="Contoh: Google, Tokopedia, AMIKOM"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
                </div>
                <div>
                    <label for="add_logo_url" class="block text-sm font-bold text-slate-700 mb-1.5">URL Logo</label>
                    <input type="url" id="add_logo_url" name="logo_url" placeholder="https://example.com/logo.png"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm"
                           oninput="previewLogo(this.value, 'add_logo_preview')">
                    <div id="add_logo_preview" class="mt-2 hidden">
                        <img src="" alt="Preview logo" class="h-12 object-contain rounded-lg border border-slate-200 p-1">
                    </div>
                    <p class="text-xs text-slate-400 mt-1">Masukkan URL gambar logo partner (contoh: https://upload.wikimedia.org/...)</p>
                </div>
                <div>
                    <label for="add_email" class="block text-sm font-bold text-slate-700 mb-1.5">Email Kontak</label>
                    <input type="email" id="add_email" name="email" placeholder="partner@example.com"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
                </div>
                <div>
                    <label for="add_phone" class="block text-sm font-bold text-slate-700 mb-1.5">Nomor Telepon</label>
                    <input type="text" id="add_phone" name="phone" placeholder="08123456789"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
                </div>
                <div>
                    <label for="add_website" class="block text-sm font-bold text-slate-700 mb-1.5">URL Website</label>
                    <input type="url" id="add_website" name="website" placeholder="https://example.com"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
                </div>
            </div>
            <div class="flex justify-end gap-3 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeAddModal()" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold transition text-sm">Batal</button>
                <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold transition text-sm">Simpan Partner</button>
            </div>
        </form>
    </div>
</div>

{{-- ===== MODAL EDIT PARTNER ===== --}}
<div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50 backdrop-blur-sm">
    <div class="bg-white rounded-[2rem] p-8 max-w-lg w-full mx-4 shadow-2xl border border-slate-100 overflow-y-auto max-h-[90vh]">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-black text-slate-800">Edit Partner</h2>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600 transition p-1 rounded-lg hover:bg-slate-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4 mb-6">
                <div>
                    <label for="edit_name" class="block text-sm font-bold text-slate-700 mb-1.5">Nama Partner <span class="text-rose-500">*</span></label>
                    <input type="text" id="edit_name" name="name" required placeholder="Nama partner"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
                </div>
                <div>
                    <label for="edit_logo_url" class="block text-sm font-bold text-slate-700 mb-1.5">URL Logo</label>
                    <input type="url" id="edit_logo_url" name="logo_url" placeholder="https://example.com/logo.png"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm"
                           oninput="previewLogo(this.value, 'edit_logo_preview')">
                    <div id="edit_logo_preview" class="mt-2 hidden">
                        <img src="" alt="Preview logo" class="h-12 object-contain rounded-lg border border-slate-200 p-1">
                    </div>
                </div>
                <div>
                    <label for="edit_email" class="block text-sm font-bold text-slate-700 mb-1.5">Email Kontak</label>
                    <input type="email" id="edit_email" name="email" placeholder="partner@example.com"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
                </div>
                <div>
                    <label for="edit_phone" class="block text-sm font-bold text-slate-700 mb-1.5">Nomor Telepon</label>
                    <input type="text" id="edit_phone" name="phone" placeholder="08123456789"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
                </div>
                <div>
                    <label for="edit_website" class="block text-sm font-bold text-slate-700 mb-1.5">URL Website</label>
                    <input type="url" id="edit_website" name="website" placeholder="https://example.com"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
                </div>
            </div>
            <div class="flex justify-end gap-3 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeEditModal()" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold transition text-sm">Batal</button>
                <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold transition text-sm">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
    }
    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
    }

    function openEditModal(id, name, logoUrl, email, phone, website) {
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_logo_url').value = logoUrl || '';
        document.getElementById('edit_email').value = email || '';
        document.getElementById('edit_phone').value = phone || '';
        document.getElementById('edit_website').value = website || '';
        document.getElementById('editForm').action = "{{ url('admin/partners') }}/" + id;

        // Show logo preview if URL exists
        if (logoUrl) {
            previewLogo(logoUrl, 'edit_logo_preview');
        } else {
            document.getElementById('edit_logo_preview').classList.add('hidden');
        }

        document.getElementById('editModal').classList.remove('hidden');
    }
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function previewLogo(url, previewId) {
        const container = document.getElementById(previewId);
        const img = container.querySelector('img');
        if (url) {
            img.src = url;
            container.classList.remove('hidden');
        } else {
            container.classList.add('hidden');
        }
    }

    // Close modal when clicking backdrop
    ['addModal', 'editModal'].forEach(id => {
        document.getElementById(id).addEventListener('click', function(e) {
            if (e.target === this) this.classList.add('hidden');
        });
    });
</script>

@endsection
