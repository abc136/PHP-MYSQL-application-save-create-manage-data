<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View_Active_Records</title>
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
      <td width="42%" align="center"><span class="ft"><strong><a href="Managing_Page.php">Managing Records (edit/delete)</a></strong></span></td>
    </tr>
  </table>
  <h1><strong>All active records (active status):</strong>  </h1>
  <h1>
    <?php
$db = mysqli_connect("localhost", "root", "", "records"); 
$result = mysqli_query($db, "SELECT * FROM `data` WHERE Status='1'");
?>
    <br>
  </h1>
  <table width="100%" border="0" align="center">
    <tr bgcolor="#666666">
      <th height="43" scope="col"><h3>First Name</h3></th>
      <th scope="col">Last Name</th>
      <th scope="col">Email Adress</th>
      <th scope="col">Profile Picture</th>
      <th scope="col">Marks</th>
      <th scope="col">Status</th>
    </tr>
<?php	while ($row = mysqli_fetch_array($result)) {


 ?>
    <tr>
      <th height="36" scope="col"><?php      
		echo "<p>".$row['First']."</p>"; 
		?></th>
      <th scope="col"><?php
		echo "<p>".$row['Last']."</p>";
		?></th>
      <th scope="col"><?php
		echo "<p>".$row['Email']."</p>";
		?></th>
      <th scope="col"><?php
		echo "<div id='img_div'>";
      	echo "<img src='images/".$row['img_dir']."' style='width:42px;height:42px;border:0;'>";
        echo "</div>";
		?></th>
      <th scope="col"><?php
		echo "<p>".$row['Marks']."</p>";
		?></th>
      <th scope="col"><?php
		echo "Active";
    }

  ?></th>
    </tr>
</table>
</body>
</html>