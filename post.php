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

          if(isset($_GET['p_id']))
          {
            $post_get_id=$_GET['p_id'];
          $sql="SELECT * FROM posts WHERE post_id='$post_get_id'";
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

<?php  

          }
        }
          ?>
                   <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              

                <div class="form-group">
                  <label for="comment_author"><strong>Author</strong> </label>
                  <input type="text" id="comment_author" name="comment_author" class="form-control" placeholder="Author">
                </div>


                <div class="form-group">
                  <label for="comment_email"><strong>Email</strong> </label>
                  <input type="text" id="comment_email" name="comment_email" class="form-control" placeholder="Email">
                </div>



                <div class="form-group">
                  <label for="comment"><strong>Email</strong> </label>

                  <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                </div>


                <button id="addcommentid" class="btn btn-primary">Submit</button>


              
            </div>
          </div>

          <!-- Single Comment -->
          <div id="view" >
          
            
          

          </div>



          

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

        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
     
  </script>


    <script>
      
      $("#addcommentid").click(function(){

        var comment_author=$("#comment_author").val();
        var comment_email=$("#comment_email").val();
        var post_get_id=<?php echo $post_get_id?> ; 
        var comment=$("#comment").val();
        
         $.ajax({

          type:"POST",
          url:"admin/includes/comments-server.inc.php",
          data:{
            post_get_id:post_get_id,
            comment_author:comment_author,
            comment_email:comment_email,
            comment:comment,
            "add":''
          },
          success:function(data){
            
            $("#comment_author").val('');
            $("#comment_email").val('');
            $("#comment").val('');
            $("#view").empty();
            commentloadfirst();

          }

         });


         
      });  


      function commentloadfirst()
      {
        var id=<?php echo $post_get_id;?>;

        $.ajax({
          type:"POST",
          url:'includes/comment-cilent.inc.php',
          data:{id:id},
          dataType:"json",
          success:function(data)
          {
              
            for (var i = 0; i <Object.keys(data).length; i++) 
            {
              
                $("#view").append("<div class='media mb-4' ><img class='d-flex mr-3 rounded-circle' src='http://placehold.it/64x64' alt=''><div class='media-body'><h4 class='mt-0'>"+data[i]['comment_author']+"</h4>"+data[i]['comment_content']+". <br><small>"+data[i]['comment_date']+"</small> </div></div><hr>");  
            }

          }
        });
      };
    </script>

<?php 

include_once 'includes/footer.inc.php';
?>