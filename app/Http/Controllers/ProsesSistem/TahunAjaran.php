<?php

namespace App\Http\Controllers\ProsesSistem;

use App\Models\tb_thn_ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TahunAjaran extends Controller
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
            $tahunajaran = tb_thn_ajaran::where('thn_ajaran', 'like', "%$katakunci%")
                ->orWhere('status_ta', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $tahunajaran = tb_thn_ajaran::orderBy('thn_ajaran', 'desc')->paginate($jumlahbaris);
        }

        return view('tahunajaran.indexta', ['tahunajaran' => $tahunajaran])->with([
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
        return view('tahunajaran.createta')->with([
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
            'thn_ajaran' => 'required|max:30',
            'status_ta' => 'required|max:30',
        ], [
            'thn_ajaran.required' => 'Tahun Ajaran wajib diisi',
            'status_ta.required' => 'Status tahun ajaran wajib diisi',
        ]);
        tb_thn_ajaran::create([
            'thn_ajaran' => $request->thn_ajaran,
            'status_ta' => $request->status_ta,
        ]);

        return redirect()->route('ta/index')->with('success', 'Data Tahun Ajaran Berhasil Ditambahkan');
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
        $tahunajaran = tb_thn_ajaran::find($id);

        return view('tahunajaran.editta', ['tahunajaran' => $tahunajaran])->with([
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
            'thn_ajaran' => 'required|max:30',
            'status_ta' => 'required|max:30',
        ], [
            'thn_ajaran.required' => 'Tahun Ajaran wajib diisi',
            'status_ta.required' => 'Status tahun ajaran wajib diisi',
        ]);
        tb_thn_ajaran::find($id)->update([
            'thn_ajaran' => $request->thn_ajaran,
            'status_ta' => $request->status_ta,
        ]);

        return redirect()->route('ta/index')->with('success', 'Data Tahun Ajaran Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tb_thn_ajaran::find($id)->delete();

        return redirect()->route('ta/index')->with('success', 'Berhasil Melakukan Hapus Data Tahun Ajaran');
    }
}
