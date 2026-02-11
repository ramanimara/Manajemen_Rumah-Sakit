<?= $this->extend('Admin/Layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Hasil Pemeriksaan</h3>
    <div>
        <a href="<?= base_url('admin/hasil/print') ?>" 
           target="_blank" 
           class="btn btn-secondary">
            <i class="bi bi-printer"></i> Print
        </a>

        <a href="<?= base_url('admin/hasil/export') ?>" 
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
                    <th>Tanggal</th>
                    <th>Nama Pasien</th>
                    <th>Dokter</th>
                    <th>Poli</th>
                    <th>Diagnosa</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($data)): ?>
                    <?php foreach($data as $row): ?>
                    <tr>
                        <td><?= $row->exam_date ?></td>
                        <td><?= esc($row->patient_name) ?></td>
                        <td><?= esc($row->doctor_name) ?></td>
                        <td><?= esc($row->department_name) ?></td>
                        <td><?= esc($row->diagnosis) ?></td>
                    </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data pemeriksaan</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
