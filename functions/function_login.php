<?php 
session_start();
require_once 'db_login.php';

//Cek apakah tombol login sudah ditekan
if (isset($_POST['login'])) {
    // ambil data email dan password
    $email = $_POST['email'];
    $password = $_POST['password'];

    //simpan dalam query
    $result = mysqli_query($conn, " SELECT * FROM  penulis WHERE email = '$email' ");

    //cek email
    if (mysqli_num_rows($result) === 1) { //jika ada ditabel penulis
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // set sessionnya
            $_SESSION['penulis'] = true;
            // cek remember me (jika dicentang)
            if (isset($_POST['remember'])) {
                //buat cookie
                setcookie('id', $row['idpenulis'], time() + (86400 * 30));
                setcookie('key', hash('sha256', $row['email']), time() + (86400 * 30));
            }
            header('Location: ../index.php');
            exit;
        }
    } else { // cek di tabel admin
        $result = mysqli_query($conn, " SELECT * FROM admin WHERE email = '$email' ");
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if ($password === $row['password']) {
                //set sessionnya
                $_SESSION['admin'] = true;
                // cek remember me (jika dicentang)
                if (isset($_POST['remember'])) {
                    //buat cookie
                    setcookie('id', $row['idadmin'], time() + (86400 * 30));
                    setcookie('key', hash('sha256', $row['email']), time() + (86400 * 30));
                }
                header('Location: ../admin/dashboard.php');
                exit;
            }
        }
    }
    $error = true;
}

?>