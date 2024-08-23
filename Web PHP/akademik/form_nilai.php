<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
        <h1>Form Mahasiswa</h1>
        <form action="form_proses.php" method="post">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-2">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" placeholder="210108xxxx" name="nim" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama anda"
                        name="nama" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Jenis Kelamin</label>
                    </div>
                    <div class="mb-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                            name="jk" value="L" checked>
                            <label for="" class="form-check-label">Laki - Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                            name="jk" value="P">
                            <label for="" class="form-check-label">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Hobi</label>
                    </div>
                    <div class="mb-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Gaming" name="hobi[]">
                            <label class="form-check-label" for="flexCheckDefault">Gaming</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Mancing" name="hobi[]">
                            <label class="form-check-label" for="flexCheckDefault">Mancing</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Korupsi" name="hobi[]">
                            <label class="form-check-label" for="flexCheckDefault">Korupsi</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Alamat</label>
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control" rows="4" name="alamat" ></textarea>
                    </div>
                    <div class="mb-2">
                        <button type="submit" name="proses" class="btn btn-success">Submit</button>
                        <button type="reset" name="reset" class="btn btn-warning">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>  

    

</body>
</html>