<?php 


include_once 'dbh.inc.php';
	

	$data=array();

	$id=$_POST['id'];

	$sql="SELECT * FROM comments Where comment_post_id='$id' and comment_status='Approved' ORDER BY comment_id DESC";
	
	$res=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($res)) 
                
        {	

            $data[]=$row;
        }

        print_r(json_encode($data));

