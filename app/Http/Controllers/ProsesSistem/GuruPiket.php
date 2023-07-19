<?php

namespace App\Http\Controllers\ProsesSistem;

use App\Models\tb_guru_piket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class GuruPiket extends Controller
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
            $gurupiket = tb_guru_piket::where('nm_gp', 'like', "%$katakunci%")
                ->orWhere('je_kel', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $gurupiket = tb_guru_piket::orderBy('nm_gp', 'asc')->paginate($jumlahbaris);
        }
        // $guru = tb_guru::paginate(1);
        return view('gurupiket.indexgp', ['gurupiket' => $gurupiket])->with([
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
        return view('gurupiket.creategp')->with([
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
        Session::flash('nm_gp', $request->nm_gp);
        Session::flash('je_kel', $request->je_kel);

        $request->validate([
            'nm_gp' => 'required|max:50',
            'je_kel' => 'required',
        ], [
            'nm_gp.required' => 'Nama wajib diisi',
            'je_kel.required' => 'Jenis Kelamin wajib diisi',
        ]);
        tb_guru_piket::create([
            'nm_gp' => $request->nm_gp,
            'je_kel' => $request->je_kel,
        ]);

        return redirect()->route('gp/index')->with('success', 'Data Guru Piket Berhasil Ditambahkan');
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
        $gurupiket = tb_guru_piket::find($id);

        return view('gurupiket.editgp', ['gurupiket' => $gurupiket])->with([
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
        tb_guru_piket::find($id)->update(['nm_gp' => $request->nm_gp]);

        return redirect()->route('gp/index')->with('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tb_guru_piket::find($id)->delete();

        return redirect()->route('gp/index')->with('success', 'Berhasil melakukan Delete Data ');
    }
}
