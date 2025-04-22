<?php
session_start();
include 'data.php'; // file koneksi ke database

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ambil data user berdasarkan username
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Cek password apakah cocok
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            $_SESSION['role'] = $user['role']; // Simpan role ke session

            // Redirect sesuai role
            if ($user['role'] == 'admin') {
                header("Location: index.php");
            } elseif ($user['role'] == 'guru') {
                header("Location: dashboard_guru.php");
            } elseif ($user['role'] == 'wakasek') {
                header("Location: dashboard_wakasek.php");
            } else {
                $error = "Role tidak dikenali!";
            }
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="asset/logo">
    <title>Sistem Informasi Absensi Siswa SMP Negeri 2 Cikatomas</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="left-panel">
            <h1>SIAS</h1>
            <p>Sistem Informasi Absensi<br>Terintegrasi SMP Negeri 2 Cikatomas</p>
        </div>
        <div class="right-panel">
            <div class="login-box">
                <img src="logo.png" alt="Logo" class="logo">
                <h3>Sistem Informasi Absensi Terintegrasi<br>SMP Negeri 2 Cikatomas<br><strong>(SIAS)</strong></h3>
                <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
                <form method="POST">
                    <label>Username / Email</label>
                    <input type="text" name="username" placeholder="Username / Email" required>
                    
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                    
                    <button type="submit" name="login">Masuk</button>
                </form>
                <p class="copyright">
                    Copyright © 2025<br>
                    <a href="#">Cahyani Azhar - Universitas Perjuangan Tasikmalaya</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
