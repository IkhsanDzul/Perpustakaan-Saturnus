<?php
include 'service/db.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

// Ambil ID buku dari URL
$id_buku = $_GET['id_buku'];

// Ambil data buku berdasarkan ID
$query = "SELECT * FROM buku WHERE id_buku = $id_buku";
$result = $conn->query($query);
$book = $result->fetch_assoc();

// Proses update buku
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_buku = $_POST['nama_buku'];
    $kategori = $_POST['kategori'];

    // Update buku di database
    $updateQuery = "UPDATE buku SET nama_buku = '$nama_buku', kategori = '$kategori' WHERE id_buku = $id_buku";
    if ($conn->query($updateQuery)) {
        header("Location: daftar_buku.php"); // Redirect kembali ke daftar buku
    } else {
        $error = "Gagal mengupdate buku!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Edit Buku</h3>
        <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="nama_buku" class="form-label">Nama Buku</label>
                <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="<?php echo $book['nama_buku']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $book['kategori']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="daftar_buku.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
