<style>
    /* Footer Styles */
    .footer-logo {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .footer-link {
        @apply text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 flex items-center text-sm;
    }

    .social-link {
        @apply w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 transition-all duration-200 transform hover:scale-110;
    }

    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }




    /* Footer responsive adjustments */
    @media (max-width: 768px) {
        .back-to-top {
            bottom: 20px;
            right: 20px;
            width: 45px;
            height: 45px;
        }
        

    }
</style>