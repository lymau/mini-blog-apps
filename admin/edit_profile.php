<!-- File : edit_profile.php
    Deskripsi : halaman untuk mengedit profil penulis -->

    <?php
session_start();
require '../functions/db_login.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
    exit;
}

// jika tombol simpan perubahan ditekan
if (isset($_POST['edit'])){
    $nama = test_input($_POST['nama']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $password2 = test_input($_POST['password']); 


}

//ambil info tentang admin
$email = $_SESSION['admin'];
$result = mysqli_query($conn, "SELECT * FROM admin where email = '$email'");
if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
}

include '../template/meta.html';
?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>Edit Profile Admin</title>
</head>
<?php include 'template/header.html' ?>
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
<?php } ?>

<!-- Isi Dashboard Admin -->
<div class="container mt-5">
    <div class="row">
        <div class="wrapper bg-white mt-sm-5">
            <h4 class="pb-4 border-bottom">Sunting Profile</h4>
            <form action="" method="POST">
                <!-- Nama -->
                <div class="row">
                    <div class="col-md-12"> <label for="nama">Nama Lengkap</label> <input type="text" name="nama" class="bg-light form-control" value="<?= $row['nama'] ?>"> </div>
                </div>
                <!-- Email -->
                <div class="row">
                    <div class="col-md-12"> <label for="email">Email Address</label> <input type="text" name="email" class="bg-light form-control" value="<?= $row['email'] ?>"> </div>
                </div>
                <div class="row">
                    <div class="col-md-6"> <label for="password">New Password</label> <input type="password" id="password" name="password" class="bg-light form-control"> </div>
                    <div class="col-md-6"> <label for="password2">Confirm Password</label> <input type="password" id="password2" name="password2" class="bg-light form-control"> </div>
                </div>
                <div class="py-3 pb-4 border-bottom"> <button type="submit" name="edit" class="btn btn-primary mr-3">Simpan Perubahan</button> <a href="dashboard.php" class="btn btn-warning">Batalkan</a> </div>
            </form>

        </div>
    </div>
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