<?php
include 'service/db.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $no_telp = $_POST['no_telp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $query = "INSERT INTO anggota (nama_anggota, kelas, no_telp, jenis_kelamin) VALUES ('$nama', '$kelas', '$no_telp', '$jenis_kelamin')";
    if ($conn->query($query) === TRUE) {
        echo "<p class='text-success'>Pendaftaran berhasil!</p>";
    } else {
        echo "<p class='text-danger'>Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Anggota - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Form Pendaftaran Anggota</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" required>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telp</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                    <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
</body>
</html>
