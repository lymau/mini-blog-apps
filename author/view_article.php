<?php
#File       : view_article.php
#Deskripsi  : melihat daftar artikel yang pernah dibuat oleh penulis itu sendiri
session_start();
require_once '../functions/db_login.php';

if (!isset($_SESSION['penulis'])) {
    header('Location: ../index.php');
    exit;
}

//tangkap idpenulis
$id = $_GET['id'];

include_once '../template/meta.html';
?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<title>List Article</title>
</head>
<?php include '../template/header.html'; ?>
<?php if (isset($_SESSION['penulis'])) { ?>
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
<section id="tabel">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h5 class="h5">List Article</h5>
                    </div>
                    <div class="class-body">
                        <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Diupdate</th>
                            </tr>

                            <?php
                            //execute the query
                            $query = "SELECT * FROM post WHERE idpenulis = $id";
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
</section>
<?php include('../template/footer.html') ?>