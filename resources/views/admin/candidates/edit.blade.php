@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-2xl shadow">

        <div class="px-8 py-6 border-b">

            <h1 class="text-3xl font-bold text-gray-800">
                Edit Kandidat
            </h1>

            <p class="text-gray-500 mt-1">
                Ubah data pasangan calon Ketua dan Wakil OSIS.
            </p>

        </div>

        <form
            action="{{ route('candidates.update', $candidate->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="p-8 space-y-6">

            @csrf
            @method('PUT')

            <!-- Nomor Urut -->
            <div>

                <label class="block font-semibold mb-2">
                    Nomor Urut
                </label>

                <input
                    type="number"
                    name="nomor_urut"
                    value="{{ old('nomor_urut', $candidate->nomor_urut) }}"
                    class="w-full rounded-xl border-gray-300">

            </div>

            <!-- Ketua -->
            <div>

                <label class="block font-semibold mb-2">
                    Nama Ketua
                </label>

                <input
                    type="text"
                    name="ketua"
                    value="{{ old('ketua', $candidate->ketua) }}"
                    class="w-full rounded-xl border-gray-300">

            </div>

            <!-- Wakil -->
            <div>

                <label class="block font-semibold mb-2">
                    Nama Wakil
                </label>

                <input
                    type="text"
                    name="wakil"
                    value="{{ old('wakil', $candidate->wakil) }}"
                    class="w-full rounded-xl border-gray-300">

            </div>

            <!-- Foto Ketua -->
            <div>

                <label class="block font-semibold mb-2">
                    Foto Ketua
                </label>

                @if($candidate->foto_ketua)

                    <img
                        src="{{ asset('storage/'.$candidate->foto_ketua) }}"
                        class="w-36 h-36 object-cover rounded-xl border mb-3">

                @endif

                <input
                    type="file"
                    name="foto_ketua"
                    accept="image/*"
                    class="w-full rounded-xl border-gray-300">

                <small class="text-gray-500">
                    Kosongkan jika tidak ingin mengganti foto.
                </small>

            </div>

            <!-- Foto Wakil -->
            <div>

                <label class="block font-semibold mb-2">
                    Foto Wakil
                </label>

                @if($candidate->foto_wakil)

                    <img
                        src="{{ asset('storage/'.$candidate->foto_wakil) }}"
                        class="w-36 h-36 object-cover rounded-xl border mb-3">

                @endif

                <input
                    type="file"
                    name="foto_wakil"
                    accept="image/*"
                    class="w-full rounded-xl border-gray-300">

                <small class="text-gray-500">
                    Kosongkan jika tidak ingin mengganti foto.
                </small>

            </div>

            <!-- Visi -->
            <div>

                <label class="block font-semibold mb-2">
                    Visi
                </label>

                <textarea
                    name="visi"
                    rows="5"
                    class="w-full rounded-xl border-gray-300">{{ old('visi', $candidate->visi) }}</textarea>

            </div>

            <!-- Misi -->
            <div>

                <label class="block font-semibold mb-2">
                    Misi
                </label>

                <textarea
                    name="misi"
                    rows="6"
                    class="w-full rounded-xl border-gray-300">{{ old('misi', $candidate->misi) }}</textarea>

            </div>

            <div class="flex justify-end gap-3">

                <a
                    href="{{ route('candidates.index') }}"
                    class="px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400">

                    Batal

                </a>

                <button
                    type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white">

                    Update Kandidat

                </button>

            </div>

        </form>

    </div>

</div>

@endsection