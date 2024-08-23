<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
        <a class="btn btn-info" href="index.php?folder=pembayaran-2020&file=create">
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
                <th scope="col">#</th>
                <th scope="col">Kode Pembayaran</th>
                <th scope="col">Nama - Alamat (Customers)</th>
                <th scope="col">Nama Barang - Kategori (Barang)</th>
                <th scope="col">Bukti Bayar</th>
                <!-- <th scope="col">Create User</th>
                <th scope="col">Update User</th>  -->
                <th scope="col">Tanggal Bayar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            extract($_GET);
            $keyword = "";
            if (isset($cari)) {
                $keyword = "WHERE kode_pembayaran_2020 LIKE '%$cari%' or kode_pembayaran_2020 LIKE '%$cari%'";
            }
            $listPembayaran = allData($table = "pembayaran_2020", $where = $keyword);
            $no = 0;
            
            foreach ($listPembayaran as $value) {
                $no++;
                $customers = oneData($table = "customer_2020", $where = $value['id_customer_2020'] = 'id_customer_2020');
                $barang = oneData($table = "barang_2020", $where = $value['id_barang_2020'] = 'id_barang_2020');

            ?>
                <tr class="">
                    <td scope="row"><?= $no ?></td>
                    <td> <?= $value['kode_pembayaran_2020']; ?></td>
                    <td> <?= $customer['nama_2020'] ?> - <?= $customer['alamat_2020']?></td>
                    <td> <?= $barang['nama_barang'] ?> - <?= $barang['kategori_barang']?></td>
                    <td>
                        <?php
                        $gambar = "";
                        if ($value['bukti_gambar'] == NULL) {
                            $gambar = "images/{$value['gambar']}";
                        }
                        ?>
                        <img src="<?= $gambar ?>" width="120" height="125" alt="<?= $gambar ?>" class="rounded-circle">
                    </td>
                    <td><?= $value['tanggal_bayar'] ?></td>
                    <td>
                        <a href="index.php?folder=pembayaran-2020&file=update&id_pembayaran_2020=<?= $value['id_pembayaran_2020'] ?>" class="btn btn-warning">
                            <i class="bi bi-pencil">
                                <!-- Edit -->

                            </i>
                            <!-- </td>
                <td> -->

                        </a>
                        <a href="index.php?folder=pembayaran-2020&file=index&id_pembayaran_2020=<?= $value['id_pembayaran_2020'] ?>" class="btn btn-danger" 
                        onclick="return confirm('Apakah anda yakin ingin menghapus : <?= $value['kode_pembayaran_2020'] ?>')">
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