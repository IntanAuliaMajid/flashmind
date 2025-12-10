<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center p-4 relative"
      style="background-image: url('public/login.jpg');">

    <!-- FULLSCREEN BLUR -->
    <div class="absolute inset-0 backdrop-blur-md bg-black/20 z-10"></div>

    <!-- CARD -->
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg relative z-20">

        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Create Account</h2>

        <?php if (isset($error)) : ?>
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <p class="font-semibold">⚠ Error:</p>
                <p><?php echo $error; ?></p>
            </div>
        <?php endif; ?>

        <form action="?action=register&method=store" method="POST">
            
            <div class="mb-4">
                <input 
                    type="text" 
                    name="username" 
                    placeholder="Enter Username"
                    value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                >
                <small class="text-gray-500">3+ characters, letters, numbers, underscore</small>
            </div>

            <div class="mb-4">
                <input 
                    type="text" 
                    name="nama" 
                    placeholder="Enter Full Name" 
                    value="<?php echo isset($nama) ? htmlspecialchars($nama) : ''; ?>"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                >
                <small class="text-gray-500">Minimum 3 characters</small>
            </div>

            <div class="mb-4">
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Enter Password"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-6">
                <input 
                    type="password" 
                    name="password2" 
                    placeholder="Confirm Password"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-6">
                <select 
                    name="sekolah_id" 
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">-- Select School --</option>
                    <?php foreach ($sekolah as $row) : ?>
                        <option 
                            value="<?= $row['id_sekolah'] ?>"
                            <?= (isset($sekolah_id) && $sekolah_id == $row['id_sekolah']) ? 'selected' : '' ?>
                        >
                            <?= $row['nama_sekolah'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold text-lg hover:bg-blue-600 transition shadow-md"
            >
                Register
            </button>
        </form>

        <div class="text-center mt-6 text-gray-600">
            <p class="text-sm">
                Already have an account?
                <a href="?action=login" class="text-blue-600 hover:text-blue-700 font-medium hover:underline">
                    Login here
                </a>
            </p>
        </div>

    </div>
</body>
</html>