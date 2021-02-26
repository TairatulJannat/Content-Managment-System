            <?php
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
                  $the_cat_id= $_GET['delete'];
                  $query = "DELETE FROM categories WHERE cat_id =$the_cat_id";
                  $delete_query= mysqli_query($connection, $query);
                  
              }
         


}

  ?>