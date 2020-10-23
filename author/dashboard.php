<?php
require_once '../functions/db_login.php';
require_once '../functions/function_login.php';
include_once '../functions/functions.php';
include_once '../template/meta.html';

if (!isset($_SESSION['penulis'])){
    header('Location: ../index.php');
    exit;
}

?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>Dashboard Penulis</title>
</head>
<body>
<!-- Tampilan mulai dari sini -->
<h1 class="h1">Dashboard Penulis</h1>
<h2 class="h2">Selamat datang, <?= $_SESSION ?> </h2>
<a href="../logout.php" class="btn btn-danger">Logout</a>

<!-- Isi Dashboard Admin -->
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="#">Artikel</a>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="#">Atur Kategori</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="#">Atur Penulis</a>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="#">Pengaturan</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once '../template/footer.html';
?>