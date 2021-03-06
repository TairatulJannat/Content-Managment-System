<?php include "Blogpage/db.php"; ?>
<?php include "Blogpage/header.php"; ?>




    <!-- Navigation -->
    <?php include "Blogpage/navigation.php"; ?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
             <?php 
             if(isset($_GET['p_id'])){
                 $the_post_id = $_GET['p_id'];
                 $the_post_author = $_GET['author'];
             }


             $query = " SELECT * FROM posts WHERE post_user  = '{$the_post_author}' ";
             $posts_query = mysqli_query($connection, $query);
             while ($row =mysqli_fetch_assoc($posts_query)){
                //  echo "<li><a href='#'>{$post_title}</a></li>";
                 $post_title = $row['post_title'];
                 $post_author = $row['post_user'];
                 $post_date = $row['post_date'];
                 $post_image = $row['post_image'];
                 $post_content = $row['post_content'];
                 
                 ?>

                   <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                   </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo  $post_title ?> </a>
                </h2>
                <p class="lead">
                
                  All post by<?php echo $post_author ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
          <?php } ?>

          
                <!-- Blog Comments -->
                <?php
            if(isset($_POST['create_comment'])){
               $the_post_id = $_GET['p_id'];
               $comment_author = $_POST['comment_author'];
               $comment_email = $_POST['comment_email'];
               $comment_content = $_POST['comment_content'];
    if(!empty( $comment_author)&&!empty( $comment_email)&& !empty( $comment_content)){
        
        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
        $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}','unapproved', now())";
            $creat_comment_query = mysqli_query($connection , $query);
            
         $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 "; 
         $query .= "WHERE post_id = $the_post_id ";
         $update_comment_count = mysqli_query($connection,$query);  
        

    }else{

echo "<script>alert('fields cannot be empty')</script>";




    }



            }




                ?>
            

              
              
 

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "Blogpage/sidebar.php"; ?>

        </div>
        <!-- /.row -->      

 <?php include "Blogpage/footer.php"; ?>