<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Buat Kelompok Baru</title>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-full">

    <?php include "component/navbar.php"; ?>

<main class="w-full px-6 py-5 mt-20 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Buat Kelompok Baru</h1>

    <form action="index.php?action=kelompokKata&method=tambah" method="post" class="bg-white p-6 rounded shadow">
        <label class="block mb-2 font-medium">Nama Kelompok</label>
        <input type="text" name="nama_kelompok" class="w-full border rounded px-3 py-2 mb-4" required>

        <div class="flex justify-between">
            <a href="index.php?action=kelompokKata" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Simpan</button>
        </div>
    </form>

</main>

</body>
</html>