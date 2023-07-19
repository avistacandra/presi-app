@extends('template.main')

@section('judul')
DATA PRESENSI HARIAN
@endsection

@section('isi')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Detail Presensi Ijin Keluar</h4>
                <p class="card-description"></p>
                <div class="pull-right">
                    <a href="#" class="btn btn-secondary btn-sm">Back
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width:30%">Nama Guru Piket</th>
                                    <td>{{ $ijinkeluar->gurupiket->nm_gp ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>NIS</th>
                                    <td>{{ $ijinkeluar->siswa->nis ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <td>{{ $ijinkeluar->siswa->nm_siswa ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>{{ $ijinkeluar->kelas->nm_kelas ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Ijin Jam</th>
                                    <td>{{ $ijinkeluar->ijin_jam ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{ $ijinkeluar->ket ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Alasan/Keperluan</th>
                                    <td>{{ $ijinkeluar->ijin_jam ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Ijin Keluar</th>
                                    <td>{{ $ijinkeluar->tgl_ijinkeluar}}</td>
                                </tr>
                                <tr>
                                    <th>Di buat</th>
                                    <td>{{ $ijinkeluar->created_at ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Di perbaharui</th>
                                    <td>{{ $ijinkeluar->update_at ?? ''}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        @endsection

{{-- <a href="{{ route('hs/index/admin') }}" class="btn btn-secondary btn-sm">Back
                    </a> --}}

        {{-- <div class="box box-danger">
    <div class="box-header">
        <i class="fa fa-share "></i>
        <h3 class="box-title text-danger">IJIN KELUAR SISWA</h3>
        <div class="box-tools pull-right">
        <button class="btn bg-default btn-xs" data-widget="collapse" fdprocessedid="we6vba"><i class="fa fa-minus"></i></button>
        <button class="btn bg-default btn-xs" data-widget="remove" fdprocessedid="54ml1j"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-footer clearfix no-border">
        <div class="box-tools pull-left"> <a data-toggle="modal" href="#ijinkeluar_tambah" title="TAMBAH IJIN KELUAR"><b class="text-success"><button class="btn btn-sm btn-warning pull-left text-default" fdprocessedid="8l8obn"><i class="fa fa-plus"></i> Tambah Ijin Keluar</button></b></a></div>
    <div class="box-tools pull-right"><a href="?pages=rxj627BQtG9vP4NiCgkk3g77446kJ5IRjoFk8Stk27TnxGh499LGFXomrWiR93j44a0e1352v7q2mIQXmy7dLTBT20kAHf4nS88XxHd2nj33Dx0b2ler9SOaIHBbYtA3P848X89F6Bduq7vtRpdcFwCf67GDPH44WAJq74P4Vw35l03v5l9RvqIhzgORZcL3i7usq6p5&amp;folder=piket&amp;file=tabel_ijinkeluar_detail" title="DETAIL TABEL IJIN KELUAR"><b class="text-purple"><button class="btn btn-sm btn-default pull-left text-success" fdprocessedid="zx5crp"><i class="fa fa-share"></i></button></b></a></div>
    </div>
    <div class="box-body ">

<div class="table-responsive col-lg-12">
<table id="exampl" class="table table-condensed table-hover font">
<thead>
<tr>
<th>No</th>
<th>NAMA</th>
<th>NIS</th>
<th>KELAS</th>
<th>IJIN JAM</th>

<th width="75">AKSI</th>
</tr>
</thead>
<tbody>

<tr>
<td>1</td>
<td>PUTRA SAMUDRA</td>
<td>220002</td>
<td>1-2</td>
<td>09.00 - 14.00</td>

<td> <a href="index.php?pages=rxj627BQtG9vP4NiCgkk3g77446kJ5IRjoFk8Stk27TnxGh499LGFXomrWiR93j44a0e1352v7q2mIQXmy7dLTBT20kAHf4nS88XxHd2nj33Dx0b2ler9SOaIHBbYtA3P848X89F6Bduq7vtRpdcFwCf67GDPH44WAJq74P4Vw35l03v5l9RvqIhzgORZcL3i7usq6p5&amp;folder=piket&amp;file=page_laporan&amp;src=ijinkeluar&amp;&amp;no=4" title="CETAK"><span class="glyphicon glyphicon-print"></span><b style="color:red"></b></a> <a data-toggle="modal" href="#edit_ijinkeluar" data-id="4" title="EDIT"><span class="glyphicon glyphicon-edit"></span><b style="color:red"></b></a> <a href="#hapusijinkeluar" class="trashijinkeluar" data-id="4" role="button" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span><b style="color:red"></b></a> </td>

</tr>

<tr>
<td>2</td>
<td>ADILA TRI RAHARGI</td>
<td>220001</td>
<td>1-A</td>
<td>09.00 - 12.00</td>

<td> <a href="index.php?pages=rxj627BQtG9vP4NiCgkk3g77446kJ5IRjoFk8Stk27TnxGh499LGFXomrWiR93j44a0e1352v7q2mIQXmy7dLTBT20kAHf4nS88XxHd2nj33Dx0b2ler9SOaIHBbYtA3P848X89F6Bduq7vtRpdcFwCf67GDPH44WAJq74P4Vw35l03v5l9RvqIhzgORZcL3i7usq6p5&amp;folder=piket&amp;file=page_laporan&amp;src=ijinkeluar&amp;&amp;no=2" title="CETAK"><span class="glyphicon glyphicon-print"></span><b style="color:red"></b></a> <a data-toggle="modal" href="#edit_ijinkeluar" data-id="2" title="EDIT"><span class="glyphicon glyphicon-edit"></span><b style="color:red"></b></a> <a href="#hapusijinkeluar" class="trashijinkeluar" data-id="2" role="button" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span><b style="color:red"></b></a> </td>

</tr>

</tbody><tbody>
</tbody></table>
</div>
</div>
                
    </div> --}}

        {{--
        <div class="d-flex justify-content-between align-items-end flex-wrap">
        <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
            <i class="mdi mdi-download text-muted"></i>
        </button>
        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-clock-outline text-muted"></i>
        </button>
        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-plus text-muted"></i>
        </button>
        <button class="btn btn-primary mt-2 mt-xl-0">HALO ADMIN</button>
        </div> --}}



        {{-- https://laraveldaily.com/post/laravel-relation-attempt-to-read-property-on-null-error --}}