<nav class="navbar navbar-expand-sm navbar-light bg-default">
    <div class="container">
        <a class=" btn btn-info" href="index.php?folder=jurusan&file=create">
            <i class="bi bi-plus-circle"></i>
            Tambah</a>
        <form class="d-flex my-2 my-lg-0">
            <input type="hidden" name="folder" value="jurusan">
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
                <th scope="col">Jurusan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            extract($_GET);
            $keyword = "";
            if (isset($cari)) {
                $keyword = "WHERE nama_jurusan LIKE '%$cari%'";
            }
            $dataJurusan = allData($table = "jurusan", $where = $keyword);
            $no = 0;
            foreach ($dataJurusan as $value) {
                $no++;

            ?>
                <tr class="">
                    <td scope="row"><?= $no ?></td>
                    <td><?= $value['nama_jurusan'] ?></td>
                    <td>
                        <a href="index.php?folder=jurusan&file=update&id_jurusan=<?= $value['id_jurusan'] ?>" class="btn btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="index.php?folder=jurusan&file=index&id_jurusan=<?= $value['id_jurusan'] ?>" class="btn btn-danger" 
                        onclick="return confirm('Apakah anda yakin ingin menghapus : <?= $value['nama_jurusan'] ?>')">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    </td>

                </tr>

            <?php
                extract($_GET);
                if (isset($id_jurusan)) {
                    delete($table = "jurusan", $kondisi = "id_jurusan = '$id_jurusan'");
                    echo "<script>location='index.php?folder=jurusan&file=index'</script>";
                }
            } ?>
        </tbody>
    </table>
</div>