@extends('layout.footer')

@extends('layout.content')

@section('content')
@php
    // Ambil data peminjaman per hari
    $dataPeminjamHariIni = \App\Models\PeminjamanModel::whereDate('tanggal_pinjam', today())->count();

    // Ambil buku yang belum dikembalikan (peminjaman yang tidak memiliki tanggal kembali)
    $bukuBelumKembali = \App\Models\PeminjamanModel::whereNull('tanggal_kembali')->get();
    $dataBukuBelumKembali = $bukuBelumKembali->count();

    // Ambil buku terfavorit berdasarkan banyaknya peminjaman
    $bukuIds = $bukuBelumKembali->pluck('kode_buku'); // Pastikan Anda memiliki kolom ini di tabel peminjaman
    $dataBukuTerfavorit = \App\Models\DetailPeminjamanModel::select('kode_buku')
        ->whereIn('kode_buku', $bukuIds)
        ->groupBy('kode_buku')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->get();
    $jumlahBukuFavorit = $dataBukuTerfavorit->count();
@endphp


    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mt-3">
                            <h3>{{ $dataPeminjamHariIni }}</h3>
                            <p>Data Peminjam Per Hari</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                </div>
                <a href="#" class="card-footer text-dark text-center">
                    Selengkapnya<i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mt-3">
                            <h3>{{ $dataBukuBelumKembali }}</h3>
                            <p>Buku belum kembali</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-book"></i>
                        </div>
                    </div>
                </div>
                <a href="#" class="card-footer text-dark text-center">
                    Selengkapnya<i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mt-3">
                            <h3>{{ $jumlahBukuFavorit }}</h3>
                            <p>Buku TerFavorit</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-book"></i>
                        </div>
                    </div>
                </div>
                <a href="#" class="card-footer text-dark text-center">
                    Selengkapnya<i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Laporan<span>/Hari ini</span></h5>

                <!-- Line Chart -->
                <div id="reportsChart" style="min-height: 365px;"></div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#reportsChart"), {
                            series: [{
                                name: 'Data Peminjam Per Hari',
                                data: [31, 40, 28, 51, 42, 82, 56], // Ganti dengan data dinamis
                            }, {
                                name: 'Buku belum kembali',
                                data: [11, 32, 45, 32, 34, 52, 41] // Ganti dengan data dinamis
                            }, {
                                name: 'Buku Terfavorit',
                                data: [15, 11, 32, 18, 9, 24, 11] // Ganti dengan data dinamis
                            }],
                            chart: {
                                height: 350,
                                type: 'area',
                                toolbar: {
                                    show: false
                                },
                            },
                            markers: {
                                size: 4
                            },
                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                            fill: {
                                type: "gradient",
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.3,
                                    opacityTo: 0.4,
                                    stops: [0, 90, 100]
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth',
                                width: 2
                            },
                            xaxis: {
                                type: 'datetime',
                                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z",
                                    "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z",
                                    "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                                    "2018-09-19T06:30:00.000Z"
                                ]
                            },
                            tooltip: {
                                x: {
                                    format: 'dd/MM/yy HH:mm'
                                },
                            }
                        }).render();
                    });
                </script>
                <!-- End Line Chart -->

            </div>
        </div>
    </div>
@endsection

@extends('layout.header')
