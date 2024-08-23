<?php
    include 'koneksi.php';
    $hapus=mysqli_query($db,"DELETE FROM mahasiswa 
    WHERE nim=$_GET[id]");
    if ($hapus) {
        header("location:list_mahasiswa.php");
    } else {
        print "Gagal menghapus data";
    }
?>