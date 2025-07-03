CREATE DATABASE IF NOT EXISTS db_catering;
USE db_catering;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('user','admin') DEFAULT 'user'
);

CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50),
    deskripsi TEXT,
    gambar VARCHAR(255)
);

CREATE TABLE menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kategori_id INT,
    nama VARCHAR(100),
    deskripsi TEXT,
    harga INT,
    gambar VARCHAR(255),
    FOREIGN KEY (kategori_id) REFERENCES kategori(id)
);

CREATE TABLE pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    nama VARCHAR(100),
    no_hp VARCHAR(20),
    alamat TEXT,
    catatan TEXT,
    total INT,
    tanggal DATETIME,
    status ENUM('Menunggu','Diproses','Dikirim','Selesai') DEFAULT 'Menunggu',
    bukti_bayar VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE pesanan_item (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pesanan_id INT,
    menu_id INT,
    qty INT,
    harga INT,
    FOREIGN KEY (pesanan_id) REFERENCES pesanan(id),
    FOREIGN KEY (menu_id) REFERENCES menu(id)
);

INSERT INTO users (nama, email, password, role) VALUES
('Admin Catering', 'admin@catering.com', '$2y$10$hRfiwGdV1p5OwwKaZkD2eOZcHk2KnGg6FvXn9Tn1QkQGf/Uw0k5aG', 'admin'), -- password: admin123
('Candra Ayu', 'user@catering.com', '$2y$10$Gh5RjK5j1FZDXW0JXh/0vOt6M5waXkGg8Z5k5Ii1D1e8h1ZzZzN2a', 'user'); -- password: user123

INSERT INTO kategori (nama, deskripsi, gambar) VALUES
('Nasi Kotak', 'Aneka pilihan nasi kotak lengkap.', 'nasi_kotak_a.jpg'),
('Kue Kotak', 'Paket kue kotak lezat.', 'kue_kotak_a.jpg'),
('Tumpeng', 'Pilihan tumpeng mini & besar.', 'tumpeng_a.jpg'),
('Minuman', 'Minuman segar berbagai pilihan.', 'minuman_a.jpg');

INSERT INTO menu (kategori_id, nama, deskripsi, harga, gambar) VALUES
(1, 'Nasi Kotak A', 'Nasi, ayam goreng, sambal, lalap.', 25000, 'nasi_kotak_a.jpg'),
(1, 'Nasi Kotak B', 'Nasi, rendang, telur balado, sayur.', 30000, 'nasi_kotak_a.jpg'),
(2, 'Kue Kotak A', 'Kue lapis, risol, pastel, air mineral.', 15000, 'kue_kotak_a.jpg'),
(3, 'Tumpeng Mini', 'Tumpeng mini untuk 2-3 orang.', 40000, 'tumpeng_a.jpg'),
(4, 'Es Teh Manis', 'Minuman segar teh manis dingin.', 5000, 'minuman_a.jpg');