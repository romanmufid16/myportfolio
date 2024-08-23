<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <h2>List Data Mahasiswa</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Hobi</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <?php
            include('koneksi.php');
            $view = mysqli_query($db, "select * from mahasiswa");
        
            while ($data = mysqli_fetch_array($view)) {
            ?>
                <tbody class="table-group-divider">
                    <tr>
                        <td><?php echo $data['nim'] ?></td>
                        <td><?php echo $data['nama_mhs'] ?></td>
                        <td><?php echo $data['tgl_lahir'] ?></td>
                        <td><?php echo $data['jenis_kelamin']?></td>
                        <td><?php echo $data['hobi']?></td>
                        <!-- <td><?php echo $data['tugas']?></td>
                        <td><?php echo $data['uts']?></td>
                        <td><?php echo $data['uas']?></td>
                        <td><?php echo $total ?></td>
                        <td><?php echo $huruf ?></td>
                        <td><?php echo $keterangan ?></td> -->
                        <td><?php echo $data['alamat'] ?></td>
                        <td>
                            <a class="btn btn-danger"
                            href="hapus.php?id=<?php echo $data['nim']?>">Hapus</a>
                            <a class="btn btn-primary"
                            href="?p=edit_mhs&id=<?php echo $data['nim']?>">Edit</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
        <a href="index.php?p=input_mhs">Input Data Mahasiswa</a>
    </div>
</body>

</html>