<?php include 'data.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/jpg" href="asset/logo">
    <title>SMP Negeri 2 Cikatomas</title>
    <link rel="stylesheet" href="stylesiswa.css">
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
                <li>Wali kelas</li>
                <li>Pelajaran</li>
                <li>Absen Siswa</li>
                <li>Laporan Absen Siswa</li>
            </ul>
        </div>

        <div class="main-content" id="mainContent">
            <h1>Data Siswa</h1>
            <a href="tambahsiswa.php" class="btn tambah">+ Tambah</a>
            <input type="text" id="search" placeholder="Search..." onkeyup="searchTable()">
            <table id="siswaTable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>KELAS</th>
                        <th>NIS</th>
                        <th>JENIS KELAMIN</th>
                        <th>PHONE</th>
                        <th>WALI KELAS</th>
                        <th>WALI SISWA</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = mysqli_query($conn, "SELECT * FROM siswa");
                    while ($row = mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['kelas'] ?></td>
                        <td><?= $row['nis'] ?></td>
                        <td><?= $row['jenis_kelamin'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['wali_kelas'] ?></td>
                        <td><?= $row['wali_siswa'] ?></td>
                        <td><span class="status <?= strtolower($row['status']) ?>"><?= $row['status'] ?></span></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>">✏️</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">🗑️</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

    <script src="scriptsiswa.js"></script>
</body>
</html>
