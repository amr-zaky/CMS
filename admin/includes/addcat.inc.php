<?php 

include_once 'dbh.inc.php';



if(isset($_POST['thename']))
{
	$name=$_POST['thename'];
	if(! empty($name))
	{
		$sql="INSERT INTO categories(cat_title) VALUES('$name')";

						mysqli_query($conn,$sql);
                       	$sql="SELECT * FROM categories where cat_title='$name'";
                        $res=mysqli_query($conn,$sql);
                      while ($row=mysqli_fetch_assoc($res)) 
                      {

                        
                        echo"<td>";
                        echo $row['cat_id'];
                        echo "</td>";
                        echo"<th>";
                        echo $row['cat_title'];
                        echo"<th>";
                        echo"<button class='btn btn-primary' value='{$row['cat_id']}'  id='{row['cat_id']}'>" ;
                        echo "delete";
                        echo "</button>";
                        echo "</th>";
                        
                    }

	}
}


