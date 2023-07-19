<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Jadwal Belajar</title>
    <style>
        body {
            font-size: 12px;
            font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
        }

        .table,
        .td,
        .th,
        thead {
            border: 1px solid black;
            text-align: center
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .text-center {
            text-align: center;
        }

        .text-success {
            color: green
        }

        .text-danger {
            color: red
        }

        .fw-bold {
            font-weight: bold
        }

        .tandatangan {

            text-align: center;
            margin-left: 545px;

        }

        @media print {

            body {

                font-size: 11px;

            }

            .tandatangan {

                text-align: center;
                margin-left: 345px;

            }



        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <center>
                <h1>Laporan Jadwal Belajar<br>{{ Auth::user()->nama }}</h1>
                <h2>SMP NEGERI 2 TEMPEL</h2>
            </center>
            <hr>
            <table class="table" style="width: 100%">
                <thead>
                    <tr>
                        <th class="th">Nama Guru</th>
                        <th class="th">Mata Pelajaran</th>
                        <th class="th">Kelas</th>
                        <th class="th">Hari</th>
                        <th class="th">Jam</th>
                        <th class="th">Semester</th>
                        <th class="th">Tahun Ajaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $data)
                    <tr>
                        <td class="td">{{ $data->nm_guru }}</td>
                        <td class="td">{{ $data->nm_mapel }}</td>
                        <td class="td">{{ $data->nm_kelas }}</td>
                        <td class="td">{{ $data->hari }}</td>
                        <td class="td">{{ $data->jam_belajar }}</td>
                        <td class="td">{{ $data->semester }}</td>
                        <td class="td">{{ $data->thn_ajaran }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="tandatangan">

                <br />

                <p>Diketahui</p>

                </br width="100px">

                <p>Admin</p>

            </div>
        </div>
    </div>
</body>

</html>