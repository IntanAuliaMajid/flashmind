<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Daftar Kata</title>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-full">

<?php include "component/navbar.php"; ?>

<main class="w-full px-6 py-5 mt-20">

    <!-- HEADER + TOMBOL TAMBAH -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold"><?= htmlspecialchars($kelompok['nama_kelompok_kata']) ?></h1>
            <p class="text-gray-600 mt-1">Flashcard Kata</p>
        </div>

        <div class="flex gap-2">
            <a href="index.php?action=kata&method=tambah&id=<?= $idKelompok ?>"
               class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
               + Tambah Kata
            </a>
            <a href="index.php?action=kelompokKata"
               class="px-5 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
               Kembali
            </a>
        </div>
    </div>

    <!-- LIST KATA / FLASHCARD -->
    <?php if($kata): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($kata as $row): ?>
                <div class="bg-white p-6 shadow rounded-lg border-l-4 border-indigo-600">
                    <!-- Kata -->
                    <h2 class="text-2xl font-bold text-indigo-700 mb-3">
                        <?= htmlspecialchars($row['kata']) ?>
                    </h2>

                    <!-- Arti -->
                    <p class="text-gray-700 mb-2">
                        <span class="text-sm text-gray-500">Arti:</span><br>
                        <?= htmlspecialchars($row['arti']) ?>
                    </p>

                    <!-- Contoh -->
                    <?php if(!empty($row['contoh'])): ?>
                        <p class="text-gray-600 mb-4">
                            <span class="text-sm text-gray-500">Contoh:</span><br>
                            <?= nl2br(htmlspecialchars($row['contoh'])) ?>
                        </p>
                    <?php endif; ?>

                    <!-- Tombol Edit & Hapus -->
                    <div class="flex justify-between text-sm mt-4 pt-4 border-t">
                        <a href="index.php?action=kata&method=edit&id=<?= $row['id_kata'] ?>" 
                           class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>

                        <a href="index.php?action=kata&method=delete&id=<?= $row['id_kata'] ?>"
                           onclick="return confirm('Yakin hapus kata ini?')"
                           class="text-red-600 hover:text-red-800 font-medium">Hapus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="bg-white p-6 rounded shadow text-center">
            <p class="text-gray-500 mb-4">Belum ada kata dalam kelompok ini</p>
            <a href="index.php?action=kata&method=tambah&id=<?= $idKelompok ?>"
               class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 inline-block">
               Buat Kata Pertama
            </a>
        </div>
    <?php endif; ?>

</main>
<?php include "component/footer.php"?>
</body>
</html>
