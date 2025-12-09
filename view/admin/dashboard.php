<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <?php include 'component/sidebar.php'; ?> 

        <main class="flex-1 pl-72 p-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Halo, Admin!</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500">
                    <p class="text-sm font-medium text-gray-500">Total Siswa</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1"><?= $totalSiswa ?? 0 ?></p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500">
                    <p class="text-sm font-medium text-gray-500">Total Sekolah</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1"><?= $totalSekolah ?? 0 ?></p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-purple-500">
                    <p class="text-sm font-medium text-gray-500">Total Quiz Aktif</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1"><?= $totalQuiz ?? 0 ?></p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        🏆 Top 5 Peringkat Siswa
                    </h2>
                    <ul class="divide-y divide-gray-200">
                        <?php if (empty($topPeringkat)): ?>
                            <li class="py-3 text-gray-500">Belum ada data hasil quiz.</li>
                        <?php else: ?>
                            <?php foreach ($topPeringkat as $index => $siswa): ?>
                                <li class="flex justify-between items-center py-3">
                                    <div class="flex items-center space-x-3">
                                        <span class="text-lg font-bold w-6 text-center text-blue-600"><?= $index + 1 ?>.</span>
                                        <div>
                                            <p class="font-medium"><?= htmlspecialchars($siswa['nama']) ?></p>
                                            <p class="text-sm text-gray-500"><?= htmlspecialchars($siswa['nama_sekolah']) ?></p>
                                        </div>
                                    </div>
                                    <span class="text-2xl font-extrabold text-green-600"><?= htmlspecialchars($siswa['skor_akhir']) ?></span>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        📅 Aktivitas Quiz Terbaru
                    </h2>
                    <ul class="space-y-4">
                        <?php if (empty($aktivitasTerakhir)): ?>
                            <li class="py-3 text-gray-500">Belum ada quiz yang terdaftar.</li>
                        <?php else: ?>
                            <?php foreach ($aktivitasTerakhir as $quiz): ?>
                                <li class="border-b pb-2">
                                    <p class="font-medium text-blue-700"><?= htmlspecialchars($quiz['nama_quiz']) ?></p>
                                    <div class="text-sm text-gray-600 flex justify-between">
                                        <span>Pelaksanaan: <?= date('d M Y H:i', strtotime($quiz['waktu_pelaksanaan'])) ?></span>
                                        <span class="font-mono text-xs bg-gray-100 px-2 py-0.5 rounded">Durasi: <?= $quiz['durasi'] ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>

            </div>

        </main>

    </div>

</body>
</html>