<?php
extract($_GET);
extract($_POST);
$dataBarang = oneData($table = "barang", $key = "id_barang = '$id_barang'");
if (is_array($dataBarang)) {

    if (isset($simpan)) {
        $barangUpdate = [
            'kode_barang' => $kode_barang,
            'nama_barang' => $nama_barang,
            'harga' => $harga,
            'gambar' => $gambar

        ];

        update($table = "barang", $barangUpdate, $kondisi = "id_barang = '$id_barang'");
        echo "<script>location='index.php?folder=barang&file=index'</script>";
    }
?>
    <!-- Tag HTML -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h3>
                <center>Update Barang</center>
            </h3>
            <form action="" method="post" class="user-validation" enctype="multipart/form-data" novalidate>

                <div class="mb-3">
                    <label for="" class="form-label">Kode Barang</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-code"></i> </span>
                        <input type="text" name="kode_barang" class="form-control" required value="<?= $dataBarang['kode_barang'] ?>">
                        <div class="invalid-feedback">Silahkan Isi Kode Barang</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nama Barang</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-123"></i> </span>
                        <input type="text" name="nama_barang" class="form-control" required value="<?= $dataBarang['nama_barang'] ?>">
                        <div class="invalid-feedback">Silahkan Isi Nama Barang</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-tags"></i> </span>
                        <input type="text" name="harga" class="form-control" required value="<?= $dataBarang['harga'] ?>">
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
    echo "<script>location='index.php?folder=barang&file=index'</script>";
}
