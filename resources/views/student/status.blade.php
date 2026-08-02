@extends('layouts.student')

@section('title', 'Status Pemilihan')

@section('content')

<!-- Wrapper dengan x-data Alpine.js untuk trigger animasi saat dimuat -->
<div class="max-w-5xl mx-auto space-y-8" x-data="{ pageLoaded: false }" x-init="setTimeout(() => pageLoaded = true, 100)">

    <!-- Header Banner: Animasi muncul pertama -->
    <div x-show="pageLoaded"
         x-transition:enter="transition ease-out duration-700 transform"
         x-transition:enter-start="opacity-0 translate-y-8"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 rounded-3xl p-8 lg:p-10 text-white shadow-xl border border-blue-500 transition-all duration-300 hover:scale-[1.01] hover:shadow-2xl group">
         
        <!-- Elemen Dekoratif Animasi -->
        <div class="absolute top-0 right-0 -mt-16 -mr-16 w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none group-hover:bg-white/20 transition-colors duration-700"></div>
        <div class="absolute bottom-0 left-0 -mb-16 -ml-16 w-48 h-48 bg-blue-400/20 rounded-full blur-2xl pointer-events-none animate-pulse"></div>

        <div class="relative z-10 flex flex-col md:flex-row gap-6 items-start md:items-center justify-between">
            <div class="space-y-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-white/10 text-blue-50 border border-white/20 backdrop-blur-md">
                    <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Pusat Informasi
                </span>
                <h1 class="text-3xl lg:text-4xl font-extrabold tracking-tight">Status Hak Suara & Sistem</h1>
                <p class="text-blue-100 text-sm md:text-base max-w-xl leading-relaxed">
                    Pantau status partisipasi voting Anda saat ini dan ketersediaan sistem E-Voting OSIS secara real-time.
                </p>
            </div>
            
            <!-- Ikon Besar di Kanan (Opsional tapi memperbagus visual) -->
            <div class="hidden md:flex p-4 bg-white/10 rounded-3xl border border-white/20 backdrop-blur-sm group-hover:rotate-3 group-hover:scale-105 transition-transform duration-500">
                <svg class="w-16 h-16 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Grid Kartu Status -->
    <div class="grid md:grid-cols-2 gap-6 lg:gap-8">

        <!-- KARTU 1: Status Hak Suara -->
        <div x-show="pageLoaded"
             x-transition:enter="transition ease-out duration-700 delay-150 transform"
             x-transition:enter-start="opacity-0 translate-y-8"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="bg-white rounded-3xl shadow-sm hover:shadow-xl border border-gray-100 p-6 lg:p-8 flex flex-col justify-between space-y-6 group hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
             
             <!-- Dekorasi latar belakang tipis saat hover -->
             <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

            <div class="relative z-10">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl lg:text-2xl font-bold text-gray-800">Status Hak Suara Anda</h2>
                    <span class="p-3 rounded-2xl transition-transform duration-500 group-hover:scale-110 group-hover:rotate-6 {{ $sudahVote ? 'bg-green-100 text-green-600 shadow-lg shadow-green-500/20' : 'bg-amber-100 text-amber-600 shadow-lg shadow-amber-500/20' }}">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </span>
                </div>

                @if($sudahVote)
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200/60 rounded-2xl p-6 text-green-800 shadow-inner">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="relative flex h-3 w-3">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                            </span>
                            <h3 class="font-extrabold text-lg">Sudah Memilih</h3>
                        </div>
                        <p class="text-sm text-green-700/90 leading-relaxed font-medium">Terima kasih! Suara Anda telah berhasil direkam secara anonim dan aman dalam sistem e-voting.</p>
                    </div>
                @else
                    <div class="bg-gradient-to-br from-amber-50 to-orange-50 border border-amber-200/60 rounded-2xl p-6 text-amber-800 shadow-inner">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-5 h-5 text-amber-500 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            <h3 class="font-extrabold text-lg">Belum Memilih</h3>
                        </div>
                        <p class="text-sm text-amber-700/90 leading-relaxed font-medium">Anda belum menggunakan hak suara. Silakan masuk ke bilik voting untuk memilih kandidat favorit Anda sebelum waktu habis.</p>
                    </div>
                @endif
            </div>

            <div class="relative z-10 pt-2">
                @if(!$sudahVote && $setting && $setting->voting_open)
                    <a href="{{ route('vote.index') }}" class="group/btn w-full flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-4 rounded-xl transition-all duration-300 shadow-md hover:shadow-xl hover:-translate-y-1">
                        <span>Masuk Bilik Suara Sekarang</span>
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover/btn:translate-x-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                @elseif($sudahVote)
                    <div class="w-full text-center py-3.5 px-4 rounded-xl bg-gray-50 border border-gray-100 text-gray-500 font-semibold text-sm">
                        Hak suara telah digunakan
                    </div>
                @endif
            </div>
        </div>

        <!-- KARTU 2: Status Sistem -->
        <div x-show="pageLoaded"
             x-transition:enter="transition ease-out duration-700 delay-300 transform"
             x-transition:enter-start="opacity-0 translate-y-8"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="bg-white rounded-3xl shadow-sm hover:shadow-xl border border-gray-100 p-6 lg:p-8 flex flex-col justify-between space-y-6 group hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
             
             <!-- Dekorasi latar belakang tipis saat hover -->
             <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

            <div class="relative z-10">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl lg:text-2xl font-bold text-gray-800">Status Sistem E-Voting</h2>
                    <span class="p-3 rounded-2xl transition-transform duration-500 group-hover:scale-110 group-hover:-rotate-6 {{ ($setting && $setting->voting_open) ? 'bg-blue-100 text-blue-600 shadow-lg shadow-blue-500/20' : 'bg-red-100 text-red-600 shadow-lg shadow-red-500/20' }}">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </span>
                </div>

                @if($setting && $setting->voting_open)
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-200/60 rounded-2xl p-6 text-blue-900 shadow-inner">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="relative flex h-3 w-3">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-600"></span>
                            </span>
                            <h3 class="font-extrabold text-lg">Voting DIBUKA</h3>
                        </div>
                        <p class="text-sm text-blue-800/90 leading-relaxed font-medium">Sistem pemungutan suara saat ini aktif dan dapat menerima pilihan dari seluruh siswa secara real-time.</p>
                    </div>
                @else
                    <div class="bg-gradient-to-br from-red-50 to-rose-50 border border-red-200/60 rounded-2xl p-6 text-red-900 shadow-inner">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                            <h3 class="font-extrabold text-lg">Voting DITUTUP</h3>
                        </div>
                        <p class="text-sm text-red-800/90 leading-relaxed font-medium">Pemungutan suara saat ini belum dibuka oleh panitia, sedang dijeda, atau telah selesai.</p>
                    </div>
                @endif
            </div>

            <div class="relative z-10 pt-2">
                <div class="w-full flex items-center justify-center gap-2 py-3.5 px-4 bg-gray-50/50 rounded-xl border border-gray-100 text-xs font-semibold text-gray-400 group-hover:text-blue-500 transition-colors duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    E-Voting OSIS • Terverifikasi & Aman
                </div>
            </div>
        </div>

    </div>

</div>

@endsection