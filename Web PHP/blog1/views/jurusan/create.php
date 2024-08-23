<div class="row justify-content-center">
    <div class="col-lg-6">
        <?php
        extract($_POST);
        if (isset($simpan)) {

            $cekJurusan = oneData($table = "jurusan", $key = "nama_jurusan = '$jurusan' ");
            //kondisi Data Sudah Aada
            if (is_array($cekJurusan)) {
                echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                Jurusan <strong>$jurusan</strong> Sudah ada !
                </div>";
            } else {
                $insertJurusan = [
                    'nama_jurusan' => $jurusan
                ];

                insert($table = "jurusan", $insertJurusan);
                echo "<script>location='index.php?folder=jurusan&file=index'</script>";
            }
        }
        ?>

        <h3>
            <center>Input Jurusan</center>
        </h3>
        <form action="" class="needs-validation" method="post" novalidate>
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" autofocus required>
                <div class="valid-feedback">
                    Isian Sudah Benar.
                </div>
                <div class="invalid-feedback">
                    Silahkan Isi Jurusan !
                </div>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
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