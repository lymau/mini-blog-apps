<?php
//File		: reset_kategori.php
//Deskripsi	: mereset password penulis dan mengupdate data ke database

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

<?php
$id = $_GET['id'];
#asign query
$query = " SELECT * FROM penulis WHERE idpenulis=".$id." ";
#execute query
$result = $conn->query($query);
if (!$result) {
    die ("Could not query the database: <br>".$conn->error."<br>Query: ".$query);
}
//Fetch and display the results
$row = $result->fetch_object();
?>

<div class="container">
	<div class="row justify-content-center">
	<div class="col-md-6">
	<div class="card">
		<div class="card-header">Confirm Reset Password</div>
		<div class="card-body">
			<br>
			<table class="table table-striped">
				<tr>
					<td>ID</td>
					<td>:</td>
					<td><?php echo $id; ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td>:</td>
					<td><?php echo $row->nama; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $row->email; ?></td>
				</tr>
			</table>
			<p>Are you sure want to reset password?</p>
			<a class="btn btn-danger" href="reset.php?id=<?php echo $id; ?>">Yes</a>
			<a class="btn btn-primary" href="view_penulis.php">No</a><br><br>
		</div>
	</div>
	</div>
	</div>
</div>
<?php include('../template/footer.html') ?>












