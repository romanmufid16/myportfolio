<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- icon bootstrap -->
    <!--CSS Trix Editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="icon" href="/images/politeknik.ico" type="image/x-icon">
    <title>BLOG</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-warning">
        <div class="container">
            <a class="navbar-brand" href="#">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <?php
                    if (isset($_SESSION['sesi'])) {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Master</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="index.php?folder=categori&file=index">Categori</a>
                                <a class="dropdown-item" href="index.php?folder=user&file=index">User</a>
                                <a class="dropdown-item" href="index.php?folder=jurusan&file=index">Jurusan</a>
                                <a class="dropdown-item" href="index.php?folder=barang&file=index">Barang</a>
                                <a class="dropdown-item" href="index.php?folder=pegawai&file=index">Pegawai</a>
                                <a class="dropdown-item" href="index.php?folder=post&file=index">Post</a>
                                <a class="dropdown-item" href="index.php?folder=pembayaran-2020&file=index">Pembayaran - 2020</a>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <?php
                //Jika sudah Login
                if (isset($_SESSION['sesi'])) {
                ?>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome, <?= $_SESSION['nama']; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?folder=user&file=profile"><i class="bi bi-person-circle"></i> Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="index.php?folder=user&file=logout"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php
                } else {
                ?>
                    <ul class="navbar-nav">
                        <li class="nav-item"> <a href="index.php?front_folder=user&file=login" class="nav-link active"> <i class="bi bi-box-arrow-in-right"></i> Login</a>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>

    <div class="container mt-4">