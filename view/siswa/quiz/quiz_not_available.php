<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Tidak Tersedia - Flashmind</title>

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
            <!-- Card Error -->
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-lg p-8 text-center">
                
                <!-- Icon -->
                <div class="mb-6">
                    <div class="inline-block bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 p-4 rounded-full text-5xl">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                    Quiz Tidak Tersedia
                </h1>

                <!-- Message -->
                <p class="text-lg text-red-600 dark:text-red-400 mb-8">
                    <?= htmlspecialchars($quizStatus['message']) ?>
                </p>

                <!-- Info Box -->
                <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4 mb-8">
                    <p class="text-yellow-800 dark:text-yellow-200">
                        <i class="fa-solid fa-info-circle"></i>
                        Hubungi guru atau admin untuk informasi lebih lanjut tentang jadwal quiz.
                    </p>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3 flex-col sm:flex-row justify-center">
                    <a href="index.php?action=quiz" class="bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold py-3 px-6 rounded-lg transition">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Quiz
                    </a>
                    <a href="index.php?action=home" class="bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-gray-100 font-semibold py-3 px-6 rounded-lg transition">
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
