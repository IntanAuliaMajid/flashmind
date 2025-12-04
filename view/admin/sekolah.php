<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard - Data Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex">

    <!-- Sidebar (Fixed) -->
    <div class="w-64 bg-white shadow-lg fixed top-0 left-0 h-full">
        <?php include 'component/sidebar.php'; ?>
    </div>

    <!-- Konten Utama (beri padding-left agar tidak ketutup sidebar) -->
    <main class="flex-1 pl-72 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Data Sekolah</h1>
            <a href="?action=sekolahAdmin&method=create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + Tambah Sekolah
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-xl shadow-md">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Nama Sekolah</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($data as $row): ?>
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-6"><?= $row['id_sekolah']; ?></td>
                        <td class="py-3 px-6"><?= $row['nama_sekolah']; ?></td> 
                        <td class="py-3 px-6 text-center">
                            <a href="?action=sekolahAdmin&method=edit&id=<?= $row['id_sekolah']; ?>" class="text-blue-600 hover:underline">Edit</a> |
                            <a onclick="return confirm('Yakin ingin menghapus sekolah ini?');" href="?action=sekolahAdmin&method=delete&id=<?= $row['id_sekolah']; ?>" class="text-red-600 hover:underline">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Paginasi -->
        <?php if ($pagination['totalPages'] > 1): ?>
        <div class="mt-6 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Menampilkan <?= count($data) ?> dari <?= $pagination['totalData'] ?> data sekolah
            </div>
            
            <div class="flex space-x-1">
                <!-- Tombol Previous -->
                <?php if ($pagination['currentPage'] > 1): ?>
                    <a href="?action=sekolahAdmin&page=<?= $pagination['currentPage'] - 1 ?>" 
                       class="px-3 py-2 text-sm bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-md">
                        ← Previous
                    </a>
                <?php endif; ?>

                <!-- Nomor Halaman -->
                <?php 
                $startPage = max(1, $pagination['currentPage'] - 2);
                $endPage = min($pagination['totalPages'], $pagination['currentPage'] + 2);
                
                for ($i = $startPage; $i <= $endPage; $i++): 
                ?>
                    <a href="?action=sekolahAdmin&page=<?= $i ?>" 
                       class="px-3 py-2 text-sm border rounded-md <?= $i == $pagination['currentPage'] ? 'bg-blue-600 text-white border-blue-600' : 'bg-white border-gray-300 text-gray-700 hover:bg-gray-50' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <!-- Tombol Next -->
                <?php if ($pagination['currentPage'] < $pagination['totalPages']): ?>
                    <a href="?action=sekolahAdmin&page=<?= $pagination['currentPage'] + 1 ?>" 
                       class="px-3 py-2 text-sm bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-md">
                        Next →
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

    </main>

</div>
</body>

</html>