<?php
require_once('connection.php');
require_once('sidebar_hod.php');
require_once('header.php');

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
  <a  class="active" href="applicantlist_hod.php">APPLICANT LIST </a>
  <a href="leaverequest_hod.php">LEAVE REQUEST </a>
  <a href="historyleaveapp_hod.php">APPLICANT LEAVE</a>
  
</div>


    <div class="" >
		<table align="left">
			<tr>
				<td ><h3>Department :</h3></td>
				<td style="color: crimson"><h3><?php echo strtoupper ($row['hod_department']); ?></h3></td>
			</tr>
		</table>
	<br>
	<br>
	<br>
      <h1 align="center">APPLICANT LIST </h1>
      <p>&nbsp;</p>
      <hr>
		<br>
		<br>
         <table  height="" border="" align="center" id="customers">
           <tbody>
             <tr align="center" >
               <th><b>EMPLOYEE ID</b></th>
               <th><b>NAME</b></th>
			   <th><b>DESIGNATION</b></th>
               <th><b>EMAIL</b></th>
               
			   
             </tr>
			   <?php
				
				$empid=$_SESSION['hodid'];
				
				$readSQL = " SELECT * FROM head_of_department  INNER JOIN  applicant ON head_of_department.hod_department=applicant.app_department WHERE head_of_department.hod_empid='$empid'";
			   
			  
			   
					
				/* "SELECT * FROM project INNER JOIN site ON site.workorder=project.WoNo WHERE project.id='$ID'"*/

				$resultRead = mysqli_query($connection, $readSQL);
				$total = 0;

				while($row = mysqli_fetch_assoc($resultRead)){ 
			   	?>
             <tr align="center">
               <td><?php echo $row['app_empid']; ?></td>
               <td><?php echo $row['app_name']; ?></td>
			   <td><?php echo $row['app_designation']; ?></td>
			   <td><?php echo $row['app_email']; ?></td>
			 
            
		
				  

				 
             </tr>
      			 <?php } ?>
           </tbody>
		</table>    
		<br>
		<br>
		
			<div class="paracss" align="center" id="para1" ></div>
		
  </div>

	<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 98%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #010101;
  color: white;
  
}

		.paracss{
			margin-right:20;
			margin-left: 680;
			width: 30%;
  			border: 3px solid #F01552;
			font-size: 120%;
			 font-weight: bold;
		}
	
	</style>
	
<script>
	document.getElementById("para1").innerHTML = formatAMPM();
	function formatAMPM() {
var d = new Date(),
    minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
    hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
    ampm = d.getHours() >= 12 ? 'pm' : 'am',
    months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
return days[d.getDay()]+' '+months[d.getMonth()]+' '+d.getDate()+' '+d.getFullYear()+' '+hours+':'+minutes+ampm;
}
</script>
	
</body>
</html>


