<?php
#File       : view_kategori.php
#Deskripsi  : melihat list kategori yang ada di database

session_start();
require_once '../functions/db_login.php';

// Kalo belum login tendang
if (!isset($_SESSION['admin'])) {
	header('Location: ../index.php');
	exit;
}

include_once '../template/meta.html';

?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>View Kategori</title>
</head>
<?php include 'template/header.html' ?>
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
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">Category Data</div>
				<div class="card-body">
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
						if (!$result) {
							die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
						}
						//fetch and display the results
						$i = 1;
						while ($row = $result->fetch_object()) {
							echo '<tr>';
							echo '<td>' . $i . '</td>';
							echo '<td>' . $row->nama . '</td>';
							echo '<td><a class="btn btn-warning btn-sm" href="edit_kategori.php?id=' . $row->idkategori . '">Edit</a>&nbsp;&nbsp;
						<a class="btn btn-danger btn-sm" href="confirm_delete_kategori.php?id=' . $row->idkategori . '">Delete<a/>
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
	</div>
</div>
<!-- Jquery and Popper JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>
</html>