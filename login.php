<?php
require_once 'functions/function_login.php';
include_once 'template/header.html';

//cek cookie 
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil email berdasarkan id
    $result = mysqli_query($conn, "SELECT email FROM penulis WHERE idpenulis = $id");

    // jika data berhasil diambil dari penulis maka
    if (mysqli_num_rows($result) === 1) {
        // simpan array asosiatif result di dalam variabel row
        $row = mysqli_fetch_assoc($result);
        //cek cookie dengan email
        if ($key === hash('sha256', $row['email'])) {
            $_SESSION['penulis'] = true;
        }
        // jika masih dalam session
        if (isset($_SESSION['penulis'])) {
            header("Location: index.php");
            exit;
        }
    } else { // jika tidak ada di tabel penulis maka cek di tabel admin
        $result = mysqli_query($conn, " SELECT email FROM admin WHERE idadmin = $id ");
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            //cek cookie dengan email
            if ($key === hash('sha256', $row['email'])) {
                $_SESSION['admin'] = true;
            }
            // jika masih dalam session
            if (isset($_SESSION['admin'])) {
                header("Location: admin/dashboard.php");
                exit;
            }
        }
    }
}

?>
<!-- Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="h1">Form Login</h1>
        </div>
        <div class="row">
            <!-- Form untuk Login -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="functions/function_login.php">
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Masukkan email">
                            <small id="emailHelp" class="form-text text-muted">Kita tidak akan membagikan email Anda dengan orang lain.</small>
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                        </div>
                        <!-- Remember Me -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Remember Me!
                            </label>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    include_once 'template/footer.html';
    ?>