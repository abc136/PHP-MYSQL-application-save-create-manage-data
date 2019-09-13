<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Enter New Record</title>
<style type="text/css">
.ft {	font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, DejaVu Sans, Verdana, sans-serif;
}
.ft {	font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial, sans-serif;
}
</style>
</head>

<body>
<form action="record_sent.php" method="post" enctype="multipart/form-data" name="form1" id="form1" accept-charset="UTF-8">
<table width="100%" border="1">
  <tr>
    <td width="26%" align="center"><p align="center" class="ft"><a href="index.php"><strong>Home</strong></a></p></td>
    <td width="32%" align="center"><span class="ft"><strong><a href="view_records.php">View Active Records</a></strong></span></td>
    <td width="42%" align="center"><span class="ft"><strong><a href="Managing_Page.php">Managing Records (edit/delete)</a></strong></span></td>
  </tr>
</table>
<h1 align="center"><strong>Enter New Record</strong></h1>
<h1 align="center"><strong>
  <?php
if (isset($_POST['submit'])) {
$fisrt1=$_POST['first']; /* echo($fisrt1); */
$last1=$_POST['last'];
$email1=$_POST['email'];
$marks1=$_POST['marks'];
/*$status1=$_POST['status']; */ /*echo($status1); */
 /*
 if($status1.value == "on"){$status1=1; 
 }else{ 
 $status1=0;
 }
 */
 
 if (isset($_POST['status'])) {
	$status1=1; 
    // Checkbox is selected
} else {
	$status1=0;
   // Alternate code
}
 
   	
	
$extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
 
if($extension=='jpeg' || $extension=='png')
{
 $image = $_FILES['image']['name'];
 $target = "images/".basename($image);
 $db = mysqli_connect("localhost", "root", "", "records"); 
 	 $sql = "INSERT INTO `data` (`id`, `First`, `Last`, `Email`, `img_dir`, `Marks`, `Status`) VALUES (NULL, '$fisrt1', '$last1', '$email1', '$image', '$marks1', '$status1')";
  
  mysqli_query($db, $sql) or die(mysqli_error());
	
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		echo("Image uploaded successfully!\n" );
	}else{
		echo("OPS! Failed to upload image!" );
	}
			
if($sql){ echo("Record successfully added to our DATABASE!" ); 
}else{ echo("Failed to upload Record" );  }
}
else
{
echo "Please Enter Again Your Record with Valid Image (JPEG/PNG) ONLY!";
}

	 
}
	
  	
?>
</strong></h1>
<table width="418" height="290" border="0" align="center">
  <tr>
    <td width="152" align="right"><label for="first"><strong>First Name:</strong></label></td>
    <td width="225"><input name="first" type="text" id="first" form="form1"></td>
  </tr>
  <tr>
    <td align="right"><label for="textfield5"><strong>Last Name:</strong></label></td>
    <td><input name="last" type="text" id="last" form="form1"></td>
  </tr>
  <tr>
    <td align="right"><label for="email4"><strong>Email:</strong></label></td>
    <td><input name="email" type="email" id="email" form="form1"></td>
  </tr>
  <tr>
    <td align="right"><strong>Profile Picture:</strong></td>
    <td><div>
      <input type="file" name="image">
    </div></td>
  </tr>
  <tr>
    <td align="right"><strong>Marks:</strong></td>
    <td><input name="marks" type="number" id="marks" form="form1"></td>
  </tr>
  <tr>
    <td align="right"><strong>Status</strong></td>
    <td><input name="status" type="checkbox" id="status" value="1" checked></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input name="submit" type="submit" id="submit" formaction="add_record.php" formenctype="multipart/form-data" value="Submit">
      <input type="reset" name="reset" id="reset" value="Reset"></td>
  </tr>
</table>
</form>
</body>
</html>