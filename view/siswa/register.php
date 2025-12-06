<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center p-4"
      style="background-image: url('public/login.jpg');">
    <div class="absolute inset-0 backdrop-blur-sm bg-black/20"></div>
    
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg transform transition-all hover:shadow-xl">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Daftar Akun</h2>

        <form action="?action=register&method=store" method="POST">
            
            <div class="mb-4">
                <input 
                    type="text" 
                    name="username" 
                    placeholder="Masukkan Username" 
                    value="<?php echo isset($username) ? $username : ''; ?>" 
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 placeholder-gray-500 text-gray-700"
                >
            </div>

            <div class="mb-4">
                <input 
                    type="text" 
                    name="nama" 
                    placeholder="Masukkan Nama" 
                    value="<?php echo isset($pnama) ? $nama : ''; ?>" 
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 placeholder-gray-500 text-gray-700"
                >
            </div>
            
            <div class="mb-4">
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Masukkan Password" 
                    value="<?php echo isset($password) ? $password : ''; ?>" 
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 placeholder-gray-500 text-gray-700"
                >
            </div>

            <div class="mb-6">
                <input 
                    type="password" 
                    name="password2" 
                    placeholder="Konfirmasi Password" 
                    value="<?php echo isset($konfirmasipassword) ? $konfirmasipassword : ''; ?>" 
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 placeholder-gray-500 text-gray-700"
                >
            </div>

            <div class="mb-6">
                <select 
                    name="sekolah_id" 
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 text-gray-700 appearance-none bg-white"
                >
                    <option value="" class="text-gray-500">-- Pilih Sekolah --</option>
                    <?php foreach ($sekolah as $row) : ?>
                        <option 
                            value="<?= $row['id_sekolah'] ?>"
                            <?php echo (isset($sekolah_id) && $sekolah_id == $row['id_sekolah']) ? 'selected' : ''; ?>
                        >
                            <?= $row['nama_sekolah'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold text-lg hover:bg-blue-600 transition duration-300 ease-in-out shadow-md hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-green-300 focus:ring-opacity-50"
            >
                Daftar
            </button>
        </form>

        <div class="text-center mt-6 text-gray-600">
            <p class="text-sm">Sudah punya akun? 
                <a href="?action=login" class="text-blue-600 hover:text-blue-700 font-medium transition duration-200 hover:underline">
                    Login di sini
                </a>
            </p>
        </div>
    </div>

</body>
</html>