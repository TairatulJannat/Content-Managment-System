<table class="table table-bordered table-hover"> 
<thead>
<tr>
         <th>Id</th>
         <th>Author</th>
         <th>Comment</th>
         <th>Email</th>
         <th>Status</th>
         <th>In Response to</th>
         <th>Date</th>
         <th>Approve</th>
         <th>Unapprove</th>
         <!-- <th>Edit</th> -->
         <th>Delete</th>
</tr>
</thead>
<tbody>
<?php

$query = " SELECT * FROM comments";
$select_comments = mysqli_query($connection, $query);

while ($row =mysqli_fetch_assoc($select_comments)){
$comment_id = $row['comment_id'];
$comment_post_id= $row['comment_post_id'];
$comment_author= $row['comment_author'];
$comment_content= $row['comment_content'];
$comment_email= $row['comment_email'];
$comment_status= $row['comment_status'];
$comment_date= $row['comment_date'];




?>

         <tr>
         <td><?php echo  $comment_id;  ?></td>
         <td><?php echo  $comment_author;  ?></td>
         <td><?php echo  $comment_content;  ?></td>
        <?php
//         $query = " SELECT * FROM categories WHERE cat_id= {$post_category_id}";
//         $select_categories_id = mysqli_query($connection, $query);
//         `while ($row =mysqli_fetch_assoc($select_categories_id))`{
//                 $cat_id = $row['cat_id'];
//                 $cat_title = $row['cat_title'];
       
         ?>

         <td><?php echo  $comment_email  ?></td>
         <td><?php echo  $comment_status  ?></td>
          <?php
         $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
         $select_post_id = mysqli_query($connection,$query);
         while ($row =mysqli_fetch_assoc($select_post_id)){
                        $post_id = $row['post_id'];
                       $post_title = $row['post_title'];
                       ?>
             <td><?php echo "<a href='../post.php?p_id=$post_id'> $post_title</a>"?></td>

      <?php } ?>

        
         <td><?php echo  $comment_date;  ?></td>
         <td><?php echo "<a href='comments.php?approve=$comment_id'> Approve</a>" ?></td>
         <td><?php echo "<a href='comments.php?unapprove=$comment_id'> Unapprove</a>" ?></td>
        
         <td><?php echo "<a href='comments.php?delete=$comment_id'> Delete</a>" ?></td>
         </tr>
<?php    }   ?>
</tbody>
</table>

<?php 

if(isset($_GET['approve'])){

  $the_comment_id= $_GET['approve'];

  $query= "UPDATE comments SET comment_status ='approved' WHERE comment_id=$the_comment_id ";
  $approve_query = mysqli_query($connection,$query);
  header("location:comments.php");

}
if(isset($_GET['unapprove'])){

  $the_comment_id= $_GET['unapprove'];

  $query= "UPDATE comments SET comment_status ='unapproved' WHERE comment_id=$the_comment_id ";
  $unapprove_query = mysqli_query($connection,$query);
  header("location:comments.php");

}



if(isset($_GET['delete'])){

  $the_comment_id= $_GET['delete'];
  $query= "DELETE FROM comments WHERE comment_id={$the_comment_id}";
  $delete_query = mysqli_query($connection,$query);
  header("location:comments.php");

}




?>




</div>