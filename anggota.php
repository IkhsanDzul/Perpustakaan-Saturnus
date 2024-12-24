<?php
include 'service/db.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM anggota";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Daftar Anggota</h3>
        <input type="text" class="form-control mb-3" placeholder="Search...">
        <ul class="list-group">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $row['nama_anggota']; ?>
                    <span><?php echo $row['kelas']; ?></span>
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
