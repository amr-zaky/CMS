  

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">CMS Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>

    </button>

    
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
       

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-arrows-v"></i>
            <span class="nav-link-text">Posts</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="posts.php">View Post</a>
            </li>
            <li>
              <a href="cards.php">Add Post</a>
            </li>
          </ul>
        </li>



        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="Category.php">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Categories</span>
          </a>
        </li>



        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="Comments.php">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Comments</span>
          </a>
        </li>




        
        
        
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-arrows-v"></i>
            <span class="nav-link-text">User</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="users.php">View Users</a>
            </li>
            <li>
              <a href="adduser.php">Add User</a>
            </li>
            
            
          </ul>
        </li>



        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="profile.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Profile</span>
          </a>
        </li>


      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item" >
          <a class="nav-link" href="../index.php"> Home Site</a>
        </li>
        

      <li class="dropdown">
        
        <a href="#" class="dropdown-toggle  nav-link" data-toggle="dropdown">
          <i class="fa fa-user"><?php
          if(isset($_SESSION['username'])) 
          echo $_SESSION['username'];

          ?></i>
        <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li>
            <a href="#"><i class="fa fa-fw fa-user"></i>Profile</a>
          </li>
          
          

          <li>
            <a href="includes/logout.inc.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
          </li>

        </ul>
      </li>



        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Profile</a>
        </li>
      </ul>
    </div>
  </nav>
