<nav class="navbar navbar-expand-sm navbar-light bg-default">
      <div class="container">
        <a class="btn btn-info" href="index.php?folder=categori&file=create">
        <i class="bi bi-plus-circle"></i>
        Tambah</a>
        <form class="d-flex my-2 my-lg-0">
                <input type="hidden" name="folder" value="categori">
                <input type="hidden" name="file" value="index">
                <input class="form-control me-sm-2" name="cari" value="<?php if(isset($cari)) echo $cari; ?>" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
</nav>

<div class="table-responsive mt-2">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Categori</th>
                <th scope="col">Action</th>
                <!-- <th scope="col">Edit</th>
                <th scope="col">Delete</th> -->
            </tr>
        </thead>
        <tbody>
            <?php 
                extract($_GET);
                $keyword = "";
                if(isset($cari)){
                    $keyword ="WHERE nama_categori LIKE '%$cari%'";
                }
                $dataCategori = allData($table ="categori",$where=$keyword);
                $no = 0;
                foreach ($dataCategori as $value) {
                    $no++;
               
            ?>
            <tr class="">
                <td scope="row"><?= $no ?></td>
                <td><?= $value['nama_categori'] ?></td>
                <td><a href ="index.php?folder=categori&file=update&id_categori=<?=$value['id_categori']?>" class ="btn btn-warning">
                    <i class="bi bi-pencil">
                        <!-- Edit -->

                    </i>
                <!-- </td>
                <td> -->

                </a>
                    <a href ="index.php?folder=categori&file=index&id_categori=<?= $value['id_categori']?>"
                     class="btn btn-danger" 
                         onclick="return confirm('Apakah anda yakin ingin menghapus : <?= $value['nama_categori']?>')">
                            <i class="bi bi-x-circle-fill"></i>
                        <!-- Delete -->
                    </a></td>

            </tr>
            
            <?php 
            extract($_GET);
            if(isset($id_categori)){
                delete($table="categori", $kondisi = "id_categori = '$id_categori'");
                echo "<script>location='index.php?folder=categori&file=index'</script>";
            }
         } ?> 
        </tbody>
    </table>
</div> 
