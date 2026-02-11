<?= $this->extend('Admin/Layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Antrian Pasien</h3>
    <div>
        <a href="<?= base_url('admin/antrian/print') ?>" 
           target="_blank" 
           class="btn btn-secondary">
            <i class="bi bi-printer"></i> Print
        </a>

        <a href="<?= base_url('admin/antrian/export') ?>" 
           class="btn btn-success">
            <i class="bi bi-file-earmark-excel"></i> Download Excel
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No Antrian</th>
                    <th>Nama Pasien</th>
                    <th>Poli</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($queues)): ?>
                    <?php foreach ($queues as $q): ?>
                    <tr>
                        <td><?= $q->queue_number ?></td>
                        <td><?= esc($q->patient_name) ?></td>
                        <td><?= esc($q->department_name) ?></td>
                        <td>
                            <?php if ($q->queue_status == 'waiting'): ?>
                                <span class="badge bg-warning">Menunggu</span>
                            <?php elseif ($q->queue_status == 'called'): ?>
                                <span class="badge bg-info">Dipanggil</span>
                            <?php elseif ($q->queue_status == 'done'): ?>
                                <span class="badge bg-success">Selesai</span>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
