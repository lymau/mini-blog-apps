<?php
#File       : view_kategori.php
#Deskripsi  : melihat list kategori yang ada di database

require_once '../functions/db_login.php';
include_once '../template/meta.html';


?>
</head>

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
			
				<?php
				//execute the query
				$query = "SELECT * FROM kategori ORDER BY idkategori";
				$result = $conn->query($query);
				if(!$result){
					die("Could not query the database: <br>".$db->error."<br>Query: ".$query);
				}
				//fetch and display the results
				$i = 1;
				while ($row = $result->fetch_object()){
					echo '<tr>';
					echo '<td>'.$i.'</td>';
					echo '<td>'.$row->nama.'</td>';
					echo '<td><a class="btn btn-warning btn-sm" href="edit_kategori.php?id='.$row->idkategori.'">Edit</a>&nbsp;&nbsp;
						<a class="btn btn-danger btn-sm" href="confirm_delete_kategori.php?id='.$row->idkategori.'">Delete<a/>
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