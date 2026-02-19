<!DOCTYPE html>
<html>
<head>
    <title>Print Antrian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="window.print()">

<div class="container mt-4">
    <h3 class="text-center mb-4">Laporan Antrian Pasien</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No Antrian</th>
                <th>Nama Pasien</th>
                <th>Poli</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($queues as $q): ?>
            <tr>
                <td><?= $q->queue_number ?></td>
                <td><?= $q->patient_name ?></td>
                <td><?= $q->department_name ?></td>
                <td><?= $q->queue_status ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

</body>
</html>
