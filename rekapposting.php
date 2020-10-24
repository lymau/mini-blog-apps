<!-- File : index.php
    Deskripsi : halaman utama ketika blog pertama kali dibuka! -->

    <?php
session_start();
require_once 'functions/db_login.php';
include_once 'template/meta.html';
?>

<!-- Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<!-- Page Title -->
<title>Mini Blog Apps</title>
</head>
<?php include 'template/header.html' ?>
<!-- Jika sudah login sebagai penulis -->
<?php if (isset($_SESSION['penulis'])) { ?>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
            <a href="author/dashboard.php" class="btn btn-success" role="button"><span class="fas fa-user"></span>Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="btn btn-danger" style="margin-left: .5em" role="button"><span class="fas fa-sign-in-alt"></span>Logout</a>
        </li>
    </ul>
    </div>
    </nav>
    <!-- Jika Belum Login -->
<?php } else { ?>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
            <a href="register.php" class="btn btn-danger" role="button"><span class="fas fa-user-plus"></span>Register</a>
        </li>
        <li class="nav-item">
            <a href="login.php" class="btn btn-warning" style="margin-left: .5em" role="button"><span class="fas fa-sign-in-alt"></span>Login</a>
        </li>
    </ul>
    </div>
    </nav>
<?php } 
    $result = mysqli_query($conn,"SELECT * FROM kategori"); ?>
<br><br>
<div class="container">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Kategori</th>
        <th scope="col">Jumlah Post</th>
        </tr>
    </thead>
    <?php while($kategori = mysqli_fetch_assoc($result)):
        $idkategori = $kategori["idkategori"];
        $jumlah = mysqli_num_rows(mysqli_query($conn,"SELECT idpost FROM post WHERE idkategori=$idkategori"));
        $i = 1;
        ?>
    <tbody>
        <tr>
        <th scope="row"><?=$i?></th>
        <td><?=$kategori["nama"] ?></td>
        <td><?=$jumlah?></td>
        </tr>
    <?php 
        $i++;
        endwhile;
    ?>
    </tbody>
    </tables>
</div>
