<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Matakuliah</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<?php
    include 'koneksi.php';
    $edit = mysqli_query($db,"SELECT * FROM matkul 
    WHERE id=$_GET[id]");
    $data = mysqli_fetch_array($edit);
?>

<body>
    <div class="container mt-3">
        <h1>Form Mahasiswa</h1>
        <form method="post">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-2">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode"
                        value="<?= $data['kode_matkul'] ?>" readonly>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama" 
                        value="<?= $data['nama_matkul'] ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">SKS</label>
                        <input type="text" name="sks" class="form-control"
                        value="<?= $data['sks'] ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Jam</label>
                        <input type="text" name="jam" class="form-control"
                        value="<?= $data['jam'] ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Keterangan</label>
                        <input type="text" name="ket" class="form-control"
                        value="<?= $data['keterangan'] ?>">
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
    if (isset($_POST['proses'])) {
        $update=mysqli_query($db,"UPDATE matkul SET
        kode_matkul='$_POST[kode]',
        nama_matkul='$_POST[nama]',
        sks='$_POST[sks]',
        jam='$_POST[jam]',
        keterangan='$_POST[ket]'
        WHERE id=$_GET[id]");

        if ($update) {
            echo '<script>window.location.href = 
            "index.php?p=matkul"</script>';
        }
    }
    ?>

</body>

</html>