@extends('template.main')

@section('judul')
LAPORAN PRESENSI
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Form Laporan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Laporan Presensi</h4>
                        <a class="btn btn-md btn-success btn-sm text-white mb-3" href="{{ route('presensi.pdf') }}"><i class="fa fa-print"></i> Cetak PDF</a>
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-lg-9 d-flex gap-1 mb-2">
                                    <input type="date" class="form-control" value="{{ @$_GET['tgl_dari'] }}" name="tgl_dari">
                                
                                    <input type="date" class="form-control" value="{{ @$_GET['tgl_sampai'] }}" name="tgl_sampai">
                                    <select name="kategori" id="" class="form-select">
                                        <option value="">--Keterangan--</option>
                                        @foreach ($keterangan as $item)
                                        <option {{ @$_GET['keterangan'] == $item->ket_presensi ? 'selected' : '' }} }} value="{{ $item->ket_presensi }}">{{ $item->ket_presensi }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-success text-white btn-sm"> Tampil </button>
                                    <a href="{{ route('laporan/presensi') }}" class="btn btn-warning text-white btn-sm"><i class="bi bi-arrow-clockwise"></i> Reset </a>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered">
                            <tr class="font-12">
                                <th style="width: 90px">NIS</th>
                                <th style="width: 90px">Nama Siswa</th>
                                <th style="width: 200px">Nama Mapel</th>
                                <th style="width: 200px">Kelas</th>
                                <th style="width: 200px">Pertemuan Ke</th>
                                <th style="width: 200px">Keterangan</th>
                                <th style="width: 200px" id="kehadiran" name="kehadiran" value="H">Hadir</th>
                                <th style="width: 200px" id="kehadiran" name="kehadiran" value="I">Izin</th>
                                <th style="width: 200px" id="kehadiran" name="kehadiran" value="S">Sakit</th>
                                <th style="width: 200px" id="kehadiran" name="kehadiran" value="A">Alpha</th>
                                <th style="width: 200px">Tanggal Presensi</th>
                            </tr>
                            @foreach ($presensi as $data)
                            <tr>
                                <td style="width: 25px">{{ $data->nis }}</td>
                                <td style="width: 25px">{{ $data->nm_siswa }}</td>
                                <td style="width: 25px">{{ $data->nm_mapel }}</td>
                                <td style="width: 25px">{{ $data->nm_kelas }}</td>
                                <td style="width: 25px">{{ $data->pertemuan_ke }}</td>
                                <td style="width: 25px">{{ $data->ket_presensi }}</td>

                                <td style="width: 25px">{{ $totalh }}</td>

                                <td style="width: 25px">{{ $totali }}</td>

                                <td style="width: 25px">{{ $totals }}</td>

                                <td style="width: 25px">{{ $totala }}</td>

                                <td style="width: 25px">{{ $data->tgl_absen }}</td>
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