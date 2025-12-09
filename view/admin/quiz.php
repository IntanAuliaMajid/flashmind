<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard - Data Quiz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex">
    <div class="w-64 bg-white shadow-lg fixed top-0 left-0 h-full">
        <?php include 'component/sidebar.php'; ?>
    </div>

    <main class="flex-1 pl-72 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Data Quiz</h1>
            <a href="?action=quizAdmin&method=create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + Buat Quiz Baru
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-xl shadow-md">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">Nama Quiz</th>
                        <th class="py-3 px-6 text-left">Durasi</th>
                        <th class="py-3 px-6 text-left">Pelaksanaan</th>
                        <th class="py-3 px-6 text-left">Dibuat Oleh</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($data as $row): ?>
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-6"><?= $row['nama_quiz']; ?></td>
                        <td class="py-3 px-6"><?= $row['durasi']; ?></td> 
                        <td class="py-3 px-6"><?= $row['waktu_pelaksanaan']; ?></td> 
                        <td class="py-3 px-6"><?= $row['admin_name']; ?></td> 
                        <td class="py-3 px-6 text-center space-x-2">
                            <a href="?action=quizAdmin&method=edit&id=<?= $row['id_quiz']; ?>" class="text-blue-600 hover:underline">Edit</a>
                            <a onclick="return confirm('Yakin ingin menghapus quiz ini?');" href="?action=quizAdmin&method=delete&id=<?= $row['id_quiz']; ?>" class="text-red-600 hover:underline">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>
</div>
</body>
</html>