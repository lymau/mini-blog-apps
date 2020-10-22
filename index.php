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
    <h1 class="h1">Cek apakah berhasil</h1>
    <div class="jumbotron jumbotron-fluid">
        <span>Indonesia</span>
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