<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
        <a class="btn btn-info" href="index.php?folder=barang&file=create">
            <i class="bi bi-plus-circle"></i>
            Tambah</a>
        <form class="d-flex my-2 my-lg-0">
            <input type="hidden" name="folder" value="user">
            <input type="hidden" name="file" value="index">
            <input class="form-control me-sm-2" name="cari" autofocus value="<?php if (isset($cari)) echo $cari; ?>" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="table-responsive mt-2">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Gambar</th>
                <!-- <th scope="col">Create User</th>
                <th scope="col">Update User</th>  -->
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            extract($_GET);
            $keyword = "";
            if (isset($cari)) {
                $keyword = "WHERE nama_barang LIKE '%$cari%' or nama_barang LIKE '%$cari%'";
            }
            $listBarang = allData($table = "barang", $where = $keyword);
            $no = 0;
            foreach ($listBarang as $value) {
                $no++;

            ?>
                <tr class="">
                    <td scope="row"><?= $no ?></td>
                    <td> <?= $value['kode_barang']; ?></td>
                    <td> <?= $value['nama_barang']; ?></td>
                    <td> <?= $value['harga']; ?></td>
                    <td>
                        <?php
                        $gambar = "";
                        if ($value['gambar'] == NULL) {
                            if ($value['jekel'] == "Pria") {
                                $gambar = "images/Pria.jpeg";
                            } else {
                                $gambar = "images/Wanita.jpeg";
                            }
                        } else {
                            $gambar = "images/{$value['gambar']}";
                        }
                        ?>
                        <img src="<?= $gambar ?>" width="120" height="125" alt="<?= $gambar ?>" class="rounded-circle">
                    </td>
                    <!-- https://www.img2go.com/resize-image -->
                    <!-- <td><?= $value['created_at'] ?></td>
                <td><?= $value['updated_at'] ?></td> -->
                    <td>
                        <a href="index.php?folder=barang&file=update&id_barang=<?= $value['id_barang'] ?>" class="btn btn-warning">
                            <i class="bi bi-pencil">
                                <!-- Edit -->

                            </i>
                            <!-- </td>
                <td> -->

                        </a>
                        <a href="index.php?folder=barang&file=index&id_barang=<?= $value['id_barang'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus : <?= $value['nama_barang'] ?>')">
                            <i class="bi bi-x-circle-fill"></i>
                            <!-- Delete -->
                        </a>

                    </td>

                </tr>
            <?php
                extract($_GET);
                if (isset($id_barang)) {
                    delete($table = "barang", $kondisi = "id_barang = '$id_barang'");
                    echo "<script>location='index.php?folder=barang&file=index'</script>";
                }
            } ?>
        </tbody>
    </table>
</div>