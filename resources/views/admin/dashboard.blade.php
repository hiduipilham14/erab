{{-- filepath: resources/views/admin/dashboard.blade.php --}}
@extends('template.main')
@section('content')
    <div class="container-xxl">
        <h4 class="py-1 mb-4">{{ $title }}</h4>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card h-100" style="border: 1px solid #e0e0e0; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.15);">
                    <div class="card-body py-4 position-relative">
                        <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 4px; background: #ff6b35; border-radius: 0 0 8px 8px;"></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h1 class="fw-bold mb-0" style="font-size: 3rem; color: #333;">{{ $jumlahPengguna }}</h1>
                                <p class="text-muted mb-0" style="font-size: 1rem; margin-top: 0.25rem;">Data Pengguna</p>
                            </div>
                            <i class="fas fa-users" style="font-size: 3rem; color: #a0a0a0;"></i> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100" style="border: 1px solid #e0e0e0; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.15);">
                    <div class="card-body py-4 position-relative">
                        <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 4px; background: #28a745; border-radius: 0 0 8px 8px;"></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h1 class="fw-bold mb-0" style="font-size: 3rem; color: #333;">{{ $jumlahRabBulanIni }}</h1>
                                <p class="text-muted mb-0" style="font-size: 1rem; margin-top: 0.25rem;">RAB Bulan ini</p>
                            </div>
                            <i class="fas fa-file-alt" style="font-size: 3rem; color: #a0a0a0;"></i> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100" style="border: 1px solid #e0e0e0; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.15);">
                    <div class="card-body py-4 position-relative">
                        <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 4px; background: #dc3545; border-radius: 0 0 8px 8px;"></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h1 class="fw-bold mb-0" style="font-size: 3rem; color: #333;">{{ $jumlahGisBulanIni }}</h1>
                                <p class="text-muted mb-0" style="font-size: 1rem; margin-top: 0.25rem;">GIS Bulan ini</p>
                            </div>
                            <i class="fas fa-file-alt" style="font-size: 3rem; color: #a0a0a0;"></i> </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Grafik RAB --}}
            <div class="col-md-6 mb-4">
                <div class="card h-100" style="border: 1px solid #e0e0e0; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.15);">
                    <div class="card-header bg-white py-3" style="border-bottom: 1px solid #e0e0e0;">
                        <h5 class="mb-0 fw-bold text-dark">Grafik RAB</h5>
                    </div>
                    <div class="card-body p-3" style="height: 350px;">
                        <canvas id="rabChart"></canvas>
                    </div>
                </div>
            </div>
            {{-- Grafik GIS --}}
            <div class="col-md-6 mb-4">
                <div class="card h-100" style="border: 1px solid #e0e0e0; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.15);">
                    <div class="card-header bg-white py-3" style="border-bottom: 1px solid #e0e0e0;">
                        <h5 class="mb-0 fw-bold text-dark">Grafik GIS</h5>
                    </div>
                    <div class="card-body p-3" style="height: 350px;">
                        <canvas id="gisChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data grafik RAB
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        function getRabDataByMonth(source) {
            let arr = Array(12).fill(0);
            source.forEach(item => { arr[item.bulan - 1] = item.jumlah; });
            return arr;
        }
        const rabLabels = months;
        const rabData = getRabDataByMonth(@json($rabPerBulan));

        new Chart(document.getElementById('rabChart'), {
            type: 'bar',
            data: {
                labels: rabLabels,
                datasets: [{
                    label: 'Data RAB',
                    data: rabData,
                    backgroundColor: '#ff6b35',
                    borderColor: '#ff6b35',
                    borderWidth: 0,
                    barThickness: 20,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 10,
                        bottom: 10
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'start',
                        labels: {
                            boxWidth: 20,
                            font: {
                                size: 10
                            },
                            color: '#666',
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 9
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f0f0f0'
                        },
                        title: {
                            display: true,
                            text: 'Jumlah',
                            color: '#666',
                            font: {
                                size: 12,
                            }
                        },
                        ticks: {
                            color: '#666'
                        }
                    }
                }
            }
        });

        // Data grafik GIS
        // const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; // Already defined above
        function getDataByMonth(source) {
            let arr = Array(12).fill(0);
            source.forEach(item => { arr[item.bulan - 1] = item.jumlah; });
            return arr;
        }
        const updateGis = getDataByMonth(@json($updateGis));
        const jaringanBaru = getDataByMonth(@json($jaringanBaru));
        const penggantianPipa = getDataByMonth(@json($penggantianPipa));

        new Chart(document.getElementById('gisChart'), {
            type: 'bar',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'Update GIS',
                        data: updateGis,
                        backgroundColor: '#ff6b35',
                        borderWidth: 0,
                        barThickness: 12,
                        borderRadius: 2
                    },
                    {
                        label: 'Jaringan Baru',
                        data: jaringanBaru,
                        backgroundColor: '#1E429F',
                        borderWidth: 0,
                        barThickness: 12,
                        borderRadius: 2
                    },
                    {
                        label: 'Penggantian Pipa',
                        data: penggantianPipa,
                        backgroundColor: '#31C48D',
                        borderWidth: 0,
                        barThickness: 12,
                        borderRadius: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 10,
                        bottom: 10
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'start',
                        labels: {
                            boxWidth: 20,
                            font: {
                                size: 10
                            },
                            color: '#666'
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#666'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f0f0f0'
                        },
                        title: {
                            display: true,
                            text: 'Jumlah',
                            color: '#666',
                            font: {
                                size: 12,
                            }
                        },
                        ticks: {
                            color: '#666'
                        }
                    }
                }
            }
        });
    </script>
@endsection
