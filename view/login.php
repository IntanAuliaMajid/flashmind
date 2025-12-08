<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Terapkan font Quicksand ke seluruh body */
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center p-4"
      style="background-image: url('public/login.jpg');">
    <div class="absolute inset-0 backdrop-blur-sm bg-black/20"></div>

    <div class="w-full max-w-sm bg-white p-8 rounded-xl shadow-lg transform transition-all hover:shadow-xl">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Masuk</h2>

        <form action="?action=login&method=login" method="POST">
            <div class="mb-4">
                <input 
                    type="text" 
                    name="username" 
                    placeholder="Masukkan Username" 
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 placeholder-gray-500 text-gray-700"
                >
            </div>
            
            <div class="mb-6">
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Masukkan Password" 
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 placeholder-gray-500 text-gray-700"
                >
            </div>
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold text-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-md hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50"
            >
                Masuk
            </button>
        </form>

        <div class="text-center mt-6 text-gray-600">
            <p class="text-sm">Belum punya akun? 
                <a href="?action=register" class="text-blue-600 hover:text-blue-700 font-medium transition duration-200 hover:underline">
                    Daftar Disini
                </a>
            </p>
        </div>
    </div>

</body>
</html>     