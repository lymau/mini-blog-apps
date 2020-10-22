<?php
//File		: edit_kategori.php
//Deskripsi	: menampilkan form edit data kategori dan mengupdate data ke database

require '../functions/db_login.php';
include_once '../template/header.html'

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
					<label for="name">Category</label>
					<input type="text" class="form-control" id="name" name="name" value="">
					<div class="error"><?php if (isset($error_name)) echo $error_name;?></div>	
				</div>
				<br>
				<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
				<a href="view_kategori.php" class="btn btn-secondary">Cancel</a>
			</form>
		</div>
	</div>
</div>
<?php include('../template/footer.html') ?>












