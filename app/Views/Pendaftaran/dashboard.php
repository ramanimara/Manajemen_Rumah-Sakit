<?= $this->extend('Pendaftaran/layout/main') ?>
<?= $this->section('content') ?>

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
</div>

<?= $this->endSection() ?>
