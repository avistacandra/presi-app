<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">DASHBOARD</span>
    </a>
</li>

@if(Auth::user()->level==1)

<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-server menu-icon"></i>
        <span class="menu-title">DATA MASTER</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('guru/index') }}">Data Guru</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('kelas/index') }}">Data Kelas</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('data/mapel') }}">Data Mapel</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('semester/index') }}">Data Semester</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('ta/index') }}">Data Tahun Ajaran</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('siswa/index') }}">Data Siswa</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('gp/index') }}">Data Guru Piket</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-file menu-icon"></i>
        <span class="menu-title">PROSES SISTEM</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('jb/index') }}">Data Jadwal Belajar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('pm/index') }}">Data Presensi Mapel</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('hs/index') }}">Data Ijin Keluar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('im/index') }}">Data Ijin Masuk</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-printer menu-icon"></i>
        <span class="menu-title">LAPORAN</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">

        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('laporan/jadwal/belajar') }}">Laporan Jadwal Belajar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('laporan/presensi') }}">Laporan Presensi Mapel</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('ijin/keluar') }}">Laporan Ijin Keluar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('ijin/masuk') }}">Laporan Ijin Masuk</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('lap/kehadiran') }}">Laporan Kehadiran</a></li> --}}

        </ul>
    </div>
</li>

@elseif(Auth::user()->level==2)
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-server menu-icon"></i>
        <span class="menu-title">DATA MASTER</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('guru/index') }}">Data Guru</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('siswa/index') }}">Data Siswa</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-file menu-icon"></i>
        <span class="menu-title">PROSES SISTEM</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('jb/index') }}">Data Jadwal Belajar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('pm/index') }}">Data Presensi Mapel</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-printer menu-icon"></i>
        <span class="menu-title">LAPORAN</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('laporan/jadwal/belajar') }}">Laporan Jadwal Belajar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('laporan/presensi') }}">Laporan Presensi Mapel</a></li>
        </ul>
    </div>
</li>

@elseif(Auth::user()->level==3)
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-server menu-icon"></i>
        <span class="menu-title">DATA MASTER</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('siswa/index') }}">Data Siswa</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('guru/index') }}">Data Guru</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('kelas/index') }}">Data Kelas</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('data/mapel') }}">Data Mapel</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-file menu-icon"></i>
        <span class="menu-title">PROSES SISTEM</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('jb/index') }}">Data Jadwal Belajar</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-printer menu-icon"></i>
        <span class="menu-title">LAPORAN</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('laporan/jadwal/belajar') }}">Laporan Jadwal Belajar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('laporan/presensi') }}">Laporan Presensi Mapel</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('ijin/keluar') }}">Laporan Ijin Keluar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('ijin/masuk') }}">Laporan Ijin Masuk</a></li>
        </ul>
    </div>
</li>

@elseif(Auth::user()->level==4)
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-server menu-icon"></i>
        <span class="menu-title">DATA MASTER</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('siswa/index') }}">Data Siswa</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('gp/index') }}">Data Guru Piket</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-file menu-icon"></i>
        <span class="menu-title">PROSES SISTEM</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('hs/index') }}">Data Ijin Keluar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('im/index') }}">Data Ijin Masuk</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-printer menu-icon"></i>
        <span class="menu-title">LAPORAN</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('ijin/keluar') }}">Laporan Ijin Keluar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('ijin/masuk') }}">Laporan Ijin Masuk</a></li>
        </ul>
    </div>
</li>
@endif