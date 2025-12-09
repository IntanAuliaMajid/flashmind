<?php 
$active = $_GET['action'] ?? 'homeAdmin';
?>

<div class="w-64 bg-white shadow-lg fixed md:relative h-screen">
    <div class="p-6 border-b">
        <h1 class="text-2xl font-bold text-blue-600">Admin Panel</h1>
    </div>

    <nav class="p-4 space-y-2">

        <a href="?action=homeAdmin"
           class="block px-4 py-2 rounded-lg 
           <?php echo ($active == 'homeAdmin') 
               ? 'bg-blue-500 text-white' 
               : 'hover:bg-blue-100'; ?>">
            🏠 Dashboard
        </a>

        <h3 class="text-xs font-semibold text-gray-500 uppercase pt-4 pb-2">Manajemen User</h3>
        <a href="?action=siswaAdmin"
           class="block px-4 py-2 rounded-lg
           <?php echo ($active == 'siswaAdmin') 
               ? 'bg-blue-500 text-white' 
               : 'hover:bg-blue-100'; ?>">
            🧑‍🎓 Data Siswa
        </a>

        <a href="?action=sekolahAdmin"
           class="block px-4 py-2 rounded-lg
           <?php echo ($active == 'sekolahAdmin') 
               ? 'bg-blue-500 text-white' 
               : 'hover:bg-blue-100'; ?>">
            🏫 Data Sekolah
        </a>

        <h3 class="text-xs font-semibold text-gray-500 uppercase pt-4 pb-2">Manajemen Quiz</h3>
        <a href="?action=quizAdmin"
           class="block px-4 py-2 rounded-lg
           <?php echo ($active == 'quizAdmin') 
               ? 'bg-blue-500 text-white' 
               : 'hover:bg-blue-100'; ?>">
            📋 Data Quiz
        </a>
        
        <a href="?action=pertanyaanAdmin"
           class="block px-4 py-2 rounded-lg
           <?php echo ($active == 'pertanyaanAdmin') 
               ? 'bg-blue-500 text-white' 
               : 'hover:bg-blue-100'; ?>">
            ❓ Data Pertanyaan
        </a>

        <a href="?action=hasilQuizAdmin"
           class="block px-4 py-2 rounded-lg
           <?php echo ($active == 'hasilQuizAdmin') 
               ? 'bg-blue-500 text-white' 
               : 'hover:bg-blue-100'; ?>">
            💯 Hasil Quiz
        </a>

    </nav>

    <div class="absolute bottom-0 left-0 right-0 p-4 border-t">
        <a href="?action=logout" 
           onclick="return confirm('Yakin ingin logout?')"
           class="block px-4 py-2 rounded-lg text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors">
            🚪 Logout
        </a>
    </div>
</div>