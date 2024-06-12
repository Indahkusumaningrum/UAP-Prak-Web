<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_scholarly";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mata_kuliah = $_POST["mata_kuliah"];
        $dosen = $_POST["dosen"];
        $hari = $_POST["hari"];
        $jam_mulai = $_POST["jam_mulai"];
        $jam_selesai = $_POST["jam_selesai"];
        $ruang = $_POST["ruang"];

        $sql = "UPDATE jadwal_kuliah SET mata_kuliah=?, dosen=?, hari=?, jam_mulai=?, jam_selesai=?, ruang=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $mata_kuliah, $dosen, $hari, $jam_mulai, $jam_selesai, $ruang, $id);

        if ($stmt->execute()) {
            header("Location: jadwal-kuliah.php");
            exit();
        } else {
            echo "<p class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        $stmt->close();
    } else {
        $sql = "SELECT mata_kuliah, dosen, hari, jam_mulai, jam_selesai, ruang FROM jadwal_kuliah WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $jadwal = $result->fetch_assoc();

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal Kuliah</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Edit Jadwal Kuliah
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
                                <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah" value="<?php echo $jadwal['mata_kuliah']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="dosen" class="form-label">Dosen</label>
                                <input type="text" class="form-control" id="dosen" name="dosen" value="<?php echo $jadwal['dosen']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="hari" class="form-label">Hari</label>
                                <input type="text" class="form-control" id="hari" name="hari" value="<?php echo $jadwal['hari']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="<?php echo $jadwal['jam_mulai']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="<?php echo $jadwal['jam_selesai']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="ruang" class="form-label">Ruang</label>
                                <input type="text" class="form-control" id="ruang" name="ruang" value="<?php echo $jadwal['ruang']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Jadwal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
