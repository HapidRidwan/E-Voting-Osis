@extends('layouts.student')

@section('title', 'Bilik Pemilihan Suara (E-Voting)')

@section('content')

<div x-data="{ modalOpen: false, paslonId: null, paslonNomor: '', paslonKetua: '', paslonWakil: '' }" class="space-y-8 max-w-7xl mx-auto">

    <!-- Header Bilik Suara Resmi -->
    <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700 text-white rounded-3xl p-8 shadow-xl border border-blue-500/30 relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div class="space-y-2">
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1 bg-white/20 text-white backdrop-blur-md rounded-full text-xs font-bold uppercase tracking-widest border border-white/30 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        Bilik Suara Digital Rahasia
                    </span>
                </div>
                <h1 class="text-3xl md:text-4xl font-black tracking-tight">SURAT SUARA PEMILIHAN KETUA OSIS</h1>
                <p class="text-blue-100 text-sm md:text-base max-w-2xl">
                    Silakan tentukan pilihan Anda. Tekan tombol <strong class="text-white underline">COBLOS PASLON</strong> pada salah satu kotak surat suara di bawah ini.
                </p>
            </div>

            <div class="bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/20 text-center min-w-[180px]">
                <span class="text-xs text-blue-100 uppercase tracking-wider block">Status Hak Pilih</span>
                <span class="text-base font-extrabold text-white flex items-center justify-center gap-1 mt-1">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Aktif & Valid
                </span>
            </div>
        </div>
    </div>

    @if(session('error'))
        <div class="bg-blue-50 border-2 border-blue-200 text-blue-800 p-4 rounded-2xl flex items-center gap-3">
            <svg class="w-6 h-6 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <p class="font-bold text-sm">{{ session('error') }}</p>
        </div>
    @endif

    <!-- Digital Ballot Box Grid (Desain Surat Suara Fisik Digital) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($candidates as $candidate)
        <div class="bg-blue-50/40 rounded-3xl border-4 border-dashed border-slate-300 hover:border-blue-500 shadow-md hover:shadow-2xl transition-all duration-300 p-6 flex flex-col justify-between relative group bg-white">
            
            <!-- Rubber Stamp Ribbon Header -->
            <div class="text-center pb-4 border-b-2 border-slate-200 mb-6 relative">
                <span class="inline-block px-4 py-1.5 bg-slate-900 text-white font-black text-xs tracking-widest rounded-full uppercase shadow">
                    SURAT SUARA #0{{ $candidate->nomor_urut }}
                </span>
                
                <!-- Giant Number Badge -->
                <div class="w-20 h-20 mx-auto mt-4 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-500 text-white flex items-center justify-center text-3xl font-black shadow-lg border-4 border-white group-hover:scale-110 transition-transform">
                    {{ $candidate->nomor_urut }}
                </div>
            </div>

            <!-- Passport Photos of Pair -->
            <div class="space-y-4 mb-6">
                <div class="grid grid-cols-2 gap-3 text-center">
                    <!-- Foto Ketua -->
                    <div class="space-y-2">
                        <div class="w-28 h-36 mx-auto rounded-xl overflow-hidden border-2 border-slate-800 bg-slate-100 shadow-inner">
                            @if($candidate->foto_ketua)
                                <img src="{{ asset('storage/'.$candidate->foto_ketua) }}" alt="Foto Ketua" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-slate-200 flex flex-col items-center justify-center text-slate-400">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                            @endif
                        </div>
                        <p class="font-black text-sm text-slate-900 leading-tight truncate px-1">{{ $candidate->ketua }}</p>
                        <span class="inline-block px-2 py-0.5 bg-blue-100 text-blue-800 text-[10px] font-bold rounded-md">CALON KETUA</span>
                    </div>

                    <!-- Foto Wakil -->
                    <div class="space-y-2">
                        <div class="w-28 h-36 mx-auto rounded-xl overflow-hidden border-2 border-slate-800 bg-slate-100 shadow-inner">
                            @if($candidate->foto_wakil)
                                <img src="{{ asset('storage/'.$candidate->foto_wakil) }}" alt="Foto Wakil" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-slate-200 flex flex-col items-center justify-center text-slate-400">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                            @endif
                        </div>
                        <p class="font-black text-sm text-slate-900 leading-tight truncate px-1">{{ $candidate->wakil }}</p>
                        <span class="inline-block px-2 py-0.5 bg-indigo-100 text-indigo-800 text-[10px] font-bold rounded-md">CALON WAKIL</span>
                    </div>
                </div>

                @if($candidate->visi)
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 text-[11px] text-slate-600 line-clamp-2 text-center italic">
                    &ldquo;{{ $candidate->visi }}&rdquo;
                </div>
                @endif
            </div>

            <!-- Coblos Action Button (Triggers Confirmation Modal) -->
            <button type="button"
                    @click="modalOpen = true; paslonId = '{{ $candidate->id }}'; paslonNomor = '{{ $candidate->nomor_urut }}'; paslonKetua = '{{ $candidate->ketua }}'; paslonWakil = '{{ $candidate->wakil }}'"
                    class="w-full py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-black rounded-2xl shadow-lg hover:shadow-xl transition-all duration-200 flex items-center justify-center gap-2 group/btn border-2 border-blue-700">
                <svg class="w-6 h-6 transition-transform group-hover/btn:scale-125" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-base tracking-wider">COBLOS PASLON #{{ $candidate->nomor_urut }}</span>
            </button>

        </div>
        @endforeach
    </div>

    <!-- Confirmation Modal (Pop-up Bilik Suara) -->
    <div x-show="modalOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/80 backdrop-blur-sm"
         style="display: none;">
        
        <div @click.away="modalOpen = false" class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl border border-slate-200 text-center space-y-5 animate-scale-in">
            <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto text-2xl font-black border-4 border-blue-200">
                🗳️
            </div>

            <div>
                <span class="text-xs font-bold text-blue-600 uppercase tracking-widest block mb-1">Konfirmasi Pilihan Suara</span>
                <h3 class="text-2xl font-black text-slate-900">Yakin Memilih Paslon #<span x-text="paslonNomor"></span>?</h3>
                <p class="text-slate-600 text-sm mt-2">
                    Anda akan memberikan suara untuk <strong class="text-slate-900" x-text="paslonKetua"></strong> & <strong class="text-slate-900" x-text="paslonWakil"></strong>.
                </p>
                <!-- Note: Warna peringatan (warning) tetap dibiarkan amber/kuning agar sesuai dengan standar UI/UX -->
                <p class="text-xs text-amber-600 font-semibold mt-2 bg-amber-50 p-2 rounded-xl border border-amber-200">
                    ⚠️ Pilihan bersifat final dan tidak dapat diubah setelah dikonfirmasi.
                </p>
            </div>

            <form action="{{ route('vote.store') }}" method="POST" class="flex gap-3 pt-2">
                @csrf
                <input type="hidden" name="candidate_id" :value="paslonId">

                <button type="button" @click="modalOpen = false" class="flex-1 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm rounded-xl transition">
                    Batal
                </button>
                <button type="submit" class="flex-1 py-3 bg-blue-600 hover:bg-blue-700 text-white font-black text-sm rounded-xl shadow-lg transition">
                    Ya, Coblos Sekarang!
                </button>
            </form>
        </div>
    </div>

</div>

@endsection