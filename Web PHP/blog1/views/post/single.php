<div class="row justify-content-center">
    <div class="col-lg-8">
        <?php
        $dataPost = oneData($table ="posts",$syarat="id_post='$id_post'");
        ?>
        <h2><?= $dataPost['title']?></h2>
        <h5>
        <?php
            
            $dataUser = oneData($table="user", $key = "id_user = '{$dataPost['id_user']}'");
            if(is_array($dataUser)) echo " By : " .$dataUser['nama_user'];

            $dataKategori = oneData($table='categori',$key="id_categori = '{$dataPost['id_categori']}'");
            if(is_array($dataKategori)) echo " In : " .$dataKategori['nama_categori'];

            $file_gambar="";
            if ($dataPost['gambar'] != ""){
                $file_gambar =$dataPost['gambar'];
            }else{
                $file_gambar = "default_img_post.png";
            }
        ?>
        </h5>
        <img src="images/<?= $file_gambar?>" alt="<?=$dataPost['title'] ?>" class="img-fluid">
        <article class="fs-5 mt-3">
            <?= $dataPost['body']?>
        </article>
    </div>

</div>