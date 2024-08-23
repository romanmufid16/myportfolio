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


                $dataBarang = [
                    'kode_barang' => $kode_barang,
                    'nama_barang' => $nama_barang,
                    'harga' => $harga,
                    'gambar' => $_FILES['gambar']['name']
                ];
                insert($table = "barang", $dataBarang);
                echo "<script>location='index.php?folder=barang&file=index'</script>";
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
            <center>Input Barang</center>
        </h3>
        <form action="" method="post" class="user-validation" enctype="multipart/form-data" novalidate>

            <div class="mb-3">
                <label for="" class="form-label">Kode Barang</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-code"></i> </span>
                    <input type="text" name="kode_barang" class="form-control" required value="<?php if (isset($simpan)) echo $kode_barang ?>">
                    <div class="invalid-feedback">Silahkan Isi Kode Barang</div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nama Barang</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-123"></i> </span>
                    <input type="text" name="nama_barang" class="form-control" required value="<?php if (isset($simpan)) echo $nama_barang ?>">
                    <div class="invalid-feedback">Silahkan Isi Nama Barang</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-tags"></i> </span>
                    <input type="text" name="harga" class="form-control" required value="<?php if (isset($simpan)) echo $harga ?>">
                    <div class="invalid-feedback">Silahkan Isi Harga</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" required>
                <div class="invalid-feedback">Silahkan Upload Gambar</div>
                <div class="alert alert-info mt-1" role="alert">
                    <strong>Informasi</strong> File gambar (JPG,JPEG,PNG)<strong> Maksimal Kapasitas</strong> 2Mb
                </div>
                <div class="invalid-feedback">Silahkan Isi Email</div>
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