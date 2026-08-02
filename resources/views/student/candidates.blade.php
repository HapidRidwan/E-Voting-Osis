@extends('layouts.student')

@section('title', 'Daftar & Profil Kandidat OSIS')

@section('content')

<!-- Tambahkan x-data dan x-init untuk men-trigger animasi saat halaman dimuat -->
<div class="space-y-8 max-w-7xl mx-auto" x-data="{ pageLoaded: false }" x-init="setTimeout(() => pageLoaded = true, 100)">

    <!-- Header Banner Profil Kandidat: Muncul Pertama -->
    <div x-show="pageLoaded"
         x-transition:enter="transition ease-out duration-700 transform"
         x-transition:enter-start="opacity-0 translate-y-8"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-8 text-white shadow-xl border border-blue-500 transition-transform duration-300 hover:scale-[1.01]">
         
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div class="space-y-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-400/30 text-blue-50 border border-blue-400/30 backdrop-blur-md">
                    <svg class="w-3.5 h-3.5 text-blue-200 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Portal Pengenalan Paslon
                </span>
                <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight">Profil Pasangan Calon OSIS</h1>
                <p class="text-blue-100 text-sm md:text-base max-w-2xl leading-relaxed">
                    Pelajari rekam jejak, foto resmi, serta gagasan dari setiap pasangan calon Ketua dan Wakil Ketua OSIS sebelum memberikan suara.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('student.vision') }}" class="px-5 py-3 bg-white/10 hover:bg-white/20 text-white rounded-xl text-sm font-semibold border border-white/20 backdrop-blur-md flex items-center gap-2 hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group">
                    <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Visi & Misi Lengkap</span>
                </a>
            </div>
        </div>

        <div class="absolute top-0 right-0 -mt-12 -mr-12 w-64 h-64 bg-blue-400/20 rounded-full blur-3xl pointer-events-none animate-pulse"></div>
    </div>

    <!-- Candidate List Showcase Grid: Muncul Kedua (delay-300) -->
    <div x-show="pageLoaded"
         x-transition:enter="transition ease-out duration-700 delay-300 transform"
         x-transition:enter-start="opacity-0 translate-y-8"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="grid grid-cols-1 lg:grid-cols-2 gap-8">
         
        @foreach($candidates as $candidate)
        <!-- Ditambahkan hover:-translate-y-2 dan hover:shadow-2xl pada kartu -->
        <div class="bg-white rounded-3xl shadow-sm border border-blue-100 overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between group">
            
            <div>
                <!-- Card Header with Badge -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 text-white flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="w-12 h-12 rounded-2xl bg-white text-blue-700 flex items-center justify-center text-xl font-black shadow-lg shadow-blue-500/30 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                            #{{ $candidate->nomor_urut }}
                        </span>
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-blue-200 block">Pasangan Calon Nomor {{ $candidate->nomor_urut }}</span>
                            <h2 class="text-xl font-extrabold text-white leading-tight">
                                {{ $candidate->ketua }} & {{ $candidate->wakil }}
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- Side-by-Side Dual Portrait Photos Showcase -->
                <div class="p-6 bg-blue-50/50 border-b border-blue-100">
                    <div class="grid grid-cols-2 gap-4">
                        
                        <!-- Photo Ketua -->
                        <div class="relative group/photo overflow-hidden rounded-2xl border-2 border-blue-400/40 bg-blue-900 aspect-[3/4] shadow-sm">
                            @if($candidate->foto_ketua)
                                <img src="{{ asset('storage/'.$candidate->foto_ketua) }}" alt="{{ $candidate->ketua }}" class="w-full h-full object-cover transition-transform duration-500 group-hover/photo:scale-110">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-800 to-indigo-900 flex flex-col items-center justify-center text-white p-3 text-center transition-transform duration-500 group-hover/photo:scale-105">
                                    <svg class="w-12 h-12 opacity-50 mb-2 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    <span class="text-xs font-medium text-blue-200">Foto Ketua</span>
                                </div>
                            @endif
                            
                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-blue-950 via-blue-900/60 to-transparent p-3 text-white transition-opacity duration-300">
                                <span class="text-[10px] uppercase font-bold tracking-wider text-blue-300 block">Calon Ketua OSIS</span>
                                <p class="text-xs font-extrabold truncate">{{ $candidate->ketua }}</p>
                            </div>
                        </div>

                        <!-- Photo Wakil -->
                        <div class="relative group/photo overflow-hidden rounded-2xl border-2 border-blue-400/40 bg-indigo-900 aspect-[3/4] shadow-sm">
                            @if($candidate->foto_wakil)
                                <img src="{{ asset('storage/'.$candidate->foto_wakil) }}" alt="{{ $candidate->wakil }}" class="w-full h-full object-cover transition-transform duration-500 group-hover/photo:scale-110">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-indigo-900 to-blue-800 flex flex-col items-center justify-center text-white p-3 text-center transition-transform duration-500 group-hover/photo:scale-105">
                                    <svg class="w-12 h-12 opacity-50 mb-2 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    <span class="text-xs font-medium text-blue-200">Foto Wakil</span>
                                </div>
                            @endif

                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-blue-950 via-blue-900/60 to-transparent p-3 text-white transition-opacity duration-300">
                                <span class="text-[10px] uppercase font-bold tracking-wider text-indigo-300 block">Calon Wakil Ketua</span>
                                <p class="text-xs font-extrabold truncate">{{ $candidate->wakil }}</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Tabbed Profile Brief Visi & Misi -->
                <div class="p-6 space-y-4">
                    @if($candidate->visi)
                    <div class="transition-colors duration-300 group-hover:bg-blue-50/30 rounded-xl p-1 -m-1">
                        <span class="text-xs font-bold text-blue-500 uppercase tracking-wider block mb-1.5">Ringkasan Visi</span>
                        <div class="p-4 rounded-2xl bg-blue-50 border border-blue-100 text-blue-900 text-sm leading-relaxed font-medium italic">
                            &ldquo;{{ $candidate->visi }}&rdquo;
                        </div>
                    </div>
                    @endif

                    @if($candidate->misi)
                    <div class="transition-colors duration-300 group-hover:bg-indigo-50/30 rounded-xl p-1 -m-1">
                        <span class="text-xs font-bold text-blue-500 uppercase tracking-wider block mb-1.5">Misi Utama</span>
                        <div class="p-4 rounded-2xl bg-indigo-50 border border-indigo-100 text-indigo-900 text-xs leading-relaxed whitespace-pre-line">
                            {{ Str::limit($candidate->misi, 200) }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Footer Action Button -->
            <!-- Ditambahkan efek hover interaktif pada tombol -->
            <div class="p-6 pt-0 flex gap-3">
                <a href="{{ route('student.vision') }}" class="flex-1 text-center py-3 px-4 rounded-xl border border-blue-200 text-blue-700 hover:bg-blue-50 hover:border-blue-300 font-bold text-xs hover:-translate-y-1 transition-all duration-300">
                    Visi & Misi Lengkap
                </a>
                <a href="{{ route('vote.index') }}" class="group/btn flex-1 text-center py-3 px-4 rounded-xl bg-blue-600 hover:bg-indigo-700 text-white font-extrabold text-xs shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-1.5">
                    <span>Menu Bilik Voting</span>
                    <svg class="w-3.5 h-3.5 text-blue-200 transition-transform duration-300 group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

        </div>
        @endforeach
    </div>

</div>

@endsection