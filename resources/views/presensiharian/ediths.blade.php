@extends('template.main')

@section('judul')
FORM EDIT DATA PRESENSI HARIAN
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

{{-- <a href="{{ route('hs/index') }}" class="btn btn-secondary btn-sm"><< kembali </a> --}}
    <form action="{{ route('hs/update', $ijinkeluar->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Edit Presensi Izin Keluar</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="gurupiket_id" class="col-sm-3 col-form-label">Nama Guru Piket</label>
                                    <div class="col-sm-9">
                                        <select name="gurupiket_id" id="gurupiket_id" class="form-control">
                                            <option disabled value>--Pilih Guru Piket--</option>
                                            <option value="{{ $ijinkeluar->gurupiket_id }}">{{ $ijinkeluar->gurupiket->nm_gp }}</option>
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
                                            <option value="{{ $ijinkeluar->siswa_id }}">{{ $ijinkeluar->siswa->nm_siswa }}</option>
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
                                            <option value="{{ $ijinkeluar->kelas_id }}">{{ $ijinkeluar->kelas->nm_kelas }}</option>
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
                                        <input name="ijin_jam" type="text" id="ijin_jam" class="form-control" placeholder=11.00-14.00 value="{{ isset($ijinkeluar) ?$ijinkeluar->ijin_jam : ''}}">
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
                                        <input name="tgl_ijinkeluar" type="date" id="tgl_ijinkeluar" class="form-control" value="{{ isset($ijinkeluar) ? $ijinkeluar->tgl_ijinkeluar : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input name="ket" id="ket" class="form-control" value="{{ isset($ijinkeluar) ? $ijinkeluar->ket : ''}}">
                                        <p class="footnote"><i class="footnote">Isi Keterangan / penjelasan tentang Ijin Keluar Siswa</i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="alasan" class="col-sm-3 col-form-label">Alasan/Keperluan</label>
                                    <div class="col-sm-9">
                                        <input name="alasan" id="alasan" class="form-control" value="{{ isset($ijinkeluar) ? $ijinkeluar->alasan : ''}}">
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
    @endsection