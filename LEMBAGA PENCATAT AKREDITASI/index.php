<?php
// Konfigurasi koneksi database
$host = 'localhost';
$username = 'root'; // Sesuaikan dengan username MySQL Anda
$password = '';     // Sesuaikan dengan password MySQL Anda
$database = 'lembaga_pencatat_akreditasi'; // Sesuaikan dengan nama database Anda

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
    <title>Lembaga Pencatat Akreditasi</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <header class="main-header">
        <div class="container text-center py-5">
            <h1 class="display-4 text-light">Lembaga Pencatat Akreditasi</h1>
            <p class="text-light">Sistem informasi untuk mengelola dan mencatat akreditasi program studi.</p>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">LPA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form_penilaian.php">Form Penilaian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data Akreditasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="mb-4">Selamat Datang di Sistem Informasi Akreditasi</h2>
                <p class="lead">Gunakan menu navigasi di atas untuk mengakses fitur sistem. Anda dapat mengisi form penilaian program studi, melihat data akreditasi, atau mendapatkan informasi tentang lembaga.</p>
                <a href="form_penilaian.php" class="btn btn-primary btn-lg">Mulai Penilaian</a>
            </div>
        </div>
    </main>

    <footer class="main-footer bg-dark text-light text-center py-4">
        <p class="mb-0">&copy; 2024 Lembaga Pencatat Akreditasi. All rights reserved.</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Tutup koneksi database
$conn->close();
?>
