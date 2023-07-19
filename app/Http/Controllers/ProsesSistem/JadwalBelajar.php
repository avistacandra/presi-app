<?php

namespace App\Http\Controllers\ProsesSistem;

use App\Http\Controllers\Controller;
use App\Models\tb_guru;
use App\Models\tb_jadwalbelajar;
use App\Models\tb_kelas;
use App\Models\tb_mapel;
use App\Models\tb_semester;
use App\Models\tb_thn_ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalBelajar extends Controller
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
            $jadwalbelajar = tb_jadwalbelajar::where('guru_id', 'like', "%$katakunci%")
                ->orWhere('mapel_id', 'like', "%$katakunci%")
                ->orWhere('kelas_id', 'like', "%$katakunci%")
                ->orWhere('hari', 'like', "%$katakunci%")
                ->orWhere('jam_belajar', 'like', "%$katakunci%")
                ->orWhere('tahunajaran_id', 'like', "%$katakunci%")
                ->orWhere('semester_id', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $jadwalbelajar = tb_jadwalbelajar::with('kelas', 'guru', 'mapel', 'tahunajaran', 'semester')->orderBy('hari', 'asc')->paginate($jumlahbaris);
        }
        // $guru = tb_guru::paginate(1);
        return view('jadwalbelajar.indexjb', ['jadwalbelajar' => $jadwalbelajar])->with([
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
        $mapel = tb_mapel::all();
        $guru = tb_guru::all();
        $tahunajaran = tb_thn_ajaran::all();
        $semester = tb_semester::all();
        $kelas = tb_kelas::all();
        return view('jadwalbelajar.createjb', compact('kelas', 'mapel', 'guru', 'tahunajaran', 'semester'))->with([
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
            'jam_belajar' => 'required',
            'hari' => 'required',
            'guru_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'semester_id' => 'required',
            'tahunajaran_id' => 'required',
        ], [
            'jam_belajar.required' => 'Jam belajar wajib diisi',
            'hari.required' => 'Hari wajib diisi',
            'guru_id' => 'Nama Guru wajib diisi',
            'kelas_id' => 'Kelas wajib diisi',
            'mapel_id' => 'Mata Pelajaran wajib diisi',
            'semester_id' => 'Semester wajib diisi',
            'tahunajaran_id' => 'Tahun Ajaran wajib diisi',
        ]);

        tb_jadwalbelajar::create([
            'hari' => $request->hari,
            'mapel_id' => $request->mapel_id,
            'guru_id' => $request->guru_id,
            'tahunajaran_id' => $request->tahunajaran_id,
            'semester_id' => $request->semester_id,
            'kelas_id' => $request->kelas_id,
            'jam_belajar' => $request->jam_belajar,
        ]);

        return redirect()->route('jb/index')->with('sukses', 'Data Jadwal Belajar Berhasil Ditambahkan');
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
        $mapel = tb_mapel::all();
        $guru = tb_guru::all();
        $tahunajaran = tb_thn_ajaran::all();
        $semester = tb_semester::all();
        $kelas = tb_kelas::all();

        $jadwalbelajar = tb_jadwalbelajar::with('kelas', 'mapel', 'guru', 'tahunajaran', 'semester')->find($id);

        return view('jadwalbelajar.editjb', compact('jadwalbelajar', 'kelas', 'mapel', 'guru', 'tahunajaran', 'semester'))->with([
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
            'jam_belajar' => 'required',
            'hari' => 'required',
            'guru_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'semester_id' => 'required',
            'tahunajaran_id' => 'required',
        ], [
            'jam_belajar.required' => 'Jam belajar wajib diisi',
            'hari.required' => 'Hari wajib diisi',
            'guru_id' => 'Nama Guru wajib diisi',
            'kelas_id' => 'Kelas wajib diisi',
            'mapel_id' => 'Mata Pelajaran wajib diisi',
            'semester_id' => 'Semester wajib diisi',
            'tahunajaran_id' => 'Tahun Ajaran wajib diisi',
        ]);

        tb_jadwalbelajar::find($id)->update([
            'jam_belajar' => $request->jam_belajar,
            'hari' => $request->hari,
            'mapel_id' => $request->mapel_id,
            'guru_id' => $request->guru_id,
            'tahunajaran_id' => $request->tahunajaran_id,
            'semester_id' => $request->semester_id,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('jb/index')->with('success', 'Berhasil Melakukan Update Data Jadwal Belajar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tb_jadwalbelajar::find($id)->delete();

        return redirect()->route('jb/index')->with('success', 'Berhasil melakukan Delete Data Jadwal Belajar ');
    }
}
