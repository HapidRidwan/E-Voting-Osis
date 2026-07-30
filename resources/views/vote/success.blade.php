@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-3xl shadow-xl p-12 text-center max-w-lg">

        <div class="text-6xl mb-5">

            ✅

        </div>

        <h1 class="text-3xl font-bold text-green-600">

            Terima Kasih

        </h1>

        <p class="mt-4 text-gray-600">

            Suara Anda telah berhasil direkam.

            <br>

            Anda tidak dapat melakukan voting kembali.

        </p>

        <a
            href="/dashboard"
            class="inline-block mt-8 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl">

            Kembali

        </a>

    </div>

</div>

@endsection