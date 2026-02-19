<<<<<<< HEAD
<?= $this->extend('Admin/Layout/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0 fw-bold text-dark">Dashboard Utama</h2>
            <p class="text-muted">Ringkasan aktivitas rumah sakit hari ini</p>
        </div>
        <span class="badge bg-primary px-3 py-2 fs-6 shadow-sm">
            <i class="far fa-calendar-alt me-2"></i> <?= date('d M Y') ?>
        </span>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { width: 250px; height: 100vh; position: fixed; background: #2c3e50; color: white; padding-top: 20px; z-index: 1000; }
        .sidebar .nav-link { color: #bdc3c7; padding: 12px 20px; transition: 0.3s; border-left: 4px solid transparent; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: #34495e; color: white; border-left: 4px solid #3498db; }
        .content { margin-left: 250px; padding: 30px; }
        .card-stat { border: none; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: 0.3s; }
        .card-stat:hover { transform: translateY(-5px); }
        .table thead { background-color: #f8f9fa; }
        .badge-poli { font-size: 0.8rem; padding: 5px 10px; border-radius: 20px; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="text-center mb-4">
        <h4><i class="fas fa-hospital-alt"></i> RS ADMIN</h4>
        <hr class="mx-3 border-secondary">
    </div>
    <nav class="nav flex-column">
        <a class="nav-link active" href="<?= base_url('admin') ?>"><i class="fas fa-home me-2"></i> Dashboard</a>
        <a class="nav-link" href="<?= base_url('admin/pendaftaran') ?>"><i class="fas fa-user-plus me-2"></i> Pendaftaran</a>
        <a class="nav-link" href="#"><i class="fas fa-walking me-2"></i> Kedatangan</a>
        <a class="nav-link" href="#"><i class="fas fa-users me-2"></i> Antrian</a>
        <a class="nav-link" href="#"><i class="fas fa-stethoscope me-2"></i> Pemeriksaan</a>
        <a class="nav-link" href="#"><i class="fas fa-money-bill-wave me-2"></i> Pembayaran</a>
        <a class="nav-link" href="#"><i class="fas fa-pills me-2"></i> Pengambilan Obat</a>
        <a class="nav-link" href="<?= base_url('admin/users') ?>"><i class="fas fa-users-cog me-2"></i> Manajemen User</a>
        <a class="nav-link text-danger mt-4" href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
    </nav>
</div>

<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Dashboard Utama</h2>
        <span class="badge bg-primary px-3 py-2"><i class="far fa-calendar-alt"></i> <?= date('d M Y') ?></span>
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
    </div>

    <div class="row mb-4 g-3">
        <div class="col-md-3">
            <div class="card card-stat p-3 bg-white border-start border-primary border-4">
<<<<<<< HEAD
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted fw-bold text-uppercase">Pasien Hari Ini</small>
                        <h2 class="text-primary mb-0 fw-bold"><?= number_format($stats['pasien']) ?></h2>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                        <i class="fas fa-user-injured fa-lg"></i>
                    </div>
                </div>
=======
                <small class="text-muted fw-bold">Pasien Hari Ini</small>
                <h2 class="text-primary mb-0"><?= number_format($stats['pasien']) ?></h2>
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat p-3 bg-white border-start border-success border-4">
<<<<<<< HEAD
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted fw-bold text-uppercase">Pemeriksaan</small>
                        <h2 class="text-success mb-0 fw-bold"><?= number_format($stats['pemeriksaan']) ?></h2>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded-circle text-success">
                        <i class="fas fa-stethoscope fa-lg"></i>
                    </div>
                </div>
=======
                <small class="text-muted fw-bold">Total Pemeriksaan</small>
                <h2 class="text-success mb-0"><?= number_format($stats['pemeriksaan']) ?></h2>
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat p-3 bg-white border-start border-warning border-4">
<<<<<<< HEAD
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted fw-bold text-uppercase">Pembayaran</small>
                        <h2 class="text-warning mb-0 fw-bold"><?= number_format($stats['pembayaran']) ?></h2>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded-circle text-warning">
                        <i class="fas fa-file-invoice-dollar fa-lg"></i>
                    </div>
                </div>
=======
                <small class="text-muted fw-bold">Pembayaran Lunas</small>
                <h2 class="text-warning mb-0"><?= number_format($stats['pembayaran']) ?></h2>
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat p-3 bg-white border-start border-info border-4">
<<<<<<< HEAD
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted fw-bold text-uppercase">Obat Keluar</small>
                        <h2 class="text-info mb-0 fw-bold"><?= number_format($stats['obat']) ?></h2>
                    </div>
                    <div class="bg-info bg-opacity-10 p-3 rounded-circle text-info">
                        <i class="fas fa-pills fa-lg"></i>
                    </div>
                </div>
=======
                <small class="text-muted fw-bold">Obat Diserahkan</small>
                <h2 class="text-info mb-0"><?= number_format($stats['obat']) ?></h2>
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
            </div>
        </div>
    </div>

    <div class="row">
<<<<<<< HEAD
        <div class="col-lg-8 mb-4">
            <div class="card card-stat shadow-sm h-100">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold text-gray-800">Aktivitas Pemeriksaan Terakhir</h5>
                    <a href="<?= base_url('admin/hasil-pemeriksaan') ?>" class="btn btn-sm btn-light text-primary fw-bold">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">Pasien</th>
                                    <th>Poliklinik</th>
                                    <th>Diagnosa</th>
                                    <th class="text-end pe-4">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($riwayat)): ?>
                                    <?php foreach ($riwayat as $r): ?>
                                        <tr>
                                            <td class="ps-4 fw-bold text-dark"><?= esc($r['pasien']) ?></td>
                                            <td>
                                                <span class="badge bg-primary bg-opacity-10 text-primary badge-poli border border-primary border-opacity-25">
                                                    <?= esc($r['poli']) ?>
                                                </span>
                                            </td>
                                            <td><?= esc($r['diagnosis']) ?></td>
                                            <td class="text-end pe-4 text-muted">
                                                <i class="far fa-clock me-1"></i> <?= date('H:i', strtotime($r['exam_date'])) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-5">
                                            <i class="fas fa-clipboard-list fa-2x mb-3 text-secondary"></i><br>
                                            Belum ada aktivitas pemeriksaan hari ini
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
=======
        <div class="col-md-8">
            <div class="card card-stat p-4 bg-white mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Aktivitas Pemeriksaan Terakhir</h5>
                    <a href="#" class="btn btn-sm btn-light text-primary">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Pasien</th>
                                <th>Poliklinik</th>
                                <th>Diagnosa</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($riwayat)): ?>
                                <?php foreach($riwayat as $r): ?>
                                <tr>
                                    <td class="fw-bold"><?= $r['pasien'] ?></td>
                                    <td><span class="badge bg-secondary badge-poli"><?= $r['poli'] ?></span></td>
                                    <td><?= $r['diagnosis'] ?></td>
                                    <td class="text-muted"><i class="far fa-clock"></i> <?= date('H:i', strtotime($r['exam_date'])) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="4" class="text-center text-muted">Belum ada aktivitas hari ini</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
                </div>
            </div>
        </div>

<<<<<<< HEAD
        <div class="col-lg-4 mb-4">
            <div class="card card-stat shadow-sm h-100">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="mb-0 fw-bold text-gray-800">Statistik Kunjungan Poli</h5>
                </div>
                <div class="card-body">
                    <div style="position: relative; height:250px;">
                        <canvas id="myChart"></canvas>
                    </div>
                    <hr class="my-4">
                    <div class="small text-muted d-flex align-items-start">
                        <i class="fas fa-info-circle me-2 mt-1 text-primary"></i> 
                        <span>Data ini menampilkan persentase kunjungan pasien berdasarkan Poliklinik hari ini.</span>
                    </div>
=======
        <div class="col-md-4">
            <div class="card card-stat p-4 bg-white">
                <h5 class="mb-4">Statistik Kunjungan</h5>
                <div style="position: relative; height:300px;">
                    <canvas id="myChart"></canvas>
                </div>
                <hr>
                <div class="small text-muted">
                    <i class="fas fa-info-circle"></i> Data berdasarkan jumlah pendaftaran per Poliklinik.
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
                </div>
            </div>
        </div>
    </div>
</div>

<script>
<<<<<<< HEAD
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('myChart');

        // Data dinamis dari Controller (Jika ada), kalau null pakai dummy
        // Pastikan controller mengirim variabel $chartLabels dan $chartData
        const labels = <?= json_encode($chartLabels ?? ['Umum', 'Gigi', 'Anak', 'THT']) ?>;
        const dataValues = <?= json_encode($chartData ?? [10, 5, 8, 3]) ?>;

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'],
                    hoverOffset: 4,
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                },
                cutout: '75%',
            }
        });
    });
</script>

<?= $this->endSection() ?>
=======
    // Integrasi Chart.js
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Umum', 'Gigi', 'Anak', 'THT'],
            datasets: [{
                data: [45, 25, 20, 10], // Data dummy, nanti bisa dikirim dari Controller
                backgroundColor: ['#3498db', '#2ecc71', '#e74c3c', '#f1c40f'],
                hoverOffset: 10,
                borderWidth: 0
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            },
            cutout: '70%'
        }
    });
</script>

</body>
</html>
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
