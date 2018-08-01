<?php 

include_once 'dbh.inc.php';


if(isset($_GET['id']))
{
	$id=$_GET['id'];

	if(! empty($id))
	{
		$sql="DELETE  FROM categories where cat_id='$id'";
        mysqli_query($conn,$sql);

        $sql="SELECT * FROM categories";
                      $res=mysqli_query($conn,$sql);
                      while ($row=mysqli_fetch_assoc($res)) {
                        echo "<tr id='apdated'>";
                        echo"<td>";
                        echo $row['cat_id'];
                        echo "</td>";
                        echo"<th>";
                        echo $row['cat_title'];
                        echo "</th>";
                        echo"<th>";
                        echo"<button class='btn btn-primary' value='{$row['cat_id']}'  id='{row['cat_id']}'>" ;
                        echo "delete";
                        echo "</button>";
                        echo "</tr>";
                      }

	}

}