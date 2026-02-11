<?= $this->extend('Admin/Layout/main') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Laporan Pengambilan Obat</h3>

<div class="mb-3">
    <a href="<?= base_url('admin/laporan/pengambilan-obat/print') ?>" 
       class="btn btn-secondary" target="_blank">
        <i class="bi bi-printer"></i> Print
    </a>

    <a href="<?= base_url('admin/laporan/pengambilan-obat/excel') ?>" 
       class="btn btn-success">
        <i class="bi bi-file-earmark-excel"></i> Export Excel
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pickup</th>
                    <th>Nama Pasien</th>
                    <th>Poli</th>
                    <th>Tanggal Periksa</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($data as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->pickup_date ?></td>
                    <td><?= $row->pasien ?></td>
                    <td><?= $row->specialization ?></td>
                    <td><?= $row->schedule_date ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
