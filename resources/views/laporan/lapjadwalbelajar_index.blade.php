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
                        <a class="btn btn-md btn-success mb-3" href="{{ url('cetakbelajar') }}"><i class="fa fa-print"></i> Cetak PDF</a>
                        <table class="table table-bordered">
                            <tr class="font-12">
                                <th style="width: 90px">Nama Guru</th>
                                <th style="width: 90px">Mata Pelajaran</th>
                                <th style="width: 200px">Kelas</th>
                                <th style="width: 200px">Semester</th>
                                <th style="width: 200px">Tahun Ajaran</th>
                            </tr>
                            @foreach ($jadwal as $data)
                            <tr>
                                <td style="width: 25px">{{ $data->nm_guru }}</td>
                                <td style="width: 25px">{{ $data->nm_mapel }}</td>
                                <td style="width: 25px">{{ $data->nm_kelas }}</td>
                                <td style="width: 25px">{{ $data->nm_semester }}</td>
                                <td style="width: 25px">{{ $data->thn_ajaran }}</td>
                            </tr>

                            @endforeach
                        </table>
                        <div class="row text-center">
                            {!! $jadwal->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection