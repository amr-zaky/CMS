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

          if(isset($_GET['c_id']))
          {
            $post_get_id=$_GET['c_id'];
          $sql="SELECT * FROM posts WHERE post_category_id='$post_get_id'";
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

                <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

          <!-- Comment with nested comments -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

            </div>
          </div>



<?php  

          }
        }
          ?>
           

          

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">

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