<?php

namespace App\Http\Controllers\ProsesSistem;

use App\Models\tb_guru_piket;
use App\Models\tb_ijinmasuk;
use App\Models\tb_kelas;
use App\Models\tb_siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class IjinMasuk extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //  'gurupiket_id',
        // 'siswa_id',
        // 'kelas_id',
        // 'jam_masuk',
        // 'tgl_ijinmasuk',
        // 'ket',
        // 'alasan'
        $katakunci = $request->katakunci;
        $jumlahbaris = 2;
        if (strlen($katakunci)) {
            $ijinmasuk = tb_ijinmasuk::where('nis', 'like', "%$katakunci%")
                ->orWhere('nm_siswa', 'like', "%$katakunci%")
                ->orWhere('jns_kelamin', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $ijinmasuk = tb_ijinmasuk::with('gurupiket', 'kelas', 'siswa')->paginate($jumlahbaris);
        }
        // $guru = tb_guru::paginate(1);
        return view('presensimasuk.indexim', ['ijinmasuk' => $ijinmasuk])->with([
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gurupiket = tb_guru_piket::all();
        $siswa = tb_siswa::all();
        $kelas = tb_kelas::all();
        return view('presensimasuk.createim', compact('kelas', 'gurupiket', 'siswa'))->with([
            'user' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gurupiket_id' => 'required',
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'jam_masuk' => 'required',
            'tgl_ijinmasuk' => 'required',
            'ket' => 'required',
            'alasan' => 'required',
        ], [
            'gurupiket_id.required' => 'Guru Piket wajib diisi',
            'siswa_id.required' => 'Siswa wajib diisi',
            'kelas_id' => 'Kelas wajib diisi',
            'jam_masuk' => 'Jam Masuk wajib diisi',
            'tgl_ijinmasuk' => 'Tanggal Ijin Keluar Wajib diisi',
            'ket' => 'Keterangan wajib diisi',
            'alasan' => 'Alasan Wajib diisi',
        ]);

        tb_ijinmasuk::create([
            'gurupiket_id' => $request->gurupiket_id,
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'jam_masuk' => $request->jam_masuk,
            'tgl_ijinmasuk' => $request->tgl_ijinmasuk,
            'ket' => $request->ket,
            'alasan' => $request->alasan,
        ]);

        return redirect()->route('im/index')->with('success', 'Data Presensi Ijin Masuk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gurupiket = tb_guru_piket::all();
        $siswa = tb_siswa::all();
        $kelas = tb_kelas::all();

        $ijinmasuk = tb_ijinmasuk::with('gurupiket', 'siswa', 'kelas')->find($id);

        return view('presensimasuk.editim', compact('ijinmasuk', 'gurupiket', 'siswa', 'kelas'))->with([
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gurupiket_id' => 'required',
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'jam_masuk' => 'required',
            'tgl_ijinmasuk' => 'required',
            'ket' => 'required',
            'alasan' => 'required',
        ], [
            'gurupiket_id.required' => 'Guru Piket wajib diisi',
            'siswa_id.required' => 'Siswa wajib diisi',
            'kelas_id' => 'Kelas wajib diisi',
            'jam_masuk' => 'Jam Masuk wajib diisi',
            'tgl_ijinmasuk' => 'Tanggal Ijin Keluar Wajib diisi',
            'ket' => 'Keterangan wajib diisi',
            'alasan' => 'Alasan Wajib diisi',
        ]);

        tb_ijinmasuk::find($id)->update([
            'gurupiket_id' => $request->gurupiket_id,
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'jam_masuk' => $request->jam_masuk,
            'tgl_ijinmasuk' => $request->tgl_ijinmasuk,
            'ket' => $request->ket,
            'alasan' => $request->alasan,
        ]);
        return redirect()->route('im/index')->with('success', 'Berhasil Melakukan Update Data Presensi Ijin Masuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tb_ijinmasuk::find($id)->delete();

        return redirect()->route('im/index')->with('success', 'Berhasil melakukan Delete Data Presensi Ijin Masuk ');
    }
}
