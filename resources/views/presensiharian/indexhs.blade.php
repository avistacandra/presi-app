@extends('template.main')

@section('judul')
DATA PRESENSI HARIAN
@endsection

@section('isi')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Presensi Izin Keluar</h4>
                <p class="card-description"></p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <a href="{{ route('hs/create') }}" class="btn btn-danger btn-sm text-bold">+ Tambah Presensi Izin Keluar</></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <form class="d-flex" action="{{ route('hs/index') }}" method="get">
                                    <input class="custom-control me-2" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan Kata Kunci" aria-label="Search">
                                    <button class="btn btn-secondary btn-sm" type="submit">Cari</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{--
            <div class="pb-3">
                <form class="d-flex" action="{{ route('hs/index') }}" method="get">
                <input class="custom-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan Kata Kunci" aria-label="Search">
                <button class="btn btn-secondary btn-sm" type="submit">Cari</button>
                </form>
            </div> --}}

            {{-- tombol tambah data --}}
            {{-- <div class="pb-3">
                <a href="{{ route('hs/create') }}" class="btn btn-danger btn-sm text-bold">+ Tambah Presensi Izin Keluar</></a>
        </div> --}}
        <div class="table-responsive">
            <table class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Guru Piket</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Ijin Jam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $ijinkeluar->firstItem() ?>
                        @foreach ($ijinkeluar as $row)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $row->gurupiket->nm_gp }}</td>
                            <td>{{ $row->siswa->nis }}</td>
                            <td>{{ $row->siswa->nm_siswa }}</td>
                            <td>{{ $row->kelas->nm_kelas }}</td>
                            <td>{{ $row->ijin_jam}}</td>
                            <td class="text-center">
                                <a href="{{ route('hs/show', $row->id) }}" class="btn btn-info btn-sm text-white "><i class="mdi mdi-eye"></i></a>
                                <a href="{{ route('hs/edit', $row->id) }}" class="btn btn-warning btn-sm text-white "><i class="mdi mdi-pencil"></i></a>
                                <a href="#" class="btn btn-danger delete btn-sm text-white" data-id="{{ $row->id }}" data-gp="{{ $row->gurupiket->nm_gp }}" data-siswa="{{ $row->siswa->nm_siswa }}" data-kelas="{{ $row->kelas->nm_kelas }}" data-jam="{{ $row->ijin_jam }}"><i class="mdi mdi-trash-can text-white"></i></a>
                                {{-- <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ route('destroyguru', $row->nip) }}">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button> --}}
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                {{ $ijinkeluar->withQueryString()->links() }}
        </div>
    </div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.delete').click(function(){
        var ijinkeluarid = $(this).attr('data-id');
        var nm_gp = $(this).attr('data-gp');
        var nm_siswa = $(this).attr('data-siswa');
        var nm_kelas = $(this).attr('data-kelas');
        var ijin_jam = $(this).attr('data-jam');

        swal({
            title: "Yakin?",
            text: "Anda akan menghapus data ijin keluar "+nm_gp+", "+nm_siswa+", "+nm_kelas+", "+ijin_jam+"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/hs/destroy/"+ijinkeluarid+""
                swal("Data berhasil dihapus", {
                icon: "success",
                });
            } else {
                swal("Data tidak jadi dihapus");
            }
            });
    });
        
</script>

<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>
@endsection



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