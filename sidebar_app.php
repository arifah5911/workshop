<?php
session_start();
require_once('connection.php');



	$empid=$_SESSION["appid"];
	//$resultRead = mysqli_query($connection, "SELECT * FROM site INNER JOIN project ON site.WoNo=project.WoNo AND site.id='$ID'"); 
	$resultRead = mysqli_query($connection, "SELECT * FROM applicant WHERE app_empid= '$empid' ");
	$row = mysqli_fetch_assoc($resultRead);
?>

<html>
<head>
<link rel="stylesheet" href="../workshop1/css/c.css" type="text/css">
</head>
<body>
	
	<div class="sidenav">
 <?php /*?> <c> <img src="applicant_picture/<?php $row['app_picture']; ?>">  </c>	<?php */?>
		<br>
  <c><?php echo $row['app_name']; ?>  </c>
  <c><?php echo $row['app_empid']; ?>  </c>	
  <a href="myprofile_app.php">MY PROFILE </a>
  <a class= "active" href="applyleave_app.php">APPLY LEAVE </a>
  <a  href="historyleave_app.php">HISTORY</a>
  
</div>
<style>
		.sidenav a.active{
		background-color: #4d6276;
		color: white;
	}
	</style>
	</body>
</html>