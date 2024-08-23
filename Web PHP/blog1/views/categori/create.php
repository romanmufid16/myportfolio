<div class="row justify-content-center">
    <div class="col-lg-6">
        <?php
        extract($_POST);
        if(isset($simpan)){

            $cekKategori = oneData($table="categori", $key = "nama_categori = '$kategori' ");
            //kondisi Data Sudah Aada
            if(is_array($cekKategori)){
                echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                Kategori <strong>$kategori</strong> Sudah ada !
                </div>";
            }else{
                $insertKategori = [
                    'nama_categori' => $kategori
                ];
    
                insert($table = "categori", $insertKategori);
                echo "<script>location='index.php?folder=categori&file=index'</script>";
            }   
        }
        ?>
       
        <h3> 
            <center>Input Kategori</center>
        </h3>
        <form action="" class="needs-validation" method="post" novalidate>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" autofocus required>
                <div class="valid-feedback">
                    Isian Sudah Benar.
                </div>
                <div class="invalid-feedback">
                    Silahkan Isi Kategori !
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