<!-- <?php
        extract($_GET);
        extract($_POST);
        $dataPost = oneData($table = "posts", $key = "id_post = '$id_post'");
        if (is_array($dataPost)) {

            if (isset($simpan)) {
                $dataPost = [
                    'tittle' => $tittle,
                    'excerpt' => $excerpt,
                    'body' => $body,
                    'id_categori' => $id_categori,
                    'id_jurusan' => $id_jurusan,
                    'id_pegawai' => $id_pegawai,
                    'id_user' => $id_user,
                    'id_barang' => $id_barang,
                    'gambar' => $_FILES['gambar']['name']
                ];

                update($table = "posts", $postUpdate, $kondisi = "id_post = '$id_post'");
                // echo "<script>location='index.php?folder=post&file=index'</script>";
            }
        ?> -->
<?php
            extract($_GET);
            extract($_POST);
            $dataPost = oneData($table = "posts", $key = "id_post = '$id_post'");
            if (is_array($dataPost)) {
                //Upload Gambar
                if (isset($simpan)) {
                    if ($_FILES['gambar']['name'] != "") {
                        $upload_file = upload(
                            $_FILES['gambar']['name'],
                            $tmp_name = $_FILES['gambar']['tmp_name'],
                            $max_file = 2,
                            $size_file = $_FILES['gambar']['size'] / (1024 * 1024),
                            ['jpg', 'jpeg', 'png']
                        );
                        if ($upload_file['status'] == 1) {
                            $postUpdate = [
                                'tittle' => $tittle,
                                'excerpt' => $excerpt,
                                'body' => $body,
                                'id_categori' => $id_categori,
                                'id_jurusan' => $id_jurusan,
                                'id_pegawai' => $id_pegawai,
                                'id_user' => $id_user,
                                'id_barang' => $id_barang,
                                'gambar' => $_FILES['gambar']['name']
                            ];
                            update($table = "posts", $postUpdate, $kondisi = "id_post = '$id_post'");
                            echo "<script>location='index.php?folder=post&file=index'</script>";
                        } else {
                            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> <strong>Informasi!</strong>
                        ' . $upload_file['message'] . '
                    </div>';
                        }
                    } else {
                        $postUpdate = [
                            'tittle' => $tittle,
                            'excerpt' => $excerpt,
                            'body' => $body,
                            'id_categori' => $id_categori,
                            'id_jurusan' => $id_jurusan,
                            'id_pegawai' => $id_pegawai,
                            'id_user' => $id_user,
                            'id_barang' => $id_barang
                        ];
                        update($table = "posts", $postUpdate, $kondisi = "id_post = '$id_post'");
                        echo "<script>location='index.php?folder=post&file=index'</script>";
                    }
                }
            } else {
                echo "<script>location='index.php?folder=post&file=index'</script>";
            }


?>
<!-- Tag HTML -->
<div class="row justify-content-center">
    <div class="col-lg-6">
        <h3>
            <center>Update Post</center>
        </h3>
        <form action="" enctype="multipart/form-data" method="post" class="post-validation" novalidate>
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <div class="input-group"><span class="input-group-text"> <i class="bi bi-fonts"></i></span>
                    <input type="text" name="tittle" class="form-control" required value="<?= $dataPost['tittle'] ?>">
                    <div class="invalid-feedback">
                        <div class="invalid-feedback">
                            Silahkan isi Title
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Excerpt</label>
                    <textarea id="" class="form-control" required value="" name="excerpt"><?= $dataPost["excerpt"]; ?></textarea>
                    <div class="invalid-feedback">
                        Silahkan isi Excerpt
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Body</label>
                    <input id="body" type="hidden" name="body" required value="<?= $dataPost['body'] ?>">
                    <trix-editor input="body"></trix-editor>
                    <div class="invalid-feedback">
                        Silahkan isi Body
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Categori</label>
                    <select class="form-select form-select-md" name="id_categori" id="">
                        <?php
                        $dataKategori = allData($table = "categori");
                        foreach ($dataKategori as $item) {
                        ?>
                            <option value="<?= $item['id_categori'] ?>"><?= $item['nama_categori'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Jurusan</label>
                    <select class="form-select form-select-md" name="id_jurusan" id="">
                        <?php
                        $dataJurusan = allData($table = "jurusan");
                        foreach ($dataJurusan as $item) {
                        ?>
                            <option value="<?= $item['id_jurusan'] ?>"><?= $item['nama_jurusan'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">User</label>
                    <select class="form-select form-select-md" name="id_user" id="">
                        <?php
                        $dataUser = allData($table = "user");
                        foreach ($dataUser as $item) {
                        ?>
                            <option value="<?= $item['id_user'] ?>"><?= $item['nama_user'] ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Pegawai</label>
                    <select class="form-select form-select-md" name="id_pegawai" id="">
                        <?php
                        $dataPegawai = allData($table = "pegawai");
                        foreach ($dataPegawai as $item) {
                        ?>
                            <option value="<?= $item['id_pegawai'] ?>"><?= $item['nama_pegawai'] ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Barang</label>
                    <select class="form-select form-select-md" name="id_barang" id="">
                        <?php
                        $dataBarang = allData($table = "barang");
                        foreach ($dataBarang as $item) {
                        ?>
                            <option value="<?= $item['id_barang'] ?>"><?= $item['nama_barang'] ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" required>
                <div class="invalid-feedback">Silahkan Upload Gambar</div>
                <div class="alert alert-info mt-1" role="alert">
                    <strong>Informasi</strong> File gambar (JPG,JPEG,PNG)<strong> Maksimal Kapasitas</strong> 2Mb
                </div>
                <div class="invalid-feedback">Silahkan Isi Gambar</div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
        </form>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>


<?php
        } else {
            //jiks data tidak ditemukan//
            echo "<script>location='index.php?folder=user&file=index'</script>";
        }
