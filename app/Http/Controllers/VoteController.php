<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    // Menampilkan halaman voting
    public function index()
    {
        $user = Auth::user();

        // Cek apakah sudah memilih
        $sudahMemilih = Vote::where('user_id', $user->id)->exists();

        if ($sudahMemilih) {
            return view('vote.success');
        }

        $candidates = Candidate::orderBy('nomor_urut')->get();

        return view('vote.index', compact('candidates'));
    }

    // Menyimpan suara
    public function store(Request $request)
    {
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        $user = Auth::user();

        // Mencegah memilih dua kali
        if (Vote::where('user_id', $user->id)->exists()) {
            return redirect()
                ->route('vote.index')
                ->with('error', 'Anda sudah melakukan voting.');
        }

        Vote::create([
            'user_id' => $user->id,
            'candidate_id' => $request->candidate_id,
        ]);

        return redirect()
            ->route('vote.success')
            ->with('success', 'Terima kasih telah memberikan suara.');
    }

    // Halaman setelah voting
    public function success()
    {
        return view('vote.success');
    }
}
