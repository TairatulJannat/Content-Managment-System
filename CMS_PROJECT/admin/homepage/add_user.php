<?php

if(isset($_SESSION['user_role'])){

  if($_SESSION['user_role'] != 'admin'){


   header("Location:./index.php");

  }
  }

?>


<?php
    if(isset($_POST['create_user']))
    {
         // $user_id = $_POST['user_id'];
         $user_firstname= $_POST['user_firstname'];
         $user_lastname= $_POST['user_lastname'];
         $user_role= $_POST['user_role'];
         // $user_image= $row['user_image'];
         $username= $_POST['username'];
         $user_email= $_POST['user_email'];
         $user_password= $_POST['user_password'];
         
         $user_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>10));

 $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
 $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') ";

  $create_user_query = mysqli_query($connection, $query);
  confirmQuery($create_user_query);


    }

?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="title">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>


    
    <div class="form-group">
    <select name="user_role" id="">
           <option value="Subscriber">Select option</option>
            <option value="admin">Admin</option>
            <option value="Subscriber">Subcriber</option>
        
        
        </select>
    </div>
   
    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div> -->
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="user_email">
        
    </div>
     
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="user_password">
        
    </div>




    <div class="form-group">
        <input type="submit" class="btn  btn-primary"  name="create_user" value="Add user">
    </div>
</form>
