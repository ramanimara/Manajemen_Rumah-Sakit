<?= $this->extend('Pendaftaran/layout/main') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Monitoring Antrian Pasien</h3>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No Antrian</th>
                        <th>Nama Pasien</th>
                        <th>Poli</th>
                        <th>Status</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($dataAntrian)): ?>
                        <?php foreach ($dataAntrian as $row): ?>
                            <tr>
                                <!-- FORMAT 001 -->
                                <td class="fw-bold">
                                    <?= str_pad((int)$row['queue_number'], 3, '0', STR_PAD_LEFT) ?>
                                </td>

                                <td><?= esc($row['full_name']) ?></td>
                                <td><?= esc($row['department_name']) ?></td>

                                <td>
                                    <span class="badge bg-<?= 
                                        $row['status'] === 'waiting' ? 'warning text-dark' :
                                        ($row['status'] === 'called' ? 'info' : 'success')
                                    ?>">
                                        <?= ucfirst($row['status']) ?>
                                    </span>
                                </td>

                                <td>
                                    <?php if ($row['status'] === 'waiting'): ?>
                                        <button
                                            class="btn btn-primary btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#callModal"
                                            data-queue="<?= str_pad($row['queue_number'], 3, '0', STR_PAD_LEFT) ?>"
                                            data-name="<?= esc($row['full_name']) ?>"
                                            data-poli="<?= esc($row['department_name']) ?>"
                                        >
                                            📢 Called
                                        </button>
                                    <?php else: ?>
                                        <button class="btn btn-secondary btn-sm" disabled>
                                            Dipanggil
                                        </button>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Belum ada antrian hari ini
                            </td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- ================= MODAL PANGGIL ================= -->
<div class="modal fade" id="callModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Panggilan Antrian</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <h1 class="display-1 fw-bold" id="modalQueue">001</h1>
                <h4 id="modalName">Nama Pasien</h4>
                <p class="text-muted" id="modalPoli">Poli</p>

                <hr>
                <small>Silakan menuju ruang pemeriksaan</small>
            </div>

            <div class="modal-footer justify-content-center">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>

<!-- ================= SCRIPT ================= -->
<script>
const callModal = document.getElementById('callModal');

callModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;

    document.getElementById('modalQueue').innerText = button.getAttribute('data-queue');
    document.getElementById('modalName').innerText  = button.getAttribute('data-name');
    document.getElementById('modalPoli').innerText  = button.getAttribute('data-poli');
});
</script>

<?= $this->endSection() ?>
