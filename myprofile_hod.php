

<?php
require_once('connection.php');
require_once('sidebar_hod.php');
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
  <c><?php echo $row['hod_name']; ?>  </c>
  <c><?php echo $row['hod_empid']; ?>  </c>	
   <a href="graph_hod.php">GRAPH ANALYSIS</a>
  <a class="active" href="myprofile_hod.php">MY PROFILE </a>
  <a href="applicantlist_hod.php">APPLICANT LIST </a>
  <a href="leaverequest_hod.php">LEAVE REQUEST </a>
  <a href="historyleaveapp_hod.php">APPLICANT LEAVE</a>
  
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
               <td width="244"><?php echo $row['hod_empid']; ?> </td>
             </tr>
             <tr>
               <td><b>Name</b></td>
               <td><?php echo $row['hod_name']; ?> </td>
             </tr>
             <tr>
               <td><b>Department</b></td>
               <td><?php echo $row['hod_department']; ?></td>
             </tr>
             <tr>
               <td><b>Designation</b></td>
               <td><?php echo $row['hod_designation']; ?></td>
             </tr>
             <tr>
               <td><b>Email</b></td>
               <td><?php echo $row['hod_email']; ?></td>
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