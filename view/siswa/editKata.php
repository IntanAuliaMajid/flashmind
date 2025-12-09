<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Kata</title>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-full">

    <?php include "component/navbar.php"; ?>

<main class="w-full px-6 py-5 mt-20 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-2">Edit Kata</h1>
    <p class="text-gray-600 mb-6">Kelompok: <strong><?= htmlspecialchars($kelompok['nama_kelompok_kata']) ?></strong></p>

    <form action="index.php?action=kata&method=edit&id=<?= $kataData['id_kata'] ?>" method="post" class="bg-white p-6 rounded shadow">
        <div class="mb-4">
            <label class="block mb-2 font-medium">Kata</label>
            <input type="text" name="kata" value="<?= htmlspecialchars($kataData['kata']) ?>" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Arti / Penjelasan</label>
            <textarea name="arti" class="w-full border rounded px-3 py-2 h-24" required><?= htmlspecialchars($kataData['arti']) ?></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Contoh (opsional)</label>
            <textarea name="contoh" class="w-full border rounded px-3 py-2 h-20"><?= htmlspecialchars($kataData['contoh'] ?? '') ?></textarea>
        </div>

        <div class="flex justify-between">
            <a href="index.php?action=kata&method=daftar&id=<?= $idKelompok ?>" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Simpan Perubahan</button>
        </div>
    </form>

</main>

</body>
</html>
