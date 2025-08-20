@extends('layout.app')
@section('content')
<div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah <span>| Terverifikasi</span></h5>
                        <div class="d-flex align-items-center">
                            <div
                                class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-success bg-opacity-10">
                                <i class="bi bi-check-circle-fill text-success"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $terverifikasi ?? '0' }} Berkas</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Terverifikasi -->

            <!-- Menunggu Verifikasi -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah <span>| Menunggu Verifikasi</span></h5>
                        <div class="d-flex align-items-center">
                            <div
                                class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-primary bg-opacity-10">
                                <i class="bi bi-hourglass-split text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $menunggu ?? '0' }} Berkas</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Menunggu -->

            <!-- Belum Lengkap -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah <span>| Belum Lengkap</span></h5>
                        <div class="d-flex align-items-center">
                            <div
                                class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-warning bg-opacity-10">
                                <i class="bi bi-exclamation-triangle-fill text-warning"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $belum_lengkap ?? '0'}} Berkas</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Belum Lengkap -->

            <!-- Ditolak -->
            <div class="col-xxl-6 col-md-6">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah <span>| Ditolak</span></h5>
                        <div class="d-flex align-items-center">
                            <div
                                class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-danger bg-opacity-10">
                                <i class="bi bi-x-circle-fill text-danger"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $ditolak ?? '0' }} Berkas</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Ditolak -->

            <!-- Total Kelompok Tani -->
            <div class="col-xxl-6 col-md-6">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Total <span>| Kelompok Tani</span></h5>
                        <div class="d-flex align-items-center">
                            <div
                                class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-info bg-opacity-10">
                                <i class="bi bi-people-fill text-info"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $total ?? '0' }} Kelompok Tani</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Reports <span>/Today</span></h5>

                    <!-- Line Chart -->
                    <div id="reportsChart"></div>

                    <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#reportsChart"), {
                            series: [{
                                name: 'Sales',
                                data: [31, 40, 28, 51, 42, 82, 56],
                            }, {
                                name: 'Revenue',
                                data: [11, 32, 45, 32, 34, 52, 41]
                            }, {
                                name: 'Customers',
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
        </div>
    </div>
</div>

@endsection