<?php

require_once('sidebar_adm.php');
require_once('header.php');
require_once('connection.php');

?>
<?php





	$empid=$_SESSION["admid"];
	//$resultRead = mysqli_query($connection, "SELECT * FROM site INNER JOIN project ON site.WoNo=project.WoNo AND site.id='$ID'"); 
	$resultRead = mysqli_query($connection, "SELECT * FROM admin WHERE adm_empid= '$empid' ");
	$rowi = mysqli_fetch_assoc($resultRead);
	//die($empid);
?>
<?php 

if(isset($_POST['save']))
	{
		
		
		$hod_empid = mysqli_real_escape_string($connection, $_POST['empid']);
		$department = mysqli_real_escape_string($connection, $_POST['department']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		
		
		//die($hod_empid."".$department."".$email."".$password);
		
		$selectSQL = "SELECT * FROM head_of_department WHERE hod_empid=$hod_empid";
		$resultSelect = mysqli_query($connection, $selectSQL);
		$row = mysqli_fetch_assoc($resultSelect);
		
		$updateSQL = "UPDATE head_of_department SET hod_department = '$department', hod_email = '$email', hod_pss = '$password' WHERE hod_empid = '$hod_empid'";
		$resultUpdate = mysqli_query($connection, $updateSQL);
		
		if ($resultUpdate){
		
			echo("<script>alert('Successfully update data!');
			window.location.href='updatehod_adm.php';</script>");
		}
		else
		{
			
			$failed = "Failed to update record";
		}
	}

?>

<?php
				
				$hod_empid = $_GET['hod_empid'];
				
				
					
				 $resultRead = mysqli_query($connection, "SELECT * FROM head_of_department WHERE hod_empid = '$hod_empid'");

				
				 
				$row = mysqli_fetch_assoc($resultRead);
					
			   	?>


<html>
	<head>
		<link rel="stylesheet" href="../workshop1/css/c.css" type="text/css">
	</head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
	
	<div class="sidenav">
  <!--<c> <img src="applicant_picture/<?php /*?><?php $row['app_picture']; ?><?php */?>">  </c>	-->
		<br>
  <c><?php echo $rowi['adm_name']; ?>  </c>
  <c><?php echo $rowi['adm_empid']; ?>  </c>	
   <a  href="myprofile_adm.php">MY PROFILE </a>
   <a href="adduser_adm.php">ADD APPLICANT  </a>
   <a class="active" href="updatehod_adm.php">LIST HEAD DEPARTMENT </a>
   <a href="updateapp_adm.php">LIST APPLICANT</a>
  
</div> 

<form class="" method="post" action="" enctype="multipart/form-data">
    <div class="" >
      <h1 align="center">UPDATE HEAD DEPARTMENT</h1>
      <p>&nbsp;</p>
      <hr>
         <table width="400" border="0" align="center">
           <tbody>
			     
              <tr>
               <td width="120"><label for="id"><b>Employee ID</b></label></td>
               <td><input type="text" class="" name="empid" value="<?php echo $row['hod_empid']; ?>" disabled/></td>
             </tr>
				 
								      
             <tr>
               <td><b>Name</b></td>
               <td><input type="text" value="<?php echo $row['hod_name']; ?>" disabled></td>
             </tr>
          	 <tr>
               <td><b>Department</b></td>
				<td><select name="department" class="form-control">
				<option value="Marketing"  <?php if($row['hod_department']=="Marketing"){ echo "selected"; } ?>>Marketing</option>
				<option value="Accounting" <?php if($row['hod_department']=="Accounting"){ echo "selected"; } ?>>Accounting</option>
				<option value="Human Resource"<?php if($row['hod_department']=="Human Resource"){ echo "selected"; } ?>>Human Resource</option>
				</select></td>
               
             </tr>
           
             <tr>
               <td><b>Email</b></td>
               <td><input type="text" placeholder="Enter Email" name="email" value="<?php echo $row['hod_email']; ?>"  ></td>
             </tr>
             <tr>
               <td><b>Password</b></td>
               <td><input type="text" placeholder="Enter Password" name="password" value="<?php echo $row['hod_pss']; ?>" ></td>
             </tr>
           
             <tr>
               <td>
                   
				 
				    </td>
				   <td>
				   <button type="submit" name="save" class="save">save</button> 
					   <input type="hidden" class="" name="empid" value="<?php echo $row['hod_empid']; ?>"/>
				 </td>
             </tr>
           </tbody>
         </table>

        <!--
      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      -->
      

     

      <div>
        
		  
		  
         
      </div>
    </div>
  </form>
<style>

	.save{
  background-color: #019F1D;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
	}
</style>
</body>
</html>




































