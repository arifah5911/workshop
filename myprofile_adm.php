

<?php

require_once('connection.php');
require_once('sidebar_adm.php');
require_once('header.php');
?>





<html>
	<head>
	
		<link rel="stylesheet" href="../workshop1/css/c.css" type="text/css">
	</head>
<body>

	<div class="sidenav">
  <!--<c> <img src="applicant_picture/<?php /*?><?php $row['app_picture']; ?><?php */?>">  </c>	-->
		<br>
  <c><?php echo $row['adm_name']; ?>  </c>
  <c><?php echo $row['adm_empid']; ?>  </c>	
   <a class="active" href="myprofile_adm.php">MY PROFILE </a>
   <a href="adduser_adm.php">ADD APPLICANT  </a>
   <a href="updatehod_adm.php">LIST HEAD DEPARTMENT </a>
   <a href="updateapp_adm.php">LIST APPLICANT</a>
  
</div>
<form class="" method="" action="">
    <div class="" >
      <h1 align="center">MY PROFILE</h1>
      <p>&nbsp;</p>
      <hr>
		<br>
		<br>
         <table id="tbl" width="404" border="1" align="center">
           <tbody>
             <tr>
               <td width="144"><b>Employee ID</b></td>
               <td width="244"><?php echo $row['adm_empid']; ?> </td>
             </tr>
             <tr>
               <td><b>Name</b></td>
               <td><?php echo $row['adm_name']; ?> </td>
             </tr>
             <tr>
               <td><b>Department</b></td>
               <td><?php echo $row['adm_department']; ?></td>
             </tr>
             <tr>
               <td><b>Designation</b></td>
               <td><?php echo $row['adm_designation']; ?></td>
             </tr>
             <tr>
               <td><b>Email</b></td>
               <td><?php echo $row['adm_email']; ?></td>
             </tr>
           </tbody>
         </table>

        <!--
      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      -->
      

     

      <div >
        
         
      </div>
  </div>
</form>

</body>
</html>