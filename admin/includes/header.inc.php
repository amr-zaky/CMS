<?php 
 
 include_once '../includes/dbh.inc.php';
?>
<?php 
  
  ob_start();

?>
<?php 

session_start();

if(!isset($_SESSION['role']))
{
  header("Location:../index.php");
  exit();
}



?>




<!DOCTYPE html>
<html lang="en">

<head >
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top" onload=" var k1=window.setTimeout('viewdata();',0.5); var k2=window.setTimeout('viewposts();',1); var k3=window.setTimeout('viewcomments()',0.3);var k4=window.setTimeout('viewusers()',0.2);">
