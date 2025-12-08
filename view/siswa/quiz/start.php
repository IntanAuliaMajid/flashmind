<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - <?= htmlspecialchars($data['nama_quiz']) ?></title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: { extend: {} }
        }

        let waktu = <?= intval(explode(':', $data['durasi'])[0]) * 3600 + intval(explode(':', $data['durasi'])[1]) * 60 + intval(explode(':', $data['durasi'])[2]) ?>;

        function timer() {
            let jam = Math.floor(waktu / 3600);
            let menit = Math.floor((waktu % 3600) / 60);
            let detik = waktu % 60;

            let display = '';
            if (jam > 0) display += jam + 'j ';
            display += menit + 'm ' + (detik < 10 ? '0' + detik : detik) + 's';

            document.getElementById("timer").innerHTML = display;

            if (waktu <= 0) {
                alert('Waktu habis! Jawaban akan dikumpulkan otomatis.');
                document.getElementById("formQuiz").submit();
            }

            waktu--;
        }

        setInterval(timer, 1000);
        timer();
    </script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-full font-[Quicksand]">

    <div class="w-full max-w-4xl mx-auto px-4 py-5">

        <!-- Header Quiz -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                <?= htmlspecialchars($data['nama_quiz']) ?>
            </h1>
            <div class="bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200 px-4 py-2 rounded-lg inline-block">
                <i class="fa-solid fa-clock"></i> Waktu Tersisa: <span id="timer" class="font-bold">00:00</span>
            </div>
        </div>

        <form id="formQuiz" method="POST" action="index.php?action=quiz&method=submitQuiz" class="space-y-6">
            <input type="hidden" name="quiz_id" value="<?= $data['id_quiz'] ?>">

            <?php if (empty($soal)): ?>
                <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 p-5 rounded-lg">
                    <p class="text-yellow-800 dark:text-yellow-200">
                        Tidak ada soal untuk quiz ini.
                    </p>
                </div>
            <?php else: ?>
                <?php $no = 1; foreach ($soal as $s): ?>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm">
                    <!-- Pertanyaan -->
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                        <span class="text-indigo-600 dark:text-indigo-400"><?= $no++ ?></span>. <?= htmlspecialchars($s['teks_pertanyaan']) ?>
                    </h3>

                    <!-- Jawaban -->
                    <div class="space-y-3">
                        <?php foreach ($s['jawaban'] as $index => $j): ?>
                        <label class="flex items-center p-3 rounded-lg border-2 border-gray-200 dark:border-gray-600 hover:border-indigo-400 dark:hover:border-indigo-500 cursor-pointer transition">
                            <input type="radio" 
                                   name="jawaban[<?= $s['id_pertanyaan'] ?>]" 
                                   value="<?= $j['id_jawaban'] ?>"
                                   class="w-4 h-4 text-indigo-600 dark:text-indigo-400">
                            <span class="ml-3 text-gray-800 dark:text-gray-200">
                                <?= htmlspecialchars($j['teks_jawaban']) ?>
                            </span>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Tombol Submit -->
                <div class="flex gap-3 mt-8">
                    <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold py-3 rounded-lg transition">
                        <i class="fa-solid fa-check"></i> Kumpulkan Jawaban
                    </button>
                </div>
            <?php endif; ?>
        </form>

    </div>

    <!-- FOOTER -->
    <?php include "component/footer.php"; ?>

</body>
</html>
