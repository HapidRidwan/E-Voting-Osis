@extends('layouts.student')

@section('title', 'Status Pemilihan')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-8 text-white shadow-lg">
        <h1 class="text-3xl font-bold">Informasi Status Pemilihan</h1>
        <p class="mt-2 text-blue-100">Status terkini partisipasi voting Anda dan sistem E-Voting OSIS.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-6">

        <div class="bg-white rounded-3xl shadow-md p-6 border border-gray-100 flex flex-col justify-between space-y-4">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Status Hak Suara Anda</h2>
                    <span class="p-2 rounded-full {{ $sudahVote ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </span>
                </div>

                @if($sudahVote)
                    <div class="bg-green-50 border border-green-200 rounded-2xl p-5 text-green-800">
                        <h3 class="font-bold text-lg mb-1">Sudah Memilih ✅</h3>
                        <p class="text-sm text-green-700">Terima kasih! Suara Anda telah berhasil direkam dalam sistem e-voting.</p>
                    </div>
                @else
                    <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5 text-yellow-800">
                        <h3 class="font-bold text-lg mb-1">Belum Memilih ⚠️</h3>
                        <p class="text-sm text-yellow-700">Anda belum menggunakan hak suara. Silakan masuk ke bilik voting untuk memilih kandidat favorit Anda.</p>
                    </div>
                @endif
            </div>

            @if(!$sudahVote && $setting && $setting->voting_open)
                <a href="{{ route('vote.index') }}" class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition shadow">
                    Masuk Bilik Suara
                </a>
            @endif
        </div>

        <div class="bg-white rounded-3xl shadow-md p-6 border border-gray-100 flex flex-col justify-between space-y-4">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Status Sistem Pemilihan</h2>
                    <span class="p-2 rounded-full {{ ($setting && $setting->voting_open) ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </span>
                </div>

                @if($setting && $setting->voting_open)
                    <div class="bg-green-50 border border-green-200 rounded-2xl p-5 text-green-800">
                        <h3 class="font-bold text-lg mb-1">Voting DIBUKA 🟢</h3>
                        <p class="text-sm text-green-700">Sistem pemungutan suara saat ini aktif dan dapat menerima pilihan dari seluruh siswa.</p>
                    </div>
                @else
                    <div class="bg-red-50 border border-red-200 rounded-2xl p-5 text-red-800">
                        <h3 class="font-bold text-lg mb-1">Voting DITUTUP 🔴</h3>
                        <p class="text-sm text-red-700">Pemungutan suara saat ini belum dibuka oleh panitia atau telah selesai.</p>
                    </div>
                @endif
            </div>

            <div class="text-xs text-gray-400 text-center">
                E-Voting OSIS • Terverifikasi & Aman
            </div>
        </div>

    </div>

</div>

@endsection
