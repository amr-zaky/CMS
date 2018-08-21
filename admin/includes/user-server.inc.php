<?php 

include_once 'dbh.inc.php';



if(isset($_POST['submit']))
{

	
	$user_name=$_POST['user_name'];
	$user_firstname=$_POST['user_firstname'];
	$user_lastname=$_POST['user_lastname'];
	$user_email=$_POST['user_email'];
	$user_password=$_POST['user_password'];
	$user_role=$_POST['user_role'];



	$sql="INSERT INTO users (user_name,user_firstname,user_lastname,user_email,user_password,user_role) VALUES('$user_name','$user_firstname','$user_lastname','$user_email','$user_password','$user_role')";
		mysqli_query($conn,$sql);
		header("Location:../users.php");
		exit();	

}


elseif(isset($_POST['makeadmin']))
{
	$id=$_POST['id'];

	$sql="UPDATE users SET user_role='Admin' where user_id='$id'";


        mysqli_query($conn,$sql);


}


elseif(isset($_POST['makesub']))
{
	$id=$_POST['id'];

	$sql="UPDATE users SET user_role='Subscirber' where user_id='$id'";


        mysqli_query($conn,$sql);


}




else if (isset($_POST['edit']))
{	

	$id=$_POST['id'];
	$user_name=$_POST['user_name'];
	$user_firstname=$_POST['user_firstname'];
	$user_lastname=$_POST['user_lastname'];
	$user_email=$_POST['user_email'];
	$user_password=$_POST['user_password'];
	$user_role=$_POST['user_role'];

	$sql="UPDATE users SET
	user_name='$user_name',
	user_firstname='$user_firstname',
	user_lastname='$user_lastname',
	user_email='$user_email',
	user_password='$user_password',
	user_role='$user_role'
	where user_id='$id'
	";

		echo $id;
		echo $user_role;
		echo $user_email;
	mysqli_query($conn,$sql);


	
}

else if (isset($_POST['del']))
{	

		$id=$_POST['id'];

		$sql="DELETE FROM users where user_id='$id'";
		mysqli_query($conn,$sql);
}



elseif (isset($_POST['gitdatafromid'])) {
	$id=$_POST['id'];

	$sql="SELECT * FROM users WHERE user_id='$id'";
	 $res=mysqli_query($conn,$sql);
	$retdata=array();
	while ($row=mysqli_fetch_assoc($res)) 
	{
		$retdata[]=$row;
	}

	print_r(json_encode($retdata));
}





 else 
{

 	$data=array();

 	 $sql="SELECT * FROM users";
                      $res=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($res)) 
                      {	

                      		$data[]=$row;
                      }

                      print_r(json_encode($data));

}
