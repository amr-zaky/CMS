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

         if (isset($_POST['submit'])){

              $tag=$_POST['search'];
              
              $sql="SELECT * from posts where post_tag like '%$tag%'";
              $res=mysqli_query($conn,$sql);

              if(!$res)
              {
                die("Query Faild".mysqli_error($conn));
              }
              
              $count=mysqli_num_rows($res);

              if($count==0)
              {
                echo "<h1>No Result</h1>";
              }
              else 
              {
 while ($row =mysqli_fetch_assoc($res)) 
          {
            
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
      
      <h2><a href="#"><?php  echo $post_title ?></a></h2>

      <p class="lead">
        by <a href="#"><?php  echo $post_author?></a>
      </p>

      <p><span class="glyphicon glyphicon-time"></span><?php  echo $post_data ?></p>
      <hr>
          <!-- Blog Post -->
          
          <div class="card mb-4">
            <img class="card-img-top" src="images/<?php echo $post_image;?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text"><?php  echo $post_contant ?></p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>

        </div>

<?php  

          }
              }

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