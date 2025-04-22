<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $kelas = $_POST['kelas'];
    $password = $_POST['password'];
    $nis = $_POST['nis'];
    $gender = $_POST['jenis_kelamin'];
    $telepon = $_POST['telepon'];

    // Simpan ke database (contoh menggunakan mysqli)
    $conn = new mysqli("localhost", "root", "", "sekolah");
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $hashed_pass = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO siswa (nama, username, kelas, password, nis, gender, telepon) 
            VALUES ('$nama', '$username', '$kelas', '$hashed_pass', '$nis', '$gender', '$telepon')";

    if ($conn->query($sql) === TRUE) {
        echo "Data siswa berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
