@extends('layouts.student')

@section('title', 'Voting Berhasil')

@section('content')

<div class="flex items-center justify-center py-16">

    <div class="bg-white rounded-3xl shadow-xl p-10 md:p-14 text-center max-w-lg border border-gray-100 space-y-6">

        <div class="w-20 h-20 mx-auto rounded-full bg-green-100 flex items-center justify-center text-5xl shadow-inner">
            ✅
        </div>

        <div>
            <h1 class="text-3xl font-extrabold text-green-600">
                Terima Kasih!
            </h1>

            <p class="mt-3 text-gray-600 leading-relaxed">
                Suara Anda telah <strong class="text-gray-800">berhasil direkam</strong> dalam sistem E-Voting.
                <br>
                Anda tidak dapat melakukan voting kembali.
            </p>
        </div>

        <div class="bg-green-50 border border-green-200 rounded-2xl p-4 text-sm text-green-800">
            <span class="font-bold">🔒 Kerahasiaan Terjamin</span>
            <p class="text-xs text-green-700 mt-1">Pilihan suara Anda bersifat rahasia dan telah terenkripsi oleh sistem.</p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 pt-2">
            <a href="{{ route('student.dashboard') }}"
               class="flex-1 inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl shadow-md transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Kembali ke Dashboard
            </a>
            <a href="{{ route('student.status') }}"
               class="flex-1 inline-flex items-center justify-center gap-2 border-2 border-gray-200 hover:bg-gray-50 text-gray-700 font-semibold px-6 py-3 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                Lihat Status
            </a>
        </div>

    </div>

</div>

@endsection