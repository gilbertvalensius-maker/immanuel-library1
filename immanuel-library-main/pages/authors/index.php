<?php
require_once __DIR__ . '/../../repositories/author-repository.php';
$daftarPenulis = AuthorRepository::getAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Penulis</title>
    <link rel="stylesheet" href="../../styles/authors/index.css">
</head>
<body>
    <main class="container-penulis">
        <h1>Daftar Penulis Buku</h1>
        <a href="create.php" class="btn-tambah">+ Tambah Penulis</a>

        <table class="tabel-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Penulis</th>
                    <th>Bio Singkat</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            if (empty($daftarPenulis)) {
                echo '<tr><td colspan="3">Data masih kosong.</td></tr>';
            } else {
                foreach ($daftarPenulis as $penulis) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($penulis['id']) . '</td>';
                    echo '<td>' . htmlspecialchars($penulis['name']) . '</td>';
                    echo '<td>' . htmlspecialchars($penulis['bio']) . '</td>';
                    echo '</tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </main>
</body>
</html>
