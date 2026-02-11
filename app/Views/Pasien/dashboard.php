<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pasien</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
            width: 380px;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .welcome {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 25px;
        }

        .menu-link {
            display: block;
            text-decoration: none;
            background-color: #3498db;
            color: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .menu-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }

        .menu-link.booking { background-color: #27ae60; }
        .menu-link.booking:hover { background-color: #219150; }

        .menu-link.antrian { background-color: #8e44ad; }
        .menu-link.antrian:hover { background-color: #732d91; }

        .menu-link.logout {
            background-color: #e74c3c;
        }

        .menu-link.logout:hover {
            background-color: #c0392b;
        }

        .footer-text {
            margin-top: 25px;
            font-size: 12px;
            color: #95a5a6;
        }
    </style>
</head>
<body>

<div class="dashboard-container">

    <h2>🏥 Dashboard Pasien</h2>
    <div class="welcome">
        Selamat datang, <strong><?= session()->get('full_name'); ?></strong>
    </div>

    <a href="<?= base_url('pasien/booking') ?>" class="menu-link booking">
        ➕ Booking Periksa Baru
    </a>

    <a href="<?= base_url('pasien/riwayat') ?>" class="menu-link">
        📋 Riwayat Appointment
    </a>

    <a href="<?= base_url('pasien/antrian') ?>" class="menu-link antrian">
        ⏱️ Monitor Antrian
    </a>

    <a href="<?= base_url('logout') ?>" class="menu-link logout">
        🚪 Logout
    </a>

    <div class="footer-text">
        Sistem Informasi Manajemen Rumah Sakit &copy; 2026
    </div>

</div>

</body>
</html>
