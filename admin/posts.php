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
              Welcome to Posts
              
              /<small>Author</small>
              <hr>
            </h1> 

            <br>
            
              
                <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add Post</button>

            <!-- Small modal -->
            

            <div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="col-12">
                        <br>  
                     <h1 class="page-header">
                                  Edit Post Data Form
                                  
                                  /<small>Author</small>
                                  <hr>
                      </h1>

                              
                                
                                <div class="form-group">
                                  <label for="post_edit_title">Post Tilte</label>
                                  <input type="text" id="post_edit_title" class="form-control">
                                </div>

                                <div class="form-group">
                                  <label for="post_edit_category_id">Post Category ID</label>
                                  <input type="text" id="post_edit_category_id" class="form-control">
                                </div>

                                <div class="form-group">
                                  <label for="post_edit_author">Post Author</label>
                                  <input type="text" id="post_edit_author" class="form-control">
                                </div>

                                <div class="form-group">
                                  <label for="post_edit_status">Post Status</label>
                                  <input type="text" id="post_edit_status" class="form-control">
                                </div>


                                <div class="form-group">
                                  <label for="post_edit_image">Post Image</label>
                                  <input type="file" id="post_edit_image" class="form-control">
                                </div>


                                <div class="form-group">
                                  <label for="post_edit_tag">Post Tag</label>
                                  <input type="text" id="post_edit_tag" class="form-control">
                                </div>


                                <div class="form-group">
                                  <label for="post_edit_contant">Post Contant</label>
                                  <textarea class="form-control" id="post_edit_contant" rows="10" cols="30" ></textarea>
                                </div>

                                <div class="form-group">
                                  <button id="check" class="btn btn-primary">Submit</button>
                                </div>

                              

                            </div>

                </div>
              </div>
            </div>

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="col-12">
                      <br>  
                   <h1 class="page-header">
                                Add Post Data Form
                                
                                /<small>Author</small>
                                <hr>
                    </h1>

                            <form>
                              
                              <div class="form-group">
                                <label for="post_title">Post Tilte</label>
                                <input type="text" id="post_title" class="form-control">
                              </div>

                              <div class="form-group">
                                <label for="post_category_id">Post Category ID</label>
                                <input type="text" id="post_category_id" class="form-control">
                              </div>

                              <div class="form-group">
                                <label for="post_author">Post Author</label>
                                <input type="text" id="post_author" class="form-control">
                              </div>

                              <div class="form-group">
                                <label for="post_status">Post Status</label>
                                <input type="text" id="post_status" class="form-control">
                              </div>


                              <div class="form-group">
                                <label for="post_image">Post Image</label>
                                <input type="file" id="post_image" class="form-control">
                              </div>


                              <div class="form-group">
                                <label for="post_tag">Post Tag</label>
                                <input type="text" id="post_tag" class="form-control">
                              </div>


                              <div class="form-group">
                                <label for="post_contant">Post Contant</label>
                                <textarea class="form-control" id="post_contant" rows="10" cols="30" ></textarea>
                              </div>

                              <div class="form-group">
                                <button class="btn btn-primary" onclick="addpost()">Submit</button>
                              </div>

                            </form>

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
                    <th>Author</th>
                    <th>Tilte</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Tage</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>Status</th>
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
    
    function viewposts() {
      
      $.ajax({
        type:"GET",
        url:"includes/server-posts.inc.php",
        dataType:"json",
        success:function(data){

          for (var i = 0; i <Object.keys(data).length; i++) {
            
            $("#views").append("<tr><td>"+data[i]['post_id']+"</td><td>"+data[i]['post_author']+"</td><td>"+data[i]['post_title']+"</td><td>"+data[i]['post_category_id']+"</td><td><img  width='100'src='../images/"+data[i]['post_image']+"'></td><td>"+data[i]['post_tag']+"</td><td>"+data[i]['post_comment_count']+"</td><td>"+data[i]['post_data']+"</td><td>"+data[i]['post_status']+"</td><td><button class='btn btn-danger' value='"+data[i]['cat_id']+"' id='idclick' onclick='deletepost("+data[i]['post_id']+")'>Delete</button></td><td><button class='btn btn-dark idedit'data-toggle='modal' data-target='.bs-example-modal-lg1' onclick='dmyfun("+data[i]['post_id']+" )' idedit>Edit</button></td></tr>");

            
          }

        }


      })
    }

    function addpost(){
      var post_title =$("#post_title").val();
      var post_category_id =$("#post_category_id").val();
      var post_author =$("#post_author").val();
      var post_status =$("#post_status").val();
      var post_image =$("#post_image").val();
      var post_tag =$("#post_tag").val();
      var post_contant =$("#post_contant").val();
      
    

      
        $.ajax({
          type:"POST",
          url:"includes/server-posts.inc.php?p=add",
          data:{post_title:post_title, 
                post_category_id:post_category_id,
                post_author:post_author, 
                post_status:post_status,
                post_image:post_image, 
                post_tag:post_tag,
                post_contant:post_contant
               },
          success:function(data){
            alert("Post Added Successfly");
            alert(data);
            $("#views").empty();
            viewposts();
          }      
        });
    }

    function deletepost(id) {
      
      $.ajax({

        type:"POST",
        url:"includes/server-posts.inc.php?p=del",
        data:{id:id},
        success:function(data){
          alert("Post deleted Successfly");
          $("#views").empty();
          viewposts();
        }
      });
    }



      function dmyfun(id) {
          
          $("#check").click(function(){
            editpost(id);
          })
      }

    function editpost(id)
    {
      
                       
      var post_title =$("#post_edit_title").val();
      var post_category_id =$("#post_edit_category_id").val();
      var post_author =$("#post_edit_author").val();
      var post_status =$("#post_edit_status").val();
      var post_image =$("#post_edit_image").val();
      var post_tag =$("#post_edit_tag").val();
      var post_contant =$("#post_edit_contant").val();


      $.ajax({
        type:"POST",
      url:"includes/server-posts.inc.php?p=edit",
      data:{    
                id:id,
                post_title:post_title, 
                post_category_id:post_category_id,
                post_author:post_author, 
                post_status:post_status,
                post_image:post_image, 
                post_tag:post_tag,
                post_contant:post_contant
      },
      success:function(data){
          alert("Post Edited Successfly");
          $("#views").empty();
          viewposts();       
      }

      });
      
    }

  </script>
 

  

<?php

include_once 'includes/footer.inc.php';

?>