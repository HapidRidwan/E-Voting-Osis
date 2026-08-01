@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-2xl shadow p-8">

        <h1 class="text-3xl font-bold mb-2">
            Edit Data Siswa
        </h1>

        <p class="text-gray-500 mb-8">
            Perbarui data akun siswa.
        </p>

        <form action="{{ route('students.update', $student->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-6">

                {{-- NIS --}}
                <div>

                    <label class="block mb-2 font-medium">
                        NIS
                    </label>

                    <input
                        type="text"
                        name="nis"
                        value="{{ old('nis', $student->nis) }}"
                        class="w-full border rounded-xl px-4 py-3 focus:ring-blue-500 focus:border-blue-500">

                </div>

                {{-- Nama --}}
                <div>

                    <label class="block mb-2 font-medium">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama', $student->name) }}"
                        class="w-full border rounded-xl px-4 py-3 focus:ring-blue-500 focus:border-blue-500">

                </div>

                {{-- Kelas --}}
                <div>

                    <label class="block mb-2 font-medium">
                        Kelas
                    </label>

                    <input
                        type="text"
                        name="kelas"
                        value="{{ old('kelas', $student->kelas) }}"
                        class="w-full border rounded-xl px-4 py-3 focus:ring-blue-500 focus:border-blue-500">

                </div>

                {{-- Username --}}
                <div>

                    <label class="block mb-2 font-medium">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        value="{{ old('username', $student->username) }}"
                        class="w-full border rounded-xl px-4 py-3 focus:ring-blue-500 focus:border-blue-500">

                </div>

                {{-- Password --}}
                <div class="md:col-span-2">

                    <label class="block mb-2 font-medium">
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded-xl px-4 py-3 focus:ring-blue-500 focus:border-blue-500">

                    <p class="text-sm text-gray-500 mt-2">
                        Kosongkan jika password tidak ingin diubah.
                    </p>

                </div>

            </div>

            <div class="flex justify-end gap-3 mt-8">

                <a href="{{ route('students.index') }}"
                    class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300">

                    Batal

                </a>

                <button
                    class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white">

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection