<nav class="navbar navbar-expand-lg navbar-light bg-default">
    <div class="container">
        <a class="btn btn-info" href="index.php?folder=post&file=create">
            <i class="bi bi-plus-circle"></i>
            Tambah</a>
        <form class="d-flex my-2 my-lg-0">
            <input type="hidden" name="folder" value="post">
            <input type="hidden" name="file" value="index">
            <input class="form-control me-sm-2" type="text" value="<?php if (isset($cari)) echo $cari; ?>" name="cari" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
</nav>
<div class="table-responsive-lg">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Excerpt</th>
                <th scope="col">Gambar</th>
                <th scope="col">Categori</th>
                <th scope="col">User</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            extract($_GET);
            $keyword = "";
            if (isset($cari)) {
                $keyword = "WHERE tittle LIKE '%$cari%' ";
            }
            $dataPost = allData($table = "posts", $where = $keyword);
            $no = 0;
            foreach ($dataPost as $item) {
                $no++;
                $dataKategori = oneData($table = "categori", $key = "id_categori='{$item['id_categori']}'");
                $dataUser = oneData($table = "user", $key = "id_user='{$item['id_user']}'");
            ?>

                <tr class="">
                    <td scope="row"><?= $no ?></td>
                    <td><?= $item['title'] ?></td>
                    <td><?= $item['body'] ?></td>
                    <td><?= $item['excerpt'] ?></td>
                    <td>
                        <?php
                        if ($item['gambar'] == NULL) {
                            $gambar = "default_img_post.png";
                        } else {
                            $gambar = $item['gambar'];
                        }
                        ?>
                        <img src="images/<?= $gambar ?>" width="140" height="120" alt="<?= $gambar ?>" class="rounded-circle">
                    </td>
                    <td><?php if (is_array($dataKategori)) echo $dataKategori['nama_categori'] ?></td>
                    <td><?php if (is_array($dataUser)) echo $dataUser['nama_user'] ?></td>
                    <td>
                        <a href="index.php?folder=post&file=update&id_post=<?= $item['id_post'] ?>" class="btn btn-warning">
                            <i class="bi bi-pencil">

                            </i>
                        </a>
                        <a href="index.php?folder=post&file=index&id_post=<?= $item['id_post'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus : <?= $value['id_post'] ?>')">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    </td>

                </tr>
            <?php
                extract($_GET);
                if (isset($id_post)) {
                    delete($table = "posts", $kondisi = "id_post = '$id_post'");
                    echo "<script>location='index.php?folder=post&file=index'</script>";
                }
            } ?>
        </tbody>
    </table>
</div>