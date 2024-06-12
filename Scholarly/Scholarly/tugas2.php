<?php
include 'config.php';

// Query untuk mengambil data tugas
$sql = "SELECT * FROM tugas";
$result = mysqli_query($mysqli, $sql);

// Periksa apakah query berhasil dieksekusi
if (!$result) {
    die("Query Error: " . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style2.css" />
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
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
          style="border-color: #2c3e50;
                border-width: 3px;"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"
          style = "background-color: #2c3e50"
          >
          </span>
        </button>
        <img class="ms-1" src="logo.png" alt="ScholarlyLogo" width="135px"/>
        <!-- <a
          class="navbar-brand me-auto ms-lg-0 ms-2 text-uppercase fw-bold"
          href="#"
          style= "color: #2c3e50;"
          >Scholarly</a
        > -->
        
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <!-- <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a> -->
              <!-- <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); confirmLogout();">Logout</a></li>
              </ul> -->
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-light mt-3"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0" style= "background-color: #e7eef5;">
        <nav class="navbar-light">
          <ul class="navbar-nav">
            <!-- Dashboard -->
            <li>
              <a href="dashboard.php" class="nav-link px-3 mt-4">
                <span class="me-2"><i class="bi bi-columns"></i></span>
                <span>Dashboard</span>
              </a>


            <!-- Mata Kuliah -->

            <a class="nav-link px-3 sidebar-link"  href="mata-kuliah.php">
                <span class="me-2"><i class="bi bi-book"></i></span>
                <span>Mata Kuliah</span>
                <span class="ms-auto">
                <span class="right-icon">
                    
                </span>
                </span>
            </a>
            <!-- <div class="collapse" id="kendaraanLayouts">
                <ul class="navbar-nav ps-3">
                <li>
                    <a href="adminAddVehicle.php" class="nav-link px-3 custom-bg">
                    <span class="me-2"></span>
                    <span>Add</span>
                    </a>
                </li>
                <li>
                    <a href="adminViewVehicle.php" class="nav-link px-3 custom-bg">
                    <span class="me-2"></span>
                    <span>View</span>
                    </a>
                </li>
                <li>
                    <a href="adminManageVehicle.php" class="nav-link px-3 custom-bg">
                    <span class="me-2"></span>
                    <span>Manage</span>
                    </a>
                </li>
                </ul>
            </div> -->
            </li>
            <!-- end of Mata Kuliah -->

            <!-- Tugas -->
            <li>
            <a class="nav-link px-3 active sidebar-link"  href="tugas.php">
                <span class="me-2"><i class="bi bi-list-task"></i></span>
                <span>Tugas</span>
                <span class="ms-auto">
                <span class="right-icon">
                </span>
                </span>
            </a>
            
            </li>
            <!-- end of Tugas -->


            <!-- Project -->
            <li>
              <a class="nav-link px-3 sidebar-link"  href="Catatan.php">
                  <span class="me-2"><i class="bi bi-kanban"></i></span>
                  <span>Catatan</span>
                  <span class="ms-auto">
                  <span class="right-icon">
                  </span>
                  </span>
              </a>

            </li>


            <!-- Jadwal -->
            <li>
            <a class="nav-link px-3 sidebar-link"  href="jadwal-kuliah.php">
                <span class="me-2"><i class="bi bi-calendar-check-fill"></i></span>
                <span>Jadwal Kuliah</span>
                <span class="ms-auto">
                <span class="right-icon">
                    <!-- <i class="bi bi-chevron-down"></i> -->
                </span>
                </span>
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
                    <!-- Your existing card for Mata Kuliah goes here -->
                </div>
                <div class="col-md-3 mb-3">
                    <!-- Your existing card for SKS goes here -->
                </div>
                <div class="col-md-3 mb-3">
                    <!-- Your existing card for Tugas goes here -->
                </div>
                <div class="col-md-3 mb-3">
                    <!-- Your existing card for Project goes here -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Data Tugas
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Tugas</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Pengumpulan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>{$row['id']}</td>
                                                        <td>{$row['nama_tugas']}</td>
                                                        <td>{$row['deskripsi']}</td>
                                                        <td>{$row['tanggal_pengumpulan']}</td>
                                                        <td>
                                                            <a href='edit-tugas.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                                                            <a href='delete-tugas.php?id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'>Delete</a>
                                                        </td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No data available</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <a href="create-tugas.php" class="btn btn-primary">Tambah Tugas</a>
                </div>
            </div>
        </div>
    <footer>
      <p>&copy; 2024 Scholarly: Stay Organized, Stay Ahead.</p>
    </footer>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    </main>




    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap5.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>

<?php
$mysqli->close();
?>
