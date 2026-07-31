@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-3xl font-bold text-gray-800">
                Dashboard
            </h1>

            <p class="text-gray-500 mt-1">
                Selamat Datang di Sistem E-Voting Ketua OSIS
            </p>

        </div>

        <div class="bg-white rounded-xl shadow p-4">

            @if($setting && $setting->voting_open)
                <span class="text-green-600 font-bold">DIBUKA</span>
            @else
                <span class="text-red-600 font-bold">DITUTUP</span>
            @endif

            <form action="{{ route('setting.toggle') }}" method="POST" class="mt-3">
                @csrf

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Ubah Status
                </button>
            </form>

        </div>

    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex justify-between">
                <div>
                    <p class="text-gray-500">Total Siswa</p>
                    <h2 class="text-4xl font-bold mt-2">{{ $totalStudents }}</h2>
                    <span class="text-gray-500 text-sm">Total Pemilih</span>
                </div>

                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex justify-between">
                <div>
                    <p class="text-gray-500">Kandidat</p>
                    <h2 class="text-4xl font-bold mt-2">{{ $totalCandidates }}</h2>
                    <span class="text-gray-400 text-sm">Pasangan Calon</span>
                </div>

                <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex justify-between">
                <div>
                    <p class="text-gray-500">Sudah Memilih</p>
                    <h2 class="text-4xl font-bold text-green-600 mt-2">
                        {{ $totalVotes }}
                    </h2>

                    <span class="text-green-500 text-sm">
                        {{ $persentaseVote }}%
                    </span>
                </div>

                <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center text-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope-paper" viewBox="0 0 16 16">
                    <path d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267zm13 .566v5.734l-4.778-2.867zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083zM1 13.116V7.383l4.778 2.867L1 13.117Z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex justify-between">
                <div>
                    <p class="text-gray-500">Belum Memilih</p>
                    <h2 class="text-4xl font-bold text-red-500 mt-2">
                        {{ $belumVote }}
                    </h2>

                    <span class="text-red-400 text-sm">
                        {{ 100-$persentaseVote }}%
                    </span>
                </div>

                <div class="w-14 h-14 rounded-xl bg-red-100 flex items-center justify-center text-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                    <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    <div class="grid lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">

        <div class="flex justify-between items-center mb-6">

            <div>

                <h2 class="text-xl font-bold">
                    Progress Voting
                </h2>

                <p class="text-gray-500">
                    Perkembangan jumlah pemilih
                </p>

            </div>

        </div>

        <div id="voteChart" class="h-80"></div>

    </div>

    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="font-bold text-xl mb-5">
            Persentase Voting
        </h2>

        <div id="pieChart"></div>

    </div>

</div>
    {{-- Ranking + Aktivitas --}}
    <div class="grid lg:grid-cols-2 gap-6">

        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="font-bold text-xl mb-6">
                Ranking Kandidat
            </h2>

            <table class="w-full">

                <thead>

                    <tr class="text-left border-b">

                        <th class="py-3">No</th>
                        <th>Paslon</th>
                        <th>Suara</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($ranking as $index => $item)

                <tr class="border-b">

                    <td class="py-4">
                        {{ $index + 1 }}
                    </td>

                    <td>
                        {{ $item->ketua }} & {{ $item->wakil }}
                    </td>

                    <td class="font-bold text-blue-600">
                        {{ $item->votes_count }}
                    </td>

                </tr>

                @endforeach

                </tbody>
            </table>

        </div>
        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="font-bold text-xl mb-6">
                Hasil Suara Kandidat
            </h2>

            <div id="candidateChart"></div>

        </div>

    </div>

</div>

@push('scripts')

<script>

document.addEventListener("DOMContentLoaded", function(){

    var options = {

        chart:{
            type:'area',
            height:320,
            toolbar:{
                show:false
            },
            zoom:{
                enabled:false
            }
        },

        series:[{

            name:'Jumlah Voting',

            data:[{{ $totalVotes }}]
        }],

        colors:['#2563eb'],

        stroke:{
            curve:'smooth',
            width:4
        },

        fill:{
            opacity:.2
        },

        grid:{
            borderColor:'#e5e7eb'
        },

        xaxis:{
            categories:[
                '08.00',
                '09.00',
                '10.00',
                '11.00',
                '12.00',
                '13.00',
                '14.00',
                '15.00'
            ]
        }

    };

    new ApexCharts(
        document.querySelector("#voteChart"),
        options
    ).render();





    var pie = {

        chart:{
            type:'radialBar',
            height:300
        },

        series:[{{ $persentaseVote }}],
        colors:['#2563eb'],

        plotOptions:{

            radialBar:{

                hollow:{
                    size:'65%'
                },

                dataLabels:{

                    value:{
                        fontSize:'36px'
                    }

                }

            }

        },
        

        labels:['Voting']

    };

        new ApexCharts(
            document.querySelector("#pieChart"),
            pie
        ).render();

        var kandidat = {

        chart:{
            type:'bar',
            height:350
        },

        series:[{

            name:'Suara',

            data:[
                @foreach($ranking as $item)
                    {{ $item->votes_count }},
                @endforeach
            ]

        }],

        xaxis:{
            categories:[
                @foreach($ranking as $item)
                    "No {{ $item->nomor_urut }}",
                @endforeach
            ]
        }

    };

    new ApexCharts(
        document.querySelector("#candidateChart"),
        kandidat
    ).render();

});

</script>

@endpush

@endsection