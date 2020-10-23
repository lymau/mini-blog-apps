<?php
session_start();
require '../functions/db_login.php';

if (!isset($_SESSION['penulis'])) {
    header('Location: ../index.php');
    exit;
}
include '../template/meta.html';
?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>Tulis Artikel</title>
</head>
<?php include '../template/header.html' ?>
<!-- Jika sudah login sebagai penulis -->
<?php if (isset($_SESSION['penulis'])) { ?>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
            <a href="dashboard.php" class="btn btn-success" role="button"><span class="fas fa-user"></span>Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="../logout.php" class="btn btn-danger" style="margin-left: .5em" role="button"><span class="fas fa-sign-in-alt"></span>Logout</a>
        </li>
    </ul>
    </div>
    </nav>
<?php } ?>

<!-- Isi Dashboard Admin -->
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="#">Buat Artikel</a>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="#">List Artikel</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-sm-12">
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