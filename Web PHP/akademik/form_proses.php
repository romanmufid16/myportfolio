<?php
include 'koneksi.php';
    if (isset($_POST['proses'])){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal'];
        $jk = $_POST['jk'];
        $hobi = implode(", ",$_POST['hobi']);
        $alamat = $_POST['alamat'];
        
        $sql = mysqli_query($db,"INSERT INTO mahasiswa(nim,nama_mhs,tgl_lahir,jenis_kelamin,
        hobi,alamat) VALUES ('$nim','$nama','$tanggal','$jk','$hobi','$alamat')");

        if ($sql) {
            header('location:index.php?p=mhs');
        } else {
            echo "Proses input data mahasiswa, gagal...";
        }
    }
?>