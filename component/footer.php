<?php include "component/footer-style.php"; ?>

<footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            <!-- Logo & Description -->
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center mb-4">
                    <img src="public/logo2.png" alt="Logo" class="footer-logo">
                    <span class="text-xl font-semibold text-gray-900 dark:text-gray-100 ml-3">
                        Flashmind
                    </span>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mb-4 max-w-md">
                    Platform pembelajaran interaktif yang membantu Anda menguasai materi dengan mudah melalui flashcard dan quiz yang menarik.
                </p>
                <div class="flex space-x-4 dark:text-white">
                    <a href="#" class="social-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider mb-4">
                    Menu Utama
                </h3>
                <ul class="space-y-3 dark:text-white">
                    <li>
                        <a href="?action=home" class="footer-link">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="?action=kelompokKata" class="footer-link">
                            <i class="fas fa-layer-group mr-2"></i>
                            Kelompok Kata
                        </a>
                    </li>
                    <li>
                        <a href="?action=kelompokKata" class="footer-link">
                            <i class="fas fa-clone mr-2"></i>
                            Flashcard
                        </a>
                    </li>
                    <li>
                        <a href="?action=quiz" class="footer-link">
                            <i class="fas fa-question-circle mr-2"></i>
                            Quiz
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Account Links -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider mb-4">
                    Akun
                </h3>
                <ul class="space-y-3 dark:text-white">
                    <li>
                        <a href="?action=profil" class="footer-link">
                            <i class="fas fa-user mr-2"></i>
                            Profil Saya
                        </a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">
                            <i class="fas fa-cog mr-2"></i>
                            Pengaturan
                        </a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">
                            <i class="fas fa-question mr-2"></i>
                            Bantuan
                        </a>
                    </li>
                    <li>
                        <a href="?action=logout" class="footer-link text-red-600 dark:text-red-400">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-200 dark:border-gray-700 mt-8 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-4 mb-4 md:mb-0">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        &copy; <?= date('Y') ?> Flashmind. All rights reserved.
                    </p>
                </div>
                
                <div class="flex items-center space-x-6 text-sm">
                    <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        Kebijakan Privasi
                    </a>
                    <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        Syarat & Ketentuan
                    </a>
                    <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        Kontak
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTop" class="back-to-top" onclick="scrollToTop()">
        <i class="fas fa-chevron-up"></i>
    </button>
</footer>