<?php

namespace App\Http\Controllers\ProsesSistem;

use App\Models\tb_guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class Guru extends Controller
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
            $guru = tb_guru::where('nip', 'like', "%$katakunci%")
                ->orWhere('nm_guru', 'like', "%$katakunci%")
                ->orWhere('je_kel', 'like', "%$katakunci%")
                ->orWhere('golongan', 'like', "%$katakunci%")
                ->orWhere('tgs_tambahan', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $guru = tb_guru::orderBy('nip', 'asc')->paginate($jumlahbaris);
        }
        // $guru = tb_guru::paginate(1);
        return view('guru.indexguru', ['guru' => $guru])->with([
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
        return view('guru.createguru')->with([
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
        Session::flash('nip', $request->nip);
        Session::flash('nm_guru', $request->nm_guru);
        Session::flash('je_kel', $request->je_kel);
        Session::flash('golongan', $request->golongan);
        Session::flash('tgs_tambahan', $request->tgs_tambahan);

        $request->validate([
            'nip' => 'required|max:18|unique:tb_guru,nip',
            'nm_guru' => 'required|max:50',
            'je_kel' => 'required',
            'golongan' => 'required',
            'tgs_tambahan' => 'required'
        ], [
            'nip.required' => 'NIP wajib diisi',
            'nip.required' => 'NIP tidak boleh lebih dari 18 karakter',
            'nip.required' => 'NIP yang diisikan sudah ada dalam database',
            'nm_guru.required' => 'Nama wajib diisi',
            'je_kel.required' => 'Jenis Kelamin wajib diisi',
            'golongan.required' => 'Golongan wajib diisi',
            'tgs_tambahan.required' => 'Tugas Tambahan wajib diisi',
        ]);
        tb_guru::create([
            'nip' => $request->nip,
            'nm_guru' => $request->nm_guru,
            'je_kel' => $request->je_kel,
            'golongan' => $request->golongan,
            'tgs_tambahan' => $request->tgs_tambahan,
        ]);

        return redirect()->route('guru/index')->with('success', 'Data Guru Berhasil Ditambahkan');
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
        $guru = tb_guru::find($id);

        return view('guru.editguru', ['guru' => $guru])->with([
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
            'nm_guru' => 'required|max:50',
            'je_kel' => 'required',
            'golongan' => 'required',
            'tgs_tambahan' => 'required'
        ], [
            'nm_guru.required' => 'Nama wajib diisi',
            'je_kel.required' => 'Jenis Kelamin wajib diisi',
            'golongan.required' => 'Golongan wajib diisi',
            'tgs_tambahan.required' => 'Tugas Tambahan wajib diisi',
        ]);
        // $guru = [
        //     'nm_guru'=>$request->nm_guru,
        //     'je_kel'=>$request->je_kel,
        //     'golongan'=>$request->golongan,
        //     'tgs_tambahan'=>$request->tgs_tambahan
        // ];
        tb_guru::find($id)->update([
            'nm_guru' => $request->nm_guru,
            'je_kel' => $request->je_kel,
            'golongan' => $request->golongan,
            'tgs_tambahan' => $request->tgs_tambahan,
        ]);

        return redirect()->route('guru/index')->with('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tb_guru::find($id)->delete();

        return redirect()->route('guru/index')->with('success', 'Berhasil melakukan Delete Data ');
    }
}
