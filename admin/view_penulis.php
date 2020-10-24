<?php
#File       : view_penulis.php
#Deskripsi  : melihat list penulis yang ada di database

session_start();
require '../functions/db_login.php';

// Kalo belum login tendang
if (!isset($_SESSION['admin'])) {
	header('Location: ../index.php');
	exit;
}

include_once '../template/meta.html'

?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>View Penulis</title>
</head>
<?php include '../template/header.html' ?>
<!-- Jika sudah login sebagai penulis -->
<?php if (isset($_SESSION['admin'])) { ?>
	<ul class="nav navbar-nav ml-auto">
		<li class="nav-item">
			<a href="dashboard.php" class="btn btn-success" role="button"><span class="fas fa-user"></span>Dashboard</a>
		</li>
		<li class="nav-item">
			<a href="../logout.php" class="btn btn-danger" style="margin-left: .5em" role="button"><span class="fas fa-sign-in-alt"></span>Logout</a>
		</li>
	</ul>
	</div>
	</nav>
<?php } ?>
<div class="container mt-5">
	<div class="card">
		<div class="card-header">Author Data</div>
		<div class="card-body">
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
				if (!$result) {
					die("Could not query the database: <br>" . $conn->error . "<br>Query: " . $query);
				}
				//fetch and display the results
				$i = 1;
				while ($row = $result->fetch_object()) {
					echo '<tr>';
					echo '<td>' . $i . '</td>';
					echo '<td>' . $row->nama . '</td>';
					echo '<td>' . $row->alamat . '</td>';
					echo '<td>' . $row->kota . '</td>';
					echo '<td>' . $row->email . '</td>';
					echo '<td>' . $row->no_telp . '</td>';
					echo '<td><a class="btn btn-danger btn-sm" href="reset_password.php?id=' . $row->idpenulis . '">Reset Password</a>
						</td>';
					echo '</tr>';
					$i++;
				}
				echo '</table>';
				echo '<br>';
				echo 'Total Rows = ' . $result->num_rows;
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