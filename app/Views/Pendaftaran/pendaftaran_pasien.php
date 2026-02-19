<?= $this->extend('Pendaftaran/layout/main') ?>
<?= $this->section('content') ?>

<div class="bg-gray-800 rounded-xl border border-gray-700 p-6">

    <table class="w-full text-left">
        <thead class="text-gray-400 text-xs uppercase">
            <tr>
                <th class="pb-4">Nama</th>
                <th class="pb-4">Poli</th>
                <th class="pb-4">Status</th>
                <th class="pb-4">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-700">
            <?php foreach ($dataPasien as $row): ?>
            <tr>
                <td class="py-4"><?= esc($row['full_name']) ?></td>
                <td><?= esc($row['department_name']) ?></td>

                <td>
                    <span class="px-3 py-1 rounded-full text-xs
                        <?= $row['status']=='waiting'
                            ? 'bg-yellow-500/10 text-yellow-400'
                            : 'bg-green-500/10 text-green-400' ?>">
                        <?= ucfirst($row['status']) ?>
                    </span>
                </td>

                <td>
                    <?php if($row['status']=='waiting'): ?>
                        <a href="<?= base_url('pendaftaran/konfirmasi/'.$row['appointment_id']) ?>"
                           class="bg-emerald-600 hover:bg-emerald-500 px-4 py-2 rounded-lg text-sm">
                           Konfirmasi
                        </a>
                    <?php else: ?>
                        <span class="text-gray-500 text-sm">Sudah</span>
                    <?php endif ?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>

    </table>

</div>

<?= $this->endSection() ?>
