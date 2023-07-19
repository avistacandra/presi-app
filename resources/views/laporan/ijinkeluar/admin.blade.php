@extends('template.main')

@section('judul')
LAPORAN IJIN KELUAR
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Form Laporan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Laporan Ijin Keluar</h4>
                        <a class="btn btn-md btn-success mb-3 btn-sm" href="{{ route('lap/ijin/keluar/pdf') }}"><i class="fa fa-print"></i> Cetak PDF</a>
                        <table class="table table-bordered">
                            <tr class="font-12">
                                <th style="width: 90px">Nama Guru Piket</th>
                                <th style="width: 90px">Nis</th>
                                <th style="width: 200px">Nama Siswa</th>
                                <th style="width: 200px">Kelas</th>
                                <th style="width: 200px">Keterangan</th>
                                <th style="width: 200px">Alasan</th>
                                <th style="width: 200px">Tanggal Ijin</th>
                                <th style="width: 200px">Jam Ijin</th>
                            </tr>
                            @foreach ($admin as $data)
                            <tr>
                                <td style="width: 25px">{{ $data->nm_gp }}</td>
                                <td style="width: 25px">{{ $data->nis }}</td>
                                <td style="width: 25px">{{ $data->nm_siswa }}</td>
                                <td style="width: 25px">{{ $data->nm_kelas }}</td>
                                <td style="width: 25px">{{ $data->ket }}</td>
                                <td style="width: 25px">{{ $data->alasan }}</td>
                                <td style="width: 25px">{{ $data->tgl_ijinkeluar }}</td>
                                <td style="width: 25px">{{ $data->ijin_jam }}</td>
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