<nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700
            fixed top-0 left-0 w-full z-50 backdrop-blur">
            
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <img src="public/logo2.png" alt="" class="logo">
                <a href="?action=dashboard" class="text-xl font-semibold text-gray-900 dark:text-gray-100 pl-4">
                    Flashmind
                </a>
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
                    <button onclick="toggleProfileMenu()"
                        class="flex items-center space-x-2 p-2 rounded-full 
                               hover:bg-gray-100 dark:hover:bg-gray-700 transition">

                        <img 
                            src="<?= isset($_SESSION['avatar']) ? 'uploads/' . $_SESSION['avatar'] : 
                                'https://ui-avatars.com/api/?name='.$_SESSION['nama'].'&background=4F46E5&color=fff'; ?>" 
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
