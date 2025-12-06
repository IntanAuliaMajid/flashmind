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
                <button 
                    onclick="createNewGroup()"
                    class="bg-indigo-600 dark:bg-indigo-500 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
                    Mulai Buat Kelompok
                </button>
            </div>

            <!-- Image / Illustration -->
            <div class="flex-1 flex justify-center">
                <img src="public/hero.png"
                    alt="Flashcard illustration"
                    class="w-80 lg:w-96 drop-shadow-lg rounded-lg">
            </div>
        </section>
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-lg pl-5 font-bold text-gray-900 dark:text-gray-100">
                    Kelompok Kata Saya
                </h1>
                <button
                    onclick="createNewGroup()"
                    class="bg-indigo-600 dark:bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 dark:hover:bg-indigo-600 transition-colors"
                >
                    + Buat Kelompok
                </button>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400 pl-5 mt-1">
                Kelompok kata kamu masih kosong. Yuk mulai buat kelompok pertama kamu!
            </p>


            <!-- Groups Grid -->
            <div id="groupsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- card kelompok akan muncul via JS / PHP -->
            </div>

            <!-- Empty State -->
            <div id="emptyState" class="text-center py-12 hidden">
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Anda belum memiliki kelompok kata.
                </p>
                <button
                    onclick="createNewGroup()"
                    class="inline-block bg-indigo-600 dark:bg-indigo-500 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 dark:hover:bg-indigo-600 transition-colors"
                >
                    Buat Kelompok Pertama Anda
                </button>
            </div>
        </main>
        <?php include "component/footer.php"?>
</body>
</html>
