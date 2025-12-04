<?php 
    $active = $_GET['action'] ?? 'homeAdmin';
?>

<div class="w-64 bg-white shadow-lg fixed md:relative h-screen">
    <div class="p-6 border-b">
        <h1 class="text-2xl font-bold text-blue-600">Admin Panel</h1>
    </div>

    <nav class="p-4 space-y-2">

        <!-- Dashboard -->
        <a href="?action=homeAdmin"
           class="block px-4 py-2 rounded-lg 
           <?php echo ($active == 'homeAdmin') 
               ? 'bg-blue-500 text-white' 
               : 'hover:bg-blue-100'; ?>">
            Dashboard
        </a>

        <!-- Siswa -->
        <a href="?action=siswaAdmin"
           class="block px-4 py-2 rounded-lg
           <?php echo ($active == 'siswaAdmin') 
               ? 'bg-blue-500 text-white' 
               : 'hover:bg-blue-100'; ?>">
            Data Siswa
        </a>

        <!-- Sekolah -->
        <a href="?action=sekolahAdmin"
           class="block px-4 py-2 rounded-lg
           <?php echo ($active == 'sekolahAdmin') 
               ? 'bg-blue-500 text-white' 
               : 'hover:bg-blue-100'; ?>">
            Data Sekolah
        </a>

        <!-- Pengaturan -->
        <a href="?action=pengaturan"
           class="block px-4 py-2 rounded-lg
           <?php echo ($active == 'pengaturan') 
               ? 'bg-blue-500 text-white' 
               : 'hover:bg-blue-100'; ?>">
            Pengaturan
        </a>

    </nav>

    <!-- Logout Section -->
    <div class="absolute bottom-0 left-0 right-0 p-4 border-t">
        <a href="?action=logout" 
           onclick="return confirm('Yakin ingin logout?')"
           class="block px-4 py-2 rounded-lg text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors">
            🚪 Logout
        </a>
    </div>
</div>
