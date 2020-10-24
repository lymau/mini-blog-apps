<!-- File : edit_profile.php
    Deskripsi : halaman untuk mengedit profil penulis -->

<?php
session_start();
require '../functions/db_login.php';

if (!isset($_SESSION['penulis'])) {
    header('Location: ../index.php');
    exit;
}

// jika tombol simpan perubahan ditekan maka
if (isset($_POST['edit'])) {
    $valid = true;
    $nama = test_input($_POST['nama']);
    $email = test_input($_POST['email']);
    $no_telp = test_input($_POST['no_telp']);
    $kota = test_input($_POST['kota']);
    $alamat = test_input($_POST['alamat']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    // cek apakah no_telp sesuai dengan format
    if (!validate_phone($no_telp)) {
        echo "Nomor telepon tidak valid";
        $valid = false;
    }

    // Cek email apakah merupakan valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format!";
        echo "<script>
                    alert('Email tidak valid, silakan ulangi!');
                </script>";
        $valid = false;
    }

    // cek apakah email sudah ada atau belum
    $result = mysqli_query($conn, " SELECT email FROM penulis WHERE email = '$email' ");
    if (mysqli_fetch_assoc($result)) { //jika ada
        echo "<script>
                    alert('Email sudah ada');
                </script>";
        $valid = false;
    }

    // Cek password apakah sama dengan password verfikasi atau tidak
    if ($password !== $password2) {
        echo "<script>
                    alert('Konfirmasi password tidak sama!');
                </script>";
        $valid = false;
    }

    if ($valid) {
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan user baru ke database
        mysqli_query($conn, " INSERT INTO penulis VALUES ('', '$nama', '$password', '$alamat' ,'$kota', '$email', '$no_telp') ");
    } else {
        echo "Gagal mengubah profile!";
    }
}

//ambil idpenulis
$email = $_SESSION['penulis'];
$result = mysqli_query($conn, "SELECT * FROM penulis where email = '$email'");
if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['idpenulis'];
}

include '../template/meta.html';
?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>Edit Profile</title>
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
                    <div class="col-md-6"> <label for="email">Email Address</label> <input type="text" name="email" class="bg-light form-control" value="<?= $row['email'] ?>"> </div>
                    <div class="col-md-6 pt-md-0 pt-3"> <label for="no_telp">Phone Number</label> <input type="tel" name="no_telp" class="bg-light form-control" value="<?= $row['no_telp'] ?>"></div>
                </div>
                <div class="row">
                    <div class="col-md-6"> <label for="kota">Kota</label> <input type="text" name="kota" class="bg-light form-control" value="<?= $row['kota'] ?>"> </div>
                    <div class="col-md-6"> <label for="alamat">Address</label> <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $row['alamat'] ?></textarea> </div>
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
<?php
include_once '../template/footer.html';
?>