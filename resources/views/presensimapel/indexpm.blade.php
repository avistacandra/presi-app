@extends('template.main')

@section('judul')
DATA PRESENSI MAPEL
@endsection

@section('isi')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Presensi Mata Pelajaran</h4>
                <p class="card-description"></p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <a href="{{ route('pm/create') }}" class="btn btn-success text-white btn-sm text-bold">+ Tambah Presensi Mapel</></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <form class="d-flex" action="{{ route('pm/index') }}" method="get">
                                    <input class="custom-control me-2" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan Kata Kunci" aria-label="Search">
                                    <button class="btn btn-secondary btn-sm" type="submit">Cari</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- tombol tambah data --}}
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Tgl Presensi</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Keterangan</th>
                                    <th>Hari/Jam Belajar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $presensimapel->firstItem() ?>
                                @foreach ($presensimapel as $row)
                                <tr class="table-secondary">
                                    <td>{{ $i }}</td>
                                    <td>{{ $row->mapel->nm_mapel }}</td>
                                    <td>{{ $row->kelas->nm_kelas }}</td>
                                    <td>{{ $row->tgl_absen }}</td>
                                    <td>{{ $row->siswa->nis }}</td>
                                    <td>{{ $row->siswa->nm_siswa }}</td>
                                    <td>{{ $row->ket_presensi }}</td>
                                    <td>{{ $row->jadwalbelajar->hari }}/{{ $row->jadwalbelajar->jam_belajar}}</td>
                                    <td>
                                        <a href="{{ route('pm/edit', $row->id) }}" class="btn btn-warning btn-sm text-white"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#" class="btn btn-danger delete btn-sm text-white" data-id="{{ $row->id }}" data-siswa="{{ $row->siswa->nm_siswa }}" data-kelas="{{ $row->kelas->nm_kelas }}" data-tgl="{{ $row->tgl_absen }}"><i class="mdi mdi-trash-can"></i></a>
                                        {{-- <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ route('destroyguru', $row->nip) }}">
                                        @csrf
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button> --}}
                                    </td>
                                </tr>
                                <?php $i++ ?>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $presensimapel->withQueryString()->links() }}
                    </div>
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
        var presensimapelid = $(this).attr('data-id');
        var nm_siswa = $(this).attr('data-siswa');
        var nm_kelas = $(this).attr('data-kelas');
        var tgl_absen = $(this).attr('data-tgl');

        swal({
            title: "Yakin?",
            text: "Anda akan menghapus data presensi mapel "+nm_siswa+", "+nm_kelas+", "+tgl_absen+"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/pm/destroy/"+presensimapelid+""
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


{{-- <div class="col-lg-12 stretch-card">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Table with contextual classes</h4>
        <p class="card-description">
        Add class <code>.table-{color}</code>
        </p>
        <div class="table-responsive pt-3">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>First name</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Deadline</th>
            </tr>
            </thead>
            <tbody>
            <tr class="table-info">
                <td>1</td>
                <td>Herman Beck</td>
                <td>Photoshop</td>
                <td>$ 77.99</td>
                <td>May 15, 2015</td>
            </tr>
            <tr class="table-warning">
                <td>2</td>
                <td>Messsy Adam</td>
                <td>Flash</td>
                <td>$245.30</td>
                <td>July 1, 2015</td>
            </tr>
            <tr class="table-danger">
                <td>3</td>
                <td>John Richards</td>
                <td>Premeire</td>
                <td>$138.00</td>
                <td>Apr 12, 2015</td>
            </tr>
            <tr class="table-success">
                <td>4</td>
                <td>Peter Meggik</td>
                <td>After effects</td>
                <td>$ 77.99</td>
                <td>May 15, 2015</td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div> --}}