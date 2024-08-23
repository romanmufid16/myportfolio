<div class="row justify-content-center">
    <div class="col-lg-8">
        <?php
        extract($_POST);

        if (isset($simpan)) {
            //jika upload file//
            if ($_FILES['gambar']['name'] != "") {
                $upload = upload(
                    $nama_file = $_FILES['gambar']['name'],
                    $temp_file = $_FILES['gambar']['tmp_name'],
                    $max_file = 2,
                    $size = $_FILES['gambar']['size'] / (1024 * 1024),
                    ['JPG', 'JPEG', 'PNG', 'jpg', 'jpeg', 'png',]

                );
                if ($upload['status'] == 1) {
                    $dataPost = [
                        'title' => $title,
                        'excerpt' => $excerpt,
                        'body' => $body,
                        'id_categori' => $id_categori,
                        'id_user' => $id_user,   
                        'gambar' => $_FILES['gambar']['name']
                    ];
                    insert($table = "posts", $dataPost);
                    echo "<script>location='index.php?folder=post&file=index'</script>";
                } else {
                    echo "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">
                        </button><strong>Informasi! </strong>" . $upload['message'] . ".</div>";
                }
            } else {
                //jika user tidak upload file
                $dataPost = [
                    'title' => $title,
                    'excerpt' => $excerpt,
                    'body' => $body,
                    'id_categori' => $id_categori,
                    'id_user' => $id_user,
                    'gambar' => ''
                ];
            }
        }
        ?>

        <h3>
            <center>New Post</center>
        </h3>
        <form action="" enctype="multipart/form-data" method="post" class="post-validation" novalidate>
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <div class="input-group"><span class="input-group-text"> <i class="bi bi-fonts"></i></span>
                    <input type="text" name="title" class="form-control" required>
                    <div class="invalid-feedback">
                        Silahkan isi Title
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Excerpt</label>
                <textarea name="excerpt" id="" class="form-control" required></textarea>
                <div class="invalid-feedback">
                    Silahkan isi Excerpt
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Body</label>
                <input id="body" type="text" name="body" class="form-control d-none">
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
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" required>
                <div class="invalid-feedback">Silahkan Upload Gambar</div>
                <div class="alert alert-info mt-1" role="alert">
                    <strong>Informasi</strong> File gambar (JPG,JPEG,PNG)<strong> Maksimal Kapasitas</strong> 2Mb
                </div>
                <div class="invalid-feedback">Silahkan Isi Gambar</div>
                <!-- </div>
            <div class="mb-3">
                <label for="" class="form-label">Gambar</label>
                <input type="file" class="form-control" name="gambar" id="" placeholder="" aria-describedby="fileHelpId">
                <div id="fileHelpId" class="form-text">File yang di upload jpg, jpeg, png</div>
            </div> -->

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
        const forms = document.querySelectorAll('.post-validation')

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