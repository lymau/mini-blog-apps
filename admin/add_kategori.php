<?php
#File       : add_kategori.php
#Deskripsi  : menambahkan kategori baru ke database
session_start();
require_once '../functions/db_login.php';

// Kalo belum login tendang
if (!isset($_SESSION['admin'])){
    header('Location: ../index.php');
    exit;
}

if (isset($_POST["submit"])) {
    $valid = TRUE;
    $nama = test_input($_POST['nama']);
    if ($nama == '') {
        $error_nama = "Name is required";
        $valid = FALSE;
    }
	elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
        $error_nama = "Only letters and white space allowed";
        $valid = FALSE;
    }

    if($valid){
        #escape inputs data
        $name = $conn->real_escape_string($name);
        #assign a query
        $query = " INSERT INTO kategori (nama) VALUES('".$nama."') ";
        #execute query
        $result = $conn->query($query);
        if (!$result) {
            die ("could not query the database: <br>".$conn->error.'<br>Query:'.$query);
        }
		else {
            header('Location: view_kategori.php');
        }
        #close connection
        $conn->close();
    }
}

include_once '../template/meta.html'

?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>Add Kategori</title>
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
	<div class="row justify-content-center">
	<div class="col-md-10">
	<div class=card>
		<div class="card-header">Add Category</div>
		<div class="card-body">
			<form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="form-group">
					<label for="nama">Category</label>
					<input type="text" class="form-control" id="nama" name="nama">
					<div class="error"><?php if (isset($error_name)) echo $error_name;?></div>
				</div>
				<br>
				<button type="submit" class="btn btn-primary" name="submit" value="submit">Add</button>
				<a href="view_kategori.php" class="btn btn-secondary">Cancel</a>
			</form>
		</div>
	</div>
	</div>
	</div>
</div>
<?php include('../template/footer.html') ?>