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

        <h2 class="text-2xl font-bold mb-5">

            Kandidat Ketua OSIS

        </h2>

        <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6">

            @foreach($candidates as $candidate)

            <div class="bg-white rounded-3xl shadow overflow-hidden hover:shadow-xl transition">

                <img
                    src="{{ asset('storage/'.$candidate->foto) }}"
                    class="w-full h-72 object-cover">

                <div class="p-5">

                    <span class="text-sm text-blue-600 font-semibold">

                        Nomor {{ $candidate->nomor_urut }}

                    </span>

                    <h3 class="text-xl font-bold mt-2">

                        {{ $candidate->nama }}

                    </h3>

                    <a href="{{ route('student.candidates') }}"
                       class="mt-5 inline-block w-full text-center bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700">

                        Lihat Detail

                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

@endsection