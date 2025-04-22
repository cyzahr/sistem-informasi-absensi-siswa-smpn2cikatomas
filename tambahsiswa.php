<?php include 'data.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="icon" type="image/jpg" href="asset/logo">
        <title>SMP Negeri 2 Cikatomas</title>
        <link rel="stylesheet" href="tambahsiswa.css">
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
            <div class="main-content">
                <div class="header">
                    <h2>Tambah Siswa</h2>
                    <p>Tambah Data Siswa</p>
                </div>
                <form action="prosestambahsiswa.php" method="post" class="form-grid">
                    <div>
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div>
                        <label>Kelas</label>
                        <select name="kelas" required>
                            <option value="">--Pilih Kelas--</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                    <div>
                        <label>NIS</label>
                        <input type="text" name="nis" placeholder="Masukkan NIS" required>
                    </div>
                    <div>
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" required>
                            <option value="">--Jenis Kelamin--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label>Nomor Telepon</label>
                        <input type="text" name="telepon" placeholder="Masukkan No Telepon" required>
                    </div>
                    <div class="full">
                        <button type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </section>
        <script src="script.js"></script>
</body>
</html>