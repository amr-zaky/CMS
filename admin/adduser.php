  <?php 

  include_once 'includes/header.inc.php';
  ?>


<?php 

  include_once 'includes/navbar.inc.php';
  ?>

   
  
  <div class="content-wrapper">
    <div class="container-fluid">
     
      <div class="row">
        
       

       <div class="col-12">
                        <br>  
                     <h1 class="page-header">
                                 Add
                                  /<small>Users</small>
                                  <hr>
                      </h1>

                              
                                
                                
                        <form action="includes/user-server.inc.php"  method="POST">
                                <div class="form-group">
                                  <label for="user_name">User Name</label>
                                  <input type="text" name="user_name" class="form-control">
                                </div>

                                <div class="form-group">
                                  <label for="user_firstname">First Name</label>
                                  <input type="text" name="user_firstname" class="form-control">
                                </div>

                                <div class="form-group">
                                  <label for="user_lastname">Last Name</label>
                                  <input type="text" name="user_lastname" class="form-control">
                                </div>


                                <div class="form-group">
                                  <label for="user_email">Email</label>
                                  <input type="Email" name="user_email" class="form-control">
                                </div>

                                <div class="form-group">
                                  <label for="user_role"><strong>Role</strong></label>
                                  <select name="user_role">
                                    <option>Admin</option>
                                    <option>Subscriber</option>
                                  </select>

                                </div>

                                <div class="form-group">
                                  <label for="user_password">Password</label>
                                  <input type="Password" name="user_password" class="form-control">
                                </div>


                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                              </form>
                                                    

                        </div> 
      </div>
  </div>
</div>



   
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
     
  </script>


  <script>
  

  
  </script>
 

  

<?php

include_once 'includes/footer.inc.php';

?>