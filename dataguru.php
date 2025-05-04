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
                <li>Admin</li>
                <li>Administrasi</li>
                <li>Guru</li>
                <li>Siswa</li>
                <li>Wali Kelas</li>
                <li>Pelajaran</li>
                <li>Absen Siswa</li>
                <li>Laporan Absen Siswa</li>
            </ul>
        </div>

        <div class="main-content" id="mainContent">
            <h1>Data Guru</h1>
            <a href="tambahguru.php" class="btn tambah">+ Tambah</a>
            <input type="text" id="search" placeholder="Search..." onkeyup="searchTable()">
            <table id="guruTable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = mysqli_query($conn, "SELECT * FROM guru");
                    while ($row = mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                        <td><? = $no++ ?></td>
                        <td> </td>
                    </tr>
                    }
                </tbody>
            </table>

        </div>
</section>
<script src="script.js"></script>
</body>
</html>