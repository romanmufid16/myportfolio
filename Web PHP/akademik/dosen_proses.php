<?php
include 'koneksi.php';
    if (isset($_POST['proses'])){
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal'];
        $jk = $_POST['jk'];
        $email = $_POST['email'];
        $prodi = $_POST['prodi'];
        $hobi = implode(", ",$_POST['hobi']);
        $alamat = $_POST['alamat'];
        
        $sql = mysqli_query($db,"INSERT INTO dosen(nip,nama_dosen,tgl_lahir,jenis_kelamin,
        email,prodi,hobi,alamat) VALUES ('$nip','$nama','$tanggal','$jk',
        '$email','$prodi','$hobi','$alamat')");

        if ($sql) {
            header('location:index.php?p=dosen');
        } else {
            echo "Proses input data mahasiswa, gagal...";
        }
    }
?>