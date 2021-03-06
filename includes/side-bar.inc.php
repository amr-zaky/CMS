 <div class="col-md-4">



          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <form action="./search.php" method="POST">
              <div class="card-body">
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name='submit' >Go!</button>
                  </span>
                </div>
              </div>
            </form>
          </div>


          <!-- Log In Widget -->
          <div class="card my-4">
            <h5 class="card-header">Log In</h5>
            <form action="includes/login.inc.php" method="POST">
              
              <div class="card-body">
                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="User Name">
                  
                </div>

                  <div class="input-group">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                  <span class="input-group-btn">
                    <button class="btn btn-danger" type="submit" name='loginsubmit' >Log In</button>
                  </span>
                </div>


              </div>
            </form>
          </div>



          <!-- Categories Widget -->
          <div class="card my-4">


                      <?php
            $sql="SELECT * FROM categories";
            $res=mysqli_query($conn,$sql);

          

            ?>


            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">

                    <?php 

  while ($row = mysqli_fetch_assoc($res))
            {
                $title=$row['cat_title'];
                $id=$row['cat_id'];
                echo "<li> <a class='nav-link' href='category.php?c_id=$id'>{$title}</a> </li>";
            }

                    ?>
                   
                  </ul>

                </div>

              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>
