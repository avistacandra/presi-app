@extends('template.main')

@section('judul')
DATA SEMESTER
@endsection

@section('isi')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Semester</h4>
                <p class="card-description"></p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <a href="{{ route('semester/create') }}" class="btn btn-success text-white btn-sm text-white">+ Tambah Semester</></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <form class="d-flex" action="{{ route('semester/index') }}" method="get">
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
                            <tr>
                                <th>No</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $semester->firstItem() ?>
                            @foreach ($semester as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->semester }}</td>
                                <td>{{ $row->status_sem }}</td>
                                <td>
                                    <a href="{{ route('semester/edit', $row->id) }}" class="btn btn-warning btn-sm text-white"><i class="mdi mdi-pencil"></i></a>
                                    <a href="#" class="btn btn-danger delete btn-sm text-white" data-id="{{ $row->id }}" data-nama="{{ $row->semester }}"><i class="mdi mdi-trash-can"></i></a>
                                    {{-- <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ route('destroysem', $row->id) }}">
                                    @csrf
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button> --}}
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $semester->withQueryString()->links() }}
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
        var semesterid = $(this).attr('data-id');
        var semester = $(this).attr('data-nama');
        swal({
            title: "Yakin?",
            text: "Anda akan menghapus data semester dengan nama "+semester+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/semester/destroy/"+semesterid+""
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