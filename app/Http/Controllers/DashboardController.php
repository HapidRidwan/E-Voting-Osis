<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;

class DashboardController extends Controller
{
    public function index()
    {
        // Total siswa
        $totalStudents = User::where('role', 'student')->count();

        // Total kandidat
        $totalCandidates = Candidate::count();

        // Total suara
        $totalVotes = Vote::count();

        // Belum memilih
        $belumVote = $totalStudents - $totalVotes;

        // Persentase voting
        $persentaseVote = $totalStudents > 0
            ? round(($totalVotes / $totalStudents) * 100, 2)
            : 0;

        // Ranking kandidat
        $ranking = Candidate::withCount('votes')
            ->orderByDesc('votes_count')
            ->get();

        return view('dashboard', compact(
            'totalStudents',
            'totalCandidates',
            'totalVotes',
            'belumVote',
            'persentaseVote',
            'ranking'
        ));
    }
}