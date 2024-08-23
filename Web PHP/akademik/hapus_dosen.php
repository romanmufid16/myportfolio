<?php
    include 'koneksi.php';
    $hapus=mysqli_query($db,"DELETE FROM dosen 
    WHERE nip=$_GET[nip]");
    if ($hapus) {
        header("location:list_dosen.php");
    } else {
        print "Gagal menghapus data";
    }
?>