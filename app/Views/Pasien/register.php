<!DOCTYPE html>
<html lang="id">
<<<<<<< HEAD

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pasien | Portal Pasien</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.5s ease-out forwards;
        }

        input[type="date"] {
            color-scheme: dark;
        }
    </style>
</head>

<body class="bg-gray-900 text-gray-100 font-sans antialiased flex items-center justify-center min-h-screen p-4 md:p-8">

    <div class="w-full max-w-4xl bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 overflow-hidden animate-fade-in-up">

        <div class="p-6 md:p-8 bg-gray-800/80 backdrop-blur-sm border-b border-gray-700 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-cyan-900/50 mb-4 ring-2 ring-cyan-500/50">
                <i class="fas fa-user-plus text-3xl text-cyan-400"></i>
            </div>
            <h2 class="text-3xl font-bold text-white mb-2">Registrasi Pasien Baru</h2>
            <p class="text-gray-400">Isi data diri Anda dengan lengkap dan benar untuk membuat akun.</p>
        </div>

        <div class="p-6 md:p-8">

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="mb-6 p-4 bg-red-900/20 border border-red-500/50 text-red-400 rounded-xl flex items-start gap-3 shadow-lg">
                    <i class="fas fa-exclamation-triangle mt-1"></i>
                    <div class="text-sm">
                        <p class="font-bold mb-1">Terjadi Kesalahan:</p>
                        <ul class="list-disc list-inside opacity-90 space-y-1">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('pasien/register/process') ?>" method="post">
                <?= csrf_field() ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-cyan-400 border-b border-gray-700 pb-2 flex items-center gap-2">
                            <i class="fas fa-lock"></i> Data Akun
                        </h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Username</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                    <i class="fas fa-at"></i>
                                </span>
                                <input type="text" name="username" required placeholder="Contoh: dhava2026"
                                    class="pl-10 w-full bg-gray-900 border border-gray-600 text-white text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block p-3 transition">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Gunakan untuk login nanti.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                    <i class="fas fa-key"></i>
                                </span>
                                <input type="password" name="password" required placeholder="••••••••"
                                    class="pl-10 w-full bg-gray-900 border border-gray-600 text-white text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block p-3 transition">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Minimal 6 karakter.</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-cyan-400 border-b border-gray-700 pb-2 flex items-center gap-2">
                            <i class="fas fa-id-card"></i> Data Pribadi
                        </h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                            <input type="text" name="full_name" required placeholder="Sesuai KTP"
                                class="w-full bg-gray-900 border border-gray-600 text-white text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block p-3 transition">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">NIK (Nomor Induk Kependudukan)</label>
                            <input type="number" name="nik" required placeholder="16 digit angka"
                                class="w-full bg-gray-900 border border-gray-600 text-white text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block p-3 transition">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Jenis Kelamin</label>
                                <select name="gender" class="w-full bg-gray-900 border border-gray-600 text-white text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block p-3 transition">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Tanggal Lahir</label>
                                <input type="date" name="birth_date" required
                                    class="w-full bg-gray-900 border border-gray-600 text-white text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block p-3 transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">No. HP / WhatsApp</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input type="number" name="phone" required placeholder="08xxxxxxxxxx"
                                    class="pl-10 w-full bg-gray-900 border border-gray-600 text-white text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block p-3 transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Alamat Lengkap</label>
                            <textarea name="address" rows="3" required placeholder="Nama jalan, RT/RW, Kelurahan, Kecamatan..."
                                class="w-full bg-gray-900 border border-gray-600 text-white text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block p-3 transition resize-none"></textarea>
                        </div>

                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-700">
                    <button type="submit" class="w-full bg-cyan-600 hover:bg-cyan-500 text-white font-bold py-4 px-6 rounded-xl transition shadow-lg shadow-cyan-900/30 transform hover:scale-[1.01] flex items-center justify-center gap-2">
                        <span>Daftar Sekarang</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>

                    <p class="text-center mt-6 text-gray-400 text-sm">
                        Sudah punya akun?
                        <a href="<?= base_url('/') ?>" class="text-cyan-400 hover:text-cyan-300 font-semibold underline decoration-cyan-500/30 hover:decoration-cyan-300 transition">
                            Login di sini
                        </a>
                    </p>
                </div>

            </form>
        </div>
    </div>

</body>

=======
<head>
    <meta charset="UTF-8">
    <title>Registrasi Pasien Baru</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #34495e; }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box; /* Agar padding tidak merusak lebar */
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover { background-color: #2980b9; }
        .alert {
            padding: 10px; background: #ffdede; color: #c0392b; 
            border-radius: 5px; margin-bottom: 15px; text-align: center;
        }
        .login-link { text-align: center; margin-top: 15px; font-size: 14px; }
        .login-link a { color: #3498db; text-decoration: none; }
    </style>
</head>
<body>

<div class="container">
    <h2>📝 Daftar Pasien Baru</h2>

    <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert">
            <?= implode('<br>', session()->getFlashdata('errors')) ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('pasien/register/process') ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="full_name" required placeholder="Contoh: Dhava Auliya">
        </div>
        
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required placeholder="Untuk login nanti">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <hr style="border: 0; border-top: 1px dashed #ccc; margin: 20px 0;">

        <div class="form-group">
            <label>NIK (Nomor Induk Kependudukan)</label>
            <input type="number" name="nik" required>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="gender">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="birth_date" required>
        </div>

        <div class="form-group">
            <label>No. HP / WhatsApp</label>
            <input type="text" name="phone" required placeholder="08xxxxx">
        </div>

        <div class="form-group">
            <label>Alamat Lengkap</label>
            <textarea name="address" rows="3" required></textarea>
        </div>

        <button type="submit">Daftar Sekarang</button>
    </form>

    <div class="login-link">
        Sudah punya akun? <a href="<?= base_url('/') ?>">Login disini</a>
    </div>
</div>

</body>
>>>>>>> 5f0e2f21ec1001ae16fca6cf7295f8c8130e6909
</html>