<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Edit Pertanyaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex">
    <div class="w-64 bg-white shadow-lg fixed top-0 left-0 h-full">
        <?php include 'component/sidebar.php'; ?>
    </div>
    <main class="flex-1 pl-72 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Edit Pertanyaan ID: <?= $data['id_pertanyaan'] ?></h1>
            <a href="?action=pertanyaanAdmin" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                ← Kembali ke Daftar
            </a>
        </div>
        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6">
            <form action="?action=pertanyaanAdmin&method=update" method="POST" class="space-y-4">
                <input type="hidden" name="id" value="<?= $data['id_pertanyaan'] ?>">
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Quiz</label>
                    <select name="quizId" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Pilih Quiz --</option>
                        <?php foreach($quizList as $q): ?>
                            <option value="<?= $q['id_quiz'] ?>" <?= $q['id_quiz'] == $data['quiz_id'] ? 'selected' : '' ?>>
                                <?= $q['nama_quiz'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Teks Pertanyaan</label>
                    <textarea name="teksPertanyaan" rows="3" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"><?= $data['teks_pertanyaan'] ?></textarea>
                </div>

                <hr>
                <p class="text-sm text-gray-500">Catatan: Untuk mengedit pilihan jawaban, Anda harus memodifikasi bagian model dan controller. Saat ini hanya Teks Pertanyaan dan Quiz yang diupdate.</p>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </main>
</div>
</body>
</html>