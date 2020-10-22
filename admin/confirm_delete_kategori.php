<?php
#File       : confirm_delete.php
#Deskripsi  : Konfirmasi sebelum delete customer

require '../functions/db_login.php';
include_once '../template/header.html'

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
            <td></td>
        </tr>
        <tr>
            <td>Category</td>
			<td>:</td>
			<td></td>
        </tr>
    </table>
    <p>Are you sure want to delete this item?</p>
    <a class="btn btn-danger" href="delete_customer.php?id=<?php echo $id; ?>">Yes</a>
    <a class="btn btn-primary" href="view_kategori.php">No</a><br><br>
</div>
</div>
</div>
<?php include('../template/footer.html') ?>