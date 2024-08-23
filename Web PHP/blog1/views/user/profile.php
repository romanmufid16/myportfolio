<div class="row">
    <?php
    extract($_POST);

    $dataProfileUser = oneData($table = "user", $key = "id_user = '{$_SESSION['sesi']}'");
    if ($dataProfileUser['gambar'] == NULL) {
        $gambar = "default.jpeg";
    } else {
        $gambar = $dataProfileUser['gambar'];
    }
    ?>

    <div class="col-lg-4">
        <div class="card">
            <img class="card-img-top" src="images/<?= $gambar ?>" alt="<?= $dataProfileUser['nama_user'] ?>">
            <div class="card-body">
                <h4 class="card-title"><?= $dataProfileUser['nama_user'] ?></h4>
                <p class="card-text"><?= $dataProfileUser['email'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <?php
        if (isset($simpan)) {
            $levelUser = "";
            if ($_SESSION['level'] == 1) {
                $levelUser = $level;
            } else {
                $levelUser = $_SESSION;
            }
            //jika upload file
            if ($_FILES['gambar']['name'] != "") {
                $upload = upload(
                    $nama_file = $_FILES['gambar']['name'],
                    $temp_file = $_FILES['gambar']['tmp_name'],
                    $max_file = 2,
                    $size = $_FILES['gambar']['size'] / (1024 * 1024),
                    ['JPG', 'JPEG', 'PNG', 'JFIF', 'jpg', 'jpeg', 'png', 'jfif']

                );

                if ($upload['status'] == 1) {
                    $dataUser = [
                        'nama_user' => $nama_user,
                        'email' => $email,
                        'password' => $password,
                        'jekel' => $jekel,
                        'level' => $levelUser,
                        'gambar' => $_FILES['gambar']['name']
                    ];
                    update($table = "user", $dataUser, $kondisi = "id_user =  '{$_SESSION['sesi']}'");
                    echo "<script>location='index.php?folder=user&file=profile'</script>";
                } else {
                    echo "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">
                        </button><strong>Informasi! </strong>" . $upload['info'] . ".</div>";
                }
            } else {
                //jika tidak upload file
                $dataUser = [
                    'nama_user' => $nama_user,
                    'email' => $email,
                    'password' => $password,
                    'jekel' => $jekel,
                    'level' => $level,

                ];
                update($table = "user", $dataUser, $kondisi = "id_user =  '{$_SESSION['sesi']}'");
                echo "<script>location='index.php?folder=user&file=profile'</script>";
            }
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data" class="user-validation" novalidate>

            <div class="mb-3">
                <label for="" class="form-label">Nama User</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-circle"></i> </span>
                    <input type="text" name="nama_user" class="form-control" required value="<?= $dataProfileUser['nama_user'] ?>">
                    <div class="invalid-feedback">Silahkan Isi Nama User</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i> </span>
                    <input type="email" name="email" class="form-control" required value="<?= $dataProfileUser['email'] ?>" readonly>
                    <div class="invalid-feedback">Silahkan Isi Email</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key-fill"></i> </span>
                    <input type="password" name="password" class="form-control" required value="<?= $dataProfileUser['password'] ?>">
                    <div class="invalid-feedback">Silahkan Isi Password</div>
                </div>
            </div>
            <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jekel" id="" class="form-select">
                        <option value="Pria" <?php if ($dataProfileUser['jekel'] == "Pria")  echo "selected";
                                                ?>>Pria</option>
                        <option value="Wanita" <?php if ($dataProfileUser['jekel'] == "Wanita")  echo "selected";
                                                ?>>Wanita</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Level</label>
                    <select name="level" id="" class="form-select">
                        <option value="1" <?php if ($dataProfileUser['level'] == '1')  echo "selected";
                                            ?>>Administrator</option>
                        <option value="2" <?php if ($dataProfileUser['level'] == '2')  echo "selected";
                                            ?>>Operator</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                    <div class="invalid-feedback">Silahkan Upload Gambar</div>
                    <div class="alert alert-info mt-1" role="alert">
                        <strong>Informasi</strong> File gambar (JPG,JPEG,PNG)<strong> Maksimal Kapasitas</strong> 2Mb
                    </div>
                    <div class="invalid-feedback">Silahkan Isi Gambar</div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>

        </form>
    </div>

</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.user-validation')

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