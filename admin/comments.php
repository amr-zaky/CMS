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
              
              /<small>Comments</small>
              <hr>
            </h1> 


              <br>
              <br>

              <table class="table  table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Comments</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>In Response to</th>
                    <th>Date</th>
                    <th>Approve</th>
                    <th>Unapprove</th>
                    <th>Delete</th>
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
    
    function viewcomments() {
      
      $.ajax({
        type:"GET",
        url:"includes/comments-server.inc.php",
        dataType:"json",
        success:function(data){

          for (var i = 0; i <Object.keys(data).length; i++) {
              

              var x=data[i]['comment_post_id'];
            $("#views").append("<tr><td>"+data[i]['comment_id']+"</td><td>"+data[i]['comment_author']+"</td><td>"+data[i]['comment_post_id']+"</td><td>"+data[i]['comment_email']+"</td><td>"+data[i]['comment_status']+"</td><td><a href=../post.php?p_id="+data[i]['comment_post_id']+" >Show the Post</a></td><td>"+data[i]['comment_date']+"</td><td><button class='btn btn-primary' value='"+data[i]['comment_id']+"' id='approveid' onclick='approvecomment("+data[i]['comment_id']+")'>Approve</button></td><td><button class='btn btn-dark' value='"+data[i]['comment_id']+"' id='unapproveid' onclick='unapprovecomment("+data[i]['comment_id']+")'>Unapprove</button></td><td><button class='btn btn-danger' value='"+data[i]['commnet_id']+"' id='deletecommentid' onclick='deletecomment("+data[i]['comment_id']+")'>Delete</button></td></tr>");

            
          }

        }


      })
    }


   

    function deletecomment(id) {
      
      $.ajax({

        type:"POST",
        url:"includes/comments-server.inc.php?p=del",
        data:{id:id},
        success:function(data){
           alert('Data Deleted Successfully');
          $("#views").empty();
          viewcomments();
        }
      });
    }



      function dmyfun(id) {
            
        $.ajax({
        type:"POST",
        url:"includes/comments-server.inc.php",
        dataType:"json",
        data:{id:id,"gitdatafromid":''},
        success:function(data){
          for (var i = 0; i <Object.keys(data).length; i++)
          {


            $("#post_edit_title").val(data[i]['post_title']);
            

            $("#post_edit_category_id").val(data[i]['post_category_id']);
            $("#post_edit_author").val(data[i]['post_author']);
            $("#post_edit_status").val(data[i]['post_status']);

            

            $("#post_edit_tag").val(data[i]['post_tag']);

            $("#post_edit_contant").val(data[i]['post_contant']);

            

          $("#views").empty();
          viewcomments(); 

          }

        }
    });



          $("#check").click(function(){
            editpost(id);
          })
      }

   

    function approvecomment(id)
    {

      $.ajax({
        type:"POST",
        url:"includes/comments-server.inc.php",
        data:{
          id:id, 
          "Approved":''
        },
        success:function(data)
        {
          
          alert("Comment Approved Successfully");
          $("#views").empty();
          viewcomments();
        }
      });
    }


    function unapprovecomment(id)
    {

      $.ajax({
        type:"POST",
        url:"includes/comments-server.inc.php",
        data:{
          id:id, 
          "Unapproved":''
        },
        success:function(data)
        {
          
          alert("Comment Unapproved Successfully");
          $("#views").empty();
          viewcomments();
        }
      });
    }

  </script>
 

  

<?php

include_once 'includes/footer.inc.php';

?>