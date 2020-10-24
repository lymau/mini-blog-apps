<?php
#File       : delete_article.php
#Deskripsi  : menghapus artikel berdasarkan id
session_start();
require_once '../functions/db_login.php';
// Jika belum login tendang
if (!isset($_SESSION['penulis'])) {
    header('Location: ../index.php');
    exit;
}


if (isset($_POST['delete'])) {
    $id = $_GET['idpost'];
    #assign query
    $query = " DELETE FROM post WHERE idpost=" . $id . " ";
    #execute query
    $result = $conn->query($query);
    if (!$result) {
        die("Could not query the database: <br>" . $conn->error);
    } else {
        $conn->close();
        header('Location: view_article.php');
    }
}

include_once '../template/meta.html';
?>
<!-- Isi -->
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>Confirm Delete Post</title>
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
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h3 class="h3">Hapus Artikel </h3>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="h5">Apakah Anda yakin menghapus artikel ini?</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="col my-3">
                            <a href="view_article.php" class="btn btn-primary btn-block" role="button">Tidak</a>
                        </div>
                        <div class="col">
                            <button class="btn btn-danger btn-block" type="submit" name="delete">Iya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php
include_once '../template/footer.html';
?>