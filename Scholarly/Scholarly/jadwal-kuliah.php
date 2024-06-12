<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = ""; // Ganti dengan password database Anda
$dbname = "db_scholarly";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan data jadwal kuliah
$sql = "SELECT id, mata_kuliah, dosen, hari, jam_mulai, jam_selesai, ruang FROM jadwal_kuliah";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Scholarly</title>
    <link rel="icon" href="Scholarly.png" type="image/png"/>
    <style>
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
            color: #2c3e50;
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
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #e7eef5;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample" style="border-color: #2c3e50; border-width: 3px;">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar" style="background-color: #2c3e50"></span>
            </button>
            <img class="ms-1" src="logo.png" alt="ScholarlyLogo" width="135px"/>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-light mt-3" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0" style="background-color: #e7eef5;">
            <nav class="navbar-light">
                <ul class="navbar-nav">
                    <!-- Dashboard -->
                    <li>
                        <a href="dashboard.php" class="nav-link px-3 mt-4">
                            <span class="me-2"><i class="bi bi-columns"></i></span>
                            <span>Dashboard</span>
                        </a>
                        <!-- Mata Kuliah -->
                        <a class="nav-link px-3 sidebar-link" href="mata-kuliah.php">
                            <span class="me-2"><i class="bi bi-book"></i></span>
                            <span>Mata Kuliah</span>
                        </a>
                    </li>
                    <!-- end of Mata Kuliah -->
                    <!-- Tugas -->
                    <li>
                        <a class="nav-link px-3 sidebar-link" href="tugas2.php">
                            <span class="me-2"><i class="bi bi-list-task"></i></span>
                            <span>Tugas</span>
                        </a>
                    </li>
                    <!-- end of Tugas -->
                    <!-- Project -->
                    <li>
                        <a class="nav-link px-3 sidebar-link" href="catatan.php">
                            <span class="me-2"><i class="bi bi-kanban"></i></span>
                            <span>Catatan</span>
                        </a>
                    </li>
                    <!-- Jadwal -->
                    <li>
                        <a class="nav-link px-3 sidebar-link active" href="jadwal-kuliah.php">
                            <span class="me-2"><i class="bi bi-calendar-check-fill"></i></span>
                            <span>Jadwal Kuliah</span>
                        </a>
                    </li>
                    <!-- end of Jadwal -->
                </ul>
            </nav>
        </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="breadcrumb mt-4 ms-3">
                    <span class="breadcrumb-item active">DASHBOARD</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <!-- Kartu Mata Kuliah -->
                </div>
                <div class="col-md-3 mb-3">
                    <!-- Kartu SKS -->
                </div>
                <div class="col-md-3 mb-3">
                    <!-- Kartu Tugas -->
                </div>
                <div class="col-md-3 mb-3">
                    <!-- Kartu Proyek -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Jadwal Kuliah
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Mata Kuliah</th>
                                            <th>Dosen</th>
                                            <th>Hari</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
                                            <th>Ruang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>{$row['mata_kuliah']}</td>
                                                        <td>{$row['dosen']}</td>
                                                        <td>{$row['hari']}</td>
                                                        <td>{$row['jam_mulai']}</td>
                                                        <td>{$row['jam_selesai']}</td>
                                                        <td>{$row['ruang']}</td>
                                                        <td>
                                                            <a href='edit-jadwal.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                                            <a href='delete-jadwal.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus jadwal ini?\");'>Delete</a>
                                                        </td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>Tidak ada jadwal kuliah</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div
                        <div class="row">
                <div class="col-md-12 mb-3">
                    <a href="tambah-jadwal.php" class="btn btn-primary">Tambah Jadwal Kuliah</a>
                </div>
            </div>
