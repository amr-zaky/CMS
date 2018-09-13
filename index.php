<?php
include_once "includes/dbh.inc.php";
include_once "includes/header.inc.php";
?>

    <!-- Navigation -->

    <?php
include_once "includes/nav.inc.php";
?>


    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <?php 

          $sql="SELECT * FROM posts";
          $res=mysqli_query($conn,$sql);
          while ($row =mysqli_fetch_assoc($res)) 
          {
            
            $post_id=$row['post_id'];
            $post_title=$row['post_title'];
            $post_author=$row['post_author'];
            $post_data=$row['post_data'];
            $post_image=$row['post_image'];
            $post_contant=$row['post_contant'];


            ?>


          <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1>
          <hr>
      
      <h2><a href="post.php?p_id=<?php echo $post_id;?>"  ><?php  echo $post_title ?></a></h2>

      <p class="lead">
        by <a href="#"><?php  echo $post_author?></a>
      </p>

      <p><span class="glyphicon glyphicon-time"></span><?php  echo $post_data ?></p>
      <hr>
          <!-- Blog Post -->
          
          <div class="card mb-4">
            <a href="post.php?p_id=<?php echo $post_id;?>">
            <img class="card-img-top" src="images/<?php echo $post_image;?>" alt="Card image cap">
            </a>
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text"><?php  echo $post_contant ?></p>
              <a href="post.php?p_id=<?php echo $post_id;?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>

        </div>

<?php  

          }

          ?>



          

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <?php 
        include_once"includes/side-bar.inc.php";
        ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php 

include_once 'includes/footer.inc.php';
?>