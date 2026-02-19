<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Hasil Pemeriksaan Pasien</h3>
    <div>
        <a href="<?= base_url('admin/hasil-pemeriksaan/export') ?>" 
           class="btn btn-success btn-sm">
            <i class="bi bi-file-earmark-excel"></i> Download Excel
        </a>

        <button onclick="window.print()" 
                class="btn btn-secondary btn-sm">
            <i class="bi bi-printer"></i> Print
        </button>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pasien</th>
                    <th>Poli</th>
                    <th>Dokter</th>
                    <th>Keluhan</th>
                    <th>Diagnosis</th>
                    <th>Catatan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($results)): ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted">
                            Belum ada hasil pemeriksaan
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1; foreach($results as $r): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($r['exam_date'])) ?></td>
                        <td><?= esc($r['patient_name']) ?></td>
                        <td><?= esc($r['department_name']) ?></td>
                        <td><?= esc($r['doctor_name']) ?></td>
                        <td><?= esc($r['complaint']) ?></td>
                        <td><?= esc($r['diagnosis']) ?></td>
                        <td><?= esc($r['notes']) ?></td>
                        <td>
                            <span class="badge bg-success">
                                <?= ucfirst($r['status']) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
