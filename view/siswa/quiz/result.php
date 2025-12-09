<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Quiz - Flashmind</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: { extend: {} }
        }
    </script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-full font-[Quicksand]">

    <!-- NAVBAR -->
    <?php include "component/navbar.php"; ?>

    <main class="w-full px-6 py-5 mt-20">

        <div class="max-w-2xl mx-auto">
            <!-- Card Hasil -->
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-lg p-8 text-center">
                
                <!-- Status Badge -->
                <div class="mb-6">
                    <?php if ($nilai >= 80): ?>
                        <div class="inline-block bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 px-4 py-2 rounded-full text-sm font-semibold">
                            <i class="fa-solid fa-star"></i> Excellent!
                        </div>
                    <?php elseif ($nilai >= 60): ?>
                        <div class="inline-block bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-200 px-4 py-2 rounded-full text-sm font-semibold">
                            <i class="fa-solid fa-check"></i> Good
                        </div>
                    <?php else: ?>
                        <div class="inline-block bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200 px-4 py-2 rounded-full text-sm font-semibold">
                            <i class="fa-solid fa-triangle-exclamation"></i> Coba Lagi
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Nilai Besar -->
                <div class="mb-8">
                    <p class="text-6xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">
                        <?= $nilai ?>
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">Nilai Akhir</p>
                </div>

                <!-- Detail Hasil -->
                <div class="grid grid-cols-3 gap-4 mb-8">
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <p class="text-3xl font-bold text-gray-900 dark:text-gray-100"><?= $total ?></p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Total Soal</p>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                        <p class="text-3xl font-bold text-green-600 dark:text-green-400"><?= $benar ?></p>
                        <p class="text-sm text-green-700 dark:text-green-300">Benar</p>
                    </div>
                    <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4">
                        <p class="text-3xl font-bold text-red-600 dark:text-red-400"><?= ($total - $benar) ?></p>
                        <p class="text-sm text-red-700 dark:text-red-300">Salah</p>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="flex gap-3">
                    <a href="index.php?action=quiz" class="flex-1 bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold py-3 rounded-lg transition">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Quiz
                    </a>
                    <a href="index.php?action=quiz&method=leaderboard" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 rounded-lg transition">
                        <i class="fa-solid fa-trophy"></i> Lihat Leaderboard
                    </a>
                    <a href="index.php?action=home" class="flex-1 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-gray-100 font-semibold py-3 rounded-lg transition">
                        <i class="fa-solid fa-home"></i> Home
                    </a>
                </div>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <?php include "component/footer.php"; ?>

</body>
</html>
