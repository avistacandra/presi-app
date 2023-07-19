<?php

namespace App\Http\Controllers\ProsesSistem;

use Illuminate\Http\Request;
use App\Models\tb_semester;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class Semester extends Controller
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
            $semester = tb_semester::where('semester', 'like', "%$katakunci%")
                ->orWhere('status_sem', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $semester = tb_semester::orderBy('semester', 'desc')->paginate($jumlahbaris);
        }

        return view('semester.indexsem', ['semester' => $semester])->with([
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
        return view('semester.createsem')->with([
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
            'semester' => 'required|max:30',
            'status_sem' => 'required|max:30',
        ], [
            'semester.required' => 'Semester wajib diisi',
            'status_sem.required' => 'Status semester wajib diisi',
        ]);
        tb_semester::create([
            'semester' => $request->semester,
            'status_sem' => $request->status_sem,
        ]);

        return redirect()->route('semester/index')->with('success', 'Berhasil Melakukan Tambah Data');
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
        $semester = tb_semester::find($id);

        return view('semester.editsem', ['semester' => $semester])->with([
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
            'semester' => 'required|max:30',
            'status_sem' => 'required|max:30',
        ], [
            'semester.required' => 'Semester wajib diisi',
            'status_sem.required' => 'Status semester wajib diisi',
        ]);
        tb_semester::find($id)->update([
            'semester' => $request->semester,
            'status_sem' => $request->status_sem,
        ]);

        return redirect()->route('semester/index')->with('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tb_semester::find($id)->delete();

        return redirect()->route('semester/index')->with('success', 'Berhasil Melakukan Hapus Data');
    }
}
