@extends('layouts.student')

@section('title', 'Visi & Misi Kandidat')

@section('content')

<div class="space-y-6">

    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-3xl p-8 text-white shadow-lg">
        <h1 class="text-3xl font-bold">Visi & Misi Pasangan Calon</h1>
        <p class="mt-2 text-indigo-100">Pelajari visi dan program kerja masing-masing calon Ketua & Wakil Ketua OSIS.</p>
    </div>

    <div class="space-y-8">
        @foreach($candidates as $candidate)
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 md:p-8">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-100 pb-6 mb-6 gap-4">
                <div class="flex items-center gap-4">
                    <span class="w-14 h-14 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-2xl font-black shadow-md">
                        #{{ $candidate->nomor_urut }}
                    </span>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ $candidate->ketua }} & {{ $candidate->wakil }}</h2>
                        <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full inline-block mt-1">
                            Pasangan Calon Nomor {{ $candidate->nomor_urut }}
                        </span>
                    </div>
                </div>

                <a href="{{ route('vote.index') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition shadow">
                    Berikan Suara
                </a>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Visi -->
                <div class="bg-blue-50/60 p-6 rounded-2xl border border-blue-100">
                    <div class="flex items-center gap-2 text-blue-700 font-extrabold text-lg mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        VISI
                    </div>
                    <p class="text-gray-800 leading-relaxed font-medium">
                        {{ $candidate->visi ?? 'Belum ada visi tercantum.' }}
                    </p>
                </div>

                <!-- Misi -->
                <div class="bg-purple-50/60 p-6 rounded-2xl border border-purple-100">
                    <div class="flex items-center gap-2 text-purple-700 font-extrabold text-lg mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01m-.01 4h.01"></path></svg>
                        MISI
                    </div>
                    <p class="text-gray-800 leading-relaxed whitespace-pre-line font-medium">
                        {{ $candidate->misi ?? 'Belum ada misi tercantum.' }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection
