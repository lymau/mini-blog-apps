<?php
#File       : view_penulis.php
#Deskripsi  : melihat list penulis yang ada di database

session_start();
require_once '../functions/db_login.php';
include_once '../template/meta.html';

?>

<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">

</head>
<?php include '../template/header.html' ?>
</nav>
<body>
<br>
<div class="container">
	<div class="card">
		<div class="card-header">Author Data</div>
		<div class="class-body">
		<br>
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
					echo '<td><a class="btn btn-danger btn-sm" href="reset_password.php?id='.$row->idpenulis.'">Reset Password</a>
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
