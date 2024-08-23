<?php
extract($_GET);
extract($_POST);
$dataUser = oneData($table = "user", $key = "id_user = '$id_user'");
if (is_array($dataUser)) {
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
                $userUpdate = [
                    'nama_user' => $nama_user,
                    'password' => $password,
                    'jekel' => $jekel,
                    'level' => $level,
                    'gambar' => $_FILES['gambar']['name']
                ];   
                update($table = "user", $userUpdate, $kondisi = "id_user = '$id_user'");
                echo "<script>location='index.php?folder=user&file=index'</script>";
                
            }else{
                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> <strong>Informasi!</strong>
                        ' . $upload_file['message'] . '
                    </div>';
            }
        }else{
            $userUpdate = [
                'nama_user' => $nama_user,
                'password' => $password,
                'jekel' => $jekel,
                'level' => $level,
            ];   
            update($table = "user", $userUpdate, $kondisi = "id_user = '$id_user'");
            echo "<script>location='index.php?folder=user&file=index'</script>";
        }
    }

}else{
    echo "<script>location='index.php?folder=user&file=index'</script>";   
}

  
?>
    <!-- Tag HTML -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h3>
                <center>Update User</center>
            </h3>
            <form action="" method="post" class="user-validation" enctype="multipart/form-data" novalidate>

                <div class="mb-3">
                    <label for="" class="form-label">Nama User</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-circle"></i> </span>
                        <input type="text" name="nama_user" class="form-control" required value="<?= $dataUser['nama_user'] ?>">
                        <div class="invalid-feedback">Silahkan Isi Nama User</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i> </span>
                        <input type="email" name="email" class="form-control" required value="<?= $dataUser['email'] ?>" readonly>
                        <div class="invalid-feedback">Silahkan Isi Email</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-key-fill"></i> </span>
                        <input type="password" name="password" class="form-control" required value="<?= $dataUser['password'] ?>">
                        <div class="invalid-feedback">Silahkan Isi Password</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jekel" id="" class="form-select">
                        <option value="Pria" <?php if ($dataUser['jekel'] == "Pria")  echo "selected";
                                                ?>>Pria</option>
                        <option value="Wanita" <?php if ($dataUser['jekel'] == "Wanita")  echo "selected";
                                                ?>>Wanita</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Level</label>
                    <select name="level" id="" class="form-select">
                        <option value="1" <?php if ($dataUser['level'] == '1')  echo "selected";
                                            ?>>Administrator</option>
                        <option value="2" <?php if ($dataUser['level'] == '2')  echo "selected";
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



