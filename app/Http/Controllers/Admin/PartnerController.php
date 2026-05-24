<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Menampilkan daftar partner dengan pencarian (LIKE).
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $partners = Partner::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('phone', 'LIKE', '%' . $search . '%');
        })
        ->latest()
        ->paginate(10);

        return view('admin.partners.index', compact('partners', 'search'));
    }

    /**
     * Menyimpan partner baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'logo_url'  => 'nullable|url|max:500',
            'website'   => 'nullable|url|max:255',
            'email'     => 'nullable|email|max:255',
            'phone'     => 'nullable|string|max:20',
        ], [
            'name.required'     => 'Nama partner wajib diisi.',
            'logo_url.url'      => 'Logo URL harus berupa URL yang valid (contoh: https://...).',
            'website.url'       => 'Website harus berupa URL yang valid.',
            'email.email'       => 'Email harus berupa alamat email yang valid.',
        ]);

        Partner::create($request->only(['name', 'logo_url', 'website', 'email', 'phone']));

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil ditambahkan!');
    }

    /**
     * Memperbarui data partner di database.
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'logo_url'  => 'nullable|url|max:500',
            'website'   => 'nullable|url|max:255',
            'email'     => 'nullable|email|max:255',
            'phone'     => 'nullable|string|max:20',
        ], [
            'name.required'     => 'Nama partner wajib diisi.',
            'logo_url.url'      => 'Logo URL harus berupa URL yang valid (contoh: https://...).',
            'website.url'       => 'Website harus berupa URL yang valid.',
            'email.email'       => 'Email harus berupa alamat email yang valid.',
        ]);

        $partner->update($request->only(['name', 'logo_url', 'website', 'email', 'phone']));

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil diperbarui!');
    }

    /**
     * Menghapus partner dari database.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil dihapus!');
    }
}
