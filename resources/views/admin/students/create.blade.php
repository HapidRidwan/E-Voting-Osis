@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-2xl shadow p-8">

        <h1 class="text-3xl font-bold mb-6">
            Tambah Data Siswa
        </h1>

        <form action="{{ route('students.store') }}" method="POST">

            @csrf

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <label class="block mb-2 font-medium">
                        NIS
                    </label>

                    <input
                        type="text"
                        name="nis"
                        class="w-full border rounded-xl p-3"
                        required>
                </div>

                <div>
                    <label class="block mb-2 font-medium">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="w-full border rounded-xl p-3"
                        required>
                </div>

                <div>
                    <label class="block mb-2 font-medium">
                        Kelas
                    </label>

                    <input
                        type="text"
                        name="kelas"
                        class="w-full border rounded-xl p-3"
                        required>
                </div>

                <div>
                    <label class="block mb-2 font-medium">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        class="w-full border rounded-xl p-3"
                        required>
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-2 font-medium">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded-xl p-3"
                        required>
                </div>

            </div>

            <div class="flex justify-end gap-3 mt-8">

                <a href="{{ route('students.index') }}"
                    class="px-6 py-3 bg-gray-300 rounded-xl">

                    Batal

                </a>

                <button
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection