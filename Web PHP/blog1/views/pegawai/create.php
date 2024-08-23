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


                $dataPegawai = [
                    'nip' => $nip,
                    'nama_pegawai' => $nama_pegawai,
                    'jekel' => $jekel,
                    'no_telp' => $no_telp,
                    'gambar' => $_FILES['gambar']['name']
                ];
                insert($table = "pegawai", $dataPegawai);
                echo "<script>location='index.php?folder=pegawai&file=index'</script>";
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
            <center>Input Pegawai</center>
        </h3>
        <form action="" method="post" class="user-validation" enctype="multipart/form-data" novalidate>

            <div class="mb-3">
                <label for="" class="form-label">Nip Pegawai</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-circle"></i> </span>
                    <input type="text" name="nip" class="form-control" required value="<?php if (isset($simpan)) echo $nip ?>">
                    <div class="invalid-feedback">Silahkan Isi Nip Pegawai</div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nama Pegawai</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-circle"></i> </span>
                    <input type="text" name="nama_pegawai" class="form-control" required value="<?php if (isset($simpan)) echo $nama_pegawai ?>">
                    <div class="invalid-feedback">Silahkan Isi Nama Pegawai</div>
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
                <label for="" class="form-label">No Telpon</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i> </span>
                    <input type="text" name="no_telp" class="form-control" required value="<?php if (isset($simpan)) echo $no_telp ?>">
                    <div class="invalid-feedback">Silahkan Isi No Telpon</div>
                </div>
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
    (() => {
        'use strict'

        const forms = document.querySelectorAll('.user-validation')
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