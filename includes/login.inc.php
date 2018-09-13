<?php 

include_once 'dbh.inc.php';
session_start();

if(isset($_POST['loginsubmit']))
{

	$username=mysqli_real_escape_string($conn ,$_POST['username']);   
	$password=mysqli_real_escape_string($conn ,$_POST['password']);   

		if(empty($username)||empty($password))
		{
			header("Location:../index.php");
			exit();
		}


		else 
		{

			$sql="SELECT * FROM users WHERE user_name='$username' or user_email='$username'";

			$res=mysqli_query($conn,$sql);

			if($row = mysqli_fetch_assoc($res))
			{
				if($row['user_password']==$password)
				{	
					$_SESSION['id']=$row['user_id'];
					$_SESSION['username']=$row['user_name'];
					$_SESSION['firstname']=$row['user_firstname'];
					$_SESSION['lastname']=$row['user_lastname'];
					$_SESSION['role']=$row['user_role'];
					$_SESSION['email']=$row['user_email'];
					$_SESSION['password']=$row['user_password'];
					

					header("Location:../admin/category.php");
					exit();
				}

				else 
				{
					header("Location:../index.php?password=wrong");
					exit();
				}
			}


		}


	



}

