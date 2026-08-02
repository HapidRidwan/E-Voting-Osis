@extends('layouts.student')

@section('title', 'Bilik Pemilihan Suara (E-Voting)')

@section('content')

<!-- x-data diperbarui untuk memasukkan state pageLoaded demi memicu animasi awal -->
<div x-data="{ modalOpen: false, paslonId: null, paslonNomor: '', paslonKetua: '', paslonWakil: '', pageLoaded: false }" 
     x-init="setTimeout(() => pageLoaded = true, 100)" 
     class="space-y-8 max-w-7xl mx-auto">

    <!-- Header Bilik Suara Resmi: Animasi Muncul Pertama -->
    <div x-show="pageLoaded"
         x-transition:enter="transition ease-out duration-700 transform"
         x-transition:enter-start="opacity-0 translate-y-8"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="bg-gradient-to-br from-blue-600 via-indigo-600 to-blue-800 text-white rounded-3xl p-8 lg:p-10 shadow-xl border border-blue-400/30 relative overflow-hidden transition-transform duration-500 hover:scale-[1.01] group">
         
        <!-- Elemen Dekoratif -->
        <div class="absolute top-0 right-0 -mt-16 -mr-16 w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none group-hover:bg-white/20 transition-colors duration-700"></div>
        <div class="absolute bottom-0 left-0 -mb-16 -ml-16 w-48 h-48 bg-blue-300/20 rounded-full blur-2xl pointer-events-none animate-pulse"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div class="space-y-3">
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1.5 bg-white/10 text-white backdrop-blur-md rounded-full text-xs font-bold uppercase tracking-widest border border-white/20 flex items-center gap-2">
                        <span class="relative flex h-2.5 w-2.5">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                        </span>
                        Bilik Suara Digital Rahasia
                    </span>
                </div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-black tracking-tight drop-shadow-sm">SURAT SUARA E-VOTING</h1>
                <p class="text-blue-100 text-sm md:text-base max-w-2xl leading-relaxed">
                    Silakan tentukan pilihan Anda. Tekan tombol <strong class="text-white underline decoration-2 underline-offset-4">COBLOS PASLON</strong> pada salah satu kotak surat suara di bawah ini. Pilihan bersifat rahasia.
                </p>
            </div>

            <div class="bg-white/10 backdrop-blur-md p-5 rounded-2xl border border-white/20 text-center min-w-[180px] shadow-inner transform group-hover:rotate-2 transition-transform duration-500">
                <span class="text-xs text-blue-100 uppercase tracking-wider block mb-1">Status Hak Pilih</span>
                <span class="text-lg font-extrabold text-white flex items-center justify-center gap-1.5">
                    <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Aktif & Valid
                </span>
            </div>
        </div>
    </div>

    @if(session('error'))
        <div x-show="pageLoaded"
             x-transition:enter="transition ease-out duration-500 delay-100"
             x-transition:enter-start="opacity-0 translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="bg-red-50 border-2 border-red-200 text-red-800 p-4 rounded-2xl flex items-center gap-3 shadow-sm">
            <svg class="w-6 h-6 text-red-600 shrink-0 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <p class="font-bold text-sm">{{ session('error') }}</p>
        </div>
    @endif

    <!-- Digital Ballot Box Grid (Desain Surat Suara Fisik Digital) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($candidates as $candidate)
        <!-- Kartu Surat Suara: Animasi Bertingkat (Staggered) -->
        <div x-show="pageLoaded"
             x-transition:enter="transition ease-out duration-700 transform"
             x-transition:enter-start="opacity-0 translate-y-12"
             x-transition:enter-end="opacity-100 translate-y-0"
             style="transition-delay: {{ $loop->iteration * 150 }}ms;"
             class="bg-white rounded-3xl border-4 border-dashed border-slate-300 hover:border-blue-500 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 p-6 flex flex-col justify-between relative group/card overflow-hidden">
             
            <!-- Dekorasi background tipis saat hover -->
            <div class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

            <div class="relative z-10 flex-1 flex flex-col">
                <!-- Rubber Stamp Ribbon Header -->
                <div class="text-center pb-4 border-b-2 border-slate-200 mb-6 relative">
                    <span class="inline-block px-4 py-1.5 bg-slate-900 text-white font-black text-xs tracking-widest rounded-full uppercase shadow-md group-hover/card:bg-blue-600 transition-colors duration-300">
                        SURAT SUARA #0{{ $candidate->nomor_urut }}
                    </span>
                    
                    <!-- Giant Number Badge -->
                    <div class="w-20 h-20 mx-auto mt-5 rounded-full bg-gradient-to-br from-slate-700 to-slate-900 group-hover/card:from-blue-600 group-hover/card:to-indigo-600 text-white flex items-center justify-center text-3xl font-black shadow-lg border-4 border-white group-hover/card:scale-110 group-hover/card:-rotate-6 transition-all duration-500">
                        {{ $candidate->nomor_urut }}
                    </div>
                </div>

                <!-- Passport Photos of Pair -->
                <div class="space-y-4 mb-6 flex-1">
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <!-- Foto Ketua -->
                        <div class="space-y-2 group/photo">
                            <div class="w-28 h-36 mx-auto rounded-xl overflow-hidden border-2 border-slate-200 group-hover/card:border-blue-300 bg-slate-100 shadow-inner relative">
                                @if($candidate->foto_ketua)
                                    <img src="{{ asset('storage/'.$candidate->foto_ketua) }}" alt="Foto Ketua" class="w-full h-full object-cover transition-transform duration-500 group-hover/photo:scale-110">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 transition-transform duration-500 group-hover/photo:scale-110">
                                        <svg class="w-10 h-10 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 ring-1 ring-inset ring-black/10 rounded-xl"></div>
                            </div>
                            <p class="font-black text-sm text-slate-900 leading-tight truncate px-1" title="{{ $candidate->ketua }}">{{ $candidate->ketua }}</p>
                            <span class="inline-block px-2 py-0.5 bg-blue-50 text-blue-700 border border-blue-100 text-[10px] font-extrabold rounded-md shadow-sm">CALON KETUA</span>
                        </div>

                        <!-- Foto Wakil -->
                        <div class="space-y-2 group/photo">
                            <div class="w-28 h-36 mx-auto rounded-xl overflow-hidden border-2 border-slate-200 group-hover/card:border-indigo-300 bg-slate-100 shadow-inner relative">
                                @if($candidate->foto_wakil)
                                    <img src="{{ asset('storage/'.$candidate->foto_wakil) }}" alt="Foto Wakil" class="w-full h-full object-cover transition-transform duration-500 group-hover/photo:scale-110">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 transition-transform duration-500 group-hover/photo:scale-110">
                                        <svg class="w-10 h-10 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 ring-1 ring-inset ring-black/10 rounded-xl"></div>
                            </div>
                            <p class="font-black text-sm text-slate-900 leading-tight truncate px-1" title="{{ $candidate->wakil }}">{{ $candidate->wakil }}</p>
                            <span class="inline-block px-2 py-0.5 bg-indigo-50 text-indigo-700 border border-indigo-100 text-[10px] font-extrabold rounded-md shadow-sm">CALON WAKIL</span>
                        </div>
                    </div>

                    @if($candidate->visi)
                    <div class="mt-4 p-3.5 bg-slate-50 group-hover/card:bg-white rounded-xl border border-slate-200 group-hover/card:border-blue-100 text-xs text-slate-600 line-clamp-2 text-center italic transition-colors duration-300 font-medium">
                        &ldquo;{{ $candidate->visi }}&rdquo;
                    </div>
                    @endif
                </div>
            </div>

            <!-- Coblos Action Button (Triggers Confirmation Modal) -->
            <button type="button"
                    @click="modalOpen = true; paslonId = '{{ $candidate->id }}'; paslonNomor = '{{ $candidate->nomor_urut }}'; paslonKetua = '{{ $candidate->ketua }}'; paslonWakil = '{{ $candidate->wakil }}'"
                    class="relative z-10 w-full py-4 bg-slate-800 hover:bg-gradient-to-r hover:from-blue-600 hover:to-indigo-600 text-white font-black rounded-2xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 group/btn">
                <svg class="w-6 h-6 transition-transform duration-300 group-hover/btn:scale-125 group-hover/btn:rotate-[-10deg]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-base tracking-wider">COBLOS PASLON #{{ $candidate->nomor_urut }}</span>
            </button>

        </div>
        @endforeach
    </div>

    <!-- Confirmation Modal (Pop-up Bilik Suara) dengan Animasi Transisi Alpine yang diperhalus -->
    <div x-show="modalOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/80 backdrop-blur-sm"
         style="display: none;">
        
        <!-- Panel Dalam Modal -->
        <div @click.away="modalOpen = false" 
             x-show="modalOpen"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
             class="bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl border border-slate-200 text-center space-y-6 relative overflow-hidden">
            
            <!-- Dekorasi Modal -->
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 to-indigo-600"></div>

            <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto text-4xl shadow-inner border-4 border-blue-100 animate-bounce">
                🗳️
            </div>

            <div>
                <span class="text-xs font-bold text-blue-600 uppercase tracking-widest block mb-1.5">Konfirmasi Pilihan Suara</span>
                <h3 class="text-3xl font-black text-slate-900 mb-2">Yakin Memilih #<span x-text="paslonNomor"></span>?</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Anda akan memberikan suara untuk pasangan:<br>
                    <strong class="text-slate-900 text-base" x-text="paslonKetua"></strong> & <strong class="text-slate-900 text-base" x-text="paslonWakil"></strong>.
                </p>
                
                <div class="mt-4 flex items-start gap-2 bg-amber-50 p-3 rounded-xl border border-amber-200 text-left">
                    <svg class="w-5 h-5 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <p class="text-xs text-amber-700 font-semibold leading-relaxed">
                        Pilihan bersifat final, rahasia, dan <strong class="text-amber-800">tidak dapat diubah</strong> setelah dikonfirmasi.
                    </p>
                </div>
            </div>

            <form action="{{ route('vote.store') }}" method="POST" class="flex gap-3 pt-2">
                @csrf
                <input type="hidden" name="candidate_id" :value="paslonId">

                <button type="button" @click="modalOpen = false" class="flex-1 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm rounded-xl transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" class="flex-[1.5] py-3.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-black text-sm rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    Ya, Coblos!
                </button>
            </form>
        </div>
    </div>

</div>

@endsection