<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Dosen</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
        <h1>Input Data Dosen</h1>
        <hr>
        <form action="dosen_proses.php" method="post">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-2">
                        <label class="form-label">NIP</label>
                        <input type="text" class="form-control" name="nip" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" 
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
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" 
                        name="email" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Program Studi</label>
                    </div>
                    <div class="mb-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                            name="prodi" value="Teknik Komputer" checked>
                            <label for="" class="form-check-label">Teknik Komputer</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                            name="prodi" value="Manajemen Informatika">
                            <label for="" class="form-check-label">Manajemen Informatika</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                            name="prodi" value="TRPL">
                            <label for="" class="form-check-label">TRPL</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Hobi</label>
                    </div>
                    <div class="mb-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Design" name="hobi[]">
                            <label class="form-check-label" for="flexCheckDefault">Design</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Mancing" name="hobi[]">
                            <label class="form-check-label" for="flexCheckDefault">Mancing</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Programming" name="hobi[]">
                            <label class="form-check-label" for="flexCheckDefault">Programming</label>
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