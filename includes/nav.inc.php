    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">


            <?php
            $sql="SELECT * FROM categories";
            $res=mysqli_query($conn,$sql);

            while ($row = mysqli_fetch_assoc($res))
            {
                $title=$row['cat_title'];
                $id=$row['cat_id'];

                echo "<li><a class='nav-link' href='category.php?c_id=$id'>{$title}</a> </li>";
            }

            ?>

            <li class="nav-item">
              <a class="nav-link" href="admin/">Admin</a>
            </li>

<!--

            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>

-->


          </ul>
        </div>
      </div>
    </nav>

