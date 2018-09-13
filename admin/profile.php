  <?php 

  include_once 'includes/header.inc.php';

  ?>


<?php 

  include_once 'includes/navbar.inc.php';
  ?>



<?php 

  if(isset($_SESSION['username']))
  {
   
   $username=$_SESSION['username']; 
    $sql="SELECT * FROM users WHERE user_name='$username' or user_email='$username'";

      $res=mysqli_query($conn,$sql);

      if($row = mysqli_fetch_assoc($res))
      {
          $id=$row['user_id'];
          $username =$row['user_name'];
          $firstname =$row['user_firstname'];
          $lastname =$row['user_lastname'];
          $role =$row['user_role'];
          $email =$row['user_email'];
          $password=$row['user_password'];

      }

  }
?>


  <div class="content-wrapper">
    <div class="container-fluid">
     
      <div class="row">
        <div class="col-12">
            <h1 class="page-header">
              Welcome to Admin
              
              /<small>
                <?php

            if(isset($_SESSION['username']))
            {
             echo $_SESSION['username']; 
            }
              
             ?>
              </small>
              <hr>
            </h1> 


              <br>
              <br>



                                <div class="form-group">
                                  <label for="user_name">User Name</label>
                                  <input type="text" id="user_name" class="form-control" value="<?php echo $username  ?>">
                                </div>

                                <div class="form-group">
                                  <label for="user_firstname">First Name</label>
                                  <input type="text" id="user_firstname" class="form-control" value="<?php echo $firstname  ?>">
                                </div>
 
                                <div class="form-group">
                                  <label for="user_lastname">Last Name</label>
                                  <input type="text" id="user_lastname" class="form-control" value="<?php echo $lastname  ?>">
                                </div>


                                <div class="form-group">
                                  <label for="user_email">Email</label>
                                  <input type="Email" id="user_email" class="form-control" value="<?php echo $email  ?>">
                                </div>

                                <div class="form-group">
                                  <label for="user_role"><strong>Role</strong></label>
                                  <select id="user_role" value="<?php echo $role  ?>">
                                    <option>Admin</option>
                                    <option>Subscriber</option>
                                  </select>

                                </div>

                                <div class="form-group">
                                  <label for="user_password">Password</label>
                                  <input type="Password" id="user_password" class="form-control" value="<?php echo $password  ?>">
                                </div>


                                <div class="form-group">
                                  <button id="check" onclick="editpost(<?php echo $id;?>)" 
                                   class="btn btn-primary">Update User</button>
                                </div>

        </div>
      </div>
    </div>


      <script>
        

  function editpost(id)
    {
      
                 
      var user_name=$("#user_name").val();
      var user_firstname=$("#user_firstname").val();
      var user_lastname=$("#user_lastname").val();
      var user_email=$("#user_email").val();
      var user_password=$("#user_password").val();
      var user_role=$("#user_role").val();

      $.ajax({
        type:"POST",
      url:"includes/user-server.inc.php",
      data:{    
                id:id,
                  user_name:user_name,
                user_firstname:user_firstname,
                user_lastname:user_lastname,
                user_email:user_email,
                user_password:user_password,
                user_role:user_role,
                "edit":''
      },
      success:function(data){
        alert('Data  Edited Successfully');

                  
       }

      });
      
    }

      </script>


</div>



<?php

include_once 'includes/footer.inc.php';

?>