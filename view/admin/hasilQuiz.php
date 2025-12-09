<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard - Hasil Quiz Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex">
    <div class="w-64 bg-white shadow-lg fixed top-0 left-0 h-full">
        <?php include 'component/sidebar.php'; ?>
    </div>

    <main class="flex-1 pl-72 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Data Hasil Quiz Siswa</h1>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-xl shadow-md">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">ID Hasil</th>
                        <th class="py-3 px-6 text-left">Nama Siswa</th>
                        <th class="py-3 px-6 text-left">Sekolah</th>
                        <th class="py-3 px-6 text-left">Nama Quiz</th>
                        <th class="py-3 px-6 text-right">Skor Akhir</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($data as $row): ?>
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-6"><?= $row['id_hasil']; ?></td>
                        <td class="py-3 px-6"><?= $row['nama_siswa']; ?></td> 
                        <td class="py-3 px-6"><?= $row['nama_sekolah']; ?></td> 
                        <td class="py-3 px-6"><?= $row['nama_quiz']; ?></td> 
                        <td class="py-3 px-6 text-right font-bold">
                            <span class="text-lg <?= $row['skor_akhir'] >= 70.00 ? 'text-green-600' : 'text-red-600' ?>">
                                <?= $row['skor_akhir']; ?>
                            </span>
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