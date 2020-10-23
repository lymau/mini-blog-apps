<?php
#File       : add_kategori.php
#Deskripsi  : menambahkan kategori baru ke database

require_once '../functions/db_login.php';
include_once '../template/header.html';
include_once '../template/meta.html';

if (isset($_POST["submit"])) {
    $valid = TRUE;
    $nama = test_input($_POST['nama']);
    if ($nama == '') {
        $error_name = "Name is required";
        $valid = FALSE;
    }
	elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }
	
	$alamat = test_input($_POST['alamat']);
    if ($alamat == '') {
        $error_address = "Address is required";
        $valid = FALSE;
    }

    $kota = $_POST['kota'];
    if ($kota == '' || $kota == 'none') {
        $error_city = "City is required";
        $valid = FALSE;
    }
	
	$email = test_input($_POST['email']);
	if($email == ''){
		$error_email = "Email is required";
		$valid = FALSE;
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error_email = "Invalid email format";
		$valid = FALSE;
	}

    if($valid){
        #escape inputs data
        $nama = $conn->real_escape_string($nama);
        $alamat = $conn->real_escape_string($alamat);
        $kota = $conn->real_escape_string($kota);
		$email = test_input($data['email']);
		$no_telp = test_input($data['no_telp']);
		$password = mysqli_real_escape_string($conn, $data['password']);
        #assign a query
        $query = " INSERT INTO penulis (name,address,city) VALUES('".$name."'
        ,'".$address."','".$city."') ";
        #execute query
        $result = $conn->query($query);
        if (!$result) {
            die ("could not query the database: <br>".$conn->error.'<br>Query:'.$query);
        }
		else {
            header('Location: view_kategori2.php');
        }
        #close connection
        $conn->close();
    }
}
?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<br>
<div class="container">
    <div class=card>
        <div class="card-header">Add Author</div>
        <div class="card-body">
            <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="nama">Author's Name</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                    <div class="error"><?php if (isset($error_name)) echo $error_name; ?></div>
                </div>
				<div class="form-group">
                    <label for="alamat">Address</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="5"></textarea>
                    <div class="error"><?php if (isset($error_address)) echo $error_address; ?></div>
                </div>
				<div class="form-group">
                    <label for="kota">City</label>
                    <input type="text" class="form-control" id="kota" name="kota">
                    <div class="error"><?php if (isset($error_city)) echo $error_city; ?></div>
                </div>
				<div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                    <div class="error"><?php if (isset($error_email)) echo $error_email; ?></div>
                </div>
				<div class="form-group">
                    <label for="no_telp">Phone Number</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp">
                    <div class="error"><?php if (isset($error_numphone)) echo $error_numphone; ?></div>
                </div>
				<div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                    <div class="error"><?php if (isset($error_password)) echo $error_password; ?></div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Add</button>
                <a href="view_penulis.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php include('../template/footer.html') ?>