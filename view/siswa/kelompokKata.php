<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Kelompok Kata</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-full">

    <!-- Navigation Bar -->
    <?php include "component/navbar.php"; ?>

<main class="w-full px-6 py-5 mt-20">

    <!-- HEADER + TOMBOL TAMBAH -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Kelompok Kata Siswa</h1>

        <a href="index.php?action=kelompokKata&method=tambah"
           class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
           + Buat Kelompok Baru
        </a>
    </div>

    <!-- LIST KELOMPOK -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach($kelompok as $row): ?>
            <div class="bg-white p-5 shadow rounded-lg">

            <!-- Nama Kelompok -->
                <h2 class="text-xl font-semibold mb-3">
                    <a href="index.php?action=kata&method=daftar&id=<?= $row['id_kelompok_kata'] ?>"
                    class="text-indigo-700 hover:underline">
                        <?= $row['nama_kelompok_kata'] ?>
                    </a>
                </h2>
                <!-- Tombol Edit & Hapus -->
                <div class="flex justify-between text-sm mt-4">
                    <a href="index.php?action=kelompokKata&method=edit&id=<?= $row['id_kelompok_kata'] ?>" 
                       class="text-blue-600">Edit</a>

                    <a href="index.php?action=kelompokKata&method=delete&id=<?= $row['id_kelompok_kata'] ?>"
                       onclick="return confirm('Yakin hapus?')"
                       class="text-red-600">Hapus</a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

</main>

</body>
</html>
