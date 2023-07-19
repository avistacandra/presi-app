@extends('template.main')

@section('judul')
LAPORAN JADWAL BELAJAR
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Form Laporan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Laporan Jadwal Belajar</h4>
                        <a class="btn btn-md btn-success mb-3" href="{{ route('jadwalbelajar.pdf') }}"><i class="fa fa-print"></i> Cetak PDF</a>
                        <table class="table table-bordered">
                            <tr class="font-12">
                                <th style="width: 90px">Nama Guru</th>
                                <th style="width: 90px">Mata Pelajaran</th>
                                <th style="width: 200px">Kelas</th>
                                <th style="width: 200px">Hari</th>
                                <th style="width: 200px">Jam Belajar</th>
                                <th style="width: 200px">Semester</th>
                                <th style="width: 200px">Tahun Ajaran</th>
                            </tr>
                            @foreach ($admin as $data)
                            <tr>
                                <td style="width: 25px">{{ $data->nm_guru }}</td>
                                <td style="width: 25px">{{ $data->nm_mapel }}</td>
                                <td style="width: 25px">{{ $data->nm_kelas }}</td>
                                <td style="width: 25px">{{ $data->hari }}</td>
                                <td style="width: 25px">{{ $data->jam_belajar }}</td>
                                <td style="width: 25px">{{ $data->semester }}</td>
                                <td style="width: 25px">{{ $data->thn_ajaran }}</td>
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