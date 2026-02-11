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
        .sidebar { width: 250px; height: 100vh; position: fixed; background: #2c3e50; color: white; padding-top: 20px; }
        .sidebar .nav-link { color: #bdc3c7; padding: 12px 20px; transition: 0.3s; border-left: 4px solid transparent; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: #34495e; color: white; border-left: 4px solid #3498db; }
        .content { margin-left: 250px; padding: 30px; }
        .card-stat { border: none; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="text-center mb-4">
        <h4><i class="fas fa-clinic-medical"></i> RS ADMIN</h4>
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
    <h2 class="mb-4">Dashboard Utama</h2>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card card-stat p-3 bg-white">
                <small class="text-muted">Pasien Hari Ini</small>
                <h2 class="text-primary"><?= $stats['pasien'] ?></h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat p-3 bg-white">
                <small class="text-muted">Total Pemeriksaan</small>
                <h2 class="text-success"><?= $stats['pemeriksaan'] ?></h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat p-3 bg-white">
                <small class="text-muted">Pembayaran Lunas</small>
                <h2 class="text-warning"><?= $stats['pembayaran'] ?></h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat p-3 bg-white">
                <small class="text-muted">Obat Diserahkan</small>
                <h2 class="text-info"><?= $stats['obat'] ?></h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card card-stat p-4 bg-white mb-4">
                <h5>Aktivitas Pemeriksaan Terakhir</h5>
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>Pasien</th><th>Poli</th><th>Diagnosa</th><th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($riwayat as $r): ?>
                        <tr>
                            <td><?= $r['pasien'] ?></td>
                            <td><span class="badge bg-secondary"><?= $r['poli'] ?></span></td>
                            <td><?= $r['diagnosis'] ?></td>
                            <td><?= date('H:i', strtotime($r['exam_date'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stat p-4 bg-white">
                <h5>Statistik Kunjungan</h5>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Umum', 'Gigi', 'Anak'],
            datasets: [{
                data: [12, 19, 3],
                backgroundColor: ['#3498db', '#2ecc71', '#e74c3c']
            }]
        }
    });
</script>
</body>
</html>