<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/jpg" href="asset/logo">
    <title>SMP Negeri 2 Cikatomas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="container">
            <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
            <h2>SMP Negeri 2 Cikatomas</h2>
        </div>

        <div class="sidebar" id="sidebar">
            <ul>
                <li>Dashboard</li>
                <li>Biodata</li>
                <li>Administrasi</li>
                <li>Absensi</li>
                <li>Notification</li>
                <li>Profil</li>
                <li>Logout</li>
            </ul>
        </div>

        <div class="main" id="main">
            <h2>Dashboard </h2>
            <div class="cards">
                <?php include 'data.php'; ?>
                <div class="card bg-green">
                    <div class="count">50</div>
                    <div class="label">Data Siswa</div>
                    <a href="datasiswa.php" class="detail-link">Lihat Detail →</a>
                </div>
                <div class="card bg-red">
                    <div class="count">54</div>
                    <div class="label">Data Guru</div>
                    <a href="dataguru.php" class="detail-link">Lihat Detail →</a>
                </div>
                <div class="card bg-yellow">
                    <div class="count">1</div>
                    <div class="label">Data Admin</div>
                    <a href="dataadmin.php" class="detail-link">Lihat Detail →</a>
                </div>
                <div class="card bg-purple">
                    <div class="count">3</div>
                    <div class="label">Data Kelas</div>
                    <a href="datakelas.php" class="detail-link">Lihat Detail →</a>
                </div>
                <div class="card bg-teal">
                    <div class="count">5</div>
                    <div class="label">Data Mata Pelajaran</div>
                    <a href="datamatpel.php" class="detail-link">Lihat Detail →</a>
                </div>
                <div class="card bg-orange">
                    <div class="count">2</div>
                    <div class="label">Data Pembelajaran</div>
                    <a href="datapembelajaran.php" class="detail-link">Lihat Detail →</a>
                </div>
                <div class="card bg-pink">
                    <div class="count">1</div>
                    <div class="label">Absensi</div>
                    <a href="absensi.php" class="detail-link">Lihat Detail →</a>
                </div>
                <div class="card bg-blue">
                    <div class="count">0</div>
                    <div class="label">Notifikasi</div>
                    <a href="notifikasi.php" class="detail-link">Lihat Detail →</a>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
