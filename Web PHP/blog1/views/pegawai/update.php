<?php
extract($_GET);
extract($_POST);
$dataPegawai = oneData($table = "pegawai", $key = "id_pegawai = '$id_pegawai'");
if (is_array($dataPegawai)) {
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
                $pegawaiUpdate = [
                    'nip' => $nip,
                    'nama_pegawai' => $nama_pegawai,
                    'jekel' => $jekel,
                    'no_telp' => $no_telp,
                    'gambar' => $_FILES['gambar']['name']
                ];
                update($table = "pegawai", $pegawaiUpdate, $kondisi = "id_pegawai = '$id_pegawai'");
                echo "<script>location='index.php?folder=pegawai&file=index'</script>";
            } else {
                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> <strong>Informasi!</strong>
                        ' . $upload_file['message'] . '
                    </div>';
            }
        } else {
            $pegawaiUpdate = [
                'nip' => $nip,
                'nama_pegawai' => $nama_pegawai,
                'jekel' => $jekel,
                'no_telp' => $no_telp
            ];
            update($table = "pegawai", $pegawaiUpdate, $kondisi = "id_pegawai = '$id_pegawai'");
            echo "<script>location='index.php?folder=pegawai&file=index'</script>";
        }
    }
} else {
    echo "<script>location='index.php?folder=pegawai&file=index'</script>";
}


?>
<!-- Tag HTML -->
<div class="row justify-content-center">
    <div class="col-lg-6">
        <h3>
            <center>Update Pegawai</center>
        </h3>
        <form action="" method="post" class="user-validation" enctype="multipart/form-data" novalidate>

            <div class="mb-3">
                <label for="" class="form-label">Nip</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-circle"></i> </span>
                    <input type="text" name="nip" class="form-control" required value="<?= $dataPegawai['nip'] ?>">
                    <div class="invalid-feedback">Silahkan Isi Nip Pegawai</div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nama Pagawai</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-circle"></i> </span>
                    <input type="text" name="nama_pegawai" class="form-control" required value="<?= $dataPegawai['nama_pegawai'] ?>">
                    <div class="invalid-feedback">Silahkan Isi Nama Pegawai</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jekel" id="" class="form-select">
                    <option value="Pria" <?php if ($dataPegawai['jekel'] == "Pria")  echo "selected";
                                            ?>>Pria</option>
                    <option value="Wanita" <?php if ($dataPegawai['jekel'] == "Wanita")  echo "selected";
                                            ?>>Wanita</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">No Telp</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i> </span>
                    <input type="numerik" name="no_telp" class="form-control" required value="<?= $dataPegawai['no_telp'] ?>">
                    <div class="invalid-feedback">Silahkan Isi No Telp Pegawai</div>
                </div>
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
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
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