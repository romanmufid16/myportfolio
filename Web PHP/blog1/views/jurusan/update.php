<?php
extract($_GET);
extract($_POST);
$dataJurusan = oneData($table = "jurusan", $key = "id_jurusan = '$id_jurusan'");
if (is_array($dataJurusan)) {

    if (isset($simpan)) {
        $jurusanUpdate = [
            'nama_jurusan' => $jurusan
        ];

        update($table = "jurusan", $jurusanUpdate, $kondisi = "id_jurusan = '$id_jurusan'");
        echo "<script>location='index.php?folder=jurusan&file=index'</script>";
    }
?>
    <!-- Tag HTML -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h3>
                <center>Update jurusan</center>
            </h3>
            <form action="" class="needs-validation" method="post" novalidate>
                <div class="mb-3">

                    <label class="form-label">jurusan</label>
                    <input type="text" name="jurusan" value="<?= $dataJurusan['nama_jurusan'] ?>" class="form-control" autofocus required>
                    <div class="valid-feedback">
                        Isian Sudah Benar.
                    </div>
                    <div class="invalid-feedback">
                        Silahkan Isi Jurusan !
                    </div>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary" name="simpan" type="submit">Update</button>
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


<?php
} else {
    //jiks data tidak ditemukan//
    echo "<script>location='index.php?folder=jurusan&file=index'</script>";
}
