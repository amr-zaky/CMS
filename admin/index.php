<?php

include_once 'includes/header.inc.php';

?>


  <!-- Navigation-->


<?php

include_once 'includes/navbar.inc.php';

?>



  <div class="content-wrapper">
    <div class="container-fluid">
   
      <!-- Icon Cards-->


        <div class="row">
        <div class="col-12">
            <h1 class="page-header">
              Welcome to Admin
              
              /<small><?php

            if(isset($_SESSION['username']))
            {
             echo $_SESSION['username']; 
            }
              
             ?></small>
              <hr>
            </h1> 

       </div>
       </div>

      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-file fa-lg"></i>
              </div>

              <?php 
               $sql="SELECT * FROM posts WHERE post_status='Active'";
               $res=mysqli_query($conn,$sql);
               $countposts=mysqli_num_rows($res);
                echo "<div class='mr-5'><h2>{$countposts}</h2></div>"; 
              ?>

              <div class='mr-5'><h4>Posts</h4></div>


            </div>
            <a class="card-footer text-white clearfix small z-1" href="posts.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-arrow-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments fa-lg"></i>
              </div>
              <?php 
               $sql="SELECT * FROM comments";
               $res=mysqli_query($conn,$sql);
               $countcomment=mysqli_num_rows($res);
                echo "<div class='mr-5'><h2>{$countcomment}</h2></div>"; 
              ?>
                <div class="mr-5"><h4>Comments</h4></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="comments.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user fa-lg"></i>
              </div>
              <?php 
               $sql="SELECT * FROM users";
               $res=mysqli_query($conn,$sql);
               $countuser=mysqli_num_rows($res);
                echo "<div class='mr-5'><h2>{$countuser}</h2></div>"; 
              ?>

              <div class="mr-5"><h4>Users</h4></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="users.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list fa-lg"></i>
              </div>
              <?php 
               $sql="SELECT * FROM categories";
               $res=mysqli_query($conn,$sql);
               $countcat=mysqli_num_rows($res);
                echo "<div class='mr-5'><h2>{$countcat}</h2></div>"; 
              ?>
              <div class="mr-5"><h4>Category</h4></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="category.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>

          <!-- char area -->

  <?php 
     
     $sql="SELECT * FROM posts WHERE post_status='draft'";
     $res=mysqli_query($conn,$sql);
     $countdraft=mysqli_num_rows($res);

    $sql="SELECT * FROM posts ";
     $res=mysqli_query($conn,$sql);
     $allposts=mysqli_num_rows($res);


     $sql="SELECT * FROM comments WHERE comment_status ='unapproved'";
     $res=mysqli_query($conn,$sql);
     $countunapp=mysqli_num_rows($res);
     
     $sql="SELECT * FROM users WHERE user_role='Subscirber'";
     $res=mysqli_query($conn,$sql);
     $countsub=mysqli_num_rows($res);


  ?>




        </div>
      </div>

        <div class="row">
            
      <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data','Count'],

          <?php 

            $element_text=['All Posts','Active Posts','Draft Posts','Comments','Pending Comments','Users','Subscribers','Categories'];

            $element_count=[$allposts,$countposts,$countdraft,$countcomment,$countunapp,$countuser,$countsub,$countcat];

            for($i = 0; $i <8;$i++) 
            {
            
             echo "['{$element_text[$i]}'".",". "{$element_count[$i]}],"; 
              
            }

          ?>


         
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id="columnchart_material" style="width:98%; height:500px;"></div>
        </div>

    </div>
  </div>



     
<?php

include_once 'includes/footer.inc.php';

?>
