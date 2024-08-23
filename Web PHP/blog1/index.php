<?php
    session_start();
    require_once 'views/header.php';

    extract($_GET);
    require_once 'fungsi-crud.php';

    //Berikut Halaman Back End//
    if((isset($folder)) && isset($file)){
        //Jika sudah berhasil login//
        if(isset($_SESSION['sesi'])){
            $views_dir = "views/$folder";
        if (is_dir($views_dir)){
            $file_ = "$views_dir/$file.php";
            if(is_file($file_)){
                
                require_once $file_;
            }else{
                require_once 'views/404.php';
            }

        }else{
            require_once 'views/404.php';
        }
        }else{
            //Jika belum login tampilkan form  login//
            require_once 'views/user/login.php';
        }

        
    }

    //Halaman Front End//
    if(isset($front_folder) && isset($file)){
        $views_front = "views/$front_folder";
        if(is_dir($views_front)){
            $file_front = "$views_front/$file.php";
            if(is_file($file_front)){
                require_once $file_front;
            }else{
                require_once 'views/404.php';
            }
        }
    }

    //Halaman Homepages//
    if(isset($folder) == "" && isset($front_folder) == ""){
        require_once 'views/home.php';
    }
    require_once 'views/footer.php';
    ?>