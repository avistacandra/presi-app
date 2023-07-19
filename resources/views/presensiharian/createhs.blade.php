@extends('template.main')

@section('judul')
FORM TAMBAH DATA PRESENSI HARIAN
@endsection

@section('isi')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

{{-- <a href="{{ route('hs/index') }}" class="btn btn-secondary btn-sm"><< kembali </a> --}}
    <form action="{{ route('hs/store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Presensi Izin Keluar</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="gurupiket_id" class="col-sm-3 col-form-label">Nama Guru Piket</label>
                                    <div class="col-sm-9">
                                        <select name="gurupiket_id" id="gurupiket_id" class="form-control">
                                            <option disabled value>--Pilih Guru Piket--</option>
                                            {{-- <option value="{{ $presensimapel->jadwalbelajar_id }}">{{ $presensimapel->jadwalbelajar->guru_id }}</option> --}}
                                            @foreach ($gurupiket as $row)
                                            <option value="{{ $row->id }}">{{ $row->nm_gp }}</option>
                                            @endforeach
                                        </select>
                                        @error('gurupiket_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="siswa_id" class="col-sm-3 col-form-label">Nama Siswa</label>
                                    <div class="col-sm-9">
                                        <select name="siswa_id" id="siswa_id" class="form-control">
                                            <option disabled value>--Pilih Siswa--</option>
                                            {{-- <option value="{{ $presensimapel->jadwalbelajar_id }}">{{ $presensimapel->jadwalbelajar->mapel_id }}</option> --}}
                                            @foreach ($siswa as $row)
                                            <option value="{{ $row->id }}">[{{ $row->nis }}] - {{ $row->nm_siswa }}</option>
                                            @endforeach
                                        </select>
                                        @error('siswa_id')
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
                                            {{-- <option value="{{ $presensimapel->kelas_id }}">{{ $presensimapel->kelas->kelas_id }}</option> --}}
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
                                    <label for="ijin_jam" class="col-sm-3 col-form-label">Ijin Jam</label>
                                    <div class="col-sm-9">
                                        <input name="ijin_jam" type="text" id="ijin_jam" class="form-control" placeholder=11.00-14.00>
                                        <p class="footnote"> <i class="footnote">Isi Jam Mulai diijinkan sampai Jam harus kembali, misal 08.30 - 11.30</i></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="tgl_ijinkeluar" class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input name="tgl_ijinkeluar" type="date" id="tgl_ijinkeluar" class="form-control" value="{{ isset($presensiharian) ? $presensiharian->tgl_ijinkeluar : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input name="ket" id="ket" class="form-control" value="{{ isset($presensiharian) ? $presensiharian->ket : ''}}">
                                        <p class="footnote"><i class="footnote">Isi Keterangan / penjelasan tentang Ijin Keluar Siswa</i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="alasan, nm_kelas" class="col-sm-3 col-form-label">Alasan/Keperluan</label>
                                    <div class="col-sm-9">
                                        <input name="alasan" id="alasan" class="form-control" value="{{ isset($presensiharian) ? $presensiharian->alasan : ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </form>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary text-white">Simpan</button>
    </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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