<?php

require_once('connection.php');
require_once('sidebar_adm.php');
require_once('header.php');

?>


<?php




if (isset($_POST['signup'])) 
	{
		$empid = mysqli_real_escape_string($connection, $_POST['empid']);
		$name = mysqli_real_escape_string($connection, $_POST['name']);
		$department = mysqli_real_escape_string($connection, $_POST['department']);
		$designation = mysqli_real_escape_string($connection, $_POST['designation']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		$levelhd = mysqli_real_escape_string($connection, $_POST['levelhd']);
		$levelapp = mysqli_real_escape_string($connection, $_POST['levelapp']);
		$balance = mysqli_real_escape_string($connection, $_POST['balance']);
	
	 /*
	 $picture = $_FILES['file1']['name'];

    //upload file
    if($picture != '')
    {
        $ext = pathinfo($picture, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
	
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
           

            //set target directory
            $path = "picture/";
			
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $picture));
		}
		
		 if($designation == 'Head Department'){
		$sqlf = "select hod_picture from applicant";
		$sqlInsert = "INSERT INTO head_of_department (hod_empid,hod_name,hod_department,hod_designation,hod_email,hod_pss,hod_picture) VALUES('$empid','$name','$department','$designation','$email','$password','$picture')"; 
		$resultInsert = mysqli_query($connection, $sqlInsert) or die(mysqli_error($sqlf));
		 }
		
		else{
		$sqlf = "select app_picture from applicant";
		$sqlInsert = "INSERT INTO applicant (app_empid,app_name,app_department,app_designation,app_email,app_password,app_picture) VALUES('$empid','$name','$department','$designation','$email','$password','$picture')"; 
		$resultInsert = mysqli_query($connection, $sqlInsert) or die(mysqli_error($sqlf));
		
	}*/
		/*
			 if($designation == 'Head Department'){
		
		$sqlInsert = "INSERT INTO head_of_department (hod_empid,hod_name,hod_department,hod_designation,hod_email,hod_pss, level) VALUES('$empid','$name','$department','$designation','$email','$password','$levelhd')"; 
		$resultInsert = mysqli_query($connection, $sqlInsert) or die(mysqli_error($sqlInsert));
		 
	
		if($resultInsert)
		{
			
			echo("<script>alert('Successfully inserted data!');
			window.location.href='updatehod_adm.php';</script>");
		}
		else
		{
			$failed = "Failed inserted data.";
		}
			 }
		
		else{ */
		
			$sql_u = "SELECT * FROM applicant WHERE app_empid='$empid'";
			$res_u = mysqli_query($connection, $sql_u);
			
			if (mysqli_num_rows($res_u) > 0) {
					echo("<script>alert('Employee ID already exist!');
					window.location.href='adduser_adm.php';</script>"); }
			else{
				
		$sqlInsert = "INSERT INTO applicant (app_empid,app_name,app_department,app_designation,app_email,app_password,level, app_balance) VALUES('$empid','$name','$department','$designation','$email','$password','$levelapp','$balance')"; 
		$resultInsert = mysqli_query($connection, $sqlInsert) or die(mysqli_error($sqlInsert));
		
		if($resultInsert)
		{
			
				echo("<script>alert('Successfully inserted data!');
			window.location.href='updateapp_adm.php';</script>");
		}
		else
		{
			$failed = "Failed inserted data.";
		}
			
		}

	//	}
}
	



	
//	if(isset($_GET['st'])) { 
									
//		if ($_GET['st'] == 'success') {
//			echo "File Uploaded Successfully!";
						                    
//			else{
//				echo 'Invalid File Extension!';
//											}
								   
//						 } 

//}
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
  <c><?php echo $row['adm_name']; ?>  </c>
  <c><?php echo $row['adm_empid']; ?>  </c>	
   <a  href="myprofile_adm.php">MY PROFILE </a>
  <a   class="active" href="adduser_adm.php">ADD APPLICANT  </a>
	<a href="updatehod_adm.php">LIST HEAD DEPARTMENT </a>
  <a href="updateapp_adm.php">LIST APPLICANT</a>
  
</div>

<form class="" method="post" action="" enctype="multipart/form-data">
    <div class="" >
      <h1 align="center">ADD USER</h1>
      <p>&nbsp;</p>
      <hr>
         <table width="400" border="0" align="center">
           <tbody>
             <tr>
               <td width="120"><label for="id"><b>Employee ID</b></label></td>
               <td width="144"><input type="text" placeholder="Enter Employee ID" name="empid" required></td>
             </tr>
             <tr>
               <td><b>Name</b></td>
               <td><input type="text" placeholder="Enter Name" name="name" required></td>
             </tr>
             <tr>
               <td><b>Department</b></td>
				 <td><select  name="department" class="form-control" id="">
					<option disabled selected value="">-</option>
					<option value="Marketing">Marketing</option>
					<option value="Accounting">Accounting</option>
					<option value="Human Resource">Human Resource</option>
				  </select></td>
               
             </tr>
             <tr>
               <td><b>Designation</b></td>
				 <td><select  name="designation" class="form-control" id="">
					<option disabled selected value="">-</option>
					
					<option value="Administrative">Administrative</option>
					<option value="Technical">Technical</option>
				  </select></td>
               <td><input type="hidden"  value="head department" name="levelhd" required></td>
			
             </tr>
             <tr>
               <td><b>Email</b></td>
               <td><input type="text" placeholder="Enter Email" name="email" required></td>
             </tr>
             <tr>
               <td><b>Password</b></td>
               <td><input type="password" placeholder="Enter Password" name="password" required></td>
             </tr>
            <?php /*?> <tr>
              <td><b>Profile Photo</b></td>
               <td><input type="file" name="file1" accept=".png, .jpg, .jpeg" required/></td>
             </tr><?php */?>
			   
			      <td><input type="hidden" value="applicant" name="levelapp" required></td>
				 <td><input type="hidden" value="14" name="balance" required></td>
             <tr>
               <td></td>
               <td>
				   
				   <button type="submit" name="signup" class="signup">Sign Up</button></td>
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
	.cancel{
  background-color: #FF0004;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
	.signup{
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