@extends('template.main')

@section('judul')
LAPORAN IJIN Masuk
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Form Laporan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Laporan Ijin Masuk</h4>
                        <a class="btn btn-md btn-success mb-3" href="{{ route('lap/ijin/masuk/pdf') }}"><i class="fa fa-print"></i> Cetak PDF</a>
                        <table class="table table-bordered">
                            <tr class="font-12">
                                <th style="width: 90px">Nama Guru Piket</th>
                                <th style="width: 90px">Nis</th>
                                <th style="width: 200px">Nama Siswa</th>
                                <th style="width: 200px">Kelas</th>
                                <th style="width: 200px">Keterangan</th>
                                <th style="width: 200px">Alasan</th>
                                <th style="width: 200px">Tanggal Ijin</th>
                                <th style="width: 200px">Jam Masuk</th>
                            </tr>
                            @foreach ($admin as $data)
                            <tr>
                                <td style="width: 25px">{{ $data->nm_gp }}</td>
                                <td style="width: 25px">{{ $data->nis }}</td>
                                <td style="width: 25px">{{ $data->nm_siswa }}</td>
                                <td style="width: 25px">{{ $data->nm_kelas }}</td>
                                <td style="width: 25px">{{ $data->ket }}</td>
                                <td style="width: 25px">{{ $data->alasan }}</td>
                                <td style="width: 25px">{{ $data->tgl_ijinmasuk }}</td>
                                <td style="width: 25px">{{ $data->jam_masuk }}</td>
                            </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection