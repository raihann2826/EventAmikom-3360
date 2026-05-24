<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'logo'      => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'website'   => 'nullable|url|max:255',
            'email'     => 'nullable|email|max:255',
            'phone'     => 'nullable|string|max:20',
        ], [
            'name.required'     => 'Nama partner wajib diisi.',
            'logo.image'        => 'Logo harus berupa gambar.',
            'logo.mimes'        => 'Format logo harus berupa jpg, jpeg, png, webp, atau svg.',
            'website.url'       => 'Website harus berupa URL yang valid.',
            'email.email'       => 'Email harus berupa alamat email yang valid.',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo_url'] = $request->file('logo')->store('partners', 'public');
        }

        Partner::create($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil ditambahkan!');
    }

    /**
     * Memperbarui data partner di database.
     */
    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'logo'      => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'website'   => 'nullable|url|max:255',
            'email'     => 'nullable|email|max:255',
            'phone'     => 'nullable|string|max:20',
        ], [
            'name.required'     => 'Nama partner wajib diisi.',
            'logo.image'        => 'Logo harus berupa gambar.',
            'logo.mimes'        => 'Format logo harus berupa jpg, jpeg, png, webp, atau svg.',
            'website.url'       => 'Website harus berupa URL yang valid.',
            'email.email'       => 'Email harus berupa alamat email yang valid.',
        ]);

        if ($request->hasFile('logo')) {
            if ($partner->logo_url && Storage::disk('public')->exists($partner->logo_url)) {
                Storage::disk('public')->delete($partner->logo_url);
            }
            $data['logo_url'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil diperbarui!');
    }

    /**
     * Menghapus partner dari database.
     */
    public function destroy(Partner $partner)
    {
        if ($partner->logo_url && Storage::disk('public')->exists($partner->logo_url)) {
            Storage::disk('public')->delete($partner->logo_url);
        }
        
        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil dihapus!');
    }
}
