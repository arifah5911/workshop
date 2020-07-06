<?php
require_once('connection.php');
require_once('sidebar_hod.php');
require_once('header.php');

?>





<html>
	<head>
	
		<?php /*?><link rel="stylesheet" href="../workshop1/css/c.css" type="text/css"<?php */?>
		

	</head>
<body>
<div class="sidenav">
  <!--<c> <img src="applicant_picture/<?php /*?><?php $row['app_picture']; ?><?php */?>">  </c>	-->
		<br>
  <c><?php echo $row['hod_name']; ?>  </c>
  <c><?php echo $row['hod_empid']; ?>  </c>	
   <a href="graph_hod.php">GRAPH ANALYSIS</a>
  <a href="myprofile_hod.php">MY PROFILE </a>
  <a  href="applicantlist_hod.php">APPLICANT LIST </a>
  <a class="active" href="leaverequest_hod.php">LEAVE REQUEST </a>
  <a href="historyleaveapp_hod.php">APPLICANT LEAVE</a>
  
</div>


    <div class="" >
      <h1 align="center">LEAVE REQUEST </h1>
      <p>&nbsp;</p>
      <hr>
		<br>
		<br>
         <table height="" border="" align="center" id="customers">
           <tbody>
             <tr align="center" >
			    <th><b>DATE APPLY</b></th>
               <th><b>EMPLOYEE ID</b></th>
               <th><b>NAME</b></th>
			 
               <th><b>LEAVE TYPE</b></th>
			   <th><b>TOTAL DAYS</b></th>
			   <th><b></b></th>
               
			   
             </tr>
			   <?php
				
				$empid=$_SESSION['hodid'];
				
			
				 $readSQL = "SELECT * FROM head_of_department INNER JOIN applicant ON head_of_department.hod_department=applicant.app_department INNER JOIN day_off ON applicant.app_empid=day_off.app_empid WHERE head_of_department.hod_empid= '$empid' AND day_off.lv_status = 'in progress'";

					
				/* "SELECT * FROM project INNER JOIN site ON site.workorder=project.WoNo WHERE project.id='$ID'"*/

				$resultRead = mysqli_query($connection, $readSQL);
				$total = 0;

				while($row = mysqli_fetch_assoc($resultRead)){ 
			   	?>
             <tr align="center">
				<td><?php echo $row['lv_date']; ?></td>
               <td><?php echo $row['app_empid']; ?></td>
               <td><?php echo $row['app_name']; ?></td>
			  
			   <td><?php echo $row['lv_type']; ?></td>
			   <td><?php echo $row['lv_bill']; ?></td>
			   <td>
				     <a id="update" href="leaverequestAPPROVE_hod.php?lv_id=<?php echo $row['lv_id'] ?>">
				<input type="submit" class="view"  value="view"/></a>
				   
				   
					
				   
			   </td>
			 
            
		
				  

				 
             </tr>
      			 <?php } ?>
           </tbody>
		</table>        
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

.view {
  background-color: #128E8C;
  border: none;
  color: white;
  padding: 8px 16px;
  text-decoration: none;
  margin: 2px 1px;
  cursor: pointer;
}

	</style>
	
</body>
</html>


