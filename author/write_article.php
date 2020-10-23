<!-- File : write_article.php
    Deskripsi : halaman ketika user menulis post -->
<?php
session_start();
require '../functions/db_login.php';

// jika belum login ditendang
if (!isset($_SESSION['penulis'])) {
    header('Location: ../index.php');
    exit;
}


// Ambil id penulis 
$email = $_SESSION['penulis'];
$result = mysqli_query($conn, "SELECT * FROM penulis WHERE email = '$email'");
$row = mysqli_fetch_assoc($result);
$idpenulis = $row['idpenulis'];


// Kelola input dari CKEditor
if (isset($_POST['publish'])){
    $valid = true;
    $judul = test_input($_POST['judul']);
    $idkategori = test_input($_POST['kategori']);
    $isipost = $_POST['isi'];
    if (empty($judul)){
        $errJudul = 'Judul dibutuhkan!';
        $valid = false;
    } elseif (empty($isipost)){
        $errIsiPost = 'isi tidak boleh kosong';
        $valid = false;
    }

    // Jika valid
    if ($valid){
        // query
        $query = " INSERT INTO post (idpost, judul, idkategori, isipost, file_gambar, tgl_insert, tgl_update, idpenulis) VALUES (NULL, '$judul', $idkategori, '$isipost', NULL, DEFAULT, NULL, $idpenulis)";
        // execute
        $result = $conn->query($query);
        if (!$result){
            die ('Could not query the database: <br>'.$conn->error.'<br>');
        } else {
            header('Location: dashboard.php');
        }
    }
}

include '../template/meta.html';
?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>Dashboard Penulis</title>
<!-- CK EDITOR -->
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
</head>
<?php include '../template/header.html' ?>
<!-- Jika sudah login sebagai penulis -->
<?php if (isset($_SESSION['penulis'])) { ?>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
            <a href="#" class="btn btn-success" role="button"><span class="fas fa-user"></span>Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="../logout.php" class="btn btn-danger" style="margin-left: .5em" role="button"><span class="fas fa-sign-in-alt"></span>Logout</a>
        </li>
    </ul>
    </div>
    </nav>
<?php } ?>

<!-- Tampilan menulis dimulai dari sini -->
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h3 class="h3">Tulis Artikel</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <!-- CKEditor mulai dari sini -->
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" id="kategori" name="kategori" required>
                                <!-- Ambil data kategori -->
                                <?php 
                                $i = 1;
                                $result = mysqli_query($conn, "SELECT * FROM kategori");
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <?php while($i <= mysqli_num_rows($result)): ?>
                                    <option value="<?=$row['idkategori']; ?>"><?=$row['nama'];?></option>
                                    <?php $i++; ?>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Post</label>
                            <textarea class="form-control" id="isi" rows="10" name="isi"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="publish">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Jquery and Popper JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Panggil CKEDITOR -->
<script>
    CKEDITOR.replace('isi', {
        filebrowserUploadUrl: "upload_img.php"
    });
</script>
</body>

</html>