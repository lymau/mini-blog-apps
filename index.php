<?php
require 'functions/db_login.php';
require 'functions/function_login.php';
include_once 'template/header.html';

// cek apakah sudah login sebagai penulis
if (isset($_SESSION['penulis'])) {
    $logout = '<a href="logout.php" class="btn btn-danger">Log Out</a>';
}
?>
<!-- Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<!-- Page Title -->
<title>Daftar</title>
<title>Index</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid">
            <br>
            <h1 class="text-center" style="color: #1c2b2d);">Selamat Datang!</h1>
            <br>
            <p class="text-center" style="color: #1c2b2d;">Anda dapat mencari banyak referensi dari berbagai penulis disini <br> selain itu, anda juga dapat membagikan tulisan kalian kepada orang orang!</p>  
            <div class="text-center">
                <p><a class="btn btn-outline-dark" href="#" role="button">Sign In</a></p>
                <p><small>tidak punya akun?<a href="#">Sign Up</a>  atau  <a href="#">Masuk sebagai tamu</a></small></p>
            </div>
            <br>
    </div>
    <div class="container">
        <div class="row">
            <?php if (isset($_SESSION['penulis'])) : ?>
                <div class="col">
                    <a href="author/dashboard.php?id=" class="btn btn-primary btn-block">Dashboard</a>
                </div>
                <div class="col">
                    <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    include_once 'template/footer.html';
    ?>