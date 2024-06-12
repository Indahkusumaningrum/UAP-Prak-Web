<!-- <?php
include 'config.php';
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Mata Kuliah</title>
  <link rel="icon" href="Scholarly.png" type="image/png"/>
  <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css" />
  <style>
    body {
      background-color: #e7eef5;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
    }
    .container {
      margin-top: 30px;
      flex: 1;
      background-color: #2c3e50;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #fff;
      font-weight: bold;
    }

    form {
      padding: 30px;
    }

    .form-group label {
      color: #e7eef5;
    }
    .btn-primary, .btn-secondary {
      border-radius: 8px;
    }
    .btn-primary {
      background-color: #28a745;
      border-color: #28a745;
      color: white;
    }
    .btn-primary:hover {
      background-color: #fff;
      border-color: #28a745;
      color: #2c3e50;
    }
    .btn-secondary {
      background-color: #6c757d;
      border-color: #6c757d;
      color: white;
    }
    input, select {
      border-radius: 8px;
      border-color: #a79277;
      background-color: #e7eef5;
      color: #2c3e50;
      padding: 8px;
      width: 100%;
      margin-bottom: 10px;
    }
    footer {
      background-color: #2c3e50;
      color: white;
      text-align: center;
      padding: 10px 0;
      margin-top: 30px;
    }
    .btn-group {
      margin-top: 20px;
      display: flex;
      justify-content: center;
      gap: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Tambah Mata Kuliah</h1>
    <form method="post" action="create-mataKuliah.php">
      <div class="form-group">
        <label for="nama_matkul">Nama Mata Kuliah:</label>
        <input type="text" id="nama_matkul" name="nama_matkul" required />
      </div>

      <div class="form-group">
        <label for="sks">SKS:</label>
        <input type="number" id="sks" name="sks" required />
      </div>

      <div class="form-group">
        <label for="dosen-pengampu">Dosen Pengampu:</label>
        <input type="text" id="dosen_pengampu" name="dosen_pengampu" required />
      </div>

      <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <select id="deskripsi" name="deskripsi" required>
          <option value="">Pilih Deskripsi</option>
          <option value="Wajib">Wajib</option>
          <option value="Peminatan">Peminatan</option>
        </select>
      </div>

      <div class="btn-group">
        <button type="submit" class="btn btn-primary" name="save">Simpan</button>
        <a class="btn btn-secondary" href="mata-kuliah.php">Kembali ke Daftar Mata Kuliah</a>
      </div>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $nama_matkul = $_POST['nama_matkul'];
      $sks = $_POST['sks'];
      $dosen_pengampu = $_POST['dosen_pengampu'];
      $deskripsi = $_POST['deskripsi'];

      $stmt = $mysqli->prepare("INSERT INTO mata_kuliah (nama_matkul, sks, dosen_pengampu, deskripsi) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("siss", $nama_matkul, $sks, $dosen_pengampu, $deskripsi);

      if ($stmt->execute()) {
        echo "Mata Kuliah baru berhasil ditambahkan.";
        header('Location: mata-kuliah.php');
      } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
      }

      $stmt->close();
    }
    ?> 
  </div>
  <footer>
      <p>&copy; 2024 Scholarly: Stay Organized, Stay Ahead.</p>
  </footer
</body>
</html>
