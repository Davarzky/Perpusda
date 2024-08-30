@extends('layout.footer')


@extends('layout.content')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mt-3">
                            <h3>62<sup style="font-size: 20px"></sup></h3>
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
                            <h3>147<sup style="font-size: 20px"></sup></h3>
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
                            <h3>22<sup style="font-size: 20px"></sup></h3>
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
                <div id="reportsChart" style="min-height: 365px;">
                    <div id="apexcharts73cc9u14" class="apexcharts-canvas apexcharts73cc9u14 apexcharts-theme-light"
                        >
                        <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"
                            style="left: 115.038px; top: 302.2px;">
                            <div class="apexcharts-xaxistooltip-text"
                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 73.4062px;">
                                19/09/18 01:30</div>
                        </div>
                        <div
                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                            <div class="apexcharts-yaxistooltip-text"></div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#reportsChart"), {
                            series: [{
                                name: 'Data Peminjam Per Hari',
                                data: [31, 40, 28, 51, 42, 82, 56],
                            }, {
                                name: 'Buku belum kembali',
                                data: [11, 32, 45, 32, 34, 52, 41]
                            }, {
                                name: 'Buku Terfavorit',
                                data: [15, 11, 32, 18, 9, 24, 11]
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
    @endsection

    @extends('layout.header')
