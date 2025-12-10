<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Kelompok Saya - Flashcard App</title>
        <script src="https://cdn.tailwindcss.com"></script>
       <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
        <script>

            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {},
                },
            };
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-full">

    <!-- Navigation Bar -->
    <?php include "component/navbar.php"; ?>

        <!-- Main Content -->
        <main class="w-full px-6 py-5 mt-20">
            <!-- Word of the Day Section -->
            <?php if($wod): ?>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-8">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                    Word of the Day
                </h2>
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-lg p-4">
                    <h3 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">
                        <?php echo htmlspecialchars($wod['kata'] ?? 'Tidak ada kata'); ?>
                    </h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-2">
                        <strong>Arti:</strong> <?php echo htmlspecialchars($wod['arti'] ?? 'Tidak ada arti'); ?>
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        <strong>Contoh:</strong> <?php echo htmlspecialchars($wod['contoh']); ?>
                    </p>
                </div>
            </div>
            <?php else: ?>
            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4 mb-8">
                <p class="text-yellow-800 dark:text-yellow-200">
                    Belum ada Word of the Day yang aktif saat ini.
                </p>
            </div>
            <?php endif; ?>
        <section class="w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-10 mb-10 flex flex-col lg:flex-row items-center gap-10">
            
            <!-- Text -->
            <div class="flex-1">
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-gray-100 leading-tight mb-4">
                    Belajar jadi lebih gampang dan teratur ✨
                </h1>
                <p class="text-gray-600 dark:text-gray-300 text-base mb-6">
                    Buat kelompok kata kamu sendiri dan mulai hafalin materi tanpa ribet. Tinggal klik, buat, dan pakai!
                </p>
                <a href="?action=kelompokKata"
                    class="bg-indigo-600 dark:bg-indigo-500 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
                    Mulai Buat Kelompok
                </a>
            </div>

            <!-- Image / Illustration -->
            <div class="flex-1 flex justify-center">
                <img src="public/hero.png"
                    alt="Flashcard illustration"
                    class="w-80 lg:w-96 drop-shadow-lg rounded-lg">
            </div>
        </section>
        <!-- LIST KELOMPOK KATA -->
        <section class="mt-10">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-5">
                Kelompok Kata Saya
            </h2>


            <?php if (!empty($kelompokList)): ?>
                <!-- GRID LIST -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    <?php foreach ($kelompokList as $k): ?>
                    <a href="index.php?action=kata&method=daftar&id=<?= $k['id_kelompok_kata'] ?>">
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-6 rounded-xl shadow-sm hover:shadow-md transition cursor-pointer">
                        
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                            <?= htmlspecialchars($k['nama_kelompok_kata']); ?>
                        </h3>

                    </div>
                    <?php endforeach; ?>
                    </a>

                </div>

            <?php else: ?>
                <div class="text-center bg-gray-100 dark:bg-gray-800 p-6 rounded-xl border border-gray-300 dark:border-gray-700 mt-6">
                    <p class="text-gray-600 dark:text-gray-300">
                        Kamu belum membuat kelompok kata.
                    </p>
                    <a href="?action=kelompokKata"
                    class="inline-block mt-4 bg-indigo-600 dark:bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
                        Buat Sekarang
                    </a>
                </div>
            <?php endif; ?>
        </section>

        </main>
        <?php include "component/footer.php"?>
</body>
</html>
