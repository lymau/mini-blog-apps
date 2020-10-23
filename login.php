<?php
session_start();
require 'functions/db_login.php';

//cek cookie 
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil email berdasarkan id
    $result = mysqli_query($conn, "SELECT email FROM penulis WHERE idpenulis = $id");

    // jika data berhasil diambil dari penulis maka
    if (mysqli_num_rows($result) === 1) {
        // simpan array asosiatif result di dalam variabel row
        $row = mysqli_fetch_assoc($result);
        //cek cookie dengan email
        if ($key === hash('sha256', $row['email'])) {
            $_SESSION['penulis'] = $row['email'];
        }
        // jika masih dalam session
        if (isset($_SESSION['penulis'])) {
            header("Location: index.php");
            exit;
        }
    } else { // jika tidak ada di tabel penulis maka cek di tabel admin
        $result = mysqli_query($conn, " SELECT email FROM admin WHERE idadmin = $id ");
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            //cek cookie dengan email
            if ($key === hash('sha256', $row['email'])) {
                $_SESSION['admin'] = $row['email'];
            }
            // jika masih dalam session
            if (isset($_SESSION['admin'])) {
                header("Location: admin/dashboard.php");
                exit;
            }
        }
    }
}

//Cek apakah tombol login sudah ditekan
if (isset($_POST['login'])) {
    // ambil data email dan password
    $email = $_POST['email'];
    $password = $_POST['password'];

    //simpan dalam query
    $result = mysqli_query($conn, " SELECT * FROM  penulis WHERE email = '$email' ");

    //cek email
    if (mysqli_num_rows($result) === 1) { //jika ada ditabel penulis
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // set sessionnya
            $_SESSION['penulis'] = $row['email'];
            // cek remember me (jika dicentang)
            if (isset($_POST['remember'])) {
                //buat cookie
                setcookie('id', $row['idpenulis'], time() + (86400 * 30));
                setcookie('key', hash('sha256', $row['email']), time() + (86400 * 30));
            }
            header('Location: index.php');
            exit;
        }
    } else { // cek di tabel admin
        $result = mysqli_query($conn, " SELECT * FROM admin WHERE email = '$email' ");
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if ($password === $row['password']) {
                //set sessionnya
                $_SESSION['admin'] = $row['email'];
                // cek remember me (jika dicentang)
                if (isset($_POST['remember'])) {
                    //buat cookie
                    setcookie('id', $row['idadmin'], time() + (86400 * 30));
                    setcookie('key', hash('sha256', $row['email']), time() + (86400 * 30));
                }
                header('Location: admin/dashboard.php');
                exit;
            }
        }
    }
    $error = true;
}

include 'template/meta.html';
?>
<!-- Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <p><br></p>
        </div>
        <div class="row justify-content-center">
            <h1 class="h1">Form Login</h1>
        </div>
        <div class="row">
            <p> </p>
        </div>
        <div class="row justify-content-center">
            <!-- Form untuk Login -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="">
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Masukkan email" required>
                            <small id="emailHelp" class="form-text text-muted">Kita tidak akan membagikan email Anda pada orang lain.</small>
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
                        </div>
                        <!-- Remember Me -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Remember Me!
                            </label>
                        </div>
                        <!-- Button Login -->
                        <br>
                        <div class="form-group">
                            <button type="submit" name="login" id="login" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- Button Register -->
                        <div class="form-group">
                            <a href="register.php" class="btn btn-warning btn-block" role="button">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    include 'template/footer.html';
    ?>