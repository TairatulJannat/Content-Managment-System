<div class="col-md-4">

<div class="well">
    <h4>Blog Search</h4>
    <form action="./search.php" method="post">
    <div class="form-group">
        <input name="search" type="text" class="form-control" placeholder="Search">
    </div>
       <div class="input-group">
         <button class="btn btn-primary" name="submit"  type="submit"> Search
        </button>
        </div>
    </form>
    <!-- /.input-group -->
</div>




<!-- Blog Search Well -->
<div class="well">
    <h4>Login</h4>
    <form action="Blogpage/login.php" method="post">
    <div class="form-group">
        <input name="username" type="text" class="form-control" placeholder="Enter Username">
       </div>
       <div class="input-group">
        <input name="password" type="password" class="form-control" placeholder="Enter Password">
       
        <span class="input-group-btn">
         <button class="btn btn-primary" name="login"  type="submit"> Submit
        </button>
        </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    
    <?php
                $query = " SELECT * FROM categories";
                $categories_query = mysqli_query($connection, $query);
               
                
                
    ?>
<h4>Blog Categories</h4>
<div class="row">
<div class="col-lg-12">
<ul class="list-unstyled">

<?php 

while ($row =mysqli_fetch_assoc($categories_query)){
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];
    echo "<li><a href='category.php?category= $cat_id'>{$cat_title}</a></li>";
}

?>
    
</ul>
</div>
        <!-- /.col-lg-6 -->
       
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- Side Widget Well -->
<?php include "widget.php"; ?>


</div>