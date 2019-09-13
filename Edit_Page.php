<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit/Update Page</title>
<style type="text/css">
.ft {font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, DejaVu Sans, Verdana, sans-serif;
}
.ft {font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial, sans-serif;
}
</style>
</head>
<?php
$db = mysqli_connect("localhost", "root", "", "records"); 


if (isset($_REQUEST['id'])) {
$id=$_REQUEST['id'];

$query = "SELECT * from `data` where id='".$id."'"; 
$result = mysqli_query($db, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

}


$count=1;
?>
<body>
<table width="100%" border="1">
  <tr>
    <td width="26%" align="center"><p align="center" class="ft"><a href="index.php"><strong>Home</strong></a></p></td>
    <td width="32%" align="center"><strong><a href="add_record.php" target="new">Add New Record</a></strong></td>
    <td width="32%" align="center"><span class="ft"><strong><a href="view_records.php">View Active Records</a></strong></span></td>
    <td width="42%" align="center"><span class="ft"><strong><a href="Managing_Page.php">Managing Records (edit/delete)</a></strong></span></td>
  </tr>
</table>
<h1 align="center">
  <input name="id" type="hidden" value="<?php echo $row['id'];?>" /> 
<strong>Edit Your Record: </strong></h1>
<form action="Managing_Page.php" method="post" enctype="multipart/form-data" name="form1" id="form1" accept-charset="UTF-8">
<table width="528" height="307" border="1" align="center">
    <tr>
      <td><div align="right"><strong>First Name</strong></div></td>
      <td><input name="first" type="text" id="first" value="<?php echo $row['First'];?>"></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Last Name</strong></div></td>
      <td><input name="last" type="text" id="last" value="<?php echo $row['Last'];?>"></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Email</strong></div></td>
      <td><input name="email" type="email" id="email" value="<?php echo $row['Email'];?>"></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Profile Image</strong></div></td>
      <td><?php
		echo "<div id='img_div'>";
      	echo "<img src='images/".$row['img_dir']."' style='width:42px;height:42px;border:0;'>";
        echo "</div>";
		?>
        <div>
          <input type="file" name="image2">
        </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Marks</strong></div></td>
      <td><input name="marks" type="number" id="marks" value="<?php echo $row['Marks'];?>"></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Status</strong></div></td>
      <td><?php
			 if ($row['Status']=="1") {
			echo "Active";	 ?>
        <input name="status" type="checkbox" id="status" value="1" checked>
        <?php
				
		} else {
				echo "Not Active"; ?>
        <input name="status" type="checkbox" id="status" value="1" >
        <?php
		}
	?>
        &nbsp;</td>
    </tr>
  </table>
  <h5 align="center">
    <strong>
    <input name="submit" type="submit" id="submit" formaction="Managing_Page.php" formenctype="multipart/form-data" value="Update">
    
    <input type="reset" name="reset" id="reset" value="Reset">
  </strong></h5>
</form>
</body>
</html>