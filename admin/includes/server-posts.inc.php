<?php 

include_once 'dbh.inc.php';
$page=isset($_GET['p'])?$_GET['p']:'';



if($page =='add')
{

	$post_title=$_POST['post_title'];
	$post_category_id=$_POST['post_category_id'];
	$post_author=$_POST['post_author']; 
	$post_status=$_POST['post_status']; 
	
	$post_image=$_POST['post_image']; 

	

	$allex=explode('.', $post_image);
    $ex=strtolower(end($allex));
	$file = basename($post_image,$ex);
	$fallname=$file.$ex;
	$post_tag =$_POST['post_tag'];
	$post_contant=$_POST['post_contant'];
	$post_data=date('y-m-d');
	$post_comment_count=4;
	

	$sql="INSERT INTO posts(post_title , 
 post_category_id ,
 post_author , 
 post_status , 
 post_image , 
 post_tag , 
 post_contant , post_comment_count , post_data ) VALUES('$post_title', 
'$post_category_id',
'$post_author', 
'$post_status', 
'$fallname', 
'$post_tag', 
'$post_contant','$post_comment_count',now())";

  mysqli_query($conn,$sql);


}



else if ($page =='edit')
{	

	$post_id=$_POST['id'];
	$post_title=$_POST['post_title'];
	$post_category_id=$_POST['post_category_id'];
	$post_author=$_POST['post_author']; 
	$post_status=$_POST['post_status']; 	
	$post_image=$_POST['post_image']; 

	

	$allex=explode('.', $post_image);
    $ex=strtolower(end($allex));
	$file = basename($post_image,$ex);
	$fallname=$file.$ex;
	$post_tag =$_POST['post_tag'];
	$post_contant=$_POST['post_contant'];
	$post_data=date('y-m-d');
	$post_comment_count=6;


	$sql="UPDATE posts SET
	 post_title='$post_title' , 
	 post_category_id='$post_category_id',
	 post_author='$post_author', 
	 post_status='$post_status' , 
	 post_image='$fallname' , 
	 post_tag='$post_tag' , 
	 post_contant='$post_contant' , post_comment_count='$post_comment_count' , post_data=now()  

	WHERE post_id='$post_id'";

	mysqli_query($conn,$sql);

	echo "Post Edited Successfly";
	
}

else if ($page=='del')
{	

		$id=$_POST['id'];

		$sql="DELETE FROM posts where post_id='$id'";
		mysqli_query($conn,$sql);
}

 else 
{

 	$data=array();

 	 $sql="SELECT * FROM posts";
                      $res=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($res)) 
                      {

                      		$data[]=$row;
                      }

                      print_r(json_encode($data));

}
