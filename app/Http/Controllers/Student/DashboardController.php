<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Setting;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $setting = Setting::first();

        $sudahVote = Vote::where('user_id', $user->id)->exists();

        $candidates = Candidate::orderBy('nomor_urut')->get();

        $totalKandidat = $candidates->count();

        return view('student.dashboard', compact(
            'user',
            'setting',
            'sudahVote',
            'candidates',
            'totalKandidat'
        ));
    }

    public function candidates()
    {
        $candidates = Candidate::orderBy('nomor_urut')->get();

        return view('student.candidates', compact('candidates'));
    }

    public function vision()
    {
        $candidates = Candidate::orderBy('nomor_urut')->get();

        return view('student.vision', compact('candidates'));
    }

    public function status()
    {
        $setting = Setting::first();

        $sudahVote = Vote::where('user_id', Auth::id())->exists();

        return view('student.status', compact(
            'setting',
            'sudahVote'
        ));
    }
}