<?php
// submit_penilaian.php

// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = ''; // Ganti jika Anda menggunakan password untuk MySQL
$database = 'lembaga_pencatat_akreditasi'; // Ganti dengan nama database Anda

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses data yang dikirim melalui form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_dik = $_POST['kode_dik'];
    $id_indikator = $_POST['id_indikator'];
    $nilai = $_POST['nilai'];

    // Validasi input
    if (empty($kode_dik) || empty($id_indikator) || empty($nilai)) {
        echo "<p>Semua field wajib diisi!</p>";
        exit;
    }

    // Simpan data ke tabel Prodi_Menilai_Indikator
    $stmt = $conn->prepare("INSERT INTO Prodi_Menilai_Indikator (kode_dik, id_indikator, nilai) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $kode_dik, $id_indikator, $nilai);

    if ($stmt->execute()) {
        echo "<p>Penilaian berhasil disimpan.</p>";
    } else {
        echo "<p>Gagal menyimpan penilaian: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>
