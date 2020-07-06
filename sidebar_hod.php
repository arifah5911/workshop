<?php
session_start();
require_once('connection.php');



	$empid=$_SESSION["hodid"];
	//$resultRead = mysqli_query($connection, "SELECT * FROM site INNER JOIN project ON site.WoNo=project.WoNo AND site.id='$ID'"); 
	$resultRead = mysqli_query($connection, "SELECT * FROM head_of_department WHERE hod_empid= '$empid' ");
	$row = mysqli_fetch_assoc($resultRead);
?>

<html>
<head>
<?php /*?><link rel="stylesheet" href="../workshop1/css/c.css" type="text/css"><?php */?>
</head>
<body>
	
	<div class="sidenav">
  <!--<c> <img src="applicant_picture/<?php /*?><?php $row['app_picture']; ?><?php */?>">  </c>	-->
		<br>
  <c><?php echo $row['hod_name']; ?>  </c>
  <c><?php echo $row['hod_empid']; ?>  </c>	
  <a href="graph_hod.php">GRAPH ANALYSIS</a>
  <a href="myprofile_hod.php">MY PROFILE </a>
  <a href="applicantlist_hod.php">APPLICANT LIST </a>
  <a href="leaverequest_hod.php">LEAVE REQUEST </a>
  <a href="historyleaveapp_hod.php">HISTORY LEAVE</a>
  
</div>
<style>
	body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 300px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #192b3c;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 10px 8px 10px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;

}

	.sidenav a.active{
		background-color: #4d6276;
		color: white;
	}
 .sidenav c {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 15px;
  color: #E9D410;
  
}
.sidenav a:hover {
  background-color: #4d6276;
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}



.footer{
	position: fixed;
	left: 0;
	bottom: 0;
	width: 100%;
	background-color: #881517;
	color: black;
	text-align: center;
}
	</style>
	</body>
</html>