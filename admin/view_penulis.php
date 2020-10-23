<?php
#File       : view_penulis.php
#Deskripsi  : melihat list penulis yang ada di database

require_once '../functions/db_login.php';
include_once '../template/header.html';
include_once '../template/meta.html';

?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<br>
<div class="container">
	<div class="card">
		<div class="card-header">Author Data</div>
		<div class="class-body">
		<br>
		<a class="btn btn-primary" href="add_penulis.php">+ Add Author</a><br><br>
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Author</th>
					<th>Address</th>
					<th>City</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Action</th>
				</tr>
			
				<?php
				//execute the query
				$query = "SELECT * FROM penulis ORDER BY idpenulis";
				$result = $conn->query($query);
				if(!$result){
					die("Could not query the database: <br>".$conn->error."<br>Query: ".$query);
				}
				//fetch and display the results
				$i = 1;
				while ($row = $result->fetch_object()){
					echo '<tr>';
					echo '<td>'.$i.'</td>';
					echo '<td>'.$row->nama.'</td>';
					echo '<td>'.$row->alamat.'</td>';
					echo '<td>'.$row->kota.'</td>';
					echo '<td>'.$row->email.'</td>';
					echo '<td>'.$row->no_telp.'</td>';
					echo '<td><a class="btn btn-warning btn-sm" href="edit_penulis.php?id='.$row->idpenulis.'">Edit</a>&nbsp;&nbsp;
						<a class="btn btn-danger btn-sm" href="confirm_delete_penulis.php?id='.$row->idpenulis.'">Delete<a/>
						</td>';
					echo '</tr>';
					$i++;
				}
				echo '</table>';
				echo '<br>';
				echo 'Total Rows = '.$result->num_rows;
				$result->free();
				$conn->close();
			?>
				</table>
				<br>
			</table>
		</div>
	</div>
</div>
<?php include('../template/footer.html') ?>