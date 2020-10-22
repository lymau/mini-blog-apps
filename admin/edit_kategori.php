<?php
//File		: edit_kategori.php
//Deskripsi	: menampilkan form edit data kategori dan mengupdate data ke database

require_once '../functions/db_login.php';
include_once '../template/header.html';

$id = $_GET['id'];

//mengecek apakah user belum menekan tombol submit
if(!isset($_POST["submit"])){
	$query = " SELECT * FROM kategori WHERE idkategori=".$id." ";
	//execute the query
	$result = $conn->query($query);
	if(!$result){
		die("Could not query the database: <br>".$conn->error);
	}
	else{
		while ($row = $result->fetch_object()){
			$nama = $row->nama;
		}
	}
}
else{
	$valid = TRUE; //flag validasi
	$nama = test_input($_POST['nama']);
	if($nama == ''){
		$error_nama = "Name is required";
		$valid = FALSE;
	}
	elseif(!preg_match("/^[a-zA-Z ]*$/",$nama)){
		$error_nama = "Only letters and white space allowed";
		$valid = FALSE;
	}
	
	//update data into database
	if($valid){
		//escape inputs data
		$address = $conn->real_escape_string($address);
		//asign a query
		$query = " UPDATE kategori SET nama='".$nama."' WHERE idkategori=".$id." ";
		//execute the query
		$result = $conn->query($query);
		if(!$result){
			die ("Could not query the database: <br>".$conn->error. '<br>Query:' .$query);
		}
		else{
			$conn->close();
			header('Location: view_kategori.php');
		}
	}
}

?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<br>
<div class="container">
	<div class="card">
		<div class="card-header">Edit Category</div>
		<div class="card-body">
			<form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>">
				<div class="form-group">
					<label for="nama">Category</label>
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>">
					<div class="error"><?php if (isset($error_name)) echo $error_name;?></div>	
				</div>
				<br>
				<button type="submit" class="btn btn-primary" name="submit" value="submit">Edit</button>
				<a href="view_kategori.php" class="btn btn-secondary">Cancel</a>
			</form>
		</div>
	</div>
</div>
<?php include('../template/footer.html') ?>












