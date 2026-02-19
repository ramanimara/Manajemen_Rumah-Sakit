<?= $this->extend('Pendaftaran/layout/main') ?>
<?= $this->section('content') ?>

<<<<<<< HEAD
<h3 class="text-xl font-semibold text-gray-200 mb-6">
    Monitoring Antrian Pasien
</h3>

<div class="bg-gray-800 rounded-2xl border border-gray-700 overflow-hidden shadow-xl">

    <table class="w-full text-left">
        <thead class="bg-gray-700 text-gray-400 text-xs uppercase tracking-wider">
            <tr>
                <th class="px-6 py-4">No</th>
                <th class="px-6 py-4">Nama</th>
                <th class="px-6 py-4">Poli</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-700">
            <?php if (!empty($dataAntrian)): ?>
                <?php foreach ($dataAntrian as $row): ?>
                <tr class="hover:bg-gray-700/40 transition duration-200">

                    <!-- NOMOR -->
                    <td class="px-6 py-4 font-mono font-bold text-blue-400 text-lg">
                        <?= str_pad((int)$row['queue_number'],3,'0',STR_PAD_LEFT) ?>
                    </td>

                    <!-- NAMA -->
                    <td class="px-6 py-4 text-gray-200">
                        <?= esc($row['full_name']) ?>
                    </td>

                    <!-- POLI -->
                    <td class="px-6 py-4 text-gray-300">
                        <?= esc($row['department_name']) ?>
                    </td>

                    <!-- STATUS -->
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            <?= $row['status']=='waiting'
                                ? 'bg-yellow-500/10 text-yellow-400'
                                : ($row['status']=='called'
                                    ? 'bg-blue-500/10 text-blue-400'
                                    : 'bg-green-500/10 text-green-400') ?>">
                            <?= ucfirst($row['status']) ?>
                        </span>
                    </td>

                    <!-- AKSI -->
                    <td class="px-6 py-4 text-center">
                        <?php if (in_array($row['status'], ['waiting','called'])): ?>
                            <button
                                class="bg-indigo-600 hover:bg-indigo-500 transition px-4 py-2 rounded-lg text-sm font-semibold text-white shadow-md"
                                data-id="<?= $row['queue_number'] ?>"
                                data-queue="<?= str_pad($row['queue_number'],3,'0',STR_PAD_LEFT) ?>"
                                data-name="<?= esc($row['full_name']) ?>"
                                data-poli="<?= esc($row['department_name']) ?>"
                                onclick="openCallModal(this)"
                            >
                                🔊 Panggil
                            </button>

                        <?php else: ?>
                            <button class="bg-gray-600 px-4 py-2 rounded-lg text-sm text-gray-300 cursor-not-allowed" disabled>
                                ✔ Selesai
                            </button>
                        <?php endif ?>
                    </td>

                </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center text-gray-400 py-8">
                        Belum ada antrian hari ini
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>

</div>

<!-- ================= MODAL ================= -->
<div class="modal fade" id="callModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-gray-800 text-white rounded-2xl border border-gray-700 shadow-2xl">

            <div class="modal-header border-gray-700">
                <h5 class="modal-title text-indigo-400 font-semibold">
                    🔔 Panggilan Antrian
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center py-10">

                <!-- ISI AWAL KOSONG -->
                <div class="text-7xl font-bold text-blue-400 mb-4" id="modalQueue"></div>

                <h4 class="text-xl font-semibold mb-1" id="modalName"></h4>

                <p class="text-gray-400 text-sm" id="modalPoli"></p>

                <div class="mt-6 text-xs text-gray-500">
                    Silakan menuju ruang pemeriksaan
                </div>

            </div>

            <div class="modal-footer border-gray-700 justify-center">
                <button class="bg-gray-600 hover:bg-gray-500 px-4 py-2 rounded-lg text-sm"
                        data-bs-dismiss="modal">
                    Tutup
                </button>
=======
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
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
            </div>

        </div>
    </div>
</div>

<<<<<<< HEAD


<!-- ================= SCRIPT (LOGIC TETAP) ================= -->
<script>

let voicesReady = false;

// Load voices supaya tidak delay
window.speechSynthesis.onvoiceschanged = function () {
    voicesReady = true;
};

function openCallModal(btn) {

    const queueId = btn.dataset.id;
    const queue   = btn.dataset.queue;
    const name    = btn.dataset.name;
    const poli    = btn.dataset.poli;

    // Isi data ke modal
    document.getElementById('modalQueue').innerText = queue;
    document.getElementById('modalName').innerText  = name;
    document.getElementById('modalPoli').innerText  = poli;

    // Buka modal
    const modal = new bootstrap.Modal(document.getElementById('callModal'));
    modal.show();

    // Suara langsung
    speakQueue(queue, poli);

    // Update status
    fetch("<?= base_url('pendaftaran/panggil') ?>", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "queue_id=" + queueId
    });
}

function speakQueue(queue, poli) {

    const text = `Nomor antrian ${queue}. Silakan menuju poli ${poli}.`;

    const speech = new SpeechSynthesisUtterance(text);

    speech.lang   = "id-ID";
    speech.rate   = 0.7;  // lebih lambat
    speech.pitch  = 1;
    speech.volume = 1;

    window.speechSynthesis.cancel();
    window.speechSynthesis.speak(speech);
}

</script>


=======
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

>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
<?= $this->endSection() ?>
