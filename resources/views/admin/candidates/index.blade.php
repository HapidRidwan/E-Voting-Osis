@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Data Kandidat
            </h1>

            <p class="text-gray-500 mt-1">
                Kelola pasangan calon Ketua dan Wakil OSIS.
            </p>
        </div>

        <a href="{{ route('candidates.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow font-semibold">

            + Tambah Kandidat

        </a>

    </div>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="px-6 py-4">No</th>

                        <th class="px-6 py-4 text-center">
                            Foto Ketua
                        </th>

                        <th class="px-6 py-4 text-center">
                            Foto Wakil
                        </th>

                        <th class="px-6 py-4 text-center">
                            Nomor
                        </th>

                        <th class="px-6 py-4">
                            Ketua
                        </th>

                        <th class="px-6 py-4">
                            Wakil
                        </th>

                        <th class="px-6 py-4 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y">

                @forelse($candidates as $candidate)

                    <tr class="hover:bg-gray-50">

                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>

                        {{-- Foto Ketua --}}
                        <td class="px-6 py-4 text-center">

                            @if($candidate->foto_ketua)

                                <img
                                    src="{{ asset('storage/'.$candidate->foto_ketua) }}"
                                    class="w-20 h-20 rounded-lg object-cover mx-auto border">

                            @else

                                <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center mx-auto text-xs text-gray-500">
                                    Tidak Ada
                                </div>

                            @endif

                        </td>

                        {{-- Foto Wakil --}}
                        <td class="px-6 py-4 text-center">

                            @if($candidate->foto_wakil)

                                <img
                                    src="{{ asset('storage/'.$candidate->foto_wakil) }}"
                                    class="w-20 h-20 rounded-lg object-cover mx-auto border">

                            @else

                                <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center mx-auto text-xs text-gray-500">
                                    Tidak Ada
                                </div>

                            @endif

                        </td>

                        <td class="px-6 py-4 text-center">

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-bold">

                                {{ $candidate->nomor_urut }}

                            </span>

                        </td>

                        <td class="px-6 py-4 font-semibold">

                            {{ $candidate->ketua }}

                        </td>

                        <td class="px-6 py-4">

                            {{ $candidate->wakil }}

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('candidates.edit',$candidate->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('candidates.destroy',$candidate->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kandidat ini?')">

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

                        <td colspan="7" class="py-10 text-center text-gray-500">

                            Belum ada data kandidat.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection