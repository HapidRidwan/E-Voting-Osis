@extends('layouts.student')

@section('title', 'Voting Berhasil')

@section('content')

<!-- Inisialisasi Alpine untuk memicu animasi saat halaman dimuat -->
<div x-data="{ pageLoaded: false }" 
     x-init="setTimeout(() => pageLoaded = true, 100)" 
     class="min-h-[80vh] flex items-center justify-center py-12 px-4 relative">

    <!-- Efek Cahaya / Glow di Belakang Kartu -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3/4 max-w-2xl h-3/4 bg-gradient-to-tr from-green-300/30 to-emerald-400/20 blur-3xl rounded-full pointer-events-none -z-10"></div>

    <!-- Kartu Utama -->
    <div x-show="pageLoaded"
         x-transition:enter="transition ease-out duration-700 transform"
         x-transition:enter-start="opacity-0 scale-90 translate-y-8"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         class="bg-white/90 backdrop-blur-xl rounded-[2.5rem] shadow-2xl p-10 md:p-14 text-center max-w-lg w-full border border-white/50 relative overflow-hidden group">
         
        <!-- Garis Dekoratif di atas kartu -->
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-green-400 via-emerald-500 to-teal-500"></div>

        <div class="space-y-8 relative z-10">
            <!-- Icon Checklist dengan Animasi Ripple -->
            <div class="relative w-24 h-24 mx-auto">
                <div class="absolute inset-0 bg-emerald-400 rounded-full animate-ping opacity-20"></div>
                <div class="relative w-full h-full bg-gradient-to-br from-green-100 to-emerald-50 rounded-full flex items-center justify-center shadow-inner border-4 border-white z-10">
                    <svg class="w-12 h-12 text-emerald-500 drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Teks Sambutan -->
            <div x-show="pageLoaded"
                 x-transition:enter="transition ease-out duration-700 delay-200"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0">
                <h1 class="text-3xl md:text-4xl font-black bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600 mb-4 tracking-tight">
                    Terima Kasih!
                </h1>

                <p class="text-slate-600 leading-relaxed md:text-lg">
                    Suara Anda telah <strong class="text-slate-900">berhasil direkam</strong> dalam sistem E-Voting.
                </p>
                <span class="inline-block mt-3 px-3 py-1 bg-slate-100 text-slate-500 text-xs font-bold rounded-full border border-slate-200">
                    Sesi Voting Selesai
                </span>
            </div>

            <!-- Box Keamanan -->
            <div x-show="pageLoaded"
                 x-transition:enter="transition ease-out duration-700 delay-300"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="bg-emerald-50/50 border border-emerald-200/60 rounded-2xl p-5 flex items-start gap-4 text-left shadow-sm group-hover:bg-emerald-50 transition-colors duration-300">
                <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <div>
                    <span class="font-bold text-emerald-900 block mb-1">Kerahasiaan Terjamin</span>
                    <p class="text-xs text-emerald-700 leading-relaxed">Pilihan suara Anda bersifat sangat rahasia dan telah dienkripsi secara aman oleh sistem.</p>
                </div>
            </div>

            <!-- Tombol Navigasi -->
            <div x-show="pageLoaded"
                 x-transition:enter="transition ease-out duration-700 delay-400"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="flex flex-col sm:flex-row gap-4 pt-2">
                 
                <!-- Tombol Kembali ke Dashboard (Primary) -->
                <a href="{{ route('student.dashboard') }}"
                   class="flex-[1.2] inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold px-6 py-4 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard Utama
                </a>

                <!-- Tombol Lihat Status (Secondary) -->
                <a href="{{ route('student.status') }}"
                   class="flex-1 inline-flex items-center justify-center gap-2 bg-white border-2 border-slate-200 hover:border-blue-200 hover:bg-blue-50 text-slate-700 hover:text-blue-700 font-bold px-6 py-4 rounded-xl transition-all duration-300 shadow-sm hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Lihat Status
                </a>
            </div>
        </div>
    </div>
</div>

@endsection