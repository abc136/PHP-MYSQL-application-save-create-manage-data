<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>edit/delete Records</title>
<style type="text/css">
.ft {font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, DejaVu Sans, Verdana, sans-serif;
}
.ft {font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial, sans-serif;
}
</style>
</head>

<body>
<table width="100%" border="1">
  <tr>
    <td width="26%" align="center"><p align="center" class="ft"><a href="index.php"><strong>Home</strong></a></p></td>
    <td width="32%" align="center"><strong><a href="add_record.php" target="new">Add New Record</a></strong></td>
    <td width="32%" align="center"><span class="ft"><strong><a href="view_records.php">View Active Records</a></strong></span></td>
  </tr>
</table>
<h1 align="center"><strong>Manage Records edit/delete</strong></h1>
<h1 align="center">
  <?php

$db = mysqli_connect("localhost", "root", "", "records"); 


if (isset($_REQUEST['id']) && isset($_REQUEST['task'])) {

$id=$_REQUEST['id'];
$query = "DELETE FROM `data` WHERE id=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error());

}elseif(isset($_POST['submit'])){
$extension = pathinfo($_FILES["image2"]["name"], PATHINFO_EXTENSION);
 
if($extension=='jpeg' || $extension=='png')
{
	$image22 = $_FILES['image2']['name'];
  	$target = "images/".basename($image22);
	
	if (move_uploaded_file($_FILES['image2']['tmp_name'], $target)) {
		echo("Image uploaded successfully!\n" );
	}else{
		echo("OPS! Failed to upload image!" );
	}
	
$id1=$_POST['id'];
$first1=$_POST['first'];
$last1=$_POST['last'];
$email1=$_POST['email'];
$marks1=$_POST['marks'];
 if (isset($_POST['status'])) {
	$status1=1; 
    // Checkbox is selected
} else {
	$status1=0;
   // Alternate code
}
 

	


$update="update `data` set First='".$first1."', Last='".$last1."', Email='".$email1."', img_dir='".$image22."', Marks='".$marks1."', Status='".$status1."' where id='".$id1."'";
mysqli_query($db, $update) or die(mysqli_error());
if($sql){ echo("Record successfully added to our DATABASE!" ); 
}else{ echo("Failed to upload Record" );  }
}
else
{
echo "Please Enter Again Your Record with Valid Image (JPEG/PNG) ONLY!";
}

}

/*			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
				echo("Image uploaded successfully!" );
  			}else{
				echo("OPS! Failed to upload image!" );
  			}*/
			
$result = mysqli_query($db, "SELECT * FROM `data` order by First");
$count=1;

?>
  <br>
</h1>
<table width="100%" border="1" align="center">
  <tr bgcolor="#666666">
    <th width="6%" scope="col">#</th>
    <th width="12%" height="43" scope="col"><h3>First Name</h3></th>
    <th width="11%" scope="col">Last Name</th>
    <th width="14%" scope="col">Email Adress</th>
    <th width="12%" scope="col">Profile Picture</th>
    <th width="10%" scope="col">Marks</th>
    <th width="17%" scope="col">Status</th>
    <th colspan="2" scope="col">Action</th>
  </tr>
  <?php	while ($row = mysqli_fetch_array($result)) {


 ?>
 
  <tr>
    <th scope="col"><?php echo $count;
  ?></th>
    <th height="36" scope="col"><?php echo htmlspecialchars($row['First']); ?>&nbsp;</th>
    <th scope="col"><?php echo htmlspecialchars($row['Last']); ?></th>
    <th scope="col"><?php echo htmlspecialchars($row['Email']); ?>&nbsp;</th>
    <th scope="col"><div>
            <?php
				echo "<div id='img_div'>";
      			echo "<img src='images/".$row['img_dir']."' style='width:42px;height:42px;border:0;'>";
        		echo "</div>";
			?>
    </div></th>
    <th scope="col"><?php echo htmlspecialchars($row['Marks']); ?></th>
    <th scope="col"><?php
			 if ($row['Status']=="1") {
			echo "Active";	 
				
		} else {
				echo "Not Active"; 
		}
	?>      </th>
<th width="9%" scope="col"><a href="Edit_Page.php?id=<?php echo $row["id"]; ?>">Edit</a></th>
<th width="9%" scope="col"><a href="Managing_Page.php?task=delete&id=<?php echo $row["id"]; ?>">Delete</a>&nbsp;</th>
<?php
   $count++;   
    
	}
	?>
  </tr>
</table>
</body>
</html>