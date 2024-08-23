<?php
extract($_GET);
extract($_POST);
$dataKategori = oneData($table="categori", $key="id_categori = '$id_categori'");
if(is_array($dataKategori)) {

    if(isset($simpan)){
        $kategoriUpdate = [
            'nama_categori' => $kategori
        ];

        update($table="categori", $kategoriUpdate, $kondisi = "id_categori = '$id_categori'");
        echo "<script>location='index.php?folder=categori&file=index'</script>";
    }
?>
<!-- Tag HTML -->
<div class="row justify-content-center">
    <div class="col-lg-6">
        <h3> 
            <center>Update Kategori</center>
        </h3>
        <form action="" class="needs-validation" method="post" novalidate>
            <div class="mb-3">
              
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" value="<?= $dataKategori['nama_categori']?>" class="form-control" autofocus required>
                <div class="valid-feedback">
                    Isian Sudah Benar.
                </div>
                <div class="invalid-feedback">
                    Silahkan Isi Kategori !
                </div>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" name="simpan" type="submit">Update</button>
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
}else{
    //jiks data tidak ditemukan//
    echo "<script>location='index.php?folder=categori&file=index'</script>";
}