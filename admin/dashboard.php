<?php

require '../functions/db_login.php';
include_once '../template/header.html'

?>
<title>Header</title>
</head>
<body>
<!-- Tampilan mulai dari sini -->
<h1 class="h1">Dashboard Admin</h1>
<h2 class="h2">Selamat datang, Admin!</h2>

<!-- Isi Dashboard Admin -->
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="#">Artikel</a>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="#">Atur Kategori</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="#">Atur Penulis</a>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="#">Pengaturan</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once '../template/footer.html';
?>