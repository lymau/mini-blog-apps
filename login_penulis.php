<?php
session_start();

require 'functions/db_login.php';
include_once 'template/header.html';

//cek cookie 
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil email berdasarkan id
    $result = mysqli_query($conn, "SELECT email FROM penulis WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dengan email
    if ($key === hash('sha256', $row['email'])) {
        $_SESSION['login'] = true;
    }
}

// jika masih dalam session
if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

//Cek apakah tombol login sudah ditekan
if (isset($_POST['login'])) {
    // ambil data email dan password
    $email = $_POST['email'];
    $password = $_POST['password'];

    //simpan dalam query
    $result = mysqli_query($conn, " SELECT * FROM  penulis WHERE email = '$email' ");

    //cek email
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // set sessionnya
            $_SESSION['login'] = true;
            // cek remember me (jika dicentang)
            if (isset($_POST['remember'])) {
                //buat cookie
                setcookie('id', $row['id']);
                setcookie('key', hash('sha256', $row['username']));
            }
            header('Location: index.php');
            exit;
        }
    }
    $error = true;
}

?>
<!-- Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="h1">Form Login</h1>
        </div>
        <div class="row">
            <!-- Form untuk Login -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="">
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Masukkan email">
                            <small id="emailHelp" class="form-text text-muted">Kita tidak akan membagikan email Anda dengan orang lain.</small>
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                        </div>
                        <!-- Remember Me -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Remember Me!
                            </label>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    include_once 'template/footer.html';
    ?>