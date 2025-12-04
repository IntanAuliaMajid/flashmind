<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 12px;
            border: 1px solid #aaa;
            border-radius: 4px;
            background-color: white;
            font-size: 14px;
            cursor: pointer;
        }

        .register-box {
            width: 350px;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        .register-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            width: 90%;
            padding: 12px;
            margin-bottom: 12px;
            border: 1px solid #aaa;
            border-radius: 4px;
        }
        select {
            width: 97%;
        }
        button {
            width: 97%; 
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #0056b3;
        }
        .footer-link {
            text-align: center;
            margin-top: 10px;
        }
        .footer-link a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

    <div class="register-box">
        <h2>Daftar Akun</h2>
        <form action="?action=register&method=store" method="POST">

            <input type="text" name="username" placeholder="Masukkan Username" value="<?php echo isset($username) ? $username : ''; ?>"  required>

            <input type="text" name="nama" value="<?php echo isset($pnama) ? $nama : ''; ?>" placeholder="Masukkan Nama" required>

            <input type="password" name="password" value="<?php echo isset($password) ? $password : ''; ?>" placeholder="Masukkan Password" required>

            <input type="password" name="password2" value="<?php echo isset($konfirmasipassword) ? $konfirmasipassword : ''; ?>" placeholder="Konfirmasi Password" required>

            <select name="sekolah_id" required>
                <option value="">-- Pilih Sekolah --</option>
                <?php foreach ($sekolah as $row) : ?>
                    <option value="<?= $row['id_sekolah'] ?>">
                        <?php echo (isset($sekolah_id) && $sekolah_id == $row['id_sekolah']) ? 'selected' : ''; ?>
                        <?= $row['nama_sekolah'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Daftar</button>
        </form>

        <div class="footer-link">
            <p>Sudah punya akun?<a href="?action=login"> Login di sini</a></p>`
        </div>
    </div>

</body>
</html>
