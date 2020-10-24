<?php
//File		: reset_kategori.php
//Deskripsi	: mereset password penulis dan mengupdate data ke database

session_start();
require_once '../functions/db_login.php';

// Kalo belum login tendang
if (!isset($_SESSION['admin'])){
    header('Location: ../index.php');
    exit;
}

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

include_once '../template/meta.html'

?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>Confirm Reset Password</title>
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












