<?= $this->extend('Admin/Layout/main') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Kedatangan Pasien</h3>

<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Poli</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if (empty($patients)): ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Tidak ada data kedatangan
                    </td>
                </tr>
            <?php else: ?>
                <?php $no=1; foreach ($patients as $p): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($p['patient_name']) ?></td>
                    <td><?= esc($p['department_name']) ?></td>
                    <td>
                        <?= $p['status']=='waiting'
                            ? '<span class="badge bg-warning">Belum Datang</span>'
                            : '<span class="badge bg-success">Sudah Datang</span>' ?>
                    </td>
                    <td>
                        <?php if ($p['status']=='waiting'): ?>
                        <form action="<?= base_url('admin/kedatangan/confirm/'.$p['appointment_id']) ?>" method="post">
                            <?= csrf_field() ?>
                            <button class="btn btn-sm btn-primary">
                                <i class="bi bi-check-circle"></i> Konfirmasi
                            </button>
                        </form>
                        <?php else: ?>
                            <span class="text-muted">✔</span>
                        <?php endif ?>
                    </td>
                </tr>
                <?php endforeach ?>
            <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
