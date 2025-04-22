<?php
include 'data.php';

$success = '';
$error = '';

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $nama = trim($_POST['nama']);
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $cek = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $cek->bind_param("s", $username);
    $cek->execute();
    $cek->store_result();

    if ($cek->num_rows > 0) {
        $error = "Username sudah digunakan!";
    } else {
        // Simpan user baru
        $stmt = $conn->prepare("INSERT INTO users (username, password, nama_lengkap, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $hashed_password, $nama, $role);

        if ($stmt->execute()) {
            $success = "Registrasi berhasil! Silakan login.";
        } else {
            $error = "Registrasi gagal: " . $stmt->error;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Daftar - SIAS</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="register-container">
        <h2>Form Pendaftaran</h2>
        <?php if ($success): ?>
            <p class="success"><?= $success ?></p>
        <?php elseif ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" required>

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Role</label>
            <select name="role" required>
                <option value="admin">Admin</option>
                <option value="wakasek">wakasek</option>
                <option value="guru">Guru</option>
            </select>

            <button type="submit" name="register">Daftar</button>
        </form>

        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>
