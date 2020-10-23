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
<?php include 'template/header.html'?>
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
    <?php 
        $idpost = $_GET["idpost"];
        $post = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM post WHERE idpost=$idpost"));        
    ?>
    <br><br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $post["judul"] ?></h5>
            <?php $idpenulis = $post["idpenulis"];
            $penulis = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM penulis WHERE idpenulis=$idpenulis"));
            $namapenulis = $penulis["nama"] ?>
            <h6 class="card-subtitle mb-2 text-muted"><small>By <?= $namapenulis ?>, <?= $post["tgl_insert"] ?><br></small></h6>
            <p class="card-text"><?php echo $post["isipost"] ?><br><br></p>
            <h6 class="card-text">Komentar<br><br></h6>
            <?php 
                $comment = mysqli_query($conn, "SELECT * FROM komentar WHERE idpost=$idpost");
                while($row = mysqli_fetch_assoc($comment)):
                    $idpenulis = $post["idpenulis"];
                    $penulis = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM penulis WHERE idpenulis=$idpenulis"));
            ?>
                <div class="row">
                    <div class="col">
                        <h7 class="card-text"><?= $penulis["nama"] ?></h7>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col">
                        <p class="card-text"><small><?= $row["isi"] ?></small></p>
                    </div>
                </div>
                 
                <?php endwhile;?>
        </div>
    </div>
</div>

<?php
    include_once 'template/footer.html';
?>