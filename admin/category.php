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
            Welcome to admin
            <br>
            <small>Author</small>
            <hr>
          </h1>

     
 

          <div class="col-6">
            <form>
              <div class="form-group">
                <label for="cat_title">Add Category</label>

                <input type="text"  class="form-control name"  id="cat_title">
              </div>

              <div class="form-group">
                <input id="addcat" class="btn btn-danger" type="submit"  name="submit" value="Add Category">
              </div>


              <div class="form-group">
                <label for="edit_val">Edit Category</label>

                <input type="text"  class="form-control name"  id="edit_val">
              </div>


            </form>
          </div>
          
            <div class="col-6">
      
              <table class="table  table-bordered table-hover">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Category Title</th>
                    </tr>
                </thead> 

                <tbody id="here">
                 


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
      $("#addcat").click(function(e){
        e.preventDefault();
        var name=$("#cat_title").val();
            
        $.ajax({
            type:"POST",
            url:"includes/server.inc.php",
            data:{nm:name, "add":""},
            success:function(msg){
              alert("Data Added Successfully");
              $("#here").empty();
              $("#cat_title").val('');
              viewdata();
            }
        });

      });

      

      function  viewdata() {
        $.ajax({
            type:"GET",
            url:"includes/server.inc.php",
            dataType:"json",
            success:function(data){
             for (var i=0;i<Object.keys(data).length;i++) 
             {
                
               $("#here").append("<tr> <td>"+data[i]['cat_id']+"</td> <td>"+data[i]['cat_title']+"</td> <td><button class='btn btn-danger' value='"+data[i]['cat_id']+"' id='idclick' onclick='deleteite("+data[i]['cat_id']+")'>Delete</button></td> <td><button class='btn btn-primary' onclick='editfun("+data[i]['cat_id']+")'>Edit</button></td></tr>");
             }
              }
              
          
        });
      }


      function  deleteite(id) {
        $.ajax({
            type:"POST",
            url:"includes/server.inc.php?p=del",
            data:{id:id},
            success:function(msg){
              alert("Data Deleted Successfully");
              $("#here").empty();
              viewdata();
            }
        });
        
      }

      function  editfun(id) {

        var title=$("#edit_val").val();
        
        
        $.ajax({
            type:"POST",
            url:"includes/server.inc.php?p=edit",
            data:{id:id,title:title},
            success:function(data){
              
              alert("Data Edited Successfully");
              $("#here").empty();
              $("#edit_val").val('');
              viewdata();
            }
        });
      }


    </script>
    
    <?php

include_once 'includes/footer.inc.php';

?>