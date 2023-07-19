@extends('template.main')

@section('judul')
FORM EDIT DATA SISWA
@endsection

@section('isi')
<a href="{{ route('siswa/index') }}" class="btn btn-secondary btn-sm">
    << kembali </a>
        <div class="content-wrapper">
            <form action="{{ route('update/siswa', $siswa->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Form Edit Siswa</h6>
                            </div>
                            <div class="card-body">
                                {{-- <h4 class="card-title">Tambah Data Kelas</h4> --}}
                                {{-- <p class="card-description">
        Silahkan Input Kelas
        </p> --}}
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    {{ $siswa->nis }}
                                    {{-- <input type="text" class="form-control" name="nip" id="nip" value="{{ isset($guru) ? $guru->nip : ''}}"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="nm_siswa">Nama Siswa</label>
                                    <input type="text" class="form-control" name="nm_siswa" id="nm_siswa" value="{{ isset($siswa) ?$siswa->nm_siswa : ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="kelas_id">Kelas</label>
                                    <select name="kelas_id" id="kelas_id" class="form-control">
                                        {{-- <option value="{{ Session::get('je_kel') }}" selected disabled>--Pilih Gender--</option> --}}
                                        {{-- <option selected>--Pilih Jenis Kelamin--</option> --}}
                                        <option disabled value>--Pilih Kelas--</option>
                                        <option value="{{ $siswa->kelas_id }}">{{ $siswa->kelas->nm_kelas }}</option>

                                        @foreach ($kelas as $row)
                                        <option value="{{ $row->id }}">{{ $row->nm_kelas }}</option>
                                        @endforeach
                                    </select>
                                    @error('kelas_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    {{-- value="{{ isset($guru) ? $guru->je_kel : ''}}" --}}
                                </div>

                                <div class="form-group">
                                    <label for="jns_kelamin">Jenis Kelamin</label>
                                    <select class="custom-select" name="jns_kelamin" id="jns_kelamin" value="{{ isset($siswa) ?$siswa->jns_kelamin : ''}}">
                                        {{-- <option value="{{ isset($guru) ?$guru->je_kel : ''}}" selected disabled>--Pilih Kategori--</option> --}}
                                        {{-- <option selected>--Pilih Jenis Kelamin--</option> --}}
                                        <option value="P">P</option>
                                        <option value="L">L</option>
                                    </select>
                                    {{-- value="{{ isset($guru) ? $guru->je_kel : ''}}" --}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @endsection



        {{-- @extends('template.main')

@section('judul')
FORM TAMBAH DATA MATA PELAJARAN
@endsection

@section('isi')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Tambah Data Mata Pelajaran</h4>
        <p class="card-description">
        Tambah Data Mata Pelajaran
        </p>
        <form class="forms-sample">
        <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail3">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword4">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleSelectGender">Gender</label>
            <select class="form-control" id="exampleSelectGender">
                <option>Male</option>
                <option>Female</option>
            </select>
            </div>
        <div class="form-group">
            <label for="exampleInputCity1">City</label>
            <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
        </div>
        <div class="form-group">
            <label for="exampleTextarea1">Textarea</label>
            <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        </form>
    </div>
    </div>
</div>

@endsection      --}}