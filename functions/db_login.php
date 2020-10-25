<?php

// Define a variable
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_blog";

// Create a connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check a connection
if (!$conn) {
    die("Connection failed!" . mysqli_connect_error());
}
// echo "Connection was established successfully";

// Test data
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// fungsi untuk validasi no telp
function validate_phone($no_telp){
    return preg_match('/^[0-9]{12}+$/', $no_telp);
}

// Fungsi untuk registrasi
function registrasi($data){
    global $conn;

    // ambil data yang dikirimkan dari method post
    $nama = test_input($data['nama']);
    $alamat = test_input($data['alamat']);
    $kota = test_input($data['kota']);
    $no_telp = test_input($data['no_telp']);
    $email = test_input($data['email']);
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek apakah no_telp sesuai dengan format
    if (!validate_phone($no_telp)) {
        echo "Nomor telepon tidak valid";
        return false;
    }

    // Cek email apakah merupakan valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format!";
        echo "<script>
                alert('Email tidak valid, silakan ulangi!');
            </script>";
        return false;
    }

    // cek apakah email sudah ada atau belum
    $result = mysqli_query($conn, " SELECT email FROM penulis WHERE email = '$email' ");
    if (mysqli_fetch_assoc($result)) { //jika ada
        echo "<script>
                alert('Email sudah ada');
            </script>";
        return false;
    }

    // Cek password apakah sama dengan password verfikasi atau tidak
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sama!');
            </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, " INSERT INTO penulis VALUES ('', '$nama', '$password', '$alamat' ,'$kota', '$email', '$no_telp') ");

    return mysqli_affected_rows($conn);
}

function echo_length($x, $length){
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '...';
        echo $y;
    }
}

function search($key){
    global $conn;
    return mysqli_query($conn, "SELECT * FROM post WHERE judul LIKE '%$key%'");
}
