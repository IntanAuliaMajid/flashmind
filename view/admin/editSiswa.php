<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Edit Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex">

    <div class="w-64 bg-white shadow-lg fixed top-0 left-0 h-full">
        <?php include 'component/sidebar.php'; ?> 
    </div>

    <main class="flex-1 pl-72 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Edit Data Siswa</h1>
            <a href="?action=siswaAdmin" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                ← Kembali ke Daftar
            </a>
        </div>

        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md p-6 space-y-6">
            
            <h2 class="text-xl font-semibold border-b pb-2 mb-4">Informasi Dasar Siswa</h2>
            <form action="?action=siswaAdmin&method=update" method="POST" class="space-y-4">

                <input type="hidden" name="id" value="<?= $data['id_siswa'] ?>">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input type="text" name="username" value="<?= $data['username'] ?>" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Siswa</label>
                    <input type="text" name="namaSiswa" value="<?= $data['nama'] ?>" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Sekolah</label>
                    <select name="sekolahId" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <?php foreach($sekolah as $s): ?>
                            <option value="<?= $s['id_sekolah'] ?>"
                                <?= $s['id_sekolah'] == $data['sekolah_id'] ? 'selected' : '' ?>>
                                <?= $s['nama_sekolah'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" 
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Simpan Perubahan Data Siswa
                </button>
            </form>
            
            <hr class="my-6 border-gray-200">

            <h2 class="text-xl font-semibold border-b pb-2 mb-4 text-red-600">Manajemen Akses (Role)</h2>
            <form action="?action=siswaAdmin&method=updateRole" method="POST" class="space-y-4">

                <input type="hidden" name="id" value="<?= $data['id_siswa'] ?>">
                <input type="hidden" name="username" value="<?= $data['username'] ?>">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status Pengguna</label>
                    <?php 
                        // Akses array dengan aman
                        $isAdmin = $data['is_admin'] ?? false; 
                    ?>
                    <div class="flex items-center p-3 border rounded-md <?= $isAdmin ? 'border-red-500 bg-red-50' : 'border-gray-300 bg-gray-50' ?>">
                        <input id="is_admin" name="is_admin" type="checkbox" value="1"
                                <?= $isAdmin ? 'checked' : '' ?>
                               class="h-5 w-5 text-red-600 border-gray-300 rounded focus:ring-red-500">
                        <label for="is_admin" class="ml-3 block text-base font-medium text-gray-700">
                            Jadikan Pengguna Ini Sebagai **Admin**
                        </label>
                    </div>
                    <?php if ($isAdmin): ?>
                        <p class="text-xs text-red-500 mt-2">Status saat ini: ADMIN</p>
                    <?php else: ?>
                        <p class="text-xs text-gray-500 mt-2">Status saat ini: SISWA</p>
                    <?php endif; ?>
                </div>

                <button type="submit" 
                        class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Simpan Perubahan Role
                </button>
            </form>

        </div>

    </main>
</div>
</body>
</html>