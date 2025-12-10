<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Flashcard App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        .container-hover {
            position: relative;
            width: 96px;
            height: 96px;
            cursor: pointer;
            border-radius: 50%;
            overflow: hidden;
        }
        .profile-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            transition: 0.3s ease;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0,0,0,0.5);
            border-radius: 50%;
            transition: 0.3s ease;
        }
        .container-hover:hover .overlay {
            opacity: 1;
        }
        .container-hover:hover .profile-image {
            filter: brightness(0.7);
        }
        .text-overlay {
            color: white;
            font-weight: 600;
            font-size: 14px;
        }
    </style>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: { extend: {} }
        };
    </script>
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen">
<?php include "component/navbar.php"; ?>

<main class="w-full mx-auto px-4 mt-20">

    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8 text-center">
        My Profile
    </h1>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-8 border border-gray-200 dark:border-gray-700">

        <form action="?action=profil&method=update" method="POST" enctype="multipart/form-data">

            <div class="flex flex-col items-center mb-8">

                <div class="container-hover" onclick="triggerFileUpload()">
                    <?php 
                    $avatar = $profil['avatar'] ?? null;
                    $nama_user = $_SESSION['nama'] ?? 'User';

                    $image_source = (!empty($avatar) && file_exists('uploads/' . $avatar))
                        ? 'uploads/' . $avatar
                        : 'https://ui-avatars.com/api/?name=' . urlencode($nama_user) . '&background=4F46E5&color=fff&size=40'; 
                    ?>

                    <img id="profileImagePreview" 
                        src="<?= $image_source; ?>" 
                        class="profile-image shadow">

                    <div class="overlay">
                        <div class="text-overlay">Edit Photo</div>
                    </div>

                    <input type="file" name="foto" id="fileInput" accept="image/*" style="display: none;" onchange="previewImage(event)">
                </div>

                <p class="text-xl font-semibold mt-4 text-gray-900 dark:text-gray-100">
                    <?= $_SESSION['nama']; ?>
                </p>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    <?= $_SESSION['username']; ?>
                </p>

            </div>

            <div class="space-y-4">
                <div>
                    <label class="text-gray-700 dark:text-gray-300 text-sm">Full Name</label>
                    <input type="text" name="nama_lengkap" value="<?= $_SESSION['nama']; ?>"
                        class="w-full mt-1 p-2 rounded-lg border border-gray-300 dark:border-gray-600 
                               bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-300 text-sm">Username</label>
                    <input type="text" name="username" value="<?= $_SESSION['username']; ?>"
                        class="w-full mt-1 p-2 rounded-lg border border-gray-300 dark:border-gray-600 
                               bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-300 text-sm">School</label>
                    <input type="text" name="sekolah" value="<?= $_SESSION['sekolah']; ?>"
                        class="w-full mt-1 p-2 rounded-lg border border-gray-300 dark:border-gray-600 
                               bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100" readonly>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 dark:bg-indigo-500 text-white py-3 rounded-lg 
                           hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
                    Save Changes
                </button>
            </div>

        </form>
    </div>

    <!-- WORD STATISTICS -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Word Statistics</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">

            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Total Word Groups</p>
                        <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mt-2"><?= $totalKelompok ?></p>
                    </div>
                    <div class="text-5xl text-indigo-100 dark:text-indigo-900">
                        <i class="fas fa-folder"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Total Words Learned</p>
                        <p class="text-3xl font-bold text-purple-600 dark:text-purple-400 mt-2"><?= $totalKata ?></p>
                    </div>
                    <div class="text-5xl text-purple-100 dark:text-purple-900">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
            </div>

        </div>

        <?php if (!empty($statisticKata)): ?>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 shadow-md">

            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Word Distribution by Date</h3>

                <div class="flex gap-2">
                    <button onclick="switchChartType('doughnut')" id="btnDoughnut" class="px-4 py-2 rounded-lg bg-indigo-600 text-white font-semibold transition hover:bg-indigo-700">
                        <i class="fas fa-circle"></i> Donut
                    </button>
                    <button onclick="switchChartType('bar')" id="btnBar" class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 font-semibold transition hover:bg-gray-300 dark:hover:bg-gray-600">
                        <i class="fas fa-bars"></i> Bar
                    </button>
                </div>
            </div>

            <div style="position: relative; height: 400px;">
                <canvas id="statisticChart"></canvas>
            </div>

            <div class="mt-8">
                <h4 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-4">Word Details by Date</h4>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="py-3 px-4 text-left text-gray-700 dark:text-gray-300 font-semibold">Date Created</th>
                                <th class="py-3 px-4 text-center text-gray-700 dark:text-gray-300 font-semibold">Total Words</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($statisticKata as $stat): ?>
                            <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/40 transition">
                                <td class="py-3 px-4 text-gray-900 dark:text-gray-100"><?= htmlspecialchars($stat['tanggal_dibuat']) ?></td>
                                <td class="py-3 px-4 text-center">
                                    <span class="bg-indigo-100 dark:bg-indigo-900/30 text-indigo-800 dark:text-indigo-200 px-3 py-1 rounded-full font-semibold">
                                        <?= $stat['total_kata'] ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <?php else: ?>
        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 p-6 rounded-xl">
            <p class="text-yellow-800 dark:text-yellow-200 text-center">
                <i class="fas fa-info-circle"></i> No word groups available yet. 
                <a href="?action=kelompokKata" class="font-semibold hover:underline">Create a word group now</a>
            </p>
        </div>
        <?php endif; ?>
    </div>

</main>

<script>
    function triggerFileUpload() {
        document.getElementById('fileInput').click();
    }

    function previewImage(event) {
        const file = event.target.files[0];
        const profileImage = document.getElementById('profileImagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>

<?php include "component/navbar-script.php"; ?>
</body>
</html>
