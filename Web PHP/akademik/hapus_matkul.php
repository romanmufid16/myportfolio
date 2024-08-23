<?php
    include 'koneksi.php';
    $hapus=mysqli_query($db,"DELETE FROM matkul 
    WHERE id=$_GET[id]");
    if ($hapus) {
        header("location:index.php?p=matkul");
    } else {
        print "Gagal menghapus data";
    }
?>