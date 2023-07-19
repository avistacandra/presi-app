<?php

namespace App\Http\Controllers\ProsesSistem;

use App\Models\tb_guru_piket;
use App\Models\tb_ijinkeluar;
use App\Models\tb_kelas;
use App\Models\tb_siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class IjinKeluar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 2;
        if (strlen($katakunci)) {
            $ijinkeluar = tb_ijinkeluar::where('nis', 'like', "%$katakunci%")
                ->orWhere('nm_siswa', 'like', "%$katakunci%")
                ->orWhere('jns_kelamin', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $ijinkeluar = tb_ijinkeluar::with('gurupiket', 'kelas', 'siswa')->paginate($jumlahbaris);
        }
        // $guru = tb_guru::paginate(1);
        return view('presensiharian.indexhs', ['ijinkeluar' => $ijinkeluar])->with([
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
        return view('presensiharian.createhs', compact('kelas', 'gurupiket', 'siswa'))->with([
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
            'ijin_jam' => 'required|max:11',
            'tgl_ijinkeluar' => 'required',
            'ket' => 'required',
            'alasan' => 'required',
        ], [
            'gurupiket_id.required' => 'Guru Piket wajib diisi',
            'siswa_id.required' => 'Siswa wajib diisi',
            'kelas_id' => 'Kelas wajib diisi',
            'ijin_jam' => 'Ijin jam wajib diisi',
            'tgl_ijinkeluar' => 'Tanggal Ijin Keluar Wajib diisi',
            'ket' => 'Keterangan wajib diisi',
            'alasan' => 'Alasan Wajib diisi',
        ]);

        tb_ijinkeluar::create([
            'gurupiket_id' => $request->gurupiket_id,
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'ijin_jam' => $request->ijin_jam,
            'tgl_ijinkeluar' => $request->tgl_ijinkeluar,
            'ket' => $request->ket,
            'alasan' => $request->alasan,
        ]);

        return redirect()->route('hs/index')->with('success', 'Data Presensi Ijin Keluar Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(tb_ijinkeluar  $ijinkeluar)
    {
        // $ijinkeluar = tb_ijinkeluar::find($id);
        $ijinkeluar->makeHidden(['id', 'gurupiket_id', 'siswa_id', 'kelas_id']);

        // return view('presensiharian.showhs', ['ijinkeluar'=> $ijinkeluar])->with([
        //     'user' => Auth::user()
        // ]);
        // $ijinkeluar = tb_ijinkeluar::where('gurupiket','siswa', 'kelas')->find($id);

        return view('presensiharian.showhs', compact('ijinkeluar'))->with([
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 'gurupiket_id',
        // 'siswa_id',
        // 'kelas_id',
        // 'ijin_jam',
        // 'tgl_ijinkeluar',
        // 'ket',
        // 'alasan'

        $gurupiket = tb_guru_piket::all();
        $siswa = tb_siswa::all();
        $kelas = tb_kelas::all();

        $ijinkeluar = tb_ijinkeluar::with('gurupiket', 'siswa', 'kelas')->find($id);

        return view('presensiharian.ediths', compact('ijinkeluar', 'gurupiket', 'siswa', 'kelas'))->with([
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
            'ijin_jam' => 'required',
            'tgl_ijinkeluar' => 'required',
            'ket' => 'required',
            'alasan' => 'required',
        ], [
            'gurupiket_id.required' => 'Guru Piket wajib diisi',
            'siswa_id.required' => 'Siswa wajib diisi',
            'kelas_id' => 'Kelas wajib diisi',
            'ijin_jam' => 'Ijin jam wajib diisi',
            'tgl_ijinkeluar' => 'Tanggal Ijin Keluar Wajib diisi',
            'ket' => 'Keterangan wajib diisi',
            'alasan' => 'Alasan Wajib diisi',
        ]);

        tb_ijinkeluar::find($id)->update([
            'gurupiket_id' => $request->gurupiket_id,
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'ijin_jam' => $request->ijin_jam,
            'tgl_ijinkeluar' => $request->tgl_ijinkeluar,
            'ket' => $request->ket,
            'alasan' => $request->alasan,
        ]);

        return redirect()->route('hs/index')->with('success', 'Berhasil Melakukan Update Data Presensi Ijin Keluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tb_ijinkeluar::find($id)->delete();

        return redirect()->route('hs/index')->with('success', 'Berhasil Melakukan Hapus Data Presensi Ijin Keluar ');
    }
}
