<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Vote;
use App\Models\Candidate;
use App\Models\Setting;
class DashboardController extends Controller
{
    public function index()
    {
        // Total siswa
        $totalStudents = Student::count();
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

        $setting = Setting::first();

        return view('dashboard', compact(
            'totalStudents',
            'totalCandidates',
            'totalVotes',
            'belumVote',
            'persentaseVote',
            'ranking',
            'setting'
        ));
    }

    public function toggle()
    {
        $setting = Setting::first();

        $setting->voting_open = !$setting->voting_open;

        $setting->save();

        return back();
    }
}