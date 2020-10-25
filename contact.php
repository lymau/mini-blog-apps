<!-- File : dashboard.php
    Deskripsi : halaman dashboard penulis -->

    <?php
session_start();
require '../functions/db_login.php';

if (!isset($_SESSION['penulis'])) {
    header('Location: ../index.php');
    exit;
}

//ambil idpenulis
$email = $_SESSION['penulis'];
$result = mysqli_query($conn, "SELECT * FROM penulis where email = '$email'");
if (mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    $id = $row['idpenulis'];
}

include '../template/meta.html';
?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Page Title -->
<title>Dashboard Penulis</title>
</head>
<?php include '../template/header.html' ?>
<!-- Jika sudah login sebagai penulis -->
<?php if (isset($_SESSION['penulis'])) { ?>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
            <a href="#" class="btn btn-success" role="button"><span class="fas fa-user"></span>Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="../logout.php" class="btn btn-danger" style="margin-left: .5em" role="button"><span class="fas fa-sign-in-alt"></span>Logout</a>
        </li>
    </ul>
    </div>
    </nav>
<?php } ?>
    <section class="mb-4">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</p>

        <div class="row">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name" class="">Your name</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="email" name="email" class="form-control">
                                <label for="email" class="">Your email</label>
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="text" id="subject" name="subject" class="form-control">
                                <label for="subject" class="">Subject</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                <label for="message">Your message</label>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->

                </form>

                <div class="text-center text-md-left">
                    <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                </div>
                <div class="status"></div>
            </div>
            <!--Grid column-->

        </div>
    </section>
    <?php
        if(isset( $_POST['name']))
            $name = $_POST['name'];
        if(isset( $_POST['email']))
            $email = $_POST['email'];
        if(isset( $_POST['message']))
            $message = $_POST['message'];
        if(isset( $_POST['subject']))
            $subject = $_POST['subject'];
        if ($name === '')
        {
            echo "Name cannot be empty.";
            die();
        }
        if ($email === '')
        {
            echo "Email cannot be empty.";
            die();
        } 
        else 
        {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                echo "Email format invalid.";
            die();
            }
        }
        if ($subject === '')
        {
            echo "Subject cannot be empty.";
            die();
        }
        if ($message === '')
        {
            echo "Message cannot be empty.";
            die();
        }
        $content="From: $name \nEmail: $email \nMessage: $message";
        $recipient = "youremail@here.com";
        $mailheader = "From: $email \r\n";
        mail($recipient, $subject, $content, $mailheader) or die("Error!");
        echo "Email sent!";
?>    
<?php
include_once '../template/footer.html';
?>