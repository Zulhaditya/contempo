<?php
session_start();
require_once("config.php");
if (isset($_POST['register'])){
    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: index.php");
}

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $email
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (empty($username)) {
      header("location:index.php?error=Username wajib diisi");
      exit();
    }elseif (empty($password)) {
      header("location:index.php?error=Password wajib diisi");
      exit();
    }
    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: project-user.php");
        }
    }else {
    header("location:index.php?error=Salah username atau password ya!");
    exit();

    }

    
    
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/index.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <title>Login/Register</title>
</head>

<body>
    <div class="title">
        <h1>Contempo</h1>
    </div>
    <div class="slogan">
        <h1>
            tulis lirik <br />
            dan upload <br />
            lagumu sekarang!
        </h1>
        <h3>Kelola Karya Musikmu.</h3>
    </div>

    <button type="button" class="login btn btn-dark" data-toggle="modal" data-target="#loginModal">
        <h1>Masuk</h1>
    </button>

    <button type="button" class="register btn btn-secondary" data-toggle="modal" data-target="#registerModal">
        <h1>Daftar</h1>
    </button>

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-title text-center">
                        <h4>Masuk</h4>
                    </div>
                    <div class="d-flex flex-column text-center">
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username atau email" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password" />
                            </div>
                            <input type="submit" class="btn btn-secondary btn-round" name="login" value="Masuk">
                            </input>
                        </form>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <div class="signup-section">
                        Belum punya akun ? <a href="#a" class="text-info">Daftar</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-title text-center">
                        <h4>Register</h4>
                    </div>
                    <div class="d-flex flex-column text-center">
                        <form action="" method="POST">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Nama Kamu" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" id="username"
                                        placeholder="Username" />
                                </div>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Alamat Email" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password" />
                            </div>
                            <input type="submit" class="btn btn-secondary btn-round" name="register" value="Daftar">
                            </input>
                        </form>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <div class="signup-section">
                        Sudah punya akun ? <a href="#a" class="text-info">Login</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-center text-white">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2021 Copyright
        </div>
        <!-- Copyright -->
    </footer>



    <script src="js/loginRegister.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>