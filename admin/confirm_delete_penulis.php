<?php
#File       : confirm_delete.php
#Deskripsi  : Konfirmasi sebelum delete customer

require_once '../functions/db_login.php';
include_once '../template/header.html';
include_once '../template/meta.html';

$id = $_GET['id'];
#asign query
$query = " SELECT * FROM kategori WHERE idkategori=".$id." ";
#execute query
$result = $conn->query($query);
if (!$result) {
    die ("Could not query the database: <br>".$conn->error."<br>Query: ".$query);
}
//Fetch and display the results
$row = $result->fetch_object();
?>
<!-- Style CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<br>
<div class="container">
<div class="card">
<div class="card-header">Confirm Delete Category</div>
<div class="card-body">
    <br>
    <table class="table table-striped">
        <tr>
            <td>ID</td>
			<td>:</td>
            <td><?php echo $id; ?></td>
        </tr>
        <tr>
            <td>Category</td>
			<td>:</td>
			<td><?php echo $row->nama; ?></td>
        </tr>
    </table>
    <p>Are you sure want to delete this item?</p>
    <a class="btn btn-danger" href="delete_kategori.php?id=<?php echo $id; ?>">Yes</a>
    <a class="btn btn-primary" href="view_kategori.php">No</a><br><br>
</div>
</div>
</div>
<?php include('../template/footer.html') ?>