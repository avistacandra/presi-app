@extends('template.main')

@section('judul')
DATA JADWAL BELAJAR
@endsection

@section('isi')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Jadwal Belajar</h4>
                <p class="card-description"></p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <a href="{{ url('jb/create') }}" class="btn btn-info btn-sm text-bold">+ Tambah Presensi Jadwal Belajar</></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <form class="d-flex" action="{{ route('jb/index') }}" method="get">
                                    <input class="custom-control me-2" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan Kata Kunci" aria-label="Search">
                                    <button class="btn btn-secondary btn-sm" type="submit">Cari</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        {{-- <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Mata Pelajaran</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMapelController as $row)
                        
                    <tr>
                    <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->nm_mapel }}</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                            <button type="button" class="btn btn-warning btn-sm">Ubah</button>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table> --}}
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Guru</th>
                                <th>Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th>Hari</th>
                                <th>Waktu</th>
                                <th>TP/Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $jadwalbelajar->firstItem() ?>
                            @foreach ($jadwalbelajar as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->guru->nm_guru }}</td>
                                <td>{{ $row->mapel->nm_mapel }}</td>
                                <td>{{ $row->kelas->nm_kelas}}</td>
                                <td>{{ $row->hari}}</td>
                                <td>{{ $row->jam_belajar}}</td>
                                <td>{{ $row->tahunajaran->thn_ajaran }}/{{ $row->semester->semester}}</td>
                                <td>
                                    <a href="{{ route('jb/edit', $row->id) }}" class="btn btn-warning btn-sm text-white "><i class="mdi mdi-pencil"></i></a>
                                    <a href="#" class="btn btn-danger delete btn-sm text-white" data-id="{{ $row->id }}" data-nama="{{ $row->guru->nm_guru }}" data-guru="{{ $row->mapel->nm_mapel }}" ><i class="mdi mdi-trash-can text-white"></i></a>
                                    {{-- <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ route('destroyguru', $row->nip) }}">
                                    @csrf
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button> --}}
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $jadwalbelajar->withQueryString()->links() }}
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
        var jadwalbelajarid = $(this).attr('data-id');
        var nm_guru = $(this).attr('data-guru');
        var nm_mapel = $(this).attr('data-nama');

        swal({
            title: "Yakin?",
            text: "Anda akan menghapus data jadwal belajar "+nm_guru+", "+nm_mapel+"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/jb/destroy/"+jadwalbelajarid+""
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