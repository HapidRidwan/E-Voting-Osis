@extends('layouts.student')

@section('title','Dashboard')

@section('content')

<div class="space-y-6">

    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-8 text-white shadow-lg">

        <h1 class="text-3xl font-bold">
            Halo, {{ Auth::user()->name }} 👋
        </h1>

        <p class="mt-2 text-blue-100">
            Selamat datang di Sistem E-Voting Ketua OSIS
        </p>

        <span class="inline-block mt-4 px-4 py-2 rounded-full bg-white/20">
            {{ Auth::user()->kelas }}
        </span>

    </div>

    <div class="grid lg:grid-cols-2 gap-6">

        <div class="bg-white rounded-3xl shadow p-6">

            <h2 class="text-xl font-bold mb-4">
                Status Voting
            </h2>

            @if($setting && $setting->voting_open)

                <div class="bg-green-100 text-green-700 rounded-xl p-4">

                    <h3 class="font-bold">
                        Voting Sedang Dibuka
                    </h3>

                    <p class="mt-2">
                        Silakan pilih kandidat terbaik menurutmu.
                    </p>

                </div>

            @else

                <div class="bg-red-100 text-red-700 rounded-xl p-4">

                    <h3 class="font-bold">
                        Voting Ditutup
                    </h3>

                    <p class="mt-2">
                        Saat ini pemungutan suara belum tersedia.
                    </p>

                </div>

            @endif

        </div>

        <div class="bg-white rounded-3xl shadow p-6">

            <h2 class="text-xl font-bold mb-4">
                Status Suara
            </h2>

            @if($sudahVote)

                <div class="bg-blue-100 text-blue-700 rounded-xl p-4">

                    <h3 class="font-bold">
                        Kamu Sudah Memilih
                    </h3>

                    <p class="mt-2">
                        Terima kasih telah menggunakan hak suaramu.
                    </p>

                </div>

            @else

                <div class="bg-yellow-100 text-yellow-700 rounded-xl p-4">

                    <h3 class="font-bold">
                        Kamu Belum Memilih
                    </h3>

                    <p class="mt-2 mb-4">
                        Jangan lupa memberikan suaramu.
                    </p>

                    @if($setting && $setting->voting_open)

                    <a href="{{ route('vote.index') }}"
                       class="inline-flex px-5 py-3 rounded-xl bg-blue-600 text-white hover:bg-blue-700">

                        Mulai Voting

                    </a>

                    @endif

                </div>

            @endif

        </div>

    </div>

    <div>

        <h2 class="text-2xl font-bold mb-5 text-gray-800">
            Kandidat Ketua & Wakil Ketua OSIS
        </h2>

        <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6">

            @foreach($candidates as $candidate)

            <div class="bg-white rounded-3xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col">

                <!-- Auto-sliding Photo Carousel -->
                <div x-data="{ activeSlide: 0, timer: null }"
                     x-init="timer = setInterval(() => { activeSlide = activeSlide === 0 ? 1 : 0 }, 3500)"
                     @mouseenter="clearInterval(timer)"
                     @mouseleave="timer = setInterval(() => { activeSlide = activeSlide === 0 ? 1 : 0 }, 3500)"
                     class="relative w-full h-72 overflow-hidden bg-gray-100 group">

                    <!-- Slide 1: Foto Ketua -->
                    <div x-show="activeSlide === 0"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute inset-0">
                        @if($candidate->foto_ketua)
                            <img src="{{ asset('storage/'.$candidate->foto_ketua) }}" alt="Foto Ketua" class="w-full h-72 object-cover">
                        @else
                            <div class="w-full h-72 bg-gradient-to-br from-blue-600 to-indigo-700 flex flex-col items-center justify-center text-white">
                                <svg class="w-16 h-16 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span class="mt-2 text-xs font-medium tracking-wide">Foto Ketua Belum Ada</span>
                            </div>
                        @endif
                        <div class="absolute bottom-3 left-3 bg-blue-600/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-md flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                            Ketua: {{ $candidate->ketua }}
                        </div>
                    </div>

                    <!-- Slide 2: Foto Wakil -->
                    <div x-show="activeSlide === 1"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute inset-0"
                         style="display: none;">
                        @if($candidate->foto_wakil)
                            <img src="{{ asset('storage/'.$candidate->foto_wakil) }}" alt="Foto Wakil" class="w-full h-72 object-cover">
                        @else
                            <div class="w-full h-72 bg-gradient-to-br from-indigo-600 to-purple-700 flex flex-col items-center justify-center text-white">
                                <svg class="w-16 h-16 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span class="mt-2 text-xs font-medium tracking-wide">Foto Wakil Belum Ada</span>
                            </div>
                        @endif
                        <div class="absolute bottom-3 left-3 bg-indigo-600/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-md flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-yellow-400 animate-pulse"></span>
                            Wakil: {{ $candidate->wakil }}
                        </div>
                    </div>

                    <!-- Badge Nomor Urut -->
                    <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md text-gray-900 font-extrabold px-3 py-1 rounded-2xl text-xs shadow-md border border-white/50">
                        Paslon #{{ $candidate->nomor_urut }}
                    </div>

                    <!-- Navigation Indicators -->
                    <div class="absolute bottom-3 right-3 flex space-x-1.5 z-10 bg-black/30 backdrop-blur-sm px-2.5 py-1 rounded-full">
                        <button @click="activeSlide = 0"
                                :class="activeSlide === 0 ? 'bg-white w-4' : 'bg-white/50 w-2'"
                                class="h-2 rounded-full transition-all duration-300"
                                title="Foto Ketua"></button>
                        <button @click="activeSlide = 1"
                                :class="activeSlide === 1 ? 'bg-white w-4' : 'bg-white/50 w-2'"
                                class="h-2 rounded-full transition-all duration-300"
                                title="Foto Wakil"></button>
                    </div>

                    <!-- Left / Right Manual Arrows -->
                    <button @click="activeSlide = activeSlide === 0 ? 1 : 0" class="absolute left-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-black/30 hover:bg-black/60 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button @click="activeSlide = activeSlide === 0 ? 1 : 0" class="absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-black/30 hover:bg-black/60 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                </div>

                <!-- Detail Content -->
                <div class="p-5 flex-1 flex flex-col justify-between">

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold uppercase tracking-wider text-blue-600 bg-blue-50 px-2.5 py-1 rounded-lg">
                                Paslon Nomor {{ $candidate->nomor_urut }}
                            </span>
                        </div>

                        <h3 class="text-lg font-bold text-gray-900">
                            {{ $candidate->ketua }}
                        </h3>
                        <p class="text-sm text-gray-600 flex items-center gap-1 mt-0.5">
                            <span class="text-xs text-gray-400">Wakil:</span>
                            <span class="font-medium text-gray-700">{{ $candidate->wakil }}</span>
                        </p>

                        @if($candidate->visi)
                            <div class="mt-3 text-xs text-gray-500 line-clamp-2 bg-gray-50 p-2.5 rounded-xl border border-gray-100">
                                <span class="font-semibold text-gray-700">Visi:</span> {{ $candidate->visi }}
                            </div>
                        @endif
                    </div>

                    <a href="{{ route('student.candidates') }}"
                       class="mt-5 inline-flex items-center justify-center w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-xl transition duration-200 shadow-sm gap-2 text-sm">
                        <span>Lihat Detail Kandidat</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

@endsection