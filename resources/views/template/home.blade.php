@extends('template.main')

@section('judul')
SMP NEGERI 2 TEMPEL
@endsection

@section('isi')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body dashboard-tabs p-0">
                <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#guru" role="tab" aria-controls="overview" aria-selected="true">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#siswa" role="tab" aria-controls="sales" aria-selected="false">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="purchases-tab" data-bs-toggle="tab" href="#kelas" role="tab" aria-controls="purchases" aria-selected="false">Kelas</a>
                    </li>
                </ul>
                <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="guru" role="tabpanel" aria-labelledby="overview-tab">
                        <div class="d-flex flex-wrap justify-content-xl-between">

                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Total Guru</small>
                                    <h5 class="me-2 mb-0">{{$guru}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="siswa" role="tabpanel" aria-labelledby="sales-tab">
                        <div class="d-flex flex-wrap justify-content-xl-between">
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Total Siswa</small>
                                    <h5 class="me-2 mb-0">{{$siswa}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kelas" role="tabpanel" aria-labelledby="purchases-tab">
                        <div class="d-flex flex-wrap justify-content-xl-between">
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Total Kelas</small>
                                    <h5 class="me-2 mb-0">{{$kelas}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="text-success mt-2">VISI DAN MISI</h3>
                <div class="brand-logo">
                    <img src="{{ asset('/') }}images/logo-smp.png" class="rounded mx-auto d-block">
                </div>
                    <p class="text-center mt-3 text-bold"> a. Visi <br>
                        <br>“Unggul Dalam Prestasi, Berbudaya, Berwawasan Global, dan Berlandaskan Imtaq”<br>
                        <br>b.	Misi
                        <ol>
                        <li>Melaksanakan pengembangan kurikulum sesuai kebutuhan sekolah. </li>
                        <li>Meningkatkan prestasi akademik dan nonakademik melalui kegiatan peningkatan mutu pembelajaran dan sarana pembelajaran. </li>
                        <li>Melakukan sistem pembelajaran dan bimbingan secara aktif, inovatif, kreatif, efektif, dan menyenangkan sehingga setiap peserta didik dapat berkembang secara optimal sesuai dengan potensi yang dimiliki.</li> 
                        <li>Meningkatkan penguasaan teknologi informasi dan komunikasi.</li>
                        <li>Memenuhi sarana dan prasarana pendidikan sesuai kebutuhan peserta didik.</li> 
                        <li>Melaksanakan pengelolaan sesuai sistem pendidikan yang transparan dan akuntabel.</li> 
                        <li>Mewujudkan sistem penilaian sesuai standar nasional pendidikan. </li>
                        <li>Melakukan kegiatan keagamaan sesuai agama masing-masing.</li>
                        </ol>
                        </p>
                {{-- <p class="text-secondary mt-4"></p>
                <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                <canvas id="cash-deposits-chart"></canvas> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card container-fluid">
        <div class="card">
            <div class="card-body">
                <h3 class="text-success mt-2">ALAMAT</h3>
                <p class="text-secondary mt-4">Jl. Balangan Tempel, Banyu Rejo, Tempel, Kemusuh, Banyurejo, Kec. Sleman, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55552</p>
                <p class="text-muted mt-4">MAPS </p>
                <div id="total-sales-chart-legend">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.8249998563147!2d110.2836676!3d-7.7019210000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af5cb5175c381%3A0xe7a3d7423dabd7c2!2sSMP%20Negeri%202%20Tempel!5e0!3m2!1sid!2sid!4v1689408210040!5m2!1sid!2sid" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                </div>
            </div>
            <h4 class="card-title">Bar chart</h4>
            <div id="barChart" width="583" height="291"></div>
        </div>
    </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var guru2 = <?php echo json_encode($guru2) ?>;
    var siswa2 = <?php echo json_encode($siswa2) ?>;
    var kelas2 = <?php echo json_encode($kelas2) ?>;

    Highcharts.chart('barChart', {
        title: {
            text: 'Data Guru, Siswa, dan Kelas SMP Negeri 2 Tempel'
        },
        xAxis: {
            categories: ['2023', '2024', '2025', '2026']
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
                name: 'Guru',
                data: guru2
            },
            {
                name: 'Siswa',
                data: siswa2
            },
            {
                name: 'Kelas',
                data: kelas2
            }
        ],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>

@endsection