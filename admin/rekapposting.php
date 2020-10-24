<!-- File : rekapposting.php
    Deskripsi : halaman yang berisi informasi rekap posting dalam setiap kategori -->

<?php
session_start();
require_once '../functions/db_login.php';

// jika belum login as admin tendang
if (!isset($_SESSION['admin'])){
    header("Location: ../index.php");
    exit;
}

include_once '../template/meta.html';
?>

<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>Rekap Posting</title>
</head>
<?php include '../template/header.html' ?>
<!-- Jika sudah login sebagai penulis -->
<?php if (isset($_SESSION['admin'])) { ?>
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
    <!-- Jika Belum Login -->
<?php } ?>

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
    <?php $result = mysqli_query($conn,"SELECT * FROM kategori"); ?>
    <?php $i = 1; while($kategori = mysqli_fetch_assoc($result)):
        $idkategori = $kategori["idkategori"];
        $jumlah = mysqli_num_rows(mysqli_query($conn,"SELECT idpost FROM post WHERE idkategori=$idkategori"));
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
<!-- Jquery and Popper JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>
</html>