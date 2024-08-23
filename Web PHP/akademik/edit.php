<?php
    include 'koneksi.php';
    $edit=mysqli_query($db,"SELECT * FROM mahasiswa
    WHERE nim=$_GET[id]");
    $data=mysqli_fetch_array($edit);
    $hobi_exp=explode(", ",$data['hobi']);
?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<div class="container mt-3">
    <h1>Edit Data Mahasiswa</h1>
            <form method="post">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-2">
                            <label class="form-label">NIM</label>
                            <input type="text" class="form-control" value="<?= $data['nim'] ?>" name="nim" readonly>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="<?= $data['nama_mhs'] ?>"
                            name="nama" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal" class="form-control" value="<?= $data['tgl_lahir']?>">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Jenis Kelamin</label>
                        </div>
                        <div class="mb-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" 
                                name="jk" value="L" <?php if ($data['jenis_kelamin'] == 'L') echo 'checked'?> >
                                <label for="" class="form-check-label">Laki - Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" 
                                name="jk" value="P" <?php if ($data['jenis_kelamin'] == 'P') echo 'checked'?>>
                                <label for="" class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Hobi</label>
                        </div>
                        <div class="mb-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Gaming" name="hobi[]"
                                <?php if (in_array('Gaming',$hobi_exp)) echo 'checked'?> >
                                <label class="form-check-label" for="flexCheckDefault">Gaming</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Mancing" name="hobi[]"
                                <?php if (in_array('Mancing',$hobi_exp)) echo 'checked'?>>
                                <label class="form-check-label" for="flexCheckDefault">Mancing</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Korupsi" name="hobi[]"
                                <?php if (in_array('Korupsi',$hobi_exp)) echo 'checked'?>>
                                <label class="form-check-label" for="flexCheckDefault">Korupsi</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Alamat</label>
                        </div>
                        <div class="mb-2">
                            <textarea class="form-control" rows="4" name="alamat" ><?= $data['alamat'] ?></textarea>
                        </div>
                        <div class="mb-2">
                            <button type="submit" name="proses" class="btn btn-success">Update</button>
                            <button type="reset" name="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
            </form>
</div>
<?php 
    if (isset($_POST['proses'])){
        $hobi_imp=implode(", ",$_POST['hobi']);
        $update=mysqli_query($db,"UPDATE mahasiswa 
        SET nim='$_POST[nim]', nama_mhs='$_POST[nama]',
        tgl_lahir='$_POST[tanggal]',jenis_kelamin='$_POST[jk]',
        hobi='$hobi_imp',alamat='$_POST[alamat]' WHERE nim=$_GET[id]");
        if ($update){
            echo '<script>window.location.href = "index.php?p=mhs"</script>';
        }
    }
?>