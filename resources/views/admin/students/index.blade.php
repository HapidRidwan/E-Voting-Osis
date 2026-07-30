@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Data Siswa
            </h1>

            <p class="text-gray-500 mt-1">
                Kelola akun siswa untuk login ke sistem E-Voting.
            </p>
        </div>

        <div class="flex gap-3">

            <a href="{{ route('students.export.pdf') }}"
                class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-xl shadow font-semibold">

                Export PDF

            </a>

            <a href="{{ route('students.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow font-semibold">

                + Tambah Siswa

            </a>

        </div>
        

    </div>

    <!-- Search -->
    <div class="bg-white rounded-2xl shadow p-5">

        <form method="GET">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama, NIS atau kelas..."
                class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 px-4 py-3">

        </form>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-gray-700">

                <tr>
                    <th class="px-6 py-4 text-left">No</th>
                    <th class="px-6 py-4 text-left">NIS</th>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Kelas</th>
                    <th class="px-6 py-4 text-left">Username</th>
                    <th class="px-6 py-4 text-left">Password</th>
                    <th class="px-6 py-4 text-center">Status</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>

                </thead>
                <tbody class="divide-y">

                @forelse($students as $student)

                    <tr class="hover:bg-gray-50">

                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $student->nis }}
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $student->nama }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $student->kelas }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $student->username }}
                        </td>

                        <td class="px-6 py-4">
                            evote{{ $student->nis }}
                        </td>
                        <td class="px-6 py-4 text-center">

                            @if($student->has_voted)

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Sudah Memilih
                                </span>

                            @else

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Belum Memilih
                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('students.edit', $student->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                                    Edit

                                </a>

                                <form action="{{ route('students.destroy', $student->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus siswa ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-10 text-gray-500">

                            Belum ada data siswa.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection