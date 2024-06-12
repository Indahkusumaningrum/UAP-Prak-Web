<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Tambah Tugas
                    </div>
                    <div class="card-body">
                        <form action="proses-create-tugas.php" method="POST">
                            <div class="mb-3">
                                <label for="nama_tugas" class="form-label">Nama Tugas</label>
                                <input type="text" class="form-control" id="nama_tugas" name="nama_tugas" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_pengumpulan" class="form-label">Tanggal Pengumpulan</label>
                                <input type="date" class="form-control" id="tanggal_pengumpulan" name="tanggal_pengumpulan" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
