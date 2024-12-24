<?php
include 'service/db.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM buku";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        .book-card {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .book-category {
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Daftar Buku</h3>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <input type="text" class="form-control w-50" placeholder="Cari buku...">
            <button class="btn btn-outline-primary ms-2" onclick="toggleView()">Toggle View</button>
        </div>
        
        <!-- List/Grid Container -->
        <div id="book-container" class="book-grid">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="book-card">
                    <h5><?php echo $row['nama_buku']; ?></h5>
                    <p class="book-category"><?php echo $row['kategori']; ?></p>
                    <div class="d-flex justify-content-between">
                        <a href="edit_buku.php" class="btn btn-sm btn-primary">Edit</a>
                        <a href="hapus_buku.php" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script>
        // Toggle between grid and list view
        function toggleView() {
            const container = document.getElementById('book-container');
            if (container.classList.contains('book-grid')) {
                container.classList.remove('book-grid');
                container.classList.add('list-group');
            } else {
                container.classList.remove('list-group');
                container.classList.add('book-grid');
            }
        }
    </script>
</body>
</html>
