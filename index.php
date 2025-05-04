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
                <li><Dashboard href="index.php">Dashboard</a></li>
                <li>Admin</li>
                <li><a href="dataguru.php">Guru</a></li>
                <li><Siswa href="datasiswa.php">Siswa</a></li>
                <li><Kelas href="datakelas.php">Kelas</a></li>
                <li><a href="datawalikelas.php">Wali Kelas</a></li>
                <li><Pelajaran href="datamatpel.php">Pelajaran</a></li>
                <li><Absen href="absensi.php">Absen Siswa</a></li>
                <li><Laporan href="laporanabsensi.php">Laporan Absen Siswa</a></li>
            </ul>
        </div>

        <div class="main" id="main">
            <h2>Dashboard</h2>
            <div class="cards">
                <?php include 'data.php'; ?>
                <div class="card bg-green">
                    <div class="count">50</div>
                    <div class="label">Total Siswa</div>
                    <a href="datasiswa.php" class="detail-link">Lihat Detail →</a>
                </div>
                <div class="card bg-red">
                    <div class="count">54</div>
                    <div class="label">Total Guru</div>
                    <a href="dataguru.php" class="detail-link">Lihat Detail →</a>
                </div>
                <div class="card bg-yellow">
                    <div class="count">1</div>
                    <div class="label">Total Wali Kelas</div>
                    <a href="dataadmin.php" class="detail-link">Lihat Detail →</a>
                </div>
                <div class="card bg-purple">
                    <div class="count">3</div>
                    <div class="label">Total Kelas</div>
                    <a href="datakelas.php" class="detail-link">Lihat Detail →</a>
                </div>
                <div class="card bg-teal">
                    <div class="count">5</div>
                    <div class="label">Total Mata Pelajaran</div>
                    <a href="datamatpel.php" class="detail-link">Lihat Detail →</a>                
                </div>
            </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
