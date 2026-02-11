<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Laporan Pembayaran</h3>

<div class="mb-3">
    <a href="<?= base_url('admin/laporan-pembayaran/export') ?>" 
       class="btn btn-success">
        <i class="bi bi-file-earmark-excel"></i> Download Excel
    </a>

    <button onclick="window.print()" class="btn btn-primary">
        <i class="bi bi-printer"></i> Print
    </button>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Poli</th>
                    <th>Total</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($payments as $p): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($p['patient_name']) ?></td>
                    <td><?= esc($p['department_name']) ?></td>
                    <td>Rp <?= number_format($p['total_amount'],0,',','.') ?></td>
                    <td><?= esc($p['payment_method'] ?? '-') ?></td>
                    <td>
                        <?php if($p['payment_status']=='paid'): ?>
                            <span class="badge bg-success">Lunas</span>
                        <?php else: ?>
                            <span class="badge bg-warning">Belum Bayar</span>
                        <?php endif ?>
                    </td>
                    <td><?= esc($p['payment_date']) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
