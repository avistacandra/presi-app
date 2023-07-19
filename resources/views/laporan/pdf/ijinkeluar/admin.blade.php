<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Ijin Keluar</title>
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
                <h1>Laporan Ijin Keluar<br>{{ Auth::user()->name }}</h1>
            </center>
            <hr>
            <table class="table" style="width: 100%">
                <thead>
                    <tr>
                        <th class="th">Nama Guru Piket</th>
                        <th class="th">NIS</th>
                        <th class="th">Nama Siswa</th>
                        <th class="th">Kelas</th>
                        <th class="th">Keterangan</th>
                        <th class="th">Alasan</th>
                        <th class="th">Tanggal Ijin</th>
                        <th class="th">Jam Ijin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $data)
                    <tr>
                        <td class="td">{{ $data->nm_gp }}</td>
                        <td class="td">{{ $data->nis }}</td>
                        <td class="td">{{ $data->nm_siswa }}</td>
                        <td class="td">{{ $data->nm_kelas }}</td>
                        <td class="td">{{ $data->ket }}</td>
                        <td class="td">{{ $data->alasan }}</td>
                        <td class="td">{{ $data->tgl_ijinkeluar }}</td>
                        <td class="td">{{ $data->ijin_jam }}</td>
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