<?php

session_start();

require_once('connection.php');

	$empid=$_SESSION["admid"];
	//$resultRead = mysqli_query($connection, "SELECT * FROM site INNER JOIN project ON site.WoNo=project.WoNo AND site.id='$ID'"); 
	$resultRead = mysqli_query($connection, "SELECT * FROM admin WHERE adm_empid= '$empid' ");
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
  <c><?php echo $row['adm_name']; ?>  </c>
  <c><?php echo $row['adm_empid']; ?>  </c>	
   <a  href="myprofile_adm.php">MY PROFILE </a>
  <a   href="adduser_adm.php">ADD USER </a>
	<a href="updatehod_adm.php">LIST HEAD DEPARTMENT </a>
  <a href="updateapp_adm.php">LIST APPLICANT</a>
  
</div>
<style>
	body {
  font-family: "Lato", sans-serif;
}
	/*li a{
		display: block;
		color: #000;
		padding: 8px 16px;
		text-decoration: none;
	}
	li a.active{
		background-color: ;
		color: white;
	}
	li a:hover:not(.active){
		background-color:
	}*/
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
	.sidenav a.active{
		background-color: #4d6276;
		color: white;
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