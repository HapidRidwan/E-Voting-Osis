<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Menampilkan daftar kandidat
     */
    public function index()
    {
        $candidates = Candidate::latest()->get();

        return view('admin.candidates.index', compact('candidates'));
    }

    /**
     * Form tambah kandidat
     */
    public function create()
    {
        if (Candidate::count() >= 3) {
            return redirect()
                ->route('candidates.index')
                ->with('error', 'Maksimal hanya 3 kandidat.');
        }

        return view('admin.candidates.create');
    }

    /**
     * Simpan kandidat
     */
    public function store(Request $request)
    {
        if (Candidate::count() >= 3) {
            return redirect()
                ->route('candidates.index')
                ->with('error', 'Maksimal hanya 3 kandidat.');
        }

        $request->validate([
            'nomor_urut' => 'required|unique:candidates,nomor_urut',
            'ketua'      => 'required|max:100',
            'wakil'      => 'required|max:100',
            'foto_ketua' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_wakil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'visi'       => 'required',
            'misi'       => 'required',
        ]);

        $fotoKetua = null;
        $fotoWakil = null;

        if ($request->hasFile('foto_ketua')) {
            $fotoKetua = $request->file('foto_ketua')
                ->store('candidates', 'public');
        }

        if ($request->hasFile('foto_wakil')) {
            $fotoWakil = $request->file('foto_wakil')
                ->store('candidates', 'public');
        }

        Candidate::create([
            'nomor_urut' => $request->nomor_urut,
            'ketua'      => $request->ketua,
            'wakil'      => $request->wakil,
            'foto_ketua' => $fotoKetua,
            'foto_wakil' => $fotoWakil,
            'visi'       => $request->visi,
            'misi'       => $request->misi,
        ]);

        return redirect()
            ->route('candidates.index')
            ->with('success', 'Kandidat berhasil ditambahkan.');
    }

    /**
     * Detail kandidat
     */
    public function show(Candidate $candidate)
    {
        return view('admin.candidates.show', compact('candidate'));
    }

    /**
     * Form edit kandidat
     */
    public function edit(Candidate $candidate)
    {
        return view('admin.candidates.edit', compact('candidate'));
    }

    /**
     * Update kandidat
     */
    public function update(Request $request, Candidate $candidate)
    {
        $request->validate([
            'nomor_urut' => 'required|unique:candidates,nomor_urut,' . $candidate->id,
            'ketua'      => 'required|max:100',
            'wakil'      => 'required|max:100',
            'foto_ketua' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_wakil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'visi'       => 'required',
            'misi'       => 'required',
        ]);

        if ($request->hasFile('foto_ketua')) {

            if ($candidate->foto_ketua && Storage::disk('public')->exists($candidate->foto_ketua)) {
                Storage::disk('public')->delete($candidate->foto_ketua);
            }

            $candidate->foto_ketua = $request->file('foto_ketua')
                ->store('candidates', 'public');
        }

        if ($request->hasFile('foto_wakil')) {

            if ($candidate->foto_wakil && Storage::disk('public')->exists($candidate->foto_wakil)) {
                Storage::disk('public')->delete($candidate->foto_wakil);
            }

            $candidate->foto_wakil = $request->file('foto_wakil')
                ->store('candidates', 'public');
        }

        $candidate->nomor_urut = $request->nomor_urut;
        $candidate->ketua = $request->ketua;
        $candidate->wakil = $request->wakil;
        $candidate->visi = $request->visi;
        $candidate->misi = $request->misi;

        $candidate->save();

        return redirect()
            ->route('candidates.index')
            ->with('success', 'Data kandidat berhasil diperbarui.');
    }

    /**
     * Hapus kandidat
     */
    public function destroy(Candidate $candidate)
    {
        if ($candidate->foto_ketua && Storage::disk('public')->exists($candidate->foto_ketua)) {
            Storage::disk('public')->delete($candidate->foto_ketua);
        }

        if ($candidate->foto_wakil && Storage::disk('public')->exists($candidate->foto_wakil)) {
            Storage::disk('public')->delete($candidate->foto_wakil);
        }

        $candidate->delete();

        return redirect()
            ->route('candidates.index')
            ->with('success', 'Data kandidat berhasil dihapus.');
    }
}