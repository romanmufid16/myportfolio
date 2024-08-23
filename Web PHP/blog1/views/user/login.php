<div class="row justify-content-center">
    <div class="col-lg-5">
        <h3>
            <center>Login</center>
        </h3>

        <?php
        extract($_POST);
        if (isset($login)) {

            $login = "email = '$email' and password = '$password'";
            $user = oneData($table = "user", $key = $login);
            //jika Berhasil login
            if (is_array($user)) {
                session_start();
                $_SESSION['sesi'] = $user['id_user'];
                $_SESSION['nama'] = $user['nama_user'];
                $_SESSION['level'] = $user['level'];
                echo "<script>location='index.php'</script>";
            } else {
                //jika gagal login
                echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        
                            <strong>Gagal login! </strong> Username atau Password anda Salah!
                        </div>';
            }
        }
        ?>

        <form action="" method="post" class="login-validation" novalidate>
            <div class="mb-3">
                <label for="" class="form-label">Email/Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-check"></i></span>
                    <input type="email" name="email" id="" class="form-control" required>
                    <div class="invalid-feedback">
                        Silahkan Isi Email atau Username
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" name="password" id="" class="form-control" required>
                    <div class="invalid-feedback">
                        Silahkan  Password
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="login">LOGIN</button>
            </div>

        </form>
    </div>
</div>


<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.login-validation')

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