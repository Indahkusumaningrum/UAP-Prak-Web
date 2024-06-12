<?php

include "config.php";

// Query untuk mengambil data yang dibutuhkan
// $sql = "
//     SELECT 
//         d.nama AS nama_driver,
//         v.jenis AS jenis_kendaraan,
//         v.plat AS nopol_kendaraan,
//         v.status AS status_kendaraan,
//         j.jadwal_pemeliharaan AS tanggal_pemeliharaan
//     FROM 
//         driver d
//     JOIN 
//         vehicle v ON d.driver_id = v.driver_id
//     LEFT JOIN 
//         jadwal_kendaraan j ON v.id = j.vehicle_id";

$sql = "SELECT * FROM mata_kuliah";

$result = mysqli_query($mysqli, $sql);

// Periksa apakah query berhasil dieksekusi
if (!$result) {
  die("Query Error: " . mysqli_error($mysqli));
}

// Query untuk menghitung jumlah kendaraan
// $countQuery = "SELECT COUNT(*) as total_kendaraan FROM vehicle";
// $countResult = mysqli_query($mysqli, $countQuery);

// if (!$countResult) {
//   die("Query Error: " . mysqli_error($mysqli));
// }

// $countRow = mysqli_fetch_assoc($countResult);
// $totalKendaraan = $countRow['total_kendaraan'];

// // Query untuk menghitung jumlah karyawan
// $countQueryKaryawan = "SELECT COUNT(*) as total_karyawan FROM driver";
// $countResultKaryawan = mysqli_query($mysqli, $countQueryKaryawan);

// if (!$countResultKaryawan) {
//   die("Query Error: " . mysqli_error($mysqli));
// }

// $countRowKaryawan = mysqli_fetch_assoc($countResultKaryawan);
// $totalKaryawan = $countRowKaryawan['total_karyawan'];

// // Query untuk menghitung jumlah jadwal
// $countQueryJadwal = "SELECT COUNT(*) as total_jadwal FROM jadwal_kendaraan";
// $countResultJadwal = mysqli_query($mysqli, $countQueryJadwal);

// if (!$countResultJadwal) {
//   die("Query Error: " . mysqli_error($mysqli));
// }

// $countRowJadwal = mysqli_fetch_assoc($countResultJadwal);
// $totalJadwal = $countRowJadwal['total_jadwal'];

// // Query untuk menghitung jumlah kehadiran
// $countQueryKehadiran = "SELECT COUNT(*) as total_kehadiran FROM attendance";
// $countResultKehadiran = mysqli_query($mysqli, $countQueryKehadiran);

// if (!$countResultKehadiran) {
//   die("Query Error: " . mysqli_error($mysqli));
// }

// $countRowKehadiran = mysqli_fetch_assoc($countResultKehadiran);
// $totalKehadiran = $countRowKehadiran['total_kehadiran'];
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
     <!-- <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin keluar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, keluar!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'prosesLogout_admin.php';
                }
            });
        }
    </script> -->
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
              <a href="#" class="nav-link px-3 active mt-4">
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
    <a class="nav-link px-3 sidebar-link" href="tugas2.php">
        <span class="me-2"><i class="bi bi-list-task"></i></span>
        <span>Tugas</span>
        <span class="ms-auto">
            <span class="right-icon">
            </span>
        </span>
    </a>
</li>

          


       


            <!-- <div class="collapse" id="karyawanLayouts">
                <ul class="navbar-nav ps-3">
                <li>
                    <a href="adminAddKaryawan.php" class="nav-link px-3 custom-bg">
                    <span class="me-2"></span>
                    <span>Add</span>
                    </a>
                </li>
                <li>
                    <a href="adminViewKaryawan.php" class="nav-link px-3 custom-bg">
                    <span class="me-2"></span>
                    <span>View</span>
                    </a>
                </li>
                <li>
                    <a href="adminManageKaryawan.php" class="nav-link px-3 custom-bg">
                    <span class="me-2"></span>
                    <span>Manage</span>
                    </a>
                </li>
                </ul>
            </div> -->
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
            <!-- <div class="collapse" id="jadwalLayouts">
                <ul class="navbar-nav ps-3">
                <li>
                    <a href="adminAddJadwal.php" class="nav-link px-3 custom-bg">
                    <span class="me-2"></span>
                    <span>Add</span>
                    </a>
                </li>
                <li>
                    <a href="adminViewJadwal.php" class="nav-link px-3 custom-bg">
                    <span class="me-2"></span>
                    <span>View</span>
                    </a>
                </li>
                <li>
                    <a href="adminManageJadwal.php" class="nav-link px-3 custom-bg">
                    <span class="me-2"></span>
                    <span>Manage</span>
                    </a>
                </li>
                </ul>
            </div> -->
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
          <div class="breadcrumb mt-4 ms-3" >
              <span class="breadcrumb-item active">DASHBOARD</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <div class="card text-white h-100 active" style="background-color: #2c3e50;">
              <div class="card-body py-5">Mata Kuliah</div>
              <div class="card-footer d-flex">
                <!-- Total Kendaraan: <?php echo $totalKendaraan; ?> -->
              </div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card text-white h-100 " style="background-color: #2c3e50;">
              <div class="card-body py-5">SKS</div>
              <div class="card-footer d-flex">
                <!-- Total Karyawan: <?php echo $totalKaryawan; ?> -->
              </div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card text-white h-100 " style="background-color: #2c3e50;">
              <div class="card-body py-5">Tugas</div>
              <div class="card-footer d-flex">
                <!-- Total Jadwal: <?php echo $totalJadwal; ?> -->
              </div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card text-white h-100 " style="background-color: #2c3e50;">
              <div class="card-body py-5">Catatan</div>
              <div class="card-footer d-flex">
                <!-- Total Kehadiran: <?php echo $totalKehadiran; ?> -->
              </div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> Data Table
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
                        <th>Name Driver</th>
                        <th>Jenis Mobil</th>
                        <th>Nopol Kendaran</th>
                        <th>Status</th>
                        <!-- <th>Kerusakan</th> -->
                        <th>Jadwal Pemeliharaan</th>
                      </tr>
                    </thead>
                    <tbody>
                    <!-- <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                    <td>{$row['nama_driver']}</td>
                                                    <td>{$row['jenis_kendaraan']}</td>
                                                    <td>{$row['nopol_kendaraan']}</td>
                                                    <td>{$row['status_kendaraan']}</td>
                                                    <td>{$row['tanggal_pemeliharaan']}</td>
                                                </tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No data available</td></tr>";
                                        }
                                        ?> -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
