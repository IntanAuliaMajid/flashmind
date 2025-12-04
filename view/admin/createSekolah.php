<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Tambah Data Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex">

    <!-- Sidebar (Fixed) -->
    <div class="w-64 bg-white shadow-lg fixed top-0 left-0 h-full">
        <?php include 'component/sidebar.php'; ?>
    </div>

    <!-- Konten Utama (beri padding-left agar tidak ketutup sidebar) -->
    <main class="flex-1 pl-72 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Tambah Data Sekolah Baru</h1>
            <a href="?action=sekolahAdmin" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                ← Kembali ke Daftar
            </a>
        </div>

        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md p-6">
            <form action="?action=sekolahAdmin&method=store" method="POST" class="space-y-4">
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Sekolah</label>
                    <input type="text" name="namaSekolah" required placeholder="Masukkan nama sekolah"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" 
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Simpan Data Sekolah
                </button>
            </form>
        </div>

    </main>

</div>
</body>

</html>