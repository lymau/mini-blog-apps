<?php
include_once 'template/header.html';
?>
<!-- Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<!-- Page Title -->
<title>Daftar</title>
</head>

<body>
	<div class="container">
		<br>
		<p>
			<h2 style="text-align: center; color:#3488d1;">ONE STEP CLOSER TO US</h2>
		</p>
		<hr>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<header class="card-header">
						<a href="" class="float-right btn btn-outline-primary mt-1">Log in</a>
						<h4 class="card-title mt-2">Sign up</h4>
					</header>
					<article class="card-body">
						<form>
							<div class="form-row">
								<div class="col form-group">
									<label>First name </label>
									<input type="text" class="form-control" placeholder="">
								</div>
								<!-- form-group end.// -->
								<div class="col form-group">
									<label>Last name</label>
									<input type="text" class="form-control" placeholder=" ">
								</div>
								<!-- form-group end.// -->
							</div>
							<!-- form-row end.// -->
							<div class="form-group">
								<label>Email address</label>
								<input type="email" class="form-control" placeholder="">
								<small class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
							<!-- form-group end.// -->
							<div class="form-group">
								<label class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gender" value="option1">
									<span class="form-check-label"> Male </span>
								</label>
								<label class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gender" value="option2">
									<span class="form-check-label"> Female</span>
								</label>
							</div>
							<!-- form-group end.// -->
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>City</label>
									<input type="text" class="form-control">
								</div>
								<!-- form-group end.// -->
								<div class="form-group col-md-6">
									<label>Province</label>
									<select id="inputState" class="form-control">
										<option selected=""> Choose...</option>
										<option>jawa Tengah</option>
										<option>Jawa Barat</option>
										<option>Jawa TImur</option>
										<option>Jakarta</option>
										<option>Yogyakarta</option>
									</select>
								</div>
								<!-- form-group end.// -->
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" placeholder="">
							</div>
							<!-- form-row.// -->
							<div class="form-group">
								<label>Create password</label>
								<input class="form-control" type="password">
							</div> <!-- form-group end.// -->
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> Register </button>
							</div>
							<!-- form-group// -->
							<small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
						</form>
					</article>
					<!-- card-body end .// -->
					<div class="border-top card-body text-center">Have an account? <a href="">Log In</a></div>
				</div>
				<!-- card.// -->
			</div>
			<!-- col.//-->
		</div>
		<!-- row.//-->
	</div>


	<?php
	include_once 'template/footer.html';
	?>