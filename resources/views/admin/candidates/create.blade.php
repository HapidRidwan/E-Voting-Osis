@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-2xl shadow">

        <div class="px-8 py-6 border-b">

            <h1 class="text-3xl font-bold text-gray-800">
                Tambah Kandidat
            </h1>

            <p class="text-gray-500 mt-1">
                Tambahkan pasangan calon Ketua dan Wakil OSIS.
            </p>

        </div>

        <form
            action="{{ route('candidates.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="p-8 space-y-6">

            @csrf

            {{-- Nomor Urut --}}
            <div>

                <label class="block font-semibold mb-2">
                    Nomor Urut
                </label>

                <input
                    type="number"
                    name="nomor_urut"
                    value="{{ old('nomor_urut') }}"
                    class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                @error('nomor_urut')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Ketua --}}
            <div>

                <label class="block font-semibold mb-2">
                    Nama Ketua
                </label>

                <input
                    type="text"
                    name="ketua"
                    value="{{ old('ketua') }}"
                    class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                @error('ketua')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Wakil --}}
            <div>

                <label class="block font-semibold mb-2">
                    Nama Wakil
                </label>

                <input
                    type="text"
                    name="wakil"
                    value="{{ old('wakil') }}"
                    class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                @error('wakil')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Foto Ketua --}}
            <div>

                <label class="block font-semibold mb-2">
                    Foto Ketua
                </label>

                <input
                    type="file"
                    name="foto_ketua"
                    accept="image/*"
                    class="w-full rounded-xl border-gray-300">

                @error('foto_ketua')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Foto Wakil --}}
            <div>

                <label class="block font-semibold mb-2">
                    Foto Wakil
                </label>

                <input
                    type="file"
                    name="foto_wakil"
                    accept="image/*"
                    class="w-full rounded-xl border-gray-300">

                @error('foto_wakil')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Visi --}}
            <div>

                <label class="block font-semibold mb-2">
                    Visi
                </label>

                <textarea
                    name="visi"
                    rows="4"
                    class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('visi') }}</textarea>

                @error('visi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Misi --}}
            <div>

                <label class="block font-semibold mb-2">
                    Misi
                </label>

                <textarea
                    name="misi"
                    rows="6"
                    class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('misi') }}</textarea>

                @error('misi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3">

                <a
                    href="{{ route('candidates.index') }}"
                    class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300">

                    Batal

                </a>

                <button
                    type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold">

                    Simpan Kandidat

                </button>

            </div>

        </form>

    </div>

</div>

@endsection