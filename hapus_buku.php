<?php
include 'service/db.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

// Ambil ID buku dari URL
$id = $_GET['id_buku'];

// Hapus data buku dari database
$query = "DELETE FROM buku WHERE id = $id";
if ($conn->query($query)) {
    header("Location: daftar_buku.php"); // Redirect ke halaman daftar buku setelah berhasil hapus
} else {
    echo "Gagal menghapus buku!";
}
?>  
