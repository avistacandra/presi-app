<?php

namespace App\Http\Controllers\ProsesSistem;


use App\Models\tb_jadwalbelajar;
use App\Models\tb_kelas;
use App\Models\tb_mapel;
use App\Models\tb_presensi;
use App\Models\tb_siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PresensiMapel extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $presensimapel = tb_presensi::where('ket_presensi', 'like', "%$katakunci%")
                ->orWhere('tgl_absen', 'like', "%$katakunci%")
                ->orWhere('pertemuan_ke', 'like', "%$katakunci%")
                ->paginate($jumlahbaris)
                ->get();
        } else {
            $presensimapel = tb_presensi::with('jadwalbelajar', 'siswa', 'kelas', 'mapel')->orderBy('ket_presensi', 'asc')->paginate($jumlahbaris);
        }
        // $guru = tb_guru::paginate(1);
        return view('presensimapel.indexpm', ['presensimapel' => $presensimapel])->with([
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
        $jadwalbelajar = tb_jadwalbelajar::all();
        $siswa = tb_siswa::all();
        $kelas = tb_kelas::all();
        $mapel = tb_mapel::all();
        return view('presensimapel.createpm', compact('siswa', 'jadwalbelajar', 'kelas', 'mapel'))->with([
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
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'tgl_absen' => 'required',
            'pertemuan_ke' => 'required',
            'ket_presensi' => 'required',
            'siswa_id' => 'required',
            'jadwalbelajar_id' => 'required',
        ], [
            'kelas_id' => 'Kelas wajib diisi',
            'mapel_id' => 'Mata Pelajaran wajib diisi',
            'tgl_absen' => 'Tanggal presensi wajib diisi',
            'pertemuan_ke' => 'Pertemuan wajib diisi',
            'ket_presensi' => 'Keterangan wajib diisi',
            'siswa_id' => 'Siswa wajib diisi',
            'jadwalbelajar_id' => 'Jadwal Belajar wajib diisi',
        ]);

        tb_presensi::create([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'pertemuan_ke' => $request->pertemuan_ke,
            'ket_presensi' => $request->ket_presensi,
            'tgl_absen' => $request->tgl_absen,
            'jadwalbelajar_id' => $request->jadwalbelajar_id,
        ]);

        return redirect()->route('pm/index')->with('success', 'Data Presensi Mata Pelajaran Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $presensimapel = tb_ijinkeluar::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwalbelajar = tb_jadwalbelajar::all();
        $siswa = tb_siswa::all();
        $kelas = tb_kelas::all();
        $mapel = tb_mapel::all();

        $presensimapel = tb_presensi::with('siswa', 'jadwalbelajar', 'kelas', 'mapel')->find($id);

        return view('presensimapel.editpm', compact('presensimapel', 'siswa', 'jadwalbelajar', 'kelas', 'mapel'))->with([
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
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'tgl_absen' => 'required',
            'pertemuan_ke' => 'required',
            'ket_presensi' => 'required',
            'siswa_id' => 'required',
            'jadwalbelajar_id' => 'required',
        ], [
            'kelas_id' => 'Kelas wajib diisi',
            'mapel_id' => 'Mata Pelajaran wajib diisi',
            'tgl_absen' => 'Tanggal presensi wajib diisi',
            'pertemuan_ke' => 'Pertemuan wajib diisi',
            'ket_presensi' => 'Keterangan wajib diisi',
            'siswa_id' => 'Siswa wajib diisi',
            'jadwalbelajar_id' => 'Jadwal Belajar wajib diisi',
        ]);

        tb_presensi::find($id)->update([
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'tgl_absen' => $request->tgl_absen,
            'pertemuan_ke' => $request->pertemuan_ke,
            'ket_presensi' => $request->ket_presensi,
            'siswa_id' => $request->siswa_id,
            'jadwalbelajar_id' => $request->jadwalbelajar_id,
        ]);
        return redirect()->route('pm/index')->with('success', 'Berhasil Melakukan Update Data Presensi Mata Pelajaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tb_presensi::find($id)->delete();

        return redirect()->route('pm/index')->with('success', 'Berhasil melakukan Hapus Data Presensi Mata Pelajaran ');
    }
}
