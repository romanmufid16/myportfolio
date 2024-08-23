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
        <h2>List Data Dosen</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Email</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Hobi</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <?php
            include('koneksi.php');
            $view = mysqli_query($db, "select * from dosen");
        
            while ($data = mysqli_fetch_array($view)) {
            ?>
                <tbody class="table-group-divider">
                    <tr>
                        <td><?php echo $data['nip'] ?></td>
                        <td><?php echo $data['nama_dosen'] ?></td>
                        <td><?php echo $data['tgl_lahir'] ?></td>
                        <td><?php echo $data['jenis_kelamin']?></td>
                        <td><?php echo $data['email']?></td>
                        <td><?php echo $data['prodi']?></td>
                        <td><?php echo $data['hobi']?></td>
                        <td><?php echo $data['alamat'] ?></td>
                        <td>
                            <a class="btn btn-danger"
                            href="hapus.php?nip=<?php echo $data['nip']?>">Hapus</a>
                            <a class="btn btn-primary"
                            href="?p=edit_dosen&nip=<?php echo $data['nip']?>">Edit</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
        <a href="index.php?p=input_dosen">Input Data Dosen</a>
    </div>
</body>

</html>