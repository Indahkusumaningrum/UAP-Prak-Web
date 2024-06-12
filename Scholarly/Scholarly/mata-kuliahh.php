<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="logo.png" type="image/png" />
    <title>Mata Kuliah</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
    body {
      background-color: #e7eef5;
      font-family: Arial, sans-serif;
    }
    .container-fluid {
      margin-top: 30px;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #2c3e50;
      font-weight: bold;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    h1 .fa-music {
      margin-right: 10px;
    }
    .btn-outline-primary {
      margin-bottom: 20px;
      border-color: #2c3e50;
      color: #2c3e50;
      border-radius: 8px;
      border-width: 2px;
    }
    .btn-outline-primary:hover {
      background-color: #2c3e50;
      color: white;
    }
    table {
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
    }
    th {
      background-color: #a79277;
      color: #ffffff;
      border-radius: 0;
    }
    th:first-child {
      border-top-left-radius: 8px;
    }
    th:last-child {
      border-top-right-radius: 8px;
    }
    td:last-child {
      display: flex;
      gap: 5px;
    }
    footer {
        background-color: #2c3e50;
        color: white;
        text-align: center;
        padding: 10px 0;
      }
    .fa-edit, .fa-trash {
      margin-right: 5px;
    }
  </style>
  </head>
  <body>
    <div class="container-fluid">
      <h1><i class="fas fa-book"></i> Mata Kuliah</h1>
      <a class="btn btn-outline-primary" href="create-mataKuliah.php"
        ><i class="fas fa-plus"></i> Tambah Mata Kuliah</a
      >
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Dosen Pengampu</th>
            <th>Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $result = $mysqli->query("SELECT * FROM mata_kuliah"); while($row =
          $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['nama_matkul']; ?></td>
            <td><?php echo $row['sks']; ?></td>
            <td><?php echo $row['dosen_pengampu']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td>
              <a
                class="btn btn-sm btn-warning"
                href="update-mataKuliah.php?id=<?php echo $row['id']; ?>"
                ><i class="fas fa-edit"></i> Edit</a
              >
              <a
                class="btn btn-sm btn-danger"
                href="delete-mataKuliah.php?id=<?php echo $row['id']; ?>"
                ><i class="fas fa-trash"></i> Delete</a
              >
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <footer>
      <p>&copy; 2024 Scholarly: Stay Organized, Stay Ahead.</p>
    </footer>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
  </body>
</html>
