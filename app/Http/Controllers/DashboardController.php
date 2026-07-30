<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = User::where('role','student')->count();

        $totalCandidates = Candidate::count();

        $totalVotes = Vote::count();

        $belumVoting = $totalStudents - $totalVotes;

        $candidates = Candidate::withCount('votes')->get();

        return view('dashboard', compact(
            'totalStudents',
            'totalCandidates',
            'totalVotes',
            'belumVoting',
            'candidates'
        ));
    }
}