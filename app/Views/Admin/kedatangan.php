<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Kedatangan Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen">

<!-- HEADER -->
<nav class="bg-blue-600 px-6 py-4 flex justify-between items-center text-white">
    <h1 class="text-xl font-bold flex items-center gap-2">
        <i class="fas fa-hospital"></i> RS Sehat – Admin
    </h1>
    <div class="flex items-center gap-3">
        <span class="text-sm"><?= session()->get('full_name') ?></span>
        <a href="<?= base_url('logout') ?>" class="text-sm hover:underline">Logout</a>
    </div>
</nav>

<!-- CONTENT -->
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-2">📋 Kedatangan Pasien</h2>
    <p class="text-gray-600 mb-6">
        Daftar pasien yang sudah mendaftar online dan menunggu konfirmasi kedatangan.
    </p>

    <!-- ALERT -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-4 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama Pasien</th>
                    <th class="px-4 py-3">Poli</th>
                    <th class="px-4 py-3">Tanggal Daftar</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <?php if (!empty($appointments)) : ?>
                    <?php $no = 1; foreach ($appointments as $a) : ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3"><?= $no++ ?></td>
                            <td class="px-4 py-3 font-medium"><?= $a['patient_name'] ?></td>
                            <td class="px-4 py-3"><?= $a['department_name'] ?></td>
                            <td class="px-4 py-3">
                                <?= date('d M Y', strtotime($a['schedule_date'])) ?>
                            </td>
                            <td class="px-4 py-3">
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Waiting
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="<?= base_url('pendaftaran/konfirmasi/' . $a['appointment_id']) ?>"
                                   class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg text-xs font-semibold">
                                    <i class="fas fa-check"></i> Konfirmasi
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="px-4 py-10 text-center text-gray-500">
                            Tidak ada pasien menunggu konfirmasi.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- FOOTER -->
<footer class="text-center text-xs text-gray-500 py-4">
    © 2026 RS Sehat – Sistem Manajemen Rawat Jalan
</footer>

</body>
</html>
