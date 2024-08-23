<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Akademik</title>
</head>

<body>
    <?php $p=$_GET["p"] ?? ''; ?>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Akademik v1.0</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($p=='') echo 'active'; ?>" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($p=='mhs' OR $p=='input_mhs' OR $p=='edit_mhs') 
                        echo 'active'; ?>" href="index.php?p=mhs">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($p=='dosen' OR $p=='input_dosen' OR $p=='edit_dosen') echo 'active'; ?>" href="index.php?p=dosen">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($p=='matkul' OR $p=='input_matkul' OR $p=='edit_matkul') echo 'active'; ?>" href="index.php?p=matkul">Mata Kuliah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <?php 
            if ($p=='') include 'home.php';
            if ($p=='mhs') include 'list_mahasiswa.php';
            if ($p=='edit_mhs') include 'edit.php';
            if ($p=='input_mhs') include 'form_nilai.php';
            if ($p=='dosen') include 'list_dosen.php';
            if ($p=='edit_dosen') include 'edit_dosen.php';
            if ($p=='input_dosen') include 'form_dosen.php';
            if ($p=='matkul') include 'matkul.php';
            if ($p=='input_matkul') include 'form_matkul.php';
            if ($p=='edit_matkul') include 'edit_matkul.php';
        ?>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>