<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Flashcard App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        /* Foto profil besar */
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
            theme: {
                extend: {},
            },
        };
    </script>
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen">
<?php include "component/navbar.php"; ?>

<!-- MAIN CONTENT -->
<main class="w-full mx-auto px-4 py-10 mt-20">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8 text-center">Profil Saya</h1>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-8 border border-gray-200 dark:border-gray-700">

        <!-- FORM -->
        <form action="?action=profil&method=update" method="POST" enctype="multipart/form-data">

            <div class="flex flex-col items-center mb-8">

                <!-- Foto Profil -->
                <div class="container-hover" onclick="triggerFileUpload()">
                                        <?php 
                    $avatar = $profil['avatar'] ?? null;
                    $nama_user = $_SESSION['nama'] ?? 'Pengguna';

                    // Tentukan URL sumber gambar
                    $image_source = (!empty($avatar) && file_exists('uploads/' . $avatar))
                        ? 'uploads/' . $avatar
                        : 'https://ui-avatars.com/api/?name=' . urlencode($nama_user) . '&background=4F46E5&color=fff&size=40'; 
                    ?>

                    <img id="profileImagePreview" 
                        src="<?= $image_source; ?>" 
                        class="profile-image shadow">

                    <div class="overlay">
                        <div class="text-overlay">Edit Profil</div>
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
                    <label class="text-gray-700 dark:text-gray-300 text-sm">Nama Lengkap</label>
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
                    <label class="text-gray-700 dark:text-gray-300 text-sm">Sekolah</label>
                    <input type="text" name="sekolah" value="<?= $_SESSION['sekolah']; ?>"
                        class="w-full mt-1 p-2 rounded-lg border border-gray-300 dark:border-gray-600 
                               bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 dark:bg-indigo-500 text-white py-3 rounded-lg 
                           hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

    <!-- STATISTIK KATA -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Statistik Kata</h2>
        
        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Total Kelompok Kata</p>
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
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Total Kata Dipelajari</p>
                        <p class="text-3xl font-bold text-purple-600 dark:text-purple-400 mt-2"><?= $totalKata ?></p>
                    </div>
                    <div class="text-5xl text-purple-100 dark:text-purple-900">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart -->
        <?php if (!empty($statisticKata)): ?>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Distribusi Kata per Tanggal</h3>
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

            <!-- Tabel Detail -->
            <div class="mt-8">
                <h4 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-4">Detail Kata per Tanggal</h4>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="py-3 px-4 text-left text-gray-700 dark:text-gray-300 font-semibold">Tanggal Dibuat</th>
                                <th class="py-3 px-4 text-center text-gray-700 dark:text-gray-300 font-semibold">Jumlah Kata</th>
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
                <i class="fas fa-info-circle"></i> Belum ada kelompok kata. <a href="?action=kelompokKata" class="font-semibold hover:underline">Buat kelompok kata sekarang</a>
            </p>
        </div>
        <?php endif; ?>
    </div>

</main>


<!-- SCRIPT -->
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

    // Chart.js untuk Statistik Kata
    <?php if (!empty($statisticKata)): ?>
    let statisticChart = null;

    function switchChartType(type) {
        // Update button styles
        document.getElementById('btnDoughnut').classList.toggle('bg-indigo-600', type === 'doughnut');
        document.getElementById('btnDoughnut').classList.toggle('hover:bg-indigo-700', type === 'doughnut');
        document.getElementById('btnDoughnut').classList.toggle('bg-gray-200', type === 'bar');
        document.getElementById('btnDoughnut').classList.toggle('dark:bg-gray-700', type === 'bar');
        document.getElementById('btnDoughnut').classList.toggle('text-gray-900', type === 'bar');
        document.getElementById('btnDoughnut').classList.toggle('dark:text-gray-100', type === 'bar');
        document.getElementById('btnDoughnut').classList.toggle('hover:bg-gray-300', type === 'bar');
        document.getElementById('btnDoughnut').classList.toggle('dark:hover:bg-gray-600', type === 'bar');

        document.getElementById('btnBar').classList.toggle('bg-indigo-600', type === 'bar');
        document.getElementById('btnBar').classList.toggle('hover:bg-indigo-700', type === 'bar');
        document.getElementById('btnBar').classList.toggle('text-white', type === 'bar');
        document.getElementById('btnBar').classList.toggle('bg-gray-200', type === 'doughnut');
        document.getElementById('btnBar').classList.toggle('dark:bg-gray-700', type === 'doughnut');
        document.getElementById('btnBar').classList.toggle('text-gray-900', type === 'doughnut');
        document.getElementById('btnBar').classList.toggle('dark:text-gray-100', type === 'doughnut');
        document.getElementById('btnBar').classList.toggle('hover:bg-gray-300', type === 'doughnut');
        document.getElementById('btnBar').classList.toggle('dark:hover:bg-gray-600', type === 'doughnut');

        // Destroy old chart
        if (statisticChart) {
            statisticChart.destroy();
        }

        // Create new chart
        createChart(type);
    }

    function createChart(chartType) {
        const ctx = document.getElementById('statisticChart').getContext('2d');
        
        const labels = [<?php echo "'" . implode("', '", array_map(function($s) { return htmlspecialchars($s['tanggal_dibuat']); }, $statisticKata)) . "'"; ?>];
        const data = [<?php echo implode(', ', array_map(function($s) { return $s['total_kata']; }, $statisticKata)); ?>];
        
        // Generate warna-warna yang berbeda
        const colors = [
            'rgba(99, 102, 241, 0.8)',     // Indigo
            'rgba(139, 92, 246, 0.8)',     // Purple
            'rgba(236, 72, 153, 0.8)',     // Pink
            'rgba(34, 197, 94, 0.8)',      // Green
            'rgba(59, 130, 246, 0.8)',     // Blue
            'rgba(245, 158, 11, 0.8)',     // Amber
            'rgba(6, 182, 212, 0.8)',      // Cyan
            'rgba(168, 85, 247, 0.8)',     // Violet
            'rgba(249, 115, 22, 0.8)',     // Orange
            'rgba(248, 113, 113, 0.8)'     // Red
        ];

        const borderColors = colors.map(c => c.replace('0.8', '1'));

        const chartConfig = {
            type: chartType,
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Kata',
                    data: data,
                    backgroundColor: colors,
                    borderColor: borderColors,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: chartType === 'bar' ? 'top' : 'bottom',
                        labels: {
                            padding: 20,
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            color: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: {
                            size: 13
                        },
                        bodyFont: {
                            size: 12
                        },
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((context.parsed.y || context.parsed) / total * 100).toFixed(1);
                                return (context.parsed.y || context.parsed) + ' kata (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        };

        // Tambah konfigurasi khusus untuk bar chart
        if (chartType === 'bar') {
            chartConfig.options.scales = {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        color: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280'
                    },
                    grid: {
                        color: document.documentElement.classList.contains('dark') ? '#374151' : '#e5e7eb'
                    }
                },
                x: {
                    ticks: {
                        color: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280'
                    },
                    grid: {
                        display: false
                    }
                }
            };
        }

        statisticChart = new Chart(ctx, chartConfig);
    }

    document.addEventListener('DOMContentLoaded', function() {
        createChart('doughnut');
    });
    <?php endif; ?>
</script>
<?php include "component/navbar-script.php"; ?>
</body>
</html>
