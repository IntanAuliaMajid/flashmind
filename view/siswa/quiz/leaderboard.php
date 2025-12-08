<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard<?= $quiz ? ' - ' . htmlspecialchars($quiz['nama_quiz']) : '' ?> - Flashmind</title>

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

        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                    🏆 Leaderboard
                </h1>
                <?php if ($quiz): ?>
                    <p class="text-gray-600 dark:text-gray-400">
                        Quiz: <span class="font-semibold"><?= htmlspecialchars($quiz['nama_quiz']) ?></span>
                    </p>
                <?php else: ?>
                    <p class="text-gray-600 dark:text-gray-400">
                        Peringkat global berdasarkan rata-rata nilai semua quiz
                    </p>
                <?php endif; ?>
            </div>

            <!-- Tabs -->
            <div class="mb-6 flex gap-2 flex-wrap">
                <a href="index.php?action=quiz&method=leaderboard" 
                   class="<?= !$quiz ? 'bg-indigo-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100' ?> px-4 py-2 rounded-lg font-semibold transition hover:opacity-80">
                    <i class="fa-solid fa-globe"></i> Global
                </a>
                <?php 
                $all_quiz = getAllQuiz();
                foreach ($all_quiz as $q): 
                ?>
                    <a href="index.php?action=quiz&method=leaderboard&quiz_id=<?= $q['id_quiz'] ?>" 
                       class="<?= ($quiz && $quiz['id_quiz'] == $q['id_quiz']) ? 'bg-indigo-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100' ?> px-4 py-2 rounded-lg font-semibold transition hover:opacity-80">
                        <?= htmlspecialchars($q['nama_quiz']) ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Leaderboard Table -->
            <?php if (empty($leaderboard)): ?>
                <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 p-5 rounded-lg">
                    <p class="text-yellow-800 dark:text-yellow-200">
                        <i class="fa-solid fa-info-circle"></i> Belum ada data untuk leaderboard ini.
                    </p>
                </div>
            <?php else: ?>
                <!-- User's Rank Info -->
                <?php 
                $current_user_id = $_SESSION['id_siswa'] ?? null;
                $user_rank_info = null;
                
                $temp_rank = 1;
                foreach ($leaderboard as $entry):
                    if ($current_user_id && 
                        (isset($entry['siswa_id']) && $entry['siswa_id'] == $current_user_id ||
                         isset($entry['id_siswa']) && $entry['id_siswa'] == $current_user_id)) {
                        $user_rank_info = [
                            'rank' => $temp_rank,
                            'entry' => $entry
                        ];
                        break;
                    }
                    $temp_rank++;
                endforeach;
                ?>
                
                <?php if ($user_rank_info): ?>
                    <div class="mb-6 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl p-6 text-white shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold opacity-90">Peringkat Anda</p>
                                <p class="text-4xl font-bold mt-1">
                                    <?php 
                                        $rank = $user_rank_info['rank'];
                                        if ($rank == 1) echo '🥇';
                                        elseif ($rank == 2) echo '🥈';
                                        elseif ($rank == 3) echo '🥉';
                                        else echo '#' . $rank;
                                    ?>
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-semibold opacity-90">
                                    <?php if (!$quiz): ?>
                                        Rata-rata Nilai
                                    <?php else: ?>
                                        Nilai Quiz Ini
                                    <?php endif; ?>
                                </p>
                                <p class="text-4xl font-bold mt-1">
                                    <?php if (!$quiz): ?>
                                        <?= number_format($user_rank_info['entry']['avg_score'], 1) ?>
                                    <?php else: ?>
                                        <?= number_format($user_rank_info['entry']['skor_akhir'], 1) ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="py-4 px-5 text-gray-700 dark:text-gray-300 text-sm font-semibold">Rank</th>
                                <th class="py-4 px-5 text-gray-700 dark:text-gray-300 text-sm font-semibold">Nama Siswa</th>
                                <th class="py-4 px-5 text-gray-700 dark:text-gray-300 text-sm font-semibold">Sekolah</th>
                                <?php if (!$quiz): ?>
                                    <th class="py-4 px-5 text-gray-700 dark:text-gray-300 text-sm font-semibold text-center">Quiz Selesai</th>
                                    <th class="py-4 px-5 text-gray-700 dark:text-gray-300 text-sm font-semibold text-center">Rata-rata Nilai</th>
                                <?php else: ?>
                                    <th class="py-4 px-5 text-gray-700 dark:text-gray-300 text-sm font-semibold text-center">Nilai</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $rank = 1;
                            $current_user_rank = null;
                            $current_user_id = $_SESSION['id_siswa'] ?? null;
                            
                            foreach ($leaderboard as $entry): 
                                // Medal untuk top 3
                                $medal = '';
                                if ($rank == 1) $medal = '🥇';
                                elseif ($rank == 2) $medal = '🥈';
                                elseif ($rank == 3) $medal = '🥉';
                                
                                // Cek apakah entry ini adalah user yang sedang login
                                $is_current_user = $current_user_id && 
                                                   (isset($entry['siswa_id']) && $entry['siswa_id'] == $current_user_id ||
                                                    isset($entry['id_siswa']) && $entry['id_siswa'] == $current_user_id);
                                
                                if ($is_current_user) {
                                    $current_user_rank = $rank;
                                }
                                
                                $row_class = $is_current_user ? 'bg-indigo-50 dark:bg-indigo-900/20 border-2 border-indigo-500' : '';
                            ?>
                            <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/40 transition <?= $row_class ?>">
                                <td class="py-4 px-5 text-gray-900 dark:text-gray-100 font-bold text-lg">
                                    <?= $medal ?: '<span class="text-gray-400">#' . $rank . '</span>' ?> <?= $medal ? $rank : '' ?>
                                </td>
                                <td class="py-4 px-5 text-gray-900 dark:text-gray-100">
                                    <div class="font-medium">
                                        <?= htmlspecialchars($entry['nama']) ?>
                                        <?php if ($is_current_user): ?>
                                            <span class="text-xs bg-indigo-600 text-white px-2 py-1 rounded ml-2">Anda</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">@<?= htmlspecialchars($entry['username']) ?></div>
                                </td>
                                <td class="py-4 px-5 text-gray-600 dark:text-gray-400">
                                    <?= htmlspecialchars($entry['nama_sekolah'] ?? '-') ?>
                                </td>
                                <?php if (!$quiz): ?>
                                    <td class="py-4 px-5 text-center text-gray-600 dark:text-gray-300">
                                        <i class="fa-solid fa-clipboard-check"></i> <?= $entry['total_quiz'] ?>
                                    </td>
                                    <td class="py-4 px-5 text-center">
                                        <span class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
                                            <?= number_format($entry['avg_score'], 1) ?>
                                        </span>
                                    </td>
                                <?php else: ?>
                                    <td class="py-4 px-5 text-center">
                                        <span class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
                                            <?= number_format($entry['skor_akhir'], 1) ?>
                                        </span>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <?php 
                            $rank++;
                            endforeach; 
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <!-- Back Button -->
            <div class="mt-6">
                <a href="index.php?action=quiz" class="inline-block bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-gray-100 font-semibold py-3 px-6 rounded-lg transition">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Quiz
                </a>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <?php include "component/footer.php"; ?>

</body>
</html>
