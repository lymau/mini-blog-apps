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

?>