<?php
session_start();
require 'functions/db_login.php';
include_once 'template/meta.html';

include 'template/meta.html';

?>

<!-- Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<!-- Page Title -->
<title>Cari Artikels</title>
</head>
<?php include 'template/header.html'?>
    <!-- Jika sudah login sebagai penulis -->
    <?php if (isset($_SESSION['penulis']) or isset($_SESSION['admin'])) { ?>
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
    <?php } ?>

    <div class="container">
        <br><br>
        <form action="" method="POST">
            <div class="input-group mb-3">
                <input type="text" name="key" id="key" class="form-control" placeholder="cari..." aria-label="cari..." aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button type="submit" name="go" id="go" class="btn btn-outline-secondary" type="button">Go</button>
                </div>
            </div>
        </form>
        <br>
        <?php
        if (isset($_POST["go"])) {
            $key = $_POST["key"];
            $data = mysqli_query($conn, "SELECT * FROM post WHERE judul LIKE '%$key%'");
            if (mysqli_num_rows($data) == 0){?>
                <p class="text-muted">Artikel tidak dtiemukan</p>
            <?php } ?>  
        <div class="row justify-content-center">
            <?php while ($row = mysqli_fetch_assoc($data)) : ?>
                <div class="col-auto">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row["judul"] ?></h5>
                            <?php $idpenulis = $row["idpenulis"];
                            $penulis = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM penulis WHERE idpenulis=$idpenulis"));
                            $namapenulis = $penulis["nama"] ?>
                            <h6 class="card-subtitle mb-2 text-muted"><small>By <?= $namapenulis ?>, <?= $row["tgl_insert"] ?><br></small></h6>
                            <p class="card-text"><?php echo_length($row["isipost"], 30); ?>.</p>
                            <small><a href="singlepost.php?idpost=<?= $row["idpost"] ?>">Baca selengkapnya...</a></small>
                        </div>
                    </div>
                </div>
            <?php endwhile; }?>

        </div>
    </div>

<?php
    include_once 'template/footer.html';
   ?>