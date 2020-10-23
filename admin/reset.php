<?php
#File       : delete_kategori.php
#Deskripsi  : menghapus kategori berdasarkan id

require_once '../functions/db_login.php';


$id = $_GET['id'];
$password = "12345";
$password = password_hash($password, PASSWORD_DEFAULT);
#assign query
$query = " UPDATE penulis SET password = ".$password." WHERE idpenulis=".$id." ";
#execute query
$result = $conn->query($query);
if (!$result) {
    die ("Could not query the database: <br>".$conn->error);
}else {
    $conn->close();
    header('Location: view_penulis.php');
}



#close db connection
$conn->close();
?>