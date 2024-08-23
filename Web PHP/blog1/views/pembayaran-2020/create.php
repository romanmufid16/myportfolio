<div class="row justify-content-center">
    <div class="col-lg-6">
        <?php
        extract($_POST);
        if (isset($simpan)) {
            // print_r($_FILES);
            $upload_file = upload(
                $_FILES['bukti_bayar']['name'],
                $tmp_name = $_FILES['bukti_bayar']['tmp_name'],
                $max_file = 2,
                $size_file = $_FILES['bukti_bayar']['size'] / (1024 * 1024),
                ['jpg', 'jpeg', 'png']
            );
            // print_r($upload_file);
            if ($upload_file['status'] == 1) {


                $dataPembayaran = [
                    'kode_pembayaran_2020' => $kode_pembayaran,
                    'customer' => $customer,
                    'jumlah_2020' => $jumlah,
                    'keterangan_2020' => $jumlah,
                    'bukti_bayar' => $_FILES['bukti_bayar']['name']
                ];
                insert($table = "pembayaran_2020", $dataPembayaran);
                echo "<script>location='index.php?folder=pembayaran-2020&file=index'</script>";
            } else {
                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            
                <strong>Informasi!</strong>
                ' . $upload_file['message'] . '
            </div>';
            }
        }

        $listCustomer = allData($table = "customer_2020");
        ?>
        <h3>
            <center>Bukti Pembayaran</center>
        </h3>
        <form action="" method="post" class="user-validation" enctype="multipart/form-data" novalidate>

            <div class="mb-3">
                <label for="" class="form-label">Kode Pembayaran</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-credit-card-2-front"></i></span>
                    <input type="text" name="kode_Pembayaran" class="form-control" readonly value="<?= $kode_pembayaran = kodePembayaran(); ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Customer</label>
                <div class="input-group">
                    <select class="form-select" aria-label="Default select example">
                        <?php
                        foreach ($listCustomer as $value) {
                        ?>
                        <option value="<?= $value['nama_2020']; ?>"></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Barang</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calculator-fill"></i> </span>
                    <input type="text" name="jumlah" class="form-control" required value="<?php if (isset($simpan)) echo $jumlah ?>">
                    <div class="invalid-feedback">Silahkan Isi Jumlah</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <div class="input-group">
                    <textarea name="keterangan" id="" cols="50" rows=5" value="<?php if (isset($simpan)) echo $keterangan; ?>"></textarea>
                    <div class="invalid-feedback">Silahkan Isi Keterangan</div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Bukti Pembayaran</label>
                <input type="file" name="bukti_bayar" class="form-control" required>
                <div class="invalid-feedback">Silahkan Upload Bukti Pembayaran</div>
                <div class="alert alert-info mt-1" role="alert">
                    <strong>Informasi</strong> File Bukti Pembayaran (JPG,JPEG,PNG)<strong> Maksimal Kapasitas</strong> 2Mb
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