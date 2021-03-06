<?php include "homepage/header.php" ?>


<div id="wrapper">

<!-- Navigation -->
<?php include "homepage/navigation.php" ?>

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Welcome to admin
<small> Author</small>
</h1>
<div class="col-xs-6">
<?php insert_categories() ?>                   

<form action="" method="post">
<div class="form-group">
<label for="cat_title">Add category</label>
<input type="text" class="form-control" name="cat_title">
</div>
<div class="form-group">
<input class="btn btn-primary" type="submit" name="submit" value=" Add category">
</div>
</form>
<!-- update_ref//// -->
<?php 
if(isset($_GET['edit'])){
if(isset($_SESSION['user_role'])){

  if($_SESSION['user_role'] == 'admin'){
$cat_id = $_GET['edit'];
include "homepage/update_categories.php";
}
}
}

?>


</div>
<div class="col-xs-6">

<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Id</th>
<th>Category</th>
<th>Delete</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
<?php findAllcategories() ?>


<?php deletecategories() ?>
</tbody>
</table>
</div>

</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "homepage/footer.php" ?>