<!DOCTYPE html>
<html lang="id">
<<<<<<< HEAD

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Pasien | Manajemen RS</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Animasi Custom */
        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.5s ease-out;
        }
    </style>
</head>

<body class="bg-gray-900 text-gray-100 font-sans antialiased">

    <div class="min-h-screen flex flex-col">

        <nav class="bg-gray-800 border-b border-gray-700 px-6 py-4 flex justify-between items-center sticky top-0 z-50 shadow-lg">
            <div class="flex items-center gap-3">
                <a href="<?= base_url('kasir/dashboard') ?>" class="bg-amber-600 p-2 rounded-lg hover:bg-amber-500 transition">
                    <i class="fas fa-arrow-left text-white text-xl"></i>
                </a>
                <div>
                    <h1 class="text-xl font-bold tracking-tight leading-none">Menu <span class="text-amber-500">Pembayaran</span></h1>
                    <p class="text-xs text-gray-400">Kasir Rawat Jalan</p>
                </div>
            </div>

            <div class="flex items-center gap-6">
                <div class="text-right hidden md:block">
                    <p class="text-sm font-semibold text-white"><?= session()->get('full_name') ?></p>
                    <p class="text-xs text-amber-400">Kasir</p>
                </div>
                <div class="h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center border-2 border-amber-500 shadow-amber-500/20">
                    <i class="fas fa-wallet text-amber-300"></i>
                </div>
            </div>
        </nav>

        <main class="flex-grow p-6 lg:p-8">
            <div class="max-w-7xl mx-auto">

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="mb-6 p-4 bg-emerald-900/20 border border-emerald-500/50 text-emerald-400 rounded-xl flex items-center gap-3 shadow-lg animate-fade-in-down">
                        <i class="fas fa-check-circle text-xl"></i>
                        <div>
                            <p class="font-bold">Berhasil!</p>
                            <p class="text-sm opacity-90"><?= session()->getFlashdata('success') ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-1 space-y-6">

                        <div class="bg-gray-800 rounded-2xl shadow-xl border border-gray-700 p-6">
                            <h3 class="font-bold text-lg text-amber-400 mb-4 border-b border-gray-700 pb-2">
                                <i class="fas fa-chart-pie mr-2"></i> Ringkasan Hari Ini
                            </h3>

                            <div class="relative h-56 w-full flex justify-center">
                                <canvas id="pembayaranChart"></canvas>
                            </div>

                            <div class="mt-4 grid grid-cols-2 gap-4 text-center">
                                <div class="bg-gray-700/50 p-3 rounded-lg border border-red-500/30">
                                    <p class="text-xs text-gray-400 uppercase">Belum Bayar</p>
                                    <p class="text-xl font-bold text-red-400"><?= $count_unpaid ?></p>
                                </div>
                                <div class="bg-gray-700/50 p-3 rounded-lg border border-emerald-500/30">
                                    <p class="text-xs text-gray-400 uppercase">Lunas</p>
                                    <p class="text-xl font-bold text-emerald-400"><?= $count_paid ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-blue-900/20 p-4 rounded-xl border border-blue-800 flex items-start gap-3">
                            <i class="fas fa-info-circle text-blue-400 mt-1"></i>
                            <div class="text-sm text-blue-200">
                                <p class="font-bold">Instruksi:</p>
                                <p class="opacity-80">Pilih metode pembayaran yang sesuai (Tunai/Kartu/Asuransi) sebelum menekan tombol proses.</p>
                            </div>
                        </div>

                    </div>

                    <div class="lg:col-span-2">
                        <div class="bg-gray-800 rounded-2xl shadow-xl border border-gray-700 overflow-hidden">

                            <div class="p-6 border-b border-gray-700 bg-gray-800/80 backdrop-blur-sm flex justify-between items-center">
                                <h3 class="font-bold text-lg text-white flex items-center gap-2">
                                    <i class="fas fa-file-invoice-dollar text-amber-500"></i> Tagihan Pasien
                                </h3>
                                <span class="bg-gray-700 text-gray-300 px-3 py-1 rounded-full text-xs font-mono">
                                    <?= date('d M Y') ?>
                                </span>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="bg-gray-700/30 text-gray-400 text-xs uppercase tracking-wider border-b border-gray-700">
                                            <th class="px-6 py-4 font-bold">Pasien</th>
                                            <th class="px-6 py-4 font-bold">Poli</th>
                                            <th class="px-6 py-4 font-bold">Status</th>
                                            <th class="px-6 py-4 font-bold text-center">Proses Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-700">
                                        <?php if (!empty($tagihan)): ?>
                                            <?php foreach ($tagihan as $t): ?>
                                                <tr class="hover:bg-gray-700/30 transition-colors">

                                                    <td class="px-6 py-5">
                                                        <div>
                                                            <p class="font-bold text-white text-lg"><?= esc($t['full_name']) ?></p>
                                                            <p class="text-xs text-gray-500 font-mono">ID: #<?= $t['appointment_id'] ?></p>
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-5">
                                                        <span class="bg-gray-700 text-gray-300 px-2 py-1 rounded text-sm border border-gray-600">
                                                            <?= esc($t['poli']) ?>
                                                        </span>
                                                    </td>

                                                    <td class="px-6 py-5">
                                                        <span class="inline-flex items-center gap-1.5 bg-red-500/10 text-red-400 px-3 py-1 rounded-full text-xs font-bold border border-red-500/20">
                                                            <i class="fas fa-clock"></i> Pending
                                                        </span>
                                                    </td>

                                                    <td class="px-6 py-5">
                                                        <form action="<?= base_url('kasir/bayar/' . $t['appointment_id']) ?>" method="POST" class="flex flex-col sm:flex-row gap-2 justify-end">

                                                            <div class="relative min-w-[140px]">
                                                                <select name="metode" required class="appearance-none bg-gray-900 border border-gray-600 text-gray-300 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full pl-3 pr-8 py-2 cursor-pointer hover:border-amber-500 transition">
                                                                    <option value="cash">💵 Tunai</option>
                                                                    <option value="card">💳 Kartu</option>
                                                                    <option value="insurance">🛡️ Asuransi</option>
                                                                </select>
                                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                                                    <i class="fas fa-chevron-down text-xs"></i>
                                                                </div>
                                                            </div>

                                                            <button type="submit"
                                                                onclick="return confirm('Konfirmasi pembayaran untuk <?= $t['full_name'] ?>?')"
                                                                class="bg-amber-600 hover:bg-amber-500 text-white px-4 py-2 rounded-lg font-semibold transition shadow-lg shadow-amber-900/20 text-sm flex items-center justify-center gap-2">
                                                                <span>Bayar</span>
                                                                <i class="fas fa-paper-plane text-xs"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="px-6 py-16 text-center text-gray-500">
                                                    <i class="fas fa-check-double text-4xl mb-3 opacity-30"></i>
                                                    <p>Tidak ada tagihan pending saat ini.</p>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

=======
<head>
    <title>Pembayaran Pasien | RS Rawat Jalan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --sidebar-width: 16.666667%;
            --primary-color: #0d6efd;
            --danger-color: #ff4757;
            --success-color: #2ed573;
            --bg-light: #f4f7f6;
        }

        body { 
            background-color: var(--bg-light); 
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; 
            overflow-x: hidden; 
        }

        /* Sidebar Styling */
        .sidebar { 
            min-height: 100vh; 
            position: fixed; 
            top: 0; 
            left: 0; 
            z-index: 100; 
            width: var(--sidebar-width); 
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

         /* Nav Link Biasa (Tanpa Efek Menyala Active) */
        .nav-link {
            padding: 12px 15px;
            transition: 0.3s;
            color: rgba(255,255,255,0.7) !important;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: #fff !important;
        }

        /* Khusus Logout agar tetap jelas */
        .nav-link.text-danger:hover {
            background: rgba(255, 71, 87, 0.1);
        }

        /* Main Content Area */
        .main-content { 
            margin-left: var(--sidebar-width); 
            padding: 30px;
        }

        .card-custom {
            background: white; 
            border-radius: 15px; 
            border: none;
            box-shadow: 0 8px 24px rgba(0,0,0,0.05);
            padding: 25px;
        }

        .header-title { font-weight: 800; color: #2c3e50; }

        .badge-unpaid { 
            background-color: var(--danger-color); 
            color: white; 
            padding: 6px 12px; 
            border-radius: 6px; 
            font-size: 0.75rem;
            font-weight: 600;
        }

        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #edf2f7;
            color: #718096;
            text-transform: uppercase;
            font-size: 0.75rem;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-dark sidebar p-3">
            <h5 class="text-white mb-4 mt-2"><i class="fas fa-hospital-alt me-2 text-primary"></i>RS Rawat Jalan</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('dashboard_kasir'); ?>">
                        <i class="fas fa-home me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('kasir'); ?>">
                        <i class="fas fa-money-bill-wave me-2"></i> Pembayaran Pasien
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <hr class="text-secondary">
                    <a class="nav-link text-danger fw-bold" href="<?= base_url('/logout'); ?>">
                        <i class="fas fa-power-off me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>

        <main class="col-md-10 main-content ms-sm-auto px-md-4 py-4">
            
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="header-title">Data Pembayaran</h2>
                    <p class="text-muted">Daftar transaksi dan status tagihan pasien real-time.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card card-custom text-center">
                        <h5 class="mb-3 fw-bold">Status Hari Ini</h5>
                        <hr class="mb-4">
                        <div style="position: relative; height:240px;">
                            <canvas id="pembayaranChart"></canvas>
                        </div>
                        <div class="mt-4 pt-2 text-start">
                            <div class="p-3 rounded-3 bg-light border-start border-danger border-4">
                                <span class="text-muted small fw-bold d-block">Menunggu Pembayaran</span>
                                <h4 class="mb-0 fw-bold text-danger"><?= $count_unpaid ?> <small class="fs-6 text-muted">Pasien</small></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card card-custom">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0 fw-bold text-primary"><i class="fas fa-clipboard-list me-2"></i>Rincian Tagihan</h5>
                        </div>
                        
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4">
                                <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Pasien</th>
                                        <th>Poliklinik</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tagihan as $t): ?>
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark"><?= $t['full_name'] ?></div>
                                            <small class="text-muted">ID: #<?= $t['appointment_id'] ?></small>
                                        </td>
                                        <td><span class="text-secondary"><?= $t['poli'] ?></span></td>
                                        <td><span class="badge-unpaid text-uppercase">Pending</span></td>
                                        <td>
                                            <form action="<?= base_url('kasir/bayar/' . $t['appointment_id']); ?>" method="POST" class="d-flex gap-2 justify-content-center">
                                                <select name="metode" class="form-select form-select-sm shadow-sm" required style="width: 120px;">
                                                    <option value="cash">💵 Tunai</option>
                                                    <option value="card">💳 Kartu</option>
                                                    <option value="insurance">🛡️ Asuransi</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary btn-sm px-3 shadow-sm">
                                                    Proses
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if(empty($tagihan)): ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-5 text-muted">
                                                <i class="fas fa-check-double fa-2x mb-3 d-block opacity-25"></i>
                                                Belum ada data tagihan baru.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
                </div>
            </div>
        </main>
    </div>
<<<<<<< HEAD

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('pembayaranChart').getContext('2d');

            const dataUnpaid = <?= $count_unpaid ?>;
            const dataPaid = <?= $count_paid ?>;

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Belum Bayar', 'Lunas'],
                    datasets: [{
                        data: [dataUnpaid, dataPaid],
                        backgroundColor: [
                            '#ef4444', // Red-500
                            '#10b981' // Emerald-500
                        ],
                        borderWidth: 0,
                        hoverOffset: 15
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#9ca3af',
                                padding: 20,
                                usePointStyle: true
                            }
                        }
                    },
                    cutout: '75%',
                }
            });
        });
    </script>

</body>

=======
</div>

<script>
    const ctx = document.getElementById('pembayaranChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Unpaid', 'Paid'],
            datasets: [{
                data: [<?= $count_unpaid ?>, <?= $count_paid ?>],
                backgroundColor: ['#ff4757', '#2ed573'],
                borderWidth: 5,
                borderColor: '#ffffff',
                hoverOffset: 10
            }]
        },
        options: {
            maintainAspectRatio: false,
            cutout: '75%',
            plugins: { 
                legend: { 
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: { size: 12, weight: 'bold' }
                    }
                } 
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
</html>