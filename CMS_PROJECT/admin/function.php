<?php

function escape ($string){
global $connection;
return mysqli_real_escape_string($connection, trim($string));

}


function users_online() {



    if(isset($_GET['onlineusers'])) {

    global $connection;

    if(!$connection) {

        session_start();

        include("../Blogpage/db.php");

        $session = session_id();
        $time = time();
        $time_out_in_seconds = 30;
        $time_out = $time - $time_out_in_seconds;

        $query = "SELECT * FROM users_online WHERE session = '$session'";
        $send_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($send_query);

            if($count == NULL) {

            mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");


            } else {

            mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");


            }

        $users_online_query =  mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
        echo $count_user = mysqli_num_rows($users_online_query);


    }






    } // get request isset()


}

users_online();

      function confirmQuery($result){
        global $connection;
       if(!$result)
       {
            die("QUERY FAILED ." . mysqli_error($connection));
       }
      }






            function insert_categories(){
                     global $connection;

                  if(isset($_POST['submit']))
                  {
                    if(isset($_SESSION['user_role'])){

                        if($_SESSION['user_role'] == 'admin'){
                          
                   $cat_title = $_POST['cat_title'];
                   if($cat_title == "" || empty($cat_title)){
                    echo "This field should not be empty";
                    

                   }else{
                        $query = "INSERT INTO categories(cat_title)";
                        $query .="VALUE('{$cat_title}') ";
                 $create_category_query = mysqli_query($connection, $query);
                     if(!$create_category_query){
                          die('QUERY FAILED' . mysqli_error($connection)) ;   
    }
        }
    
    }
}
}
}
function findAllcategories(){
         global $connection;


         
$query = " SELECT * FROM categories";
$categories_query = mysqli_query($connection, $query);

while ($row =mysqli_fetch_assoc($categories_query)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];


?>

<tr>
<td><?php echo $cat_id ?></td>
<td><?php echo $cat_title ?></td>
<td><?php echo"<a href='categories.php?delete={$cat_id}'>Delete</a>" ?></td>
<td><?php echo"<a href='categories.php?edit={$cat_id}'>Edit</a>" ?></td>
</tr>
<?php } 

}
function deletecategories(){
         global $connection;
         if(isset($_GET['delete'])){
            if(isset($_SESSION['user_role'])){

                if($_SESSION['user_role'] == 'admin'){
                  $the_cat_id= $_GET['delete'];
                  $query = "DELETE FROM categories WHERE cat_id =$the_cat_id";
                  $delete_query= mysqli_query($connection, $query);
                  
              }
            }
        
         
        }

}

  ?>