@extends('main')

@section('title', 'EduLevel')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Program</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Program</a></li>
                    <li class="active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content mt-3">

    <div class="animated fadeIn">

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Tambah Program</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('programs') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('programs') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nama Program</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenjang</label>
                                <select name="edulevel_id" class="form-control @error('edulevel_id') is-invalid @enderror">
                                    <option value="">- Pilih -</option>
                                    @foreach ($edulevels as $item)
                                        <option value="{{ $item->id }}" {{ old('edulevel_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('edulevel_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga Member</label>
                                <input type="number" name="student_price" class="form-control @error('student_price') is-invalid @enderror" value="{{ old('student_price') }}">
                                @error('student_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Member Maksimal</label>
                                <input type="number" name="student_max" class="form-control @error('student_max') is-invalid @enderror" value="{{ old('student_max') }}">
                                @error('student_max')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Info</label>
                                <textarea name="info" class="form-control @error('info') is-invalid @enderror">{{ old('info') }}</textarea>
                                @error('info')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>      

    </div>

</div>
@endsection


SEMESTER TEMPLATE AKTIF TIDAK AKTIF BAGIAN EDIT
@extends('template.main')

@section('judul')
FORM EDIT DATA SEMESTER
@endsection

@section('isi')
<a href="{{ route('indexsem') }}" class="btn btn-secondary btn-sm"><< kembali </a>
<div class="content-wrapper">
    <form action="{{ route('updatesem', $semester->id) }}" method="post">
        @csrf
    <div class="row">
    <div class="col-12 grid-margin stretch-card">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Semester</h6>
    </div>
    <div class="card-body">
        {{-- <h4 class="card-title">Tambah Data Kelas</h4> --}}
        {{-- <p class="card-description">
        Silahkan Input Kelas
        </p> --}}
        <div class="form-group">
            <label for="semester">Semester</label>
            <select class="custom-select" name="semester" id="semester" value="{{ isset($semester) ?$semester->semester : ''}}">
                {{-- <option value="{{ isset($guru) ?$guru->je_kel : ''}}" selected disabled>--Pilih Kategori--</option> --}}
                <option selected>--Pilih Semester--</option>
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status_sem">Status Semester</label>
            <select class="custom-select" name="status_sem" id="status_sem" value="{{ isset($semester) ?$semester->status_sem : ''}}">
                {{-- <option value="{{ isset($guru) ?$guru->je_kel : ''}}" selected disabled>--Pilih Kategori--</option> --}}
                <option selected>--Pilih Status Semester--</option>
                <option value="aktif">AKTIF</option>
                <option value="tidak aktif">TIDAK AKTIF</option>
            </select>
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

BAGIAN CREATE
@extends('template.main')

@section('judul')
FORM TAMBAH DATA SEMESTER
@endsection

@section('isi')

@if ($errors->any())
<div class="pt-3">
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $row)
            <li>{{ $row }}</li>
        @endforeach
    </ul>
</div>
</div>
@endif
<a href="{{ route('indexsem') }}" class="btn btn-secondary btn-sm"><< kembali </a>
<div class="content-wrapper">
    <form action="{{ route('storesem') }}" method="post">
        @csrf
    {{-- <a href="{{ route('indexguru') }}" class="btn btn-secondary btn-sm"><< kembali </a> --}}
    <div class="row">
    <div class="col-12 grid-margin stretch-card">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Semester</h6>
    </div>
    <div class="card-body">
        {{-- <h4 class="card-title">Tambah Data Kelas</h4> --}}
        {{-- <p class="card-description">
        Silahkan Input Kelas
        </p> --}}
        <div class="form-group">
            <label for="semester">Semester</label>
            <select class="custom-select" name="semester" id="semester" value="{{ Session::get('semester') }}">
                {{-- <option value="{{ isset($guru) ?$guru->je_kel : ''}}" selected disabled>--Pilih Kategori--</option> --}}
                <option selected>--Pilih Semester--</option>
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status_sem">Status Semester</label>
            <select class="custom-select" name="status_sem" id="status_sem" value="{{ Session::get('status_sem') }}">
                {{-- <option value="{{ isset($guru) ?$guru->je_kel : ''}}" selected disabled>--Pilih Kategori--</option> --}}
                <option selected>--Pilih Status Semester--</option>
                <option value="aktif">AKTIF</option>
                <option value="tidak aktif">TIDAK AKTIF</option>
            </select>
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


EDIT TAHUN AJARAN

@extends('template.main')

@section('judul')
FORM EDIT DATA TAHUN AJARAN
@endsection

@section('isi')
<a href="{{ route('indexta') }}" class="btn btn-secondary btn-sm"><< kembali </a>
<div class="content-wrapper">
    <form action="{{ route('updateta', $tahunajaran->id) }}" method="post">
        @csrf
    <div class="row">
    <div class="col-12 grid-margin stretch-card">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Tahun Ajaran</h6>
    </div>
    <div class="card-body">
        {{-- <h4 class="card-title">Tambah Data Kelas</h4> --}}
        {{-- <p class="card-description">
        Silahkan Input Kelas
        </p> --}}
        <div class="form-group">
            <label for="thn_ajaran">Tahun Ajaran</label>
            <input type="text" class="form-control" name="thn_ajaran" id="thn_ajaran" value="{{ isset($tahunajaran) ? $tahunajaran->thn_ajaran : ''}}">
        </div>
        <div class="form-group">
            <label for="status_ta">Status Tahun Ajaran</label>
            <select class="custom-select" name="status_ta" id="status_ta" value="{{ isset($tahunajaran) ?$tahunajaran->status_ta : ''}}">
                {{-- <option value="{{ isset($guru) ?$guru->je_kel : ''}}" selected disabled>--Pilih Kategori--</option> --}}
                <option selected>--Pilih Status Tahun Ajaran--</option>
                <option value="aktif">AKTIF</option>
                <option value="tidak aktif">TIDAK AKTIF</option>
            </select>
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


CREATE TAHUN AJARAN
@extends('template.main')

@section('judul')
FORM TAMBAH DATA TAHUN AJARAN
@endsection

@section('isi')

@if ($errors->any())
<div class="pt-3">
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $row)
            <li>{{ $row }}</li>
        @endforeach
    </ul>
</div>
</div>
@endif
<a href="{{ route('indexta') }}" class="btn btn-secondary btn-sm"><< kembali </a>
<div class="content-wrapper">
    <form action="{{ route('storeta') }}" method="post">
        @csrf
    {{-- <a href="{{ route('indexguru') }}" class="btn btn-secondary btn-sm"><< kembali </a> --}}
    <div class="row">
    <div class="col-12 grid-margin stretch-card">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Tahun Ajaran</h6>
    </div>
    <div class="card-body">
        {{-- <h4 class="card-title">Tambah Data Kelas</h4> --}}
        {{-- <p class="card-description">
        Silahkan Input Kelas
        </p> --}}
        <div class="form-group">
            <label for="thn_ajaran">Tahun Ajaran</label>
            <input type="text" class="form-control" name="thn_ajaran" id="thn_ajaran" value="{{ Session::get('thn_ajaran') }}">
        </div>
        <div class="form-group">
            <label for="status_ta">Status TA</label>
            <select class="custom-select" name="status_ta" id="status_ta" value="{{ Session::get('status_ta') }}">
                {{-- <option value="{{ isset($guru) ?$guru->je_kel : ''}}" selected disabled>--Pilih Kategori--</option> --}}
                <option selected>--Pilih Status Tahun Ajaran--</option>
                <option value="aktif">AKTIF</option>
                <option value="tidak aktif">TIDAK AKTIF</option>
            </select>
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


@extends('template.main')

@section('judul')
FORM EDIT DATA JADWAL BELAJAR
@endsection

@section('isi')
<a href="{{ route('indexjb') }}" class="btn btn-secondary btn-sm"><< kembali </a>
<div class="content-wrapper">
    <form action="{{ route('updatejb', $jadwalbelajar->id) }}" method="post">
        @csrf
    <div class="row">
    <div class="col-12 grid-margin stretch-card">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Jadwal Belajar</h6>
    </div>
    <div class="card-body">
        {{-- <h4 class="card-title">Tambah Data Kelas</h4> --}}
        {{-- <p class="card-description">
        Silahkan Input Kelas
        </p> --}}
        <div class="form-group">
            <label for="nip">NIP</label>
            {{ $guru->nip }}
            {{-- <input type="text" class="form-control" name="nip" id="nip" value="{{ isset($guru) ? $guru->nip : ''}}"> --}}
        </div>
        <div class="form-group">
            <label for="nm_guru">Nama Guru</label>
            <input type="text" class="form-control" name="nm_guru" id="nm_guru" value="{{ isset($guru) ?$guru->nm_guru : ''}}">
        </div>
        <div class="form-group">
            <label for="je_kel">Jenis Kelamin</label>
            <select class="custom-select" name="je_kel" id="je_kel" value="{{ isset($guru) ?$guru->je_kel : ''}}">
                {{-- <option value="{{ isset($guru) ?$guru->je_kel : ''}}" selected disabled>--Pilih Kategori--</option> --}}
                {{-- <option selected>--Pilih Jenis Kelamin--</option> --}}
                <option value="P">P</option>
                <option value="L">L</option>
            </select>
                {{-- value="{{ isset($guru) ? $guru->je_kel : ''}}" --}}
        </div>
        <div class="form-group">
            <label for="golongan">Golongan</label>
            <input type="text" class="form-control" name="golongan" id="golongan" value="{{ isset($guru) ? $guru->golongan : ''}}">
        </div>
        <div class="form-group">
            <label for="tgs_tambahan">Tugas Tambahan</label>
            <input type="text" class="form-control" name="tgs_tambahan" id="tgs_tambahan" value="{{ isset($guru) ? $guru->tgs_tambahan : ''}}">
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