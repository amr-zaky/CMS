

<?php 
	include_once 'dbh.inc.php';
$page=isset($_GET['p'])?$_GET['p']:'';

if($page =='add')
{
	$name=$_POST['nm'];
	if(! empty($name))
{


	$sql="INSERT INTO categories(cat_title) VALUES('$name')";
	mysqli_query($conn,$sql);
}

}

else if ($page =='edit')
{
	$id=$_POST['id'];
	$title=$_POST['title'];

	$sql="UPDATE categories SET cat_title='$title'  
	where cat_id='$id' ";
	mysqli_query($conn,$sql);
	echo $id ."  ".$title;
}

else if ($page=='del')
{
	$id=$_POST['id'];
	$sql="DELETE  FROM categories where cat_id='$id'";
        mysqli_query($conn,$sql);
}

   else {
					
						$data=array();

					  $sql="SELECT * FROM categories";
                      $res=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($res)) 
                      {

                      		$data[]=$row;
                      		

                      	
						

					  }

					  print_r(json_encode($data));
}