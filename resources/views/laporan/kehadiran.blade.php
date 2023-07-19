@extends('template.main')

@section('judul')
LAPORAN Kehadiran
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Form Laporan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Laporan Kehadiran</h4>
                        <a class="btn btn-md btn-success mb-3" href="{{ route('lap/kehadiran/pdf') }}"><i class="fa fa-print"></i> Cetak PDF</a>
                        <table class="table table-bordered">
                            <tr>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>

                            </tr>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{ $dt->nis }}</td>
                                <td>{{ $dt->nm_siswa }}</td>
                                <td>{{ $dt->ket_presensi }}</td>
                                <td>{{ $jum}}</td>
                            </tr>
                            @endforeach
                        </table>
                        {{ $hal->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection