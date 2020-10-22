<?php

require 'functions/db_login.php';
include_once 'template/header.html'

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
                    <form>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Masukkan email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
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