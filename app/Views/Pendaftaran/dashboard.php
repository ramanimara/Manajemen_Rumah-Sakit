<?= $this->extend('Pendaftaran/layout/main') ?>
<?= $this->section('content') ?>

<<<<<<< HEAD
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700">
        <p class="text-sm text-gray-400">Total Pendaftaran Hari Ini</p>
        <h2 class="text-3xl font-bold text-blue-400"><?= $totalPendaftaran ?></h2>
    </div>

    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700">
        <p class="text-sm text-gray-400">Menunggu Verifikasi</p>
        <h2 class="text-3xl font-bold text-yellow-400"><?= $totalWaiting ?></h2>
    </div>

    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700">
        <p class="text-sm text-gray-400">Total Antrian</p>
        <h2 class="text-3xl font-bold text-green-400"><?= $totalQueue ?></h2>
    </div>

</div>

<div class="bg-gray-800 rounded-xl border border-gray-700 p-6">
    <h4 class="font-bold mb-4 text-blue-400">Pendaftaran Terbaru</h4>

    <table class="w-full text-left">
        <thead class="text-gray-400 text-xs uppercase">
            <tr>
                <th class="pb-3">Nama</th>
                <th class="pb-3">Poli</th>
                <th class="pb-3">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-700">
            <?php foreach ($pendaftaranTerbaru as $item): ?>
            <tr>
                <td class="py-3"><?= esc($item['full_name']) ?></td>
                <td><?= esc($item['department_name']) ?></td>
                <td>
                    <span class="px-3 py-1 rounded-full text-xs
                        <?= $item['status']=='waiting'
                            ? 'bg-yellow-500/10 text-yellow-400'
                            : 'bg-green-500/10 text-green-400' ?>">
                        <?= ucfirst($item['status']) ?>
                    </span>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
=======
<h3 class="mb-4">Dashboard Pendaftaran</h3>

<!-- SUMMARY CARD -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-bg-primary">
            <div class="card-body">
                <h6>Total Pendaftaran Hari Ini</h6>
                <h3><?= $totalPendaftaran ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-bg-warning">
            <div class="card-body">
                <h6>Menunggu Verifikasi</h6>
                <h3><?= $totalWaiting ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-bg-success">
            <div class="card-body">
                <h6>Total Antrian Hari Ini</h6>
                <h3><?= $totalQueue ?></h3>
            </div>
        </div>
    </div>
</div>


<!-- PENDAFTARAN ONLINE TERBARU -->
<div class="card mb-4">
    <div class="card-header">
        Pendaftaran Online Terbaru
    </div>
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Nama Pasien</th>
                    <th>Poli</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pendaftaranTerbaru)): ?>
                    <?php foreach ($pendaftaranTerbaru as $item): ?>
                        <tr>
                            <td><?= esc($item['full_name']) ?></td>
                            <td><?= esc($item['department_name']) ?></td>
                            <td>
                                <span class="badge bg-<?= $item['status'] === 'waiting' ? 'warning' : 'success' ?>">
                                    <?= ucfirst($item['status']) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            Belum ada pendaftaran
                        </td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<!-- ANTRIAN TERBARU -->
<div class="card">
    <div class="card-header">
        Antrian Terbaru
    </div>
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>No Antrian</th>
                    <th>Nama Pasien</th>
                    <th>Poli</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($antrianTerbaru)): ?>
                    <?php foreach ($antrianTerbaru as $queue): ?>
                        <tr>
                            <td><?= str_pad($queue['queue_number'], 3, '0', STR_PAD_LEFT) ?></td>
                            <td><?= esc($queue['full_name']) ?></td>
                            <td><?= esc($queue['department_name']) ?></td>
                            <td>
                               <span class="badge bg-<?= 
                                    $queue['status'] === 'waiting' ? 'warning' : 
                                    ($queue['status'] === 'done' ? 'success' : 'secondary') 
                                    ?>">
                                    <?= ucfirst($queue['status']) ?>
                                </span>

                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Belum ada antrian
                        </td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
</div>

<?= $this->endSection() ?>
