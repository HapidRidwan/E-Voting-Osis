<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>Data Akun Siswa</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
            color:#333;
        }

        h2{
            margin:0;
            text-align:center;
        }

        h4{
            margin:5px 0 20px;
            text-align:center;
            font-weight:normal;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        th,
        td{
            border:1px solid #000;
            padding:8px;
            text-align:left;
        }

        th{
            background:#e5e7eb;
            text-align:center;
        }

        .center{
            text-align:center;
        }

        .footer{
            margin-top:30px;
            font-size:11px;
            color:#555;
        }

    </style>

</head>

<body>

    <h2>
        DATA AKUN LOGIN E-VOTING OSIS
    </h2>

    <h4>
        SMK Informatika Sumedang
    </h4>

    <table>

        <thead>

            <tr>

                <th width="5%">No</th>

                <th width="12%">NIS</th>

                <th>Nama</th>

                <th width="15%">Kelas</th>

                <th width="15%">Username</th>

                <th width="18%">Password</th>

            </tr>

        </thead>

        <tbody>

        @foreach($students as $student)

            <tr>

                <td class="center">
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $student->nis }}
                </td>

                <td>
                    {{ $student->nama }}
                </td>

                <td>
                    {{ $student->kelas }}
                </td>

                <td>
                    {{ $student->username }}
                </td>

                <td>
                    evote{{ $student->nis }}
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    <div class="footer">

        Dicetak pada :
        {{ now()->format('d-m-Y H:i') }}

    </div>

</body>

</html>