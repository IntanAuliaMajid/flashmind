<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            width: 330px;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            width: 90%;
            padding: 12px;
            margin-bottom: 12px;
            border: 1px solid #aaa;
            border-radius: 4px;
        }
        button {
            width: 98%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #0056b3;
        }
        .footer-link {
            text-align: center;
            margin-top: 10px;
        }
        .footer-link a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>Login</h2>

        <form action="?action=login&method=login" method="POST">
            <input type="text" name="username" placeholder="Masukkan Username" required>
            <input type="password" name="password" placeholder="Masukkan Password" required>

            <button type="submit">Masuk</button>
        </form>

        <div class="footer-link">
            <p>Belum punya akun? <a href="?action=register">Daftar Disini</a></p>
        </div>
    </div>

</body>
</html>
