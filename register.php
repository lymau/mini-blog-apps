<!-- File : register.php
	Deskripsi : halaman untuk registrasi penulis -->

<?php
require 'functions/db_login.php';

// Cek apakah tombol register sudah ditekan
if (isset($_POST['register'])) {
	if (registrasi($_POST) > 0) {
		echo "<script>
				alert('User baru berhasil ditambahkan');
			</script>";
		header('Location: login.php');
	} else {
		echo mysqli_error($conn);
	}
}
include 'template/meta.html';
?>
<!-- Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<!-- Page Title -->
<title>Daftar Sebagai Penulis</title>
</head>

<body>
	<div class="container">
		<br>
		<p>
			<h2 style="text-align: center; color:#3488d1;">BERGABUNG BERSAMA KAMI DAN JADILAH PENULIS</h2>
		</p>
		<hr>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<header class="card-header">
						<h4 class="card-title mt-2">Sign up</h4>
					</header>
					<article class="card-body">
						<form action="" method="POST">
							<!-- Nama -->
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" maxlength="50" required>
							</div>
							<!-- Email -->
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" maxlength="50" required>
								<small class="form-text text-muted">Kita tidak akan membagikan email Anda dengan orang lain.</small>
							</div>
							<!-- Alamat -->
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<textarea class="form-control" id="alamat" name="alamat" rows="5" required></textarea>
							</div>
							<!-- Kota -->
							<div class="form-group">
								<label for="kota">Kota</label>
								<input class="form-control" type="text" id="kota" name="kota" placeholder="Masukkan kota" maxlength="30" required>
							</div>
							<!-- No telepon -->
							<div class="form-group">
								<label for="no_telp">Nomor Telepon (12 digit)</label>
								<input class="form-control" type="tel" id="no_telp" name="no_telp" placeholder="Ex: 081234567890" maxlength="15" required>
							</div>
							<!-- Password -->
							<div class="form-group">
								<label for="password">Password</label>
								<input class="form-control" type="password" id="password" name="password" placeholder="Masukkan password" required>
							</div>
							<!-- Verifikasi Password -->
							<div class="form-group">
								<label for="password2">Verifikasi Password</label>
								<input class="form-control" type="password" id="password2" name="password2" placeholder="Masukkan password sekali lagi" required>
							</div>
							<!-- Tombol Register -->
							<div class="form-group">
								<button type="submit" name="register" id="register" class="btn btn-primary btn-block">Register</button>
							</div>
						</form>
					</article>
					<!-- card-body end .// -->
					<div class="border-top card-body text-center">Have an account? <a href="login.php">Log In</a></div>
				</div>
				<!-- card.// -->
			</div>
			<!-- col.//-->
		</div>
		<!-- row.//-->
	</div>


	<?php
	include 'template/footer.html';
	?>