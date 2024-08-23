<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mata Kuliah</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <h1>Form Mahasiswa</h1>
        <form method="post">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-2">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">SKS</label>
                        <input type="text" name="sks" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Jam</label>
                        <input type="text" name="jam" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Keterangan</label>
                        <input type="text" name="ket" class="form-control">
                    </div>
                    <div class="mb-2">
                        <button type="submit" name="proses" class="btn btn-success">Submit</button>
                        <button type="reset" name="reset" class="btn btn-warning">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    include 'koneksi.php';
    if (isset($_POST['proses'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $sks = $_POST['sks'];
        $jam = $_POST['jam'];
        $keterangan = $_POST['ket'];
    
        $sql = mysqli_query($db, "INSERT INTO matkul(kode_matkul,nama_matkul,sks,jam,
        keterangan) VALUES ('$kode','$nama','$sks','$jam',
        '$keterangan')");

        if ($sql) {
            header('location:index.php?p=matkul');
        } else {
            echo "Proses input data matkul, gagal...";
        }
    }
    ?>

</body>

</html>