<?= $this->extend('Pendaftaran/layout/main') ?>
<?= $this->section('content') ?>

<<<<<<< HEAD
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

=======
<div class="container-fluid">

    <!-- JUDUL -->
    <div class="mb-4">
        <h3 class="fw-bold">Pendaftaran Pasien</h3>
        <p class="text-muted">Daftar pasien yang melakukan pendaftaran online</p>
    </div>

    <!-- CARD -->
    <div class="card shadow-sm">
        <div class="card-body">

            <!-- SEARCH -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Cari pasien...">
                </div>
            </div>

            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Poli</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($dataPasien)): ?>
                            <?php foreach ($dataPasien as $row): ?>
                                <tr>
                                    <td><?= esc($row['full_name']) ?></td>
                                    <td><?= esc($row['department_name']) ?></td>
                                    <td>
                                        <span class="badge bg-<?= $row['status'] === 'waiting' ? 'warning text-dark' : 'success' ?>">
                                            <?= ucfirst($row['status']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($row['status'] === 'waiting'): ?>
                                            <a href="<?= base_url('pendaftaran/konfirmasi/' . $row['appointment_id']) ?>"
                                               class="btn btn-success btn-sm"
                                               onclick="return confirm('Konfirmasi pasien ini?')">
                                                <i class="bi bi-check-circle"></i> Konfirmasi
                                            </a>
                                        <?php else: ?>
                                            <button class="btn btn-secondary btn-sm" disabled>
                                                Sudah dikonfirmasi
                                            </button>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Belum ada data pendaftaran
                                </td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<!-- MODAL KARCIS ANTRIAN -->
<?php if (session()->getFlashdata('queue_ticket')):
    $ticket = session()->getFlashdata('queue_ticket');
?>

<div class="modal fade" id="ticketModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="bi bi-ticket-perforated"></i> Kartu Antrian
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <h1 class="display-3 fw-bold">
                    <?= str_pad($queue['queue_number'], 3, '0', STR_PAD_LEFT) ?>
                </h1>

                <p class="fw-semibold mb-1"><?= esc($ticket['full_name']) ?></p>
                <p class="mb-1">
                    Poli: <strong><?= esc($ticket['department']) ?></strong>
                </p>
                <p class="text-muted">
                    <?= date('d M Y', strtotime($ticket['schedule_date'])) ?>
                </p>

                <hr>
                <small class="text-muted">Silakan menunggu panggilan</small>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button class="btn btn-primary" onclick="window.print()">
                    <i class="bi bi-printer"></i> Cetak
                </button>
            </div>

        </div>
    </div>
</div>

<script>
    new bootstrap.Modal(document.getElementById('ticketModal')).show();
</script>

<?php endif ?>

>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
<?= $this->endSection() ?>
