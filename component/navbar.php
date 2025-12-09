<?php 
    $active = $_GET['action'] ?? 'home';
?>

<?php include "component/navbar-style.php"; ?>
<nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700
            fixed top-0 left-0 w-full z-50 backdrop-blur">
            
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <img src="public/logo2.png" alt="" class="logo">
                <a href="?action=home" class="text-xl font-semibold text-gray-900 dark:text-gray-100 pl-4">
                    Flashmind
                </a>
            </div>

            <div class="flex items-center gap-5 text-gray-900 dark:text-gray-100 pl-4">
                <a 
                    href="?action=home" 
                    class="<?php echo ($active == 'home') 
                        ? 'border-b-2 border-blue-600 dark:border-indigo-400 font-semibold pb-1'
                        : 'hover:text-blue-600 dark:hover:text-indigo-400 transition-colors';?>">Home</a>
                <a href="?action=kelompokKata" class="<?php echo ($active == 'kelompokKata' || $active == 'kata') 
                        ? 'border-b-2 border-blue-600 dark:border-indigo-400 font-semibold pb-1'
                        : 'hover:text-blue-600 dark:hover:text-indigo-400 transition-colors';?>">Kelompok Kata</a>
                <a href="?action=quiz" class="<?php echo ($active == 'quiz') 
                        ? 'border-b-2 border-blue-600 dark:border-indigo-400 font-semibold pb-1'
                        : 'hover:text-blue-600 dark:hover:text-indigo-400 transition-colors';?>">Quiz</a>
            </div>

            <!-- Right Menu -->
            <div class="flex items-center space-x-4">
                
                <!-- Dark Mode -->
                <button onclick="toggleDarkMode()" 
                    class="p-2 rounded-md text-gray-500 hover:text-gray-700 
                           dark:text-gray-400 dark:hover:text-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 
                               9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- Foto Navbar -->
                <div class="relative">
                    <?php 
                    $avatar = $_SESSION['avatar'] ?? null;
                    $nama_user = $_SESSION['nama'] ?? 'Pengguna';

                    // Tentukan URL sumber gambar
                    $image_source = (!empty($avatar) && file_exists('uploads/' . $avatar))
                        ? 'uploads/' . $avatar
                        : 'https://ui-avatars.com/api/?name=' . urlencode($nama_user) . '&background=4F46E5&color=fff&size=40'; 
                    ?>

                    <button onclick="toggleProfileMenu()"
                        class="flex items-center space-x-2 p-2 rounded-full 
                                hover:bg-gray-100 dark:hover:bg-gray-700 transition">

                        <img 
                            src="<?= $image_source ?>" 
                            class="nav-profile-image shadow"
                        >
                    </button>

                    <!-- Dropdown -->
                    <div id="profileMenu"
                        class="absolute right-0 mt-2 w-40 bg-white dark:bg-gray-800 
                               rounded-lg shadow-lg border border-gray-200 
                               dark:border-gray-700 hidden">

                        <a href="?action=profil"
                           class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 
                                  hover:bg-gray-100 dark:hover:bg-gray-700">
                            Profil Saya
                        </a>

                        <a href="?action=logout"
                           class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 
                                  dark:hover:bg-red-900/20">
                            Logout
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</nav>
<?php include "component/navbar-script.php"; ?>