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
        <h2>List Data Mata Kuliah</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Nama Mata Kuliah</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <?php
            include('koneksi.php');
            $view = mysqli_query($db, "select * from matkul");
        
            while ($data = mysqli_fetch_array($view)) {
            ?>
                <tbody class="table-group-divider">
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['kode_matkul'] ?></td>
                        <td><?php echo $data['nama_matkul'] ?></td>
                        <td><?php echo $data['sks']?></td>
                        <td><?php echo $data['jam']?></td>
                        <td><?php echo $data['keterangan']?></td>
                        <td>
                            <a class="btn btn-danger"
                            href="hapus_matkul.php?id=<?php echo $data['id']?>">Hapus</a>
                            <a class="btn btn-primary"
                            href="?p=edit_matkul&id=<?php echo $data['id']?>">Edit</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
        <a href="index.php?p=input_matkul">Input Data Mata Kuliah</a>
    </div>
</body>

</html>