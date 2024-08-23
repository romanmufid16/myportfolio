<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
        <a class="btn btn-info" href="index.php?folder=pegawai&file=create">
            <i class="bi bi-plus-circle"></i>
            Tambah</a>
        <form class="d-flex my-2 my-lg-0">
            <input type="hidden" name="folder" value="pegawai">
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
                <th scope="col">Nip</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No Telp</th>
                <th scope="col">Gambar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            extract($_GET);
            $keyword = "";
            if (isset($cari)) {
                $keyword = "WHERE nama_pegawai LIKE '%$cari%' or nip LIKE '%$cari%'";
            }
            $listPegawai = allData($table = "pegawai", $where = $keyword);
            $no = 0;
            foreach ($listPegawai as $value) {
                $no++;

            ?>
                <tr class="">
                    <td scope="row"><?= $no ?></td>
                    <td> <?= $value['nip']; ?></td>
                    <td> <?= $value['nama_pegawai']; ?></td>
                    <td><?= $value['jekel'] ?> </td>
                    <td><?= $value['no_telp']; ?></td>
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
                    <td>
                        <a href="index.php?folder=pegawai&file=update&id_pegawai=<?= $value['id_pegawai'] ?>" class="btn btn-warning">
                            <i class="bi bi-pencil">
                            </i>
                        </a>
                        <a href="index.php?folder=pegawai&file=index&id_pegawai=<?= $value['id_pegawai'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus : <?= $value['nama_pegawai'] ?>')">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    </td>

                </tr>
            <?php
                extract($_GET);
                if (isset($id_pegawai)) {
                    delete($table = "pegawai", $kondisi = "id_pegawai = '$id_pegawai'");
                    echo "<script>location='index.php?folder=pegawai&file=index'</script>";
                }
            } ?>
        </tbody>
    </table>
</div>