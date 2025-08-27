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
                        <h5 class="card-title">Total <span>| Kelompok</span></h5>
                        <div class="d-flex align-items-center">
                            <div
                                class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-info bg-opacity-10">
                                <i class="bi bi-people-fill text-info"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $total ?? '0' }} Kelompok</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Pendaftar per Kecamatan</h5>
                        <div style="height:380px; overflow-x:auto;">
                            <canvas id="chartPendaftaran"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Pendaftar per Jenis Kelompok</h5>
                        <div style="height:380px;">
                            <canvas id="chartJenisKelompok"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
@section('scripts')
<script>
    $(function() {
        $.ajax({
            url: "{{ route('chart.pendaftaran-per-kecamatan') }}",
            type: "GET",
            dataType: "json",
            success: function(res) {
                const ctx = document.getElementById('chartPendaftaran').getContext('2d');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: res.labels,
                        datasets: [{
                            label: 'Jumlah Pendaftar',
                            data: res.data,
                            backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        indexAxis: 'x',
                        scales: {
                            x: {
                                ticks: {
                                    autoSkip: false,
                                    maxRotation: 60,
                                    minRotation: 30
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: true
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error("Gagal ambil data:", error);
            }
        });
        $.ajax({
            url: "{{ route('chart.pendaftaran-per-jenis-kelompok') }}",
            type: "GET",
            dataType: "json",
            success: function(res) {
                const ctx = document.getElementById('chartJenisKelompok').getContext('2d');

                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: res.labels,
                        datasets: [{
                            data: res.data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                                'rgba(255, 159, 64, 0.7)'
                            ],
                            borderColor: '#fff',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error("Gagal ambil data piechart:", error);
            }
        });
    });
</script>
@endsection