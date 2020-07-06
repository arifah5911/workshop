<?php
require_once('connection.php');
require_once('sidebar_app.php');
require_once('header.php');

?>






<html>
	<head>
	
		<link rel="stylesheet" href="c.css" type="text/css">
	</head>
<body>
	<div class="sidenav">
 <?php /*?> <c> <img src="applicant_picture/<?php $row['app_picture']; ?>">  </c>	<?php */?>
		<br>
  <c><?php echo $row['app_name']; ?>  </c>
  <c><?php echo $row['app_empid']; ?>  </c>	
  <a href="myprofile_app.php">MY PROFILE </a>
  <a href="applyleave_app.php">APPLY LEAVE </a>
  <a class= "active" href="historyleave_app.php">HISTORY</a>
  
</div>

<form class="" method="" action="">
    <div class="" >
      <h1 align="center">HISTORY LEAVE</h1>
      <p>&nbsp;</p>
      <hr>
		<br>
		<br>
         <table id="customers" border="1" align="center">
           <tbody>
             <tr align="center" >
				 <th width="200"><b>DATE APPLY</b></th>
               <th width="200"><b>LEAVE TYPE</b></th>
               <th width="200" ><b>START DATE</b></th>
               <th width="200"><b>END DATE</b></th>
			    <th width="200"><b>TOTAL DAYS</b></th>
               <th width="200"><b>STATUS</b></th>
             </tr>
			   <?php
				
				$value=$row['app_empid'];
				
				$readSQL = "SELECT * FROM day_off WHERE app_empid like '%$value%' ORDER BY lv_id DESC";
					
				

				$resultRead = mysqli_query($connection, $readSQL);
				$total = 0;

				while($row = mysqli_fetch_assoc($resultRead)){ 
			   	?>
             <tr align="center">
				<td><?php echo $row['lv_date']; ?></td>
               <td><?php echo ($row['lv_type']." leave"); ?></td>
				
               <td><?php echo $row['lv_startdate']; ?></td>
               <td><?php echo $row['lv_enddate']; ?></td>
				 <td><?php echo $row['lv_bill']; ?></td>
               <td>
				   <?php
				   if( isset ($row['lv_status'])==""){
					   
					   echo ("In progress");
					    					   
				   }
				   else {
				   	  	echo $row['lv_status']; 
				   }
				 ?>
				   <?php } ?>
			   </td>
				 
             </tr>
      			
           </tbody>
		</table>        
  </div>
</form>
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
		

	</style>
	
</body>
</html>