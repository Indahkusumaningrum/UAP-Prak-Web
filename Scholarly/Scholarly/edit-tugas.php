<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM tugas WHERE id='$id'");
    $tugas = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_tugas = $_POST['nama_tugas'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_pengumpulan = $_POST['tanggal_pengumpulan'];

    $stmt = $mysqli->prepare("UPDATE tugas SET nama_tugas=?, deskripsi=?, tanggal_pengumpulan=? WHERE id=?");
    $stmt->bind_param("sssi", $nama_tugas, $deskripsi, $tanggal_pengumpulan, $id);

    if ($stmt->execute()) {
        header("Location: tugas.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Tugas</h2>
        <form action="edit-tugas.php" method="post">
            <input type="hidden" name="id" value="<?php echo $tugas['id']; ?>">
            <div class="mb-3">
                <label for="nama_tugas" class="form-label">Nama Tugas</label>
                <input type="text" class="form-control" id="nama_tugas" name="nama_tugas" value="<?php echo $tugas['nama_tugas']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo $tugas['deskripsi']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="tanggal_pengumpulan" class="form-label">Tanggal Pengumpulan</label>
                <input type="date" class="form-control" id="tanggal_pengumpulan" name="tanggal_pengumpulan" value="<?php echo $tugas['tanggal_pengumpulan']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
