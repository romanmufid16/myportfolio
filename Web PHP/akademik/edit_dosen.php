<?php
    include 'koneksi.php';
    $edit=mysqli_query($db,"SELECT * FROM dosen
    WHERE nip=$_GET[nip]");
    $data=mysqli_fetch_array($edit);
    $hobi_exp=explode(", ",$data['hobi']);
?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<div class="container mt-3">
    <h1>Edit Data Dosen</h1>
    <form method="post">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-2">
                        <label class="form-label">NIP</label>
                        <input type="text" class="form-control" name="nip" value="<?= $data['nip']; ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" 
                        name="nama" value="<?= $data['nama_dosen']; ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal" class="form-control" value="<?= $data['tgl_lahir']; ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Jenis Kelamin</label>
                    </div>
                    <div class="mb-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                            name="jk" value="L" <?php if ($data['jenis_kelamin'] == 'L') echo 'checked'?>>
                            <label for="" class="form-check-label">Laki - Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                            name="jk" value="P" <?php if ($data['jenis_kelamin'] == 'P') echo 'checked'?>>
                            <label for="" class="form-check-label">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" 
                        name="email" value="<?= $data['email'] ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Program Studi</label>
                    </div>
                    <div class="mb-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                            name="prodi" value="Teknik Komputer" 
                            <?php if ($data['prodi'] == 'Teknik Komputer') echo 'checked'?>>
                            <label for="" class="form-check-label">Teknik Komputer</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                            name="prodi" value="Manajemen Informatika"
                            <?php if ($data['prodi'] == 'Manajemen Informatika') echo 'checked'?>>
                            <label for="" class="form-check-label">Manajemen Informatika</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                            name="prodi" value="TRPL"
                            <?php if ($data['prodi'] == 'TRPL') echo 'checked'?>>
                            <label for="" class="form-check-label">TRPL</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Hobi</label>
                    </div>
                    <div class="mb-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Design" name="hobi[]"
                            <?php if (in_array('Design',$hobi_exp)) echo 'checked'?> >
                            <label class="form-check-label" for="flexCheckDefault">Design</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Mancing" name="hobi[]"
                            <?php if (in_array('Mancing',$hobi_exp)) echo 'checked'?>>
                            <label class="form-check-label" for="flexCheckDefault">Mancing</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Programming" name="hobi[]"
                            <?php if (in_array('Programming',$hobi_exp)) echo 'checked'?>>
                            <label class="form-check-label" for="flexCheckDefault">Programming</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Alamat</label>
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control" rows="4" name="alamat" ><?= $data['alamat'] ?></textarea>
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
    if (isset($_POST['proses'])){
        $hobi_imp=implode(", ",$_POST['hobi']);
        $update=mysqli_query($db,"UPDATE dosen 
        SET nip='$_POST[nip]', nama_dosen='$_POST[nama]',
        tgl_lahir='$_POST[tanggal]',jenis_kelamin='$_POST[jk]',
        email='$_POST[email]',prodi='$_POST[prodi]',
        hobi='$hobi_imp',alamat='$_POST[alamat]' WHERE nip=$_GET[nip]");
        if ($update){
            echo '<script>window.location.href = "index.php?p=dosen"</script>';
        }
    }
?>