@extends('template.main')

@section('judul')
FORM EDIT DATA JADWAL BELAJAR
@endsection

@section('isi')
<a href="{{ route('jb/index') }}" class="btn btn-secondary btn-sm">
    << kembali </a>
        <div class="content-wrapper">
            <form action="{{ route('jb/update', $jadwalbelajar->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 grid-margin stretch-card"">
<div class=" card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Edit Jadwal Belajar</h6>
                        </div>
                        <div class="card-body">
                            <form class="form-sample">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="guru_id" class="col-sm-3 col-form-label">Nama Guru</label>
                                            <div class="col-sm-9">
                                                <select name="guru_id" id="guru_id" class="form-control">
                                                    <option disabled value>--Pilih Guru--</option>
                                                    <option value="{{ $jadwalbelajar->guru_id }}">{{ $jadwalbelajar->guru->nm_guru }}</option>
                                                    @foreach ($guru as $row)
                                                    <option value="{{ $row->id }}">{{ $row->nm_guru }}</option>
                                                    @endforeach
                                                </select>
                                                @error('guru_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="mapel_id" class="col-sm-3 col-form-label">Mata Pelajaran</label>
                                            <div class="col-sm-9">
                                                <select name="mapel_id" id="mapel_id" class="form-control">
                                                    <option disabled value>--Pilih Mata Pelajaran--</option>
                                                    <option value="{{ $jadwalbelajar->mapel_id }}">{{ $jadwalbelajar->mapel->nm_mapel }}</option>
                                                    @foreach ($mapel as $row)
                                                    <option value="{{ $row->id }}">{{ $row->nm_mapel }}</option>
                                                    @endforeach
                                                </select>
                                                @error('mapel_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="kelas_id" class="col-sm-3 col-form-label">Kelas</label>
                                            <div class="col-sm-9">
                                                <select name="kelas_id" id="kelas_id" class="form-control">
                                                    <option disabled value>--Pilih Kelas--</option>
                                                    <option value="{{ $jadwalbelajar->kelas_id }}">{{ $jadwalbelajar->kelas->nm_kelas }}</option>
                                                    @foreach ($kelas as $row)
                                                    <option value="{{ $row->id }}">{{ $row->nm_kelas }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kelas_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="jam_belajar" class="col-sm-3 col-form-label">Waktu</label>
                                            <div class="col-sm-9">
                                                <input name="jam_belajar" type="text" id="jam_belajar" class="form-control" placeholder="00.00 - 00.00" value="{{ isset($jadwalbelajar) ?$jadwalbelajar->jam_belajar : ''}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="tahunajaran_id" class="col-sm-3 col-form-label">Tahun Ajaran</label>
                                            <div class="col-sm-9">
                                                <select name="tahunajaran_id" id="tahunajaran_id" class="form-control">
                                                    <option disabled value>--Pilih TA--</option>
                                                    <option value="{{ $jadwalbelajar->tahunajaran_id }}">{{ $jadwalbelajar->tahunajaran->thn_ajaran }}</option>
                                                    @foreach ($tahunajaran as $row)
                                                    <option value="{{ $row->id }}">{{ $row->thn_ajaran }}</option>
                                                    @endforeach
                                                </select>
                                                @error('tahunajaran_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="semester_id" class="col-sm-3 col-form-label">Semester</label>
                                            <div class="col-sm-9">
                                                <select name="semester_id" id="semester_id" class="form-control">
                                                    <option disabled value>--Pilih Semester--</option>
                                                    <option value="{{ $jadwalbelajar->semester_id }}">{{ $jadwalbelajar->semester->semester }}</option>
                                                    @foreach ($semester as $row)
                                                    <option value="{{ $row->id }}">{{ $row->semester }}</option>
                                                    @endforeach
                                                </select>
                                                @error('semester_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="hari" class="col-sm-3 col-form-label">Hari</label>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="hari" id="hari" value="Senin">
                                                        Senin
                                                        <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="hari" id="hari" value="Selasa">
                                                        Selasa
                                                        <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="hari" id="hari" value="Rabu">
                                                        Rabu
                                                        <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="hari" id="hari" value="Kamis">
                                                        Kamis
                                                        <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="hari" id="hari" value="Jumat">
                                                        Jumat
                                                        <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="hari" id="hari" value="Sabtu">
                                                        Sabtu
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary text-white">Simpan</button>
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


        {{-- YANG LAMA --}}

        {{-- @if ($errors->any())
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
        <a href="{{ route('jb/index') }}" class="btn btn-secondary btn-sm">
            << kembali </a>
                <div class="content-wrapper">
                    <form action="{{ route('jb/store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Jadwal Belajar</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" class="form-control" name="nip" id="nip" value="{{ Session::get('nip') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nm_guru">Nama Guru</label>
                                            <input type="text" class="form-control" name="nm_guru" id="nm_guru" value="{{ Session::get('nm_guru') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="je_kel">Jenis Kelamin</label>
                                            <select class="custom-select" name="je_kel" id="je_kel" value="{{ Session::get('je_kel') }}">
                                                <option value="P">P</option>
                                                <option value="L">L</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="golongan">Golongan</label>
                                            <input type="text" class="form-control" name="golongan" id="golongan" value="{{ Session::get('golongan') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgs_tambahan">Tugas Tambahan</label>
                                            <input type="text" class="form-control" name="tgs_tambahan" id="tgs_tambahan" value="{{ Session::get('tgs_tambahan') }}">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> --}}


                {{-- <h4 class="card-title">Tambah Data Kelas</h4> --}}
                {{-- <p class="card-description">
        Silahkan Input Kelas
        </p> --}}

                {{-- <option value="{{ Session::get('je_kel') }}" selected disabled>--Pilih Gender--</option> --}}
                {{-- <option selected>--Pilih Jenis Kelamin--</option> --}}

                {{-- value="{{ isset($guru) ? $guru->je_kel : ''}}" --}}





                {{-- jadwal hari terbaru --}}

                {{-- <div class="col-md-6">											
		<div class="form-check right">
			<label>Hari</label>
			<label class="form-radio-label">
				<input class="form-radio-input" type="radio" name="hari" value="Senin">
				<span class="form-radio-sign">Senin</span>
			</label>
			<label class="form-radio-label">
				<input class="form-radio-input" type="radio" name="hari" value="Selasa">
				<span class="form-radio-sign">Selasa</span>
			</label>
			<label class="form-radio-label">
				<input class="form-radio-input" type="radio" name="hari" value="Rabu">
				<span class="form-radio-sign">Rabu</span>
			</label>
			<label class="form-radio-label">
				<input class="form-radio-input" type="radio" name="hari" value="Kamis">
				<span class="form-radio-sign">Kamis</span>
			</label>
			<label class="form-radio-label">
				<input class="form-radio-input" type="radio" name="hari" value="Jum'at">
				<span class="form-radio-sign">Jum'at</span>
			</label>
			<label class="form-radio-label">
				<input class="form-radio-input" type="radio" name="hari" value="Sabtu">
				<span class="form-radio-sign">Sabtu</span>
			</label>

		</div>
	</div> --}}

                {{--
    <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Membership</label>
                    <div class="col-sm-4">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked="">
                        Free
                        <i class="input-helper"></i></label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2">
                        Professional
                        <i class="input-helper"></i></label>
                    </div>
                    </div>
                </div>
                </div>
            </div>
--}}