<?php
include 'config.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_scholarly";

// Membuat koneksi
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matkul = $_POST['matkul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $file_path = "";

    if ($_FILES['file']['name']) {
        $target_dir = "uploads/";
        $file_path = $target_dir . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
            $sql = "INSERT INTO catatan (matkul, deskripsi, tanggal, file_path) VALUES ('$matkul', '$deskripsi', '$tanggal', '$file_path')";
            if ($mysqli->query($sql)) {
                echo "<script>alert('Catatan berhasil ditambahkan'); window.location.href='catatan.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan catatan');</script>";
            }
        } else {
            echo "<script>alert('Gagal mengunggah file');</script>";
        }
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Tambah Catatan</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Catatan</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="matkul" class="form-label">Mata Kuliah</label>
                <input type="text" class="form-control" id="matkul" name="matkul" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
