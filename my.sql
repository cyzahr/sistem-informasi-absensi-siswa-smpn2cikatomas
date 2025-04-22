-- SQL untuk database SMK Dashboard
CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(50) NOT NULL,
    nis VARCHAR(30),
    jenis_kelamin ENUM('Laki-Laki', 'Perempuan') NOT NULL,
    phone VARCHAR(20),
    status ENUM('Active', 'Non-Active') DEFAULT 'Active'
);

CREATE TABLE guru (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nip VARCHAR(20) NOT NULL UNIQUE,
    mapel_id INT
);

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100)
);


CREATE TABLE kelas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kelas VARCHAR(50) NOT NULL
);

CREATE TABLE mata_pelajaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_mapel VARCHAR(100) NOT NULL
);

CREATE TABLE pembelajaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    guru_id INT,
    mapel_id INT,
    kelas_id INT,
    FOREIGN KEY (guru_id) REFERENCES guru(id),
    FOREIGN KEY (mapel_id) REFERENCES mata_pelajaran(id),
    FOREIGN KEY (kelas_id) REFERENCES kelas(id)
);

CREATE TABLE absensi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    siswa_id INT,
    tanggal DATE,
    status ENUM('Hadir', 'Izin', 'Sakit', 'Alpha') DEFAULT 'Hadir',
    FOREIGN KEY (siswa_id) REFERENCES siswa(id)
);

CREATE TABLE notifikasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100),
    isi TEXT,
    status ENUM('belum_dibaca', 'dibaca') DEFAULT 'belum_dibaca',
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Data Dummy
INSERT INTO kelas (nama_kelas) VALUES ('X RPL'), ('XI TKJ'), ('XII MM');
INSERT INTO mata_pelajaran (nama_mapel) VALUES ('Matematika'), ('Bahasa Inggris'), ('Pemrograman Web');
INSERT INTO guru (nama, nip, mapel_id) VALUES 
('Budi Santoso', '12345678', 1),
('Ani Wijaya', '23456789', 2),
('Dedi Kurniawan', '34567890', 3);
INSERT INTO admin (username, password, nama) VALUES ('admin', 'admin123', 'Admin Satu');
INSERT INTO siswa (nama, nis, kelas_id) VALUES 
('Rina Aulia', '2023001', 1),
('Fajar Pratama', '2023002', 2);
INSERT INTO pembelajaran (guru_id, mapel_id, kelas_id) VALUES (1, 1, 1), (2, 2, 2);
INSERT INTO absensi (siswa_id, tanggal, status) VALUES (1, '2025-04-12', 'Hadir');
INSERT INTO notifikasi (judul, isi) VALUES ('Penting', 'Pengumuman ujian minggu depan.');
