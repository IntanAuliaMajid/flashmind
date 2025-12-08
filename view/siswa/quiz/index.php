<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Quiz - Flashmind</title>

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

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                Daftar Quiz 🎯
            </h1>
            <a href="index.php?action=quiz&method=leaderboard" 
               class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg transition inline-flex items-center gap-2">
                <i class="fa-solid fa-trophy"></i> Leaderboard
            </a>
        </div>

        <?php if (empty($quiz)): ?>
            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 p-5 rounded-lg">
                <p class="text-yellow-800 dark:text-yellow-200">
                    Belum ada quiz yang tersedia.
                </p>
            </div>
        <?php else: ?>

        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="py-4 px-5 text-gray-700 dark:text-gray-300 text-sm font-semibold">Judul Quiz</th>
                        <th class="py-4 px-5 text-gray-700 dark:text-gray-300 text-sm font-semibold">Durasi</th>
                        <th class="py-4 px-5 text-gray-700 dark:text-gray-300 text-sm font-semibold">Jadwal</th>
                        <th class="py-4 px-5 text-gray-700 dark:text-gray-300 text-sm font-semibold text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                    $siswa_id = $_SESSION['id_siswa'] ?? null;
                    foreach($quiz as $q): 
                        $now = new DateTime();
                        $waktu_mulai = new DateTime($q['waktu_pelaksanaan']);
                        $waktu_berakhir = new DateTime($q['waktu_berakhir']);
                        
                        // Cek apakah siswa sudah mengerjakan
                        $sudah_dikerjakan = $siswa_id ? hasStudentTakenQuiz($siswa_id, $q['id_quiz']) : false;
                        
                        if ($sudah_dikerjakan) {
                            $button_text = 'Sudah Dikerjakan';
                            $button_class = 'bg-blue-500 text-white text-sm px-4 py-2 rounded-lg inline-flex items-center gap-2 cursor-not-allowed';
                            $button_icon = 'fa-check-circle';
                            $button_disabled = true;
                        } elseif ($now < $waktu_mulai) {
                            $button_text = 'Belum Dimulai';
                            $button_class = 'bg-gray-400 dark:bg-gray-600 text-white text-sm px-4 py-2 rounded-lg inline-flex items-center gap-2 cursor-not-allowed';
                            $button_icon = 'fa-clock';
                            $button_disabled = true;
                        } elseif ($now > $waktu_berakhir) {
                            $button_text = 'Sudah Berakhir';
                            $button_class = 'bg-red-400 dark:bg-red-600 text-white text-sm px-4 py-2 rounded-lg inline-flex items-center gap-2 cursor-not-allowed';
                            $button_icon = 'fa-lock';
                            $button_disabled = true;
                        } else {
                            $button_text = 'Mulai Quiz';
                            $button_class = 'bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white text-sm px-4 py-2 rounded-lg inline-flex items-center gap-2 transition';
                            $button_icon = 'fa-play';
                            $button_disabled = false;
                        }
                    ?>
                    <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/40 transition">
                        <td class="py-4 px-5 text-gray-900 dark:text-gray-100 font-medium">
                            <?= htmlspecialchars($q['nama_quiz']) ?>
                        </td>

                        <td class="py-4 px-5 text-gray-600 dark:text-gray-300">
                            <?= htmlspecialchars($q['durasi']) ?>
                        </td>

                        <td class="py-4 px-5 text-gray-600 dark:text-gray-300 text-sm">
                            <div><?= $waktu_mulai->format('d M Y, H:i') ?></div>
                            <div class="text-xs text-gray-500">s/d <?= $waktu_berakhir->format('d M Y, H:i') ?></div>
                        </td>

                        <td class="py-4 px-5 text-center">
                            <?php if ($button_disabled): ?>
                                <button disabled class="<?= $button_class ?>">
                                    <i class="fa-solid <?= $button_icon ?>"></i> <?= $button_text ?>
                                </button>
                            <?php else: ?>
                                <a href="index.php?action=quiz&method=startQuiz&id=<?= $q['id_quiz'] ?>"
                                   class="<?= $button_class ?>">
                                    <i class="fa-solid <?= $button_icon ?>"></i> <?= $button_text ?>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php endif; ?>

    </main>

    <!-- FOOTER -->
    <?php include "component/footer.php"; ?>

</body>
</html>
