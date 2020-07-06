


<?php
require_once('connection.php');
require_once('sidebar_adm.php');
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
  <c><?php echo $row['adm_name']; ?>  </c>
  <c><?php echo $row['adm_empid']; ?>  </c>	
   <a href="myprofile_adm.php">MY PROFILE </a>
   <a href="adduser_adm.php">ADD APPLICANT </a>
   <a class="active" href="updatehod_adm.php">LIST HEAD DEPARTMENT </a>
   <a href="updateapp_adm.php">LIST APPLICANT</a>

	</div>
 
      <h1 align="center">LIST HEAD DEPARTMENT</h1>
      <p>&nbsp;</p>
      <hr>
		<br>
		<br>
         <table  height="200" border="" align="center" id="customers">
           <thead>
             <tr align="center" >
               <th><b>EMPLOYEE ID</b></th>
               <th><b>NAME</b></th>
			   <th><b>DEPARTMENT</b></th>
               <th><b>EMAIL</b></th>
               <th><b>PASSWORD</b></th>
			   <th><b></b></th>
             </tr>
			 </thead>
			 <tbody>
			   <?php
				
				
			
				$readSQL = "SELECT * FROM head_of_department ";
					
				

				$resultRead = mysqli_query($connection, $readSQL);
				$total = 0;

				while($row = mysqli_fetch_assoc($resultRead)){ 
					
			   	?>
             <tr  align="center">
               <td><?php echo $row['hod_empid']; ?></td>
               <td><?php echo $row['hod_name']; ?></td>
               <td><?php echo $row['hod_department']; ?></td>
			   <td><?php echo $row['hod_email']; ?></td>
			   <td><?php echo $row['hod_pss']; ?></td>
               <td>
				
				   
		
				   <a id="update" href="updatehodUPD_adm.php?hod_empid=<?php echo $row['hod_empid'] ?>">
				<input type="submit" class="update"  value="update"/></a>
				   
					
					
				   <a href="updatehodDEL_adm.php?hod_no=<?php echo $row['hod_no'] ?> "><input  type="submit" class="delete" value="delete" class=""/></a>
					
						
			 </td>		
				   		
			</tr>
		
				   <?php } ?>

			 </tbody> 
             
      			
          
		</table>        



	<script>







</script>
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
		
.update {
  background-color: #29A5E1;
  border: none;
  color: white;
  padding: 8px 16px;
  text-decoration: none;
  margin: 2px 1px;
  cursor: pointer;
}

.delete {
  background-color: #E12834;
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

 
