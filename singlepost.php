<?php
session_start();
require_once 'functions/db_login.php';

// jika masuk tanpa idpost tendang
if (!isset($_GET['idpost'])) {
    header('Location: index.php');
}



if (isset($_SESSION['penulis'])) {
    // ambil data penulis
    $email = $_SESSION['penulis'];
    $query = "SELECT * FROM penulis WHERE email = '$email'";
    $result = $conn->query($query);
    if (!$result) {
        die("Could not query the database: <br>" . $db->error . '<br>Query: ' . $query);
    }
    $row = $result->fetch_object();
    $idpenulis = $row->idpenulis;
    if (isset($_POST['komentar'])) {
        $valid = true;
        $isiKomentar = test_input($_POST['isiKomentar']);
        $idpost = $_GET['idpost'];
        $isiKomentar = $conn->real_escape_string($isiKomentar);
        if (empty($isiKomentar)) {
            echo "<script>alert('Komentar tidak boleh kosong!');</script>";
        } else {
            $query = " INSERT INTO komentar VALUES (NULL, $idpost, $idpenulis, '$isiKomentar', DEFAULT) ";
            $result = $conn->query($query);
            if (!$result) {
                die("Could not query the database: <br>" . $db->error . '<br>Query: ' . $query);
            } else {
                echo "<script>alert('Komentar Anda berhasil ditambahkan');</script>";
            }
        }
    }
}

$idpost = $_GET['idpost'];
$result = mysqli_query($conn, "SELECT * FROM post WHERE idpost = $idpost");
if (mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
}


include_once 'template/meta.html';
?>

<!-- Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<!-- Page Title -->
<title><?=$row['judul']?></title>
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
            while ($row = mysqli_fetch_assoc($comment)) :
                $idpekomen = $row['idpenulis'];
                $penulis = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM penulis WHERE idpenulis=$idpekomen"));
            ?>
                <div class="row">
                    <div class="col">
                        <h7 class="card-text"><?= $penulis["nama"] ?></h7>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p class="card-text"><small><?= $row["isi"] ?></small></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <!-- Form Komentar -->
    <?php
    if (isset($_SESSION['penulis'])) {
        // ambil data penulis
        $email = $_SESSION['penulis'];
        $query = "SELECT * FROM penulis WHERE email = '$email'";
        $result = $conn->query($query);
        if (!$result) {
            die("Could not query the database: <br>" . $db->error . '<br>Query: ' . $query);
        }
        $row = $result->fetch_object();
        $idpenulis = $row->idpenulis;
        $nama = $row->nama;
    }
    ?>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="h5">Tambahkan Komentar</h5>
                </div>
                <div class="card-body">
                    <!-- jika sudah login sebagai penulis maka dapat memberi komentar -->
                    <?php if (isset($_SESSION['penulis'])) : ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="isiKomentar">Komentar</label>
                                <textarea name="isiKomentar" class="form-control" id="isiKomentar" rows="3"></textarea>
                            </div>
                            <button type="submit" name="komentar" class="btn btn-primary">Komentari</button>
                        </form>
                        <!-- jika belum login diarahkan untuk mendaftar sebagai penulis -->
                    <?php else : ?>
                        <h5 class="h5 justify-content-center">Anda harus <a href="login.php">log in</a> terlebih dahulu untuk dapat berkomentar.</h5>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>




</div>

<?php
include_once 'template/footer.html';
?>