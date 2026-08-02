@extends('layouts.student')

@section('title', 'Visi & Misi Kandidat')

@section('content')

<!-- x-data Alpine.js untuk memicu animasi saat halaman dimuat -->
<div class="space-y-8 max-w-6xl mx-auto" x-data="{ pageLoaded: false }" x-init="setTimeout(() => pageLoaded = true, 100)">

    <!-- Header Banner: Animasi Muncul Pertama -->
    <div x-show="pageLoaded"
         x-transition:enter="transition ease-out duration-700 transform"
         x-transition:enter-start="opacity-0 translate-y-8"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-fuchsia-700 rounded-3xl p-8 lg:p-10 text-white shadow-xl border border-indigo-400/50 transition-transform duration-500 hover:scale-[1.01] group">
         
        <!-- Elemen Dekoratif Banner -->
        <div class="absolute top-0 right-0 -mt-16 -mr-16 w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none group-hover:bg-white/20 transition-colors duration-700"></div>
        <div class="absolute bottom-0 left-0 -mb-16 -ml-16 w-48 h-48 bg-indigo-300/20 rounded-full blur-2xl pointer-events-none animate-pulse"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div class="space-y-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-white/10 text-indigo-50 border border-white/20 backdrop-blur-md">
                    <svg class="w-4 h-4 text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2"></path></svg>
                    Program Kerja Paslon
                </span>
                <h1 class="text-3xl lg:text-4xl font-extrabold tracking-tight">Visi & Misi Pasangan Calon</h1>
                <p class="mt-2 text-indigo-100 text-sm md:text-base max-w-2xl leading-relaxed">
                    Pelajari visi, misi, dan gagasan utama dari masing-masing calon Ketua & Wakil Ketua OSIS sebelum Anda menentukan pilihan di bilik suara.
                </p>
            </div>
            
            <div class="hidden md:block p-4 bg-white/10 rounded-3xl border border-white/20 backdrop-blur-sm group-hover:rotate-6 group-hover:scale-105 transition-transform duration-500">
                <svg class="w-14 h-14 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
        </div>
    </div>

    <!-- Daftar Kandidat -->
    <div class="space-y-8">
        @foreach($candidates as $candidate)
        <!-- Kartu Kandidat: Animasi Bertingkat (Staggered) menggunakan $loop->iteration -->
        <div x-show="pageLoaded"
             x-transition:enter="transition ease-out duration-700 transform"
             x-transition:enter-start="opacity-0 translate-y-12"
             x-transition:enter-end="opacity-100 translate-y-0"
             style="transition-delay: {{ $loop->iteration * 150 }}ms;"
             class="bg-white rounded-3xl shadow-sm hover:shadow-2xl border border-gray-100 p-6 md:p-8 hover:-translate-y-2 transition-all duration-300 group relative overflow-hidden flex flex-col gap-6">
             
            <!-- Garis Dekoratif di Atas Kartu (Muncul saat di-hover) -->
            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500 ease-out"></div>

            <!-- Header Kartu Kandidat -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-100 pb-6 gap-5 relative z-10">
                <div class="flex items-center gap-4">
                    <span class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 text-white flex items-center justify-center text-2xl font-black shadow-lg shadow-blue-500/30 group-hover:scale-110 group-hover:-rotate-6 transition-transform duration-500">
                        #{{ $candidate->nomor_urut }}
                    </span>
                    <div>
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-wider block mb-1">
                            Pasangan Calon Nomor {{ $candidate->nomor_urut }}
                        </span>
                        <h2 class="text-2xl font-extrabold text-gray-900 group-hover:text-blue-700 transition-colors duration-300">
                            {{ $candidate->ketua }} & {{ $candidate->wakil }}
                        </h2>
                    </div>
                </div>

                <a href="{{ route('vote.index') }}" class="group/btn inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-extrabold rounded-xl transition-all duration-300 shadow-md hover:shadow-xl hover:-translate-y-1 w-full md:w-auto">
                    <span>Berikan Suara</span>
                    <svg class="w-5 h-5 transition-transform duration-300 group-hover/btn:translate-x-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

            <!-- Konten Visi & Misi -->
            <div class="grid md:grid-cols-2 gap-6 lg:gap-8 relative z-10">
                
                <!-- Kotak Visi -->
                <div class="bg-gradient-to-br from-blue-50/80 to-indigo-50/30 p-6 rounded-2xl border border-blue-100/80 hover:bg-blue-50 hover:border-blue-200 transition-colors duration-300 h-full flex flex-col shadow-sm">
                    <div class="flex items-center gap-2.5 text-blue-700 font-extrabold text-lg mb-4 border-b border-blue-100 pb-3">
                        <div class="p-2 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition-colors duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        VISI
                    </div>
                    <p class="text-gray-700 leading-relaxed font-medium text-sm lg:text-base italic">
                        &ldquo;{{ $candidate->visi ?? 'Belum ada visi tercantum.' }}&rdquo;
                    </p>
                </div>

                <!-- Kotak Misi -->
                <div class="bg-gradient-to-br from-purple-50/80 to-fuchsia-50/30 p-6 rounded-2xl border border-purple-100/80 hover:bg-purple-50 hover:border-purple-200 transition-colors duration-300 h-full flex flex-col shadow-sm">
                    <div class="flex items-center gap-2.5 text-purple-700 font-extrabold text-lg mb-4 border-b border-purple-100 pb-3">
                        <div class="p-2 bg-purple-100 rounded-lg group-hover:bg-purple-200 transition-colors duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01m-.01 4h.01"></path></svg>
                        </div>
                        MISI
                    </div>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line font-medium text-sm lg:text-base">
                        {{ $candidate->misi ?? 'Belum ada misi tercantum.' }}
                    </p>
                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection