<?php 

include_once 'dbh.inc.php';
$page=isset($_GET['p'])?$_GET['p']:'';



if(isset($_POST['add']))
{

	$post_id=$_POST['post_get_id'];
	$comment_email=$_POST['comment_email'];
	$comment_author=$_POST['comment_author'];
	$comment=$_POST['comment'];


	$sql="INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES('$post_id','$comment_author','$comment_email','$comment','Approved',now())";
		$res=mysqli_query($conn,$sql);


        $sql="UPDATE posts SET post_comment_count=post_comment_count+1 where post_id='$post_id'";


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

	if(!empty($post_title))
	{
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
	
}

else if ($page=='del')
{	

		$id=$_POST['id'];

		$sql="DELETE FROM comments where comment_id='$id'";
		mysqli_query($conn,$sql);
}



elseif (isset($_POST['gitdatafromid'])) {
	$id=$_POST['id'];

	$sql="SELECT * FROM posts WHERE post_id='$id'";
	 $res=mysqli_query($conn,$sql);
	$retdata=array();
	while ($row=mysqli_fetch_assoc($res)) 
	{
		$retdata[]=$row;
	}

	print_r(json_encode($retdata));
}



elseif (isset($_POST['Approved'])) 
{
	$id=$_POST['id'];
	if(!empty($id))
	{
		$sql="UPDATE comments SET comment_status='Approved' WHERE comment_id=$id";
		mysqli_query($conn,$sql);
		
	}
}


elseif (isset($_POST['Unapproved'])) 
{
	$id=$_POST['id'];
	if(!empty($id))
	{
		$sql="UPDATE comments SET comment_status='Unapproved' WHERE comment_id=$id";
		mysqli_query($conn,$sql);
		
	}
}


 else 
{

 	$data=array();

 	 $sql="SELECT * FROM comments";
                      $res=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($res)) 
                      {	

                      		$data[]=$row;
                      }

                      print_r(json_encode($data));

}
