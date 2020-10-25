<!-- File : view_article.php
    Deskripsi : file untuk crud artikel -->
<?php
session_start();
require_once '../functions/db_login.php';

// Jika belum login tendang
if (!isset($_SESSION['penulis'])) {
    header('Location: ../index.php');
    exit;
}

//ambil idpenulis
$email = $_SESSION['penulis'];
$result = mysqli_query($conn, "SELECT * FROM penulis WHERE email = '$email'");
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $idpenulis = $row['idpenulis'];
}


include_once 'template/meta.html';
?>
<!-- Isi -->
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>View Article</title>
</head>
<?php include 'template/header.html' ?>
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
<!-- Konten dimulai dari sini -->
<div class="container mt-5">
    <div class="row">
        <h3 class="h3">List Artikel Oleh <?=$row['nama']?> </h3>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mt-5">
                <div class="card-header">
                    <h5 class="h5">List Artikel</h5>
                </div>
                <card class="body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tanggal Publish</th>
                                <th scope="col">Tanggal Update</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Isi table mulai dari sini -->
                            <?php
                            $i = 1;
                            // ambil post by penulis
                            $result = mysqli_query($conn, " SELECT * FROM post JOIN kategori ON kategori.idkategori = post.idkategori WHERE idpenulis = $idpenulis");
                            if (mysqli_num_rows($result)){
                                $row = mysqli_fetch_assoc($result);
                                $idpost = $row['idpost'];
                                $judul = $row['judul'];
                                $namakategori = $row['nama'];
                                $tglInsert = $row['tgl_insert'];
                                $tglUpdate = $row['tgl_update'];
                                if (empty($tglUpdate)){
                                    $tglUpdate = 'Belum pernah diedit';
                                }
                            } else {
                                echo "Belum ada satupun artikel yang ditulis";
                            }
                            
                            ?>
                            <?php while ($i <= mysqli_num_rows($result)) : ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><a href="../singlepost.php?idpost=<?=$idpost?>"><?=$judul?></a></td>
                                    <td><?=$namakategori?></td>
                                    <td><?=$tglInsert?></td>
                                    <td><?=$tglUpdate?></td>
                                    <td>
                                        <a href="edit_article.php?idpost=<?=$idpost?>" style="margin-right: .5em" class="btn btn-primary" role="button">Edit</a>
                                        <a href="delete_article.php?idpost=<?=$idpost?>" class="btn btn-danger" role="button">Delete</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </card>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
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