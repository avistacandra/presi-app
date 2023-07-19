<?php

namespace App\Http\Controllers\ProsesSistem;

use App\Models\tb_kelas;
use App\Models\tb_siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class Siswa extends Controller
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
            $siswa = tb_siswa::where('nis', 'like', "%$katakunci%")
                ->orWhere('nm_siswa', 'like', "%$katakunci%")
                ->orWhere('jns_kelamin', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $siswa = tb_siswa::with('kelas')->paginate($jumlahbaris);
        }
        // $guru = tb_guru::paginate(1);
        return view('siswa.indexsiswa', ['siswa' => $siswa])->with([
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
        $kelas = tb_kelas::all();
        return view('siswa.createsiswa', compact('kelas'))->with([
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
        Session::flash('nis', $request->nis);
        Session::flash('nm_siswa', $request->nm_siswa);
        Session::flash('kelas_id', $request->kelas_id);
        Session::flash('jns_kelamin', $request->jns_kelamin);

        $request->validate([
            'nis' => 'required|max:4|unique:tb_siswa,nis',
            'nm_siswa' => 'required|max:50',
            'kelas_id' => 'required',
            'jns_kelamin' => 'required',
        ], [
            'nis.required' => 'NIS wajib diisi',
            'nis.required' => 'NIS tidak boleh lebih dari 4 karakter',
            'nis.required' => 'NIS yang diisikan sudah ada dalam database',
            'nm_siswa.required' => 'Nama wajib diisi',
            'kelas_id.required' => 'Kelas wajib disi',
            'jns_kelamin.required' => 'Jenis Kelamin wajib diisi',
        ]);
        tb_siswa::create([
            'nis' => $request->nis,
            'nm_siswa' => $request->nm_siswa,
            'kelas_id' => $request->kelas_id,
            'jns_kelamin' => $request->jns_kelamin,
        ]);

        return redirect()->route('siswa/index')->with('success', 'Data Siswa Berhasil Ditambahkan');
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
        $kelas = tb_kelas::all();
        $siswa = tb_siswa::with('kelas')->find($id);

        return view('siswa.editsiswa', compact('siswa', 'kelas'))->with([
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
            'nm_siswa' => 'required|max:50',
            'kelas_id' => 'required',
            'jns_kelamin' => 'required',
        ], [
            'nm_siswa.required' => 'Nama wajib diisi',
            'kelas_id.required' => 'Kelas wajib diisi',
            'jns_kelamin.required' => 'Jenis Kelamin wajib diisi',
        ]);

        tb_siswa::find($id)->update([
            'nm_siswa' => $request->nm_siswa,
            'kelas_id' => $request->kelas_id,
            'jns_kelamin' => $request->jns_kelamin,
        ]);

        return redirect()->route('siswa/index')->with('success', 'Berhasil Melakukan Update Data Siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tb_siswa::find($id)->delete();

        return redirect()->route('siswa/index')->with('success', 'Berhasil melakukan Delete Data Siswa');
    }
}
