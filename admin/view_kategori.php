<?php
#File       : view_kategori.php
#Deskripsi  : melihat list kategori yang ada di database

require '../functions/db_login.php';
include_once '../template/header.html'

?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<br>
<div class="container">
	<div class="card">
		<div class="card-header">Category Data</div>
		<div class="class-body">
		<br>
		<a class="btn btn-primary" href="add_kategori.php">+ Add Category</a><br><br>
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Category</th>
					<th>Action</th>
				</tr>
			
					<tr>
						<td></td>
						<td></td>
						<td><a class="btn btn-warning btn-sm" href="edit_kategori.php">Edit</a>
							<a class="btn btn-danger btn-sm" href="confirm_delete_kategori.php?id">Delete<a/>
						</td>
					</tr>
				</table>
				<br>
			</table>
		</div>
	</div>
</div>
<?php include('../template/footer.html') ?>