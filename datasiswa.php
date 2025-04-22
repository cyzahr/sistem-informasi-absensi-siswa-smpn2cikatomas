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
                <li>Biodata</li>
                <li>Administrasi</li>
                <li>Absensi</li>
                <li>Notification</li>
                <li>Profil</li>
                <li>Logout</li>
            </ul>
        </div>

        <div class="main-content" id="mainContent">
            <h1>Data Siswa</h1>
            <a href="tambahsiswa.php" class="btn tambah">+ Tambah</a>
            <a href="export.php" class="btn hijau">Export To Excel</a>
            <form action="import.php" method="post" enctype="multipart/form-data" style="display:inline;">
                <input type="file" name="file">
                <button class="btn biru" type="submit">Import</button>
            </form>
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
                        <th>STATUS</th>
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
