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
<form id="formid" action="includes/formserver.inc.php" method="POST" enctype="multi-part/form-data">
                              
                              <div class="form-group">
                                <label for="post_title">Post Tilte</label>
                                <input type="text" name="post_title" class="form-control">
                              </div>

                              <div class="form-group">
                                <label for="post_category_id">Post Category ID</label>
                                
                              </div>


                              <select name="post_category_id">
                                <?php 
                                  $sql="SELECT * from categories";
                                  $res=mysqli_query($conn,$sql);
                                  while ($row = mysqli_fetch_assoc($res)) 
                                  {
                                    echo "<option value='{$row['cat_id']}'>{$row['cat_title']}</option>";
                                  }
                                ?>
                              </select>

                              <div class="form-group">
                                <label for="post_author">Post Author</label>
                                <input type="text" name="post_author" class="form-control">
                              </div>



                              <label for="post_status">Post Status</label>
                                  <br>
                                  <select name="post_status">
                                    <option value="draft">Draft</option>
                                    <option value="Active">Active</option>
                                  </select>




                              <div class="form-group">
                                <label for="post_image">Post Image</label>
                                <input id="file" type="file" name="post_image" class="form-control">
                              </div>


                              <div class="form-group">
                                <label for="post_tag">Post Tag</label>
                                <input type="text" name="post_tag" class="form-control">
                              </div>


                              <div class="form-group">
                                <label for="post_contant">Post Contant</label>
                                <textarea class="form-control" name="post_contant" rows="10" cols="30" ></textarea>
                              </div>

                              <div class="form-group">
                                <button class="btn btn-primary" id="addpostid">Submit</button>
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
<script src="jquery.js"></script> 

<script src="jquery1.form.js">
	
	$("#addpostid").click(function(e){
			e.preventDefault();

		// $("#formid").ajaxForm({
		$.ajaxFile
			beforeSubmit: ShowRequest,
			success: AjaxSS,
			error: AjaxError

		});
		function ShowRequest(form-data,jqForm,option){
			var qs = $.param(form-data);
			alert('before submit : \n\n'+qs);
		}
		function AjaxError(){
			alert("error");
		}
		function AjaxSS(data, Status,e){
			alert('successMethod:',responseText,e)
		}

	// var serializedsata=$("#formid").serialize();
	// 	console.log(serializedsata);
	 	
	// $.ajax({
  //     type:"POST",
  //     url:"includes/formserver.inc.php",
  //     data:serializedsata,
  //     success:function(data)
  //     {
  //     	alert(data);
  //     },
  //    error: function() {
  //       alert('error handling here');
  //   }

  // });

	});





</script>

<?php

include_once 'includes/footer.inc.php';

?>  