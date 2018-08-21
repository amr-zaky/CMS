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
            <h1 class="page-header">
              Welcome to Admin
              
              /<small>Users</small>
              <hr>
            </h1> 

            <br>
            
              
            <!-- Small modal -->
            

            <div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    
                    <div class="col-12">
                        <br>  
                     <h1 class="page-header">
                                  Edit Admin Data Form
                                  
                                  /<small>Users</small>
                                  <hr>
                      </h1>

                              
                                
                                

                                <div class="form-group">
                                  <label for="user_name">User Name</label>
                                  <input type="text" id="user_name" class="form-control">
                                </div>

                                <div class="form-group">
                                  <label for="user_firstname">First Name</label>
                                  <input type="text" id="user_firstname" class="form-control">
                                </div>

                                <div class="form-group">
                                  <label for="user_lastname">Last Name</label>
                                  <input type="text" id="user_lastname" class="form-control">
                                </div>


                                <div class="form-group">
                                  <label for="user_email">Email</label>
                                  <input type="Email" id="user_email" class="form-control">
                                </div>

                                <div class="form-group">
                                  <label for="user_role"><strong>Role</strong></label>
                                  <select id="user_role">
                                    <option>Admin</option>
                                    <option>Subscriber</option>
                                  </select>

                                </div>

                                <div class="form-group">
                                  <label for="user_password">Password</label>
                                  <input type="Password" id="user_password" class="form-control">
                                </div>


                                <div class="form-group">
                                  <button id="check" class="btn btn-primary">Submit</button>
                                </div>

                              

                        </div>

                </div>
              </div>
            </div>

            

              <br>
              <br>

              <table class="table  table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Admin</th>
                    <th>Subscirber</th>
                    <th>Delete</th>
                    <th>Edit</th>
                  </tr>
                </thead>

                <tbody id="views">
                  
                </tbody>
              </table>

          


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
    
    function viewusers() {
      
      $.ajax({
        type:"GET",
        url:"includes/user-server.inc.php",
        dataType:"json",
        success:function(data){

          for (var i = 0; i <Object.keys(data).length; i++) {
            
            $("#views").append("<tr><td>"+data[i]['user_id']+"</td><td>"+data[i]['user_firstname']+"</td><td>"+data[i]['user_lastname']+"</td><td>"+data[i]['user_email']+"</td><td>"+data[i]['user_role']+"</td> <td><button class='btn btn-primary' value='"+data[i]['user_id']+"'  onclick='makeadmin("+data[i]['user_id']+")'>Admin</button></td><td><button class='btn btn-primary' value='"+data[i]['user_id']+"'  onclick='makesub("+data[i]['user_id']+")'>Subscirber</button></td><td><button class='btn btn-danger' value='"+data[i]['cat_id']+"' id='idclick' onclick='deletuser("+data[i]['user_id']+")'>Delete</button></td><td><button class='btn btn-dark idedit'data-toggle='modal' data-target='.bs-example-modal-lg1' onclick='dmyfun("+data[i]['user_id']+" )' idedit>Edit</button></td></tr>");

            
          }

        }


      })
    }


   

    function makeadmin(id)
    {

      $.ajax({

        type:"POST",
        url:"includes/user-server.inc.php",
        data:{
          id:id,
          "makeadmin":''
        },
        success:function(data)
        {
          alert('User Edited Successfully');
          $("#views").empty();
          viewusers();
        }

      });

    }



    function makesub(id)
    {

      $.ajax({

        type:"POST",
        url:"includes/user-server.inc.php",
        data:{
          id:id,
          "makesub":''
        },
        success:function(data)
        {

          alert('User Edited Successfully');
          $("#views").empty();
          viewusers();
        }

      });

    }

    function deletuser(id) {
      
      $.ajax({

        type:"POST",
        url:"includes/user-server.inc.php",
        data:{
            id:id ,
            "del":''

        },
        success:function(data){
           alert('Data Deleted Successfully');
          $("#views").empty();
          viewusers();
        }
      });
    }



      function dmyfun(id) {
            
        $.ajax({
        type:"POST",
        url:"includes/user-server.inc.php",
        dataType:"json",
        data:{id:id,
          "gitdatafromid":''
        },
        success:function(data){
          for (var i = 0; i <Object.keys(data).length; i++)
          {


            $("#user_name").val(data[i]['user_name']);
            

            $("#user_firstname").val(data[i]['user_firstname']);
            $("#user_lastname").val(data[i]['user_lastname']);
            $("#user_email").val(data[i]['user_email']);
     
          }

        }
    });



          $("#check").click(function(){
            editpost(id);
          })
      }

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
        alert(data);
        alert('Data  Edited Successfully');

          $("#user_name").val('');
            $("#user_firstname").val('');
            $("#user_lastname").val('');
            $("#user_email").val('');
            $("#user_password").val('');
            $("#views").empty();
            viewusers();       
       }

      });
      
    }

  </script>
 

  

<?php

include_once 'includes/footer.inc.php';

?>