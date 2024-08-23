<div class="row justify-content-center">
    <div class="col-lg-6">
        <?php
        extract($_POST);
        if (isset($simpan)) {
            // print_r($_FILES);
            $upload_file = upload(
                $_FILES['gambar']['name'],
                $tmp_name = $_FILES['gambar']['tmp_name'],
                $max_file = 2,
                $size_file = $_FILES['gambar']['size'] / (1024 * 1024),
                ['jpg', 'jpeg', 'png']
            );
            // print_r($upload_file);
            if ($upload_file['status'] == 1) {
              
                
                $dataUser = [
                    'nama_user' => $nama_user,
                    'email' => $email,
                    'password' => $password,
                    'jekel' => $jekel,
                    'level' => $level,
                    'gambar' => $_FILES['gambar']['name']
                ];
                insert($table = "user", $dataUser);
                echo "<script>location='index.php?folder=user&file=index'</script>";
            } else {
                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            
                <strong>Informasi!</strong>
                ' . $upload_file['message'] . '
            </div>';
            }
        }


        ?>
        <h3>
            <center>Input User</center>
        </h3>
        <form action="" method="post" class="user-validation" enctype="multipart/form-data" novalidate>

            <div class="mb-3">
                <label for="" class="form-label">Nama User</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-circle"></i> </span>
                    <input type="text" name="nama_user" class="form-control" required value="<?php if (isset($simpan)) echo $nama_user ?>">
                    <div class="invalid-feedback">Silahkan Isi Nama User</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i> </span>
                    <input type="email" name="email" class="form-control" required value="<?php if (isset($simpan)) echo $email ?>">
                    <div class="invalid-feedback">Silahkan Isi Email</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key-fill"></i> </span>
                    <input type="password" name="password" class="form-control" required value="<?php if (isset($simpan)) echo $password ?>">
                    <div class="invalid-feedback">Silahkan Isi Password</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jekel" id="" class="form-select">
                    <option value="Pria" <?php if (isset($simpan)) {
                                                $jekel == 'Pria' ? $selected = "selected" : $selected = '';
                                                echo $selected;
                                            } ?>>Pria</option>
                    <option value="Wanita" <?php if (isset($simpan)) {
                                                $jekel == 'Wanita' ? $selected = "selected" : $selected = '';
                                                echo $selected;
                                            } ?>>Wanita</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Level</label>
                <select name="level" id="" class="form-select">
                    <option value="1" <?php if (isset($simpan)) {
                                            $level == "1" ? $selected = "selected" : $selected = '';
                                            echo $selected;
                                        } ?>>Administrator</option>
                    <option value="2" <?php if (isset($simpan)) {
                                            $level == "2" ? $selected = "selected" : $selected = '';
                                            echo $selected;
                                        } ?>>Operator</option>
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