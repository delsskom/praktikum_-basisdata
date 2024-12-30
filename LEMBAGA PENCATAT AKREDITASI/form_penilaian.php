<?php
// Konfigurasi koneksi database
$host = 'localhost';
$username = 'root'; // Ganti dengan username MySQL Anda
$password = '';     // Ganti dengan password MySQL Anda
$database = 'lembaga_pencatat_akreditasi'; // Ganti dengan nama database Anda

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian Prodi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Form Penilaian Program Studi</h1>
        <form action="submit_penilaian.php" method="POST">
            <!-- Pilih Prodi -->
            <div class="mb-3">
                <label for="kode_dik" class="form-label">Program Studi</label>
                <select class="form-select" id="kode_dik" name="kode_dik" required>
                    <option value="">Pilih Program Studi</option>
                    <?php
                    // Ambil data Program Studi dari database
                    $result = $conn->query("SELECT kode_dik, nama_prodi FROM Prodi");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value=\"{$row['kode_dik']}\">{$row['nama_prodi']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Pilih Indikator -->
            <div class="mb-3">
                <label for="id_indikator" class="form-label">Indikator</label>
                <select class="form-select" id="id_indikator" name="id_indikator" required>
                    <option value="">Pilih Indikator</option>
                    <?php
                    // Ambil data Indikator dari database
                    $result = $conn->query("SELECT id_indikator, deskripsi FROM Indikator");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value=\"{$row['id_indikator']}\">{$row['deskripsi']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Input Nilai -->
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="number" step="0.01" class="form-control" id="nilai" name="nilai" placeholder="Masukkan Nilai" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Tutup koneksi database
$conn->close();
?>
