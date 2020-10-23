<?php
require 'functions/db_login.php';
require 'functions/function_login.php';
include_once 'functions/functions.php';
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
            <h1 class="text-center" style="color: #1c2b2d);">Selamat Datang!</h1>
            <br>
            <p class="text-center" style="color: #1c2b2d;">Anda dapat mencari banyak referensi dari berbagai penulis disini <br> selain itu,anda juga dapat membagikan tulisan kalian kepada orang orang!</p>  
            <?php if (!isset($_SESSION['penulis'])) { ?>
            <div class="text-center">
                <p><a class="btn btn-outline-dark" href="login.php" role="button">Sign In</a></p>
                <p><small>tidak punya akun?<a href="register.php">Sign Up</a>  atau  <a href="#">Masuk sebagai tamu</a></small></p>
            </div>
            <?php } ?>
    </div>
    <div class="container">
        <div class="row">
            <?php if (isset($_SESSION['penulis'])) { ?>
                <div class="col">
                    <a href="author/dashboard.php?id=" class="btn btn-primary btn-block">Dashboard</a>
                </div>
                <div class="col">
                    <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
                </div>
            <?php } ?>
        </div>
        <div class="row"><p><br></p></div>
        <div class="row">
            <div class="col">
                <h2 class="text-center">Beberapa unggahan penulis</h2>    
            </div>        
        </div>
        <div class="row"><p><br></p></div>
        <?php 
            $result = mysqli_query($conn, "SELECT * FROM post"); 
            $dataperhalaman = 3;
            $data = mysqli_num_rows($result); 
            $halaman = ceil($data / $dataperhalaman);
            if(isset($_GET["halaman"])){
                $aktif = $_GET["halaman"];
            }
            else{
                $aktif = 1; 
            }
            $awaldata = ($dataperhalaman * $aktif) - $dataperhalaman;
            $post = mysqli_query($conn, "SELECT * FROM mahasiswac LIMIT $awaldata, $dataperhalaman");
        ?>
        <div class="row">
            <?php while( $row = mysqli_fetch_assoc($result) ):?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row["judul"] ?></h5>
                        <?php $idpenulis = $row["idpenulis"];
                        $penulis = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM penulis WHERE idpenulis=$idpenulis"));
                        $namapenulis = $penulis["nama"] ?>
                        <h6 class="card-subtitle mb-2 text-muted"><small>By <?= $namapenulis ?>, <?= $row["tgl_insert"]?><br></small></h6>
                        <p class="card-text"><?php echo_length($row["isipost"], 30);?>.</p>
                        <small><a href="#" >Baca selengkapnya...</a></small>
                    </div>
                </div>
            </div>
            <?php endwhile;?>            
        </div>
        <div class="row"><p> </p></div>
        <div class="row">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php for( $i = 1; $i <= $halaman; $i++ ): 
                                if($i == $aktif):?>
                                    <li class="page-item active"><a class="page-link" href="?halaman=<?php echo $i ?> "><?php echo $i; ?></a></li>
                                <?php else: ?> 
                                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i ?> "><?php echo $i; ?></a></li>                           
                                <?php endif; 
                              endfor; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <?php
    include_once 'template/footer.html';
    ?>