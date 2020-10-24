<?php
session_start();
require '../functions/db_login.php';

if (!isset($_SESSION['penulis'])) {
    header('Location: ../index.php');
    exit;
}

//ambil idpenulis
$email = $_SESSION['penulis'];
$result = mysqli_query($conn, "SELECT * FROM penulis where email = '$email'");
if (mysqli_num_rows($result)){
    $row = mysqli_fetch_assoc($result);
    $id = $row['idpenulis'];
}

include '../template/meta.html';
?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="assets/css/EditProfile.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Page Title -->
<title>Edit Profile</title>
</head>
<?php include '../template/header.html' ?>
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
<?php } ?>

<!-- Isi Dashboard Admin -->
<div class="container mt-5">
    <div class="row">
    <div class="wrapper bg-white mt-sm-5">
        <h4 class="pb-4 border-bottom">Edit Account</h4>
        <div class="d-flex align-items-start py-3 border-bottom"> <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="img" alt="">
            <div class="pl-sm-4 pl-2" id="img-section"> <b>Profile Photo</b>
                <p>file must less than 10mb</p> <button class="btn button border"><b>Upload</b></button>
            </div>
        </div>
        <div class="py-2">
            <div class="row py-2">
                <div class="col-md-6"> <label for="firstname">First Name</label> <input type="text" class="bg-light form-control" placeholder="Muhammad Rizal"> </div>
                <div class="col-md-6 pt-md-0 pt-3"> <label for="lastname">Last Name</label> <input type="text" class="bg-light form-control" placeholder="Rifai"> </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6"> <label for="email">Email Address</label> <input type="text" class="bg-light form-control" placeholder="rizal@students.undip.ac.id"> </div>
                <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">Phone Number</label> <input type="tel" class="bg-light form-control" placeholder="0821-3654-5873"> </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6"> <label for="City">City</label> <input type="text" class="bg-light form-control" placeholder="Semarang"> </div>
                <div class="col-md-6"> <label for="Address">Address</label> <input type="text" class="bg-light form-control" placeholder="jl.blablabal No 19"> </div>
            </div>
            <div class="row">
                <div class="col-md-6"> <label for="password">New Password</label> <input type="password" class="bg-light form-control"> </div>
                <div class="col-md-6"> <label for="confirm_password">Confirm Password</label> <input type="password" class="bg-light form-control" placeholder=""> </di v>
            </div>
            <div class="py-3 pb-4 border-bottom"> <button class="btn btn-primary mr-3">Save Changes</button> <button class="btn border button">Cancel</button> </div>
            <div class="d-sm-flex align-items-center pt-3" id="deactivate">
                <div> <b>Deactivate your account</b>
                    <p>Details about your company account and password</p>
                </div>
                <div class="ml-auto"> <button class="btn danger">Deactivate</button> </div>
            </div>
        </div>
    </div>
    </div>  
</div>
<?php
include_once '../template/footer.html';
?>