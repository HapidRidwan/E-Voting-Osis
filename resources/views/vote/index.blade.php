@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    <div class="text-center mb-10">

        <h1 class="text-4xl font-bold text-gray-800">
            Pemilihan Ketua OSIS
        </h1>

        <p class="text-gray-500 mt-2">
            Silakan pilih satu pasangan calon Ketua dan Wakil Ketua OSIS.
        </p>

    </div>

    @if(session('error'))

        <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl">
            {{ session('error') }}
        </div>

    @endif

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

        @foreach($candidates as $candidate)

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

            <div class="bg-blue-600 text-white text-center py-4">

                <h2 class="text-3xl font-bold">

                    Nomor {{ $candidate->nomor_urut }}

                </h2>

            </div>

            <div class="p-6">

                <div class="grid grid-cols-2 gap-4 mb-6">

                    <div class="text-center">

                        @if($candidate->foto_ketua)

                            <img
                                src="{{ asset('storage/'.$candidate->foto_ketua) }}"
                                class="w-32 h-32 rounded-full object-cover mx-auto border-4 border-blue-500">

                        @else

                            <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center mx-auto">
                                Tidak Ada
                            </div>

                        @endif

                        <p class="mt-3 font-bold">

                            {{ $candidate->ketua }}

                        </p>

                        <small class="text-gray-500">
                            Ketua
                        </small>

                    </div>

                    <div class="text-center">

                        @if($candidate->foto_wakil)

                            <img
                                src="{{ asset('storage/'.$candidate->foto_wakil) }}"
                                class="w-32 h-32 rounded-full object-cover mx-auto border-4 border-green-500">

                        @else

                            <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center mx-auto">
                                Tidak Ada
                            </div>

                        @endif

                        <p class="mt-3 font-bold">

                            {{ $candidate->wakil }}

                        </p>

                        <small class="text-gray-500">
                            Wakil
                        </small>

                    </div>

                </div>

                <div class="mb-5">

                    <h3 class="font-bold text-blue-600 mb-2">
                        Visi
                    </h3>

                    <p class="text-gray-700 text-sm">
                        {{ $candidate->visi }}
                    </p>

                </div>

                <div class="mb-6">

                    <h3 class="font-bold text-blue-600 mb-2">
                        Misi
                    </h3>

                    <p class="text-gray-700 text-sm whitespace-pre-line">
                        {{ $candidate->misi }}
                    </p>

                </div>

                <form
                    action="{{ route('vote.store') }}"
                    method="POST">

                    @csrf

                    <input
                        type="hidden"
                        name="candidate_id"
                        value="{{ $candidate->id }}">

                    <button
                        onclick="return confirm('Yakin memilih pasangan nomor {{ $candidate->nomor_urut }}?')"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl">

                        Pilih Kandidat

                    </button>

                </form>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection