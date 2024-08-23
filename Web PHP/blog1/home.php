<div class="row">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
            $dataSlide = allData($table = "slide_show");
            $no_button = 0;
            foreach ($dataSlide as $item) {
            ?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $no_button; ?>"
                class="<?= $no_button == 0 ? "active" : ""; ?>" aria-current="true"
                aria-label="Slide <?= $no_button + 1 ?>"></button>
            <?php
                $no_button++;
            }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
            $no_item = 0;
            foreach ($dataSlide as $item) {
                $no_item++;
            ?>
            <div class="carousel-item <?= $no_item == 1 ? "active" : ""; ?>">
                <img src="images/<?= $item['gambar'] ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block rounded" style="background-color: rgba(0, 0, 0, 0.7);">
                    <h5><?= $item['title'] ?></h5>
                    <p><?= $item['body'] ?></p>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="row mt-5">
<?php
    $dataPost = allData($table = "posts");
    foreach($dataPost as $item){
    $file_gambar = "";
        if ($item['gambar'] != ""){
            $file_gambar = $item['gambar'];
        }else{
            $file_gambar = "default_img_post.png";
        }
?>
<div class="col-md-4">
    <div class="card">
        <div class="position-absolute  p-3 text-white" style="background-color: rgba(0,0, 0, 0.4);">
            <?php
                $dataKategori = oneData($table ="categori", $key="id_categori='{$item['id_categori']}'");
                if (is_array($dataKategori)) echo $dataKategori['nama_categori'];
            ?>
        </div>
        <img class="card-img-top" width="400" height="200" src="images/<?= $file_gambar ?>" alt="<?= $item['tittle'] ?>">
        <div class="card-body">
            <h4 class="card-title"><?= $item['tittle']?></h4>
            <p class="card-text"><?= $item['excerpt']?></p>
            <a href="index.php?front_folder=post&file=single&id_post=<?= $item['id_post']?>" class="btn btn-success">Read More..</a>
        </div>
    </div>
</div>
<?php
}
?>
</div>