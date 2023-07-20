<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\tb_presensi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Laporan extends Controller
{
    public function jadwal(Request $request)
    {
        $admin = DB::table('tb_jadwalbelajar as a')
            ->select('a.*', 'b.nm_guru', 'c.nm_mapel', 'd.nm_kelas', 'e.semester', 'f.thn_ajaran')
            ->join('tb_guru as b', 'a.guru_id', '=', 'b.id')
            ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->join('tb_semester as e', 'a.semester_id', '=', 'e.id')
            ->join('tb_thn_ajaran as f', 'a.tahunajaran_id', '=', 'f.id')
            ->get();
        $results = [
            'pagetitle' => 'Laporan Jadwal Belajar Admin',
            'admin' => $admin,
        ];
        return view('laporan.jadwalbelajar.admin', $results);
    }

    public function jadwalpdf()
    {
        $admin = DB::table('tb_jadwalbelajar as a')
            ->select('a.*', 'b.nm_guru', 'c.nm_mapel', 'd.nm_kelas', 'e.semester', 'f.thn_ajaran')
            ->join('tb_guru as b', 'a.guru_id', '=', 'b.id')
            ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->join('tb_semester as e', 'a.semester_id', '=', 'e.id')
            ->join('tb_thn_ajaran as f', 'a.tahunajaran_id', '=', 'f.id')
            ->get();
        $url = '/download-laporan-jadwal-belajar-admin';
        $results = [
            'pagetitle' => 'Laporan Jadwal Belajar',
            'admin' => $admin,
            'url' => $url
        ];
        $jadwalpdf = PDF::loadView('laporan.pdf.jadwalbelajar.admin', compact('results', 'admin'))->setPaper('a4', 'portrait');
        return $jadwalpdf->stream('laporan-jadwal-belajar.pdf');
    }

    public function presensi()
    {
        if (!empty($_GET["tgl_dari"]) && !empty($_GET["tgl_sampai"]) && empty($_GET["keterangan"])) {
            $tanggal_mulai = $_GET["tgl_dari"];
            $tanggal_sampai = $_GET["tgl_sampai"];
            $getmonth = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.tgl_absen', '>=', $tanggal_mulai)
                ->where('a.tgl_absen', '<=', $tanggal_sampai)
                ->get();

            $jumlahH = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'H')
                ->get();

            $jumlahI = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'I')
                ->get();

            $jumlahS = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'S')
                ->get();

            $jumlahA = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'A')
                ->get();

            $jumH = $jumlahH->count();
            $totalH = $jumH;

            $jumI = $jumlahI->count();
            $totalI = $jumI;

            $jumS = $jumlahS->count();
            $totalS = $jumS;

            $jumA = $jumlahA->count();
            $totalA = $jumA;

            $presensi = $getmonth;
            $url = '/download-laporan?tgl_dari=' . $tanggal_mulai . '&tgl_sampai=' . $tanggal_sampai . '&keterangan=';
        } elseif (!empty($_GET["keterangan"]) && !empty($_GET["tgl_dari"]) && !empty($_GET["tgl_sampai"])) {
            $tanggal_mulai = $_GET["tgl_dari"];
            $tanggal_sampai = $_GET["tgl_sampai"];
            $keterangan = $_GET["keterangan"];
            $getmonth = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.tgl_absen', '>=', $tanggal_mulai)
                ->where('a.tgl_absen', '<=', $tanggal_sampai)
                ->where('a.ket_presensi', '=', $keterangan)
                ->get();


            $jumlahH = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'H')
                ->get();

            $jumlahI = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'I')
                ->get();

            $jumlahS = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'S')
                ->get();

            $jumlahA = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'A')
                ->get();

            $jumH = $jumlahH->count();
            $totalH = $jumH;

            $jumI = $jumlahI->count();
            $totalI = $jumI;

            $jumS = $jumlahS->count();
            $totalS = $jumS;

            $jumA = $jumlahA->count();
            $totalA = $jumA;
            $jum = $getmonth->count();

            $presensi = $getmonth;
            $url = '/download-laporan?tgl_dari=' . $tanggal_mulai . '&tgl_sampai=' . $tanggal_sampai . '&keterangan=' . $keterangan;
        } elseif (!empty($_GET["keterangan"]) && empty($_GET["tgl_dari"]) && empty($_GET["tgl_sampai"])) {
            $keterangan = $_GET["keterangan"];
            $getmonth = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', $keterangan)
                ->get();


            $jumlahH = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'H')
                ->get();

            $jumlahI = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'I')
                ->get();

            $jumlahS = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'S')
                ->get();

            $jumlahA = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'A')
                ->get();

            $jumH = $jumlahH->count();
            $totalH = $jumH;

            $jumI = $jumlahI->count();
            $totalI = $jumI;

            $jumS = $jumlahS->count();
            $totalS = $jumS;

            $jumA = $jumlahA->count();
            $totalA = $jumA;
            $$jum = $getmonth->count();

            $presensi = $getmonth;
            $url = '/download-laporan?tgl_dari=&tgl_sampai=&keterangan=' . $keterangan;
        } else {
            $all = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->get();

            $jumlahH = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'H')
                ->get();

            $jumlahI = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'I')
                ->get();

            $jumlahS = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'S')
                ->get();

            $jumlahA = DB::table('tb_presensi as a')
                ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
                ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
                ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
                ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
                ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
                ->where('a.ket_presensi', '=', 'A')
                ->get();

            $jumH = $jumlahH->count();
            $totalH = $jumH;

            $jumI = $jumlahI->count();
            $totalI = $jumI;

            $jumS = $jumlahS->count();
            $totalS = $jumS;

            $jumA = $jumlahA->count();
            $totalA = $jumA;

            $presensi = $all;
            $url = '/download-laporan';
        }
        $keterangan = tb_presensi::get();
        $results = [
            'pagetitle' => 'Data Presensi',
            'presensi' => $presensi,
            'totalh' => $totalH,
            'totali' => $totalI,
            'totals' => $totalS,
            'totala' => $totalA,
            'keterangan' => $keterangan,
            'url' => $url,
        ];
        return view('laporan.presensi.admin', $results);
    }

    public function presensipdf(Request $request)
    {
        $admin = DB::table('tb_presensi as a')
            ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
            ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
            ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id')
            ->get();
        $url = '/download-laporan-presensi-admin';
        $results = [
            'pagetitle' => 'Laporan Jadwal Presensi',
            'admin' => $admin,
            'url' => $url
        ];
        $jadwalpdf = PDF::loadView('laporan.pdf.presensi.admin', compact('results', 'admin'))->setPaper('a4', 'portrait');
        return $jadwalpdf->stream('laporan-presensi.pdf');
    }

    public function ijinkeluar(Request $request)
    {
        $admin = DB::table('tb_ijinkeluar as a')
            ->select('a.*', 'b.nm_gp', 'c.nis', 'c.nm_siswa', 'd.nm_kelas')
            ->join('tb_guru_piket as b', 'a.gurupiket_id', '=', 'b.id')
            ->join('tb_siswa as c', 'a.siswa_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->get();
        $results = [
            'pagetitle' => 'Laporan Ijin Keluar',
            'admin' => $admin,
        ];
        return view('laporan.ijinkeluar.admin', $results);
    }

    public function ijinkeluarpdf(Request $request)
    {
        $admin = DB::table('tb_ijinkeluar as a')
            ->select('a.*', 'b.nm_gp', 'c.nis', 'c.nm_siswa', 'd.nm_kelas')
            ->join('tb_guru_piket as b', 'a.gurupiket_id', '=', 'b.id')
            ->join('tb_siswa as c', 'a.siswa_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->get();
        $url = '/download-laporan-ijin-keluar-admin';
        $results = [
            'pagetitle' => 'Laporan Ijin Keluar',
            'admin' => $admin,
            'url' => $url
        ];
        $jadwalpdf = PDF::loadView('laporan.pdf.ijinkeluar.admin', compact('results', 'admin'))->setPaper('a4', 'portrait');
        return $jadwalpdf->stream('laporan-izin-keluar.pdf');
    }

    public function ijinmasuk(Request $request)
    {
        $admin = DB::table('tb_ijinmasuk as a')
            ->select('a.*', 'b.nm_gp', 'c.nis', 'c.nm_siswa', 'd.nm_kelas')
            ->join('tb_guru_piket as b', 'a.gurupiket_id', '=', 'b.id')
            ->join('tb_siswa as c', 'a.siswa_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->get();
        $results = [
            'pagetitle' => 'Laporan Ijin Masuk',
            'admin' => $admin,
        ];
        return view('laporan.ijinmasuk.admin', $results);
    }

    public function ijinmasukpdf(Request $request)
    {
        $admin = DB::table('tb_ijinmasuk as a')
            ->select('a.*', 'b.nm_gp', 'c.nis', 'c.nm_siswa', 'd.nm_kelas')
            ->join('tb_guru_piket as b', 'a.gurupiket_id', '=', 'b.id')
            ->join('tb_siswa as c', 'a.siswa_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->get();
        $url = '/download-laporan-ijin-masuk-admin';
        $results = [
            'pagetitle' => 'Laporan Ijin Masuk',
            'admin' => $admin,
            'url' => $url
        ];
        $jadwalpdf = PDF::loadView('laporan.pdf.ijinmasuk.admin', compact('results', 'admin'))->setPaper('a4', 'portrait');
        return $jadwalpdf->stream('laporan-izin-masuk.pdf');
    }


    public function kehadiran(Request $request)
    {
        $data = DB::table('tb_presensi as a')
            ->select('a.*', 'b.nis', 'b.nm_siswa')
            ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
            ->get();
        $hal = DB::table('tb_presensi as a')
            ->select('a.*', 'b.nis', 'b.nm_siswa')
            ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
            ->paginate(3);
        $jum = $data->count();
        return view('laporan.kehadiran', compact('data', 'hal', 'jum'));
    }

    public function kehadiranpdf(Request $request)
    {
        $data = DB::table('tb_presensi as a')
            ->select('a.*', 'b.nis', 'b.nm_siswa')
            ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
            ->get();
        $jum = $data->count();
        $url = '/download-laporan-ijin-masuk-admin';
        $jadwalpdf = PDF::loadView('laporan.pdf.kehadiran', compact('data', 'jum'))->setPaper('a4', 'portrait');
        return $jadwalpdf->stream($url . '.pdf');
    }
}
