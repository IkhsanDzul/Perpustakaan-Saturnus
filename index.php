<?php
include 'service/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $email;
        header("Location: dashboard.php");
    } else {
        $error = "Email atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Perpustakaan Satoernus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #34eb9b, #29a879);
            height: 100vh;
            margin: 0;
        }

        .main-ct{
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        nav{
            width: 100%;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-logo {
            width: 80px;
            margin-bottom: 1rem;
        }

        .login-title {
            font-weight: bold;
            color: #333;
        }

        .btn-custom {
            background-color: #29a879;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #34eb9b;
        }
    </style>
</head>

<body>
    <?php include "pages/navbar.html" ?>

    <div class="main-ct">
        <div class="login-container">
            <img src="assets/images/Icon.png" alt="Logo" class="login-logo">
            <h4 class="login-title">Perpustakaan Satoernus Admin</h4>
            <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
            <form method="POST">
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email admin" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
                </div>
                <button type="submit" class="btn btn-custom w-100">Login</button>
                <div class="mt-3"><a href="forgot_password.php" class="text-decoration-none">Lupa Password?</a></div>
            </form>
        </div>
    </div>
        
</body>

</html>