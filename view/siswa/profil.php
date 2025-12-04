<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Flashcard App</title>
    <script src="https://cdn.tailwindcss.com"></script>

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

<?php include "component/navbar-style.php"; ?>
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

                    <img id="profileImagePreview" 
                        src="<?= isset($_SESSION['avatar']) ? 'uploads/' . $_SESSION['avatar'] : 
                            'https://ui-avatars.com/api/?name='.$_SESSION['nama'].'&background=4F46E5&color=fff'; ?>" 
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

                <button type="submit"
                    class="w-full bg-indigo-600 dark:bg-indigo-500 text-white py-3 rounded-lg 
                           hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
                    Simpan Perubahan
                </button>
            </div>

        </form>
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
</script>
<?php include "component/navbar-script.php"; ?>
</body>
</html>
