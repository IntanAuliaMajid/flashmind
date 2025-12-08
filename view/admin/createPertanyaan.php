<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Tambah Pertanyaan Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex">
    <div class="w-64 bg-white shadow-lg fixed top-0 left-0 h-full">
        <?php include 'component/sidebar.php'; ?>
    </div>
    <main class="flex-1 pl-72 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Tambah Pertanyaan Baru</h1>
            <a href="?action=pertanyaanAdmin" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                ← Kembali ke Daftar
            </a>
        </div>
        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6">
            <form action="?action=pertanyaanAdmin&method=store" method="POST" class="space-y-4">
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Quiz</label>
                    <select name="quizId" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Pilih Quiz --</option>
                        <?php foreach($quizList as $q): ?>
                            <option value="<?= $q['id_quiz'] ?>">
                                <?= $q['nama_quiz'] ?> (<?= date('d M Y', strtotime($q['waktu_pelaksanaan'])) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Teks Pertanyaan</label>
                    <textarea name="teksPertanyaan" rows="3" required placeholder="Masukkan teks pertanyaan di sini"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <hr>
                <h3 class="text-lg font-semibold text-gray-800">Pilihan Jawaban (Multiple Choice)</h3>

                <div>
                    <label class="block text-sm font-medium text-green-700 mb-2">Jawaban Benar (Kunci)</label>
                    <input type="text" name="jawabanBenar" required placeholder="Jawaban yang benar"
                           class="w-full px-3 py-2 border border-green-500 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                
                <p class="text-sm text-gray-500">Pilihan Salah (Hanya diisi jika soal adalah Multiple Choice):</p>
                <div>
                    <input type="text" name="jawabanSalah1" placeholder="Pilihan salah 1"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <input type="text" name="jawabanSalah2" placeholder="Pilihan salah 2"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <input type="text" name="jawabanSalah3" placeholder="Pilihan salah 3"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Simpan Pertanyaan
                </button>
            </form>
        </div>
    </main>
</div>
</body>
</html>